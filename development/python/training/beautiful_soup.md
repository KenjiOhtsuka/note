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

def print_section_title(title):
    print("==============================================")
    print("= " + title)
    print("==============================================")

# HTML text you want to analyze. You can put partial HTML.
html = """
<html>
  <head>
    <title>title text</title>
  </head>
  <body>
    <h1 class="heading" name="heading">first header</h1>
    <p id="first_sentence">first</p>
    <p name="sentence 2">second</p>
    <p id="third_sentence" data-1="one" data-2="2">third</p>
    <p name="sentence 4">final</p>
  </body>
</html>
"""

# To analyze HTML, put 'html.parser' to 2nd argument
soup = BeautifulSoup(html, 'html.parser')

# confirm analysis correctnes
print(soup.prettify())

# find elements with soup structure
print_section_title("find elements with soup structure")
# get title element
title = soup.html.head.title
print("title: " + title.string)
# get first p element
p = soup.html.body.p
print("first p: " + p.string)
# get LF and spaces just after the p
blank = p.next_sibling
print("p sibling: " + blank)
# get 2nd p element
p = blank.next_sibling
print("second p: " + p.string)

# find elements by tag name
print_section_title("find elements by tag name")
p_elements = soup.find_all("p")
for p in p_elements:
    # access to the attribute
    if 'id' in p.attrs:
        id = p['id']
    else:
        id = '(no id)'
    text = p.string
    print(id + ' : ' + text)
    
# find element with attribute
print_section_title("find elements with attribute")
h1 = soup.find(name="heading")
p = soup.find('p', id="first_sentence")
print("p with id: " + p.string)
# find element with complexed condition
condition = {'data-1': 'one', 'data-2': 2}
p = soup.find('p', condition)
print("p with condition: " + p.string)

# find elements by CSS selector
print_section_title("find elements with CSS selector")
# find one element
heading = soup.select_one("body > h1.heading")
print("heading: " + heading.string)
p = soup.select_one("p[id='first_sentence']")
print("p: " + p.string)
# find multiple element
p_elements = soup.select("body > p")
for p in p_elements:
    print(p.string)

# Beautiful Soup can collaborate with regular expression
print_section_title("find elements with regular expression")

import re

exp = re.compile(r'e$')
p_elements = soup.find_all(id=exp)
for p in p_elements:
    print(p.string)
```

### Output

```
<html>
 <head>
  <title>
   title text
  </title>
 </head>
 <body>
  <h1 class="heading" name="heading">
   first header
  </h1>
  <p id="first_sentence">
   first
  </p>
  <p name="sentence 2">
   second
  </p>
  <p data-1="one" data-2="2">
   third
  </p>
  <p name="sentence 4">
   final
  </p>
 </body>
</html>

==============================================
= find elements with soup structure
==============================================
title: title text
first p: first
p sibling: 

second p: second
==============================================
= find elements by tag name
==============================================
first_sentence : first
(no id) : second
(no id) : third
(no id) : final
==============================================
= find elements with attribute
==============================================
p with id: first
p with condition: third
==============================================
= find elements with CSS selector
==============================================
heading: first header
p: first
first
second
third
final
==============================================
= find elements with regular expression
==============================================
first
```
