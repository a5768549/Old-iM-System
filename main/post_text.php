<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="css/lightbox.css" rel="stylesheet" />  
</head>
<?
$id = $_GET["id"];
include('connect.php');//連結資料


$statement  = $con->prepare("SELECT * FROM article WHERE ID = ?");
$statement -> execute(array($id));
$result = $statement->fetch(PDO::FETCH_ASSOC);
	
$statement2 = $con->prepare("SELECT * FROM member WHERE account = ?");
$statement2 ->execute(array($result["poster"]));
$result2 = $statement2->fetch(PDO::FETCH_ASSOC);

$statement3 = $con->prepare("Select COUNT(*) From comments Where post_id = '$id'");
$statement3 ->execute(array($result["poster"]));
$result3 = $statement3->fetch(PDO::FETCH_ASSOC);
$id_count1 = $result3["COUNT(*)"];

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

#apDiv2 img {
	border-radius: 50%;
	border:2px white solid;
	<? 
	for($i=0;$i<9;$i++)
	{
		if($result["poster"] == $special_Account[$i])
		{
			echo $special_color[$i];
		}
	}
	?>
}


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
	font-size:2em;
	color:white;
}
.padding_left
{
	padding-left:1em;
	padding-top:1em;
	height: 100%;
}

.padding_right
{
	padding-right:1em;
}
.profile_img
{
	border-radius: 50%;
	border:2px white solid;
	<? 
	for($i=0;$i<9;$i++)
	{
		if($result["poster"] == $special_Account[$i])
		{
			echo $special_color[$i];
		}
	}
	?>
}
.share_img
{
	border-radius: 50%;
}
.main_background
{
	background:rgba(255,255,255,0.2);
	margin-left:1em;
	padding-left:2.5em;
	border-top-style:solid;
	border-top-color:#4dffff;
	
}
.title
{
	padding-top:1em;
	padding-bottom:1em;
	font-size:1.5em;
}
.iframe_style
{
	height: 100%;
	padding-top:3em;
	margin-left:-1em;
}
.center
{
	text-align: center;
	display: block;
}
.btn_padding
{
	padding-top:2em;
	padding-bottom:2em;
}
.btn_hover:hover
{
	opacity: 0.8;
	transition: .5s ease;
}
.profile_padding
{
	padding-top:0.5em;
}
.like_font
{
	color: #6FF;
	font-size:0.5em;
	margin-left:-1.5em;
	line-height:2em;
}
.user_img
{
	display: block;
	width: 100%;
	height: auto;
}
.img_frame
{
	height: 150px;
    width : 150px;
    position: relative;
	padding-top:1em;
}


.comment_background
{
	border-radius: 10px;
	background-color: rgba(50,50,50,0.4);
	width:100%;
	width: 66vw;
}

.padding-bottom
{
	padding-bottom:0.2em;
}

.comment_img
{
	border-radius: 50%;	
}

.comment_padding
{
	margin-left:-2vw;
}

.comment_poster
{
	font-size:0.5em;
}

.comment_text
{
	font-size:0.6em;
	padding-top:0.2em;
}
</style>
<html>
<body>

<div class="container-fluid">
<div class="row padding_left">
	<div class="col-2">
		<div class="row center profile_padding">
			<img class="profile_img" src="<?php echo $result2["photo"] ?>" width="208" height="208" alt="">
		</div>
		
		<div class="row center profile_padding">
			<?php echo $result2["name"] ?>
		</div>
		
		<div class="row center btn_padding">
			<div class="btn_hover">
			<input type="button" class="btn" 
			style="
			width: 100px;
			height: 100px;
			background-color: #000000;
			background-image:url(../image/return.jpg);
			border-radius:50%;
			border:2px blue none;"
			onClick="top.location.href='main.php?count=<? echo $_GET["count"]?>'"/>
			</div>
		</div>
		
		<div class="row center btn_padding">
			<div class="btn_hover">
			<input type="button" class="btn" 
			style="
			width: 100px;
			height: 100px;
			background-image:url(../image/comment.png);
			border-radius:50%;
			border:2px blue none;"
			onClick="top.location.href='comments_post.php?id=<?=$id?>'"/>
			</div>
		</div>
		
	</div>
	<div class="col-9 padding_right main_background">
		<div class="row title">
			<div class="col-9">
				<?php echo $result["title"] ?>
			</div>
			<div class="col-1">
				<img class="share_img" src="../image/share.jpg" width="45" height="45" alt="">
			</div>
			<div class="col-1">
				<form action="like_post.php" method="post">
					<div class="btn_hover">
					<input type="submit" name = "like_text" class="btn" value="<? echo $id ?>"
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
			</div>
			<div class="col-1 like_font">
				<? echo $result["like_num"] ?>
			</div>
		</div>
		<div class="row"><?php echo $result["text"] ?></div>
		<div class="row img_frame">
			<? 
			if($result[photo] != "")
			{
				echo "<a href=\"$result[photo]\" data-lightbox=\"roadtrip\"><img class=\"user_img\" src=\"$result[photo]\"/></a>";
			}
			?>
		</div>
		<div class="row">
			<?php
				$commenter = array();
				$photo     = array();
				$text      = array();
				$name      = array();
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
				$statement = $con->prepare("SELECT COUNT(*) FROM comments WHERE post_id = '$id'");
				$statement ->execute();
				$result = $statement->fetch(PDO::FETCH_ASSOC);
				$comment_all = $result['COUNT(*)'];
				
				for($i=1;$i<$comment_all+1;$i++)
				{
					$statement = $con->prepare("SELECT * FROM comments WHERE id = ? and post_id = '$id'");
					$statement ->execute(array($i));
					$result = $statement->fetch(PDO::FETCH_ASSOC);
					
					$statement2 = $con->prepare("SELECT * FROM member WHERE account = ?");
					$statement2 ->execute(array($result["commenter"]));
					$result2 = $statement2->fetch(PDO::FETCH_ASSOC);
					
					array_push($commenter ,$result ["commenter"]);
					array_push($photo     ,$result2["photo"]);
					array_push($text      ,$result ["text"]);
					array_push($name      ,$result2["name"]);
				}
				echo '<div class="row" style="padding-top:12vh; padding-bottom:12vh;">';
				echo '<div class="col">';
				for($i=0;$i<$comment_all;$i++)
				{
					echo '<div class="padding-bottom">';
					echo '<div class="row comment_background">';
						echo '<div class="col-2" style="padding-top:0.2em; padding-bottom:0.2em">';
							echo '<img src="';
							echo $photo[$i];
							echo '" width="80" height="80" alt="" class = "comment_img" style ="';
							for($j=0;$j<9;$j++)
							{
								if($commenter[$i] == $special_Account[$j])
								{
									echo $special_color[$j];
								}
							}
							echo '"/>';
						echo '</div>';
							
						echo '<div class="col-10">';
							echo '<div class="row comment_poster">';
								echo $name[$i];
							echo '</div>';
								
							echo '<div class="row comment_text">';
								echo $text[$i];
							echo '</div>';
						echo '</div>';
					echo '</div>';
					echo '</div>';
				}
				echo '</div>';
				echo '</div>';
			?>
		</div>
	</div>
	
	
</div>
</div>
	
<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js'></script>
<script src="js/jquery-1.11.0.min.js"></script>  
<script src="js/lightbox-plus-jquery.js"></script>  
</body>
</html>