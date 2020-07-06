<?php session_start(); ?>
<style type="text/css">
body {
	background-color: #333;
}
#apDiv1 {
	position: absolute;
	left: 268px;
	top: 164px;
	width: 1105px;
	height: 292px;
	z-index: 1;
	color: #FFF;
	text-align: center;
	font-size: 64px;
}
</style>

<div id="apDiv1">

<?php
header("Content-Type: text/html; charset=utf8");
 
include('connect.php');//連結資料庫
$name = htmlspecialchars($_POST['name']);//post獲得使用者名稱錶單值
$password = htmlspecialchars($_POST['password']);//post獲得使用者密碼單值

if ($name && $password)
{//如果使用者名稱和密碼都不為空
	$statement = $con->prepare("SELECT password FROM member WHERE account = ?");
	$statement->execute(array($name));
	$result = $statement->fetch(PDO::FETCH_ASSOC);
	
	if (password_verify($password, $result["password"])) 
	{
		$_SESSION['login'] = $name;
		header("refresh:0;url=welcome.php");//如果成功跳轉至welcome.html頁面
		exit;
	}
	
	else
	{
		echo "使用者名稱或密碼錯誤";
		echo "
		<script>
		setTimeout(function(){window.location.href='index.html';},1000);
		</script>
		";
	}

}
else
{
echo "表單填寫不完整";
echo "
<script>
setTimeout(function(){window.location.href='index.html';},1000);
</script>";
//如果錯誤使用js 1秒後跳轉到登入頁面重試;
}
?>
</div>