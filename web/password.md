---
layout: page
title: "Authentication
---

## Basic 認証

### 概要

制限を掛けたいディレクトリのところに .htpasswd を配置し、
.htaccess にてそれを使用するよう設定する。

### .htpasswd

* ユーザ追加
    * `htpasswd htpasswd/path/.htpasswd new-user`
        * `new-user` はユーザ名。 追加したいユーザに合わせて変更する。
        * これを実行すると、パスワードの入力が求められる。
        * If `.htpasswd` file doesn't exist, add `-c` option. 
* ユーザ削除
    * Just open the file `.htpasswd` and remove the line.

### .htaccess

```
AuthUserFile /absolute/path/.hpasswd
AuthGroupFile /dev/null
AuthName "input your id and passwd"
AuthType Basic
require valid-user
```

* `require valid-user`
    * valid-user は特定のユーザ名ではない。 必ず `valid-user` と記述する。

### 固有のドメインのみ処理をする

```
<If "%{HTTP_HOST} == 'domain.example.com'">
  AuthUserFile /var/www/example.com/.htpasswd
  AuthGroupFile /dev/null
  AuthName "input your id and passwd"
  AuthType Basic
  require valid-user
</If>
```

## Digest 認証

* [もう詰まらない、Digest認証の設定](https://qiita.com/miyazawa214/items/45c5e6a5109dc9e12e65)
