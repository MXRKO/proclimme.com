// JavaScript Document
$(document).ready(function(){
	$("#btGuardar").click(function(){
		$("#Accion").val("GUARDAR");
		$("#Datos").submit();
	});
	
	$("#btEliminar").click(function(){
		if(confirm("¿Esta seguro de eliminar esta noticia?")){
			alert($("#idn").val());
			$("#Accion").val("ELIMINAR");
			$("#Datos").submit();
		}
	});
	
	switch($("#resultado").val()){
		case 'GUARDO':
			TINY.box.show({html:'Se han guardado los datos correctamente',animate:false,close:true,mask:false,boxid:'success',top:3, width:480})
		break;
		case 'NOGUARDO':
			TINY.box.show({html:'No guardo, intentelo de nuevo!',animate:false,close:true,mask:false,boxid:'error',top:3, width:480})
		break;
		case 'ELIMINO':
			TINY.box.show({html:'Se ha eliminado la noticia!',animate:false,close:true,mask:false,boxid:'success',top:3, width:480})
		break;
		case 'NOEXISTENOELIMINO':
			TINY.box.show({html:'No se encontro la noticia que desea eliminar!',animate:false,close:true,mask:false,boxid:'error',top:3, width:480})
		break;
		case 'MODIFICO':
			TINY.box.show({html:'Se han actualizado los datos correctamente',animate:false,close:true,mask:false,boxid:'success',top:3, width:480})
		break;
		case 'NOMODIFICO':
			TINY.box.show({html:'No se ha podido actualizar los datos, intenlo mas tarde',animate:false,close:true,mask:false,boxid:'success',top:3, width:480})
		break;
	}
});