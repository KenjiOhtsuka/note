---
layout: post
title: Sendmail の maillog の読み方
date: 2010-05-14 00:00:00 +0900
tags: [sendmail, maillog]
categories: [sendmail]
---

sendmail の maillog の読み方・意味を調べました。

## 最初に書いてある時刻

メール転送エージェントがメールを受け取った時刻

## `sendmail[xxxx]`

sendmail を使ってメールを送信するってことと、その使用する sendmail のプロセスIDが xxxx番 ってこと。kill -9 xxxx とすると、そのプロセスが終了される。プロセスで異常が出たときにそうする。

ランダムに見える文字列：キューID といって、実は規則がある。最初の文字から順に、年(16進数)、月(16進数)、……となる(笑) この命名規則で行くと、60年間は重複しないとか(このへん適当)。

## `from`/`to`

送信者と受信者。

## `relay=XXXXXX[a.b.c.d]`

リレー先サーバとそのIP

(リレーとは、メールを中継すること。メールを送信するときに、相手のメールサーバに直接送るのではなく、中継することがある。メールサーバがダウンしているときなどに、中継先を変えることができる。)

## `pri`

優先度。０に近いほど優先度が高い。

## `stat=......`

メールの送信ステータス。Sent, Bounced, Deferred がのどれかがついて、その後にメッセージが出る。順に、送信成功、中継してやった、延期(再送信する)という意味だと思う。

## `delay`

相手に届くまでにトータルでかかる時間。

## `xdelay`

(ながーい説明を読んだけど、よくわからん。)

## `mailer`

メール送信に使うプロトコル。オレは esmtp というのを見たことがある。smtp の拡張らしい。

## `dsn`

Delivery Status Notification。コードは、RFC3463に基づく。

- 2.X.X 成功
- 4.X.X 一時的なエラーが繰り返し発生する
- 5.X.X 永続的なエラー

## 参考

- http://www.bit-drive.ne.jp/support/technical/serverpack/faq/02-38.html
- http://oshiete.goo.ne.jp/qa/2391600.html
- http://www.ietf.org/rfc/rfc3463.txt
- http://www.mail-archive.com/postfix-users@postfix.org/msg00205.html
- http://oshiete.goo.ne.jp/qa/1167364.html
- http://www.linuxmaza.com/sendmail/simple-steps-to-send-mail-using-sendmail-on-linux-fedora-centos-ubuntu/
- http://www.linuxmaza.com/sendmail/understanding-how-to-read-mail-logs-postfix-logs-sendmail-logs-qmail-logs/

<div style="text-align:center;">
<div><a href="https://hb.afl.rakuten.co.jp/ichiba/144e0ebd.a7a916b6.144e0ebe.acfa319f/?pc=https%3A%2F%2Fitem.rakuten.co.jp%2Frakutenkobo-ebooks%2Fab9c36c206b944468cac8d0a3633f34b%2F&link_type=pict&ut=eyJwYWdlIjoiaXRlbSIsInR5cGUiOiJwaWN0Iiwic2l6ZSI6IjQwMHg0MDAiLCJuYW0iOjEsIm5hbXAiOiJyaWdodCIsImNvbSI6MSwiY29tcCI6ImRvd24iLCJwcmljZSI6MSwiYm9yIjoxLCJjb2wiOjEsImJidG4iOjEsInByb2QiOjAsImFtcCI6ZmFsc2V9" target="_blank" rel="nofollow sponsored noopener" style="word-wrap:break-word;"><img src="https://hbb.afl.rakuten.co.jp/hgb/144e0ebd.a7a916b6.144e0ebe.acfa319f/?me_id=1278256&item_id=12510714&pc=https%3A%2F%2Fthumbnail.image.rakuten.co.jp%2F%400_mall%2Frakutenkobo-ebooks%2Fcabinet%2F9765%2F2000001089765.jpg%3F_ex%3D400x400&s=400x400&t=pict" border="0" style="margin:2px" alt="" title=""></a></div><p><a href="https://hb.afl.rakuten.co.jp/ichiba/144e0ebd.a7a916b6.144e0ebe.acfa319f/?pc=https%3A%2F%2Fitem.rakuten.co.jp%2Frakutenkobo-ebooks%2Fab9c36c206b944468cac8d0a3633f34b%2F&link_type=text&ut=eyJwYWdlIjoiaXRlbSIsInR5cGUiOiJ0ZXh0Iiwic2l6ZSI6IjQwMHg0MDAiLCJuYW0iOjEsIm5hbXAiOiJyaWdodCIsImNvbSI6MSwiY29tcCI6ImRvd24iLCJwcmljZSI6MSwiYm9yIjoxLCJjb2wiOjEsImJidG4iOjEsInByb2QiOjAsImFtcCI6ZmFsc2V9" target="_blank" rel="nofollow sponsored noopener" style="word-wrap:break-word;">Sendmail【電子書籍】[ Bryan Costales ]</a></p>
</div>
