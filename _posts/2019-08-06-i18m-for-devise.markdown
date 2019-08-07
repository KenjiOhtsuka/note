---
layout: post
title:  "Hokkaido Sapporo"
date:   2019-08-06 20:52:48 +0900
categories: Ruby Rails device i18n
---

# Rails 使った開発日誌 - 主に device-i18n

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
app/views/users/confirmations/new.html.erb
app/views/users/mailer/confirmation_instructions.html.erb 
app/views/users/mailer/email_changed.html.erb 
app/views/users/mailer/password_change.html.erb 
app/views/users/mailer/reset_password_instructions.html.erb 
app/views/users/mailer/unlock_instructions.html.erb 
app/views/users/passwords/edit.html.erb 
app/views/users/passwords/new.html.erb 
app/views/users/registrations/edit.html.erb 
app/views/users/registrations/new.html.erb
app/views/users/sessions/new.html.erb
app/views/users/shared/_error_messages.html.erb
app/views/users/shared/_links.html.erb
app/views/users/unlocks/new.html.erb 
```

### 翻訳ファイルの追加

標準の言語ファイルから変更したければ次のコマンドでファイルを生成して編集する。
というかこれインストールしないと正確に表示されなかった。

```sh
rails g devise:views:locale ja
```

生成されるロケールファイルは微妙に変更が必要。
`devise` のところをモデルの名前にしないとうまく動かなかった。
 
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
