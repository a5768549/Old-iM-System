<?php
function uploadFile($fileInfo)
{
	$target_dir = "../upload/";

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

    $check = getimagesize($fileInfo["tmp_name"]);
	if($check !== false) 
    {
        $uploadOk = 1;
    } 
    else 
    {
        //此檔案不是圖片
        $uploadOk = 0;
        return "code 1";
    }

	if (file_exists($target_file)) 
	{
		//路徑重複
		$uploadOk = 0;
        return "code 2";
	}
	if ($fileInfo["size"] > 5000000) 
	{
		//圖片太大(5MB)
		$uploadOk = 0;
        return "code 3";
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
	{
		//錯誤附檔名(JPG JPEG PNG GIF)
		$uploadOk = 0;
        return "code 4";
	}
	if ($uploadOk == 0) 
	{
		//圖片未上傳
        return "code 5";
	} 
	else 
	{
		if (move_uploaded_file($fileInfo["tmp_name"], $target_file)) 
		{
			return $target_file;
		} 
		else
		{
			//上傳失敗
            return "code 6";
		}
	}
}
?>