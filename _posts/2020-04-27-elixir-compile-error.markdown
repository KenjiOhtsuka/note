---
date: 2020-04-27 10:52:48 +0900
title: elixir ranch エラー
categories: Elixir Phoenix
layout: post
---

Phoenix を使おうとしたらエラーに遭遇した。


```
 % mix deps.compile ranch
sh: line 0: exec: sh: not found
** (Mix) Could not compile dependency :ranch, "/Users/name/.mix/rebar3 bare compile --paths="/Users/name/project/elixtest/hello/_build/dev/lib/*/ebin"" command failed. You can recompile this dependency with "mix deps.compile ranch", update it with "mix deps.update ranch" or clean it with "mix deps.clean ranch"
```

```
 % /Users/name/.mix/rebar3 bare compile --paths="/Users/name/project/elixtest/hello/_build/dev/lib/*/ebin"
===> Uncaught error in rebar_core. Run with DEBUG=1 to see stacktrace or consult rebar3.crashdump
===> When submitting a bug report, please include the output of `rebar3 report "your command"`
```

```
 % DEBUG=1 /Users/name/.mix/rebar3 bare compile --paths="/Users/name/project/elixtest/hello/_build/dev/lib/*/ebin"
===> Expanded command sequence to be run: []
===> Provider: {default,do}
===> Expanded command sequence to be run: [{default,app_discovery},
                                                  {bare,compile}]
===> Provider: {default,app_discovery}
===> Provider: {bare,compile}
===> Uncaught error in rebar_core. Run with DEBUG=1 to see stacktrace or consult rebar3.crashdump
===> Uncaught error: {badmatch,[]}
===> Stack trace to the error location:
[{rebar_prv_bare_compile,do,1,
                         [{file,"/tmp/cirrus-ci-build/src/rebar_prv_bare_compile.erl"},
                          {line,60}]},
 {rebar_core,do,2,
             [{file,"/tmp/cirrus-ci-build/src/rebar_core.erl"},{line,154}]},
 {rebar_prv_do,do_task,5,
               [{file,"/tmp/cirrus-ci-build/src/rebar_prv_do.erl"},{line,87}]},
 {rebar_core,do,2,
             [{file,"/tmp/cirrus-ci-build/src/rebar_core.erl"},{line,154}]},
 {rebar3,run_aux,2,[{file,"/tmp/cirrus-ci-build/src/rebar3.erl"},{line,182}]},
 {rebar3,main,1,[{file,"/tmp/cirrus-ci-build/src/rebar3.erl"},{line,66}]},
 {escript,run,2,[{file,"escript.erl"},{line,758}]},
 {escript,start,1,[{file,"escript.erl"},{line,277}]}]
===> When submitting a bug report, please include the output of `rebar3 report "your command"`
```

## やってみたこと

* `brew update`, `brew upgrade`
  * 効果なし
* `open /Library/Developer/CommandLineTools/Packages/macOS_SDK_headers_for_macOS_10.14.pkg`
  * インストールに失敗。
  
## Solution

* 先に DB Config の設定を行う。
