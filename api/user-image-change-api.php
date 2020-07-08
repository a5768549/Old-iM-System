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

$name = $_SESSION["login"];
include_once 'user_upload_func.php';

$fileInfo = $_FILES['file'];

$newName = uploadFile($fileInfo);

switch($newName)
{
    case 'code 1':
        http_response_code(400);
        exit(json_encode(["message" => "此檔案不是圖片"]));
        break;
    case 'code 2':
        http_response_code(400);
        exit(json_encode(["message" => "路徑重複"]));
        break;
    case 'code 3':
        http_response_code(400);
        exit(json_encode(["message" => "圖片太大(最大5MB)"]));
        break;
    case 'code 4':
        http_response_code(400);
        exit(json_encode(["message" => "錯誤附檔名(JPG JPEG PNG GIF)"]));
        break;
    case 'code 5':
        http_response_code(400);
        exit(json_encode(["message" => "圖片上傳不成功"]));
        break;
    case 'code 6':
        http_response_code(400);
        exit(json_encode(["message" => "上傳失敗"]));
        break;  
}

//設定檔案上傳路徑，選擇指定資料夾
if($newName != "no file")
{
    $statement = $con->prepare("UPDATE member SET photo = ? WHERE account = ?");
    $statement ->execute(array($newName,$name));
    http_response_code(201);
    exit(json_encode(["message" => "圖片已更新"]));
}