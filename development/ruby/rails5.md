---
layout: page
---

# Rails 5

## Webpack つきでプロジェクト作成

`rails new project --webpack`

## Error : Cannot render console from Allowed networks (Rails 5)

add the following line to `config/environments/development.rb`.


```ruby:config/environments/development.rb
config.web_console.whitelisted_ips = '0.0.0.0/0'
```

## Configure Timezone

`config/application.rb`

```ruby
config.time_zone = 'Tokyo'
```
## Share session between Rails 3 and 5 (Draft)

### set same session store settings

```
Rails.application.config.session_store :cookie_store, key: 'example.net_session'
Rails.application.config.session_store :active_record_store, key: 'example.net_session'
```

### Set Rails 5 cookie_serializer `:marshal`

```
Rails.application.config.action_dispatch.cookies_serializer = :marshal # default: :json
```

### Set Rails 5 secret_token Rails 3 `config.secret_token`

```
development:
  # secret_key_base: abc123...
  secret_token: 123abc...
```

### Use same `secret_key`

```
Devise.setup do |config| 
  config.secret_key = "xyz123"
~~~
end
```
