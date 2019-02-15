---
layout: post
title:  "Laravel のエラーを回避した方法"
date:   2019-02-02 22:52:48 +0900
categories: php laravel 7.2
---

Laravel 5.2 を使っていた。
PHP 7.2 で動かした時にエラーが出たので、Laravelのコードを直接書き換えて問題を回避した。

出ていたエラーは次の通り。

```
[2019-02-02 23:59:19] production.ERROR: ErrorException: count(): Parameter must be an array or an object that implements Countable in /home/....../vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php:1174
```

変更したのはこのファイル。 `vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php`
`is_array` で `Array` であるかを調べ、 `is_a` で `Countable` インターフェース が実装されているかを調べるようにした。

```php
1171         // We will keep track of how many wheres are on the query before running the
1172         // scope so that we can properly group the added scope constraints in the
1173         // query as their own isolated nested where statement and avoid issues.
1174         $whereValue = $query->wheres;
1175         if (is_array($whereValue) || is_a($whereValue, "Countable"))
1176             $originalWhereCount = count($query->wheres);
1177         else
1178             if (!empty($query->wheres))
1179                 $originalWhereCount = 1;
1180             else
1181                 $originalWhereCount = 0;
1182 
1183         $whereCounts = [$originalWhereCount];
1184 
1185         foreach ($this->scopes as $scope) {
1186             $this->applyScope($scope, $builder);
1187 
1188             // Again, we will keep track of the count each time we add where clauses so that
1189             // we will properly isolate each set of scope constraints inside of their own
1190             // nested where clause to avoid any conflicts or issues with logical order.
1191             $whereValue = $query->wheres;
1192             if (is_array($whereValue) || is_a($whereValue, "Countable"))
1193                 $whereCounts[] = count($query->wheres);
1194             else
1195                 if (!empty($query->wheres))
1196                     $whereCounts[] = 1;
1197                 else
1198                     $whereCounts[] = 0;
1199         }
```
