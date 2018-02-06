<?php
	include("db.php");
	include("tools.php");
	if(isset($_POST["getByShcode"])){
		$r = Query("SELECT * FROM product WHERE shcode='".$_POST["getByShcode"]."'");
		echo json_encode($r);
	}