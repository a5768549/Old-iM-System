<?php
//composer require setasign/fpdf:^1.8
require('C:/Users/a5768/vendor/setasign/fpdf/fpdf.php');
date_default_timezone_set("Asia/Taipei");
$today = date("Ymd");
$time = date("h:i:s");
$today = '20200403';
$Number       = array();
$Name         = array();
$Checked      = array();
$checked_time = array();
$Temperature  = array();

include("connect_3011.php");
$sql = "SELECT * FROM `$today`";
$sth = $con_3011->query($sql);
$rows = $sth->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row)
{
	foreach($row as $key => $value)
	{
		switch($key)
		{
			case "Number"      : array_push($Number      ,$value);break;
			case "Checked"     : array_push($Checked     ,$value);break;
			case "checked_time": array_push($checked_time,$value);break;
			case "Temperature" : array_push($Temperature ,$value);break;
		}
	}
}
// instead of "$doc = new PDF();" use "$doc = new FPDF();"

$doc = new FPDF('P', 'mm', 'A4');
$doc -> AddPage();
$doc -> SetFont('Arial','B', 20);
$doc -> Cell(60,20, 'Check Status');
$doc -> Cell(65,20,$today);
$doc -> Cell(60,20,$time,0,1);

$doc -> SetFont('Arial','B', 12);
$doc -> Cell(25,6,'Number');
$doc -> Cell(35,6,'Check_Status');
$doc -> Cell(65,6,'Checked_Time');
$doc -> Cell(25,6,'Temperature',0,1);
for($i=0;$i<count($Number);$i++)
{
	$doc -> Cell(25,6,$Number[$i]);
	if($Checked[$i] == 0)
	{
		$doc -> Cell(35,6,'Uncheck');
	}
	else if($Checked[$i] == 3)
	{
		$doc -> Cell(35,6,'Delay');
	}
	else
	{			
		$doc -> Cell(35,6,'Checked');
	}
	
	if($checked_time[$i] == "0000-00-00 00:00:00")
	{
		$doc -> Cell(65,6,'No');
	}
	else
	{
		$doc -> Cell(65,6,$checked_time[$i]);
	}
	$doc -> Cell(25,6,$Temperature[$i],0,1);
}

$doc -> OutPut('F','output/'.$today.'.pdf');
?>