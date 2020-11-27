---
layout: page
---


```javascript
const dom = document.getElementBy ...

let bulletList = ""
function generateList(dom, level) {
  text = ""
  for (let childNode of dom.childNodes) {
    switch (childNode.nodeType) {
      case 1: // tag
        break;
      case 3: // text
        let chunk = childNode.textContent.trim()
        if (chunk.length > 0) text += chunk.padStart(level) + "\n"
        break;
    }
    text += generateList(childNode, level + 1)
  }
  return text
}
```
