---
date: 2020-05-26 10:52:48 +0900
title: Wordpress on AWS
categories: Wordpress AWS
layout: post
---

あるレンタルサーバからAWS EC2へのWordpressの移設で、管理画面(wp-login.php)にアクセスすると同一URLへのリダイレクトが繰り返し行われるというトラブルに遭遇した。

これは AWS EC2 へのアクセスが ELB を通った後は HTTP で80番ポートに対して行われることが原因。

ただし wp-login.php での次のコードの `if` の条件を常にFALSEになるように書き換えても解決しなかった。

```php

// Redirect to https login if forced to use SSL
if ( force_ssl_admin() && ! is_ssl() ) {
        if ( 0 === strpos($_SERVER['REQUEST_URI'], 'http') ) {
                wp_safe_redirect( set_url_scheme( $_SERVER['REQUEST_URI'], 'https' ) );
                exit();
        } else {
                wp_safe_redirect( 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
                exit();
        }
}
```

今回は Apache の設定に次の1行を追加して解決した。

```
SetEnvIf X-Forwarded-Proto https HTTPS=on
```

次の `if` 文 を wp-config.php に記述するとよいらしいが、 今回は解決しなかった。

```php
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
    $_SERVER['HTTPS'] = 'on';
```
