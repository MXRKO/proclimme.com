// JavaScript Document
$(document).ready(function(){
	$("#btSesion").click(function(){
		window.location.href="login.php";							  
	});
	
	$(".aProducto").click(function(){
		/*TINY.box.show({iframe:'video.html',animate:true,close:true,boxid:'frameless',width:505,height:400,fixed:true});*/
		TINY.box.show({image:$("a.aProducto img").attr("data-url"),boxid:'frameless',animate:true,width:$("a.aProducto img").attr("data-width"),height:$("a.aProducto img").attr("data-height"),fixed:false,top:34});
	});
	
	$("#btPedido").click(function(){
		alert("En desarrollo");
	});
	
	if($.trim($("#xdc").val())==""){
		$("#btSolicitar").click(function(){
			TINY.box.show({html:'Los administradores no pueden solicitar productos desde el portal',animate:false,close:true,mask:false,boxid:'error',top:3, width:480});
		});	
	}
	else{
		$("#btSolicitar").click(function(){
			agregar();
			//TINY.box.show({url:'pedido.php',post:'xdp='+$("#xdp").val()+'&xdc='+$("#xdc").val()+'&cant='+$("#txtCantidad").val(),animate:true,close:false,mask:true,boxid:'frameless', height:390, width:480, fixed:true});	
		});
	}
	
	$("#btSolicitar_ss").click(function(){
		TINY.box.show({url:'pedido.php',post:'xdp='+$("#xdp").val(),animate:true,close:false,mask:true,boxid:'frameless', height:390, width:480, fixed:true});	
	});
	
	$("#btModificar").click(function(){
		window.location.href="clientes/micarrito.php";								 
	});
});

function agregar(){
	//alert("Funcionalidad en desarrollo..."); 
	$.ajax({
		data: "xdu="+$("#xdu").val()+"&xdp="+$("#xdp").val()+"&Accion=PEDIDO", 
		type: "POST", 
		dataType: "html", 
		url: "pedido.php", 
		beforeSend: function(objeto){
			$("#btSolicitar").attr("disabled",true);			
		},
		error: function(objeto, quepaso, otroobj){
			$("#btSolicitar").removeAttr("disabled");			
			alert("Ha ocurrido un error, por favor intentelo más tarde.");
		},
		success: function(data){ 
			if(data=="REALIZOPEDIDO"){
				//$("#btAceptar").removeClass("novisible");
				$("#btSolicitar").hide("slow");
				$("#txtCantidad").hide("slow");
				$("#btModificar").removeClass("novisible").show("slow");
				var total=parseInt($("#cant_items").html());
				total++;
				$("#cant_items").html(total);
				TINY.box.show({html:'Su pedido ha sido agregado al carrito',animate:false,close:true,mask:false,boxid:'success',top:3, width:480});
				//$(".respuesta").hide().show("slow").addClass("exito").html("Se ha realizado con exito el pedido, pronto uno de nuestro colaboradores se pondra en contacto con usted!.");
			}
		} 
	});
}

function enviar(){
	if($.trim($("#txtDescripcion").val())!="" && $.trim($("#txtCorreo").val())!=""){
		$.ajax({
			data: "&xdp="+$("#xdp").val()+"&correo="+$("#txtCorreo").val()+"&descripcion="+$("#txtDescripcion").val()+"&Accion=PEDIDOSINUSUARIO", 
			type: "POST", 
			dataType: "html", 
			url: "pedido.php", 
			beforeSend: function(objeto){
				$("#btEnviar").attr("disabled",true);			
			},
			error: function(objeto, quepaso, otroobj){
				$("#btEnviar").removeAttr("disabled");			
				alert("Ha ocurrido un error, por favor intentelo más tarde.");
			},
			success: function(data){ 
				if(data=="REALIZOPEDIDOSINUSUARIO"){
					$("#btEnviar").hide("slow");
					/*$("#btCancelar").removeClass("novisible").show("slow");*/
					$("#btAceptar").removeClass("novisible").show();
					TINY.box.show({html:'Los detalles de su cotización han sido enviados con éxito, a la brevedad nos pondremos en contacto con usted',animate:false,close:true,mask:false,boxid:'success',top:3, width:480});
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
function cancelar(){
	TINY.box.hide();	
}