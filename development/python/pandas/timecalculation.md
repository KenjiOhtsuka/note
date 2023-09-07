---
title: 時間でデータを整理する方法
date: 2023-09-08 23:59:59 +0900
tags: [pandas, python, datetime]
categories: [development, python, pandas]
---

## 時系列データをプロットする。

時系列データをプロットするには、インデックスを時系列データにする必要がある。

```python
df = df.set_index('timestamp')
df.plot()
```

これで時系列折れ線グラフが表示される。

## 時系列のヒストグラムを作る

```python
import numpy as np
df = pd.DataFrame(df["timestamp"])
df['value'] = 1
df = df.set_index('timestamp')
# daily
df1 = df.resample('D').sum()
df1.plot()
df1.max()
```

`resample` に渡す文字列は、[Offset Aliases](https://pandas.pydata.org/pandas-docs/stable/user_guide/timeseries.html#offset-aliases) に従う。
私は下のものをよく使う。

| 文字列 | 説明 |
|:----|:---|
| S   | 秒  |
| T   | 分  |
| H   | 時  |
| D   | 日  |
| W   | 週  |
| M   | 月  |
