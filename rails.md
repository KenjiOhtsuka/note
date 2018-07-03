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
