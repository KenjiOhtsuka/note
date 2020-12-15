---
layout: page
---

## Fragmentation

* Internal Fragmentation
    * Memory block assigned to process is bigger. Some portion of memory is left unused, as it cannot be used by another process.
    * The internal fragmentation can be reduced by effectively assigning the smallest partition but large enough for the process.

* External Fragmentation
    * Total memory space is enough to satisfy a request or to reside a process in it, but it is not contiguous, so it cannot be used.
    * External fragmentation can be reduced by compaction or shuffle memory contents to place all free memory together in one large block. To make compaction feasible, relocation should be dynamic.


## Dynamic Relocation

* hardware-based address translation
* 2 registers
    * base register
    * bounds (limit) register
        * If a process generates a virtual address that is greater than the bounds, or one that is negative, the
CPU will raise an exception, and the process will likely be terminated.



## Segment

Value: base and logical pair

* three logically-different segments:
    * code
    * stack
    * heap: **grow backwards**
    
* OS places each segment in different parts of physical memory
    * avoid filling physical memory with unused virtual address space.
    
## Free List

/*
Best Fit
first, search through the free list and find chunks of free memory that are as big or bigger than the requested size.
Then, return the one that is the smallest in that group of candidates;

this is the so called best-fit chunk (it could be called smallest fit too). One
pass through the free list is enough to find the correct block to return.
The intuition behind best fit is simple: by returning a block that is close
to what the user asks, best fit tries to reduce wasted space. However, there
is a cost; naive implementations pay a heavy performance penalty when
performing an exhaustive search for the correct free block.

Worst Fit
find the largest chunk and return the requested amount; 
keep the remaining (large) chunk on the free list.

Worst fit tries to thus leave big chunks free instead of lots of
small chunks that can arise from a best-fit approach. Once again, however, a full search of free space is required, and thus this approach can be
costly. Worse, most studies show that it performs badly, leading to excess
fragmentation while still having high overheads.

First Fit
simply finds the first block that is big enough and returns the requested amount to the user.

First fit has the advantage of speed — no exhaustive search of all the free spaces are necessary
but sometimes pollutes the beginning of the free list with small objects.

Thus, how the allocator manages the free list’s order becomes an issue.
One approach is to use address-based ordering; by keeping the list ordered by the address of the free space, coalescing
becomes easier, and fragmentation tends to be reduced.

Next Fit
Instead of always beginning the first-fit search at the beginning of the list, the next fit algorithm keeps an extra pointer to the location within the
list where one was looking last. The idea is to spread the searches for
free space throughout the list more uniformly, thus avoiding splintering
of the beginning of the list. The performance of such an approach is quite
similar to first fit, as an exhaustive search is once again avoided.
*/
