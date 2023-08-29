---
layout: post
title: Linux で 画面の明るさを調整する方法
date: 2012-10-24 00:00:00 +0900
tags: [Linux, 画面, 明るさ]
categories: [Linux]
---

<strong>LINUX</strong> で明るさを設定する方法はないものかと探していたら・・・

```sh
echo -n 5 &gt; /sys/class/backlight/panasonic/brightness
```

でできました。当初、このファイル内には 10 という数値が入っていました。ルート権限で行うこと。ちなみに僕のこのパソコンは、Panasonic の Let's Note W5 です。

```sh
echo -n 100 &gt; /proc/acpi/video/VGA/LCD/brightness
```

でできるという情報が載っていましたが、僕の所で `less /proc/acpi/video/GFX0/LCD1/brightness y`とやったら、　`&lt;not supported&gt;` と出てきました。

brightness のファイルはシステムがずっと監視しているんですね。ちなみに、

<blockquote><p>/proc - バーチャルファイルシステム用の特別なディレクトリ
<br/ >
/sys - デバイスの情報が入っているディレクトリ</p></blockquote>

らしいです。`/proc` は 接続されたデバイス情報とか入ってた気がします。
<hr />

<strong>ガンマ値</strong>を変えるには `xgamma -gamma 0.5` みたいにやります。`xgamma --help` とやれば使い方が見えます。

<blockquote><p>ガンマ値とは、入力された信号の強さに応じて変化する輝度を表す指標</p></blockquote>

ってことらしいです。ふーん。

http://www.cambridgeincolour.com/tutorials/gamma-correction.htm によると・・・、我々の目はカメラのようには出来ておらず、暗い所での明るさの変化を強く感じ、明るいところでの明るさの変化をあまり感じないようにできている。ほんで、<strong>ガンマ補正</strong> Gamma Correction ってのはなにかっていうと、写真を人間の目によく見えるように明るさを調整すること。ページを覗くとガンマ値と写真補正の例が載っているね。

http://www1.interq.or.jp/sira/yorozu/cg_tips/gamma/index.htm を見ると、<strong>三角関数</strong>がからんでいるとかかいてある。たぶん、<strong>ガンマ補正</strong>をするための関数が三角関数から成り立っているってことなんだと思う。でそのパラメータが<strong>ガンマ値</strong>なんだな。

ちなみにこいつはコンピュータによって違うらしい。でもだいたい2.2みたい。<strong>ガンマ値</strong>によって写真の補正を変化させるとか CSS でできたりするのか？？
