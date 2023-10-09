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
( https://github.com/microsoft/playwright/issues/19425 )

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
( https://github.com/microsoft/playwright/issues/19425 )

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

<div lang="es">
Playwright se puede usar en modo encabezado de dos maneras que conozco.

## Use la variable de entorno PWDEBUG

Establezca la variable de entorno `PWDEBUG`.

Si usa la línea de comandos, puede configurarlo de la siguiente manera.

```bash
PWDEBUG=1 dotnet run
```

Uso el comando `dotnet` porque asumo F #, pero también está disponible el comando `node`.

También puede configurar la variable de entorno desde su programa de la siguiente manera.

```fsharp
Environment.SetEnvironmentVariable("PWDEBUG", "1")
Assert.Equal("1", Environment.GetEnvironmentVariable("PWDEBUG"))
```

Sin embargo, si usa `PWDEBUG`, se detendrá para depurar cuando use Playwright API como `GoTo`.
( https://github.com/microsoft/playwright/issues/19425 )

## Pase la opción `Headless` a `BrowserType.LaunchAsync`

Pase `BrowserTypeLaunchOptions` a `BrowserType.LaunchAsync`.

En la instancia de `BrowserTypeLaunchOptions`, establezca la propiedad `Headless` en `false`.

```fsharp
let playwright = Playwright.CreateAsync().GetAwaiter().GetResult()
let browser = playwright.Chromium.LaunchAsync(BrowserTypeLaunchOptions(Headless=false)).GetAwaiter().GetResult()
let page = browser.NewPageAsync().GetAwaiter().GetResult()
let response = page.GotoAsync(url).GetAwaiter().GetResult()
```

## Otros métodos

Según https://stackoverflow.com/questions/74372594/running-playwright-in-headed-mode-c-sharp ,
hay otro método que usa la variable de entorno `HEADED`, pero no funcionó en mi entorno.
</div>

<div lang="ru">
Playwright можно использовать в режиме заголовка двумя способами, которые я знаю.

## Используйте переменную среды PWDEBUG

Установите переменную среды `PWDEBUG`.

Если вы используете командную строку, вы можете установить ее следующим образом.

```bash
PWDEBUG=1 dotnet run
```

Я использую команду `dotnet`, потому что предполагаю F #, но также доступна команда `node`.

Вы также можете установить переменную среды из своей программы следующим образом.

```fsharp
Environment.SetEnvironmentVariable("PWDEBUG", "1")
Assert.Equal("1", Environment.GetEnvironmentVariable("PWDEBUG"))
```

`PWDEBUG`, однако, если вы используете, вы остановитесь для отладки, когда вы используете Playwright API, такие как `GoTo`.
( https://github.com/microsoft/playwright/issues/19425 )

## Передайте параметр `Headless` в `BrowserType.LaunchAsync`

Передайте `BrowserTypeLaunchOptions` в `BrowserType.LaunchAsync`.

В экземпляре `BrowserTypeLaunchOptions` установите свойство `Headless` в `false`.

```fsharp
let playwright = Playwright.CreateAsync().GetAwaiter().GetResult()
let browser = playwright.Chromium.LaunchAsync(BrowserTypeLaunchOptions(Headless=false)).GetAwaiter().GetResult()
let page = browser.NewPageAsync().GetAwaiter().GetResult()
let response = page.GotoAsync(url).GetAwaiter().GetResult()
```

## Другие методы

Согласно https://stackoverflow.com/questions/74372594/running-playwright-in-headed-mode-c-sharp ,
есть еще один метод, использующий переменную среды `HEADED`, но он не работал в моей среде.
</div>
