---
# Feel free to add content and custom Front Matter to this file.
# To modify the layout, see https://jekyllrb.com/docs/themes/#overriding-theme-defaults

layout: page
---

# Welcome

This is really personal memorandom.

<ul>
  {% for post in site.posts %}
    <li>
      <a href="{{ post.url | prepend:site.baseurl }}">{{ post.title }}</a>
      {{ post.excerpt }}
    </li>
  {% endfor %}
</ul>
