---
title: JavaScript 配列操作
---

`Array`にはいくつか有用なメソッドがあるのでメモしておく。

## `isArray`

```javascript
Array.isArray([1, 2, 3]);  // true
Array.isArray({foo: 123}); // false
Array.isArray('foobar');   // false
```

## `indexOf`

```javascript
var a = ['a', 'b', 'c'];
a.indexOf('b'); // 1
a.indexOf('z'); // -1
```

## `includes`

これは ES2016 で追加された。

```javascript
var a = ['a', 'b', 'c'];
a.includes('b'); // true
a.includes('z'); // false
```

## `length`

```javascript
var a = ['a', 'b', 'c'];
a.length; // 3
```

## `toString`

```javascript
var a = ['a', 'b', 'c'];
a.toString(); // 'a,b,c'
```

## `concat`

```javascript
var a = ['a', 'b', 'c'];
a.concat(['d', 'e', 'f']); // ['a', 'b', 'c', 'd', 'e', 'f']
```

### スプレッド構文

ES2015 で追加されたスプレッド構文を使うと、`concat` と同じことができる。

```javascript
var a = ['a', 'b', 'c'];
[...a, 'd', 'e', 'f']; // ['a', 'b', 'c', 'd', 'e', 'f']
var b = ['d', 'e', 'f'];
[...a, ...b]; // ['a', 'b', 'c', 'd', 'e', 'f']
```

