---
layout: page
---

# Haskell

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

## built-in function

### lines

split string into multiple lines

```haskell
lines "a\nb"
-- >  ["a", "b"]
```
