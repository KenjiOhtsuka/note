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