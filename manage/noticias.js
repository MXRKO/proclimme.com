// JavaScript Document
$(document).ready(function(){
	$(".btModificar").each(function(){
		$(this).click(function(){
			$("#idn").val($(this).attr("data-idn"));
			$("#Datos").attr("action","noticia.php");
			$("#Datos").submit();
		});
	});
});