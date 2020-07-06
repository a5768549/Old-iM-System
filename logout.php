<?php session_start(); ?>
<style type="text/css">
@import url(//fonts.googleapis.com/earlyaccess/notosanstc.css);
body,td,th {
	color: #FFF;
}
body {
	background-color: #333;
	font-family: 'Noto Sans TC', '微軟正黑體', sans-serif;
}
#apDiv1 {
	position: absolute;
	left: 323px;
	top: 259px;
	width: 988px;
	height: 252px;
	z-index: 1;
	text-align: center;
	font-size: 72px;
}
#apDiv2 {
	position: absolute;
	left: 551px;
	top: 130px;
	width: 531px;
	height: 118px;
	z-index: 2;
	text-align: center;
	font-size: 72px;
}
</style>
<title>登出畫面</title>
<div id="apDiv1">
  <p>您已經登出</p></div>
<div id="apDiv2">
<?php
echo $_SESSION["login"] . "<br />";
session_destroy();
?>
</div>
<script>
setTimeout(function(){window.location.href='./old_interface.html';},3000);
</script>