---
title: Excel VBA からメールを送るコード
date: 2013-09-27 00:00:00 +0900
tags: [Excel, VBA, メール]
categories: [Excel]
layout: post
---

VBAでメールを送信してみました。

```vba
Private Declare Function SendMail Lib "Bsmtp.dll" ( _
    szServer As String, _
    szTo As String, _
    szFrom As String, _
    szSubject As String, _
    szBody As String, _
    szFile As String) As String

Private Declare Function FlushMail Lib "bsmtp" ( _
szServer As String, _
szDir As String, _
szLogfile As String) As Long

Private Sub sendMailButton_Click()
Dim ret As String
Dim szServer$, szTo$, szFrom$
Dim szSubject$, szBody$, szFile$

    szServer = "test.sakura.ne.jp" & vbTab & "587"

    szTo = "test@test.com" & vbTab  & _
        "bcc" & vbTab & "test@test.com"
    szFrom = "sender@test.com"
    szSubject = "テストメール"
    szBody = "こんにちは。" & vbCrLf & "さようなら"

    szFile = "" 
    
    ChDir ThisWorkbook.path
    'メール送信
    ret = SendMail(szServer, szTo, szFrom, szSubject, szBody, szFile)
    
    ' 送信チェック
    If ret <> "" Then
        MsgBox "送信できませんでした。" & vbCrLf & msg, vbOKOnly + vbCritical, "エラー"
    Else
        MsgBox "送信に成功しました。", vbOKOnly + vbInformation, "完了"
    End If
End Sub
```
`Bsmtp.dll` というメールを送信するためのdllを利用します。作ってくださった方に感謝しましょう。

DLL を Excel と同一のフォルダに入れます。そして、DLLの関数を利用する際に `ChDir ThisWorkbook.path` を書いておきます。これをやると、カレントディレクトリがExcelと同じフォルダになり、そこに配置されているDLLを利用できます。

VBA自身がメールサーバへのメールリレーを要求するのかなんなのか、メールサーバへのログインID, PASSWORD は一切聞かれませんでした。

<a href="https://github.com/KenjiOhtsuka/MailSender" target="_blank">Github に置いてあります。</a>
