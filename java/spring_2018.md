
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

JSON データ を Kotlin にシリアライズ・デシリアライズするには、 "Jackson’s Kotlin module" が必要。

`org.jetbrains.kotlin:kotlin-allopen:${kotlinVersion}` - 必要なファイルを `open` にする。 これで、 Spring boot のアプリケーションクラスもわざわざ `open` にしなくて済む。

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

### プロジェクトの基本をダウンロード

[start.spring.io](https://start.spring.io/#!language=kotlin) からダウンロードできる。

### Null-safety

org.springframework.lang package で定義されている。

`com.google.code.findbugs:jsr305:3.0.2` を dependencies に追加する。

* `@NonNull`
* `@Nullable`
* `@NonNullApi`: パッケージレベルのアノテーション。 パッケージ内のパラメータ、返り値は non-null として扱われる。
* `@NonNullFields`: パッケージレベルのアノテーション。 基本的にフィールドの値は non-null として扱われる。

### アプリケーションクラス

`companion object` の中のメソッドとして作成するか、 トップレベルファンクションとして作成するか。

```kotlin
// with all-open
@SpringBootApplication
class DemoApplication

fun main(args: Array<String>) {
    runApplication<DemoApplication>(*args)
}
```

```kotlin
// without all-open
@SpringBootApplication
open class Application {
    companion object {
        @JvmStatic
        fun main(args: Array<String>) {
            SpringApplication.run(Application::class.java, *args)
        }
    }
}
```

一番目の例では、 トップレベルアプリケーションにするだけでなく、 Kotlin の DSL も使用している。
`runApplication` というメソッドが  `SpringApplication.run(Application::class.java, *args)` の置き換えになる。
`runApplication` は Spring boot のドキュメントにもあるように、次のような記述が可能である。

```kotlin
runApplication<MyApplication>(*args) {
	setBannerMode(OFF)
}
```

これを `SprngApplication` でやろうとすると次のようになる。

```Java
SpringApplication app = new SpringApplication(SpringBootConsoleApplication.class);
app.setBannerMode(Banner.Mode.OFF);
app.run(args);
```

Kotlin で `SpringApplication` を使ってやるなら次のようにできる。

```Kotlin
SpringApplication(SpringBootConsoleApplication.class).also {
  it.setBannerMode(Banner.Mode.OFF)
  it.run(args)
}
```
### Kotlin 専用 メソッド

Kotlin のために、 DSL や拡張関数が追加されている。

#### Example

* [`BeanDefinitionDSL`](https://docs.spring.io/spring-framework/docs/5.0.7.RELEASE/kdoc-api/spring-framework/org.springframework.context.support/-bean-definition-dsl/index.html)
    * [`beans`](https://docs.spring.io/spring-framework/docs/5.0.7.RELEASE/kdoc-api/spring-framework/org.springframework.context.support/beans.html)
* [`RouterFunctionDsl`](https://docs.spring.io/spring-framework/docs/5.0.7.RELEASE/kdoc-api/spring-framework/org.springframework.web.reactive.function.server/-router-function-dsl/index.html)
    * [`router`](https://docs.spring.io/spring-framework/docs/5.0.7.RELEASE/kdoc-api/spring-framework/org.springframework.web.reactive.function.server/router.html)
* [`KotlinBodySpec`](https://docs.spring.io/spring-framework/docs/5.0.7.RELEASE/kdoc-api/spring-framework/org.springframework.test.web.reactive.server/index.html)

### Controller Parameter が Null-safety に対応

コントローラのメソッドパラメータ

* `@RequestParam name: String?`: 任意。
* `@RequestParam name: String` : 必須。

Spring Messaging の `@Header` アノテーションでも同様。

`@Autowired`, `@Bean`, `@Inject` も Nullable か否かを Bean の必要・不必要の判定に使っている。

* `@Autowired lateinit var foo: Foo` => `Foo` がビーンとして登録されていることが必要。
* `@Autowired lateinit var foo: Foo?` => `Foo` がビーンとして登録されていなくてもエラーが出ない。

* `@Bean fun baz(foo: Foo, bar: Bar?) = Baz(foo, bar)`
    * `Foo` のビーンは登録されている必要がある。
    * `Bar` のビーンは登録されてなくてもいい。
    
autowired のコンストラクタでも同様。

## Annotation

プロパティまたはプライマリコンストラクタのあるクラスではアノテーションに use-site targets を付ける必要がある。

```kotlin
@Entity data class User(
    @Id
    @GeneratedValue(strategy = javax.persistence.GenerationType.AUTO)
    var id: Long? = null,

    @get:Size(min=5, max=15) // added annotation use-site target here
    val name: String
)
```

## All-Open

all-open が open にするアノテーションは次のアノテーションである。

* `@Component`
    * `@Configuration`, `@Controller`, `@RestController`, `@Service`, `@Repository`
* `@Async`
* `@Transactional`
* `@Cacheable`

## 新しい RequestMapping

* `@RequestMapping(value = "/foo", method = RequestMethod.GET)`
* `@RequestMapping(path = "/foo", method = RequestMethod.GET)`
* `@RequestMapping("/foo", method = [RequestMethod.GET])`
* `@RequestMapping(path = ["/foo"], method = [RequestMethod.GET])`
