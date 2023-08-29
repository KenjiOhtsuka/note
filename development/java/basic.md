---
layout: page
title: Java 基礎
---

## Terms

<dl>
  <dt>インスタンス</dt>
  <dd>クラスから作られたオブジェクトを、そのクラスの<strrong>インスタンス</strrong>という。</dd>
  <dt>インスタンス変数</dt>
  <dd>インスタンスが有する変数。</dd>
  <dt>インスタンスメソッド</dt>
  <dd>インスタンスが有するサブルーチン。</dd>
  <dt>クラスメソッド</dt>
  <dd>クラスの静的メソッドのこと。 Java でいうなら、 <code>static</code> をつけたメソッドのこと。 <strong>静的メンバサブルーチン</strong>ということもある。</dd>
  <dt>クラス変数</dt>
  <dd>クラスの静的変数のこと。 Java でいうなら、 <code>static</code> をつけたクラス内変数のこと。 <strong>静的メンバ変数</strong>ということもある。</dd>
  <dt>ダングリングポインタ</dt>
  <dd>不正なメモリ領域を指しているポインタ。 ポインタを残してメモリを解放してしまった場合などに、ポインタがダングリングポインタになる。 これに伴うエラーをダングリングポインタエラーということがある。</dd>
  <dt>メモリリーク</dt>
  <dd>使用されないオブジェクトがメモリを占有した状態になること。</dd>
</dl>
<p>インスタンスはヒープメモリに格納される。</p>

## Thread

### Thread class を継承する

### Runnable interface を継承する

```java
class Something implement Runnable {
    public void run() {
        /* ... */
    }
}

class Something2 extends Thread {
    public void run() {
        /* ... */
    }
}

class Main {
    public static void main(Array<String> args[]) {
        Thread th = new Thread(new Something());
        th.start();
        Thread th2 = new Something2();
        th2.start();
    }
}
```


## Graphic

### Methods

Here are some of all the methods.

* `drawArc`
* `drawImage`
* `drawLine`
* `drawOval`
* `drawPolygon`
* `drawRect`
* `drawString`
* `fillArc`
* `fillOval`
* `fillPolygon`
* `setColor`
    * これで色を指定してから `` などを実行する。
* `setFont`
    * これでフォントを指定してから `drawString` などを実行する。

### Color

package: `java.awt.Color`

* `Color.white`
* `Color.lightGray`
* `Color.gray`
* `Color.darkGray`
* `Color.black`
* `Color.red`
* `Color.pink`
* `Color.orange`
* `Color.yellow`
* `Color.green`
* `Color.magenta`
* `Color.cyan`
* `Color.blue`

### Font

#### Font name

package: `java.awt.Font`

* Dialog
* DialogInput
* Monospaced
* Serif
* SansSerif
* Symbol

#### Font style

* `Font.PLAIN`
* `Font.BOLD`
* `Font.ITALIC`
