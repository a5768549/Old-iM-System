<?php
$con = new PDO('mysql:host=localhost;dbname=im;charset=utf8', 'XXXXXXX', 'XXXXXXXXXXXXXXXXXX');
if(!$con)
{
	die("can't connect".mysql_error());
}
?>