// JavaScript Document
$(document).ready(function(){
	$("#btSesion").click(function(){
		window.location.href="login.php";							  
	});
	
	$(".aProducto").click(function(){
		/*TINY.box.show({iframe:'video.html',animate:true,close:true,boxid:'frameless',width:505,height:400,fixed:true});*/
		TINY.box.show({image:$("a.aProducto img").attr("data-url"),boxid:'frameless',animate:true,width:$("a.aProducto img").attr("data-width"),height:$("a.aProducto img").attr("data-height"),fixed:true});
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
			TINY.box.show({url:'pedido.php',post:'xdp='+$("#xdp").val()+'&xdc='+$("#xdc").val()+'&cant='+$("#txtCantidad").val(),animate:true,close:false,mask:true,boxid:'frameless', height:390, width:480, fixed:true});	
		});
	}
});

function confirmar(){
	//alert("Funcionalidad en desarrollo..."); 
	$.ajax({
		data: "xdu="+$("#xdu").val()+"&xdp="+$("#xdp").val()+"&cant="+$("#txtCantidad").val()+"&Accion=PEDIDO", 
		type: "POST", 
		dataType: "html", 
		url: "pedido.php", 
		beforeSend: function(objeto){
			$("#btConfirmar #btCancelar").attr("disabled",true);			
		},
		error: function(objeto, quepaso, otroobj){
			$("#btConfirmar #btCancelar").removeAttr("disabled");			
			alert("Ha ocurrido un error, por favor intentelo más tarde.");
		},
		success: function(data){ 
			if(data=="REALIZOPEDIDO"){
				$("#btAceptar").removeClass("novisible");
				$("#btConfirmar").hide("slow");
				$("#btCancelar").hide("slow");
				$(".respuesta").hide().show("slow").addClass("exito").html("Se ha realizado con exito el pedido, pronto uno de nuestro colaboradores se pondra en contacto con usted!.");
			}
		} 
	});
}

function cancelar(){
	TINY.box.hide();	
}