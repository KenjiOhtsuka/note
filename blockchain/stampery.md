---
layout: page
---

# Stampery

## Verification algorithm

o = (i / 2^n) mod 2

In this equation, o will be 0 if i is less than 2^n.
Then, here is omicron table.

i value is in first row, n value is in left most column.

| |0|1|2|3|4|5|6|7|8|9|10|11|12|13|
|-:|-:|-:|-:|-:|-:|-:|-:|-:|-:|-:|-:|-:|-:|-:|
|0|0|1|0|1|0|1|0|1|0|1|0|1|0|1|
|1|0|0|1|1|0|0|1|1|0|0|1|1|0|0|
|2|0|0|0|0|1|1|1|1|0|0|0|0|1|1|
|3|0|0|0|0|0|0|0|0|1|1|1|1|1|1|


