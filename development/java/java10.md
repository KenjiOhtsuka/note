---
layout: page
title: Java 10
---

https://codezine.jp/article/detail/10872?p=3


## JAXB API

Spring を使っていると、
"ClassNotFoundException for javax.xml.bind.JAXBException"
というエラーが出ることがある。
これは、 

```gradle
compile("javax.xml.bind:jaxb-api:2.3.0")
```

という行を `build.gradle` に追加して解決する。

Java 9 から JAXB API が JDK に含まれなくなったために起きている。

### Reference

* [ClassNotFoundException for javax.xml.bind.JAXBException with Spring Boot when swich to Java 9](https://stackoverflow.com/questions/48986999/classnotfoundexception-for-javax-xml-bind-jaxbexception-with-spring-boot-when-sw/48987120)
