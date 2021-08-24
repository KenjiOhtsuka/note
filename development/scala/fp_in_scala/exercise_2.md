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

## 2.3

```scala
object Main {
    def curry[A,B,C](f: (A, B) => C): A => (B => C) =
        (a: A) => (b: B) => f(a, b)
    
    def main(args: Array[String]): Unit = {
        val addOne = curry((a: Int, b: Int) => a + b)(1)
        println(addOne(2));
        println(addOne(3));
        val multipleTen = curry((a: Int, b: Int) => a * b)(10)
        println(multipleTen(2));
        println(multipleTen(3));
    }
}
```

## 2.4

```scala
object Main {
    def uncurry[A,B,C](f: A => B => C): (A, B) => C =
        (a: A, b: B) => f(a)(b)
    
    def main(args: Array[String]): Unit = {
        val add = uncurry((a: Int) => (b: Int) => a + b)
        println(add(1, 2))
        println(add(3, 4))

        val multiple = uncurry((a: Int) => (b: Int) => a * b)
        println(multiple(1, 2))
        println(multiple(3, 4))
    }
}
```

## 2.5

```scala
object Main {
    def compose[A,B,C](f: B => C, g: A => B): A => C =
        (a: A) => f(g(a))
    
    def main(args: Array[String]): Unit = {
        val addOne = (a: Int) => a + 1
        val multipleTen = (a: Int) => a * 10
    
        // f(x) = x * 10_+ 1
        val composed = compose(addOne, multipleTen)
        println(composed(1))
        println(composed(2))
    }
}
```
