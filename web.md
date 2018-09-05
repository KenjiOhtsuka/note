---
layout: page
---

# Web

## Basic 認証

### 概要

制限を掛けたいディレクトリのところに .htpasswd を配置し、
.htaccess にてそれを使用するよう設定する。

### .htpasswd

* ユーザ追加
    * `htpasswd htpasswd/path/.htpasswd new-user`
        * `new-user` はユーザ名。 追加したいユーザに合わせて変更する。
        * これを実行すると、パスワードの入力が求められる。
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
    * valid-user は特定のユーザ名ではない。 必ず `valid-user` と
記述する。