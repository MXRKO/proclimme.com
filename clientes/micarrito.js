// JavaScript Document
$(document).ready(function(){
	var pedidos="";					   
	$(".pedido .confirmacion input[type=image]").each(function(){
		pedidos=$(this).attr("xdp")+"|";			  
	});					   
	$("#btConfirmar").click(function(){	
		//var pedidos="";
		var pedidos=new Array();
		var errors=0;
		$(".pedido table textarea.descripcion").each(function(){
			if($.trim($(this).val())==""){
				errors++;
			}		
		});
		if(errors<1){
			$.ajax({
				data: "xdu="+$("#xdu").val()+"&xdpp="+$("#xdpp").val()+"&Accion=CONFIRMAR", 
				type: "POST", 
				dataType: "html", 
				url: "operaciones.php", 
				beforeSend: function(objeto){
					$(this).attr("disabled",true);			
				},
				error: function(objeto, quepaso, otroobj){
					$(this).removeAttr("disabled");			
					TINY.box.show({html:'Ha ocurrido un error, por favor intentelo más tarde',animate:true,close:true,mask:false,boxid:'error',top:12, width:480});
				},
				success: function(data){ 
					switch(data){
						case 'CONFIRMO':
							$(".pedido table textarea").each(function(){
								$(this).attr("readonly",true);										  
							});
							$(".pedido table input[type=image]").each(function(){
								$(this).remove();			  
							});	
							TINY.box.show({html:'Se ha confirmado el pedido, en breve lo contactaremos para mas detalles',animate:true,close:true,mask:false,boxid:'success',top:12, width:480});
						break;
						case 'NOCONFIRMO':
							$(this).removeAttr("disabled");			
							TINY.box.show({html:'Ha ocurrido un error, por favor contacte al administrador del sistema',animate:true,close:true,mask:false,boxid:'error',top:12, width:480});
						break;
					}
				} 
			});
		}
		else{
			TINY.box.show({html:'¡Debe especificar los requisitos de cada cotización de los productos que le interesen!.',animate:true,close:true,mask:false,boxid:'error',top:12, width:480});	
		}
	});
	
	$(".btActualizar").each(function(){
		$(this).click(function(){
			$.ajax({
				data: "xdu="+$("#xdu").val()+"&xdpp="+$(this).attr("data-idpp")+"&xdst="+$(this).attr("data-idst")+"&descripcion="+$("#txtDescripcion_"+$(this).attr("data-idst")).val()+"&Accion=ACTUALIZA", 
				type: "POST", 
				dataType: "html", 
				url: "operaciones.php", 
				beforeSend: function(objeto){
					$(this).attr("disabled",true);			
				},
				error: function(objeto, quepaso, otroobj){
					$(this).removeAttr("disabled");			
					TINY.box.show({html:'Ha ocurrido un error, por favor intentelo más tarde',animate:true,close:true,mask:false,boxid:'error',top:12, width:480});
				},
				success: function(data){ 
					switch(data){
						case 'ACTUALIZO':
							$("#btModificar").removeAttr("disabled");
							TINY.box.show({html:'Se ha actualizado el pedido',animate:true,close:true,mask:false,boxid:'success',top:12, width:480});
							//actualizaTotal();
							//actualizaItems();
						break;
						case 'NOACTUALIZO':
							$("#btModificar").removeAttr("disabled");
							TINY.box.show({html:'Ha ocurrido un error, por favor contacte al administrador del sistema',animate:true,close:true,mask:false,boxid:'error',top:12, width:480});
						break;
					}
				} 
			});
		});								 
	});						   
	
	$(".btEliminar").each(function(){
		$(this).click(function(){
			var xdst=$(this).attr("data-idst");				   
			if(confirm("Está a punto de eliminar este producto del carrito")){
				$.ajax({
					data: "xdpp="+$(this).attr("data-idpp")+"&xdst="+$(this).attr("data-idst")+"&Accion=ELIMINA", 
					type: "POST", 
					dataType: "html", 
					url: "operaciones.php", 
					beforeSend: function(objeto){
						$(this).attr("disabled",true);			
					},
					error: function(objeto, quepaso, otroobj){
						$(this).removeAttr("disabled");			
						TINY.box.show({html:'Ha ocurrido un error, por favor intentelo más tarde',animate:true,close:true,mask:false,boxid:'error',top:12, width:480});
					},
					success: function(data){ 
						if(data=="ELIMINO"||data=="ELIMINOTODO"){
							TINY.box.show({html:'Se ha eliminado sus orden con exito del carrito!',animate:true,close:true,mask:false,boxid:'success',top:12, width:480});
							actualizaItems();
							$(".idTabla_"+xdst).hide("slow", function(){
								$(this).remove()									 
							});
						}
						else{
							TINY.box.show({html:'Ha ocurrido un error, por favor contacte al administrador',animate:true,close:true,mask:false,boxid:'error',top:12, width:480});
						}
					} 
				});		
			}					   
		});			  
	});
});

function actualizaTotal(){
	$.ajax({
		data: "xdu="+$("#xdu").val()+"&Accion=ACTUALIZA_TOTAL", 
		type: "POST", 
		dataType: "html", 
		url: "operaciones.php", 
		error: function(objeto, quepaso, otroobj){
		},
		success: function(data){ 
			$(".detalle span.item_data").html("$ "+data+" MXN");
		} 
	});	
}

function actualizaItems(){
	$.ajax({
		data: "xdu="+$("#xdu").val()+"&Accion=ACTUALIZA_ITEMS", 
		type: "POST", 
		dataType: "html", 
		url: "operaciones.php", 
		error: function(objeto, quepaso, otroobj){
			//$("#btSolicitar").removeAttr("disabled");			
			//alert("Ha ocurrido un error, por favor intentelo más tarde.");
		},
		success: function(data){ 
			$("a.totales").html("Cotizaciones ("+data+")");
		} 
	});	
}