// JavaScript Document
$(document).ready(function(){
	$("#btConfirmar").click(function(){
					   
	});
	
	$(".btActualizar").each(function(){
		$(this).click(function(){
			$.ajax({
				data: "xdu="+$("#xdu").val()+"&xdp="+$(this).attr("data-idp")+"&cantidad="+$("#txtCant_"+$(this).attr("data-idp")).val()+"&Accion=ACTUALIZA", 
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
							actualizaTotal();
							actualizaItems();
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
			var xdp=$(this).attr("data-idp");				   
			if(confirm("Está a punto de eliminar este producto del carrito")){
				$.ajax({
					data: "xdp="+$(this).attr("data-idp")+"&Accion=ELIMINA", 
					type: "POST", 
					dataType: "html", 
					url: "operaciones.php", 
					beforeSend: function(objeto){
						$(this).attr("disabled",true);			
					},
					error: function(objeto, quepaso, otroobj){
						$(this).removeAttr("disabled");			
						//alert("Ha ocurrido un error, por favor intentelo más tarde.");
						TINY.box.show({html:'Ha ocurrido un error, por favor intentelo más tarde',animate:true,close:true,mask:false,boxid:'error',top:12, width:480});
					},
					success: function(data){ 
						if(data=="ELIMINO"){
							TINY.box.show({html:'Se ha eliminado sus orden con exito del carrito!',animate:true,close:true,mask:false,boxid:'success',top:12, width:480});
							actualizaTotal();
							actualizaItems();
							$(".idTabla_"+xdp).hide("slow");
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
			//$("#btSolicitar").removeAttr("disabled");			
			//alert("Ha ocurrido un error, por favor intentelo más tarde.");
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
			$("a.carrito").html("Mi pedido ("+data+")");
		} 
	});	
}