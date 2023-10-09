---
layout: post
date: 2023-10-09
title: "Playwright and F#: Headed mode"
categories: [Programming Language]
tags: [F#, Playwright]
---

Playwright を Headedモードで使うには、 私の知る限り2つの方法がある。

## 環境変数 PWDEBUG を使う

環境変数 `PWDEBUG` を設定する。

コマンドラインで実行する場合は、以下のようにする。

```bash
PWDEBUG=1 dotnet run
```

F#を前提としているので、 `dotnet` コマンドを使っているが、 `node` コマンドでも同じ。

次のように環境変数をプログラムから設定しても良い。

```fsharp
Environment.SetEnvironmentVariable("PWDEBUG", "1")
Assert.Equal("1", Environment.GetEnvironmentVariable("PWDEBUG"))
```

ただし `PWDEBUG` を使用すると `GoTo` などの Playwright のAPIを使用するときに、
デバッグのために停止する。

## `BrowserType.LaunchAsync` に `Headless` オプションを渡す

`BrowserType.LaunchAsync` に `BrowserTypeLaunchOptions` を渡す。
`BrowserTypeLaunchOptions` のインスタンスでは、 `Headless` プロパティを `false` に設定する。

```fsharp
let playwright = Playwright.CreateAsync().GetAwaiter().GetResult()
let browser = playwright.Chromium.LaunchAsync(BrowserTypeLaunchOptions(Headless=false)).GetAwaiter().GetResult()
let page = browser.NewPageAsync().GetAwaiter().GetResult()
let response = page.GotoAsync(url).GetAwaiter().GetResult()
```

## その他の方法

https://stackoverflow.com/questions/74372594/running-playwright-in-headed-mode-c-sharp
によると、 環境変数 `HEADED` を用いる方法もあるということが書いてあったが、
私の環境ではうまくいかなかった。

<div lang="en">
Playwright can be used in headed mode in two ways that I know.

## Use environment variable PWDEBUG

Set environment variable `PWDEBUG`.

If you use command line, you can set it as follows.

```bash
PWDEBUG=1 dotnet run
```

I use `dotnet` command because I assume F#, but `node` command is also available.

You can also set environment variable from your program as follows.

```fsharp
Environment.SetEnvironmentVariable("PWDEBUG", "1")
Assert.Equal("1", Environment.GetEnvironmentVariable("PWDEBUG"))
```

However, if you use `PWDEBUG`, you will stop for debugging when you use Playwright API such as `GoTo`.

## Pass `Headless` option to `BrowserType.LaunchAsync`

Pass `BrowserTypeLaunchOptions` to `BrowserType.LaunchAsync`.
In the instance of `BrowserTypeLaunchOptions`, set `Headless` property to `false`.

```fsharp
let playwright = Playwright.CreateAsync().GetAwaiter().GetResult()
let browser = playwright.Chromium.LaunchAsync(BrowserTypeLaunchOptions(Headless=false)).GetAwaiter().GetResult()
let page = browser.NewPageAsync().GetAwaiter().GetResult()
let response = page.GotoAsync(url).GetAwaiter().GetResult()
```

## Other methods

According to https://stackoverflow.com/questions/74372594/running-playwright-in-headed-mode-c-sharp ,
there is another method using environment variable `HEADED`, but it didn't work on my environment.
</div>
