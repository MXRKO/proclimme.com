// JavaScript Document
$(document).ready(function(){	
	$(".btModificar").each(function(){
		$(this).click(function(){
			$("#Datos").attr("action","pedido.php");
			$("#xdpp").val($(this).attr("data-pp"));
			$("#Datos").submit();
		});
	});
});