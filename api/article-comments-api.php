<? 
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

$comment_id  = [];
$commenter   = [];
$photo       = [];
$photo_color = [];
$text        = [];
$name        = [];

$statement = $con->prepare("SELECT COUNT(*) FROM comments WHERE post_id = '$id'");
$statement ->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);
$comment_all = $result['COUNT(*)'];
				
for($i=1;$i<$comment_all+1;$i++){
    $statement = $con->prepare("SELECT * FROM comments WHERE id = ? and post_id = '$id'");
    $statement ->execute([$i]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    $statement2 = $con->prepare("SELECT * FROM member WHERE account = ?");
    $statement2 ->execute([$result["commenter"]]);
    $result2 = $statement2->fetch(PDO::FETCH_ASSOC);

    array_push($comment_id ,$i);
    array_push($commenter  ,$result ["commenter"]);
    array_push($photo      ,$result2["photo"]);
    array_push($text       ,$result ["text"]);
    array_push($name       ,$result2["name"]);
}

for($i=0;$i<9;$i++){
    if($commenter[$i] == $special_Account[$i]){
        array_push($photo_color ,$special_color[$i]);
    }else{
        array_push($photo_color ,$default_color);
    }
}

http_response_code(200);
exit(json_encode(["message" => "查詢成功",
                  "post_id" => $id,
                  "comment_id" => $comment_id,
                  "text" => $text,
                  "author" => $commenter,
                  "author_avator" => $photo,
                  "author_avator_color" => $photo_color]));
?>