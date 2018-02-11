<?php
	function Query($sql){
		$res = array();
		if($q = mysql_query($sql)){
			while($r = mysql_fetch_assoc($q)){
				$res[] = $r;
			}
		}
		return $res;
	}
	function pre($data){
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
	}
	function is_assoc($arr){
		if(!is_array($arr)) {
			trigger_error("Argument should be an array for is_assoc", E_USER_WARNING);
			return FALSE;
		}
		return count(array_filter(array_keys($arr), 'is_string')) > 0;
	}
	function last_inserted($tbl){
		$sql = "SELECT id FROM ".$tbl." ORDER BY id DESC LIMIT 1";
		$q = mysql_query($sql);
		$r = mysql_fetch_array($q);
		return $r["id"];
	}
	function insert($tbl,$arr){
		$sql = "INSERT INTO ".$tbl;
		$key = "";
		$val = "";
		if(is_assoc($arr)){
			foreach($arr as $k=>$v){
				$key .= $k.",";
				$val .= "'".$v."',";
			}
			$key = substr($key,0,-1);
			$val = substr($val,0,-1);
			$sql .= "(".$key.") VALUES(".$val.")";
			if(mysql_query($sql)){
				return last_inserted($tbl);
			}
		}else{
			foreach($arr as $k=>$v){
				$key = "";
				$val .= "(";
				foreach($v as $kk=>$vv){
					$key .= $kk.",";
					$val .= "'".$vv."',";
				}
				$val = substr($val,0,-1);
				$val .= "),";
			}
			$key = substr($key,0,-1);
			$val = substr($val,0,-1);
			$sql .= "(".$key.") VALUES".$val;
			mysql_query($sql);
		}
		//$r = mysql_query($sql);
		return $sql;
	}
	function update($tbl,$arr){
		$sql = "UPDATE ".$tbl." SET ";
		$cond = "";
		if(is_assoc($arr)){
			foreach($arr as $k=>$v){
				if($k <> "id"){
					$sql .= $k."='".$v."',";
				}else{
					$cond = " WHERE ".$k."=".$v;
				}
			}
			$sql = substr($sql,0,-1).$cond;
			echo $sql;
			mysql_query($sql);
		}else{
			foreach($arr as $k=>$v){
				$sql = "UPDATE ".$tbl." SET ";
				foreach($v as $kk=>$vv){
					if($kk <> "id"){
						$sql .= $kk."='".$vv."',";
					}else{
						$cond = " WHERE ".$kk."=".$vv;
					}
				}
				$sql = substr($sql,0,-1).$cond;
				echo $sql;
				mysql_query($sql);
			}
		}
	}
	function delete($tbl,$arr){
		$sql = "DELETE FROM ".$tbl." ";
		if(!is_assoc($arr)){
			$sql .= "WHERE id in(".implode(",",$arr).")";
		}	
		return $sql;
	}
	function checkUpdate($arr,$arr2){
		$res["id"] = $arr2["id"];
		$res["count"] = 0;
		foreach($arr as $k=>$v){
			if($v <> $arr2[$k]){
				$res[$k] = $arr2[$k];
			}	
		}
		$res["count"] = intval($arr["count"]) + intval($res["count"]);
		return $res;
	}
?>