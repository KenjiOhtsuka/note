---
layout: page
title: Functional Programming in Scala Excercise chapter 2 answers
---

## 2.1

```scala
object Main {
    def fib(n: Int): Int = {
        @annotation.tailrec
        def go(n: Int, a: Int, b: Int): (Int, Int, Int) =
            if (n == 1) (n, a, b)
            else go(n - 1, a + b, a)
            
        go(n, 0, 1)._2
    }
    
    def main(args: Array[String]): Unit = {
        println(fib(1));
        println(fib(2));
        println(fib(3));
        println(fib(4));
        println(fib(5));
        println(fib(6));
    }
}
```
