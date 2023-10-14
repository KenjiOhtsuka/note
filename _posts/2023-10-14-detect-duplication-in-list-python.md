---
layout: post
date: 2023-10-14
title: "Detect duplication in list (Python)"
categories: [Programming Language]
tags: [Python]
---

## Problem

あるリストの中から、重複する要素を検出する。
<div lang="en">
<p>Detect duplication in list.</p>
</div>
<div lang="ru">
<p>Обнаружить дублирование в списке.</p>
</div>
<div lang="es">
<p>Detectar duplicación en la lista.</p>
</div>
<div lang="zh">
<p>检测列表中的重复。</p>
</div>



## Solution

```python
s = ['a', 'a', 'b', 'c', 'c']
from collections import Counter
c = Counter(s)
[x for x in c.items() if x[1] > 1]
# => [('a', 2), ('c', 2)]
```

