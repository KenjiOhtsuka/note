---
title: Simple Server
date: 2021-07-02 00:00:00
layout: post
categories: server c kotlin
tags: server c kotlin
---

I wrote server with socket.

## C

when you access to `http://localhost:49162`, you can see the page.

```c
#include <netinet/in.h>
#include <stdio.h>
#include <stdlib.h>
#include <sys/socket.h>
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

    if (bind(server_fd,(struct sockaddr *) &address, sizeof(address)) < 0)
        handle_error("bind failed");

    // start to listen
    if (listen(server_fd, 3) < 0) handle_error("listen failed");

    printf("listening\n");

    while (1) {
        int client = accept(server_fd, (struct sockaddr *) &address, (socklen_t *)&addr_len);
        if (client < 0) handle_error("failed to accept connection.\n");

        char *body = "<!DOCTYPE html><html><head><title>Exemple</title></head><body><p>Server example.</p></body></html>";
        char *format = "HTTP/1.0 200 OK\r\n"
                "Date: Fri, 31 Dec 2021 23:59:59 GMT\r\n"
                "Server: Apache/0.8.4\r\n"
                "Content-Type: text/html\r\n"
                "Content-Length: %d\r\n"
                "Expires: Sat, 01 Jan 2020 00:59:59 GMT\r\n"
                "Last-modified: Fri, 09 Aug 1996 14:21:40 GMT\r\n"
                "\r\n"
                "%s";
        char message[4096];
        sprintf(message, format, strlen(body), body);

        // send the response
        send(client, message, strlen(message), 0);

        close(client);
    }

    close(server_fd);

    return EXIT_SUCCESS;
}
```

## Kotlin

### Preparation

Install Kotlin compiler.

For macOS, I installed Kotlin (kotlinc) with  `brew install kotlin`.
kotlinc was located in `/usr/local/Cellar/kotlin/1.2.71/bin/kotlinc`.

### Code

write `server.kts`.
It works on JVM. (The following code is converted from Java code.)

```kotlin
import java.io.*
import java.net.ServerSocket

val port = 8081;
val serverSocket = ServerSocket(port);
println("listening port: " + port.toString());

lateinit var requestLine: String
while (true) {
    val clientSocket = serverSocket.accept();

    val `in` = BufferedReader(InputStreamReader(clientSocket.getInputStream()));
    val out = BufferedWriter(OutputStreamWriter(clientSocket.getOutputStream()));

    do {
        requestLine = `in`.readLine()
        println(requestLine);
    } while (!requestLine.isNullOrEmpty())

    val body = """
        <!DOCTYPE html><html><head><title>Exemple</title></head><body><p>Server exemple.</p></body></html>
    """.trimIndent()

    out.write("HTTP/1.0 200 OK\r\n");
    out.write("Date: Fri, 31 Dec 2017 23:59:59 GMT\r\n");
    out.write("Server: Apache/0.8.4\r\n");
    out.write("Content-Type: text/html\r\n");
    out.write("Content-Length: ${body.toByteArray().size}\r\n");
    out.write("Expires: Sat, 01 Jan 2020 00:59:59 GMT\r\n");
    out.write("Last-modified: Fri, 09 Aug 1996 14:21:40 GMT\r\n");
    out.write("\r\n");
    out.write(body)

    out.close();
    `in`.close();
    clientSocket.close();
}
```
