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
include("special-account.php");

$id = $_POST["id"];

$statement  = $con->prepare("SELECT * FROM article WHERE ID = ?");
$statement -> execute([$id]);
$result = $statement->fetch(PDO::FETCH_ASSOC);
	
$statement2 = $con->prepare("SELECT * FROM member WHERE account = ?");
$statement2 ->execute([$result["poster"]]);
$result2 = $statement2->fetch(PDO::FETCH_ASSOC);

$statement3 = $con->prepare("Select COUNT(*) From comments Where post_id = '$id'");
$statement3 ->execute([$result["poster"]]);
$result3 = $statement3->fetch(PDO::FETCH_ASSOC);
$id_count1 = $result3["COUNT(*)"];

for($i=0;$i<9;$i++){
    if($result["poster"] == $special_Account[$i]){
        $return_color = $special_color[$i];
    }
}

http_response_code(200);
exit(json_encode(["message" => "查詢成功",
                  "id" => $id,
                  "title" => $result["title"],
                  "text" => $result["text"],
                  "author" => $result2["name"],
                  "author_avator" => $result2["photo"],
                  "author_avator_color" => $return_color,
                  "thumbsup" => $result["like_num"],
                  "article_photo" => $result[photo]]));
?>