---
layout: page
title: Linux
---

# Linux

## Add user

```sh
useradd name
```

## Delete User

* remove user

    ```sh
    userdel name
    ```

* remove user, remove home directory

    ```sh
    userdel -r name
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

## /bin and /sbin

1971-1973

UNIXが開発されていたコンピュータには、 当時大容量だった 2.5MB の ディスクが2つついていた。
1つはシステム用、もう1つはユーザ用。 (`/bin`, `/usr`)

開発が進むに連れて 2.5MB のシステム用ディスクの容量が枯渇し始めたため
`/usr` に `/bin` などのディレクトリ構造をまねて、 一部のツールを移設した。

ブート時にはまずディスク1が使われるので、ブートに必要なツールはすべてディスク1に置かれた。

現在でも `/bin` や `/sbin` にはブートや管理に必須なツールがあり、 他のツールが `/usr/bin` にある。

### Reference

Retrieved from https://twitter.com/EzoeRyou/status/1059730949334695937

## Package manager

### apt

#### options

* -d : ダウンロードのみ行う. アーカイブのインストール, 展開は行わない
* -s : 実行シミュレーションのみ行う
* -y : 全ての問い合わせに Yes で答える
* -f : 整合性チェックで失敗しても処理を続行する。
* -b : ソースパッケージを取得して、ビルドを行う
* -qq : エラーのみ表示する


### yum


* remove repository

    ```
    rm -f /etc/yum.repos.d/c6-media.repo
    ```
