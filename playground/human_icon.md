---
layout: page
---

# Human Icon

<svg viewBox="0 0 200 200" width="0" height="0" style="position:absolute;">
   <defs>
       <mask id="silhouette" x="0" y="0" height="200" width="200">
           <rect x="0" y="0" width="200" height="200" fill="white"/>
           <circle cx="100" cy="65" r="40" fill="black" />
           <circle cx="100" cy="190" r="80" fill="black" />
       </mask>
       <g id="user_icon">
           <circle cx="100" cy="100" r="96" mask="url(#silhouette)" />
           <circle cx="100" cy="100" r="96" stroke-width="8" fill="transparent" />
       </g>
   </defs> 
</svg>

<svg viewBox="0 0 200 200" width="40" height="40">
   <use xlink:href="#user_icon" fill="blue" stroke="blue" />
</svg>

<svg viewBox="0 0 200 200" width="60" height="60">
   <use xlink:href="#user_icon" fill="green" stroke="green" />
</svg>

<svg viewBox="0 0 200 200" width="80" height="80">
   <use xlink:href="#user_icon" fill="red" stroke="red" />
</svg>
