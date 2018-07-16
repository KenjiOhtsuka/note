
## 'kotlin-spring' plugin

自動的にアノテーションのつけられたまたはメタアノテーションをつけられたクラスやメソッドを `open` にする。
Kotlin では、 何も修飾子(modifier)をつけなければ Java でいう `final` になるため、
これまで `@Configuration`, `@Tramsactonal` には `open` modifier が必要だった。

```groovy
apply plugin: 'kotlin-spring'
```
