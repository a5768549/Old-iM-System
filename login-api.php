<?php

session_start();
header("Content-Type: application/json; charset=utf8");

/** 請求的方法是否允許 */
$is_request_method_not_allowed = $_SERVER["REQUEST_METHOD"] !== "POST";

if ($_is_request_method_not_allowed) {
    http_response_code(405);
    exit(json_encode(["message" => "不允許的方法"]));
}

include("connect.php"); // 連接資料庫

/** 使用者名稱 */
$name = htmlspecialchars($_POST["name"]);

/** 使用者密碼 */
$password = htmlspecialchars($_POST["password"]);

/** 使用者登入資訊是否無誤 */
$is_login_info_valid = $name && $password;

if ($is_login_info_valid) {
    /** 查詢式 */
    $statement = $con->prepare("SELECT `password` FROM member WHERE account = ?");
    $statement->execute([$name]);

    /** 用戶資訊 */
    $member = $statement->fetch(PDO::FETCH_ASSOC);

    /** 密碼是否正確 */
    $is_password_verified = password_verify($password, $member["password"]);

    if ($is_password_verified) {
        $_SESSION["login"] = $name;
        http_response_code(200);
        exit(json_encode(["message" => "登入成功"]));
    }
    else {
        http_response_code(401);
        exit(json_encode(["message" => "登入失敗"]));
    }
}
else {
    http_response_code(400);
    exit(json_encode(["message" => "缺少欄位"]));
} ?>
