<?php session_start(); ?>
<style type="text/css">
body {
	@import url(//fonts.googleapis.com/earlyaccess/notosanstc.css);
	font-family: 'Noto Sans TC', sans-serif;
	background-color: #333;
     }
#apDiv1 {
	position: absolute;
	left: 436px;
	top: 308px;
	width: 847px;
	height: 382px;
	z-index: 1;
	font-size: 48px;
	text-align: center;
	color: #FFF;
}
body,td,th {
	font-family: "Noto Sans TC", sans-serif;
}
</style>
<div id="apDiv1">

<?php
        $name = $_SESSION["login"];
		include('connect.php');
		include_once 'upload.photo.php';

		$fileInfo = $_FILES['file'];

		$newName = uploadFile($fileInfo);

            //設定檔案上傳路徑，選擇指定資料夾
		if($newName != "no file")
		{
			if($newName == "Error!")
			{
				echo "檔案上傳失敗！";

				echo "
					<script>
					setTimeout(function(){window.location.href='personal.php';},3000);
					</script>
					";//如果錯誤使用js 1秒後跳轉到登入頁面
			}
			else
			{
				$statement = $con->prepare("UPDATE member SET photo = ? WHERE account = ?");
				$statement ->execute(array($newName,$name));
				echo "已成功更換！";
				echo "
					<script>
					setTimeout(function(){window.location.href='personal.php';},3000);
					</script>
					";//如果錯誤使用js 1秒後跳轉到登入頁面
			}
		}
		else
		{
			echo "檔案上傳失敗！";

				echo "
					<script>
					setTimeout(function(){window.location.href='personal.php';},3000);
					</script>
					";//如果錯誤使用js 1秒後跳轉到登入頁面
		}
?>
</div>