<?php session_start(); ?>
<html lang="en">
<head>
		<meta charset="utf-8">
		<title>更改資料</title>
		<meta name="viewport" content="initial-scale=1,maximum-scale=2,user-scalable=0,user-scalable=yes" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="/css/imsystem.min.css" crossorigin="anonymous">
</head>


<style type="text/css">
body 
{
	background-color: #333;
	@import url(//fonts.googleapis.com/earlyaccess/notosanstc.css);
	font-family: 'Noto Sans TC', sans-serif;
}
</style>

<?php
$name = $_SESSION["login"];
?>

<body>
	<div class="container">
		<div class="im-login-container mx-auto" style="background-color:rgb(102, 102, 102, .2)">
			<div class="im-line-top im-fluid"></div>
			<div style="margin-top:1em;padding: 1em;">
			<form name="login" action="change.php" method="post">
				<div class="im-text-field">
					<div class="im-input-box d-flex">
						<div class="aNoxws ">ACCOUNT</div>
						<span style="position:absolute;margin-left:6.456em;white-space:nowrap;">|</span>	
						<span style="position:absolute;margin-left:8em;white-space:nowrap;"><? echo $name; ?>	</span>					
					</div>
				</div>
						
				<div class="im-text-field">
					<div class="im-input-box d-flex">
						<div class="aNoxws ">PASSWORD</div>
						<span style="position:absolute;margin-left:6.456em;white-space:nowrap;">|
							<input class="im-input" type=text name="password" required style="margin-left: .5em;" autofocus/>
						</span>
					</div>
				</div>
				
				<div class="im-text-field">
					<div class="im-input-box d-flex">
						<div class="aNoxws ">CH-PASSWD</div>
						<span style="position:absolute;margin-left:6.456em;white-space:nowrap;">|
							<input class="im-input" type=text name="change_password" required style="margin-left: .5em;"/>
						</span>
					</div>
				</div>
				
				<div class="im-text-field">
					<div class="im-input-box d-flex">
						<div class="aNoxws ">NAME</div>
						<span style="position:absolute;margin-left:6.456em;white-space:nowrap;">|
							<input class="im-input" type=text name="name" required style="margin-left: .5em;"/>
						</span>
					</div>
				</div>
				
				<div class="im-text-field">
					<div class="im-input-box d-flex">
						<div class="aNoxws ">EMAIL</div>
						<span style="position:absolute;margin-left:6.456em;white-space:nowrap;">|
							<input class="im-input" type=email name="email" required style="margin-left: .5em;"/>
						</span>
					</div>
				</div>
				
				<div class="im-text-field d-flex">
					<button class="im-btn" type="button" onclick="location.href='personal.php'">Back</button>
					<input class="im-btn ml-auto" name="submit" type=submit id="submit" value="Change"/>
				</div>
			</form>
			</div>
			<div class="im-line im-fluid"></div>
		</div>
	</div>
</body>
</html>