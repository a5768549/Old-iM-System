<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<?php
include('connect.php');//連結資料
$count = $_GET["count"];

$statement = $con->prepare("SELECT COUNT(ID) FROM article");
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);

$check = (int)$result["COUNT(ID)"];;
$id = (int)$result["COUNT(ID)"];;
$id = $check + $count;

$id_array = array();
$poster   = array();
$title    = array();
$photo    = array();
$name     = array();
$like_num = array();

for($i=0;$i<10;$i++)
{
	$statement2 = $con->prepare("SELECT * FROM article WHERE ID = ?");
	$statement2 ->execute(array($id-$i));
	$result2 = $statement2->fetch(PDO::FETCH_ASSOC);
	
	$statement3 = $con->prepare("SELECT * FROM member WHERE account = ?");
	$statement3 ->execute(array($result2["poster"]));
	$result3 = $statement3->fetch(PDO::FETCH_ASSOC);
	
	array_push($id_array ,$id-$i);
	array_push($poster   ,$result2["poster"]);
	array_push($title    ,$result2["title"]);
	array_push($photo    ,$result3["photo"]);
	array_push($name     ,$result3["name"]);
	array_push($like_num ,$result2["like_num"]);
}

$special_Account = array("C2PAFF","C2NEKO","C2ROBO","C2Ivy","C2Xenon","C2ConneR","C2Cherry","C2JOE","C2Nora");
$special_color = array(
						"border:2px #59BD9C solid;",
						"border:2px #D693B5 solid;",
						"border:2px #82B4C5 solid;",
						"border:2px #55555D solid;",
						"border:2px #BB4646 solid;",
						"border:2px #9F6932 solid;",
						"border:2px #7E434F solid;",
						"border:2px #623873 solid;",
						"border:2px #82878D solid;");
						
						
?>
<style type="text/css">
@import url(//fonts.googleapis.com/earlyaccess/notosanstc.css);
#apDiv1 {
	position: absolute;
	left: 15px;
	top: 5px;
	width: 1200px;
	height: 100px;
	z-index: 1;
}
#apDiv2 {
	position: absolute;
	left: 15px;
	top: 115px;
	width: 1200px;
	height: 100px;
	z-index: 1;
}
img {
	border-radius: 50%;
	border:1px white solid;
	text-align: left;
}
#apDiv3 {
	position: absolute;
	left: 15px;
	top: 225px;
	width: 1200px;
	height: 100px;
	z-index: 1;
}
#apDiv4 {
	position: absolute;
	left: 15px;
	top: 335px;
	width: 1200px;
	height: 100px;
	z-index: 1;
}
#apDiv5 {
	position: absolute;
	left: 15px;
	top: 445px;
	width: 1200px;
	height: 100px;
	z-index: 1;
}
#apDiv6 {
	position: absolute;
	left: 15px;
	top: 555px;
	width: 1200px;
	height: 100px;
	z-index: 1;
}
#apDiv7 {
	position: absolute;
	left: 15px;
	top: 665px;
	width: 1200px;
	height: 100px;
	z-index: 1;
}
#apDiv8 {
	position: absolute;
	left: 15px;
	top: 775px;
	width: 1200px;
	height: 100px;
	z-index: 1;
}
#apDiv9 {
	position: absolute;
	left: 15px;
	top: 885px;
	width: 1200px;
	height: 100px;
	z-index: 1;
}
#apDiv10 {
	position: absolute;
	left: 15px;
	top: 995px;
	width: 1200px;
	height: 100px;
	z-index: 1;
}
#apDiv11 {
	position: absolute;
	left: 17px;
	top: 82px;
	width: 90px;
	height: 20px;
	z-index: 2;
}
#apDiv12 {
	position: absolute;
	left: 2px;
	top: 79px;
	width: 90px;
	height: 20px;
	z-index: 2;
}
#apDiv13 {
	position: absolute;
	left: 2px;
	top: 79px;
	width: 90px;
	height: 20px;
	z-index: 2;
}
#apDiv14 {
	position: absolute;
	left: 2px;
	top: 79px;
	width: 90px;
	height: 20px;
	z-index: 2;
}
#apDiv15 {
	position: absolute;
	left: 2px;
	top: 79px;
	width: 90px;
	height: 20px;
	z-index: 2;
}
#apDiv16 {
	position: absolute;
	left: 2px;
	top: 79px;
	width: 90px;
	height: 20px;
	z-index: 2;
}
#apDiv17 {
	position: absolute;
	left: 2px;
	top: 79px;
	width: 90px;
	height: 20px;
	z-index: 11;
}
#apDiv18 {
	position: absolute;
	left: 2px;
	top: 79px;
	width: 90px;
	height: 20px;
	z-index: 11;
}
#apDiv19 {
	position: absolute;
	left: 2px;
	top: 79px;
	width: 90px;
	height: 20px;
	z-index: 2;
}
#apDiv20 {
	position: absolute;
	left: 2px;
	top: 79px;
	width: 90px;
	height: 20px;
	z-index: 2;
}
#apDiv21 {
	position: absolute;
	left: 110px;
	top: 10px;
	width: 1100px;
	height: 90px;
	z-index: 2;
	background: rgba(255,255,255,0.2);
}
#apDiv22 {
	position: absolute;
	left: 95px;
	top: 5px;
	width: 1100px;
	height: 90px;
	z-index: 2;
	background: rgba(255,255,255,0.2);
}
#apDiv23 {
	position: absolute;
	left: 95px;
	top: 5px;
	width: 1100px;
	height: 90px;
	z-index: 2;
	background: rgba(255,255,255,0.2);
}
#apDiv24 {
	position: absolute;
	left: 95px;
	top: 5px;
	width: 1100px;
	height: 90px;
	z-index: 2;
	background: rgba(255,255,255,0.2);
}
#apDiv25 {
	position: absolute;
	left: 95px;
	top: 5px;
	width: 1100px;
	height: 90px;
	z-index: 2;
	background: rgba(255,255,255,0.2);
}
#apDiv26 {
	position: absolute;
	left: 95px;
	top: 5px;
	width: 1100px;
	height: 90px;
	z-index: 2;
	background: rgba(255,255,255,0.2);
}
#apDiv27 {
	position: absolute;
	left: 95px;
	top: 5px;
	width: 1100px;
	height: 90px;
	z-index: 2;
	background: rgba(255,255,255,0.2);
}
#apDiv28 {
	position: absolute;
	left: 95px;
	top: 4px;
	width: 1100px;
	height: 90px;
	z-index: 2;
	background: rgba(255,255,255,0.2);
}
#apDiv29 {
	position: absolute;
	left: 95px;
	top: 5px;
	width: 1100px;
	height: 90px;
	z-index: 2;
	background: rgba(255,255,255,0.2);
}
#apDiv30 {
	position: absolute;
	left: 95px;
	top: 5px;
	width: 1100px;
	height: 90px;
	z-index: 2;
	background: rgba(255,255,255,0.2);
}
#apDiv31 {
	position: absolute;
	left: 1145px;
	top: 40px;
	width: 60px;
	height: 25px;
	z-index: 3;
	text-align: left;
	color: #6FF;
}
#apDiv32 {
	position: absolute;
	left: 1128px;
	top: 36px;
	width: 60px;
	height: 25px;
	z-index: 3;
	text-align: left;
	color: #6FF;
}
#apDiv33 {
	position: absolute;
	left: 1128px;
	top: 40px;
	width: 60px;
	height: 25px;
	z-index: 3;
	text-align: left;
	color: #6FF;
}
#apDiv34 {
	position: absolute;
	left: 1130px;
	top: 36px;
	width: 60px;
	height: 25px;
	z-index: 3;
	text-align: left;
	color: #6FF;
}
#apDiv35 {
	position: absolute;
	left: 1129px;
	top: 35px;
	width: 60px;
	height: 25px;
	z-index: 3;
	text-align: left;
	color: #6FF;
}
#apDiv36 {
	position: absolute;
	left: 1127px;
	top: 37px;
	width: 60px;
	height: 25px;
	z-index: 3;
	text-align: left;
	color: #6FF;
}
#apDiv37 {
	position: absolute;
	left: 1125px;
	top: 35px;
	width: 60px;
	height: 25px;
	z-index: 3;
	text-align: left;
	color: #6FF;
}
#apDiv38 {
	position: absolute;
	left: 1123px;
	top: 39px;
	width: 60px;
	height: 25px;
	z-index: 3;
	text-align: left;
	color: #6FF;
}
#apDiv39 {
	position: absolute;
	left: 1122px;
	top: 39px;
	width: 60px;
	height: 25px;
	z-index: 3;
	text-align: left;
	color: #6FF;
}
#apDiv40 {
	position: absolute;
	left: 1121px;
	top: 36px;
	width: 60px;
	height: 25px;
	z-index: 2;
	text-align: left;
	color: #6FF;
}
#apDiv41 {
	position: absolute;
	left: 1089px;
	top: 27px;
	width: 50px;
	height: 50px;
	z-index: 3;
}
#apDiv42 {
	position: absolute;
	left: 1073px;
	top: 25px;
	width: 50px;
	height: 50px;
	z-index: 3;
}
#apDiv43 {
	position: absolute;
	left: 1074px;
	top: 25px;
	width: 50px;
	height: 50px;
	z-index: 3;
}
#apDiv44 {
	position: absolute;
	left: 1074px;
	top: 24px;
	width: 50px;
	height: 50px;
	z-index: 3;
}
#apDiv45 {
	position: absolute;
	left: 1073px;
	top: 21px;
	width: 50px;
	height: 50px;
	z-index: 3;
}
#apDiv46 {
	position: absolute;
	left: 1070px;
	top: 24px;
	width: 50px;
	height: 50px;
	z-index: 3;
}
#apDiv47 {
	position: absolute;
	left: 1070px;
	top: 24px;
	width: 50px;
	height: 50px;
	z-index: 3;
}
#apDiv48 {
	position: absolute;
	left: 1068px;
	top: 26px;
	width: 50px;
	height: 50px;
	z-index: 3;
}
#apDiv49 {
	position: absolute;
	left: 1065px;
	top: 27px;
	width: 50px;
	height: 50px;
	z-index: 3;
}
#apDiv50 {
	position: absolute;
	left: 1065px;
	top: 23px;
	width: 50px;
	height: 50px;
	z-index: 3;
}
#apDiv {
	text-align: center;
}
#apDiv11 {
	text-align: center;
}
#apDiv2 #apDiv12 {
	text-align: center;
}
#apDiv3 #apDiv13 {
	text-align: center;
}
#apDiv4 #apDiv14 {
	text-align: center;
}
#apDiv5 #apDiv15 {
	text-align: center;
}
#apDiv6 #apDiv16 {
	text-align: center;
}
#apDiv7 #apDiv17 {
	text-align: center;
}
#apDiv8 #apDiv18 {
	text-align: center;
}
#apDiv9 #apDiv19 {
	text-align: center;
}
#apDiv10 #apDiv20 {
	text-align: center;
}
#apDiv11 {
	color: #FFF;
}
#apDiv2 #apDiv12 {
	color: #FFF;
}
#apDiv3 #apDiv13 {
	color: #FFF;
}
#apDiv4 #apDiv14 {
	color: #FFF;
}
#apDiv5 #apDiv15 {
	color: #F00;
}
#apDiv5 #apDiv15 {
	color: #FFF;
}
#apDiv6 #apDiv16 {
	color: #FFF;
}
#apDiv7 #apDiv17 {
	color: #FFF;
}
#apDiv8 #apDiv18 {
	color: #FFF;
}
#apDiv9 #apDiv19 {
	color: #FFF;
}
#apDiv10 #apDiv20 {
	color: #FFF;
}
#apDiv21 {
	font-size: 36px;
}
#apDiv21 {
	color: #FFF;
}
#apDiv2 #apDiv22 {
	font-size: 36px;
}
#apDiv2 #apDiv22 {
	color: #FFF;
}
#apDiv3 #apDiv23 {
	font-size: 36px;
}
#apDiv3 #apDiv23 {
	color: #FFF;
}
#apDiv4 #apDiv24 {
	font-size: 36px;
}
#apDiv4 #apDiv24 {
	color: #FFF;
}
#apDiv5 #apDiv25 {
	font-size: 36px;
}
#apDiv5 #apDiv25 {
	color: #FFF;
}
#apDiv6 #apDiv26 {
	font-size: 36px;
}
#apDiv6 #apDiv26 {
	color: #FFF;
}
#apDiv7 #apDiv27 {
	font-size: 36px;
}
#apDiv7 #apDiv27 {
	color: #FFF;
}
#apDiv8 #apDiv28 {
	font-size: 36px;
}
#apDiv8 #apDiv28 {
	color: #FFF;
}
#apDiv9 #apDiv29 {
	font-size: 36px;
}
#apDiv9 #apDiv29 {
	color: #FFF;
}
#apDiv10 #apDiv30 {
	font-size: 36px;
}
#apDiv10 #apDiv30 {
	color: #FFF;
}
a:link {
	color: #FFF;
	text-decoration: none;
}
a:visited {
	color: #FFF;
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
#apDiv51 {
	position: absolute;
	left: 109px;
	top: 1109px;
	width: 138px;
	height: 59px;
	z-index: 1;
	font-size: 24px;
	color: #FFF;
	font-weight: bold;
}
#apDiv52 {
	position: absolute;
	left: 1070px;
	top: 1103px;
	width: 146px;
	height: 58px;
	z-index: 1;
	text-align: right;
	color: #FFF;
	font-size: 24px;
	font-weight: bold;
}
.btn {	background-color: #FFF;
}
#apDiv53 {
	position: absolute;
	left: 0px;
	top: -20px;
	width: 1100px;
	height: 2px;
	z-index: 17;
}
#apDiv54 {
	position: absolute;
	left: 110px;
	top: 222px;
	width: 1100px;
	height: 2px;
	z-index: 18;
}
html {
            height: 100%;
      }

body {
	background-image: url();
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-position: center;
	background-size: cover;
	font-family: 'Noto Sans TC', '微軟正黑體', sans-serif;
     }
#apDiv11 {
	text-align: left;
}
.sav #apDiv2 #apDiv12 {
	text-align: left;
}
#apDiv3 #apDiv13 {
	text-align: left;
}
#apDiv4 #apDiv14 {
	text-align: left;
}
#apDiv5 #apDiv15 {
	text-align: left;
}
#apDiv6 #apDiv16 {
	text-align: left;
}
#apDiv7 #apDiv17 {
	text-align: left;
}
#apDiv8 #apDiv18 {
	text-align: left;
}
#apDiv9 #apDiv19 {
	text-align: left;
}
#apDiv10 #apDiv20 {
	text-align: left;
}
#apDiv55 {
	position: absolute;
	left: 30px;
	top: 19px;
	width: 60px;
	height: 60px;
	z-index: 2;
}
#apDiv56 {
	position: absolute;
	left: 29px;
	top: 131px;
	width: 60px;
	height: 60px;
	z-index: 2;
}
#apDiv57 {
	position: absolute;
	left: 29px;
	top: 241px;
	width: 60px;
	height: 60px;
	z-index: 2;
}
#apDiv58 {
	position: absolute;
	left: 29px;
	top: 351px;
	width: 60px;
	height: 60px;
	z-index: 2;
}
#apDiv59 {
	position: absolute;
	left: 29px;
	top: 461px;
	width: 60px;
	height: 60px;
	z-index: 2;
}
#apDiv60 {
	position: absolute;
	left: 29px;
	top: 571px;
	width: 60px;
	height: 60px;
	z-index: 2;
}
#apDiv61 {
	position: absolute;
	left: 29px;
	top: 681px;
	width: 60px;
	height: 60px;
	z-index: 2;
}
#apDiv62 {
	position: absolute;
	left: 29px;
	top: 791px;
	width: 60px;
	height: 60px;
	z-index: 2;
}
#apDiv63 {
	position: absolute;
	left: 29px;
	top: 901px;
	width: 60px;
	height: 60px;
	z-index: 2;
}
#apDiv64 {
	position: absolute;
	left: 29px;
	top: 1011px;
	width: 60px;
	height: 60px;
	z-index: 2;
}
#apDiv11 {
	font-size: 12px;
}
.sav #apDiv2 #apDiv12 {
	text-align: center;
}
.sav #apDiv2 #apDiv12 {
	font-size: 12px;
}
#apDiv3 #apDiv13 {
	text-align: center;
}
#apDiv3 #apDiv13 {
	font-size: 12px;
}
#apDiv4 #apDiv14 {
	text-align: center;
}
#apDiv4 #apDiv14 {
	font-size: 12px;
}
#apDiv5 #apDiv15 {
	font-size: 12px;
}
#apDiv5 #apDiv15 {
	text-align: center;
}
#apDiv6 #apDiv16 {
	text-align: center;
}
#apDiv6 #apDiv16 {
	font-size: 12px;
}
#apDiv7 #apDiv17 {
	text-align: center;
}
#apDiv7 #apDiv17 {
	font-size: 12px;
}
#apDiv8 #apDiv18 {
	text-align: center;
}
#apDiv8 #apDiv18 {
	font-size: 12px;
}
#apDiv9 #apDiv19 {
	text-align: center;
}
#apDiv9 #apDiv19 {
	font-size: 12px;
}
#apDiv10 #apDiv20 {
	text-align: center;
}
#apDiv10 #apDiv20 {
	font-size: 12px;
}
#like {
	color: #6FF;
}
#like {
	color: #6FF;
}
#apDiv65 {
	position: absolute;
	left: 130px;
	top: 25px;
	width: 940px;
	height: 50px;
	z-index: 3;
	font-size: 36px;
	color: #FFF;
}
#apDiv66 {
	position: absolute;
	left: 128px;
	top: 140px;
	width: 940px;
	height: 50px;
	z-index: 3;
	color: #FFF;
	font-size: 36px;
}
#apDiv67 {
	position: absolute;
	left: 128px;
	top: 250px;
	width: 940px;
	height: 50px;
	z-index: 3;
	color: #FFF;
	font-size: 36px;
}
#apDiv68 {
	position: absolute;
	left: 128px;
	top: 360px;
	width: 940px;
	height: 50px;
	z-index: 3;
	color: #FFF;
	font-size: 36px;
}
#apDiv69 {
	position: absolute;
	left: 128px;
	top: 470px;
	width: 940px;
	height: 50px;
	z-index: 3;
	color: #FFF;
	font-size: 36px;
}
#apDiv70 {
	position: absolute;
	left: 128px;
	top: 580px;
	width: 940px;
	height: 50px;
	z-index: 3;
	font-size: 36px;
	color: #FFF;
}
#apDiv71 {
	position: absolute;
	left: 128px;
	top: 690px;
	width: 940px;
	height: 50px;
	z-index: 3;
	font-size: 36px;
	color: #FFF;
}
#apDiv72 {
	position: absolute;
	left: 128px;
	top: 800px;
	width: 940px;
	height: 50px;
	z-index: 3;
	font-size: 36px;
	color: #FFF;
}
#apDiv73 {
	position: absolute;
	left: 128px;
	top: 910px;
	width: 940px;
	height: 50px;
	z-index: 3;
	font-size: 36px;
	color: #FFF;
}
#apDiv74 {
	position: absolute;
	left: 128px;
	top: 1020px;
	width: 940px;
	height: 50px;
	z-index: 3;
	font-size: 36px;
	color: #FFF;
}
#title {
	font-size: 36px;
	color: #FFF;
}
#apDiv75 {
	position: absolute;
	left: 110px;
	top: 3px;
	width: 1100px;
	height: 2px;
	z-index: 4;
}
#apDiv76 {
	position: absolute;
	left: 110px;
	top: 332px;
	width: 1100px;
	height: 2px;
	z-index: 4;
}
#apDiv77 {
	position: absolute;
	left: 110px;
	top: 440px;
	width: 1100px;
	height: 2px;
	z-index: 17;
}
#apDiv78 {
	position: absolute;
	left: 110px;
	top: 552px;
	width: 1100px;
	height: 2px;
	z-index: 18;
}
#apDiv79 {
	position: absolute;
	left: 110px;
	top: 661px;
	width: 1100px;
	height: 2px;
	z-index: 4;
}
#apDiv80 {
	position: absolute;
	left: 110px;
	top: 770px;
	width: 1100px;
	height: 2px;
	z-index: 17;
}
#apDiv81 {
	position: absolute;
	left: 110px;
	top: 882px;
	width: 1100px;
	height: 2px;
	z-index: 18;
}
#apDiv82 {
	position: absolute;
	left: 110px;
	top: 990px;
	width: 1100px;
	height: 2px;
	z-index: 4;
}
#apDiv83 {	position: absolute;
	left: 110px;
	top: 770px;
	width: 800px;
	height: 2px;
	z-index: 17;
}
#apDiv84 {	position: absolute;
	left: 110px;
	top: 882px;
	width: 800px;
	height: 2px;
	z-index: 18;
}
body,td,th {
	font-family: "Noto Sans TC", "微軟正黑體", sans-serif;
}
#apDiv85 {
	position: absolute;
	left: 1235px;
	top: 15px;
	width: 174px;
	height: 100px;
	z-index: 19;
}
#apDiv86 {
	position: absolute;
	left: 1245px;
	top: 17px;
	width: 128px;
	height: 77px;
	z-index: 19;
}
#apDiv87 {
	position: absolute;
	left: 606px;
	top: 1105px;
	width: 58px;
	height: 57px;
	z-index: 19;
}
#apDiv88 {
	position: absolute;
	left: 102px;
	top: 3px;
	width: 3px;
	height: 21px;
	z-index: 19;
}
#apDiv89 {
	position: absolute;
	left: 102px;
	top: 110px;
	width: 3px;
	height: 21px;
	z-index: 19;
}
#apDiv90 {
	position: absolute;
	left: 102px;
	top: 222px;
	width: 3px;
	height: 21px;
	z-index: 19;
}
#apDiv91 {
	position: absolute;
	left: 102px;
	top: 332px;
	width: 3px;
	height: 21px;
	z-index: 19;
}
#apDiv92 {
	position: absolute;
	left: 102px;
	top: 440px;
	width: 3px;
	height: 21px;
	z-index: 19;
}
#apDiv93 {
	position: absolute;
	left: 102px;
	top: 552px;
	width: 3px;
	height: 21px;
	z-index: 19;
}
#apDiv94 {
	position: absolute;
	left: 102px;
	top: 661px;
	width: 3px;
	height: 21px;
	z-index: 19;
}
#apDiv95 {
	position: absolute;
	left: 102px;
	top: 770px;
	width: 3px;
	height: 21px;
	z-index: 19;
}
#apDiv96 {
	position: absolute;
	left: 102px;
	top: 882px;
	width: 3px;
	height: 21px;
	z-index: 19;
}
#apDiv97 {
	position: absolute;
	left: 102px;
	top: 990px;
	width: 3px;
	height: 21px;
	z-index: 19;
}
#apDiv98 {
	position: absolute;
	left: 1215px;
	top: 3px;
	width: 3px;
	height: 21px;
	z-index: 19;
}
#apDiv99 {
	position: absolute;
	left: 1215px;
	top: 110px;
	width: 3px;
	height: 21px;
	z-index: 19;
}
#apDiv100 {
	position: absolute;
	left: 1215px;
	top: 440px;
	width: 3px;
	height: 21px;
	z-index: 19;
}
#apDiv101 {
	position: absolute;
	left: 1215px;
	top: 222px;
	width: 3px;
	height: 21px;
	z-index: 19;
}
#apDiv102 {
	position: absolute;
	left: 1215px;
	top: 332px;
	width: 3px;
	height: 21px;
	z-index: 19;
}
#apDiv103 {
	position: absolute;
	left: 1215px;
	top: 552px;
	width: 3px;
	height: 21px;
	z-index: 19;
}
#apDiv104 {
	position: absolute;
	left: 1215px;
	top: 990px;
	width: 3px;
	height: 21px;
	z-index: 19;
}
#apDiv105 {
	position: absolute;
	left: 1215px;
	top: 661px;
	width: 3px;
	height: 21px;
	z-index: 19;
}
#apDiv106 {
	position: absolute;
	left: 1215px;
	top: 770px;
	width: 3px;
	height: 21px;
	z-index: 19;
}
#apDiv107 {
	position: absolute;
	left: 1215px;
	top: 882px;
	width: 3px;
	height: 21px;
	z-index: 19;
}
</style>
</head>



<body>
	<div id="apDiv54"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv76"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv77"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv78"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv79"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv80"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv81"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv82"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv75"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv88"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv89"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv90"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv91"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv92"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv93"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv94"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv95"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv96"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv97"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv98"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv99"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv100"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv101"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv102"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv103"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv104"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv105"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv106"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>
	<div id="apDiv107"><hr style="height: 2px; border: none; background-color: #4dffff"/></div>

<form action="like_post.php" method="post">
	<div id="apDiv51">
 

		<a href="post_display.php?count=
			<? 
				if($count+10 >= 0)
				{
					echo "0";
				}
				else
				{
					echo $count + 10;
				}
			?>
		">上一頁</a>
	</div>
	
	<div id="apDiv52">

		<a href="post_display.php?count=<? echo $count-10?>">下一頁</a>
		
	</div>
	
	<div id="apDiv55"><img src="<?php echo $photo[0] ?>" width="60" height="60" alt="" 
	style = "<? 
		for($i=0;$i<9;$i++)
		{
			if($poster[0] == $special_Account[$i])
			{
				echo $special_color[$i];
			}
		}
		?>"/></div>
		
	<div id="apDiv56"><img src="<?php echo $photo[1] ?>" width="60" height="60" alt="" 
	style = "<? 
		for($i=0;$i<9;$i++)
		{
			if($poster[1] == $special_Account[$i])
			{
				echo $special_color[$i];
			}
		}
		?>"/></div>
		
	<div id="apDiv57"><img src="<?php echo $photo[2] ?>" width="60" height="60" alt="" 
	style="<? 
		for($i=0;$i<9;$i++)
		{
			if($poster[2] == $special_Account[$i])
			{
				echo $special_color[$i];
			}
		}
		?>"/></div>
		
	<div id="apDiv58"><img src="<?php echo $photo[3] ?>" width="60" height="60" alt="" 
	style="<? 
		for($i=0;$i<9;$i++)
		{
			if($poster[3] == $special_Account[$i])
			{
				echo $special_color[$i];
			}
		}
		?>"/></div>
		
	<div id="apDiv59"><img src="<?php echo $photo[4] ?>" width="60" height="60" alt="" 
	style = "<? 
		for($i=0;$i<9;$i++)
		{
			if($poster[4] == $special_Account[$i])
			{
				echo $special_color[$i];
			}
		}
		?>"/></div>
		
	<div id="apDiv60"><img src="<?php echo $photo[5] ?>" width="60" height="60" alt="" 
	style = "<? 
		for($i=0;$i<9;$i++)
		{
			if($poster[5] == $special_Account[$i])
			{
				echo $special_color[$i];
			}
		}
		?>"/></div>
		
	<div id="apDiv61"><img src="<?php echo $photo[6] ?>" width="60" height="60" alt="" 
	style = "<? 
		for($i=0;$i<9;$i++)
		{
			if($poster[6] == $special_Account[$i])
			{
				echo $special_color[$i];
			}
		}
		?>"/></div>
		
	<div id="apDiv62"><img src="<?php echo $photo[7] ?>" width="60" height="60" alt="" 
	style = "<? 
		for($i=0;$i<9;$i++)
		{
			if($poster[7] == $special_Account[$i])
			{
				echo $special_color[$i];
			}
		}
		?>"/></div>
		
	<div id="apDiv63"><img src="<?php echo $photo[8] ?>" width="60" height="60" alt="" 
	style = "<? 
		for($i=0;$i<9;$i++)
		{
			if($poster[8] == $special_Account[$i])
			{
				echo $special_color[$i];
			}
		}
		?>"/></div>
		
	<div id="apDiv64"><img src="<?php echo $photo[9] ?>" width="60" height="60" alt="" 
	style="<? 
		for($i=0;$i<9;$i++)
		{
			if($poster[9] == $special_Account[$i])
			{
				echo $special_color[$i];
			}
		}
		?>"/></div>
		
	<div id="apDiv65"><a href="post_text.php?id=<? echo $id_array[0]?>&count=<? echo $count?>" target="_parent"><?php echo $title[0] ?></a></div>
	<div id="apDiv66"><a href="post_text.php?id=<? echo $id_array[1]?>&count=<? echo $count?>" target="_parent"><?php echo $title[1] ?></a></div>
	<div id="apDiv67"><a href="post_text.php?id=<? echo $id_array[2]?>&count=<? echo $count?>" target="_parent"><?php echo $title[2] ?></a></div>
	<div id="apDiv68"><a href="post_text.php?id=<? echo $id_array[3]?>&count=<? echo $count?>" target="_parent"><?php echo $title[3] ?></a></div>
	<div id="apDiv69"><a href="post_text.php?id=<? echo $id_array[4]?>&count=<? echo $count?>" target="_parent"><?php echo $title[4] ?></a></div>
	<div id="apDiv70"><a href="post_text.php?id=<? echo $id_array[5]?>&count=<? echo $count?>" target="_parent"><?php echo $title[5] ?></a></div>
	<div id="apDiv71"><a href="post_text.php?id=<? echo $id_array[6]?>&count=<? echo $count?>" target="_parent"><?php echo $title[6] ?></a></div>
	<div id="apDiv72"><a href="post_text.php?id=<? echo $id_array[7]?>&count=<? echo $count?>" target="_parent"><?php echo $title[7] ?></a></div>
	<div id="apDiv73"><a href="post_text.php?id=<? echo $id_array[8]?>&count=<? echo $count?>" target="_parent"><?php echo $title[8] ?></a></div>
	<div id="apDiv74"><a href="post_text.php?id=<? echo $id_array[9]?>&count=<? echo $count?>" target="_parent"><?php echo $title[9] ?></a></div>

	<div class="sav"> 
		<a href="post_text.php?id=<?=$id_array[0]?>"></a>
		<div id="apDiv1"></div>
		<div id="apDiv2">
			<div id="apDiv12"><?php echo $name[1] ?></div>
			<div id="apDiv22">
				<div id="apDiv53">
					<hr style="height: 2px; border: none; background-color:#4dffff" />
				</div>
			</div>

			<div id="apDiv32"><? echo $like_num[1] ?></div>
		  
			<div id="apDiv42">
			<input type="submit" name = "like2" class="btn" value="<? echo $id_array[1] ?>"
			style="
			width: 50px;
			height: 50px;
			background-image:url(../image/like.jpg);
			border-radius:50%;
			text-indent:-9999px;
			border:2px blue none;" 
			/>
			</div>
		</div>
	</div>

	<div id="apDiv3">
	  <div id="apDiv13"><?php echo $name[2] ?></div>
	  <div id="apDiv23"></div>
	  <div id="apDiv33"><? echo $like_num[2] ?></div>
	  <div id="apDiv43">
	  <input type="submit" name = "like3" class="btn" value="<? echo $id_array[2] ?>"
		style="
		width: 50px;
		height: 50px;
		background-image:url(../image/like.jpg);
		border-radius:50%;
		text-indent:-9999px;
		border:2px blue none;" 
		/></div>
	</div>

	<div id="apDiv4">
	  <div id="apDiv14"><?php echo $name[3] ?></div>
	  <div id="apDiv24"></div>
	  <div id="apDiv34"><? echo $like_num[3] ?></div>
	  <div id="apDiv44">
	  <input type="submit" name = "like4" class="btn" value="<? echo $id_array[3] ?>"
		style="
		width: 50px;
		height: 50px;
		background-image:url(../image/like.jpg);
		border-radius:50%;
		text-indent:-9999px;
		border:2px blue none;" 
		/>
	  </div>
	</div>

	<div id="apDiv5">
	  <div id="apDiv15"><?php echo $name[4] ?></div>
	  <div id="apDiv25"></div>
	  <div id="apDiv35"><? echo $like_num[4] ?></div>
	  <div id="apDiv45">
	  <input type="submit" name = "like5" class="btn" value="<? echo $id_array[4] ?>"
		style="
		width: 50px;
		height: 50px;
		background-image:url(../image/like.jpg);
		border-radius:50%;
		text-indent:-9999px;
		border:2px blue none;" 
		/>
	  </div>
	</div>

	<div id="apDiv6">
	  <div id="apDiv16"><?php echo $name[5] ?></div>
	  <div id="apDiv26"></div>
	  <div id="apDiv36"><? echo $like_num[5] ?></div>
	  <div id="apDiv46">
	  <input type="submit" name = "like6" class="btn" value="<? echo $id_array[5] ?>"
		style="
		width: 50px;
		height: 50px;
		background-image:url(../image/like.jpg);
		border-radius:50%;
		text-indent:-9999px;
		border:2px blue none;" 
		/>
	  </div>
	</div>

	<div id="apDiv7">
	  <div id="apDiv17"><?php echo $name[6] ?></div>
	  <div id="apDiv27"></div>
	  <div id="apDiv37"><? echo $like_num[6] ?></div>
	  <div id="apDiv47">
	  <input type="submit" name = "like7" class="btn" value="<? echo $id_array[6] ?>"
		style="
		width: 50px;
		height: 50px;
		background-image:url(../image/like.jpg);
		border-radius:50%;
		text-indent:-9999px;
		border:2px blue none;" 
		/>
	  </div>
	</div>

	<div id="apDiv8">
	  <div id="apDiv18"><?php echo $name[7] ?></div>
	  <div id="apDiv28"></div>
	  <div id="apDiv38"><? echo $like_num[7] ?></div>
	  <div id="apDiv48">
	  <input type="submit" name = "like8" class="btn" value="<? echo $id_array[7] ?>"
		style="
		width: 50px;
		height: 50px;
		background-image:url(../image/like.jpg);
		border-radius:50%;
		text-indent:-9999px;
		border:2px blue none;" 
		/>
	  
	  </div>
	</div>

	<div id="apDiv9">
	  <div id="apDiv19"><?php echo $name[8] ?></div>
	  <div id="apDiv29"></div>
	  <div id="apDiv39"><? echo $like_num[8] ?></div>
	  <div id="apDiv49">
	  <input type="submit" name = "like9" class="btn" value="<? echo $id_array[8] ?>"
		style="
		width: 50px;
		height: 50px;
		background-image:url(../image/like.jpg);
		border-radius:50%;
		text-indent:-9999px;
		border:2px blue none;" 
		/>
	  
	  </div>
	</div>

	<div id="apDiv10">
	  <div id="apDiv20"><?php echo $name[9] ?></div>
	  <div id="apDiv30"></div>
	  <div id="apDiv40"><? echo $like_num[9] ?></div>
	  <div id="apDiv50">
	  <input type="submit" name = "like10" class="btn" value="<? echo $id_array[9] ?>"
		style="
		width: 50px;
		height: 50px;
		background-image:url(../image/like.jpg);
		border-radius:50%;
		text-indent:-9999px;
		border:2px blue none;"
		/>
	  </div>
	</div>

	<div id="apDiv11" style="text-align: center"><?php echo $name[0] ?></div>
	<div id="apDiv21"></div>
	<div id="apDiv31"><? echo $like_num[0] ?></div>

	<div id="apDiv41">
	<input type="submit" name = "like1" class="btn" value="<? echo $id_array[0] ?>"
		style="
		width: 50px;
		height: 50px;
		background-image:url(../image/like.jpg);
		border-radius:50%;
		text-indent:-9999px;
		border:2px blue none;" 
		/>
	</div>
	
</form>
</body>
</html>

