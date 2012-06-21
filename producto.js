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
	if($.trim($("#idc").val())==""){
		$("#btSolicitar").click(function(){
			TINY.box.show({html:'Los administradores no pueden solicitar productos desde el portal',animate:false,close:true,mask:false,boxid:'error',top:3, width:480});
		});	
	}
	else{
		$("#btSolicitar").click(function(){
			TINY.box.show({html:'Confirmación del pedido',animate:false,close:true,mask:false,boxid:'frameless', height:390, width:480, fixed:true});	
		});
	}
});