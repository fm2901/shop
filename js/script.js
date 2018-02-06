$(document).ready(function(){
	$("input[name=shcode]").keyup(function(e){
		e.preventDefault();
		if(e.keyCode==13){
			$.post("php/handler.php",{'getByShcode' : $(this).val()},function(res){
				var p = eval('(' + res + ')');
				
				$("input[name=name]").val(p.name);
				$("input[name=price_in]").val(p.price_in);
				$("input[name=percent]").val(p.percent);
				$("input[name=price_out]").val(p.price_out);
			});
		}
	});
});