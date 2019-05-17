---
layout: page
---

# LCD Character value

<p>クリックするとオン・オフを切り替えられます。</p>

<script>
var tableTag = document.createElement('table');
tableTag.classList.add('dots');
tableTag.classList.add('mt10');
tableTag.setAttribute('id', 'dots');

function toggleDot() {
    this.classList.toggle('on');
    updateResult();    
}

var tbodyTag = document.createElement('tbody');
for (var r = 0; r < 8; ++r) {
    var trTag = document.createElement('tr');
    for (var c = 0; c < 5; ++c) {
        var tdTag = document.createElement('td');
        tdTag.onclick = toggleDot;
        tdTag.classList.add('dot');
        trTag.appendChild(tdTag);
    }
    tbodyTag.appendChild(trTag);
}
tableTag.appendChild(tbodyTag);

var divTag = document.createElement('div');
divTag.classList.add('result');
divTag.setAttribute('id', 'result');

var bodyTag = document.getElementsByTagName('body')[0];
bodyTag.appendChild(tableTag);
bodyTag.appendChild(divTag);

function updateResult() {
    var tdTags = tableTag.getElementsByTagName('td');
    var values = [0, 0, 0, 0, 0, 0, 0, 0];
    for (var i = 0; i < tdTags.length; ++i) {
        if (tdTags[i].classList.contains('on')) {
            var c = i % 5;
            var r = (i - c) / 5;
            values[r] += Math.pow(2, 4 - c);
        }
    }
    divTag.innerText = '[' + values.join(', ') + ']';
}

function setValues(values) {
    divTag.innerText = '[' + values.join(', ') + ']';
    var tdTags = tableTag.getElementsByTagName('td');
    var c = tdTags.length - 1;
    for (var i = 0; i < 8; ++i) {
        for (var j = 4; j >= 0; --j) {
            if (values[i] >= Math.pow(2, j)) {
                values[i] -= Math.pow(2, j);
                tdTags[i * 5 + 4 - j].classList.add('on');
            }
        }
    }
}

setValues([2, 3, 2, 2, 14, 30, 12, 0]);

//updateResult();
</script>
