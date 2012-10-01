// JavaScript Document
$(document).ready(function(){
	$("#btEnviar").click(function(){
		enviar();	
	});
});

function enviar(){
	if($.trim($("#txtDescripcion").val())!="" && $.trim($("#txtCorreo").val())!=""){
		$.ajax({
			data: "correo="+$("#txtCorreo").val()+"&descripcion="+$("#txtDescripcion").val()+"&Accion=PEDIDOSINUSUARIONIPRODUCTO", 
			type: "POST", 
			dataType: "html", 
			url: "pedido.php", 
			beforeSend: function(objeto){
				$("#btEnviar").attr("disabled",true);			
			},
			error: function(objeto, quepaso, otroobj){
				$("#btEnviar").removeAttr("disabled");			
				alert("Ha ocurrido un error, por favor intentelo más tarde.,"+quepaso);
			},
			success: function(data){ 
				if(data=="REALIZOPEDIDOSINUSUARIONIPRODUCTO"){
					$("#btEnviar").hide("slow");
					/*$("#btCancelar").removeClass("novisible").show("slow");*/
					//$("#btAceptar").removeClass("novisible").show();
					TINY.box.show({html:'Los detalles de su cotizaci&oacute;n han sido enviados con &eacute;xito, a la brevedad nos pondremos en contacto con usted',animate:false,close:true,mask:false,boxid:'success',top:3, width:480});
					//$(".respuesta").hide().show("slow").addClass("exito").html("Se ha realizado con exito el pedido, pronto uno de nuestro colaboradores se pondra en contacto con usted!.");
				}
				else{
					alert('Ha ocurrido un error inesperado, por favor intentelo más tarde.');	
				}
			} 
		});	
	}else{
		alert('Debe escribir un correo electronico valido para poder contactarlo y los requisitos de su cotización.');
	}
}