---
layout: page
title: Calculation of sort algorithms
---

## O-notation

\\( f(n) = O(g(n)) \LeftRightArrow | f(n) | \leq M | g(n) | , \any n \geq n_0 , \exists M \\)


under construction

## 計算量

|            |    最良時間計算量 |     平均時間計算量 |     最悪時間計算量 |                   空間計算量 |
|:-----------|-----------:|------------:|------------:|------------------------:|
| ボゴソート      |       O(n) | O((n + 1)!) | O((n + 1)!) |                    O(1) |
| バブルソート     |       O(n) |      O(n^2) |      O(n^2) |                    O(1) |
| インサーションソート |       O(n) |      O(n^2) |      O(n^2) |                    O(1) |
| マージソート     | O(n log n) |  O(n log n) |  O(n log n) |                    O(n) |
| クイックソート    | O(n log n) |  O(n log n) |    O(n ^ 2) | O(n) (実装によっては O(log n)) |

## ストレージ

* Google File System
    * クラスタを1つの記憶領域として扱うソフトウェア
* MapReduce
    * クラスタの計算資源を効率的に利用して、並列分散処理をする仕組み
* BigTable
    * Google File System のためのデータベース
