---
layout: post
title: フォントファイルをサブセット化する方法
categories: font woff woff2 nodejs python
date: 2019-10-07T10:00:00+9:00
---

ウェブにアップロードするフォントファイルをできるだけ小さくするためのサブセット化の方法です。
コマンドラインから実行する方法についてまとめました。

## 用意するもの

NodeJS と Python を使いました。
(NodeJS から Python のライブラリを使っているみたいなので、 Python だけでもできそうです。)

* NodeJS (v12.6.0)
* Python (3.6.8)

## サブセット化対象の文字をチェック

サブセット化するべき文字の文字コード(16進数)を調べます。

### Python (3.6) でやる場合

```python
hex(ord('0'))  # => '0x30'
hex(ord('9'))  # => '0x39'
```

### Ruby (2.5.1) でやる場合

```ruby
'0'.ord.to_s(16)  # => "30"
'9'.ord.to_s(16)  # => "39"
```

## ツールをインストールする。

### Python のツール

```sh
$ pip install fonttools brotli
```

### NodeJS のツール

```sh
$ npm install -g glyphhanger
```

## サブセット化

```sh
$ glyphhanger --whitelist="U+30-39" --subset something.ttf --formats=woff2
```

`--whitelist` でサブセット化対象の文字を指定します。 `U+XX` という表記で指定します。
ここでは woff2 のフォーマットにしています。

結果として `something-subset.woff2` が出力されます。

`--formats` には カンマ区切りで複数フォーマットを指定できます。(例: `--formats=woff,woff2`)

## 関連ページ

* [glyphhanger](https://github.com/filamentgroup/glyphhanger)
