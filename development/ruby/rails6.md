---
title: Rails 6
---

# Rails 6

## Install font awesome

```
npm add @fortawesome/fontawesome-free
```

add `application/packs/application.js`

```
import '@fortawesome/fontawesome-free/js/all'
```


## Launch local server with SSL for development

Use mkcert. mkcert can be installed with brew.

```
$ mkcert -install
$ mkcert localhost
```

and put them in puma config.

```
cert = "/path/to/localhost.pem"
key = "/path/to/localhost-key.pem"
ssl_bind "0.0.0.0", 49160, cert: cert, key: key
```

49160 is the port and you can change it freely.

Then, `rails s` launches the server of HTTPS on 49160 port.
