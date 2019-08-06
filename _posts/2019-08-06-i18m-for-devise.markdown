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

* 翻訳ファイルの追加

    ```sh
    rails g devise:views:locale ja
    ```
    
* View の追加

    ```sh
    rails g devise:rails g devise:i18n:locale it
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
