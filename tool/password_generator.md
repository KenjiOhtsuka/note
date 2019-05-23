---
layout: page
---


<p><strong>パスワードジェネレータ</strong>です。</p>
<p>"記号を含める"を YES にすると、括弧などの記号も含めてパスワードを生成します。数字は半角で入力してネ！</p><a name="more"></a>   <form>
<p>
桁数:
<input type="text" id="digits" value="10" style="text-align:right;" /> 桁
</p>
<p>
記号を含める:
<input type="radio" name="complex" value="1" /> Yes
<input type="radio" name="complex" value="0" checked="checked" /> No
<p>
<p>生成するパスワードの数: <input type="text" id="count" value="3" style="text-align:right;" /> 個</p>
<input type="button" value="Generate!" onclick="getPassword();" />
<h3>生成結果</h3>
<textarea rows="10" cols="20" id="result"></textarea>
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
        var seed2 = '!#$%&\'(){}[]";:@^';
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
<p>ランダムに文字を出しているだけなので、全部数字になった場合や、全部大文字になった場合は、自分でもういっかいgenerate ボタンを押してください。</p>
