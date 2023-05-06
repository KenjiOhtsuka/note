---
title: ライブラリの作り方
---

## ファイル構成

```
root
|- library_name
|  |- __init__.py
|  `- something.py
|- MANIFEST.in
|- README.rst
|- requirements.txt
`- setup.py
```

## setup.py を作る

## editmodeでインストール

```
pip install -e .
```

## GitHubからインストール

```
pip install git+https://github.com/sample/lib
```

## パッケージ化

```
python setup.py sdist
```

sdistの代わりにbdistも使える。

## アップロード

更新可否の確認

```
twine check dist/lib-*.tar.gz
```

アップロード

```
twine upload --repository pypi dist/lib-*.tar.gz
```