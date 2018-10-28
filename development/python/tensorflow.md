---
layout: page
---

# TensorFlow

## Install

```sh
pip install tensorflow
```
## Import

```python
import tensorflow as tf
```

## Variable

TensorFlow では、 2種類の変数を使い分ける。

* 固定値
* 値の入れ物として繰り返し更新して使う変数

繰り返し更新して使う変数は、次のようにして定義する。

```python
tf.Variable(tf.zeros([2, 1]))
```

## ゼロの配列

`tf.zeros` で要素がゼロの多次元配列を生成する。

## Placeholder

数式における変数を定義する。

```python
x = tf.placeholder(tf.float32, shape=[None, 2])
y = tf.placeholder(tf.float32, shape[None, 1])
y = tf.nn.sigmoid(tf.matmul(x, w) + b)
```
