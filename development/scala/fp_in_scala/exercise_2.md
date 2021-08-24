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

## 2.2

```scala
object Main {
    def isSorted[A](as: Array[A], ordered: (A,A) => Boolean): Boolean = {
        @annotation.tailrec
        def loop(i: Int): Boolean =
            if (i == as.length - 1) true
            else if (ordered(as(i), as(i + 1))) loop(i + 1)
            else false
        
        loop(0)
    }
    
    def main(args: Array[String]): Unit = {
        def func(a: Int, b: Int): Boolean = a < b
        println(isSorted(Array(1, 2, 3), func));
        println(isSorted(Array(3, 2, 1), func));
    }
}
```
