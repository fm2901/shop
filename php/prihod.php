<?
	//unset($_SESSION["original"]);
	if(!isset($_SESSION["original"])){
		$_SESSION["original"] = array();
	}
	if(!isset($_SESSION["prihodList"])){
		$_SESSION["prihodList"] = array();
	}
	//pre($_SESSION["original"]);
	$r = Query("SELECT id,name FROM postavshik");
	$postavshik = "";
	foreach($r as $k=>$v){
		$postavshik .= "<option value='".$v["id"]."'>".$v["name"]."</option>";
	}
?>
<table cellpadding="0" cellspacing="0" style="width:100%">
	<tr>
		<td style="width:70%;border:1px solid #ccc;" valign="top">
			<table cellpadding="0" cellspacing="0" style="width:100%">
				<tr>
					<th>Штрихкод</th>
					<th>Наименование</th>
					<th>Поставщик</th>
					<th>Количество</th>
					<th>Приход</th>
					<th>Наценка</th>
					<th>Годен до</th>
					<th style="border-right:none">Продажа</th>
				</tr>
			</table>
		</td>
		<td valign="top">
			<input name="shcode" placeholder="Штрихкод">
			<input name="name" placeholder="Наименование">
			<select name="id_postavshik" placeholder="Поставщик"><option><?=$postavshik?></select>
			<input name="count" placeholder="Количество">
			<input name="price_in" placeholder="Приход">
			<input name="percent" placeholder="Наценка">
			<input name="price_out" placeholder="Продажа">
			<input name="exp_date" placeholder="Годен до">
			<input name="addToPrihodList" type="submit" value="Добавить">
		</td>
	</tr>
</table>
<style>
	input,select{
		width:250px;
		height:35px;
		font-size:1.4em;
		padding:0 5px;
		margin:6px;
	}
	th{
		border-bottom: 1px solid #ccc;
		border-right: 1px solid #ccc;
		padding:10px;
		font-size:1em;
	}
</style>

