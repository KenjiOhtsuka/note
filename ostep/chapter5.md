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

## 3

using `sleep` function, the parent can wait for a while.

### Code

```c
#include <stdio.h>
#include <unistd.h>

int main(int argc, char *argv[]) {
    printf("## show arguments\n");
    for (int i = 0; i < argc; ++i)
        printf("%d: %s\n", i, argv[i]);

    int cp = fork();
    if (cp < 0) {
        // failed
        printf("fork failed.\n");
    } else if (cp == 0) {
        // child process
        printf("hello.\n");
    } else {
        // parent process
        sleep(1);
        printf("goodbye.\n");
    }
    return 0;
}
```

#### Output

```
 % ./chapter-5/homework3.out
## show arguments
0: ./chapter-5/homework3.out
hello.
goodbye.
```

## 4

exec family is prepared for useful tools, so that many alternative functions were develped.

### Code

```c
#include <stdio.h>
#include <unistd.h>
#include <string.h>

int main(int argc, char *argv[]) {
    printf("## show arguments\n");
    for (int i = 0; i < argc; ++i)
        printf("%d: %s\n", i, argv[i]);

    if (argc < 2) {
        printf("add function argument\n");
        return 0;
    }

    /* setup arguments */
    char *myargs[2];
    myargs[0] = strdup("ls");
    myargs[1] = NULL;

    if (strcmp(argv[1], "execl") == 0) {
        printf("## execute execl\n");
        // absolute path is required
        execl("/bin/ls", myargs[0], NULL);
        printf("## finish execl\n");
    }
    if (strcmp(argv[1], "execle") == 0) {
        printf("## execute execle\n");
        // absolute path is required
        execle("/bin/ls", myargs[0], myargs[1], NULL);
        printf("## finish execle\n");
    }
    if (strcmp(argv[1], "execlp") == 0) {
        printf("## execute execlp\n");
        execlp(myargs[0], myargs[0], myargs[1], NULL);
        printf("## finish execlp\n");
    }
    if (strcmp(argv[1], "execv") == 0) {
        printf("## execute execv\n");
        execv("/bin/ls", myargs);
        printf("## finish execv\n");
    }
    if (strcmp(argv[1], "execvp") == 0) {
        printf("## execute execvp\n");
        execvp(myargs[0], myargs);
        printf("## finish execvp\n");
    }
    // execvpe didn't work on macOS
    //execvpe(myargs[0], myargs);

    printf("no function matched.");
    return 0;
}
```

## Output

```
 % ./a.out execl 
## show arguments
0: ./a.out
1: execl
## execute execl
a.out           homework1.c     homework2.c     homework3.c     homework4.c     p1.c            p2.c            p3.c            p4.c
compile.sh      homework1.out   homework2.out   homework3.out   newfile.txt     p1.out          p2.out          p3.out          p4.out

 % ./a.out execle
## show arguments
0: ./a.out
1: execle
## execute execle
a.out           homework1.c     homework2.c     homework3.c     homework4.c     p1.c            p2.c            p3.c            p4.c
compile.sh      homework1.out   homework2.out   homework3.out   newfile.txt     p1.out          p2.out          p3.out          p4.out

 % ./a.out execlp
## show arguments
0: ./a.out
1: execlp
## execute execlp
a.out           homework1.c     homework2.c     homework3.c     homework4.c     p1.c            p2.c            p3.c            p4.c
compile.sh      homework1.out   homework2.out   homework3.out   newfile.txt     p1.out          p2.out          p3.out          p4.out

 % ./a.out execv 
## show arguments
0: ./a.out
1: execv
## execute execv
a.out           homework1.c     homework2.c     homework3.c     homework4.c     p1.c            p2.c            p3.c            p4.c
compile.sh      homework1.out   homework2.out   homework3.out   newfile.txt     p1.out          p2.out          p3.out          p4.out

 % ./a.out execvp
## show arguments
0: ./a.out
1: execvp
## execute execvp
a.out           homework1.c     homework2.c     homework3.c     homework4.c     p1.c            p2.c            p3.c            p4.c
compile.sh      homework1.out   homework2.out   homework3.out   newfile.txt     p1.out          p2.out          p3.out          p4.out
```


## 5

wait returns the PID of the process to be waited. wait returns `-1` when there is no process to be waited.

### Code

```c
#include <stdio.h>
#include <unistd.h>
#include <sys/wait.h>

int main(int argc, char *argv[]) {
    printf("## show arguments\n");
    for (int i = 0; i < argc; ++i)
        printf("%d: %s\n", i, argv[i]);

    int cp = fork();
    if (cp < 0) {
        // fail
        printf("fork failed.\n");
    } else if (cp == 0) {
        // child process
        printf("hello, this is the child process (PID: %d).\n", getpid());
        int wait_rv = wait(NULL);
        printf("wait return value in child process: %d\n", wait_rv);
    } else {
        // parent process
        printf("hello, this is the parent process (PID: %d).\n", getpid());
        int wait_rv = wait(NULL);
        printf("wait return value in parent process: %d\n", wait_rv);
        printf("hello, this is the parent process, again (PID: %d).\n", getpid());
    }
    return 0;
}
```

#### Output

```text
 % ./a.out        
## show arguments
0: ./a.out
hello, this is the parent process (PID: 36927).
hello, this is the child process (PID: 36928).
wait return value in child process: -1
wait return value in parent process: 36928
hello, this is the parent process, again (PID: 36927).
```

## 6

`waitpid` is useful when the process id to be waited is apparent or when we wait for the specific process.

### Code

```c
#include <stdio.h>
#include <unistd.h>
#include <sys/wait.h>

int main(int argc, char *argv[]) {
    printf("## show arguments\n");
    for (int i = 0; i < argc; ++i)
        printf("%d: %s\n", i, argv[i]);

    int cp = fork();
    if (cp < 0) {
        // fail
        printf("fork failed.\n");
    } else if (cp == 0) {
        // child process
        printf("hello, this is the child process (PID: %d).\n", getpid());
        int wait_rv = waitpid(-1, NULL, 0);
        printf("wait return value in child process: %d\n", wait_rv);
    } else {
        // parent process
        printf("hello, this is the parent process (PID: %d).\n", getpid());
        int wait_rv = waitpid(cp, NULL, 0);
        printf("wait return value in parent process: %d\n", wait_rv);
        printf("hello, this is the parent process, again (PID: %d).\n", getpid());
    }
    return 0;
}
```

#### Output

```
 % ./a.out        
## show arguments
0: ./a.out
hello, this is the parent process (PID: 37082).
hello, this is the child process (PID: 37083).
wait return value in child process: -1
wait return value in parent process: 37083
hello, this is the parent process, again (PID: 37082).
```

## 7

The child process stops printing out the message. It makes no effect on the parent process.

### Code

```c
#include <stdio.h>
#include <unistd.h>
#include <sys/wait.h>

int main(int argc, char *argv[]) {
    printf("## show arguments\n");
    for (int i = 0; i < argc; ++i)
        printf("%d: %s\n", i, argv[i]);

    int cp = fork();
    if (cp < 0) {
        // fail
        printf("fork failed.\n");
    } else if (cp == 0) {
        // child process
        printf("hello, this is the child process.\n");
        printf("## close STDOUT\n");
        close(STDOUT_FILENO);
        printf("hello, this is the child process, again.\n");
    } else {
        // parent process
        printf("hello, this is the parent process.\n");
        wait(NULL);
        printf("hello, this is the parent process, again.\n");
    }
    return 0;
}
```

#### Output

```
 % ./a.out        
## show arguments
0: ./a.out
hello, this is the parent process.
hello, this is the child process.
## close STDOUT
hello, this is the parent process, again.
```

## 8

### Code

```c
#include <stdio.h>
#include <unistd.h>
#include <sys/wait.h>
#include <fcntl.h>

typedef struct {
    pid_t pid;
    char *label;
} process_info;

void print_descriptors(pid_t *pipefd);
void print_message(process_info *pi, char *message);

int main(int argc, char *argv[]) {
    printf("## show arguments\n");
    for (int i = 0; i < argc; ++i)
        printf("%d: %s\n", i, argv[i]);

    // pipefd[0] - read end
    // pipefd[1] - write end
    int pipefd[2];
    if (pipe(pipefd) < 0) {
        perror("pipe");
        _exit(1);
    }
    print_descriptors(pipefd);

    pid_t pids[2];
    pids[0] = fork();
    if (pids[0] < 0 || pids[1] < 0) {
        perror("fork");
        return -1;
    } else if (pids[0] == 0) {
        // first child process
        process_info pi;
        pi.label = "child 1";
        pi.pid = getpid();
        print_message(&pi, "started");

        print_message(&pi, "connect read end to standard input");
        dup2(pipefd[0], STDIN_FILENO);

        print_message(&pi, "close read end");
        close(pipefd[0]);
        
        print_message(&pi, "start cat");
        execl("/bin/cat", "/bin/cat", NULL);
    } else {
        pids[1] = fork();
        if (pids[1] < 0) {
            // error
            perror("fork");
            return -1;
        } else if (pids[1] == 0) {
            // second child process
            process_info pi;
            pi.label = "child 2";
            pi.pid = getpid();

            print_message(&pi, "started");

            print_message(&pi, "close read end");
            close(pipefd[0]);

            print_message(&pi, "connect write end to standard output");
            dup2(pipefd[1], STDOUT_FILENO);

            print_message(&pi, "close write end"); // this message is printed out from the 1st process
            close(pipefd[1]);

            printf("hello world\n");  // this message is printed out from the 1st process
        } else {
            process_info pi;
            pi.label = "parent";
            pi.pid = getpid();
            print_message(&pi, "wait");
            wait(NULL);
        }
    }

    return 0;
}

void print_descriptors(pid_t *pipefd) {
    printf("## print descriptors\n");
    for (int i = 0; i < sizeof(pipefd) / sizeof(pid_t); ++i) {
        printf("%d: %d\n", i + 1, pipefd[i]);
    }
}

void print_message(process_info *pi, char *message) {
    printf("%s (PID: %d): %s\n", pi->label, pi->pid, message);
}
```

#### Output

```
## show arguments
0: ./a.out
## print descriptors
1: 3
2: 4
parent (PID: 770): wait
child 1 (PID: 771): started
child 1 (PID: 771): connect read end to standard input
child 1 (PID: 771): close read end
child 2 (PID: 772): started
child 2 (PID: 772): close read end
child 2 (PID: 772): connect write end to standard output
child 2 (PID: 772): close write end                                                                                                                                    
hello world
```

#### Comment

piped end points can be used by `write` and `read` functions, without connecting stdout/stdin.

```c
char *text = "text";
char buf[128];

write(pipefd[1], text, strlen(text));
read(pipefd[0], buf, sizeof(buf))
```
