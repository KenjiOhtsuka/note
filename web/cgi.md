---
layout: page
title: "CGI: Common Gateway Interface"
---

* CGIプログラム
    * CGI Script: Perl、awk、sh などコンパイル作業が不要なスクリプト言語で記述されたもの
    * 環境変数と標準入力を参照できて、結果を標準出力に書き出せるものであれば、C言語でも良い。

* 参考
    * http://www.din.or.jp/~raelian/cgi_formiddle.html
    * https://gogodiet.net/z/tips/1.htm
    * CGI サーバ(Apache)設定: https://gogodiet.net/z/tips/1.htm

## Advantage and Disadvantage

### Advantage

* 言語の選択肢が多い
    * サーバーOSで動作し、標準入出力を扱える言語なら、何でもOK。
    * 例えば Windows では、 VBScript や JScript も使える。

### Disadvantage

* 処理が遅い
    * Webサーバー側で動作するプログラムがすべての処理を担当するため、多数のクライアントから処理要求が集中すると処理が遅くなる。
    * 要求ごとにプログラムが起動されて、サーバ負荷が大きくなる。


## Web server categorization

* Web Application
    * CGI
        * サーバアプリケーションがCGIプログラムを実行
        * サーバアプリケーションが別プログラム(php-cgiなど)経由でCGIプログラムを実行
    * Module
        * Webサーバのプロセスとして実行される

https://www.fumi.org/neta/201205sv.html
