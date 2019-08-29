---
layout: post
categories: php apache httpd
title: PHP configuration in Apache for .html files
---

# Docker apache で HTML ファイル を PHP として認識するよう設定した方法

Docker の PHP 環境 で、　拡張子が `.html` のファイルもPHPとして扱えるようにした方法をまとめる。

今回開発対象となってPHPのプロジェクトは歴史があり、`.html`のファイルもPHPとして扱っていた。
そのため Docker で単にPHPを動くようにした環境に一手間加える必要があった。

PHPファイルのルートディレクトリにある `.htaccess` に次の記述を追加・コメントアウトして`.html`をPHPとして扱うようにした。
(これで必要十分な変更なのかはわかっていない。)

### 追加

```
Options +Includes
AddType application/x-httpd-php html
AddOutputFilter INCLUDES .html
<FilesMatch "\.html$">
  AddType application/x-httpd-php .html
</FilesMatch>
```

### コメントアウト

```
AddHandler fcgid-script .html .php
```
