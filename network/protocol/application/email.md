---
layout: page
---

# Email protocol

## SMTP

| Command | description |
|:--|:--|
| HELO | メールの授受ができる状態の準備 |
| MAIL FROM | メールの発信者名の通知 |
| RCPT TO | メールの受信者名の通知 |
| DATA | メッセージの送信開始の可否確認 |
| QUIT | 正常なコネクション解法 |
| RSET | 強制的なコネクション解法 |

## POP

| command | description |
|:--|:--|
| APOP | アクセスしたユーザ宛てのメール有無問い合わせ |
| LIST | メールサーバが受信しているメールのリストの問い合わせ |
| RETR | 受信したいメールの指定 |
| QUIT | 正常なコネクション解法 |
