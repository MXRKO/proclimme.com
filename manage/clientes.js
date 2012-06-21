// JavaScript Document
$(document).ready(function(){
	$("#btNuevo").click(function(){
		window.location.href="cliente.php";
	});	
	
	$("#btModificar").click(function(){
		window.location.href="cliente.php?idu="+$(this).attr("data-usuario");								 
	});
});