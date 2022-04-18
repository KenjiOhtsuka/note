---
layout: page
title: Programming Language
---

## 形式文法

形式文法 _G_ は 集合 _N_, _&Sigma;_, _P_ と状態 _S_ を用いて表される。

_G = <N, &Sigma;, P, S>_

* _N_: non-terminal symbol, 非終端記号
* _&Sigma;_: terminal symbol, 終端記号
* _P_: rewriting rule, 書き換え規則
* _S_: initial Symbol, 初期記号 (_S_ is in _N_)

書き換え規則 _p_ : _&alpha;_ -> _&beta;_ について、 _p_, _&alpha;_, _&beta;_ をそれぞれ書き換え規則の名前、左辺、右辺という。

* 非終端規則 (non-terminating rule): 右辺に非終端記号を含む
* 終端規則 (terminating rule): 右辺に非終端記号を含まない
* 空語規則 (&epsilon;-rule): 右辺が &epsilon;

左辺から右辺が導出されることを "=>" で表す。

文法 _G_ によって導出される言語 _L_(_G_) は次の様に表される。

_L_(_G_) = { w | S =><sup>\*</sup> w in &Sigma;<sup>\*</sup> }

(ここで <sup>\*</sup> は 0回以上の繰り返しを表している。)

### 文法の分類(クラス)

上の 文法 _G_ において、 空語規則を持たない場合、 次の様に言語を分類できる。 _V_ = _N_ + _&Sigma;_, _V_<sup>+</sup> = _V_<sup>\*</sup> - { _&epsilon;_ } とする。

* 文脈依存文法
    * すべての書き換え規則 _&alpha;_ -> _&beta;_ について、 _&alpha;_ = _&alpha;_<sub>1</sub>_A&alpha;_<sub>2</sub>, _&beta;_ = _&alpha;_<sub>1</sub>_&gamma;&alpha;_<sub>2</sub> の形をしている。 (_A_ in _N_, _&alpha;_<sub>1</sub>, _&alpha;_<sub>2</sub> in _V_<sup>\*</sup>, _&gamma;_ in _V_<sup>+</sup>)
* 文脈自由文法
    * すべての書き換え規則について _&alpha;_ = _A_。 (_A_ in _N_, _&beta;_ in _V_<sup>+</sup>)
    * 空語規則を持たないので _&beta;_ in _V_<sup>+</sup>。 通常の定義では  _&beta;_ in _V_<sup>\*</sup>。
* 正規文法
    * すべての書き換え規則について _&alpha;_ in _A_, _&beta;_ = _aB_ or _a_。 (_A_, _B_ in _N_, _a_ in _&Sigma;_)


空語を含む言語についての書き換え規則は _S_ -> _&epsilon;_ のみがあれば十分である。 (左辺が _S_ でない書き換え規則は _a_ -> _b_ のように異なる記号を当てはめて整理することで、 空語規則を _S_ -> _&epsilon;_ のみにすることができる。) _G_ から唯一の空語規則 _S_ -> _&epsilon;_ を除いて得られる文法を _G_' とするとき、 _G_ と _G_' は同じクラスの文法であるとする。 

## 正規表現

正規表現は、次の様に和集合演算、連接演算、スター閉包を用いて再帰的に定義できる。
&Sigma; をアルファベットとする。

* &empty;(空集合), _&epsilon;_(空語) は正規表現。
* 任意の _a_ &in; &Sigma; について、 _a_ は正規表現。
* 正規表現 _r_<sub>1</sub>, _r_<sub>2</sub> について、 (_r_<sub>1</sub> + _r_<sub>2</sub>), _r_<sub>1</sub>_r_<sub>2</sub>, _r_<sub>1</sub><sup>\*</sup> も正規表現。

ここで _&epsilon;r_ = _r&epsilon;_ = _r_, _r_&empty; = &empty;_r_ = &empty;。