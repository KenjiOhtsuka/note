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

### Command

* Connect withouut encryption

    Use `telnet` and put host and port.

    ```sh
    telnet host.com 587
    ```

* Connect with encryption

    Use `openssl`

    ```sh
    openssl s_client -connect host.com
    openssl s_client -connect host.com:993
    ```


## POP

| command | description |
|:--|:--|
| APOP | アクセスしたユーザ宛てのメール有無問い合わせ |
| LIST | メールサーバが受信しているメールのリストの問い合わせ |
| RETR | 受信したいメールの指定 |
| QUIT | 正常なコネクション解法 |
| STAT | 状況の問い合わせ |
| USER | |
| PASS | |

### Command

* Connect without encryption

    ```sh
    telnet host.com 110
    ```

* Connect with encryption

    ```sh
    openssl s_client -connect host.com:995
    ```

#### Example

After the connection, we can use commands as follows.

```
USER user-account

PASS password

STAT

LIST

RETR 3
```
