---
layout: page
title: コネクション型とコネクションレス型
---

## コネクション型

* ストリーム型とも呼ばれる
* 通信の信頼性が保証される
* 相手に情報が伝わっていることを確認しながら 通信を行う
    * 相手と接続に関するやり取りを行う (TCP では 3 way handshake)
    * データが途中欠落することなく、 正しい順序で届く

## コネクションレス型

* データグラム型とも呼ばれる
* 通信の信頼性が保証されない
* 情報を今から伝えるということを、 相手に知らせずにデータを送信する
    * 送信元と宛先とでデータのやり取りに対する交渉を行わない
    * 相手が受け取る準備ができているかにかかわらず，いきなり送信する
    * 情報が確かに相手に届くことや、到着順は保証されない。

<!--
コネクション型の通信では、いろいろな機器が接続され、複数のネットワークを介しているにもかかわらず、通信を行う2台のコンピュータはあたかも1本の回線で結ばれたようになります。

　しかし、コネクション型の通信は信頼性が高くなる反面、さまざまな手続きを踏むので、オーバーヘッドがコネクションレス型と比べて大きくなってしまうという欠点があります。

　コネクションレス型による通信は、信頼性をある程度犠牲にしますが、その反面、作業に伴う交渉のオーバーヘッドがない分、処理が軽快という特徴があります。

しかし、ネットワーク機器の信頼性や回線の品質も良くなっていますので、信頼性も高くなっています。

通信の種類によっては、必ずしもコネクション型による通信が優れているとは言えません。
-->