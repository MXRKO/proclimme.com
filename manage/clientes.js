// JavaScript Document
$(document).ready(function(){
	$("#btNuevo").click(function(){
		window.location.href="cliente.php";
	});	
	
	$(".btModificar").each(function(){
		$(this).click(function(){
			$("#Datos").attr("action","cliente.php");							 
			$("#idu").val($(this).attr("data-usuario"));
			$("#idc").val($(this).attr("data-cliente"));
			$("#Accion").val("BUSCAR");
			$("#Datos").submit();				   
		});								
	});
	
	//$("#btModificar").click(function(){
		
		/*window.location.href="cliente.php?idu="+$(this).attr("data-usuario");*/								 
	//});
});