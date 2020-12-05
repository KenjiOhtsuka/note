---
layout: page
---


## CPU

* Stride scheduler
    * A deterministic fair-share scheduler
* assumptions about processes
    * Each job runs for the same amount of time
    * All jobs arrive at the same time
    * All jobs only use the CPU (i.e., they perform no I/O)
* Basic algorithm for scheduling
    * First Come, First Served (FCFS)
    * Shortest Job First (SJF)
    * First Out (FIFO)
* MLFQ
    * Rule 1
        * If Priority(A) > Priority(B), A runs (B doesn’t).
    * Rule 2
        * If Priority(A) = Priority(B), A & B run in round-robin fashion using the time slice (quantum length) of the given queue.
    * Rule 3
        * When a job enters the system, it is placed at the highest priority (the topmost queue).
    * Rule 4
        * Once a job uses up its time allotment at a given level (regardless of how many times it has given up the CPU), its priority is reduced (i.e., it moves down one queue).
    * Rule 5
        * After some time period S, move all the jobs in the system to the topmost queue.

## Multicore CPU

* SQMS (singlequeue multiprocessor scheduling)
* MQMS (multi-queue multiprocessor scheduling)

* Linux Multiprocessor Schedulers
    * O(1) scheduler
    * the Completely Fair Scheduler (**CFS**)
    * the BF Scheduler (**BFS**)
    
| Scheduler | Queue |
|--|--|
| O(1) | multiple |
| CFS | multiple |
| BFS | single |
