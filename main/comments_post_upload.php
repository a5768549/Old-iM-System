<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style type="text/css">
@import url(https://fonts.googleapis.com/earlyaccess/notosanstc.css);
body
{
	color: #FFFFFF;
	background-color: #333;
	font-family: 'Noto Sans TC', sans-serif;
	font-size: 3em; 
}
body,td,th
{
	font-family: 'Noto Sans TC', sans-serif;
}
}	
</style>
<?php session_start(); ?>
<body>
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="m-auto">
					<?php 
					include('connect.php');//連結資料庫
					header("Content-Type: text/html; charset=utf8");
					if(!isset($_POST['submit'])){
					exit("錯誤執行");
					}//判斷是否有submit操作
					$id = htmlspecialchars($_GET["id"]);
					$commenter = $_SESSION["login"];
					$textarea  = htmlspecialchars($_POST['textarea']);//post獲取表單裡的name

					if($textarea == "")
					{
						echo "請輸入回覆內容！";
						echo "
						<script>
						setTimeout(function(){window.location.href='comments_post.php';},3000);
						</script>
						";//如果錯誤使用js 1秒後跳轉到登入頁面
					}
					else
					{
						$statement = $con->prepare("Select COUNT(*) From comments Where post_id = ?");
						$statement ->execute(array($id));
						$result = $statement->fetch(PDO::FETCH_ASSOC);
						$id_count = $result["COUNT(*)"] + 1;

						$statement = $con->prepare("Insert Into comments(post_id,id,text,commenter) Values (?,?,?,?)");
						$statement->execute(array($id,$id_count,$textarea,$commenter));

						$statement2 = $con->prepare("UPDATE comments SET text = REPLACE(text, '\n', '<br>')");
						$statement2->execute();

						echo "回覆成功！";
						echo "\n\r";
						echo "id=";
						echo $id_count;

						echo "
						<script>
						setTimeout(function(){window.location.href='post_text.php?id=$id';},1000);
						</script>
						";//如果錯誤使用js 1秒後跳轉到登入頁面
					}
					?>
			</div>
		</div>
	</div>
</div>
</body>
</html>
