---
title: RSpec で E2E Test
date: 2013-09-26 00:00:00 +0900
tags: [RSpec, E2E Test]
categories: [rails, ruby]
layout: post
---

<blockquote><p>Devise's sign_in test helper is meant to be used only in Controller tests, not in integration ones. For integration specs, we usually do the normal process: sign in the user using capybara by visiting the sign in url and entering valid credentials.</p>
<p>https://groups.google.com/forum/#!topic/plataformatec-devise/0ww5KitMD7g</p></blockquote>
<p>ログイン処理は visit とかで書くらしい。Controller のテストで使う controller macro は controller のときしか使えないみたい。</p>
