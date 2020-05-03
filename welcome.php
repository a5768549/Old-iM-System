<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>歡迎介面</title>
</head>

<style type="text/css">
@import url(https://fonts.googleapis.com/earlyaccess/notosanstc.css);
body
{
	color: #FFFFFF;
	background-color: #333;
	font-family: 'Noto Sans TC', sans-serif;
}
body,td,th
{
	font-family: 'Noto Sans TC', sans-serif;
}
.ac-badge 
{
	margin: 0 auto;
	margin: .3em;
	width: 8em;
	height: 2em;
	padding: .5em;
	text-align: center;
	font-size: 3em;
	line-height: 1em;
	background: rgba(102,6,0,0.6);
	background-color: #666;
	border: none;
	color: #FFF;
}
.center-block 
{
	display: block;
	margin-left: auto;
	margin-right: auto;
}
@media only screen and (max-width: 900px) 
{
	.t-img 
	{
		width: 100%;
	}
}
@media only screen and (max-width: 600px)
{
	.t-img
	{
		width: 100%;
	}
}
@media only screen and (max-width: 400px)
{
	.t-img
	{
		width: 100%;
	}
}	
footer 
{
	position: absolute;
	bottom: 0;   
	width: 100%;
	height: 230px;   
}
}
</style>

<body>
<? 
include('connect.php');//連結資料庫

$name = $_SESSION["login"];
$statement = $con->prepare("SELECT photo FROM member WHERE account = ?");
$statement->execute(array($name));
$result = $statement->fetch(PDO::FETCH_ASSOC);

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
<div class="container">
<div id="hr_top" style="background-color: #FFFFFF">
  <hr>
</div>
<div class="mx-auto ac-badge">Welcome</div>
<div class="row align-items-center">
    <div class="col align-self-center">
	<img class="center-block" src="<? echo $result["photo"] ?>" width="200em" height="200em" alt="" 
	style="border-radius: 50%;
	<?
	for($i=0;$i<9;$i++)
	{
		if($name == $special_Account[$i])
		{
			echo $special_color[$i];
		}
	}
	?>">
	</div>
  </div>

</div>

<footer>
<div class="container">
<div id="hr_down" style="background-color: #FFFFFF">
  <hr>
</div>
</div>
</footer>

</body>

<script>
setTimeout(function(){window.location.href='./main/main.php?count=0';},3000);
</script>

</html>