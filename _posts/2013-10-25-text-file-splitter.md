---
layout: post
title: テキストファイルを行単位で分割するスクリプト
date: 2013-10-25 00:00:00 +0900
categories: [Windows, JScript]
tags: [Windows, JScript]
---

Script to split text file by some amount of lines. It works on Windows, using JScript. 

テキストファイルを行単位で分割するスクリプト。Windows で動きます。JScript です。いくつか使われない変数が宣言されているかもしれませんが・・・。

```js
/*==========================================================
 Declaration
==========================================================*/
// constants
var ForReading = 1;   // 読み込み
var ForWriting = 2;   // 書きこみ（上書きモード）
var ForAppending = 8; // 書きこみ（追記モード）
 
var fileName = "File Name";

/*==========================================================
 実行部
==========================================================*/
splitFile();
 
ForReading = null;
ForWriting = null;
ForAppending = null; 
 
/*==========================================================
 Function Declaration
==========================================================*/
function splitFile() {
 
  var strFolderPath;
  var objFileSys;
  var objInFile;
  var objOutFile;
  var strScriptPath;
  var strRecord;
 
  var index = 0;
 
  objFileSys = new ActiveXObject("Scripting.FileSystemObject");
  strScriptPath = String(WScript.ScriptFullName).replace(WScript.ScriptName,"");
 
 
  objInFile = objFileSys.OpenTextFile(strScriptPath + fileName, ForReading);
  try {
    var i, writingSize;
    do {
      index++;
      objOutFile = objFileSys.CreateTextFile(strScriptPath + "out" + index.toString() + ".txt", true);
 
      for (i = 0; i < 1000000; i++) {
        strRecord = objInFile.ReadLine();
        objOutFile.WriteLine(strRecord);
        if (objInFile.AtEndOfStream == true) break;
      }
      objOutFile.Close();
    } while (objInFile.AtEndOfStream==false);
 
  } catch(e) {
    WScript.echo("Error!");
    WScript.echo(strScriptPath + "out" + index.toString() + ".txt");
  } finally {
    objInFile.Close();
    objOutFile.Close();
  }
 
  // discard objects
  objFileSys = null;
  objInFile = null;
  objOutFile = null;
  strScriptPath = null;
  strRecord = null;
  strFolderPath = null;
 
  return 0;
}
```

コードは <a href="https://gist.github.com/KenjiOhtsuka/7147806" target="_blank" rel="nofollow noopener noreferrer">Gist</a> にもあります。
