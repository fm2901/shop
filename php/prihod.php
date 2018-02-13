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
		<td style="width:75%;border:1px solid #ccc;" valign="top">
			<table cellpadding="0" cellspacing="0" style="width:100%" id="prihodList">
				<tr>
					<th>Штрихкод</th>
					<th>Наименование</th>
					<th>Поставщик</th>
					<th>Количество</th>
					<th>Приход</th>
					<th>Наценка</th>
					<th>Продажа</th>
					<th>Годен до</th>
					<th style="border-right:none"></th>
				</tr>
			</table>
		</td>
		<td valign="top">
			<input name="shcode" placeholder="Штрихкод" autocomplete="off"><input type="submit" value="GEN" id="genShcode">
			<input name="name" id="name" placeholder="Наименование">
			<select name="id_postavshik" class="chosen" data-placeholder="Поставщик"><option><?=$postavshik?></select>
			<input name="count" placeholder="Количество">
			<input name="price_in" placeholder="Приход">
			<input name="percent" placeholder="Наценка">
			<input name="price_out" placeholder="Продажа">
			<input name="exp_date" placeholder="Годен до">
			<input name="id" type="hidden">
			<input name="addToPrihodList" type="submit" value="Добавить">
		</td>
	</tr>
	<tr>
		<td><input type="submit" name="addPrihod" value="Сохранить"></td>
	</tr>
</table>
<style>
	input,select{
		width:250px;
		height:30px;
		font-size:1.4em;
		padding:0 5px;
		margin:6px;
	}
	.chosen-container{
		width:250px;
		font-size:1.4em;
		margin:5px;
	}
	a.chosen-single.chosen-default{
		border-radius:0;
	}
	#prihodList td{
		border-bottom: 1px solid #ccc;
		border-right: 1px solid #ccc;
		padding:3px;
	}
	input[type=button]{
		width: 55px;
		height: 21px;
		font-size: 69%;
		padding:0;
		margin:1px;
	}
	#genShcode{
		font-size: 0.8em;
		width: 42px;
		margin:0;
	}
</style>

