---
layout: page
---


## Reactive Streams

* ノンブロッキングによる非同期ストリーム処理の標準。
    * 目的地に超大量のデータを送らない。 適切な量を送る。

### コンポーネント

* Publisher
    * データを subscriber に送信する。
* Subscriber
    * 自分自身を publisher に登録し、 どれくらいのデータを publisher が送信するのかを指示する。
* Subscription
    * publisher で作成され、 subscriber と共有される。
* Processor
    * publisher と subscriber の間に存在する。 データの変換を行う。

### Reactor で使う型

* Mono
    * Publisher を実装しており 0 または 1 のリソースを返す。
* Flux
    * Publisher を実装しており 任意の数のリソースを返す。
    bFlux

## Spring Weg

* Spring 5 から導入された。



