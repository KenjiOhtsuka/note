---
layout: page
title: AWS EC2
---

* ELBはConnection Drainingに対応しているため、デタッチしたインスタンスおよびターゲットグループで処理中のコネクションは処理終了まで待機される。
    * たとえば Spring + Tomcat のような再起動が必要なアプリケーション構成でも、新しい EC2 を ELB に attach して使われる状態になってから、
    古い EC2 を dettach すれば、事実上無停止でリリースできる。
    * https://www.slideshare.net/mobile/AmazonWebServicesJapan/aws-black-belt-online-seminar-2016-elastic-load-balancing
* amazon-linux-extras
   * 有効にしたいものがあれば install, 無効にしたいものがあれば disable と記述する。
      ```sh
      sudo amazon-linux-extras disable nginx1.12
      sudo amazon-linux-extras install nginx1
      ```
