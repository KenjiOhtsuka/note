---
layout: page
title: Deadlock Problem: The Dining Philosophers in C
---

# Deadlock Problem: The Dining Philosophers in C

Let's simulate the problem of "dining philosophers" in C.

## Problem "The Dining philosophers"

It is a problem of concurrency.

> Assume there are five "philosophers" sitting around a table.
> Between each pair of philosophers is a single fork.
> The philosophers each have times where they think, and don't need any forks,
> and times where they eat. In order to eat, a philosopher needs two forks,
> both the one on their left and the one on their right (Arpaci-Dusseau & Arpaci-Dusseau, 2012, p. 378).

If you express this in code, it will be deadlock under the following conditions.

> Each philosoper takes the left fork first, and the right fork.

The fork is used jointly by two people in this setting. It is used over and over again.

This issue is said to have been raised and resolved by Dijkstra.

## Deadlock code

### philosopher

Let the philosopher be a thread.
Being a philosopher, people think, take a fork, eat, and put a fork.

```c
think();
get_forks(a->index);
eat();
put_forks(a->index);
```
    
`think`, `eat` are processes that simply wait for a certain period of time.

### fork

The fork is a semaphore.

```c
sem_t forks[N];
```

Initialize with 1.

```c
for (i = 0; i < N; i++) sem_init(&forks[i], 0, 1);
```

### Action to take a fork

There are several functions for philosophers to get a fork.
`get_forks` gets two forks, and the other functions are called throug `get_forks`.
To make it easier for deadlocks to occur, we'll leave some time between getting the first and second forks.

```c
int first(int p)  {
  return p;
}

int second(int p) {
  return (p + 1) % N;
}

void get_first_fork(int p) {
  printf("philosopher %d get fork %d", p, first(p));
  sem_wait(&forks[first(p)]);
  printf(" ... DONE\n");
}

void get_second_fork(int p) {
  printf("philosopher %d get fork %d", p, second(p));
  sem_wait(&forks[second(p)]);
  printf(" ... DONE\n");
}

void get_forks(int p) {
  get_first_fork(p);
  wait();
  get_second_fork(p);
}
```

### Overall

The whole code looks like this:
You can change the number of philosophers and forks by changing the definition `N`.

```c
#include <stdio.h>
#include <stdlib.h>
#include <pthread.h>
#include <semaphore.h>
#include <unistd.h> 

#define N 5 #define M 100 
sem_t forks[N];

typedef struct {
  int index;
} parg;

void wait() {
  usleep(((rand() % 5) + 1) * 1000);
}

int first(int p)  {
  return p;
}

int second(int p) {
  return (p + 1) % N;
}

void get_first_fork(int p) {
  printf("philosopher %d get fork %d", p, first(p));
  sem_wait(&forks[first(p)]);
  printf(" ... DONE\n");
}

void get_second_fork(int p) {
  printf("philosopher %d get fork %d", p, second(p));
  sem_wait(&forks[second(p)]);
  printf(" ... DONE\n");
}

void get_forks(int p) {
  get_first_fork(p);
  wait();
  get_second_fork(p);
}

void put_first_fork(int p) {
  printf("philosopher %d put fork %d", p, first(p));
  sem_post(&forks[first(p)]);
  printf(" ... DONE\n");
}

void put_second_fork(int p) {
  printf("philosopher %d put fork %d", p, second(p));
  sem_post(&forks[second(p)]);
  printf(" ... DONE\n");
}

void put_forks(int p) {
  put_first_fork(p);
  put_second_fork(p);
}

void think() {
  wait();
}

void eat() {
  wait();
}

void *philosopher(void *arg) {
  parg *a = (parg *) arg;
  int i;
  for (i = 0; i < M; i++) {
    think();
    get_forks(a->index);
    eat();
    put_forks(a->index);
  }
  return NULL;
}

int main(int argc, char *argv[]) {
  int i;
  // initialize forks
  for (i = 0; i < N; i++) sem_init(&forks[i], 0, 1);

  // initialize and start philosophers
  pthread_t p[N];
  parg a[N];
  for (i = 0; i < N; i++) {
    a[i].index = i;
    pthread_create(&p[i], NULL, philosopher, &a[i]);
  }

  for (i = 0; i < N; i++) pthread_join(p[i], NULL);

  printf("finished\n");
  return 0;
}
```

### compile

it can be compiled in AWS EC2 Amazon Linux as:

```
gcc -pthread file.c
```

### Output example

#### 1

```c
$ ./a.out 
philosopher 1 get fork 1 ... DONE
philosopher 4 get fork 4 ... DONE
philosopher 3 get fork 3 ... DONE
philosopher 2 get fork 2 ... DONE
philosopher 0 get fork 0 ... DONE
(DEADLOCK)
```

#### 2

```c
philosopher 3 get fork 3 ... DONE
philosopher 4 get fork 4 ... DONE
philosopher 0 get fork 1philosopher 3 get fork 4philosopher 1 put fork 1 ... DONE
philosopher 1 put fork 2 ... DONE
 ... DONE
philosopher 2 get fork 2 ... DONE
philosopher 1 get fork 1philosopher 0 put fork 0 ... DONE
philosopher 0 put fork 1 ... DONE
 ... DONE
philosopher 0 get fork 0 ... DONE
(DEADLOCK)
```

### Deadlock and semaphore values

In the case of a deadlock, the semaphore value changes in the following order, for example.
All semaphores go to 0, after which no philosopher can take a fork.

| | | Sem 0 | Sem 1 | Sem 2 | Sem 3 | Sem 4 |
|:--|:--|:--|:--|:--|:--|:--|
| initial | | 1 | 1 | 1 | 1 | 1 |
| Phase 1 | Philosopher 0 takes the fork 0. | 0 | 1 | 1 | 1 | 1 |
| Phase 1 | Philosopher 1 takes the fork 1. | 0 | 0 | 1 | 1 | 1 |
| Phase 1 | Philosopher 2 takes the fork 2. | 0 | 0 | 0 | 1 | 1 |
| Phase 1 | Philosopher 3 takes the fork 3. | 0 | 0 | 0 | 0 | 1 |
| Phase 1 | Philosopher 4 takes the fork 4. | 0 | 0 | 0 | 0 | 0 |
| Phase 2 | Philosopher 0 can't take the fork 1. | 0 | **0** | 0 | 0 | 0 |
| Phase 2 | Philosopher 1 can't take the fork 2. | 0 | 0 | **0** | 0 | 0 |
| Phase 2 | Philosopher 2 can't take the fork 3. | 0 | 0 | 0 | **0** | 0 |
| Phase 2 | Philosopher 3 can't take the fork 4. | 0 | 0 | 0 | 0 | **0** |
| Phase 2 | Philosopher 4 can't take the fork 0. | **0** | 0 | 0 | 0 | 0 |

In phase 1, all philosophers take all forks.
In phase 2, no one can move but wait, DEADLOCK. 
Bold letters in the table shows blocking.

## Code to resolve deadlock

There are several solutions.
here I'll assume that the fifth philosopher picks it up from the right fork.
Modify the code as follows:

```c
int first(int p)  {
  if (p == 4) return (p + 1) / N;
  return p;
}

int second(int p) {
  if (p == 4) return p;
  return (p + 1) % N;
}
```

The program should now exit without deadlocking.

## Points to avoid deadlock

The solution was to change the order in which the fifth person took the fork.
This sets the lock priority for all forks. With the fifth change,
forks are given priority in the order of 0, 1, 2, 3, 4 index.

If more than 2-4 people change the order of the forks,
it will be the same as prioritizing and deadlock will not occur.
