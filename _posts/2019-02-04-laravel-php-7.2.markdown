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
