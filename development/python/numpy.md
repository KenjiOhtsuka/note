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

## NumPy Array の 部分行列

NumPy Array は リストと同様に 次のようにして 一部を取り出すことができる。

```python
a[2:5]
a[2:]
a[:5]
a[::-1]
```

さらに、配列の場合は行・列について それぞれ次のように記述することができる。

```python
a[:2]
a[:2, 0]
a[:2, ::-1]
```

## ブロードキャスト

サイズの異なる配列同士の計算。

```python
1 + np.array([1, 2, 3])
>>> array([2, 3, 4])
```

```python
np.array([[1, 2], [3, 4]]) + np.array([5, 6])
>>> array([[ 5,  8],
           [ 8, 10]])
```

```python
np.array([1, 2, 3])[:, np.newaxis])
>>> np.array([[1],
              [2],
              [3]])
```

## Reshape

* 1次元ベクトルを列ベクトルにする。
    * `reshape` の first parameter に　`-1` を代入する。
    
    ```pyrhon
    n = np.array([1, 2, 3])
    n.reshape(-1, 1)
    ```

## 結合

ベクトル、行列をくっつける。

* 横に結合する場合
    ```python
    np.hstack((a, b))
    ```
* 縦に結合する場合
    ```python
    np.vstack((a, b))
    ```
