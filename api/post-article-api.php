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

$poster   = $_SESSION["login"];
$title    = htmlspecialchars($_POST['title']);
$textarea = htmlspecialchars($_POST['textarea']);
$like_num = 0;

$order   = ["\r\n", "\n", "\r"];
$replace = '<br>';

if($title == "")
{
    http_response_code(400);
    exit(json_encode(["message" => "未完整輸入"]));
}
else
{
    // 封裝好的單一 PHP 檔案上傳 function
    include_once 'upload.func.php';
    // 取得 HTTP 文件上傳變數
    $fileInfo = $_FILES['file'];
    // 呼叫封將好的 function
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

    if($newName != "no file")
    {
        $newstr = str_replace($order, $replace, $textarea);
        
        $statement = $con->prepare("Insert Into article(poster,title,text,like_num,photo) Values (?,?,?,?,?)");
        $statement ->execute([$poster,$title,$newstr,$like_num,$newName]);
        
        http_response_code(201);
        exit(json_encode(["message" => "文章已創立"]));
        
    }
    else
    {
        $newstr = str_replace($order, $replace, $textarea);
        
        $statement = $con->prepare("Insert Into article(poster,title,text,like_num) Values (?,?,?,?)");
        $statement ->execute([$poster,$title,$newstr,$like_num]);

        http_response_code(201);
        exit(json_encode(["message" => "文章已創立"]));
    }
}
?>