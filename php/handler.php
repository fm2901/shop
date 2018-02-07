<?php
	session_start();
	include("db.php");
	include("tools.php");
	if(isset($_POST["getByShcode"])){
		$r = Query("SELECT * FROM product WHERE shcode='".$_POST["getByShcode"]."' LIMIT 1");
		foreach($r as $k=>$v){
			$_SESSION["original"][$v["id"]] = array("id_postavshik" => $v["id_postavshik"]
													,"price_in"		=> $v["price_in"]
													,"price_out"		=> $v["price_out"]
													,"percent"		=> $v["percent"]
													,"exp_date"		=> $v["exp_date"]
													);
			echo json_encode($v);
		}
	}
	