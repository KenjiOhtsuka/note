---
title: JavaScript モジュール機能
---

## モジュールの概要

JavaScript にはモジュール機能がある。
モジュール機能を使うと、複数のファイルに分割したコードを、
モジュールとして読み込むことができる。

モジュール機能を使うと、
グローバルスコープを汚染することなく、
コードを分割することができる。

## モジュールの書き方

モジュールを書くには、
`export` と `import` を使う。

### `export`

`export` を使うと、 モジュールの外から変数や関数、クラスにアクセスできるようになります。

#### 名前付きエクスポート

```javascript
export function sum(x, y) {
  return x + y;
}
```

```javascript
export const pi = 3.141592;
```

```javascript
export class Point {
  constructor(x, y) {
    this.x = x;
    this.y = y;
  }
}
```

#### デフォルトエクスポート

ファイルの中で1回だけ、 `export default` を使うことができます。
これを使うと、 インポートする側で明示的に `import` する必要がなくなります(詳しくは下へ)。

```javascript
export default function sum(x, y) {
  return x + y;
}
```

```javascript
export default class Point {
  constructor(x, y) {
    this.x = x;
    this.y = y;
  }
}
```


### `import`

`import` は、 モジュールを読み込むためのキーワードです。
`import` は、 `export` と対にして使います。

#### 名前付きインポート

名前付きエクスポートしたものをインポートするには、 `import` に `{}` を使います。
`{}` の中に、 インポートしたいものの名前を書きます。

```javascript
import { sum, pi } from './math';
```

```javascript
import * as math from './math';
```

```javascript
import { sum as add, pi } from './math';
```

```javascript
import sum from './math';
```

#### デフォルトインポート

デフォルトエクスポートしたものをインポートするには、 `import` に `{}` を使いません。

```javascript
import sum from './math';
```

```javascript
import Point from './math';
```

### 再エクスポート

`export` したものを、 別のファイルから `export` することもできます。

```javascript
export { sum } from './math';
```

```javascript
export * from './math';
```

## モジュールの読み込み

モジュールを読み込むには、
`<script>` タグの `src` 属性に、
モジュールのパスを指定します。

```html
<script type="module" src="./main.js"></script>
```

`<script>` タグの `type` 属性に `module` を指定することで、
モジュールとして読み込めます。


