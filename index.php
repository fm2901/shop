<?php session_start();?>
<meta charset="utf8">
<title>Shop</title>
<link rel="icon" type="image/x-icon"  href="https://assets-cdn.github.com/favicon.ico">
<link rel="stylesheet" href="autocomplete/development-bundle/themes/ui-lightness/jquery.ui.all.css">

<script src="autocomplete/development-bundle/jquery-1.7.1.js"></script>
<script src="autocomplete/development-bundle/ui/jquery.ui.core.js"></script>
<script src="autocomplete/development-bundle/ui/jquery.ui.widget.js"></script>
<script src="autocomplete/development-bundle/ui/jquery.ui.position.js"></script>
<script src="autocomplete/development-bundle/ui/jquery.ui.autocomplete.js"></script>
<link rel="stylesheet" href="css/chosen.css">
<script src="js/script.js"></script>
<script src="js/chosen.jquery.js"></script>

<h1><a href="index.php?c=prihod">Приход</a></h1>
<?php
	
	include("php/db.php");
	include("php/tools.php");
	$pages = array("prihod");
	if(isset($_GET["c"]) && in_array($_GET["c"],$pages)){
		include("php/".$_GET["c"].".php");
	}else{
		include("php/prihod.php");
	}
?>