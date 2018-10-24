---
layout: python
---

# NumPy

## Transported Matrix

```python
a.T
```

## Multiplication

* 行列の積は `np.dot` で計算する。
* 行ベクトル、列ベクトルは区別されない。 そのため転置して積を求めなくても、 そのまま積の計算をすれば良い。 行列 (NumPy Array) の場合は転置によって値が変わる。
