---
layout: page
---

# JUnit

## Annotations


### Basic Annotation

* @Test
* @BeforeAll (`@BeforeClass` for JUnit 4)
    * クラス内のテストメソッドを実行する前に行う処理につける。
* @BeforeEach (`@Before` for JUnit 4)
* @AfterEach (`@After` for JUnit 4)
* @AfterAll (`@AfterClass` for JUnit 4)
    * クラス内のすべてのテストが実行された後に処理が行われる。
* @Disabled (`@Ignore` for JUnit 4)
    * `@Test` と一緒に用いる。 JUnit は このアノテーションがついたテストを実行しない。
* @DisplayName
    * テスト結果レポートにおいて、クラス名・メソッド名ではなく、指定された名前で表示を行う。
    * 使用例
        ```java
        @DisplayName("Test in JUnit 5")
        public class JUnit5Test {
            @Test
            @DisplayName("Dummy test")
            void aTest() { ... }
        }
        ```

### New Method

* `assertAll`
* `assertThrows`

### Other Annotation

* `@DisplayName(name)`
* `@`
