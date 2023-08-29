---
layout: page
title: Gradle Overview
---

## Project

通常 Gradle は次のコマンドで実行できる。

* Linux

    ```sh
    ./gradlew
    ```
    
* Windows

    ```bat
    gradlew
    ```

## Submodule

サブモジュールのビルドをする場合は次のように記述する

```sh
./gradlew :submodule_name:build
```

`build` などのコマンドの前に `:` とサブモジュール名 (`:submodule_name:`) を記述すると、 サブモジュールのコマンドになる。

## Executable Jar

実行可能な JAR を作成するには、 下記のようにメインのクラスを記述する。

```
jar {
  manifest {
    attributes 'Main-Class': 'com.example.Main'
  }
}
```

## Wrapper

バージョン変更

```
./gradlew wrapper --gradle-version=6.5
```

## bin.zip, all.zip の違い

https://stackoverflow.com/questions/25451308/android-studio-gradle-bin-zip-vs-gradle-all-zip

> gradle-1.12-all.zip file will have binaries, sources, and documentation. gradle-1.12-bin.zip will have only binaries(That should be enough as you don't need any samples/docs)
>
> If you want to know about gradle wrapper, please check this http://www.gradle.org/docs/current/userguide/gradle_wrapper.html

---

## Java Plugin

`java` plugin を適用すると、`compileJava`, `test` タスクが追加される。

for `compile`, `testCompile` in dependencies block:

```gradle
apply plugin: 'java'
```
