---
layout: page
---

# Libraries

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