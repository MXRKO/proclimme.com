$(document).ready(function(){
	//$("#Datos").sisyphus();
	if($("#data-estatus").val()=='0'){
		$("input:radio[name=estatus]:nth(1)").attr("checked",true);	
		//ESTO ES LO MISMO $('input:radio[name=estatus]')[0].checked = true;
		// ESTO RESETEA EL RADIO BUTTON $('input:radio[name=estatus]').attr('checked',false);
	}
	else{
		$("input:radio[name=estatus]:nth(0)").attr("checked",true);	
	}
	switch($("#Respuesta").val()){
		case 'GUARDO':
			TINY.box.show({html:'Se han guardado los datos correctamente',animate:false,close:true,mask:false,boxid:'success',top:3, width:480})
		break;
		case 'NOGUARDO':
			TINY.box.show({html:'No guardo, intentelo de nuevo!',animate:false,close:true,mask:false,boxid:'error',top:3, width:480})
		break;
		case 'ELIMINO':
			TINY.box.show({html:'El usuario ha sido eliminado exitosamente!',animate:false,close:true,mask:false,boxid:'success',top:3, width:480})
		break;
		case 'NOEXISTE':
			TINY.box.show({html:'No se encontro el usuario!',animate:false,close:true,mask:false,boxid:'error',top:3, width:480})
		break;
		case 'NOEXISTENOELIMINO':
			TINY.box.show({html:'No se encontro el cliente que deseaba eliminar!',animate:false,close:true,mask:false,boxid:'error',top:3, width:480})
		break;
		case 'MODIFICO':
			TINY.box.show({html:'Se han actualizado los datos correctamente',animate:false,close:true,mask:false,boxid:'success',top:3, width:480})
		break;
		case 'NOMODIFICO':
			TINY.box.show({html:'No se ha podido actualizar los datos, intenlo mas tarde',animate:false,close:true,mask:false,boxid:'error',top:3, width:480})
		break;
	}	
	if($("#idu").val()===""){
		$("#btModificar").addClass("novisible");
	}
	else{
		$("#btGuardar").addClass("novisible");	
	}
	
	$("#btGuardar").click(function(){
		if( ($("#txtContrasena").val()===$("#txtReContrasena").val()) && $.trim($("#txtContrasena").val())!="" ){
			$("#Accion").val("GUARDAR");
			$("#Datos").submit();								   
		}
		else{
			TINY.box.show({html:'"Las contraseñas especificadas, no coinciden y/o están vacias"',animate:false,close:true,mask:false,boxid:'error',top:3, width:480})
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