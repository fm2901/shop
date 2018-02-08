$(document).ready(function(){
	$("input[name=shcode]").keyup(function(e){
		e.preventDefault();
		document.p = 0;
		document.prihodList = [];
		if(e.keyCode==13){
			$.post("php/handler.php",{'getByShcode' : $(this).val()},function(res){
				document.p = p = eval('(' + res + ')');
				$("input[name=name]").val(p.name);
				$("input[name=price_in]").val(p.price_in);
				$("input[name=percent]").val(p.percent);
				$("input[name=price_out]").val(p.price_out);
				$("input[name=exp_date]").val(p.exp_date);
				$("input[name=id]").val(p.id);
				$("select[name=id_postavshik]>option[value="+p.id_postavshik+"]").attr("selected","selected");
			});
			$(this).val("");
		}
	});
	$("input[name=addToPrihodList]").click(function(e){
		e.preventDefault();
		$(this).parent("td").children().not("input[type=submit]").val("");
		if(document.p != 0){
			var r = document.p;
			document.prihodList[r.id] = r;
			$("#prihodList").children("tr :last").after("<tr class='row' id='"+r.id+"'><td>"+r.shcode+"</td>"
				+"<td>"+r.name+"</td>"
				+"<td>"+$("select[name=id_postavshik]>option[value="+p.id_postavshik+"]").text()+"</td>"
				+"<td>"+r.cnt+"</td>"
				+"<td>"+r.price_in+"</td>"
				+"<td>"+r.percent+"</td>"
				+"<td>"+r.exp_date+"</td>"
				+"<td style='border-right:none'>"+r.price_out+"</td></tr>");
				document.p = 0;
		}
	});
	$(document).on('dblclick', '.row', function(){
		var id = $(this).attr("id");
		var p = document.prihodList[id];
		$("input[name=name]").val(p.name);
	});
});