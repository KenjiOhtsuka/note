---
layout: page
---



* Publisher
    * データを subscriber に送信する。
* Subscriber
    * 自分自身を publisher に登録し、 どれくらいのデータを publisher が送信するのかを指示する。
* Subscription
    * publisher で作成され、 subscriber と共有される。
* Processor
    * publisher と subscriber の間に存在する。 データの変換を行う。
