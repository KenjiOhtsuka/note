---
title: JavaScript ES2105で新しく使えるようになった機能
---

## デフォルト引数

```javascript
function f(x, y = 12) {
  // y is 12 if not passed (or passed as undefined)
  return x + y;
}
```

## 可変長引数

```javascript
function f(x, y, ...a) {
  return (x + y) * a.length
}
f(1, 2, "hello", true, 7) === 9
```

可変長引数は残余引数(Rest parameters)とも呼ばれる。

## 引数の分割代入

```javascript
function f([x, y, ...a], b) {
  return (x + y) * a.length
}
f([1, 2, 3], 4) === 9
```

上の例では、`x = 1`, `y = 2`, `a = [3]`, `b = 4` となる。

オブジェクトを分割代入することもできる。

```javascript
function f({x, y, ...a}, b) {
  return (x + y) * a.length
}
f({x: 1, y: 2, z: 3}, 4) === 9
```

上の例では、`x = 1`, `y = 2`, `a = {z: 3}`, `b = 4` となる。

配列に関してES2015で追加された機能は [配列操作](array_operation.html) にもある。
