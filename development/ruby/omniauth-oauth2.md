---
title: omniauth-oauth2
---

## To configure custom authorization url

if there is no additional configuration, the gem composes the authorization endpoint as 
`site_url + "/oauth/authorize".
To customize authorization endpoint, please add optioin with the key "authorize_url".

```ruby
      option :client_options, {
        site:          "...",
        authorize_url: "..."
      }
```

