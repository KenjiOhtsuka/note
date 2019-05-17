---
layout: page
---

# Password Generator

"記号を含める"を YES にすると、括弧などの記号も含めてパスワードを生成します。
ここでいう"記号"は `!#$%&\'(){}[]";:@^_-` を指します。


数字は半角で入力してネ！

<form>
    <section>
        <h3>パスワード生成条件</h3>
        <ul>
            <li>
                桁数:
                <input type="number" id="digits" min="1" step="1" value="16" style="text-align:right;width:5em;" /> 桁
            </li>
            <li>
                記号を含める:
                <label><input type="radio" name="complex" value="1" checked="checked" /> Yes</label>
                <label><input type="radio" name="complex" value="0" /> No</label>
            </li>
            <li>
                生成するパスワードの数: <input type="number" id="count" value="5" min="1" step="1" style="text-align:right;width:5em;" /> 個                
            </li>
            <input type="button" value="Generate!" onclick="getPassword();" />
        </ul>
    </section>
    <section>
        <h3>生成結果</h3>
        <textarea rows="10" cols="20" id="result" style="width:100%;"></textarea>
    </section>
</form>
    
    
<script>
function getPassword() {
	var length = document.getElementById("digits").value;
    if (!length.match(/^[1-9][0-9]*$/)) {
        document.getElementById("result").value = "桁数を正しく入力してください。";
        return;
    }
    var count = document.getElementById("count").value;
    if (!count.match(/^[1-9][0-9]*$/)) {
        document.getElementById("result").value = "個数を正しく入力してください。";
        return;
    }

	var len = parseInt(length);
    var cnt = parseInt(count);
    
    var complexRadios = document.getElementsByName("complex");
    var complex;
    for (var i = 0; i < complexRadios.length; i++) {
        if (complexRadios[i].checked) {
            complex = i;
        }
    }
    var seed1 = '01234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var seed2 = '!#$%&\'(){}[]";:@^_-';
    var seed = '';
    seed = (complex == 0) ? seed1 + seed2 : seed1;
    var pwd = '', pwds = '';
    var i = 0, j = 0;
    for (i = 0; i < cnt; i++) {
        pwd = '';
        for (j = 0; j < len; j++) {
            pwd += seed[Math.floor(Math.random() * seed.length)];
        }
        pwds += pwd + "\n";
    }
    document.getElementById("result").value = pwds;
}
</script>
