---
layout: page
---

# Gradle Overview

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
