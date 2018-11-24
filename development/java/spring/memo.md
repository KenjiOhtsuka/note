---
layout: page
---

To change Entity data to snake case json...

```java
@Configuration
public class JacksonConfiguration {
    @Bean
    public Jackson2ObjectMapperBuilder jackson2ObjectMapperBuilder() {
        return new Jackson2ObjectMapperBuilder().propertyNamingStrategy(PropertyNamingStrategy.SNAKE_CASE);
    }
}
```

Or add

```
spring.jackson.property-naming-strategy=SNAKE_CASE
```
