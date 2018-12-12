---
layout: page
---

# Linux

## Add user

```sh
useradd name
```

## Add group

```sh
groupadd name
```

## Add user to group

```sh
usermod -aG grp_name user_name
```

## Enable sudo for group

```sh
visudo
```

```
%grp_name   ALL=(ALL)   ALL
%grp_name   ALL=(ALL)   NOPASSWD:ALL
```

## Add ssh key

```sh
sudo su - user
mkdir ~/.ssh
chmod 700 ~/.ssh
touch ~/.ssh/authorized_keys
chmod 600 ~/.ssh/authorized_keys
```

and add ssh public key to authorized keys

## apt

### options

* -d : ダウンロードのみ行う. アーカイブのインストール, 展開は行わない
* -s : 実行シミュレーションのみ行う
* -y : 全ての問い合わせに Yes で答える
* -f : 整合性チェックで失敗しても処理を続行する。
* -b : ソースパッケージを取得して、ビルドを行う
* -qq : エラーのみ表示する
