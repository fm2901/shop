<?php session_start();?>
<meta charset="utf8">
<title>Shop</title>
<link rel="icon" type="image/x-icon"  href="https://assets-cdn.github.com/favicon.ico">
<link rel="stylesheet" href="css/datepicker.css">
<script src="js/jquery.js"></script>
<script src="js/script.js"></script>
<h1><a href="index.php?c=prihod">Приход</a></h1>
<?php
	include("php/db.php");
	include("php/tools.php");
	$pages = array("prihod");
	if(isset($_GET["c"]) && in_array($_GET["c"],$pages)){
		include("php/".$_GET["c"].".php");
	}else{
		include("php/prihod.php");
		$a = 1;
	}
	
	
?>