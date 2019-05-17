---
layout: page
---

# Number SVG


<svg viewbox="0 0 0.5rem 0.5rem">
  <rect x="0" y="0" width="1rem" height="0.49rem" style="fill:#f00;"/>
  <rect x="0" y="0.52rem" width="1rem" height="0.49rem" fill="#f00"/>
  <text text-anchor="middle" x="0.25rem" y="0.85rem" dy="1">1</text>
  <clipPath id="svgPath">
     <text x="0.25" y="0.85" x="0.25rem" y="0.85rem">S</text>
  </clipPath>
</svg>

<svg class="defs">
    <defs>
        <g fill="white" id="white_mask" width="70" height="100">
            <rect x="0" y="0" width="70" height="49" />
            <rect x="0" y="51" width="70" height="49" />
        </g>
        <g id="num_1" >
          <mask id="mask_1" x="0" y="0" width="70" height="100">
            <use xlink:href="#white_mask" />
            <text text-anchor="middle" x="36" y="85" font-size="100" fill="black">1</text>
          </mask>
          <rect x="0" y="0" rx="3.5" ry="3.5" width="70" height="100" mask="url(#mask_1)" fill="#412e1e"  />
        </g>
    </defs>
</svg>

<svg viewbox="0 0 70 100" style="width:100%;height:100%;"><use xlink:href="#num_1" /></svg>

<svg viewBox="0 0 200 200">
    <mask id="mask0" maskUnits="userSpaceOnUse" x="0" y="0" width="200" height="200">
        <g fill="black" fill-rule="evenodd">
            <rect x="0" y="0" width="200" height="200" fill="white"/>
            <rect x="25" y="25" width="50" height="50"/>
            <rect x="125" y="25" width="50" height="50"/>
            <text x="30" y="100">ここがマスク領域</text>
            <path d="M 25,125 v 30 h 100 v -30 h -100 m 50,30 v 20 h 100 v -30 h -100"/>
        </g>
    </mask>
    <rect x="0" y="0" width="200" height="200" fill="lightpink"/>
    <circle mask="url(#mask0)" cx="100" cy="100" r="90" stroke="aqua" stroke-width="10" fill="blue"/>
</svg>
