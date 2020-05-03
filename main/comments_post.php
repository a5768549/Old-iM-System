<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<SCRIPT LANGUAGE="JavaScript">

<!-- Begin
maxLen = 500; // 字數頂限

function checkMaxInput(form) {
if (form.textarea.value.length > maxLen) // if too long.... trim it!
form.textarea.value = form.textarea.value.substring(0, maxLen);
// otherwise, update 'characters left' counter
else form.remLen.value = maxLen - form.textarea.value.length;
}
//  End -->
</script>
<? 
if(!isset($_SESSION["login"]))
{
	header("location: ../logout.php");
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>評論</title>
<style type="text/css">
@import url(https://fonts.googleapis.com/earlyaccess/notosanstc.css);
body {
	background-image: url(../image/background.png);
	font-family: ‘Noto Sans TC’, sans-serif;
}
#apDiv1 {
	position: absolute;
	left: 170px;
	top: 144px;
	width: 820px;
	height: 414px;
	z-index: 1;
	border: thin solid #CCC;
}
#apDiv2 {
	position: absolute;
	left: 739px;
	top: 572px;
	width: 222px;
	height: 190px;
	z-index: 2;
	border: thin solid #CCC;
}
#apDiv3 {
	position: absolute;
	left: 1047px;
	top: 576px;
	width: 207px;
	height: 196px;
	z-index: 3;
	border: thin solid #CCC;
}
#apDiv4 {
	position: absolute;
	left: 75px;
	top: 28px;
	width: 71px;
	height: 117px;
	z-index: 4;
	border: thin none #CCC;
	font-size: 100px;
	color: #FFF;
}
#apDiv5 {
	position: absolute;
	left: 170px;
	top: 577px;
	width: 820px;
	height: 51px;
	z-index: 5;
	font-size: 10px;
	color: #FFF;
	border: thin solid #CCC;
	text-align: center;
}
#apDiv6 {
	position: absolute;
	left: 21px;
	top: 12px;
	width: 134px;
	height: 114px;
	z-index: 6;
}
#apDiv7 {
	position: absolute;
	left: 437px;
	top: 67px;
	width: 818px;
	height: 65px;
	z-index: 7;
	border: thin solid #CCC;
	font-size: 36px;
	color: #FFF;
}
#apDiv8 {
	position: absolute;
	left: 111px;
	top: 6px;
	width: 706px;
	height: 45px;
	z-index: 8;
}
#apDiv8 {
	color: #FFF;
}
#apDiv8 {
	font-size: 36px;
}

html {
            height: 100%;
			
      }

body {
	background-image: url(../image/background.jpg);
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-position: center;
	background-size: cover;
	@import url(//fonts.googleapis.com/earlyaccess/notosanstc.css);
	font-family: 'Noto Sans TC', sans-serif;
     }
#apDiv9 {	position: absolute;
	left: 266px;
	top: 1px;
	width: 1136px;
	height: 1131px;
	z-index: 1;
	background-color: rgba(255,255,255,0.2);
}
#apDiv12 {
	position: absolute;
	left: 274px;
	top: 14px;
	width: 1121px;
	height: 43px;
	z-index: 8;
	text-align: center;
	font-size: 36px;
	color: #FFF;
	background-color: rgba(255,255,255,0.3);
}
#apDiv10 {
	position: absolute;
	left: 436px;
	top: 572px;
	width: 203px;
	height: 192px;
	z-index: 2;
	border: thin solid #CCC;
}
#apDiv11 {	position: absolute;
	left: 439px;
	top: 568px;
	width: 222px;
	height: 190px;
	z-index: 2;
	border: thin solid #CCC;
	text-align: center;
}
#apDiv13 {	position: absolute;
	left: 179px;
	top: 578px;
	width: 203px;
	height: 192px;
	z-index: 2;
	border: thin solid #CCC;
}
#apDiv14 {	position: absolute;
	left: 179px;
	top: 578px;
	width: 203px;
	height: 192px;
	z-index: 2;
	border: thin solid #CCC;
}
#apDiv15 {	position: absolute;
	left: 523px;
	top: 602px;
	width: 60px;
	height: 120px;
	z-index: 7;
	font-size: 100px;
	color: #FFF;
}
#apDiv16 {
	position: absolute;
	left: 826px;
	top: 600px;
	width: 78px;
	height: 121px;
	z-index: 8;
	font-size: 100px;
	color: #FFF;
}
#apDiv17 {
	position: absolute;
	left: 1128px;
	top: 599px;
	width: 85px;
	height: 110px;
	z-index: 9;
	font-size: 100px;
	color: #FFF;
}
#apDiv18 {
	position: absolute;
	left: 453px;
	top: 74px;
	width: 91px;
	height: 45px;
	z-index: 10;
	font-size: 36px;
	color: #FFF;
}
</style>
</head>
<?
$id = $_GET["id"];
include('connect.php');//連結資料

$statement = $con->prepare("SELECT title FROM article WHERE ID = ?");
$statement->execute(array($id));
$result = $statement->fetch(PDO::FETCH_ASSOC);
$title = $result["title"];

?>
<body>
<div id="apDiv18">TO：</div>

<div id="apDiv7" style="border-radius: 10px;">
    <div id="apDiv8"><? echo $title ?></div>
</div>
<div id="apDiv12">＜REPLY CREATE＞</div>
<form id="form1" name="form1" method="post" action="comments_post_upload.php?id=<? echo $id ?>">

<div id="apDiv9">
  
  <div id="apDiv1" style="border-radius: 10px;">
    <label for="textarea"></label>
    <textarea name="textarea" id="textarea" required cols="110" rows="24" wrap=physical
onKeyDown="checkMaxInput(this.form)" onKeyUp="checkMaxInput(this.form)"
style="width:820px;height:414px;background-color:rgba(0,0,0,0);color:#FFF;font-size:24px;border-style:none;border-radius: 10px;"></textarea>
  </div>
  
  <div id="apDiv5" style = "border-radius: 10px;border: thin solid #CCC; background-color: rgba(255,255,255,0.3);">
    <input type="submit" name="submit" value="  POST" style="width:820px;height:50px;border-style:none;border-radius: 5px;background:rgba(255,255,255,0);text-align:left;color:#FFF;font-size:35px;">
</div>
</div>
</form>
<div id="apDiv6">
	<input type="button" class="btn" 
	style="
    width: 100px;
    height: 100px;
    background-image:url(../image/return.jpg);
    border-radius:50%;
    border:2px blue none;"
    onclick="location.href='main.php'"/>
</div>
</div>
</body>
</html>