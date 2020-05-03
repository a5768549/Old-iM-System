<title>註冊結果</title>
<?php 
header("Content-Type: text/html; charset=utf8");

$name     = htmlspecialchars($_POST['name']);//post獲取表單裡的name
$password = htmlspecialchars($_POST['password']);//post獲取表單裡的password
$hash     = password_hash("$password", PASSWORD_DEFAULT);
$id       = htmlspecialchars($_POST['id']);
$email    = htmlspecialchars($_POST['email']);
$picture  = "../image/def_picture.jpg";
include('connect.php');//連結資料庫

$statement = $con->prepare("Select COUNT(*) From member Where account = ?");
$statement ->execute(array($name));
$result = $statement->fetch(PDO::FETCH_ASSOC);

if((int)$result["COUNT(*)"] >= 1)
{
	
echo "此帳號已被註冊！";

echo "
<script>
setTimeout(function(){window.location.href='res.html';},2000);
</script>
";//如果錯誤使用js 1秒後跳轉到登入頁面

}
else
{
	$statement = $con->prepare("Insert Into member(account,password,name,email,photo) Values (?,?,?,?,?)");
	$statement ->execute(array($name,$hash,$id,$email,$picture));
	echo "註冊成功";//成功輸出註冊成功
	echo "
	<script>
	setTimeout(function(){window.location.href='index_turn.html';},2000);
	</script>
	";//如果錯誤使用js 1秒後跳轉到登入頁面
}
?>