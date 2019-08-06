---
layout: post
title:  "Hokkaido Sapporo"
date:   2019-08-06 20:52:48 +0900
categories: Ruby Rails device i18n
---

# Rails 使った開発日誌

## devise i18n


```
bundle add devise-i18n
```

### View の追加

```sh
rails g devise:i18n:views user  
```

これを実行すると、次のファイルが生成された。
内容は、 devise 4.6.2 で生成されるものとほぼ同じで、違うのは多言語化のファイルを使っているところ。

```sh
app/views/members/confirmations/new.html.erb
app/views/members/mailer/confirmation_instructions.html.erb 
app/views/members/mailer/email_changed.html.erb 
app/views/members/mailer/password_change.html.erb 
app/views/members/mailer/reset_password_instructions.html.erb 
app/views/members/mailer/unlock_instructions.html.erb 
app/views/members/passwords/edit.html.erb 
app/views/members/passwords/new.html.erb 
app/views/members/registrations/edit.html.erb 
app/views/members/registrations/new.html.erb
app/views/members/sessions/new.html.erb
app/views/members/shared/_error_messages.html.erb
app/views/members/shared/_links.html.erb
app/views/members/unlocks/new.html.erb 
```

### 翻訳ファイルの追加

標準の言語ファイルから変更したければ次のコマンドでファイルを生成して編集する。

```sh
rails g devise:views:locale ja
```
 
## Rspec install

Rails 5 から少々変わったところはあるものの `rspec-rails` を導入すれば基本的に使える。

```
bundle add rspec-rails
```
    
## Factory Bot for Rails

Factory Girl から、 名前の意味合いについて議論があったらしく Factory Bot という名前に変わっていた。
Rails で使用する場合は `factory_bot_rails` を使う。

```
bundle add factory_bot_rails
```

## Convert erb 2 slim

ERB を SLIM の形式に変換するには gem `erb2slim` をインストールして 次のコマンドを使う。

```sh
for i in app/views/**/*.erb; do erb2slim $i ${i%erb}slim && rm $i; done
```
