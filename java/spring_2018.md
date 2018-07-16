
## 'kotlin-spring' plugin

自動的にアノテーションのつけられたまたはメタアノテーションをつけられたクラスやメソッドを `open` にする。
Kotlin では、 何も修飾子(modifier)をつけなければ Java でいう `final` になるため、
これまで `@Configuration`, `@Tramsactonal` には `open` modifier が必要だった。

```groovy
apply plugin: 'kotlin-spring'
```

org.springframework.lang pakage

標準では、 Java の API で適宜された型は Kotlin ではプラットフォームタイプとして、 null check が緩和された状態の型になる。

`-Xjsr305` を `strict` に設定することで有効になる。

```groovy
compileKotlin {
  kotlinOptions {
    freeCompilerArgs = ["-Xjsr305=strict"]
    jvmTarget = "1.8"
  }
}
compileTestKotlin {
  kotlinOptions {
    freeCompilerArgs = ["-Xjsr305=strict"]
    jvmTarget = "1.8"
  }
}
```
