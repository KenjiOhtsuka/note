---
layout: page
---

## 1

variable change in parent or child process doesn't affect on the other.

### Code

```c
#include <stdio.h>
#include <unistd.h>
#include <sys/wait.h>

int main(int argc, char *argv[]) {
    for (int i = 0; i < argc; ++i)
        printf("%d: %s\n", i, argv[i]);
    int x = 100;
    int cp = fork();
    if (cp < 0) {
        // failed
        printf("fork failed.\n");
    } else if (cp == 0) {
        // child process
        printf("child - x: %d (initial value)\n", x);
        printf("child - x: %d\n", x);
        wait(NULL);
        x = 111;
        printf("child - x: %d (changed)\n", x);
        wait(NULL);
    } else {
        // parent process
        printf("parent - x: %d (initial value)\n", x);
        x = 121;
        printf("parent - x: %d (changed)\n", x);
        if (argc > 1 && *argv[1] == 'p') {
            printf("parent: wait\n");
            wait(NULL);
        }
        x = 122;
        printf("parent - x: %d (changed)\n", x);
    }
    return 0;
}
```

#### Output

```
 % ./chapter-5/homework1.out  p
0: ./chapter-5/homework1.out
1: p
parent - x: 100 (initial value)
parent - x: 122 (changed)
parent: wait
child - x: 100 (initial value)
child - x: 100
child - x: 111 (changed)
parent - x: 121 (changed)

 % ./chapter-5/homework1.out   
0: ./chapter-5/homework1.out
parent - x: 100 (initial value)
parent - x: 122 (changed)
parent - x: 121 (changed)
child - x: 100 (initial value)
child - x: 100
child - x: 111 (changed)
```

## 2

file writting happens in the order of process execution.

### Code

```c
#include <stdio.h>
#include <unistd.h>
#include <sys/wait.h>
#include <fcntl.h>


int main(int argc, char *argv[]) {
    printf("## show arguments\n");
    for (int i = 0; i < argc; ++i)
        printf("%d: %s\n", i, argv[i]);

    printf("## close STDOUT\n");
    close(STDOUT_FILENO);

    printf("## open the file.\n");
    open("./homework2.output", O_CREAT|O_WRONLY|O_TRUNC, S_IRWXU);

    int cp = fork();
    if (cp < 0) {
        // failed
        printf("fork failed.\n");
    } else if (cp == 0) {
        // child process
        printf("hello, this is the child process.\n");
    } else {
        // parent process
        printf("hello, this is the parent process.\n");
        wait(NULL);
        printf("hello, this is the parent process, again.\n");
    }
    return 0;
}
```

### Output

```
 % ./chapter-5/homework2.out
## show arguments
0: ./chapter-5/homework2.out
## close STDOUT

 % cat homework2.output 
hello, this is the parent process.
hello, this is the child process.
hello, this is the parent process, again.
```

# 3

