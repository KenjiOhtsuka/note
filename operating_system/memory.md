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
