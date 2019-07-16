---
layout: post
title:  "RMagick installation into Mac"
date:   2019-07-16 10:52:48 +0900
categories: rmagick ruby
---

# RMagick を macOS にインストールした方法

## ImageMagick のインストール

```sh
brew install imagemagick@6
```

もし imagemagick 7 がインストールされていたら、
一度アンインストールする。

## chk-config のインストール

```sh
brew install chk-config
```

## .zshrc の変更

`.zshrc` に次のコードを追加する。
(これは imagemagick をインストールした際に表示されるもの。)

```sh
# Image Magick
## If you need to have imagemagick@6 first in your PATH run:
echo 'export PATH="/usr/local/opt/imagemagick@6/bin:$PATH"' >> ~/.zshrc

## For compilers to find imagemagick@6 you may need to set:
export LDFLAGS="-L/usr/local/opt/imagemagick@6/lib"
export CPPFLAGS="-I/usr/local/opt/imagemagick@6/include"

## For pkg-config to find imagemagick@6 you may need to set:
export PKG_CONFIG_PATH="/usr/local/opt/imagemagick@6/lib/pkgconfig"

export PATH="/usr/local/opt/imagemagick@6/bin:$PATH"
export PATH="/usr/local/opt/imagemagick@6/bin:$PATH"
```

## 環境

* macOS Mojave
* Ruby 2.5.1
