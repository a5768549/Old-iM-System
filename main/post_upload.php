<?php session_start(); ?>
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
</style>
<div class="container-fluid">
		<div class="row align-items-center">
			<div class="m-auto">
			<?php 
				header("Content-Type: text/html; charset=utf8");

				if(!isset($_SESSION["login"]))
				{
					exit("錯誤執行");
				}

				$poster=$_SESSION["login"];
				$textarea=htmlspecialchars($_POST['textarea']);
				$title=htmlspecialchars($_POST['title']);
				$like_num=0;

				include('connect.php');
				if($title == "")
				{
					echo "請輸入標題及文章內容！";
					echo "
					<script>
					setTimeout(function(){window.location.href='post.php';},3000);
					</script>
					";//如果錯誤使用js 1秒後跳轉到登入頁面
				}
				else
				{
					// 封裝好的單一 PHP 檔案上傳 function
					include_once 'upload.func.php';
					// 取得 HTTP 文件上傳變數
					$fileInfo = $_FILES['file'];
					// 呼叫封將好的 function
					$newName = uploadFile($fileInfo);
					
					if($newName != "no file")
					{
						if($newName == "Error!")
						{
							echo "檔案上傳失敗！";
							
							echo "
							<script>
							setTimeout(function(){window.location.href='post.php';},3000);
							</script>
							";//如果錯誤使用js 1秒後跳轉到登入頁面
						}
						else
						{
							$statement = $con->prepare("Insert Into article(poster,title,text,like_num) Values (?,?,?,?)");
							$statement ->execute(array($poster,$title,$textarea,$like_num));

							$statement = $con->prepare("UPDATE article SET text = REPLACE(text, '\n', '<br>')");
							$statement ->execute();

							$statement = $con->prepare("SELECT LAST_INSERT_ID()");
							$statement ->execute();
							$result = $statement->fetch();
							
							$statement = $con->prepare("UPDATE article SET photo = ? WHERE ID = ?");
							$statement ->execute(array($newName,$result[0]));
							
							echo "發文成功！";
							echo "<br>";
							echo "文章代碼為：";
							echo $result[0];
							echo "
								<script>
								setTimeout(function(){window.location.href='main.php';},1000);
								</script>
								";//如果錯誤使用js 1秒後跳轉到登入頁面
							
						}
					}
					else
					{
						$statement = $con->prepare("Insert Into article(poster,title,text,like_num) Values (?,?,?,?)");
						$statement ->execute(array($poster,$title,$textarea,$like_num));

						$statement = $con->prepare("UPDATE article SET text = REPLACE(text, '\n', '<br>')");
						$statement ->execute();

						$statement = $con->prepare("SELECT LAST_INSERT_ID()");
						$statement ->execute();
						$result = $statement->fetch();
						echo "發文成功！";
						echo "<br>";
						echo "文章代碼為：";
						echo $result[0];
						echo "
							<script>
							setTimeout(function(){window.location.href='main.php';},1000);
							</script>
							";//如果錯誤使用js 1秒後跳轉到登入頁面
					}
				}
				?>
			</div>
		</div>
</div>