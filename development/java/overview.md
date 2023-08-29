---
layout: page
title: Java 概要
---

javax: Java Extensions

## アクセサ

### メリット

* 代入時に値の生合成チェックができる。
* インターフェースはそのままで、内部の値の持ち方を変えることができる。
* `synchronized` 修飾子を付与してマルチスレッド対応できる。

### デメリット

* 手間。
* ソースがアクセサに埋もれる。

## ファイルへの書き込み

### Pattern 1

```java
try {
    String content = "text";
    File file =new File("C://myfile.txt");

    if (!file.exists()) file.createNewFile();

    FileWriter fw = new FileWriter(file,true);
    BufferedWriter bw = new BufferedWriter(fw);
    bw.write(content);
    bw.close();
    // BufferedWriter が FileWriter のクローズも行うため、
    // FileWriter を明示的にクローズしなくてもよい。
} catch (IOException e) {
     e.printStackTrace();
}
```
 
 ### Pattern 2 - Use PrintWriter
 
```java
try {
    File file =new File("C://myfile.txt");
    if(!file.exists()) file.createNewFile();

    FileWriter fw = new FileWriter(file,true);
    BufferedWriter bw = new BufferedWriter(fw);
    PrintWriter pw = new PrintWriter(bw);

    pw.println("text");
    pw.close();
    // PrintWriter をクローズすると、
    // PrintWriter に関連している　BufferedWriter, FileWriter もクローズされます。
} catch (IOException e) {
    e.printStackTrace();
}
```

## キーボードからの読み込み

```java
try {
    BufferedReader br =
        new BufferedReader(
            new InputStreamReader(System.in));
    String str = br.readLine();
} catch (IOException e) {
    e.printStackTrace();
}
```

## System

* `System.out`: 標準出力
* `System.in`: 標準入力
