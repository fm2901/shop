$(document).ready(function(){
	document.prihodList = [];
	$("input[name=shcode]").keyup(function(e){
		e.preventDefault();
		var shcode = $(this).val();
		document.p = 0;
		if(e.keyCode==13){
			$.post("php/handler.php",{'getByShcode' : shcode},function(res){
				document.p = p = eval('(' + res + ')');
				p.shcode = shcode;
				p.count = 1;
				fillPrihodForm(p);
			});
			$(this).val("");
		}
	});
	function addToPrihodList(r){
		var row = "<td>"+r.shcode+"</td>"
				+"<td>"+r.name+"</td>"
				+"<td>"+$("select[name=id_postavshik]>option[value="+r.id_postavshik+"]").text()+"</td>"
				+"<td>"+r.count+"</td>"
				+"<td>"+r.price_in+"</td>"
				+"<td>"+r.percent+"</td>"
				+"<td>"+r.price_out+"</td>"
				+"<td>"+r.exp_date+"</td><td style='border-right:none'><input type='button' class='del' value='Удалить' id='"+r.id+"'></td>";			
		if(typeof(document.prihodList[r.id]) == 'undefined'){
			$("#prihodList").children("tr :last").after("<tr class='row' id='"+r.id+"'>" +row+"</tr>");
		}else{
			$(".row#"+r.id).html(row);
		}
		document.prihodList[r.id] = r;
		document.p = 0;
	}
	$("input[name=addToPrihodList]").click(function(e){
		e.preventDefault();
		if(document.p != 0 && typeof(document.p) != 'undefined'){
			var r = getPrihodForm();
			$(this).parent("td").children().not("input[type=submit],select").val("");
			addToPrihodList(r);
		}else{
			var r = getPrihodForm();
			r.addNewProduct = 1;
			$.post("php/handler.php",r,function(res){
				if(parseInt(res)>0){
					r.id = res;
					addToPrihodList(r);
				}
			});
		}
	});
	function fillPrihodForm(p){
		$("input[name=shcode]").val(p.shcode);
		$("input[name=name]").val(p.name);
		$("input[name=count]").val(p.count);
		$("input[name=price_in]").val(p.price_in);
		$("input[name=percent]").val(p.percent);
		$("input[name=price_out]").val(p.price_out);
		$("input[name=exp_date]").val(p.exp_date);
		$("input[name=id]").val(p.id);
		$("select[name=id_postavshik]>option[value="+p.id_postavshik+"]").attr("selected","selected");
	}
	function getPrihodForm(){
		var r = Object();
		r.id = $("input[name=id]").val();
		r.shcode = $("input[name=shcode]").val();
		r.name = $("input[name=name]").val();
		r.count = $("input[name=count]").val();
		r.price_in = $("input[name=price_in]").val();
		r.percent = $("input[name=percent]").val();
		r.price_out = $("input[name=price_out]").val();
		r.exp_date = $("input[name=exp_date]").val();
		r.id_postavshik = $("option:selected,select[name=id_postavshik]").val();
		return r;
	}
	$(document).on('dblclick', '.row', function(){
		var id = $(this).attr("id");
		var p = document.p = document.prihodList[id];
		fillPrihodForm(p);
	});
	
	$(document).on('click', '.del', function(){
		var id = $(this).attr("id");
		delete document.prihodList[id];
		$(".row#"+id).remove();
	});
	$("input[name=addPrihod]").click(function(){
		if(document.prihodList.length>0){
			$.post("php/handler.php",{'addPrihod' : document.prihodList},function(res){
				document.prihodList = [];
				$(".row").remove();
				console.log(res);
			});
		}
	});
	$("#name").autocomplete({
		source: "sug/suggest.php",
		minLength: 2,
		select: function( event, ui ){
			ui.item.count = 1;
			fillPrihodForm(ui.item);
			document.p = ui.item;
		}
	});
	
	$("#genShcode").click(function(){
		var shcode = "460" + parseInt(new Date().getTime()/1000);
		$("input[name=shcode]").val(shcode);
	});
});