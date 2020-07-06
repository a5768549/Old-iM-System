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

/** 使用者名稱 */
$name = htmlspecialchars($_POST["name"]);

/** 使用者密碼 */
$password = htmlspecialchars($_POST["password"]);
$hash     = password_hash("$password", PASSWORD_DEFAULT);

/** 使用者暱稱 */
$id = htmlspecialchars($_POST["id"]);

/** 使用者Email */
$email = htmlspecialchars($_POST["email"]);

/** 使用者預設大頭貼 */
$picture  = "../image/def_picture.jpg";

/** 使用者註冊資訊是否無誤 */
$is_reg_info_valid = $name && $password && $id && $email;

if ($is_reg_info_valid) {
    /** 查詢式 */
    $statement = $con->prepare("Select COUNT(*) From member Where account = ?");
    $statement ->execute([$name]);

    /** 用戶資訊 */
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    
    /** 是否有相同的帳號 */
    if((int)$result["COUNT(*)"] >= 1){
        http_response_code(422);
        exit(json_encode(["message" => "此帳號名稱已被註冊"]));
    }
    else{
        $statement = $con->prepare("Insert Into member(account,password,name,email,photo) Values (?,?,?,?,?)");
        $statement ->execute(array($name,$hash,$id,$email,$picture));
        http_response_code(201);
        exit(json_encode(["message" => "註冊成功"]));
    }
}
else {
    http_response_code(400);
    exit(json_encode(["message" => "缺少欄位"]));
} ?>