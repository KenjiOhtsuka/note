---
layout: page
---

説明/Explanation: https://www.wantedly.com/users/3634124/post_articles/295838


```javascript
const dom = document.getElementBy ...

function generateList(dom, level) {
  text = ""
  for (let childNode of dom.childNodes) {
    switch (childNode.nodeType) {
      case 1: // tag
        break;
      case 3: // text
        let chunk = childNode.textContent.trim()
        if (chunk.length > 0) text += "\t".repeat(level) + chunk + "\n"
        break;
    }
    text += generateList(childNode, level + 1)
  }
  return text
}
```
