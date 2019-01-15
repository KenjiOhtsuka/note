---
layout: page
---

# Date science basic

## 5V

* Source
    * Volume
    * Velocity
    * Variety
    * Veracity
* Output
    * Value

## GPU

CGにおいては並列性の高い単純計算処理が大量に必要となるため、
GPUにはそれを支える大量の計算コアが搭載されている。
データサイエンスにおいても大量の単純計算が必要となるため、
GPUはデータサイエンスに適したコンポーネントである。

対してCPUはコアがせいぜい8で、
それぞれのコアはハイスペックだが並列性がGPUより低い。

## Python Library

* 行列演算
    * SciPy, Numpy
* 描画
    * matplotlib,seaborn, NetworkX
* データフレーム処理
    * Pandas
* 機械学習
    * scikit-learn
* トピックモデル
    * gensim
* 深層学習
    * PyTorch, TensorFlow
    
## Prediction

* True Positive (TP)
    * Evaluated as Positive, and it's true
* True Negative (TN)
    * Evaluated as Negative, and it's true
* False Positive (FP)
    * Evaluated as Positive, and it's false
* False Negative (FN)
    * Evaluated as Negative, and it's false

### Evaluation

* Accuracy = T / All
    * T (True) = TP + TF
    * All = TP + TF + FP + FN
* Precision = TP / (TP + FP)
* Recall = TP / (TP + FM)
    
## Activation Function

### Sigmoid Function

```
s(x) = 1 / (1 + exp(x))
```

微分しても、シグモイド関数を使って表すことができる。

```
s'(x) = s(x)(1 - s(x)
```

### Hyperbolic Tangent

勾配がシグモイド関数よりも消失しにくい。
高次元のデータの場合には

```
th(x) = (exp(x) - exp(-x))/(exp(x) + exp(-x))
```

```
th'(x) = 4 / (exp(x) + exp(-x)) ^ 2
```

### ReLU

正規化線形関数、ランプ関数とも呼ばれる。

導関数が必ず 0 or 1 となるため、 勾配が消失しない。
そのため学習が早く進む。

また、式が単純であるため計算が高速。

```
f(x) = max(0, x)
f'(x) = (x / abs(x) + 1) / 2
```

### Leaky ReLU

`x < 0` でも勾配をつける活性化関数。

```
f(x) = max(ax, x)
```

```python
def lrelu(x, alpha=0.01):
   return tf.maximum(alpha * x, x)
```
