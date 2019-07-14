---
layout: post
title: "さくらレンタルサーバ 入れ替え"
date: 2019-07-15 10:10:10 +0900
categories: server sakura
---

2014年ごろに契約したさくらのサーバから、2019年にモジュールモードが使えるようになった新生さくらのレンタルサーバにようやく移行した時の手順。

## ファイルコピー

移行先のサーバにログインして下記コマンドを実行。

```sh
rsync -r -z -v account@servec.com:/home/account/www/ ./www/
```

あとはディレクトリを適当に配置する。


## データベースのコピー

移行先で、移行元と同じ数のデータベースを作成しておく。

各データベースについて次の処理を実行する。

1. 移行元サーバで dump を作成する。

    ```sh
    mysqldump -u account -p -h mysql.server.com db_name > db_name.sql
    ```
    
1. 移行先サーバに流誤飲して dump をコピーする。

    ```sh
    scp -v account@server.com:/home/account/db_name.sql ./
    ```
    
1. 移行先サーバで dump を取り込む。

    ```sql
    mysql -u account -p -h mysql.server.com db_name < db_name.sql
    ```
