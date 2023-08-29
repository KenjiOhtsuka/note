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


## `join`

```javascript
var a = ['a', 'b', 'c'];
a.join();    // 'a,b,c'
a.join('');  // 'abc'
a.join('-'); // 'a-b-c'
```

## `sort`

```javascript
var a = [1, 4, 3, 2, 5];
a.sort(); // [1, 2, 3, 4, 5]
```

比較順序を指定することもできる。

```javascript
var a = [1, 4, 3, 2, 5];
a.sort(function (a, b) {
  return a - b;
}); // [1, 2, 3, 4, 5]
```

また、下の配列に影響を与えずにソートしたい場合は、`slice` でコピーを作ってからソートする。
(スプレッド構文、 `concat` でも同じことができる)

```javascript
var a = [1, 4, 3, 2, 5];
var b = a.slice().sort(function (a, b) {
  return a - b;
}); // [1, 2, 3, 4, 5]
```

## `reverse`

```javascript
var a = [1, 2, 3, 4, 5];
a.reverse(); // [5, 4, 3, 2, 1]
```

こちらも `sort` と同様にして、 元の配列に影響を与えずにソートすることができる。

## 配列要素の操作

|           |                | 引数                           |
|:----------|:---------------|:-----------------------------|
| `pop`     | 末尾の要素を取り除く     | (なし)                         |
| `push`    | 末尾に要素を追加       | 追加する要素                       |
| `shift`   | 先頭の要素を取り除く     | (なし)                         |
| `unshift` | 先頭に要素を追加       | 追加する要素                       |
| `splice`  | 指定した位置の要素を取り除く | 対象要素のindex, 要素数(, 先頭に追加する要素) |

## `flat`

配列のネストを解除する。 ES2019 で追加された。

```javascript
var a = [1, 2, [3, 4, [5, 6]]];
a.flat(); // [1, 2, 3, 4, [5, 6]]
a.flat(2); // [1, 2, 3, 4, 5, 6]
```

## 分割代入

ES2015.

```javascript
var a, b, rest;
[a, b] = [10, 20];
console.log(a); // 10
console.log(b); // 20
```

```javascript
var [a, b, ...rest] = [10, 20, 30, 40, 50];
console.log(a); // 10
console.log(b); // 20
console.log(rest); // [30, 40, 50]
```

## 高階関数

### `forEach`

```javascript
var a = [1, 2, 3];
a.forEach(function (v, i, a) {
  console.log(v, i, a);
});
```

### `map`

```javascript
var a = [1, 2, 3];
a.map(function (v, i, a) {
  return v * 2;
}); // [2, 4, 6]
```

### `filter`

```javascript
var a = [1, 2, 3];
a.filter(function (v, i, a) {
  return v % 2 === 0;
}); // [2]
```

### `reduce`

```javascript
var a = [1, 2, 3];
a.reduce(function (p, c, i, a) {
  return p + c;
}); // 6
```

## `find`

ES2015。
true を返す最初の要素を返す。
true が返るまで全ての要素を評価する。
すべて false の場合は `undefined` を返す。

```javascript
var a = [1, 2, 3];
a.find(function (v, i, a) {
  return v % 2 === 0;
}); // 2
```

## `findIndex`

ES2015。
true を返す最初の要素の index を返す。
true が返るまで全ての要素を評価する。
すべて false の場合は `-1` を返す。

```javascript
var a = [1, 2, 3];
a.findIndex(function (v, i, a) {
  return v % 2 === 0;
}); // 1
```

## `some`

ES2015。
true を返す要素があれば true を返す。
true が返るまで全ての要素を評価する。
すべて false の場合は `false` を返す。

```javascript
var a = [1, 2, 3];
a.some(function (v, i, a) {
  return v % 2 === 0;
}); // true
```

## `every`

ES2015。
すべての要素が true を返す場合に true を返す。
false が返るまで全ての要素を評価する。

```javascript
var a = [1, 2, 3];
a.every(function (v, i, a) {
  return v % 2 === 0;
}); // false
```
