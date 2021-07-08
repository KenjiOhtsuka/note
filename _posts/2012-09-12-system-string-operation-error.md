---
layout: post
title: System.Int32 および System.String で '>=' 操作を実行できません。
--
 
Visual Basic 2010 のお話です。

あるプロジェクトで、 DataTable について次のようなコードを書いて実行したらエラーになりました。


```
Dim dt As DataTable
...
Dim dr() As DataRow
dr = dt.Select("KEIJOYMD >= " & "20000101")
```

一部省略していますが、`dt` はデータベースから取ってきたデータを格納していて、
`KEIJOYMD` は数値型のフィールドです。
`"20000101"` は変数だったのですが、ここではわかりやすくするために直接値を指定しています。

これを実行するとエラーが出ます。

```
System.Int32 および System.String で '>=' 操作を実行できません。
```

英語の場合は次のメッセージが出るようです。

```
Cannot perform '=' operation on System.String and System.Int32
```

`KEIJOYMD` は数値のはずなのですが、どうもそんなにうまくはいかないようです。
おそらく `KEIJOYMD` が `NULL`(値なし) の場合にエラーになっているのだろう・・・ということで、
次のようにしたら問題なく動くようになりました。

```
dr = dt.Select("KEIJOYMD <>　'' AND KEIJOYMD >= 20000101")
```
