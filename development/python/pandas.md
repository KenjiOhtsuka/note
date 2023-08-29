---
layout: page
title: Pandas - Python Data Analysis Library
---

| method               |                                          |
|:---------------------|:-----------------------------------------|
| pd.read_csv()        | Read CSV                                 |
| df.to_csv()          | Output as CSV                            |
| df.read()            | List first 3 lines                       |
| df.tail()            | List last 3 lines                        |
| df.shape             |                                          |
| df.index             |                                          |
| df.columns           | Return columns                           |
| df.dtypes            |                                          |
| df[[column_name]]    | list value of the column name with index |
| df.loc[]             |                                          |
| df.iloc[]            |                                          |
| df.query()           |                                          |
| df.unique()          |                                          |
| df.drop_duplicates() |                                          |
| df.describe()        |                                          |
| df.set_index()       |                                          |
| df.sort_values()     |                                          |
| df.rename()          |                                          |
| df.to_datetime()     |                                          |
| df.sort_index()      |                                          |
| df.resample()        |                                          |
| df.apply()           |                                          |
| pd.cut()             |                                          |
| df.isnull()          |                                          |
| df.any()             |                                          |
| df.fillna()          |                                          |
| df.dropna()          |                                          |
| df drop()            |                                          |
| df.mask()            |                                          |
| df.where()           |                                          |
| df.replace()         |                                          |
| df.value_counts()    |                                          |
| df.groupby()         |                                          |
| df.diff()            |                                          |
| df.rolling()         |                                          |
| df.pct_change()      |
| df.plot()            |                                          |
| df.corr()            |                                          |
| df.pivot()           |                                          |
| df.melt()            |                                          |
| df.get_dummies()     |                                          |

## df.drop

* 列を削除する。
    * 複数列の削除も可能。

    ```python
    df.drop('Column_Name', axis=1)
    df.drop(['Column A', 'Column B', 'Column C'], axis=1)
    ```
