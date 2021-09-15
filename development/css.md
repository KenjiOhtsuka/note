---
layout: page
title: CSS
---

## Transparent Background Image

https://css-tricks.com/snippets/css/transparent-background-images/

## SASS(CSS) to prevent scrolling or wrapping / 改行しないスクロールさせないCSS(SASS)

```sass
.sample:
  overflow: hidden
  white-space: nowrap
```

## CS Principle 

### OOCSS (Object Oriented CSS)

* Point
    * 構造と見た目の分離
    * コンテンツとコンテナの分離

#### 構造と見た目の分離

* CSSのプロパティ
    * 構造を決める: float, margin
    * 見た目を決める: color, weight, height, radius

CSS のクラスを、 "構造を決めるもの"と"見た目を決めるもの"に分けて作る。
一緒にしない。

#### コンテンツとコンテナの分離

CSS のセレクタはHTMLの構造には依存しないようにする。

要素セレクタは使わない。

### BEM (Block, Element, Modifier)

* UIパーツの構成・状態を Block, Element, Modifier の3つに分ける。
* 命名規則
    * Element の前には `__` をつける。
    * Modifier の前には `_` をつける。
* アレンジされた命名規則: MindBEMding
    * Element の前には `__` をつける。
    * Modifier の前には `--` をつける。

### ITCSS (Inverted Triangle CSS)



### SMACSS

## table が大きくても画面幅を広げず、横スクロールするようにする

パソコンでみたときに正しく見えていても、スマートフォンでみたときに、表の幅が広くて画面幅を広げてしまう場合がある。
そういう場合はテーブルを横スクロールできるようにすると良い。

次の HTML に対して下の CSS を適用する。

```html
<figure class="table">
  <table>
    ......
  </table>
</figure>
```

```css
figure.table {
    overflow: auto;
    white-space: nowrap;
}

figure.table::-webkit-scrollbar {
    height: 5px;
}

figure.table::-webkit-scrollbar-track {
    background: #F1F1F1;
}

figure.table::-webkit-scrollbar-thumb {
    background: #BCBCBC;
}
```

`table { width: 100%; }` というのがいるという説があるが、たぶんいらない。

## Preventing automatic hyphenation

```css
.target { word-wrap: normal; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; }
```
