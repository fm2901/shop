<table cellpadding="0" cellspacing="0">
	<tr>
		<td style="width:70%;border:1px solid #ccc;" valign="top">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<th>Штрихкод</th>
					<th>Наименование</th>
					<th>Поставщик</th>
					<th>Количество</th>
					<th>Приход</th>
					<th>Наценка</th>
					<th>Продажа</th>
				</tr>
			</table>
		</td>
		<td valign="top">
			
				<input name="shcode" placeholder="Штрихкод">
				<input name="name" placeholder="Наименование">
				<select name="postavshik" placeholder="Поставщик"></select>
				<input name="count" placeholder="Количество">
				<input name="price_in" placeholder="Приход">
				<input name="percent" placeholder="Наценка">
				<input name="price_out" placeholder="Продажа">
				<input name="addToPrihodList" type="submit" value="Добавить">
			
		</td>
	</tr>
</table>
<style>
	input,select{
		width:300px;
		height:40px;
		font-size:1.6em;
		padding:0 5px;
		margin:8px;
	}
	th{
		border-bottom: 1px solid #ccc;
		border-right: 1px solid #ccc;
		padding:10px;
		font-size:1.6em;
	}
</style>

