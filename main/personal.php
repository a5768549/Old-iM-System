<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>個人資料</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<script type="text/javascript" language="javascript">
function checkfile(sender) {

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

<style type="text/css">
@import url(//fonts.googleapis.com/earlyaccess/notosanstc.css);
html 
{
	height: 100%;
}
body 
{
	background-image: url(../image/background.jpg);
    background-repeat: no-repeat;
	background-attachment: fixed;
	background-position: center;
	background-size: cover;
	font-family: 'Noto Sans TC', '微軟正黑體', sans-serif;
	padding-bottom: 70px;
}
.img
{
	border-radius: 50%;
	border:1px white solid;
	<? 
	if($_SESSION["login"] == "C2PAFF")
	{echo "border:2px #59BD9C solid";}
	
	if($_SESSION["login"] == "C2NEKO")
	{echo "border:2px #D693B5 solid";}
	
	if($_SESSION["login"] == "C2ROBO")
	{echo "border:2px #82B4C5 solid";}
	
	if($_SESSION["login"] == "C2Ivy")
	{echo "border:2px #55555D solid";}
	
	if($_SESSION["login"] == "C2Xenon")
	{echo "border:2px #BB4646 solid";}
	
	if($_SESSION["login"] == "C2ConneR")
	{echo "border:2px #9F6932 solid";}
	
	if($_SESSION["login"] == "C2Cherry")
	{echo "border:2px #7E434F solid";}
	
	if($_SESSION["login"] == "C2JOE")
	{echo "border:2px #623873 solid";}
	
	if($_SESSION["login"] == "C2Nora")
	{echo "border:2px #82878D solid";}
	?>
	width: 25vmin;
	height: 25vmin;
}
.padding
{
	padding-top:1em;
}
.font_style
{
	font-size: 5vmin;
	color: #FFF;
}
.main_margin
{
	padding-top:50em;
}
.center
{
	center-block;
}
.nav_button
{
	width: 12vmin;
	height: 12vmin;
	border-radius:50%;
	border:none;
}
.img_border
{
	border:none;
	width: 12vmin;
	height: 12vmin;
	border-radius: 50%;
}
.upload_style
{
	border: thin solid #FFF;
	border-radius: 10px;
	color: #FFF;
	font-size: 2vmin;
}
.upload_btn
{
	background-color:rgba(0,0,0,0);
	color:#FFF;
	border-style:none;
	font-size:2vmin;
}
</style>
</head>

<?php
include('connect.php');//連結資料
$name = $_SESSION["login"];
$statement = $con->prepare("SELECT * FROM member WHERE account = ?");
$statement->execute(array($name));
$result = $statement->fetch(PDO::FETCH_ASSOC);
?>
<html>
	<body>

		<div class="container padding">
			<div class="row mx-auto">
			<div class="col"></div>
			<div class="col" align="center"><img class="center mx-auto img" src="<?php echo $result["photo"] ?>" name="picture" id="picture" /></div>
			<div class="col"></div>
			</div>
			<form action="picture.php" method="post" enctype="multipart/form-data" onSubmit="return InputCheck(this)">
				<div class="row">
					<div class="col-2 mx-auto" align="center"></div>
					<div class="col-8 mx-auto" align="center">
						<div class="row upload_style">
							<div class="col-8 mx-auto " align="center">
								<span style="text-align: center">圖片：</span>
								<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
								<input type="file" name="file" id="file" accept="image/*" onchange="checkfile(this);">
							</div>
							<div class="col-4 mx-auto" align="center">
								<button type="submit" id="submit" class="upload_btn">選擇圖像</button>
							</div>
						</div>
					</div>
					<div class="col-2 mx-auto" align="center"></div>
				</div>
			</form>
			<div class="row font_style">
				<div class="row mx-auto">帳號：<?php echo $name ?></div>
			</div>
			<div class="row font_style">
				<div class="row mx-auto">暱稱：<?php echo $result["name"] ?></div>
			</div>
			<div class="row font_style">
				<div class="row mx-auto">Email：</div>
			</div>
			<div class="row font_style">
				<div class="row mx-auto"><?php echo $result["email"] ?></div>
			</div>
			
			<div class="row mx-auto">
				<div class="col mx-auto" align="center">
					<button type="button" class="btn nav_button" onclick="location.href='change_page.php'"/><img class="img_border" src="../image/update.png"></button>
				</div>
				<div class="col mx-auto" align="center">
					<button type="button" class="btn nav_button"  onclick="location.href='main.php'"/><img class="img_border" src="../image/back.jpg"></button>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>
