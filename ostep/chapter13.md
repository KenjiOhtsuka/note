---
layout: page
---

## 1

This is the output of `man free` in AWS EC2. `man free` result in macOS is different.

```
FREE(1)                                                                                                                                                                 Linux User's Manual                                                                                                                                                                FREE(1)

NAME
       free - Display amount of free and used memory in the system

SYNOPSIS
       free [-b | -k | -m | -g | -h] [-o] [-s delay ] [-c count ] [-a] [-t] [-l] [-V]

DESCRIPTION
       free displays the total amount of free and used physical and swap memory in the system, as well as the buffers used by the kernel.  The shared memory column represents the 'Shmem' value.  The available memory column represents the 'MemAvailable' value.

   Options
       The -b switch displays the amount of memory in bytes; the -k switch (set by default) displays it in kilobytes; the -m switch displays it in megabytes; the -g switch displays it in gigabytes.

       The -h switch displays all output fields automatically scaled to the shortest (three digit) representation including the unit. That makes the values human readable.

       The -t switch displays a line containing the totals.

       The -o switch disables the display of a "buffer adjusted" line.  If the -o option is not specified, free subtracts buffer memory from the used memory and adds it to the free memory reported.

       The -s switch activates continuous polling delay seconds apart. You may actually specify any floating point number for delay, usleep(3) is used for microsecond resolution delay times.

       The -c switch used together with the -s switch interrupts the polling after count repetitions.

       The -l switch shows detailed low and high memory statistics.

       The -a switch shows the available memory (if supported by the running kernel and enabled with sysctl -w vm.meminfo_legacy_layout=0 ; shows zero when unsupported or disabled). The produced output is wider than 80 characters.

       The -V switch displays version information.

FILES
       /proc/meminfo-- memory information

SEE ALSO
       ps(1), slabtop(1), vmstat(8), top(1)

AUTHORS
       Written by Brian Edmonds.

       Send bug reports to <albert@users.sf.net>

Cohesive Systems                                 
```

## 2

```sh
free -bt
free -kt
free -mt
free -gt
free -s 1
# statistic
free -l
# version
free -a
free -V
```
