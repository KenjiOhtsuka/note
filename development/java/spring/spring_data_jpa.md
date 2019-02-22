---
layout: page
---

# Spring Data JPA

## Test

テスト実行のたびにロールバックをする(テストによって変更されたデータベースを元に戻す)には、テストクラスに `@Transactional` のアノテーションをつける。

### Reference

* [Spring Framework Reference](https://docs.spring.io/spring/docs/current/spring-framework-reference/testing.html#testcontext-tx)
* [Stackoverflow](https://stackoverflow.com/questions/12626502/rollback-transaction-after-test)
