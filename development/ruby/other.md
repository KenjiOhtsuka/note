---
layout: page
title: Ruby this and that
---


```ruby
class Sample
  def self.get(path, params = {}, header = {})
    uri = URI(path + build_query_string(params))
    request = Net::HTTP::Get.new(uri)
    header.each do |key, value|
      request[key] = value
    end
    response = Net::HTTP.start(uri.host, uri.port, :use_ssl => uri.scheme == 'https') do |http|
      http.request(request)
    end

    response.body
  end

  private
  # @param [Hash] params
  def self.build_query_string(params)
    if params.length === 0
      return ''
    end

    query_string_parts = []
    params.each do |key, value|
      if value.is_a? Array
        value.each do |single_value|
          query_string_parts << "#{key}[]=#{single_value}"
        end
        next
      end
      query_string_parts.push("#{key}=#{value}")
    end
    return '?' + query_string_parts.join('&')
  end
end
```
