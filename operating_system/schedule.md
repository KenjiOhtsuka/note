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
* proportional scheduler
    * instead of optimizing for turnaround or response time, a scheduler might instead try to guarantee that **each job obtain a certain percentage of CPU time**
    * examples
        * lottery scheduling
            * every so often, hold a lottery to determine which process should get to run next
            * processes that should run more often should be given more chances to win the lottery
            * there is no global state per process
        * Stride Scheduling
            * Each job in the system has a stride, which is **inverse in proportion to the number of tickets it has**.

## Multicore CPU

* SQMS (singlequeue multiprocessor scheduling)
* MQMS (multi-queue multiprocessor scheduling)
    * scales better than SQMS
    * fundamental problem: load imbalance

* Linux Multiprocessor Schedulers
    * O(1) scheduler
    * the Completely Fair Scheduler (**CFS**)
         * there is a single, system-wide vruntime
    * the BF Scheduler (**BFS**)
    
| Scheduler | Queue | Policy |
|--|--|--|
| **O(1)** | multiple | priority-based |
| **CFS** | multiple | deterministic proportional-share |
| **BFS** | single | complicated proportional-share (EEVDF) |

* Bus snooping
    * when each cache pays attention to memory updates by observing the **bus*** that connects them to main memory.
    * When a CPU then sees an update for a data item it holds in its cache, it will notice the change and either invalidate its copy or update it.
