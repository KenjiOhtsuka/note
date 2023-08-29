---
layout: page
title: Spring Data JPA
---

## Test

テスト実行のたびにロールバックをする(テストによって変更されたデータベースを元に戻す)には、テストクラスに `@Transactional` のアノテーションをつける。

### Reference

* [Spring Framework Reference](https://docs.spring.io/spring/docs/current/spring-framework-reference/testing.html#testcontext-tx)
* [Stackoverflow](https://stackoverflow.com/questions/12626502/rollback-transaction-after-test)

## Customize JPA Repository

* https://www.javacodegeeks.com/2012/08/customizing-spring-data-jpa-repository.html
* https://www.petrikainulainen.net/programming/spring-framework/spring-data-jpa-tutorial-adding-custom-methods-into-all-repositories/
* https://docs.spring.io/spring-data/jpa/docs/1.6.0.RELEASE/reference/html/jpa.repositories.html

## Entity Manager

* https://docs.jboss.org/hibernate/entitymanager/3.6/reference/en/html_single/
