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

Ranges of physical memory which is not currently in use

### Best Fit
    * Find **smallest** chunk which is bigger than requested.
    * naive implementations pay a heavy performance penalty when performing an exhaustive search for the correct free block.
    
### Worst Fit
    * find the largest chunk and return the requested amount; 
    * keep the remaining (large) chunk on the free list.

Worst fit tries to thus leave big chunks free instead of lots of small chunks that can arise from a best-fit approach.

    * a full search of free space is required, and thus this approach can be costly. Worse, most studies show that it performs badly, leading to excess
fragmentation while still having high overheads.

### First Fit
    * simply finds the **first block** that is big enough and returns the requested amount to the user.
    * advantage of speed — no exhaustive search of all the free spaces are necessary
    * sometimes pollutes the beginning of the free list with small objects.

Thus, how the allocator manages the free list’s order becomes an issue.
One approach is to use address-based ordering; by keeping the list ordered by the address of the free space, coalescing becomes easier, and fragmentation tends to be reduced.

### Next Fit
    * an extra pointer to the location within the list where one was looking last.
    * avoiding splintering of the beginning of the list.
    * The performance of such an approach is quite similar to first fit, as an exhaustive search is once again avoided.
    
* `sbrk`
    * the OS finds free physical pages, maps them into the address space of the requesting process, and then returns the value of
the end of the new heap
    * a larger heap is available, and the request can be successfully serviced.


## Code sharing

* If code is placed within a separate segment, such a segment could potentially be shared across multiple running programs

## Segregated List

* if a particular application has one (or a few) popular-sized request that it makes, **keep a separate list** just to manage objects of that size
* all other requests are forwarded to a more general memory allocator.

## Buddy allocation
