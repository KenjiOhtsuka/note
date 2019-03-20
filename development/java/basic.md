---
layout: page
---

# Java 基礎

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
