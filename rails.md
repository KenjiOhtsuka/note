## Error : Cannot render console from Allowed networks

add the following line to `config/environments/development.rb`.


```ruby:config/environments/development.rb
config.web_console.whitelisted_ips = '0.0.0.0/0'
```
