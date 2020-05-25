---
date: 2020-05-26 10:52:48 +0900
title: Wordpress on AWS
categories: Wordpress AWS
layout: post
---

あるレンタルサーバからAWSへのWordpressの移設で、管理画面(wp-login.php)にアクセスすると同一URLへのリダイレクトが繰り返し行われるというトラブルに遭遇した。

これは AWS EC2 の 中に
