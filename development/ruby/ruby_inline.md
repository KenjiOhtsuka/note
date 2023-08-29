---
layout: page
title: RubyInline
---

## Sample 1

It uses Ruby array with `RARRAY`.

```ruby
require 'rubygems'
require 'inline'

class Test
  inline do |builder|
    builder.prefix <<-EOS
      #include <stdio.h>
    EOS
    builder.c <<-EOS
      int test(VALUE a) {
        printf("Hello%d\\n", 1);
        if (a != Qnil) printf("not nil!\\n");
        return 1;
      }
    EOS
    builder.c <<-EOS
      int in_c(VALUE s, long v) {
        int i;
        int l = RARRAY(s)->len;
        VALUE *sa = RARRAY(s)->ptr;
        for (i = 0; i < l; i++) {
          if (sa[i] == v) return 1;
        }
        return 0;
      }
    EOS
  end
end

puts Test.new.test(nil)

require 'time'
s = Time.now
for i in 1..100000
  [1, 2, 3, 4, 5, 6, 7, 8, 9, 10].include?(9)
end
e = Time.now
puts (e - s)

t = Test.new
s = Time.now
for i in 1..100000
  t.in_c([1, 2, 3, 4, 5, 6, 7, 8, 9, 10], 9)
end
e = Time.now
puts (e - s)
```

## Sample 2


## Ruby Object

* `VALUE`
* `Qnil`
    * Ruby `nil`
    
## Other

* `builder.c_singleton` creates class method.
* `rb_funcall` and `rb_funcall2` calls Ruby function, 

## SAMPLES

* https://mpsharp.com/2011/09/11/rubyinline-tricks-and-tips/
* https://ruby.programmingpedia.net/en/tutorial/5009/c-extensions
* https://people.apache.org/~rooneg/talks/ruby-extensions/ruby-extensions.html
* https://blog.rebased.pl/2017/12/27/writing-c-and-sharing-memory.html
* https://www.generacodice.blog/en/articolo/2195803/How+to+load+a+string+into+a+C+method+using+RubyInline
* https://python5.com/q/tqaluues

* http://on-ruby.blogspot.com/2006/07/rubyinline-going-bit-further.html

* https://github.com/seattlerb/rubyinline
* https://www.rubydoc.info/gems/RubyInline/3.12.4/toplevel
* https://github.com/ruby/ruby/tree/v1_0r
