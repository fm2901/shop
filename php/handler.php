<?php
	session_start();
	include("db.php");
	include("tools.php");
	if(isset($_POST["getByShcode"])){
		$r = Query("SELECT * FROM product WHERE shcode='".$_POST["getByShcode"]."' LIMIT 1");
		foreach($r as $k=>$v){
			$_SESSION["original"][$v["id"]] = array("id_postavshik" => $v["id_postavshik"]
													,"count"		=> $v["count"]
													,"price_in"		=> $v["price_in"]
													,"price_out"		=> $v["price_out"]
													,"percent"		=> $v["percent"]
													,"exp_date"		=> $v["exp_date"]
													);
			echo json_encode($v);
		}
	}
	if(isset($_POST["addPrihod"])){
		$prihod_info = array();
		$update = array();
		$prihod = array("sum_in"=>0
						,"sum_out"=>0
						,"datetime"=>date("Y-m-d H:i:s")
						);
		foreach($_POST["addPrihod"] as $k=>$v){
			if(is_array($v)){
				$update[$k] = checkUpdate($_SESSION["original"][$k],$v);
				$prihod_info[$k]["product"] = $v["id"];
				$prihod_info[$k]["id_postavshik"] = $v["id_postavshik"];
				$prihod_info[$k]["price_in"] = $v["price_in"];
				$prihod_info[$k]["price_out"] = $v["price_out"];
				$prihod_info[$k]["count"] = $v["count"];
				$prihod_info[$k]["summa"] = $v["count"]*$v["price_in"];
				$prihod["sum_in"] += $prihod_info[$k]["summa"];
				$prihod["sum_out"] += $v["count"]*$v["price_out"];
			}
		}
		$id = insert("prihod",$prihod);
		if($id>0){
			foreach($prihod_info as $k=>$v){
				$prihod_info[$k]["id_prihod"] = $id;
			}
			insert("prihod_info",$prihod_info);
			update("product",$update);
			unset($_SESSION["original"]);
		}
	}
	if(isset($_POST["addNewProduct"])){
		unset($_POST["addNewProduct"]);
		$id = insert("product",$_POST);
		$v = $_POST;
		$_SESSION["original"][$id] = array("id_postavshik" => $v["id_postavshik"]
												,"count"		=> 1
												,"price_in"		=> $v["price_in"]
												,"price_out"	=> $v["price_out"]
												,"percent"		=> $v["percent"]
												,"exp_date"		=> $v["exp_date"]
												);
		echo $id;
	}