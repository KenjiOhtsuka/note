---
title: vim with NERDTree
date: 2013-10-21 12:00:00 +0900
categories: vim
tags: vim
layout: post
---

NERDTreeが表示されている状態で、
右側画面を縦半分＆横半分で 画面を４分割した状態から、
右側の縦２分割を縦３分割にして新しいファイルを編集するには

右にカーソルがある状態で

`:sp`

を入力する。

その後 `C-w 2 h` で NERDTree のエリアに移動した後、`o` でファイルを開く。

(`C-w 2 h` で移動した後で `i` を押してもうまくいかない。)

