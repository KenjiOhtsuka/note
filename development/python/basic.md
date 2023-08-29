---
layout: page
title: Python Basic
---

## 型

### ブール型

数値型のサブタイプ

```python
True         # => True  <class 'bool'>
False        # => False <class 'bool'>
True + 0     # => 0     <class 'int'>
1 + True     # => 2     <class 'int'>
1 + False    # => 1     <class 'int'>
True + False # => 1     <class 'int'>
```

## 演算子

* 整数部分のみを出す。 `//`
    ```sh
    6 // 4
    ```

## リスト

### 部分配列

* 範囲を指定する
    ```python
    l[a:b]
    ```
    * a: 最初の要素のインデックス
    * b: 最後の要素のインデックス + 1
* ある位置以降の範囲
    ```python
    l[a:]
    ```
    * a: 最初の要素のインデックス
* ある位置までの範囲
    ```python
    l[:b]
    ```
    * b: 最後の要素のインデックス + 1
    
#### コピー

* 配列の代入は参照のコピーになる。
    ```python
    a = [1, 2, 3]
    b = a          # 参照のコピー
    ```
* 実態をコピーするには `[:]` を使う。
    ```python
    a = [1, 2, 3]
    b = a[:]
    ```
* 入れ子になった配列をコピーするには、 `copy.deepcopy` を使う。
    ```python
    a = [[1, 2], [3, 4]]
    b = copy.deepcopy(a)
    ```

### スライス

* 範囲とステップを指定する
    ```python
    l[a:b:c]
    ```
    * a: 最初の要素のインデックス
    * b: 最後の要素のインデックス + 1
    * c: 隣り合う要素のインデックスの隔たり (1にすると連続する要素となる、ないのと同じ)
* ステップのみ師弟する
    ```python
    l[::c]
    ```
    * インデックスが nc (nはゼロ以上の整数) の要素を抽出
    * c はゼロ未満の整数でもよい

#### 改行

* 改行してもいい場所
    * `(` の後
* 改行するとまずい場所
    * `or`, `and` の後

改行するとまずい場所で改行するには、`\`を書いてその直後に改行する。

## Docstring

### Format

#### Epytext

It is like Javadoc

```python
"""
Epytext style.

@param param1: first param
@param param2: second param
@return: description
@raise keyError: raises an exception
"""
```

#### reST

It is used in IntelliJ IDEA as default.
It is used also in Sphinx.

```python
"""
reST style.

:param param1: first param
:param param2: second param
:returns: description
:raises keyError: raises an exception
"""
```

#### Google

```python
"""
Google style.

Args:
    param1: first param.
    param2: second param.

Returns:
    description

Raises:
    KeyError: Raises an exception.
"""
```

#### Numpydoc

```python
"""
numpydoc style.

Parameters
----------
first : array_like
    the 1st param, `first`
second :
    the 2nd param
third : {'value', 'other'}, optional
    the 3rd param, by default 'value'

Returns
-------
string
    value description

Raises
------
KeyError
    a key error
OtherError
    an other error
"""
```
