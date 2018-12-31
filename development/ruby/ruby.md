---
layout: page
---

# Ruby

## `@@` が先頭につく変数 / variable the name begin with `@@`

variable the name begin with `@@` is (class) static variable.

## Convert sha512 hash to 64 basis number

```ruby
# Ruby 2.5.1
# h: sha 512 hex string
a = h.upcase.split('').map{|i| '%04d' % (case i when 'A'..'F' then i.ord - 'A'.ord + 10; else i.to_i end).to_s(2) }.join
a += '00'
CHAR_LIST =
  (0..25).map { |c| (c + 'A'.ord).chr }.join +
  (0..25).map { |c| (c + 'a'.ord).chr }.join +
  (0..9).map { |c| c.to_s }.join + '+/'
s = ''
for i in 0..(a.length / 6)
  c = 0
  for j in 0..5
    c *= 2
    c += a[i * 6 + j].to_i
  end
  s << CHAR_LIST[c]
end
puts s
```

# Sleep

Pass seconds, not millisecond.

```ruby
sleep 10
```

## Multh Thread

```ruby
# version 1.8.7

a = []
a <<Thread.new do
  5.times do |i|
    sleep(rand * 2)
    puts "#{i} : I am A."
  end
end

a << Thread.new do
  5.times do |i|
    sleep(rand * 2)
    puts "#{i} : I am B."
  end
end

a.each { |b|
  b.join
}
```
