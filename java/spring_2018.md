
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
Spring Initializrで生成したプロジェクトでは、デフォルトでstrictモード。

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
dependencies {
  testCompile('org.springframework.boot:spring-boot-starter-test') {
    exclude module: 'junit'
  }
  testImplementation('org.junit.jupiter:junit-jupiter-api')
  testRuntimeOnly('org.junit.jupiter:junit-jupiter-engine')
}


test {
  useJUnitPlatform()
}
```


`@RunWith(SpringRunner::class)` => `@ExtendWith(SpringExtension::class)`

### Kotlin & JUnit 5 でのテスト

最近の傾向もあわせて・・・

* Camel case のテストメソッド名ではなく、 センテンスとして書いて `` ` `` で囲む。
    * Example
        * ``fun `Assert task page title, content and status code`() { ... }``
* JUnit 5 では、コンストラクタとメソッドパラメータのインジェクションができ、 Kotlin のイミュータブルで non-null なプロパティとうまく融合する。
    * Example
        * `class SomethingTest(@Autowired val bean: BeanClass)`
* `getForObject`, `getForEntity` Kotlin extensions (インポートが必要)


`@BeforeAll`, `@AfterAll` annotations.

### Kotlin JPA Plugin

```
buildscript {
  dependencies {
    classpath("org.jetbrains.kotlin:kotlin-noarg:${kotlinVersion}")
  }
}
apply plugin: 'kotlin-jpa'
```

### Controller

#### org.springframework.ui.set extension 

`model["title"] = "Blog"` instead of `model.addAttribute("title", "Blog")`


## Spring Boot で Application を作るには

Spring Boot は Kotlin 1.2.x をサポートする。
このサポートを有効にするには、次の2つをクラスパスに入れる。

* org.jetbrains.kotlin:kotlin-stdlib
* org.jetbrains.kotlin:kotlin-reflect

### 入れないバージョン

```build.gradle
// Gradle 4.9

plugins {
    id 'org.jetbrains.kotlin.jvm' version '1.2.51'
    id 'org.springframework.boot' version '2.0.3.RELEASE'
}

// 依存関係を解決するプラグイン
apply plugin: 'io.spring.dependency-management'

group 'com.example'
version '1.0-SNAPSHOT'

repositories {
    jcenter()
    mavenCentral()
}

dependencies {
    compile "org.jetbrains.kotlin:kotlin-stdlib-jdk8"
    compile 'org.springframework.boot:spring-boot-starter-web'
    //testCompile("org.springframework.boot:spring-boot-starter-test")
}

compileKotlin {
    kotlinOptions.jvmTarget = "1.8"
}
compileTestKotlin {
    kotlinOptions.jvmTarget = "1.8"
}
```
