<?php session_start(); ?>
<?php
header("Content-Type: text/html; charset=utf8");
if(!isset($_POST["submit"])){
exit("錯誤執行");
}
include('connect.php');
$account  = $_SESSION["login"];
$password = htmlspecialchars($_POST['password']);
$change_password = htmlspecialchars($_POST['change_password']);
$name     = htmlspecialchars($_POST['name']);
$email    = htmlspecialchars($_POST['email']);

$statement = $con->prepare("SELECT password FROM member WHERE account = ?");
$statement->execute(array($account));
$result    = $statement->fetch(PDO::FETCH_ASSOC);

if (($account && $password))
{
	if (password_verify($password, $result["password"])) 
	{
		$statement2 = $con->prepare("UPDATE member SET name=?, email=? WHERE account=?");
		$statement2->execute(array($name,$email,$account));
		
		if($password != $change_password)
		{
			$hash = password_hash("$change_password", PASSWORD_DEFAULT);
			$statement3 = $con->prepare("UPDATE member SET password=? WHERE account=?");
			$statement3->execute(array($hash,$account));
		}
		echo "更改成功！";
		echo "
		<script>
		setTimeout(function(){window.location.href='personal.php';},1000);
		</script>
		";//如果錯誤使用js 1秒後跳轉到登入頁
	}
	else
	{
		echo "使用者名稱或密碼錯誤";
		echo "
		<script>
		setTimeout(function(){window.location.href='personal.php';},1000);
		</script>
		";//如果錯誤使用js 1秒後跳轉到登入頁面重試;
	}
}
else
{//如果使用者名稱或密碼有空
echo "表單填寫不完整";
echo "
<script>
setTimeout(function(){window.location.href='personal.php';},1000);
</script>";
//如果錯誤使用js 1秒後跳轉到登入頁面重試;
}
?>