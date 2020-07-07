<?php
session_start();
header("Content-Type: application/json; charset=utf8");

/** 請求的方法是否允許 */
$is_request_method_not_allowed = $_SERVER["REQUEST_METHOD"] !== "POST";

if ($is_request_method_not_allowed) {
    //http_response_code(405);
    //exit(json_encode(["message" => "不允許的方法"]));
}

include("../connect.php"); //連接資料庫
include("special-account.php");

if(!isset($_SESSION["login"]))
{
    http_response_code(401);
    exit(json_encode(["message" => "未登入"]));
}

$name = $_SESSION["login"];
$statement = $con->prepare("SELECT * FROM member WHERE account = ?");
$statement->execute([$name]);
$result = $statement->fetch(PDO::FETCH_ASSOC);

for($i=0;$i<count($special_Account);$i++){
    if($name == $special_Account[$i]){
        $default_color = $special_color[$i];
    }
}

http_response_code(200);
exit(json_encode(["message" => "查詢成功",
                  "account" => $name,
                  "user_name" => $result["name"],
                  "email" => $result["email"],
                  "user_avator" => $result["photo"],
                  "user_avator_color" => $default_color]));

?>