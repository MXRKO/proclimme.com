// JavaScript Document
$(document).ready(function(){
	$("#Datos").sisyphus();
	switch($("#Respuesta").val()){
		case 'GUARDO':
			TINY.box.show({html:'Se han guardado los datos correctamente',animate:false,close:true,mask:false,boxid:'success',top:3, width:480})
		break;
		case 'NOGUARDO':
			TINY.box.show({html:'No guardo, intentelo de nuevo!',animate:false,close:true,mask:false,boxid:'error',top:3, width:480})
		break;
		case 'ELIMINO':
			TINY.box.show({html:'Elimino!',animate:false,close:true,mask:false,boxid:'success',top:3, width:480})
		break;
		case 'NOEXISTENOELIMINO':
			TINY.box.show({html:'No se encontro el cliente que deseaba eliminar!',animate:false,close:true,mask:false,boxid:'error',top:3, width:480})
		break;
		case 'MODIFICO':
			TINY.box.show({html:'Se han actualizado los datos correctamente',animate:false,close:true,mask:false,boxid:'success',top:3, width:480})
		break;
		case 'NOMODIFICO':
			TINY.box.show({html:'No se ha podido actualizar los datos, intenlo mas tarde',animate:false,close:true,mask:false,boxid:'success',top:3, width:480})
		break;
	}	

	if($("#idu").val()===""){
		$("#btModificar").addClass("novisible");
	}
	else{
		$("#btGuardar").addClass("novisible");	
	}
	
	$("#btGuardar").click(function(){
		if($("#btContrasena").val()===$("#btReContrasena").val()){
			//alert('radio='+$("#estatus:checked").val())
			$("#Accion").val("GUARDAR");
			$("#Datos").submit();								   
		}
		else{
			alert("Las contraseñas especificadas, no coinciden");	
		}
	});
	
	$("#btModificar").click(function(){
		$("#Accion").val("MODIFICAR");							 
		$("#Datos").submit();
	});
	
	$("#btEliminar").click(function(){
		if(confirm("Esta seguro de eliminar los datos del Cliente?")){
			$("#Accion").val("ELIMINAR");
			$("#Datos").submit();
		}
	});
});