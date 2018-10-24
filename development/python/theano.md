---
layout: page
---

# Theano

* 数値計算を高速化してくれるライブラリ。
* Online Document "Deep Learning Tutorials" で モデルの実装に用いられている。
* 実行時に Cのコードが生成・コンパイルされる (高速)
* 自動微分できる

## Install

```sh
pip install theano
```

## インポート

```python
import theano
import theano.tensor as T
```

## シンボル

ベクトルや行列、スカラを表す変数は全てシンボルとして扱う。

### 定義の基本

* float型のスカラを表す `x` というシンボルを定義する
    ```python
    x = T.dscalar('x')
    ```
* int型のスカラを表す `x` というシンボルを定義する。
    ```python
    x = T.iscalar('x')
    ```
* ベクトルを定義する
    ```python
    x = T.dvector('x')
    ```
* 行列を定義する
    ```python
    x = T.dmatrix('x')
    ```
    
### 式によってシンボルを定義

* `x` というシンボルを用いて `y` というシンボルを定義する。
    ```python
    y = x ** 2 + x + 1
    ```

## 関数

### 定義

上のようにして定義した `y` を関数として扱うためには、関数を定義する。

```python
f = theano.function(inputs=[x], outputs=y)
```

* inputs, outputs はそれぞれ入力、出力に対応するシンボル。
* `theano.function` を呼び出した時には、 内部で数式に対応するプログラムがコンパイルされる。

### 利用

上のように定義すると次のように値が計算できる。

```python
f(1)
f(2)
f(3)
```

引数はスカラでなくても良い(ベクトルでも良い)。

## 微分

