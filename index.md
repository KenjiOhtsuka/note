---
# Feel free to add content and custom Front Matter to this file.
# To modify the layout, see https://jekyllrb.com/docs/themes/#overriding-theme-defaults

layout: page
title: Welcome
---

This is only a memorandum.

<ul>
  {%- for post in site.posts -%}
    <li>
      <a href="{{ post.url | prepend:site.baseurl }}">{{ post.title }}</a> (<time>{{ post.date | date: "%Y-%m-%d" }}</time>)
      {{ post.excerpt }}
    </li>
  {%- endfor -%}
</ul>

