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
<p>Playwright can be used in headed mode in two ways that I know.</p>
<h2> Use environment variable PWDEBUG</h2>
<p>Set environment variable <code>PWDEBUG</code>.</p>
<p>If you use command line, you can set it as follows.</p>

<div class="language-bash highlighter-rouge">
<div class="highlight">
<pre class="highlight"><code>PWDEBUG=1 dotnet run</code></pre></div></div>

<p>I use <code>dotnet</code> command because I assume F#, but <code>node</code> command is also available.</p>

<p>You can also set environment variable from your program as follows.</p>

<div class="language-fsharp highlighter-rouge">
<div class="highlight">
<pre class="highlight"><code>Environment.SetEnvironmentVariable("PWDEBUG", "1")
Assert.Equal("1", Environment.GetEnvironmentVariable("PWDEBUG"))</code></pre></div></div>

<p>However, if you use <code>PWDEBUG</code>, you will stop for debugging when you use Playwright API such as `GoTo`.
( <a href="https://github.com/microsoft/playwright/issues/19425" rel="nofollow noopener noreferrer">https://github.com/microsoft/playwright/issues/19425</a> )</p>

<h2>Pass <code>Headless</code> option to <code>BrowserType.LaunchAsync</code></h2>

<p>Pass <code>BrowserTypeLaunchOptions</code> to <code>BrowserType.LaunchAsync</code>.
In the instance of <code>BrowserTypeLaunchOptions</code>, set <code>Headless</code> property to <code>false</code>.</p>

<div class="language-fsharp highlighter-rouge">
<div class="highlight">
<pre class="highlight"><code>let playwright = Playwright.CreateAsync().GetAwaiter().GetResult()
let browser = playwright.Chromium.LaunchAsync(BrowserTypeLaunchOptions(Headless=false)).GetAwaiter().GetResult()
let page = browser.NewPageAsync().GetAwaiter().GetResult()
let response = page.GotoAsync(url).GetAwaiter().GetResult()</code></pre>
</div>
</div>

<h2>Other methods</h2>

<p>According to https://stackoverflow.com/questions/74372594/running-playwright-in-headed-mode-c-sharp ,
there is another method using environment variable <code>HEADED</code>, but it didn't work on my environment.</p>
</div>

<div lang="es">
<p>Playwright se puede usar en modo encabezado de dos maneras que conozco.</p>

<h2>Use la variable de entorno PWDEBUG</h2>

<p>Establezca la variable de entorno <code>PWDEBUG</code>.</p>

<p>Si usa la línea de comandos, puede configurarlo de la siguiente manera.</p>

<div class="language-bash highlighter-rouge">
<div class="highlight">
<pre class="highlight"><code>PWDEBUG=1 dotnet run</code></pre></div></div>

<p>Uso el comando <code>dotnet</code> porque asumo F#, pero también está disponible el comando <code>node</code>.</p>

<p>También puede configurar la variable de entorno desde su programa de la siguiente manera.</p>

<div class="language-fsharp highlighter-rouge">
<div class="highlight">
<pre class="highlight"><code>Environment.SetEnvironmentVariable("PWDEBUG", "1")
Assert.Equal("1", Environment.GetEnvironmentVariable("PWDEBUG"))</code></pre>
</div></div>

<p>Sin embargo, si usa <code>PWDEBUG</code>, se detendrá para depurar cuando use Playwright API como <code>GoTo</code>.
( https://github.com/microsoft/playwright/issues/19425 )</p>

<h2>Pase la opción <code>Headless</code> a <code>BrowserType.LaunchAsync</code></h2>

<p>Pase <code>Headless</code> a <code>BrowserType.LaunchAsync</code>.</p>

<p>En la instancia de <code>BrowserTypeLaunchOptions</code>, establezca la propiedad <code>Headless</code> en <code>false</code>.</p>

<div class="language-fsharp highlighter-rouge">
<div class="highlight">
<pre class="highlight"><code>let playwright = Playwright.CreateAsync().GetAwaiter().GetResult()
let browser = playwright.Chromium.LaunchAsync(BrowserTypeLaunchOptions(Headless=false)).GetAwaiter().GetResult()
let page = browser.NewPageAsync().GetAwaiter().GetResult()
let response = page.GotoAsync(url).GetAwaiter().GetResult()</code></pre>
</div>
</div>

<h2>Otros métodos</h2>

<p>Según https://stackoverflow.com/questions/74372594/running-playwright-in-headed-mode-c-sharp ,
hay otro método que usa la variable de entorno <code>HEADED</code>, pero no funcionó en mi entorno.</p>
</div>

<div lang="ru">

<p>Playwright можно использовать в режиме заголовка двумя способами, которые я знаю.</p>

<h2>Используйте переменную среды PWDEBUG</h2>

<p>Установите переменную среды <code>PWDEBUG</code>.</p>

<p>Если вы используете командную строку, вы можете установить ее следующим образом.</p>

<div class="language-bash highlighter-rouge">
<div class="highlight">
<pre class="highlight"><code>PWDEBUG=1 dotnet run</code></pre></div></div>

<p>Я использую команду <code>dotnet</code>, потому что предполагаю F#, но также доступна команда <code>node</code>.</p>

<p>Вы также можете установить переменную среды из своей программы следующим образом.</p>

<div class="language-fsharp highlighter-rouge">
<div class="highlight">
<pre class="highlight"><code>Environment.SetEnvironmentVariable("PWDEBUG", "1")
Assert.Equal("1", Environment.GetEnvironmentVariable("PWDEBUG"))</code></pre>
</div>
</div>

<p><code>PWDEBUG</code>, однако, если вы используете, вы остановитесь для отладки, когда вы используете Playwright API, такие как <code>GoTo</code>.
( https://github.com/microsoft/playwright/issues/19425 )</p>

<h2>Передайте параметр <code>Headless</code> в <code>BrowserType.LaunchAsync</code></h2>

<p>Передайте <code>BrowserTypeLaunchOptions</code> в <code>BrowserType.LaunchAsync</code>.</p>

<p>В экземпляре <code>BrowserTypeLaunchOptions</code> установите свойство <code>Headless</code> в <code>false</code>.</p>

<div class="language-fsharp highlighter-rouge">
<div class="highlight">
<pre class="highlight"><code>let playwright = Playwright.CreateAsync().GetAwaiter().GetResult()
let browser = playwright.Chromium.LaunchAsync(BrowserTypeLaunchOptions(Headless=false)).GetAwaiter().GetResult()
let page = browser.NewPageAsync().GetAwaiter().GetResult()
let response = page.GotoAsync(url).GetAwaiter().GetResult()</code></pre></div></div>

<h2>Другие методы</h2>

<p>Согласно https://stackoverflow.com/questions/74372594/running-playwright-in-headed-mode-c-sharp ,
есть еще один метод, использующий переменную среды <code>HEADED</code>, но он не работал в моей среде.</p>

</div>
