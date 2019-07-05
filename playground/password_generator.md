---
layout: page
---

# Password Generator

## Form 1

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

## Form 2 - Kagoya のメール専用
<script>
    var SMALL_LETTERS = "abcdefthijklmnopqrstuvwxyz"
    var LARGE_LETTERS = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
    var NUMBER_LETTERS = "0123456789"
    var SPECIAL_LETTERS = "#%=-+:?_<>[]{}()^!,."
    var AVAILABLE_LETTERS =
        SMALL_LETTERS + LARGE_LETTERS + NUMBER_LETTERS + SPECIAL_LETTERS

    /**
     * a から z までの半角英小文字
     * A から Z までの半角英大文字
     * 0 から 9 までの半角数字
     * 一部の半角記号（#%=-+:?_<>[]{}()^!,.）
     * 16文字
     */
    function generate() {
        var index;
        var password;
        do {
            password = ""
            for (i = 0; i <= 15; ++i) {
                do {
                    index = Math.floor(Math.random() * AVAILABLE_LETTERS.length)
                } while (index == AVAILABLE_LETTERS.length)
                password += AVAILABLE_LETTERS[index]
            }
        } while (!isValidPassword(password))
        return password
    }

    function isValidPassword(password) {
        if (password.length != 16) return false
        if (Array.from(new Set(password.split(''))).length != 16) return false
	
        var charTypeArray = [
	    SMALL_LETTERS, LARGE_LETTERS, NUMBER_LETTERS, SPECIAL_LETTERS
	]
        char_type_loop: for (charTypeIndex in charTypeArray) {
	    var str = charTypeArray[charTypeIndex]
            var count = 0
            for (charIndex in str) {
	        var c = str[charIndex]
                if (password.includes(c)) {
                    if (++count == 2) {
		        break char_type_loop;
		    }
		}
            }
	    
            return false
        }

        return true
    }
    
function generatePassword() {
    var length = document.getElementById("password_length").value;
    if (!length.match(/^[1-9][0-9]*$/)) {
        document.getElementById("generated_password").value = "桁数を正しく入力してください。";
        return;
    }
    var count = document.getElementById("password_count").value;
    if (!count.match(/^[1-9][0-9]*$/)) {
        document.getElementById("generated_password").value = "個数を正しく入力してください。";
        return;
    }

    var len = parseInt(length);
    var cnt = parseInt(count);

    var pwds = '';
    for (i = 0; i < cnt; i++) {
        pwds += generate() + "\n";
    }
    document.getElementById("generated_password").value = pwds;
}
</script>

<form>
    <section>
        <h3>パスワード生成条件</h3>
        <ul>
            <li>
                桁数: <input type="number" id="password_length" min="1" step="1" value="16" style="text-align:right;width:5em;" /> 桁
            </li>
            <li>
                生成するパスワードの数: <input type="number" id="password_count" value="5" min="1" step="1" style="text-align:right; width:5em;" /> 個                
            </li>
            <input type="button" value="Generate!" onclick="generatePassword();" />
        </ul>
    </section>
    <section>
        <h3>生成結果</h3>
        <textarea rows="10" cols="20" id="generated_password" style="width:100%;"></textarea>
    </section>
</form>

