---
layout: page
---

## 00. Reversed String

```python
"stressed"[::-1]
```

### Output

```text
desserts
```

## 01. "schooled"

```python
"schooled"[::2]
```

### Output

```text
shoe
```

## 02. “shoe” + “cold” = “schooled”

```python
"".join([x + y for (x, y) in zip("shoe", "cold")])
```

### Output

```text
shooled
```

## 03. Pi

```python
text = "Now I need a drink, alcoholic of course, after the heavy lectures involving quantum mechanics"
words = [chunk.replace(",", "").strip() for chunk in text.split(" ")]
[len(word) for word in words]
```

### Output

```text
[3, 1, 4, 1, 5, 9, 2, 6, 5, 3, 5, 8, 9, 7, 9]
```

## 04. Atomic symbolsPermalink

```python
text = "Hi He Lied Because Boron Could Not Oxidize Fluorine. New Nations Might Also Sign Peace Security Clause. Arthur King Can"
positions = [1, 5, 6, 7, 8, 9, 15, 16, 19]
words = text.split(" ")
head_letters = [
    word[:(1 if i in positions else 2)] for i, word in enumerate(words)
]
{value : index for index, value in enumerate(head_letters)}
```

### Output

```text
{'Hi': 0,
 'H': 1,
 'Li': 2,
 'Be': 3,
 'Bo': 4,
 'C': 19,
 'N': 9,
 'O': 7,
 'F': 8,
 'Na': 10,
 'Mi': 11,
 'Al': 12,
 'Si': 13,
 'Pe': 14,
 'S': 15,
 'Ar': 17,
 'Ki': 18}
```

## 05. n-gram

```python
def n_gram(target, n):
    return [target[i:i + n] for i in range(len(target) - n + 1)]

text = "I am an NLPer"
print(n_gram(text, 2))
words = text.split(" ")
print(n_gram(words, 2))
```

### Output

```text
['I ', ' a', 'am', 'm ', ' a', 'an', 'n ', ' N', 'NL', 'LP', 'Pe', 'er']
[['I', 'am'], ['am', 'an'], ['an', 'NLPer']]
```

## 06. Set

```text
text_x = "paraparaparadise"
text_y = "paragraph"
x = {text_x[index:index+2] for index in range(len(text_x) - 1)}
y = {text_y[index:index+2] for index in range(len(text_y) - 1)}

print("Union:", sorted(x | y))
print("Intersection:", sorted(x & y))
print("Difference:", sorted(x - y | y - x))

print(f'se is in x: {"se" in x}')
print(f'se is in y: {"se" in y}')
```

### Output

```text
Union: ['ad', 'ag', 'ap', 'ar', 'di', 'gr', 'is', 'pa', 'ph', 'ra', 'se']
Intersection: ['ap', 'ar', 'pa', 'ra']
Difference: ['ad', 'ag', 'di', 'gr', 'is', 'ph', 'se']
se is in x: True
se is in y: False
```

## 07. Template-based sentence generationPermalink

```python
def function(x, y, z):
    return f"{y} is {z} at {x}"

function(12, "temperature", 22.4)
```

### Output

```text
'temperature is 22.4 at 12'
```

## 08. cipher textPermalink

```python
def chipher(text):
    return "".join([chr(219 - ord(c)) if c.islower() else c for c in text])

target_text = "Hello"
print(target_text)
result = chipher(target_text)
print(result)
result = chipher(result)
print(result)
```

### Output

```text
Hello
Hvool
Hello
```

## 09. TypoglycemiaPermalink

```python
text = "I couldn’t believe that I could actually understand what I was reading : the phenomenal power of the human mind"

import random

def shuffle(text):
    characters = [c for c in text]
    for _ in range(3):
        for i in range(len(text)):
            target_1 = random.randint(0, len(text) - 1)
            target_2 = random.randint(0, len(text) - 1)
            characters[target_1], characters[target_2] =\
                characters[target_2], characters[target_1]
    return "".join(characters)
        

def convert(text):
    words = text.split(" ")
    return " ".join([word if len(word) <= 4 else word[0] + shuffle(word[1:-1]) + word[-1] for word in words])
    
convert(text)
```

### Output

```text
'I cd’olunt bveelie that I could atllucay udrtnsenad what I was raideng : the pomnnheeal power of the haumn mind'
```
```
