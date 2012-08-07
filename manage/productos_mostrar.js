// JavaScript Document
$(document).ready(function(){
	$("input.btModificar").each(function(){
		$(this).click(function(){
			$("#xdp").val($(this).attr('data-id-producto'));
			$("#Datos").attr("action","producto.php");
			$("#Datos").submit();
		});			  
	});
	
	$("#btNuevo").click(function(){
		window.location.href="producto.php";
	});
	
	$("#btTodos").click(function(){
		window.location.href="productos.php";
	});
	
	$(".btMover").each(function(){
		$(this).click(function(){
			$("#tipo").val($(this).attr("data-tipo"));
			$("#xdp").val($(this).attr("data-id"));
			$("#Datos").attr("action","productos_mostrar.php");
			$("#Datos").submit();
		});
	});
	
});