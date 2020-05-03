<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iM</title>
<style type="text/css">
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
}
#apDiv1 
{
	position: absolute;
	left: 20px;
	top: 6px;
	width: 102px;
	height: 94px;
	z-index: 1;
	font-size: 96px;
	font-weight: bold;
	color: #FFF;
}
#apDiv2 
{
	position: absolute;
	width: 200px;
	height: 115px;
	z-index: 2;
	left: 234px;
	top: 274px;
}
#apDiv3 
{
	position: absolute;
	left: 4px;
	top: 688px;
	width: 121px;
	height: 110px;
	z-index: 2;
	font-size: 96px;
	font-weight: bold;
	color: #FFF;
}
.btn 
{
	background-color: #FFF;
}
#apDiv4 
{
	position: absolute;
	left: 6px;
	top: 6px;
	width: 123px;
	height: 109px;
	z-index: 3;
}
#apDiv5 
{
	position: absolute;
	left: 1502px;
	top: 5px;
	width: 122px;
	height: 105px;
	z-index: 4;
}
#apDiv6 
{
	position: absolute;
	left: 12px;
	top: 128px;
	width: 216px;
	height: 88px;
	z-index: 5;
	color: #FFF;
}
#apDiv7 
{
	position: absolute;
	left: 1495px;
	top: 124px;
	width: 136px;
	height: 90px;
	z-index: 6;
	color: #FFF;
}
#apDiv8 
{
	position: absolute;
	left: 26px;
	top: 635px;
	width: 241px;
	height: 92px;
	z-index: 7;
	color: #FFF;
}
#apDiv9 
{
	position: absolute;
	left: 211px;
	top: 29px;
	width: 1251px;
	height: 1572px;
	z-index: 8;
}
#apDiv10 
{
	position: absolute;
	left: 294px;
	top: 356px;
	width: 114px;
	height: 103px;
	z-index: 9;
}
#apDiv11 
{
	position: absolute;
	left: 295px;
	top: 473px;
	width: 112px;
	height: 29px;
	z-index: 10;
	font-weight: bold;
	color: #FFF;
}
#apDiv12 
{
	position: absolute;
	left: 425px;
	top: 359px;
	width: 994px;
	height: 69px;
	z-index: 11;
	font-weight: bold;
	color: #FFF;
	font-size: 48px;
}
#apDiv13 
{
	position: absolute;
	left: 423px;
	top: 460px;
	width: 996px;
	height: 154px;
	z-index: 12;
	font-weight: bold;
	color: #FFF;
}
#apDiv11 
{
	text-align: center;
}
#apDiv14 
{
	position: absolute;
	left: 424px;
	top: 45px;
	width: 999px;
	height: 71px;
	z-index: 13;
	font-weight: bold;
	color: #FFF;
	font-size: 48px;
}
#apDiv15 
{
	position: absolute;
	left: 423px;
	top: 127px;
	width: 999px;
	height: 213px;
	z-index: 14;
	font-weight: bold;
	color: #FFF;
}
#apDiv16 
{
	position: absolute;
	left: 299px;
	top: 45px;
	width: 117px;
	height: 105px;
	z-index: 15;
	font-weight: bold;
	color: #FFF;
}
#apDiv16 img 
{
	border-radius: 50%;
	border: 1px solid rgba(255,255,255,1.00);
}
#apDiv10 img {
	border-radius: 50%;
	border: 1px solid rgba(255,255,255,1.00);
}
#apDiv17 
{
	position: absolute;
	left: 294px;
	top: 160px;
	width: 121px;
	height: 43px;
	z-index: 16;
	font-weight: bold;
	color: #FFF;
}

#apDiv 
{
	position: absolute;
	left: 473px;
	top: 559px;
	width: 962px;
	height: 413px;
	z-index: 8;
}
</style>
</head>

<body>

<? 
if(!isset($_SESSION["login"]))
{
	header("location: ./main.php");
}
$count = 0;
if($_GET["count"] != "")
{
$count = $_GET["count"];
}
?>

<div id="apDiv4">
	<input type="button" class="btn" 
    style="
    width: 100px;
    height: 100px;
    background-image:url(../image/pro.jpg);
    border-radius:50%;
    border:2px blue none;" 
    onclick="location.href='personal.php'"/>
</div>

<div id="apDiv3">
	<input type="button" class="btn"
    style="
    width: 100px;
    height: 100px;
    background-image:url(../image/post.png);
    border-radius:50%;
    border:2px blue none;"
    onclick="location.href='post.php'"/>
</div>

<div id="apDiv5">
	<input type="button" class="btn"
    style="
    width: 100px;
    height: 100px;
    background-image:url(../image/logout.jpg);
    border-radius:50%;
    border:2px blue none;"
    onclick="location.href='../logout.php'"/>
</div>



<div id="apDiv9">
  <iframe frameborder="0" width="100%" height="90%" 
  src="post_display.php?count=<? echo $count?>"></iframe>
</div>
</body>
</html>