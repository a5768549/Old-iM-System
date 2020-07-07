<?php
session_start();
header("Content-Type: application/json; charset=utf8");

/** 請求的方法是否允許 */
$is_request_method_not_allowed = $_SERVER["REQUEST_METHOD"] !== "POST";

if ($is_request_method_not_allowed) {
    http_response_code(405);
    exit(json_encode(["message" => "不允許的方法"]));
}

include("../connect.php"); //連接資料庫


if(!isset($_SESSION["login"]))
{
    http_response_code(401);
    exit(json_encode(["message" => "未登入"]));
}

$account = $_SESSION["login"];
$post_id = $_POST['id'];

$statement = $con->prepare("SELECT * FROM like_num WHERE account = ? and post_id = ?");
$statement ->execute([$account,$post_id]);
$result = $statement->fetch(PDO::FETCH_ASSOC);
$flag   = $result["flag"];

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
	$statement ->execute([$account,$post_id,$flag]);
}
	  
if($flag == 2)
{
	$flag = 1;
	$statement = $con->prepare("UPDATE like_num set flag = 1 WHERE post_id = ? and account = ?");
	$statement ->execute([$post_id,$account]);
			
	$statement = $con->prepare("SELECT like_num FROM article WHERE ID = ?");
	$statement ->execute([$post_id]);
	$result = $statement->fetch(PDO::FETCH_ASSOC);
	$post_like = $result["like_num"] - 1;
			
	$statement = $con->prepare("UPDATE article set like_num = ? WHERE ID = ?");
	$statement ->execute([$post_like,$post_id]);
    
    http_response_code(200);
    exit(json_encode(["message" => "已取消like"]));
}
else if($flag == 1)
{
	$flag = 2;
	$statement = $con->prepare("UPDATE like_num set flag = 2 WHERE post_id = ? and account = ?");
	$statement ->execute([$post_id,$account]);

	$statement = $con->prepare("SELECT like_num FROM article WHERE ID = ?");
	$statement ->execute([$post_id]);
	$result = $statement->fetch(PDO::FETCH_ASSOC);
	$post_like = $result["like_num"] + 1;

	$statement = $con->prepare("UPDATE article set like_num = ? WHERE ID = ?");
	$statement ->execute([$post_like,$post_id]);
    
    http_response_code(200);
    exit(json_encode(["message" => "已like"]));
}
?>