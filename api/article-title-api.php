<?php

session_start();
header("Content-Type: application/json; charset=utf8");

/** 請求的方法是否允許 */
$is_request_method_not_allowed = $_SERVER["REQUEST_METHOD"] !== "POST";

if ($is_request_method_not_allowed) {
    http_response_code(405);
    exit(json_encode(["message" => "不允許的方法"]));
}

include("../connect.php"); // 連接資料庫
include("special-account.php");

$list = ($_POST["list"] - 1) * 10;

$statement = $con->prepare("SELECT COUNT(*) FROM article");
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);

$all_page = (int)$result["COUNT(*)"];
$now_page = $all_page - $list;

$id_array    = [];
$poster      = [];
$title       = [];
$photo       = [];
$photo_color = [];
$name        = [];
$like_num    = [];

for($i=0;$i<10;$i++){
	$statement = $con->prepare("SELECT * FROM article WHERE ID = ?");
	$statement ->execute([$now_page-$i]);
	$result = $statement->fetch(PDO::FETCH_ASSOC);
	
	$statement2 = $con->prepare("SELECT * FROM member WHERE account = ?");
	$statement2 ->execute([$result["poster"]]);
	$result2 = $statement2->fetch(PDO::FETCH_ASSOC);
	
	array_push($id_array ,$now_page-$i);
	array_push($poster   ,$result["poster"]);
	array_push($title    ,$result["title"]);
	array_push($photo    ,$result2["photo"]);
	array_push($name     ,$result2["name"]);
	array_push($like_num ,$result["like_num"]);
}

for($i=0;$i<10;$i++)
{
    array_push($photo_color ,$default_color);
}

for($i=0;$i<10;$i++)
{
    for($j=0;$j<count($special_Account);$j++)
    {
        if($poster[$i] == $special_Account[$j]){
            $photo_color[$i] = $special_color[$j];
            break;
        }else{
            $photo_color[$i] = $default_color;
        }
    }
}

http_response_code(200);
exit(json_encode(["message" => "查詢成功",
                  "id" => $id_array,
                  "title" => $title,
                  "author" => $poster,
                  "author_avator" => $photo,
                  "thumbsup" => $like_num,
                  "author_avator_color" => $photo_color]));



?>