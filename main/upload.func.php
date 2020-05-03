<title>upload.func</title>

<?php
function uploadFile($fileInfo)
{
	$target_dir = "../postupload/";

	$ext = pathinfo($fileInfo['name'], PATHINFO_EXTENSION); 
	$uniName = md5(uniqid(microtime(true), true)) . '.' . $ext;

	$target_file = $target_dir . basename($uniName);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image

    if ($fileInfo['error'] == 4) 
	{
		return "no file";
	}
	if(isset($_POST["submit"])) 
	{
		$check = getimagesize($fileInfo["tmp_name"]);
		if($check !== false) 
		{
			$uploadOk = 1;
		} 
		else 
		{
			echo "此檔案不是圖片！";
			$uploadOk = 0;
		}
	}
	if (file_exists($target_file)) 
	{
		echo "圖片上傳不成功";
		$uploadOk = 0;
	}
	// Check file size
	if ($fileInfo["size"] > 5000000) 
	{
		echo "圖片太大";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
	{
		echo "只有 JPG, JPEG, PNG 和 GIF 可以上傳。";
		$uploadOk = 0;
	}
	if ($uploadOk == 0) 
	{
		echo "您的圖片並未上傳";
		return "Error!";
	} 
	else 
	{
		if (move_uploaded_file($fileInfo["tmp_name"], $target_file)) 
		{
			return $target_file;
		} 
		else
		{
			echo "上傳失敗！";
			return "Error!";
		}
	}
}
?>