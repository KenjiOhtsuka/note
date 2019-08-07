---
layout: post
title: Rails 使った開発日誌 - devise によるログインで独自の認証を実装する
categories: Ruby Rails device session
---

# Rails 使った開発日誌 - devise によるログインで独自の認証を実装する

Rails 5.2 と devise 4 でユーザ認証を行う際の 独自の認証を実装する。
他のデータベースやAPIでログインできればそれでログインできることにするものである。

`SessionsController` の `create` メソッド を変更する。 `SessionsController` は `Devise::SessionsController` を継承していて、 `create` メソッド の中身は `super` のみとなっている。

```ruby
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

[StackOverFlow](https://stackoverflow.com/questions/4559434/how-to-authenticate-using-warden-authenticate) によると、 `sign_in` はクッキーを設定しているらしい。 `sign_in` は [sign_in_out.rb](https://github.com/plataformatec/devise/blob/v4.6.2/lib/devise/controllers/sign_in_out.rb) で定義されている。
`set_flash_message!` はきっとログイン成功のメッセージを設定しているに違いないので、 `warden.authenticate!` がどうなっているかわからないと前に進めない。

もしくは `warden.authenticate!` の前に別のアカウントでの認証を挟んでしまうか。

昔似たようなことを Rails で実現していたのだが、試作品として捨ててしまっていた。

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

## Config で独自の値を設定する方法

Rails 4, 5 から、 `config.x` という書き方で独自の設定値を `config` に追加できるようになっている。
(Rails 3 では `config.abc = 123` と書けば 各クラス内で `Rails.application.config.abc` で値が取れていた。)

~~`config.x` では、 ハッシュで設定したものでも、 `.` で繋げて値を取得できる。~~

```ruby
config.x.a = {
  b: 1
}
```
