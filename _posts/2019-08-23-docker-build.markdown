---
layout: page
categories: docker container mount
date: 2019-08-23 10:00:00
title: Dockerfile から docker container を作るまで
---

# Dockerfile から docker container を作るまで

1. イメージを作成する

    docker build .

1. 作ったイメージに名前をつける

    docker tag 661c80f0f265 something_name

1. 起動する

    docker run -v "/Users/kenjiotsuka/project/":"/var/www/html/" -i -t -p 9020:443 -p 9010:80 something_name /bin/bash

    * ポートは `<ホスト>:<ゲスト>` という記述。
    * `-v` でホストのディレクトリをゲストにマウント。
