<?php session_start(); ?>
<?php
include('../connect.php');//連結資料
$account = $_SESSION["login"];

if(isset($_POST['like1']))
{
	$post_id = $_POST['like1'];
}

if(isset($_POST['like2']))
{
	$post_id = $_POST['like2'];
}

if(isset($_POST['like3']))
{
	$post_id = $_POST['like3'];
}

if(isset($_POST['like4']))
{
	$post_id = $_POST['like4'];
}

if(isset($_POST['like5']))
{
	$post_id = $_POST['like5'];
}

if(isset($_POST['like6']))
{
	$post_id = $_POST['like6'];
}

if(isset($_POST['like7']))
{
	$post_id = $_POST['like7'];
}

if(isset($_POST['like8']))
{
	$post_id = $_POST['like8'];
}

if(isset($_POST['like9']))
{
	$post_id = $_POST['like9'];
}

if(isset($_POST['like10']))
{
	$post_id = $_POST['like10'];
}

if(isset($_POST['like_text']))
{
	$post_id = $_POST['like_text'];
}

$statement = $con->prepare("SELECT * FROM like_num WHERE account = ? and post_id = ?");
$statement ->execute(array($account,$post_id));
$result = $statement->fetch(PDO::FETCH_ASSOC);
$flag = $result["flag"];


if(count($result["flag"]) == 0)
{
	$flag = 0;  
}
if($flag > 1)
{
	$flag = 2;  
}
if($flag == 0)
{
	$flag = 1;

	$statement = $con->prepare("Insert Into like_num(account,post_id,flag) Values (? , ? , ?)");
	$statement ->execute(array($account,$post_id,$flag));
}
	  
if($flag == 2)
{
	$flag = 1;
	$statement = $con->prepare("UPDATE like_num set flag = 1 WHERE post_id = ? and account = ?");
	$statement ->execute(array($post_id,$account));
			
	$statement = $con->prepare("SELECT like_num FROM article WHERE ID = ?");
	$statement ->execute(array($post_id));
	$result = $statement->fetch(PDO::FETCH_ASSOC);
	$post_like = $result["like_num"] - 1;
			
	$statement = $con->prepare("UPDATE article set like_num = ? WHERE ID = ?");
	$statement ->execute(array($post_like,$post_id));
	echo "
		<script>
		setTimeout(function(){self.location=document.referrer;},0);
		</script>
		";
}
else if($flag == 1)
{
	$flag = 2;
	$statement = $con->prepare("UPDATE like_num set flag = 2 WHERE post_id = ? and account = ?");
	$statement ->execute(array($post_id,$account));

	$statement = $con->prepare("SELECT like_num FROM article WHERE ID = ?");
	$statement ->execute(array($post_id));
	$result = $statement->fetch(PDO::FETCH_ASSOC);
	$post_like = $result["like_num"] + 1;

	$statement = $con->prepare("UPDATE article set like_num = ? WHERE ID = ?");
	$statement ->execute(array($post_like,$post_id));
	echo "
		<script>
		setTimeout(function(){self.location=document.referrer;},0);
		</script>
		";
}
?>