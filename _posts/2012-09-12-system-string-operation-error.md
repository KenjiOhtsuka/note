---
layout: post
title: System.Int32 および System.String で '>=' 操作を実行できません。
categories: visualbasic string
tags: visualbasic string
---


Visual Basic 2010 のお話です。

あるプロジェクトで、 DataTable について次のようなコードを書いて実行したらエラーになりました。
データベースから取得したデータを DataTable に格納し、その中の数値型フィールド「MyField」に対して操作を行うコードです。

```
Dim dt As DataTable
...
Dim dr() As DataRow
dr = dt.Select("MyField >= " & "20000101")
```

一部省略していますが、dt はデータベースから取ってきたデータを格納していて、
MyField は数値型のフィールドです。
"20000101" は変数だったのですが、ここではわかりやすくするために直接値を指定しています。

これを実行するとエラーが出ます。

> System.Int32 および System.String で '>=' 操作を実行できません。

英語の場合は次のメッセージが出るようです。

> Cannot perform '>=' operation on System.Int32 and System.String.

MyField は数値のはずなのですが、どうもそんなにうまくはいかないようです。
おそらく MyField が NULL(値なし) の場合にエラーになっているのだろう・・・ということで、
次のようにしたら問題なく動くようになりました。

```
dr = dt.Select("MyField <> '' AND MyField >= 20000101")
```

