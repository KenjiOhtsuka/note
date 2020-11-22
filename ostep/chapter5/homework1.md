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

### Code


