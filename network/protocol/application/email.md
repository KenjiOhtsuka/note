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
| AUTH LOGIN | ログイン。 実行後にBase64エンコードされたユーザ名、パスワードを続けて入力する。|

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
    
    You have to be careful when you input user name and password.
    
    * AUTH LOGIN
        
        ```
        printf 'username' | base64 # username
        printf 'password' | base64 # password
        ```
    
    * AUTH PLAIN
        
        ```
        printf "%s\0... tr -d '\n' | pbcopy
        ```
        
### Example

```sh
telnet something.com 587

HELO

MAIL FROM: test@example.com

RCPT TO: test@example.com

DATA
From: from@examile.com
Subject: subject
body
.

QUIT
```

### AWS SES での送信例

https://docs.aws.amazon.com/ja_jp/ses/latest/DeveloperGuide/send-email-smtp-client-command-line.html


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

## Base64 Encoding

```
perl -MMIME::Base64 -e 'print encode_base64("username");'
perl -MMIME::Base64 -e 'print encode_base64("password");'
```
