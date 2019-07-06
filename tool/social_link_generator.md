---
kayout: page
---

# Social Link Generator

<script type="text/javascript">
  <!--
    function encodeURIKD(targetString) {
      return encodeURI(targetString).replace(/&/g, "%26");
    }
    function createTwitterLink() {
      var urlText = "";
      urlText = document.getElementById("urlText").value;
      //if (urlText.indexOf("&", 0) > -1)
      //  alert("URLに「&」が含まれているので\n正確なリンクを作成できない虞があります。");
      var textText = "";
      textText = document.getElementById("textText").value;
      var userText = "";
      userText = document.getElementById("userText").value;

      urlText = encodeURIKD(urlText);
      textText = encodeURIKD(textText);
      userText = encodeURIKD(userText);
      

      var resultURL = "";
      resultURL = resultURL.concat("http://twitter.com/share",
                       "?url=", urlText,
                       "&text=", textText,
                       "&via=", userText);
      document.getElementById("linkTwitter").value = resultURL;

      return false;
    }
  -->  
</script>
<a name="#twitterLinkForm"></a>
<form action="#twitterLinkForm">
URL<br />
<input type="text" id="urlText" value="http://oad.seesaa.net/" style="width:20em;font-size:12px;" /><br />
TEXT<br />
<input type="text" id="textText" value="超すばらしいブログ！" style="width:20em;font-size:12px;"/><br />
YOUR ID<br />
<input type="text" id="userText" value="escamilloIII" style="width:20em;font-size:12px;" /><br />
<input type="button" onclick="createTwitterLink()" value="Create" /><br /><br />
LINK<br />
<textarea id="linkTwitter" rows="5" cols="40" style="font-size:12px;">
</textarea>
</form>
