---
layout: page
title: Python Library
---

## Anaconda

* Python のディストリビューション。
    * あらかじめいくつかの主要なライブラリがインストールされた状態の Python
* Continuum Analutics 社 提供

## バージョン管理ツール pyenv

Macの場合は次のコマンドでインストール可能

```sh
brew install pyenv
```

* インストール可能な Python 一覧 を出す
    ```sh
    pyenv install --list
    ```
* Anaconda をインストールする。
    ```sh
    pyenv install anaconda3-4.2.0
    ```
* インストールした Python のバージョン一覧をだす
    ```sh
    pyenv versions
    ```

デフォルトでは `brew` など でインストールした Python が優先されてしまうので、 rc ファイル に次を加える。

```sh
export PYENV_ROOT="${HOME}/.pyenv"
export PATH=${PYENV_ROOT}/bin:$PATH
eval "$(pyenv init -)"
```

## Keras

TensorFlow, Theano のラッパーライブラリ

```sh
pip install keras
```

## Pandas

データ分析におけるデータの操作で役立つライブラリ

## cv2

* 画像に関するいろんな作業を行えるライブラリ。

### サンプル

* 単色グレースケールの画像を作成する
    
    ```python
    import cv2
    import math
    import numpy as np
    Import random
    
    img = np.ones((750, 750, 3), np.float64)
    img *= int(random.random() * 256)
    cv2.imwrite('random.jpg', img)
    ```
