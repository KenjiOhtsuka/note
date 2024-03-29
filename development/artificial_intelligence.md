---
layout: page
title: Artificial Intelligence
---

Artificial intelligence is:

> Algorithms enabled by constraints exposed by representations that support
> models targeted at thinking perception action
>
> MIT. (2010). _Lecture 1_. Artificial Intelligence. https://ocw.mit.edu/courses/electrical-engineering-and-computer-science/6-034-artificial-intelligence-fall-2010/index.htm



## History

### 第1次AIブーム

* 1956年に行われたダートマス会議でAIという言葉が生まれた
    * ENIACが発表された1946年から10年後
* AIとは、探索や推論といったアルゴリズム
    * 今でいうコンピュータサイエンスの基礎
* 人工ニューロン(パーセプトロン)の考え方が生まれる。
* 現実のビジネス分野で利活用を行うほどには難しい問題を解くことができない「トイプロブレム問題」という課題があった。

### 第2次AIブーム

* 1980年代
* トイプロブレム問題の解決が目標
* エキスパートシステム
    * アメリカでは感染病への薬の処方や住宅ローンの審査に活用された。
    * あらかじめ特定の分野（例えば感染病に効く薬）のエキスパート（人間）が、知識をきちんと整理し「もし〜だったら、〜する」のような文章でまとめる。
       それをコンピュータ（エキスパートシステム）に教える。 あとはコンピュータがうまく処理できる。
    * 人間の持っている知識を正確に教えることが課題となり、普及しなかった。
* 人工ニューロン技術
    * 1979年にはNHK放送技術研究所の福島邦彦氏がネオコグニトロンを論文で発表。
    * ネオコグニトロンは人工ニューロンを組み合わせたニューラルネットワークによって、画像認識を行う。
    * ディープラーニングで画像認識を行う仕組みと類似している。
    * コンピュータの性能が低く、画像認識を行う仕組みを作るために必要な大量の画像を準備することもできなかった
    
### 第3次AIブーム

* イベント
    * 2011年: IBMのWatsonがアメリカの有名なクイズ番組であるJeopardy!で2人のチャンピオンから勝利を収めた
    * 2012年: ディープラーニングが登場して画像認識の精度が大幅に向上した
    * 2016年: AlphaGoが囲碁の世界トップクラスの棋士であるイ・セドル氏に勝った
* オントロジー
    * ヘビーウェイト・オントロジー
        * 人間がいかに知識を記述すればコンピュータにとって分かりやすいかという研究
        *「コンピュータにとって分かりやすい」方法であるため、人間にとって分かりづらいこともあった
    * ライトウェイト・オントロジー
        * 文章をできるだけそのままの形でコンピュータに理解させる
        * ヘビーウェイト・オントロジーほど正確に理解させることはできない
        * 人間にとって楽
        * Watson でも活用
* ディープラーニング
    * ILSVRC（ImageNet Large Scale Visual Recognition Competition) で飛躍的な成果を出した。
        * 画像認識の精度を競い合うコンテスト
        * 誤答率
            一番成績の良いものの誤答率
            | 年 | 率 |
            |:--|:--|
            | 2011 | 26 % |
            | 2012 | 16 % |
            | 2015 | 3.6 % |
        * 人間の誤答率は 5.1 %
        * 2015年のトップの成績はディープラーニングによって出た。

## 機械学習で扱うデータ

* 質的データ
    * 順序、性別、物の名前
* 量的データ
    * 離散値
        * 人数
    * 連続値
        * 身長、金額、時間(長さ)


## Open lectures

* https://ocw.mit.edu/courses/electrical-engineering-and-computer-science/6-867-machine-learning-fall-2006/
* https://ocw.mit.edu/courses/electrical-engineering-and-computer-science/6-034-artificial-intelligence-fall-2010/index.htm
* https://tamarabroderick.com/ml.html
