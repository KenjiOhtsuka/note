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

## 3

This code is to be compiled with `gcc memory-user.c -std=gnu99`.

```c
#include <stdio.h>
#include <stdlib.h>
#include <sys/time.h>

int main(int argc, char *argv[]) {
    if (argc < 2) {
        printf("Add argument: number of memory in megabyte\n");
        return -1;
    }
    // the number of megabytes of memory in byte
    long size = atoi(argv[1]) * 1024 * 1024;
    printf("array size in byte: %ld\n", size);

    int timeLength;
    if (argc < 3) {
        timeLength = -1;
    } else {
        timeLength = atoi(argv[2]);
    }

    // allocate memory
    int *array = malloc(size);

    struct timeval tv;
    struct timezone tz;
    gettimeofday(&tv, &tz);
    long startTime = tv.tv_sec;

    while (1) {
        if (timeLength != -1) {
            gettimeofday(&tv, &tz);
            if (tv.tv_sec - startTime >= timeLength) break;
        }
        for (long i = 0; i < size / sizeof(int); ++i) {
            array[i] ^= array[i];
        }
    }

    free(array);
}
```

## 4

```sh
% free -b;./a.out 100 5 &; free -b -s 1 -c 7 
             total       used       free     shared    buffers     cached
Mem:    7648620544 5265272832 2383347712     110592  103882752  335581184
-/+ buffers/cache: 4825808896 2822811648
Swap:            0          0          0
[1] 23439
array size in byte: 104857600
             total       used       free     shared    buffers     cached
Mem:    7648620544 5267058688 2381561856     110592  103882752  335581184
-/+ buffers/cache: 4827594752 2821025792
Swap:            0          0          0

             total       used       free     shared    buffers     cached
Mem:    7648620544 5370163200 2278457344     110592  103882752  335581184
-/+ buffers/cache: 4930699264 2717921280
Swap:            0          0          0

             total       used       free     shared    buffers     cached
Mem:    7648620544 5370097664 2278522880     110592  103882752  335581184
-/+ buffers/cache: 4930633728 2717986816
Swap:            0          0          0

             total       used       free     shared    buffers     cached
Mem:    7648620544 5370224640 2278395904     110592  103882752  335581184
-/+ buffers/cache: 4930760704 2717859840
Swap:            0          0          0

             total       used       free     shared    buffers     cached
Mem:    7648620544 5370224640 2278395904     110592  103882752  335581184
-/+ buffers/cache: 4930760704 2717859840
Swap:            0          0          0

[1]  + done       ./a.out 100 5
             total       used       free     shared    buffers     cached
Mem:    7648620544 5265305600 2383314944     110592  103899136  335581184
-/+ buffers/cache: 4825825280 2822795264
Swap:            0          0          0

             total       used       free     shared    buffers     cached
Mem:    7648620544 5265874944 2382745600     110592  103899136  335589376
-/+ buffers/cache: 4826386432 2822234112
Swap:            0          0          0
```

```
% free -b;./a.out 100 5 &; PID=$! ; echo PID is $PID ; free -b -s 1 -c 2; kill $PID; free -b -s 1 -c 2
             total       used       free     shared    buffers     cached
Mem:    7648620544 5265784832 2382835712     110592  104521728  335708160
-/+ buffers/cache: 4825554944 2823065600
Swap:            0          0          0
[1] 23606
PID is 23606
array size in byte: 104857600
             total       used       free     shared    buffers     cached
Mem:    7648620544 5266935808 2381684736     110592  104521728  335708160
-/+ buffers/cache: 4826705920 2821914624
Swap:            0          0          0

             total       used       free     shared    buffers     cached
Mem:    7648620544 5370548224 2278072320     110592  104521728  335708160
-/+ buffers/cache: 4930318336 2718302208
Swap:            0          0          0

             total       used       free     shared    buffers     cached
Mem:    7648620544 5348904960 2299715584     110592  104521728  335708160
-/+ buffers/cache: 4908675072 2739945472
Swap:            0          0          0

[1]  + terminated  ./a.out 100 5
             total       used       free     shared    buffers     cached
Mem:    7648620544 5266128896 2382491648     110592  104521728  335708160
-/+ buffers/cache: 4825899008 2822721536
Swap:            0          0          0
```

## 5

This is the output of `man pmap` in AWS EC2. `man free` result in macOS is different.

```
PMAP(1)                                                                                                                                                                 Linux User's Manual                                                                                                                                                                PMAP(1)

NAME
       pmap - report memory map of a process

SYNOPSIS
       pmap [ -x | -d ] [ -q ] pids...
       pmap -V

DESCRIPTION
       The pmap command reports the memory map of a process or processes.

GENERAL OPTIONS
       -x   extended       Show the extended format.
       -d   device         Show the device format.
       -q   quiet          Do not display some header/footer lines.
       -V   show version   Displays version of program.

EXTENDED AND DEVICE FORMAT FIELDS
       Address:   start address of map
       Kbytes:    size of map in kilobytes
       RSS:       resident set size in kilobytes
       Dirty:     dirty pages (both shared and private) in kilobytes
       Mode:      permissions on map: read, write, execute, shared, private (copy on write)
       Mapping:   file backing the map, or '[ anon ]' for allocated memory, or  '[ stack ]' for the program stack
       Offset:    offset into the file
       Device:    device name (major:minor)

SEE ALSO
       ps(1) pgrep(1)

STANDARDS
       No standards apply, but pmap looks an awful lot like a SunOS command.

AUTHOR
       Albert Cahalan <albert@users.sf.net> wrote pmap in 2002, and is the current maintainer of the procps collection. Please send bug reports to <procps-feedback@lists.sf.net>.

Linux                                                                                                            
```
