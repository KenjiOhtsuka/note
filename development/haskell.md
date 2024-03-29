---
layout: page
title: Haskell
---

## Installation

### macOS

```sh
brew install stack
stack setup
stack path
```

## stack

### run app

```sh
stack run
```

### run ghci

```sh
stack ghci
```

## get input

```haskell
getLine
variable <- getLine
```

## convert string to int

```haskell
variable <- getLine
let num = read variable :: Int
```

## calculate int with double

整数値と小数値の計算をするには、整数値を `fromIntegral` で　Num にして計算する。

```haskell
let variable = 100
(fromIntegral variable) * 1.5
```

## print

```haskell
putStrLn ...
putStr ...
print ...
print $ show ...
```

## 条件分岐

`if` は Haskell では式となる。

### if

```haskell
if var == 1 then
  ...
else
  ...
```

```haskell
if var == 1
  then 2
  else 3
```

this can be written in a line.

```haskell
if var == 1 then 2 else 3
```

`else` clause is required. `if` is a function, not a statement.

## ghci command

* `:l`
  * load file
      ```haskell
      :l file_name
      -- load file_name.hs
      ```

## List

all the elements in a list must be in the same type.

### operator

* `++`
  * combine lists

### index access

use `!!`.

```haskell
"abcde" !! 1
-- > 'b'
[1, 2, 3] !! 2
-- > 3
```

### comparison

2 lists are comparable.

```haskell
[1, 2, 3] < [3, 2, 1]
-- > True
```

### generate list from range

range expression (`..`) generates list

```haskell
[1..9]
-- > [1, 2, 3, 4, 5, 6, 7, 8, 9]
```

```haskell
['a'..'g']
-- > ['a', 'b', 'c', 'd', 'e', 'f', 'g']
```

range with step can be written as the first, second and last elements.

```haskell
[2, 4..8]
-- > [2,4,6,8]
[20,19..1]
-- > [20,19,18,17,16,15,14,13,12,11,10,9,8,7,6,5,4,3,2,1]
```

infinity list can be generated with range expression.

```haskell
take 10 [13,26..]
-- > [13,26,39,52,65,78,91,104,117,130]
```

## built-in function

### arithmatic

#### succ

increment

```haskell
succ 8
-- > 9
```

#### max

```haskell
max 1 5
-- > 5
max 1.0 4.0
-- > 4.0
```

#### div

```haskell
div 92 10
-- > 9
```

#### mod

```haskell
mod 5 3
```

### lines

split string into multiple lines

```haskell
lines "a\nb"
-- > ["a", "b"]
```

### unlines

```haskell
unlines ["a", "b"]
-- > "a\nb\n"
```

### break

break list when the first argument returns true

```haskell
break (\x ->mod x 2==0) [1,2,3,4,5,6,7]
-- > ([1],[2,3,4,5,6,7])
break (\x ->mod x 100==0) [1,2,3,4,5,6,7]
-- > ([1,2,3,4,5,6,7],[])
```

### elem

when the first argument is in the second argument, return true. Otherwise false.

```haskell
elem 1 [1, 2, 3]
-- > true
1 `elem` [1, 2, 3]
-- > true
```

### notElem

### length

length of the list

```haskell
length [1, 2, 3]
-- > 3
```

### null

same as whether length is zero.

```haskell
null []
-- > true
null "text"
-- > False
null ""
-- > True
```

### head

the first element

### tail

elements except the first one

### last

the last element

### init

elements except the last one

### ++

```haskell
[1] ++ [2]
-- > [1, 2]
```

### concat

```haskell
concat [[1], [2]]
-- > [1, 2]
```

### reverse

```haskell
reverse "123"
-- > "321"
```

### and

```haskell
and [True, False True]
-- > False
```

`&&` is used as infix poerator

### or

```haskell
or [True, False True]
-- > True
```

`||` is used as infix poerator

### all

When every elements in the second argument generates True with the first argument, return True.
Otherwise, False.

```haskell
all odd [1, 2, 3]
-- > False
all (\x -> x == 2) [2, 3]
-- > False
```

### any

When there is an element in the second argument which generates True with the first argument, return True.
Otherwise, False.

```haskell
any odd [1, 2, 3]
-- > False
any (\x -> x == 2) [2, 3]
-- > False
```

### take

take the number of formar elements from the list.

```haskell
take 3 [1, 2, 3, 4, 5]
--> [1, 2, 3]
```

```haskell
take 10 [13,26..]
-- > [13,26,39,52,65,78,91,104,117,130]
```

```haskell
take 10 (cycle [1, 4, 6])
-- > [1,4,6,1,4,6,1,4,6,1]

take 10 (repeat 1)
-- > [1,1,1,1,1,1,1,1,1,1]
```

### drop

remove the number of formar elements from the list.

```haskell
drop 3 [1, 2, 3, 4, 5]
-- > [4, 5]
```

### sum

### product

### maximum

### minimum

### splitAt

### takeWhile

```haskell
takeWhile odd [1, 2, 3, 4, 5]
-- > [1]
```

### dropWhile

```haskell
dropWhile even [2, 4, 5]
-- > [5]
```

### span

Split list into 2 groups.
it is similar to break.

```haskell
span odd [1, 2 , 3, 4, 5]
-- > ([1], [2, 3, 4, 5])
break odd [1, 2 , 3, 4, 5]
-- > ([], [2, 3, 4, 5])
```

### filter

```haskell
filter odd [1, 2, 3, 4]
-- > [1, 3]
```

### module: Data.List

#### isPrefixOf

```haskell
"abc" isPrefixOf "abcd"
-- > True
```

#### isInfixOf

#### isSuffixOf

### zip

```haskell
zip [1, 2, 3] [4, 5]
-- > [(1,4),(2,5)]
```

### zipWith

```haskell
zipWith (+) [1, 3, 5] [3, 5, 9]
-- > [4, 8, 14]
```

there are many similar functions for multiple lists.

```
*Main Data.List> :type zip3
zip3 :: [a] -> [b] -> [c] -> [(a, b, c)]
*Main Data.List> :type zip4
zip4 :: [a] -> [b] -> [c] -> [d] -> [(a, b, c, d)]
*Main Data.List> :type zip5
zip5 :: [a] -> [b] -> [c] -> [d] -> [e] -> [(a, b, c, d, e)]
*Main Data.List> :type zip6
zip6
  :: [a] -> [b] -> [c] -> [d] -> [e] -> [f] -> [(a, b, c, d, e, f)]
*Main Data.List> :type zip7
zip7
  :: [a]
     -> [b]
     -> [c]
     -> [d]
     -> [e]
     -> [f]
     -> [g]
     -> [(a, b, c, d, e, f, g)]
```

### map

### module: Data.Char

#### toLower

#### toUpper

### negate

multiple -1

### module: Data.Bits

#### .&.

#### .|.

#### shiftL

```haskell
1 `shiftL` 1
-- > 2
shiftL 2 2
-- > 8
```

## DB Connection

### setup

```sh
stack install HDBC
stack install HDBC-postgresql
stack install HDBC-mysql
```

### Sample code

```haskell
import Database.HDBC
import Database.HDBC.PostgreSQL
import Database.HDBC.MySQL

main = do
  conn <- connectPostgreSQL "host=54.250.123.50 dbname=mother user=prd_user password=P0s@uneR3278"
  result <- quickQuery' conn "SELECT * from members limit 10" []
  print result
  disconnect conn
```

### Compile

```sh
stack ghc -v something.hs --package HDBC --package HDBC-postgresql --package HDBC-mysql
```
