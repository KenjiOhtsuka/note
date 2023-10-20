---
layout: page
title: HTML5 functions for client agent
date: 2023-10-11
---

## Cache manifest

WebブラウザにWebページを強制的にキャッシュさせる

### How To

マニフェストファイル(`.appcache`)を作成する。
マニフェストの中では、キャッシュするファイルをリストアップする。
外部のCSSファイルなども、あればすべて指定する。

```
CACHE MANIFEST
# Version 1.0

CACHE:
xxxxx.html
```

html tagでマニフェストファイルを指定する。

```html
<html manifest="manifest.appcache">
```

### Attention

manifest は非推奨になり、代わりにサービスワーカーが推奨されている。
