<?php if(!isset($_COOKIE["login"]))
{
    header("Location: login.html"); //將網址改為要導入的登入頁面
}
else
{    
?>
<title>已登入提醒</title>
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
	left: 399px;
	top: 270px;
	width: 851px;
	height: 91px;
	z-index: 1;
	text-align: center;
	font-size: 72px;
}
</style>
<div id="apDiv1">您已登入</div>
<script>
setTimeout(function(){window.location.href='./main/main.php?count=0';},3000);
</script>
<?php } 

?>