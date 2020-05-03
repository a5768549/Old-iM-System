<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
maxLen = 1000; // 字數頂限

function checkMaxInput(form)
{
if (form.textarea.value.length > maxLen) // if too long.... trim it!
form.textarea.value = form.textarea.value.substring(0, maxLen);
// otherwise, update 'characters left' counter
else form.remLen.value = maxLen - form.textarea.value.length;
}
//  End -->
</script>

<script type="text/javascript" language="javascript">
function checkfile(sender)
{
  // 可接受的附檔名
  var validExts = new Array(".jpg", ".png", ".gif");

  var fileExt = sender.value;
  fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
  if (validExts.indexOf(fileExt) < 0) {
    alert("檔案類型錯誤，可接受的副檔名有：" + validExts.toString());
    sender.value = null;
    return false;
  }
  else return true;
}
</script>

<? 
if(!isset($_SESSION["login"]))
{
	header("location: ../logout.php");
}
$count = 0;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>post</title>
<style type="text/css">
@import url(//fonts.googleapis.com/earlyaccess/notosanstc.css);
		html
		{
			width:1920px;
		}
		body 
		{
			background:url(../image/background.jpg) no-repeat fixed;
			background-position: center;
			background-size: cover;
			font-family: 'Noto Sans TC', '微軟正黑體', sans-serif;
			color: #FFF;
			height:100%;
			width:100%;
		}
		.font
		{
			text-align: center;
			display: block;
		}
		.font_style
		{
			font-size: 2em;
			color: #FFF;
			line-height:2em;
		}
		.padding
		{
			padding-top:1em;
		}
		.padding_down
		{
			padding-bottom:1em;
		}
		.white_style
		{
			background: rgba(255,255,255,0.3);
		}
		.main_white_style
		{
			background: rgba(255,255,255,0.2);
		}
		.title_font
		{
			background-color:rgba(0,0,0,0);
			border-style:none;
			font-size:2em;
			color: #FFF;
			width:100%;
		}
		.margin_top
		{
			margin-top:1em;
		}
		.textarea_style
		{
			background-color:rgba(0,0,0,0);
			color:#FFF;
			font-size:24px;
			border-style:none;
		}
		.border_style
		{
			border-radius: 10px;
			border: thin solid #CCC;
		}
		.post_style
		{
			background-color: rgba(255,255,255,0.3);
		}
		.post_btn
		{
			border-style:none;
			border-radius: 5px;
			background:rgba(255,255,255,0);
			text-align:left;
			color:#FFF;
			font-size:35px;
			width:100%;
		}
		textarea
		{
			max-width:50em;
			max-height:20em;
		}
		.height_style
		{
			height:100%;
		}
		.upload
		{
			color: #FFF;
			text-align: center;
			display: block;
			font-size:5em;
		}
		.btn
		{
			width: 6.25em;
			height: 6.25em;
			background-image:url(../image/return.jpg);
			border:none;
			border-radius:50%;
		}
</style>
</head>

<body>

<form id="form1" name="form1" method="post" action="post_upload.php" enctype="multipart/form-data" onSubmit="return InputCheck(this)">
	<div class="container-fluid">
		<div class="row">
			<div class="col-2">
			<div class="row padding">
				<input type="button" class="btn" onclick="location.href='main.php'"/></div>
			</div>
			<div class="col-8 main_white_style padding">
				<div class="row mx-auto font font_style white_style">＜POST CREATE＞</div>
				
				<div class="row mx-auto">
					<div class="col-1"></div>
					<div class="col-10 margin_top">
						<div class="row mx-auto title_style border_style">
							<label for="textfield"></label>
							<input class = "title_font" name="title" type="text" required id="title" maxlength="20"/>
						</div>
						<div class="row mx-auto margin_top border_style">
							<label for="textarea"></label>
							<textarea name="textarea" class = "textarea_style" id="textarea" required cols="100" rows="24" wrap="hard" onKeyDown="checkMaxInput(this.form)" onKeyUp="checkMaxInput(this.form)"></textarea>
						</div>
						<div class="row mx-auto margin_top border_style">
							<label class="mx-auto upload">+
								<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
								<input type="file" name="file" id="file" style="display:none;" accept="image/*" value = "+" onchange="checkfile(this);">
							</label>
						</div>
						<div class="row mx-auto margin_top post_style border_style">
							<input type="submit" class = "post_btn" name="submit" value="  POST" style="">
						</div>
						<div class="row mx-auto margin_top">
						</div>
					</div>
					<div class="col-1"></div>
				</div>
			</div>
			<div class="col-2"></div>
		<div>
	</div>
</form>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>