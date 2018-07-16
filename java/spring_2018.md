
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

### kotlin-reflect

Kotlin reflection library. Spring Framework 5 で必要。

### jackson-module-kotlin

Kotlin のクラスをシリアライズ・デシリアライズする。

単一のコンストラクタのクラスを自動的に使用する。 セカンダリコンストラクタとstaticファクトリーもサポートされている。(要調査)

## JUnit 5 

### JUnit 4 から 5 への移行

```sh
./gradlew wrapper --gradle-version 4.7
```

下の行を `build.gradle` に追加する。

```groovy
test {
  useJUnitPlatform()
}
```

