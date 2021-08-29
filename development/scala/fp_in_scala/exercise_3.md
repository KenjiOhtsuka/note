---
layout: page
title: Functional Programmng in Scala Exersice 3 Answer
---

## 3.1

```scala
sealed trait List[+A]
case object Nil extends List[Nothing]
case class Cons[+A](head: A, tail: List[A]) extends List[A]

object Main {
    object List {
        def apply[A](as: A*): List[A] =
            if (as.isEmpty) Nil
            else Cons(as.head, apply(as.tail: _*))
    }
    def sum(ints: List[Int]): Int = ints match {
        case Nil => 0
        case Cons(x,xs) => x + sum(xs)
    }
    
    def main(args: Array[String]): Unit = {
        val x = List(1,2,3,4,5) match {
            case Cons(x, Cons(2, Cons(4, _))) => x
            case Nil => 42
            case Cons(x, Cons(y, Cons(3, Cons(4, _)))) =>x+y
            case Cons(h, t) => h + sum(t)
            case _ => 101
        }
        println(x)
    }
}
```

## 3.2

```scala
sealed trait List[+A]
case object Nil extends List[Nothing]
case class Cons[+A](head: A, tail: List[A]) extends List[A]

object Main {
    object List {
        def apply[A](as: A*): List[A] =
            if (as.isEmpty) Nil
            else Cons(as.head, apply(as.tail: _*))
    }
    
    def tail[A](list: List[A]): List[A] =
        list match {
            case Nil => Nil
            case Cons(x, xs) => xs
        }
    
    def main(args: Array[String]): Unit = {
        val x = tail[Int](List(1,2,3,4,5))
        println(x)
    }
}
```

## 3.3

```scala
sealed trait List[+A]
case object Nil extends List[Nothing]
case class Cons[+A](head: A, tail: List[A]) extends List[A]

object Main {
    object List {
        def apply[A](as: A*): List[A] =
            if (as.isEmpty) Nil
            else Cons(as.head, apply(as.tail: _*))
    }

    def setHead[A](list: List[A], head: A): List[A] =
        list match {
            case Nil => Cons(head, Nil)
            case Cons(x, xs) => Cons(head, xs)
        }
    
    def main(args: Array[String]): Unit = {
        val x = setHead(List(1,2,3,4,5), 9)
        println(x)
    }
}
```

## 3.4

```scala
sealed trait List[+A]
case object Nil extends List[Nothing]
case class Cons[+A](head: A, tail: List[A]) extends List[A]

object Main {
    object List {
        def apply[A](as: A*): List[A] =
            if (as.isEmpty) Nil
            else Cons(as.head, apply(as.tail: _*))
    }
    
    def drop[A](l: List[A], n: Int): List[A] =
        if (n == 0) {
            l
        } else {
            l match {
                case Nil => Nil
                case Cons(x, xs) => drop(xs, n - 1)
            }
        }
    
    def main(args: Array[String]): Unit = {
        val x = drop(List(1,2,3,4,5), 3)
        println(x)
    }
}
```
