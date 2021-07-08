---
categories: OleDb Excel visualbasic
tags: OleDb excel visualbasic
title: Excel に OleDb で接続　…　Visual Basic
date: 2009-10-28 00:00:00
---

Excel と VisualBasic を接続してアプリケーションを作ろうとしていました。


そしたら、キャストが間違っているらしく・・・

どういうことかというと、

　OleDbDataReader で SELECT によって呼び出した値を取り出そうとしたのですが、
　GetString でやったらダメだと怒られたわけですよ。

どういうことかというと、
Excel から呼び出す場合、データ型は、その列で一番多いものになります。

数値か文字列か。

レコードとして、

```
Name
-----
1
2
3
あ
い
```

と ５レコードがあった場合、半分以上（３レコード）が数値なので、`GetDouble` を使うと呼び出すことができます。
しかし、数値型でないレコードについては、`Null` が返ってきます。

文字列の場合はその逆で、`GetString` で取り出し可能になり、文字列型でないレコードが `Null` で返ってきます。

文字列と数値が同じ数だけあった場合は、・・・・・・どうなるんでしょうね。


文字列が入ることもあり、数値が入ることもある場合は、数値を文字列にして入れてください・・・とマイクロソフトが言っています。
（具体的な方法は知りません。）

ちなみに、Excel から取り出す場合のSQLは、

```sql
SELECT column1, column2, column3 FROM [Sheet1$]
```

となります。
`FROM` の記述方法に注意です。

カラム名は、先頭の行(セルでいうとA1,B1,C1,...)に入っている文字列になります。


<a href="https://hb.afl.rakuten.co.jp/ichiba/205cba09.88fa723a.205cba0a.a9e60b45/?pc=https%3A%2F%2Fitem.rakuten.co.jp%2Fvaboo%2Fva1126801479u20%2F&link_type=text&ut=eyJwYWdlIjoiaXRlbSIsInR5cGUiOiJ0ZXh0Iiwic2l6ZSI6IjQwMHg0MDAiLCJuYW0iOjEsIm5hbXAiOiJyaWdodCIsImNvbSI6MSwiY29tcCI6ImRvd24iLCJwcmljZSI6MSwiYm9yIjoxLCJjb2wiOjEsImJidG4iOjEsInByb2QiOjAsImFtcCI6ZmFsc2V9" target="_blank" rel="nofollow sponsored noopener" style="word-wrap:break-word;"  >Visual　Basic．NET至高の技 SQL</a> は、私も使っている本で、Excel との連携についても書かれています。その他 Oracle, MySQL, SQLServer 等も。

