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

## NumPy Array のファクトリーメソッド

### 全成分が0 零行列

* ベクトル
    ```python
    np.zeros(4)
    ```
* 行列
    ```python
    np.zeros(4).reshape(2, 2)
    ```

### 全成分が1

* ベクトル
    ```python
    np.ones(4)
    ```
* 行列
    ```python
    np.ones(4).reshape(2, 2)
    ```

### 単位行列

```
np.identity(3)
```

### 等間隔の整数

* 0 から始まる整数で 要素が `n`個 のベクトル
    ```python
    np.arange(n)
    ```
* a から始まる整数で 要素が (`b - a + 1`)個 のベクトル
    ```python
    np.arange(a, b)
    ```
* a + nc なる整数 (nはゼロ以上の整数) で、 b 未満のものを順に含むベクトル
    ```python
    np.arange(a, b, c)
    ```
    * a, b, c は float でも良い。
