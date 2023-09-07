---
title: Now Loading Indicator on Blog
date: 2011-09-23 23:59:59 +0900
tags: [javascript]
categories: [Diary, development]
---


head 内 に次の記述を追加します。まずはCSS。

```css
#loading {
  position: fixed;
  top: 80%;
  left: 0;
  font-style: italic;
  font-family: Verdana;
  color: white;
  font-size: 36px;
  z-index: 100;
}
```

ポイントは`position`。w3schools では、

> static: Elements renders in order, as they appear in the document flow. This is default.
> absolute: The element is positioned relative to its first positioned (not static) ancestor element
> fixed: The element is positioned relative to the browser window
> relative: The element is positioned relative to its normal position, so "left:20" adds 20 pixels to the element's LEFT position
> inherit: The value of the position property is inherited from the parent element

と書かれている。 Play it! で確認しても、static がよくわからない。
とりあえず今回は fixed を使い、ウインドウを基準に計算することにした。
`margin` にマイナスの値を入れて、文字を確実に表示するべきかも。

続いてjavascript。

```js
document.write('<style type="text/css">#doc { visibility: hidden; }<\/style>');
document.write('<div id="loading">Now Loading...<\/div>');

var i = 0;
var ele = document.getElementById("loading");
var str = ele.firstChild.data;

function char_loop(ele, str) {
    ele.innerHTML = str.substring(0, i++ % str.length + 1);
}

setInterval("char_loop(ele, str);", 100);

window.onload = function () {
    ele.style.display = "none";
}
```

<q>The onload event occurs immediately after a page or an image is loaded.</q> とw3schoolsにある。つまり onload はページが読み込まれた直後に発生する。全部読み込んだら、表示を消すという処理が上の記述。

`setInterval` は、<q>The setInterval() method calls a function or evaluates an expression at specified intervals</q>ということで、上では call char_loop every 100 milliseconds ということ。
