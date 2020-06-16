---
layout: post
categories: java harmonica kotlin dsl
title: "Harmonica on Java"
date: 2020-06-16 12:00:00 +09:00
---

[Harmonica](https://github.com/KenjiOhtsuka/harmonica) を Java で使いたいそうなので、
とりあえず Java で一通りのステップを書いてみようと思い、 プロジェウトを作ってみることにした。

Gradle 6.5 を使って。

```
 % gradle init
Starting a Gradle Daemon, 1 incompatible and 1 stopped Daemons could not be reused, use --status for details

Select type of project to generate:
  1: basic
  2: application
  3: library
  4: Gradle plugin
Enter selection (default: basic) [1..4] 2

Select implementation language:
  1: C++
  2: Groovy
  3: Java
  4: Kotlin
  5: Swift
Enter selection (default: Java) [1..5] 3

Select build script DSL:
  1: Groovy
  2: Kotlin
Enter selection (default: Groovy) [1..2] 2

Select test framework:
  1: JUnit 4
  2: TestNG
  3: Spock
  4: JUnit Jupiter
Enter selection (default: JUnit 4) [1..4] 4

Project name (default: harmonica_on_java): 
Source package (default: harmonica_on_java): 

> Task :init
Get more help with your project: https://docs.gradle.org/6.5/userguide/tutorial_java_projects.html

BUILD SUCCESSFUL in 38s
2 actionable tasks: 2 executed
```


