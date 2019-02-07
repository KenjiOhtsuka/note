---
layout: page
---

# CSS

## Transparent Background Image

https://css-tricks.com/snippets/css/transparent-background-images/

## SASS(CSS) to prevent scrolling or wrapping / 改行しないスクロールさせないCSS(SASS)

```sass
.sample:
  overflow: hidden
  white-space: nowrap
```


OOOCSS
SMACSS

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
