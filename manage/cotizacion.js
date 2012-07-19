$(document).ready(function(){
	if($("#respuesta").val()=="GUARDO"){
		$("#btEnviar").attr("disabled",true);
		TINY.box.show({html:'Se han enviado los datos correctamente',animate:true,close:true,mask:false,boxid:'success',top:6, width:480});	
	}					   
	if($("#respuesta").val()=="NOGUARDO"){
		TINY.box.show({html:'se ha producido un error por favor intentelo nuevamente, ',animate:true,close:true,mask:false,boxid:'error',top:6, width:480});		
	}
	$("#btEnviar").click(function(){
		if($.trim($("#txtDescripcion").val())!=""){
			$("#Datos").attr("action","cotizacion.php");
			$("#Accion").val("GUARDAR");
			$("#Datos").submit();
		}
	});						   
	
	$("#btPedido").click(function(){
		$("#Pedido").attr("action","pedido.php");
		$("#Pedido").submit();		
	});
});