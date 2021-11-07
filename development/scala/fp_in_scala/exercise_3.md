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

## 3.5

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
    
    def dropWhile[A](l: List[A], f: A => Boolean): List[A] =
        l match {
            case Nil => Nil
            case Cons(x, xs) => if (f(x)) dropWhile(xs, f) else l
        }
    
    def main(args: Array[String]): Unit = {
        val x = dropWhile(List(2, 4, 6, 1, 3, 5), (i: Int) => i % 2 == 0)
        println(x)
    }
}
```

## 3.6

To reach the last element, we have to traverse the list from the front,
so the function takes larger time when it handles larger list.

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
    
    def init[A](l: List[A]): List[A] =
        l match {
            case Nil => Nil
            case Cons(x, Nil) => Nil
            case Cons(x, xs) => Cons(x, init(xs))
        }
    
    def main(args: Array[String]): Unit = {
        val x = init(List(1, 2, 3, 4, 5))
        println(x)
    }
}
```

## 3.7

Impossible.

## 3.8

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

    def foldRight[A,B](as: List[A], z: B)(f: (A, B) => B): B =
        as match {
            case Nil => z
            case Cons(x, xs) => f(x, foldRight(xs, z)(f))
        }

    def main(args: Array[String]): Unit = {
        val r = foldRight(List(1,2,3), Nil:List[Int])(Cons(_,_))
        println(r)
    }
}
```

`foldRight` destruct the given list and `Cons` compose the list.

### Step by Step

1. foldRight(Cons(1, Cons(2, Cons(3, Nil))), Nil)(Cons(_,_))
1. Cons(1, foldRight(Cons(2, Cons(3, Nil)), Nil)(Cons(_,_)))
1. Cons(1, Cons(2, foldRight(Cons(3, Nil), Nil)(Cons(_,_))))
1. Cons(1, Cons(2, Cons(3, foldRight(Nil, Nil)(Cons(_,_)))))
1. Cons(1, Cons(2, Cons(3, Nil)))

### Output

```
Cons(1,Cons(2,Cons(3,Nil)))
```

## 3.9

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

    def foldRight[A,B](as: List[A], z: B)(f: (A, B) => B): B =
        as match {
            case Nil => z
            case Cons(x, xs) => f(x, foldRight(xs, z)(f))
        }

    def length[A](as: List[A]): Int =
        foldRight(as, 0)((_, a: Int) => a + 1)
    
    def main(args: Array[String]): Unit = {
        println(length(List(1,2,3)))
    }
}
```

### Step by Step

1. foldRight(Cons(1, Cons(2, Cons(3, Nil))), 0)((_, a: Int) => a + 1)
1. foldRight(Cons(2, Cons(3, Nil)), 0)((_, a: Int) => a + 1)) + 1
1. foldRight(Cons(3, Nil), 0)((_, a: Int) => a + 1)) + 1 + 1
1. foldRight(Nil, 0)((_, a: Int) => a + 1)) + 1 + 1 + 1
1. 0 + 1 + 1 + 1 (= 3)

## 3.10

The main function calculates the length of the list, `List(1, 2, 3)`.

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

    @annotation.tailrec
    def foldLeft[A,B](as: List[A], z: B)(f: (B, A) => B): B =
        as match {
            case Nil => z
            case Cons(x, xs) => foldLeft(xs, f(z, x))(f)
        }

    
    def main(args: Array[String]): Unit = {
        println(foldLeft(List(1, 2, 3), 0)((a, _: Int) => a + 1))
    }
}
```

### Step by Step

1. foldLeft(Cons(1, Cons(2, Cons(3, Nil))), 0)((a, _: Int) => a + 1)
1. foldLeft(Cons(2, Cons(3, Nil)), 0 + 1)((a, _: Int) => a + 1)
1. foldLeft(Cons(2, Cons(3, Nil)), 1)((a, _: Int) => a + 1)
1. foldLeft(Cons(3, Nil), 1 + 1)((a, _: Int) => a + 1)
1. foldLeft(Cons(3, Nil), 2)((a, _: Int) => a + 1)
1. foldLeft(Nil, 2 + 1)((a, _: Int) => a + 1)
1. foldLeft(Nil, 3)((a, _: Int) => a + 1)
1. 3

## 3.11

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
        
    @annotation.tailrec
    def foldLeft[A,B](as: List[A], z: B)(f: (B, A) => B): B =
        as match {
            case Nil => z
            case Cons(x, xs) => foldLeft(xs, f(z, x))(f)
        }
    
    def sum(as: List[Double]): Double = 
        foldLeft(as, 0.0)((a, b) => a + b)
    
    def product(as: List[Double]): Double =
        foldLeft(as, 1.0)((a, b) => a * b)
    
    def length[A](as: List[A]): Int = 
        foldLeft(as, 0)((a, _) => a + 1)
    
    def main(args: Array[String]): Unit = {
        val l = List[Double](1, 2, 3, 4)
        println(length(l))
        println(sum(l))
        println(product(l))
    }
}
```

## 3.12

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
        
    @annotation.tailrec
    def foldLeft[A,B](as: List[A], z: B)(f: (B, A) => B): B =
        as match {
            case Nil => z
            case Cons(x, xs) => foldLeft(xs, f(z, x))(f)
        }
    
    def reverse[A](l: List[A]): List[A] = foldLeft(l, List[A]())((a, b) => Cons(b, a))
    
    def main(args: Array[String]): Unit = {
        val l = List(1, 2, 3, 4)
        println(reverse(l))
    }
}
```