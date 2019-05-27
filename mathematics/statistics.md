---
layout: page
---

# Statistics

From the sample data, we can calculate a statistic. 

* statistic (統計量)
    * a number that is a property of the sample.
    * can be used to estimate something
    * example:
        * mean (average), variables.
* parameter
    * a number that is a property of the population.
    

## 標本抽出と調査

* 全数調査: 母集団全体を対象とした調査
* 標本調査: 標本を対象とした調査

### 標本抽出法

#### 無作為抽出

| 名前 | 手順 | 必要事項 | 特徴 |
|:--|:--|:--|:--|
| 単純無作為抽出方 | 母集団から無作為に抽出する。| 母集団全体の情報を入手する必要がある。 | |
| 層別抽出法 | あらかじめカテゴライズされた各カテゴリごとに、単純無作為抽出法を行う。 | 母集団全体の情報を、どの層にカテゴライズされるかの情報も含めて入手する必要がある | 層ごとに結果が大きく異なりそうな場合に使われる。 |
| 2段抽出方 | 多数あるカテゴリの中からいくつかを選択し、その後、選ばれたカテゴリの中で単純無作為抽出方を行う。 | 最初に選ぶカテゴリの数、各カテゴリについて単純無作為抽出をする標本数は分析者に委ねられる。 | |
| 層別抽出方 | あらかじめカテゴライズされた各カテゴリからいくつか選び、選ばれたカテゴリをさらに分割していくつか選択し、その中で単純無作為抽出を行う。 | | 規模の大きい調査では適している。 |

#### 有為抽出

| 名称 | 標本 |
|:--|:--|
| 紹介法・縁故法 | 知人・友人などの調査に協力してくれる人を紹介してもらう |
| 雪だるま法 | 知人・友人などに紹介してもらい、その人にさらに紹介してもらう |
| 応募法 | 愛読者カードなどで応募してきた人 |
| インターセプト法 | 街頭で調査に協力してくれた人 |

### 標本数

True/False のアンケートの場合、次のように標本数を決める。
母集団の確率を {% raw %}\\( P \\){% endraw %}, 標本の確率を {% raw %}\\(p\\){% endraw %}, 標本数を {% raw %}\\(n\\){% endraw %} とする。

信頼係数95%として次の式が成り立つ。

{% raw %}
\\\[p-1.96\\sqrt{\\frac{p(1-p)}{n}} \\leq P \\leq p+1.96\\sqrt{\\frac{p(1-p)}{n}} \\\]
{% endraw %}

ここで p, P の差(統計誤差)を p のどれくらいの割合(a)にしたいかを決め、 p の予測をする。
そして、 p の予測値と a を用いて次の式から n の最小値を決める。

{% raw %}
\\\[1.96\\sqrt{\\frac{p(1-p)}{n}} \\leq ap \\\]
{% endraw %}

### 調査方法

| 名称 | 手順 | 特徴 |
|:--|:--|:--|
| 郵送調査 | 記入表を郵送する | 住所録などの名簿が必要。 2,3割の回答率。 質問を多く設定できる。 |
| インターネット調査(一般参加) | 不特定多数から Web で回答を募る。 | 質問を多く設定できない。 標本を意図的に作成できないため、偏りが生じがち。 |
| インターネット調査(モニター) | モニターから Web で回答を募る。 | 質問を多く設定できない。 標本がとても偏る。 |
| 面接調査 | 会ってその場できく | |
| 留め置き調査| 記入表を渡して回収日に再訪問する | |
| 電話調査 | 名簿をもとに電話をかける | |
| RDD(Random Digit Dialing)調査 | ランダムに生成された電話番号に電話をかける | |

{% raw %}
\\( x \\)
$$ x $$
{% endraw %}

### 調査内容

* 質的調査
    * 少人数を対象とした取材
* 量的調査
    * 調査票や官公庁のデータに基づく調査

### 調査票

#### 構成

次の順に質問を並べると回答率が上がりやすい。

1. 実態を聞く
    * やったことがあるか、持っているか、いつ買ったか、どこで買ったか
2. 意識を聞く
    * 満足・不満な店・理由、価値観
3. 属性を聞く
    * 年齢、性別、結婚歴、収入、学歴、家族構成

#### 質問

* 少人数を対象とした取材

## Random variables

### The Binomial random variable

{% raw %}
\\begin{eqnarray} X & \\sim & \\textrm{Binomial}(n, p) \\\\\\
\\textrm{P}(X = x) & = & \\begin{pmatrix} n \\\\ x \\end{pmatrix} p^x (1 − p)^{n−x} \\\\\\
\\textrm{E}(X) & = & np \\\\\\
\\textrm{V}(X) & = & np(1-p)
\\end{eqnarray}
{% endraw %}

#### Calculation

{% raw %}
\\begin{eqnarray}
np & \\rightarrow & \\lambda \\\\\\  
n & \\rightarrow & \\infty \\\\\\  
f(x) & = & \\frac{n!}{x!(n-x)!} p^x (1 - p)^{n-x} \\\\\\  
& = & \\frac{n!}{x!(n-x)!} \\left( \\frac{\\lambda}{n} \\right) ^x \\left( 1 - \\frac{\\lambda}{n} \\right) ^ {n-x} \\\\\\  
& = & \\frac{n!}{n^x (n-x)!}  \\frac{\\lambda ^ x}{x!}  \\left( 1 - \\frac{1}{\\frac{n}{\\lambda}} \\right) ^ {n-x} \\\\\\  
& = & \\frac{n!}{n^x (n-x)!}  \\frac{\\lambda ^ x}{x!}  \\left( 1 - \\frac{1}{\\frac{n}{\\lambda}} \\right) ^ {\\frac{n}{\\lambda} \\lambda \\frac{n-x}{n}} \\\\\\  
& \\rightarrow & 1 \\cdot \\frac{\\lambda ^ x}{x!} \\cdot e^{ (- \\lambda ) \\cdot 1} \\\\\\  
& \\rightarrow & \\frac{e^{ -\\lambda} \\lambda ^ x}{x!} 
\\end{eqnarray}
{% endraw %}

#### R

* `dbinom(X, n, p)`
* `pbinom(X, n, p)`

### The Poisson random variable

used as an approximation of the total number of occurrences of rare events.

&lambda; : expectation

{% raw %}
\\begin{eqnarray}
1 - p & \\fallingdotseq & 1 \\\\\\   
X & \\sim & \\textrm{Poisson}( \\lambda ) \\\\\\  
\\textrm{P}(X = x) & = & \\frac{ e ^{ - \\lambda} \\lambda ^ x }{ x ! } \\\\\\  
\\textrm{E}(X) & = & \\lambda \\\\\\  
\\textrm{V}(X) & = & \\lambda
\\end{eqnarray}
{% endraw %}

#### R

* `dpoi(X, l)`
* `ppoi(X, l)`

### The Uniform random variable

{% raw %} \\begin{eqnarray}
X & \\sim & \\textrm{Uniform}(a, b) \\\\\\  
f(x) & = & \\frac{ 1 }{ b - a } \\\\\\  
\\textrm{E}(X) & = & \\frac{a + b}{2} \\\\\\  
\\textrm{V}(X) & = & \\frac{(b - a)^2}{12}  
\\end{eqnarray} {% endraw %}

### The Exponential random variable

used to model times between events

&lambda; : rate of the distribution

{% raw %} \\begin{eqnarray}
X & \\sim & \\textrm{Exponential}( \\lambda ) \\\\\\
f(x) & = & \\begin{cases} \\lambda e ^{− \\lambda x} & ( 0 \leq x) \\\\\\ 0 & (x \lt 0) \\end{cases} \\\\\\
\\textrm{E}(X) & = & \frac{1}{\\lambda} \\\\\\
\\textrm{V}(X) & = & \frac{1}{\\lambda ^ 2}
\\end{eqnarray} {% endraw %}

### The xdensity and cumulative probability of a continuous random variable

The computation of expectation and variance in a continuous random variable

## 統計量

* 不偏性

    期待値が母数に一致する性質。 
    
* 一致性

    標本の大きさを大きくしていくと、推定量の値が母数に近づく性質。
    
* 有効性

    分散が最小である性質。

標本平均は上記3つの全ての性質を併せ持つ。

* 標本平均

    {% raw %}
    \\\[ \\bar{X} = \\frac{1}{n} \\sum \_{k=1}^{n} X \_k \\\]
    {% endraw %}

* 不偏分散

    {% raw %}
    \\\[ s^2 = \\frac{1}{n - 1} \\sum \_{k=1}^{n} \\left( X \_k - \\bar{X} \\right) ^2 \\\]
    {% endraw %}

\\(T\\) は自由度 \\( n-1 \\) の \\(t\\) 分布に従う。

\\\[ T = \\frac{\\bar{X}-\\mu}{\\frac{s}{\\sqrt{n}}} \\\]
