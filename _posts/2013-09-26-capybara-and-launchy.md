---
title: capybara and launchy
date: 2013-09-26 00:00:00 +0900
tags: [capybara, launchy]
categories: [rails]
---

<p>rails でエンドツーエンドのテストを行うときには capybara と launchy を使うのがよい。capybara に加えて launchy を使うことで初めて <strong>save_and_open_page</strong> というメソッドが使えるようになる。</p>
<p><strong>save_and_open_page</strong> は、プロジェクトディレクトリの下のtmp/capybaraディレクトリに、静的ファイルとしてページを保存し、直後にブラウザでファイルを開く。</p>
<p>やってみたところ、完全に見ているページと同じかといわれると・・・少し違うところもある。表示されていないものはないので、いまのところは問題ない。</p>
