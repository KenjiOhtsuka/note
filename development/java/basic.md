---
layout: page
---

# Java 基礎

## Thread

### Thread class を継承する

### Runnable interface を継承する

```java
class Something implement Runnable {
    public void run() {
        /* ... */
    }
}

class Main {
    public static void main(Array<String> args[]) {
        Thread th = new Thread(new Something());
        th.start()
    }
}
```
