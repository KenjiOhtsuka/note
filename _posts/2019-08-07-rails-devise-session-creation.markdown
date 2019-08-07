---
layout: post
title: Rails 使った開発日誌 - devise によるログインで独自の認証を実装する
categories: Ruby Rails device session
---

# Rails 使った開発日誌 - devise によるログインで独自の認証を実装する

Rails 5.2 と devise 4 でユーザ認証を行う際の 独自の認証を実装する。
他のデータベースやAPIでログインできればそれでログインできることにするものである。

`SessionsController` の `create` メソッド を変更する。 `SessionsController` は `Devise::SessionsController` を継承していて、 `create` メソッド の中身は `super` のみとなっている。

```
def create
  super
end
```

`super` は何をやっているのか、 返り値はなんなのか。

[Devise::SessionsController](https://github.com/plataformatec/devise/blob/master/app/controllers/devise/sessions_controller.rb)

```ruby
  # POST /resource/sign_in
  def create
    self.resource = warden.authenticate!(auth_options)
    set_flash_message!(:notice, :signed_in)
    sign_in(resource_name, resource)
    yield resource if block_given?
    respond_with resource, location: after_sign_in_path_for(resource)
  end
```

これをコピーすれば一応同じことはできる。 まずは `warden.authenticate!(auth_options)` で認証をやっているものと思われる。
ここで `resource` に値を代入しているわけだが、 そもそも `warden.authenticate!` はなにをやっているのか。

[StackOverFlow](https://stackoverflow.com/questions/4559434/how-to-authenticate-using-warden-authenticate) によると、 `sign_in` はクッキーを設定しているらしい。
`set_flash_message!` はきっとログイン成功のメッセージを設定しているに違いないので、 `warden.authenticate!` がどうなっているかわからないと前に進めない。

もしくは `warden.authenticate!` の前に別のアカウントでの認証を挟んでしまうか。

## Mac の Finder で隠しファイルを表示する方法

ターミナルで

```sh
defaults write com.apple.finder AppleShowAllFiles TRUE
```

を実行する。
この後、 Finder のアイコンを長押しして、 Relaunch を選ぶ。 すると表示されるようになる。
(`killall Finder` をやっても表示されるようになるらしい。)

しかしこれをやっても、 IntelliJ IDEA のインタープリタパスで `.rvm` を選ぶことはできなかった。
シンボリックリンクでも作ったほうが早いのか。
