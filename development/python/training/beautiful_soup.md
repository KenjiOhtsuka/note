---
layout: page
---

# BeautifulSoup

Beautiful soup helps to analyze structured documents, such as HTML and XML.

## environment

* python: 3.9.0

## Preparation

* install beautiful soup
    `pip install beautifulsoup4'
* import beautiful soup
    `import BeautifulSoup4`
    
## Beautiful Soup overview

```python
from bs4 import BeautifulSoup

# HTML text you want to analyze. You can put partial HTML.
html = """
<html>
  <head>
    <title>title text</title>
  </head>
  <body>
    <h1 class="heading">first header</h1>
    <p id="first_sentence">first</p>
    <p>second</p>
  </body>
</html>
"""

# confirm analysis correctnes
print(soup.prettify())

# To analyze HTML, put 'html.parser' to 2nd argument
soup = BeautifulSoup(html, 'html.parser')

# find elements with soup structure
# get title element
title = soup.html.head.title
# get first p element
p = soup.html.body.p
# get LF and spaces just after the p
blank = p.next_sibling
# get 2nd p element
p2 = p.next_sibling

# find elements by tag name
p_elements = soup.find_all("p")
p in p_elements:
    # access to the attribute
    id = p['id']
    text = p.string
    print(id + ' : ' + text)
    
# find elements by CSS selector
# find one element
heading = soup.select_one("body > h1.heading")
print("heading: " + heading.string
# find multiple element
p_elements = soup.select("body > p")
p in p_elements:
    print(p.string)

```
