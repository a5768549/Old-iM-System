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

$id        = htmlspecialchars($_GET["id"]);
$commenter = $_SESSION["login"];
$textarea  = htmlspecialchars($_POST['textarea']);

$order   = ["\r\n", "\n", "\r"];
$replace = '<br>';

if($textarea == "")
{
	http_response_code(400);
    exit(json_encode(["message" => "未完整輸入"]));
}
else
{
    $newstr = str_replace($order, $replace, $textarea);
    
	$statement = $con->prepare("Select COUNT(*) From comments Where post_id = ?");
	$statement ->execute([$id]);
	$result = $statement->fetch(PDO::FETCH_ASSOC);
	$id_count = $result["COUNT(*)"] + 1;

	$statement = $con->prepare("Insert Into comments(post_id,id,text,commenter) Values (?,?,?,?)");
	$statement->execute([$id,$id_count,$newstr,$commenter]);
    
    http_response_code(201);
    exit(json_encode(["message" => "回覆已添加"]));
}