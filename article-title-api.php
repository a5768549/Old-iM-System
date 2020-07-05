<?php

session_start();
header("Content-Type: application/json; charset=utf8");

/** 請求的方法是否允許 */
$is_request_method_not_allowed = $_SERVER["REQUEST_METHOD"] !== "POST";

if ($is_request_method_not_allowed) {
    http_response_code(405);
    exit(json_encode(["message" => "不允許的方法"]));
}

include("connect.php"); // 連接資料庫

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

$special_Account = ["C2PAFF","C2NEKO","C2ROBO","C2Ivy","C2Xenon","C2ConneR","C2Cherry","C2JOE","C2Nora"];
$special_color = [  "#59BD9C",
				    "#D693B5",
				    "#82B4C5",
				    "#55555D",
				    "#BB4646",
				    "#9F6932",
				    "#7E434F",
				    "#623873",
				    "#82878D"];

$default_color = "#FFFFFF";

for($i=0;$i<9;$i++){
    if($poster[$i] == $special_Account[$i]){
        array_push($photo_color ,$special_color[$i]);
    }else{
        array_push($photo_color ,$default_color);
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