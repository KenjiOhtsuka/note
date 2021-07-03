---
layout: page
---

## 1

```c
#include <netinet/in.h>
#include <stdio.h>
#include <stdlib.h>
#include <sys/socket.h>
#include <sys/time.h>
#include <unistd.h>
#include <string.h>

void handle_error(char* message) {
  perror(message);
  exit(EXIT_FAILURE);
}

int main(void) {
    int server_fd;

    // create socket file descriptor
    server_fd = socket(AF_INET, SOCK_STREAM, IPPROTO_TCP);
    if (server_fd == -1) handle_error("socket failed");

    struct sockaddr_in address;
    address.sin_family = AF_INET;
    address.sin_addr.s_addr = INADDR_ANY;
    address.sin_port = htons(49162);
    int addr_len = sizeof(address);

    // Forcefully attaching socket to the port 8080
    if (bind(server_fd,(struct sockaddr *) &address, sizeof(address)) < 0)
        handle_error("bind failed");

    // start to listen
    if (listen(server_fd, 3) < 0) handle_error("listen failed");

    printf("listening\n");

    while (1) {
        int client = accept(server_fd, (struct sockaddr *) &address, (socklen_t *)&addr_len);
        if (client < 0) handle_error("failed to accept connection.\n");

        // set time
        struct timeval cur_time;
        time_t t;
        gettimeofday(&cur_time, NULL);
        t = cur_time.tv_sec;
        char *message = ctime(&t);
        // check in server
        printf("%s", message);
        send(client, message, strlen(message), 0);

        close(client);
    }

    close(server_fd);

    return EXIT_SUCCESS;
}
```

To check the result, execute this app first and execute the following command.

```sh
nc -t 127.0.0.1 49162
```

### output

```
kenjiotsuka2@KenjinoMacBook-puro ~/project
 % nc -t 127.0.0.1 49162
Sun Jul  4 05:30:42 2021
```
