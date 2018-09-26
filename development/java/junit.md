---
layout: page
---

# JUnit 5

JUnit 5 can be used from Gradle version 4.6.

## Gradle

```gradle:build.gradle
test {
  useJUnitPlatform()
}
```

## Annotations

Static method of the `org.junit.jupiter.api.Assumptions` class.

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

### Assertion

#### Basic Assertion

* `assertEquals(expected, actual)`
* `assertFalse(booleanExpression)`
* `assertNull(actual)`
* `assertNotNull(actual)`
* `assertTrue(booleanExpression)`

#### New Assertion

* `assertAll`
    * 記述されている assertion はすべて実行される。
      通常 `assertEquals` などを使っている場合は、
      ひとつでも assertion が失敗するとテストがストップする。
    * 使用例
        ```java
        assertAll(
            "Check all",
            () -> assertEquals(1, 2),
            () -> assertEquals(1, 2),
            () -> assertEquals(1, 2),
            () -> assertEquals(1, 2)
        )
        ```
* `assertThrows`
    * 例外発生のチェック。
    * 使用例
        ```java
        assertThrows(
            SomeException.class,
            () -> targetInstance.targetFunction()
        )
        ```
* Assumption
    * ある状態が成立していることをチェックする。
        成立していなければ test は abort となる。
    * `assumeTrue`
        * `assumeTrue` で条件不成立の場合は abort となり、
          それ以降の処理は実行されない。
        * 使用例
            ```java
            assumeTrue(1 == 2)
            ```
    * `assumeThat`
        * `assertThat` の第一引数で指定した条件が成立する場合にのみ、
            第二引数の処理が行われる。 (`if` でいいのでは？)
        * 使用例
            ```java
            assumeThat(
                condition,
                () -> {
                    // process
                }
            )
            ```

### Other Annotation

* `@Nested`
    * JUnit 5 では、 テストを整理するために、 inner class が使える。
    * RSpec の describe, context のようなもの。
    * 使用例
        ```java
        @RunWith(JUnitPlatform.class)
        @DisplayName("Test in JUnit 5")
        public class JUnit5AppTest {
            @Nested
            @DisplayName("for something")
            class JUnit5AppZeroOperandsTest {
                @Test
                fun testTath() {
                    // ...
                }
            }
        }
        ```

## Engine

* junit-vintage-engine
    * Test engine for running JUnit 3 and JUnit 4 test on the JUnit platform

## Migration from JUnit 4 to JUnit 5

### Before

```java
@RunWith(SpringRunner::class)
@SpringBootTest
@ContextConfiguration
@ActiveProfiles(profiles = arrayOf("test"))
```

### After

```java
@SpringBootTest
@ExtendWith(SpringExtension::class)
@WebAppConfiguration
@TestInstance(TestInstance.Lifecycle.PER_CLASS)
```