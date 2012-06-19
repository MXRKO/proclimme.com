// JavaScript Document
$(document).ready(function(){
	if($("#btModificar").hasClass(".novisible")){
		$(this).attr("disabled","disabled");
	}
	if($("#btGuardar").hasClass(".novisible")){
		$(this).attr("disabled","disabled");
	}
	if($("#btEliminar").hasClass(".novisible")){
		$(this).attr("disabled","disabled");
	}
	$("#btGuardar").click(function(){
		if($("#btContrasena").val()===$("#btReContrasena").val()){
			alert('radio='+$("#estatus:checked").val())
			$("#Accion").val("GUARDAR");
			
			//$("#Datos").submit();								   
		}
		else{
			alert("Las contraseñas especificadas, no coinciden");	
		}
	});
});