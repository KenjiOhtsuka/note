---
layout: post
category: python backog nulab

---


nulab Backlog で 課題の予定時間を合計するためのスクリプトを作りました。 担当者別、ステータス別、カテゴリ別に集計します。 少しコードを変えれば、実績時間なども集計できます。参考になれば幸いです。

## やりたかったこと

### 目的

* Backlog のひとつのプロジェクト全体で、予定工数を人別に、ステータス別、カテゴリ別に集計したかった。

### 条件

* LLで素早く作りたい。 結構いろんな開発を同時進行で行なっているためIDEをもうひとつ立ち上げる気はない。

## 実現方法

* jupyter notebook を使う。（コードは jupyter notebook でなくても動くし、結果も取得可能）
* 課題のデータはとりあえず全部取得して、その後の処理は Python の pandas を使う。 Pivot Table つくれるのできっと楽。

## 環境

* Python 3.9.0
* pandas 1.1.5
* numpy 1.19.4

## コード

改善点はいろいろあるけども、とりあえず動くものを作った。

まずはデータを取得する。

```python
import json
import pandas as pd
import urllib


class BacklogUrl:
    base = 'https://xxxxxx.backlog.xxx'
    key = '__API_KEY___'
    
    def __init__(self, path, param = {}):
        self.path = path
        self.param = param
    
    def to_str(self):
        text = BacklogUrl.base + self.path

        i = 0
        for k, v in self.param.items():
            if i == 0:
                text += '?'
            else:
                text += '&'
            text += f'{k}={v}'
            i += 1
        if len(self.param) == 0:
            text += '?'
        else:
            text += '&'
        text += f'apiKey={BacklogUrl.key}'
        i += 1
        
        return text
    
    def get(self):
        try:
            url = self.to_str()
            print(url)
            result = urllib.request.urlopen(url).read()
            print(result)
            return json.loads(result)
        except e:
            print(e.message)
            raise e

            
class Backlog:
    def get_project(key):
        return Project(BacklogUrl(f'/api/v2/projects/{key}').get()['id'])
        
        
class Project:
    def __init__(self, id):
        self.id = id
        
    def get_issues(self):
        count = self.get_issue_count()
        max_itr = (count + 99) // 100
        
        list = []
        for i in range(max_itr):
            list += BacklogUrl(
                f'/api/v2/issues',
                {
                    'projectId[]': self.id, 'sort': 'created', 'count': 100, 'offset': i * 100
                }
            ).get()
            
        return list
    
    def get_issue_count(self):
        return BacklogUrl(f'/api/v2/issues/count', {'projectId[]': self.id}).get()['count']
    
# プロジェクトのキーを引数にする
project = Backlog.get_project('ABCDE')
issues = project.get_issues()
```

Backlog サーバへはもうアクセスしない。

DataFrame を作る。 

```python
df = pd.DataFrame(issues)
```

DataFrame から集計対象データを抽出する。 子課題のみ対象とする。 （これは運用によっていろいろ条件があると思う。）

```python
childIssues = df[~df['parentIssueId'].isnull()]
```

カテゴリ名、担当者名、ステータス名が dict になっており 集計できないので、 集計のキーにするカラムを新しく作る。
名前は、 category1, assignee1, status1 とした。

```python
childIssues.loc[:, 'category1'] = childIssues.category.map(lambda x: x[0]['name'])
childIssues.loc[:, 'assignee1'] = childIssues.assignee.map(lambda x: x['name'] if x is not None else None)
childIssues.loc[:, 'status1'] = childIssues.status.map(lambda x: x['name'])
```

Pivot Table を作成する。

```python
import numpy as np
table = pd.pivot_table(
    childIssues,
    index='category1', columns=['assignee1', 'status1'], values=['estimatedHours'],
    aggfunc=np.sum, margins=True, fill_value=0
)
```

jupyter notebook であれば、 `table` を実行すればテーブルが表示される。
jupyter notebook を使っていない場合は to_csv, to_clipboard などを使うとCSVに変換したり、コピーしたりできる。

```python
table
```

estimatedHours は時間単位なのでこれを日付単位にしたければ 8 で割って表示する。（1日8時間稼働できると仮定した場合。）

```python
table / 8.0
```
