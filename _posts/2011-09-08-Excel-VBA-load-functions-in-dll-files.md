---
title: Excel VBA で DLL内 の関数を呼び出す
date: 2011-09-08 00:00:00 +0900
tags: [Excel, VBA, DLL]
categories: [Excel]
---

次の方法で呼び出せるらしい。

```vba
Declare Function 関数名 Lib "DLL名" [Alias "API名"] (引数…) As 戻り値の型
```

`Alias` が曲者で、`Declare Function` で指定した関数名が、VBから呼び出す関数名。別名を使うときは、`Alias` にホンモノの名前を書く。

次の文は、<strong>Excel VBA</strong> の<strong>スペースインベーダ</strong>で使われているコード。

```vba
Private Declare Function IsBadCodePtr Lib "Kernel32.dll" (ByVal FunctionPointer As Long) As Long
```

`Kernel32.dll` 内 の `IsBadCodePtr` という関数を呼び出している。msdnには、

```vba
BOOL WINAPI IsBadCodePtr(
  __in  FARPROC lpfn
);
```

とあり、`BOOL`型。なぜ Long?????? 引数は、"A pointer to a memory address" とのこと。

<blockquote>If the calling process has read access to the specified memory, the return value is zero.

If the calling process does not have read access to the specified memory, the return value is nonzero. To get extended error information, call GetLastError.

If the application is compiled as a debugging version, and the process does not have read access to the specified memory location, the function causes an assertion and breaks into the debugger. Leaving the debugger, the function continues as usual, and returns a nonzero value. This behavior is by design, as a debugging aid.</blockquote>

アクセス可能なら 0 を返し、アクセス不可能なら GetLastError を実行する。`GetLastError` で エラーコード を取得できるらしい。そんで、`Long` のナゾだけど、`IsBadCodePtr` の入っている `winbase.h` を見ると、確かに `BOOL` と書いてある。そこで、その`BOOL`の書かれているドキュメント(`WinDef.h`)を見ると、<strong>typedef int BOOL;</strong> と書いてある。つまり、`BOOL` とありながらも 実態は `int` ということだ。`typedef` は、型にエイリアスをつけるための宣言。

`typedef` は、`typedef int size;` のように使う。`int` ならはっきり `int` と書いたほうがいいような気もするけど・・・使いやすいのか？ `typedef int size` を `typedef double size` に変更すれば、`size` と書いてあるところ全部が `double` になるので、そういう時には便利なのかもしれない。しかしそんな型を変えることってあるのだろうか？ わからん。

<site>http://msdn.microsoft.com/en-us/library/aa366712%28v=vs.85%29.aspx</site>

```vba
Private Declare Function DispCallFunc Lib "oleaut32.dll" (
    ByVal VtblObject As Long, ByVal FunctionOffset As Long,
    ByVal CallConv As Long,   ByVal ReturnType As VBA.VbVarType,
    ByVal ArgsCount As Long,  ByRef ARefArgsType As Integer,
    ByRef ARefArgs As Long,   ByRef RefResult As Variant) As Long
```

つぎは `DispCallFunc`。残念なことに、今このタイミングで、msdn のサーバがダウンしている。誰かのブログを検索してもいいのだけれど、やはり一次ソースは見ておくべきだろう。つづく・・・

・・・`DispCallFunc` というのは、COMオブジェクトへのポインタを引数にとって、そこに含まれているメソッドを呼び出す関数(日経ソフトウェア200109)。恐ろしく `Declare` が長いような・・・まぁ、こんなもんか。COMオブジェクトについては、日経ソフトウェア199807に少し記述がある。COMは、オブジェクトが互いに通信を行うための仕様で、COMオブジェクトはその機能をメソッドとして外部に提供する。１番目の引数について、An instance of the interface described by this type description. とmsdnに書かれているが、これは要するに、COMを指定するためのポインタということ。


2番目の引数は、"For FUNC_VIRTUAL functions, specifies the offset in the VTBL." とある。`ULONG` と書いてあるので、`unsigned long` だろう。vtable内での関数の位置を表すもの。COMオブジェクトの中では、関数へのポインタの位置が厳格に決められている(日経ソフトウェア199807)。

3番目の引数は呼び出すものによって変える。`CallConv`という列挙体も存在する(VBAで使えるかどうかはわからないが)。calling convention については、"プログラミングにおける呼出規約 (よびだしきやく) ないし呼出慣例 (よびだしかんれい) はサブルーチンを呼び出す際の標準的な手法を指す。サブルーチンへデータを渡し、戻るべきアドレス（リターンアドレス）を記録し、サブルーチンからデータを受け取るための規則である。一つのプログラムでは、（複数の言語処理系を用いて記述する場合も）同一の呼出規約を守る必要がある。さまざまな呼出規約があり、引数のコールスタック（以下単にスタックと呼ぶ）への格納法、サブルーチンにデータを渡す方法、サブルーチンからの復帰法、名前修飾が異なる。" と Wikipedia にある。

４番目は戻り値の型指定。５番目が引数の個数、６番目が引数一覧、７番が引数の値へのポインタ一覧、８番が戻り値を受け取る変数。


```vba
Private Declare Function GetDIBits Lib "gdi32" (ByVal hdc As Long, ByVal hBitmap As Long, ByVal nStartScan As Long, ByVal nNumScans As Long, lpBits As Any, lpBI As LPEC_BitMapInfo, ByVal wUsage As Long) As Long
```

指定されたビットマップのビットを取得し、指定された形式でバッファへコピーする。


```vba
Private Declare Function DeleteDC Lib "gdi32" (ByVal hdc As Long) As Long
```

デバイスコンテキストを削除する。引数はポインタ。


```vba
Private Declare Sub CopyMemory Lib "kernel32" Alias "RtlMoveMemory" (ByVal Destination As Long, ByVal Source As Long, ByVal Length As Long)
```

メモリの内容をコピーする関数。source がコピー元、destination がコピー先。配列や構造体をすべて代入するより、このほうが速く処理できるらしい。メモリが連続して使われる保障があればそれでいいんだろうけど・・・Visual C++ での参照型ポインタが演算できないのはメモリの非連続性だというから、VBでも大丈夫なのかと思うのだ。VBAですけどね。ナゾです。

