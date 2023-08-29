---
layout: page
title: "LazyLoad"
---

## 画像を差し替える仕組み

* 例えば img であれば、 src の値を変える。
* あらかじめ、 data-src などに本来表示するべき画像のURLを記述しておき、 所定の位置までスクロールされたところで表示を行う。
* 所定の位置の取得・判定方法
    * 例えば window.innerHeight - img.getBoundingClientRect().top < XXX というように条件で判定する
