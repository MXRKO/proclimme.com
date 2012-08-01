// JavaScript Document
$(document).ready(function(){
	$("#btGuardar").click(function(){
		if($.trim($("#txtNombreProducto").val())!="" && $.trim($("#txtDescripcionBreve").val())!="" && $.trim($("#txtFormatosEntrega").val())!="" && $.trim($("#txtMedioEntrega").val())!="" && $.trim($("#txtDescripcionDetallada").val())!=""){
			$("#Accion").val("GUARDAR");
			$("#Datos").submit();
		}
		else{
			TINY.box.show({html:'Debe llenar todos los campos marcados con (*) asterisco.',animate:false,close:true,mask:false,boxid:'error',top:3, width:480})	
		}
	});
	
	$("#btEliminar").click(function(){
		if(confirm("¿Está seguro de eliminar este producto?")){
			$("#Accion").val("ELIMINAR");
			$("#Datos").submit();
		}			   
	});
	
	switch($("#respuesta").val()){
		case "GUARDO":
			TINY.box.show({html:'La informaci&oacute;n se ha guardado correctamente',animate:false,close:true,mask:false,boxid:'success',top:3, width:480})
			break;
		case "NOGUARDO":
			TINY.box.show({html:'Se ha detectado un error y NO se ha podido guardar, por favor intente mas tarde.',animate:false,close:true,mask:false,boxid:'error',top:3, width:480})	
			break;
		case "ELIMINO":
			TINY.box.show({html:'La información se ha eliminado correctamente',animate:false,close:true,mask:false,boxid:'success',top:3, width:480})
			break;
		case "NOELIMINO":
			TINY.box.show({html:'Se ha detectado un error y NO se ha podido eliminar, por favor intente mas tarde.',animate:false,close:true,mask:false,boxid:'error',top:3, width:480})	
			break;
	}
});