<?php
	function Query($sql){
		$res = array();
		if($r = mysql_query($sql)){
			$res = mysql_fetch_array($r);
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
		}
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
		}	
		return $sql;
	}
	function delete($tbl,$arr){
		$sql = "DELETE FROM ".$tbl." ";
		if(!is_assoc($arr)){
			$sql .= "WHERE id in(".implode(",",$arr).")";
		}	
		return $sql;
	}
	
?>