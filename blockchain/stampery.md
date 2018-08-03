---
layout: page
---

# Stampery

## Verification algorithm

o = (i / 2^n) mod 2

i and n are equals to or more than 0.
In this equation, o will be 0 if i is less than 2^n.
Then, here is omicron table.

i value is in first row, n value is in left most column.

| |0|1|2|3|4|5|6|7|8|9|10|11|12|13|
|-:|-:|-:|-:|-:|-:|-:|-:|-:|-:|-:|-:|-:|-:|-:|
|0|0|1|0|1|0|1|0|1|0|1|0|1|0|1|
|1|0|0|1|1|0|0|1|1|0|0|1|1|0|0|
|2|0|0|0|0|1|1|1|1|0|0|0|0|1|1|
|3|0|0|0|0|0|0|0|0|1|1|1|1|1|1|

0 means merge with right hash, 1 means with left hash.

```
    ___o___
   ^       ^
  / \     / \
 ^   ^   ^   ^
| | | | | | | |
0 1 2 3 4 5 6 7
```

node 5 will be merged with left, right, left.
it corresponds to 1, 0, 1.
