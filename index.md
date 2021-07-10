---
# Feel free to add content and custom Front Matter to this file.
# To modify the layout, see https://jekyllrb.com/docs/themes/#overriding-theme-defaults

layout: page
---

# Welcome

This is really personal memorandom.

<aside>
    <div style="text-align:center;">
        <script src="//adm.shinobi.jp/s/0b9802c86ff043840aefd09daaea9a30"></script>
    </div>
</aside>
<ul>
  {% for post in site.posts %}
    <li>
      <a href="{{ post.url | prepend:site.baseurl }}">{{ post.title }}</a>
      {{ post.excerpt }}
    </li>
  {% endfor %}
</ul>
<aside>
    <div style="text-align:center;">
        <script src="//adm.shinobi.jp/s/bce14cde4bc76ea26acaf0cb8caeb0a4"></script>
    </div>
</aside>
