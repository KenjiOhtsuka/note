---
date: 2023-10-13
title: "fill records in pandas dataframe"
categories: [ Programming Language ]
tags: [ Python, Pandas ]
layout: post
---

## fill records in pandas dataframe

下のような`x=1`から始まるデータをグラフにしたい時、
単純にplotをしたのでは、xの値が飛んでしまう。

| x |  y |
|--:|---:|
| 1 |  3 |
| 2 |  4 |
| 5 |  6 |
| 6 | 10 |
| 9 |  8 |

そこで、xの値を埋める。

```python
comp_diff = pd.DataFrame({'column_1': range(0, df['column_1'].max() + 2)})
merged_df = comp_diff.merge(df, on='xolumn_1', how='left')
merged_df = merged_df.fillna({'column_2':0})
```

これで、xの値が飛ばされることなく、グラフを描くことができる。

## fill datetime records in pandas dataframe

日付のデータをグラフにしたい時、
単純にplotをしたのでは、上のように、日付の値が飛んでしまう場合がある。

そこで、日付の値を埋める。
たとえば、分ごとにデータを取得している場合は次のようにする。

```python
comp_diff = pd.DataFrame({'date': pd.date_range(df['date'].min(), df['date'].max(), freq='1min')})
merged_df = comp_diff.merge(df, on='date', how='left')
merged_df = merged_df.fillna({'column_2':0})
```

`DateTimeIndex`がしていされているDataFrameに対しては:

```python
plt = plt.asfreq('T').fillna({'column_2': data_key, 'column_3': 0})
```

`asfreq` の引数として`fill_value`を指定することもできる。

<div lang="en">
<p>When you want to plot data like the following, you cannot plot it simply because the value of x is skipped.</p>

<table style="text-align:right;">
<thead>
<tr>
<th style="text-align:right;">x</th>
<th style="text-align:right;">y</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>3</td>
</tr>
<tr>
<td>2</td>
<td>4</td>
</tr>
<tr>
<td>6</td>
<td>4</td>
</tr>
<tr>
<td>7</td>
<td>5</td>
</tr>
</tbody>
</table>

<p>So, fill the value of `x`.</p>

<pre><code class="language-python">comp_diff = pd.DataFrame({'column_1': range(0, df['column_1'].max() + 2)})
merged_df = comp_diff.merge(df, on='xolumn_1', how='left')
merged_df = merged_df.fillna({'column_2':0})</code></pre>

<p>Then, you can plot the data without skipping the value of `x`.</p>

<h2>fill datetime records in pandas dataframe</h2>

<p>When you want to plot data like the following, you cannot plot it simply because the value of date is skipped.</p>

<table style="text-align:right;">
<thead>
<tr>
<th style="text-align:right;">date</th>
<th style="text-align:right;">y</th>
</tr>
</thead>
<tbody>
<tr>
<td>2021-10-01 00:00:00</td>
<td>3</td>
</tr>
<tr>
<td>2021-10-01 00:01:00</td>
<td>4</td>
</tr>
<tr>
<td>2021-10-01 00:05:00</td>
<td>4</td>
</tr>
<tr>
<td>2021-10-01 00:06:00</td>
<td>5</td>
</tr>
</tbody>
</table>

<p>So, fill the value of `date`.</p>

<pre><code class="language-python">comp_diff = pd.DataFrame({'date': pd.date_range(df['date'].min(), df['date'].max(), freq='1min')})
merged_df = comp_diff.merge(df, on='date', how='left')
merged_df = merged_df.fillna({'column_2':0})</code></pre>

<p>For DataFrame with `DateTimeIndex`:</p>

<pre><code class="language-python">plt = plt.asfreq('T').fillna({'column_2': data_key, 'column_3': 0})</code></pre>

<p>You can also specify `fill_value` as an argument of `asfreq`.</p>
</div>
