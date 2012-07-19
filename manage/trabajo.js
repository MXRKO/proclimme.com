$(document).ready(function(){
	if($("#respuesta").val()=="GUARDO"){
		$("#btEnviar").attr("disabled",true);
		TINY.box.show({html:'Se han enviado los datos correctamente',animate:true,close:true,mask:false,boxid:'success',top:6, width:480});	
	}					   
	if($("#respuesta").val()=="NOGUARDO"){
		TINY.box.show({html:'Se ha producido un error por favor intentelo nuevamente, ',animate:true,close:true,mask:false,boxid:'error',top:6, width:480});		
	}
	$("#btEnviar").click(function(){
		var errors=0;
		/*$("input[type=file]").each(function(i,j){
			alert("contador: "+$("#"+j.name).attr("data-contador"))									
		});*/
		$("input[type=file]").each(function(i,j){
			var actual="#"+j.name;
			if($.trim($(this).val())!=""){
				$("#ultimo").val($(actual).attr("data-contador"));
			}
			else{
				if($("input[type=file]").size()!=i+1){
					errors++;
				}
			}
		});
		if(errors<1){
			$("#Accion").val("GUARDAR");
			$("#Datos").attr("action","trabajo.php");
			$("#Datos").submit();
		}
		else{
			TINY.box.show({html:'Los campos marcados con (*) asterisco no deben estar vacios',animate:true,close:true,mask:false,boxid:'error',top:6, width:480});
		}
	});						   
	
	$("#btPedido").click(function(){
		$("#Pedido").attr("action","pedido.php");
		$("#Pedido").submit();		
	});
	
	$("input[type=file]:first-child").change(function(){
		var xds=$(this).attr("data-id-solicitud");
		agregaCampo(1,xds);
	});
});

function agregaCampo(id, xds){
	if($.trim($("#txtArchivo"+xds+"_"+id).val())!="" && ultimoId(id)){
		$("#divArchivos").append(campoArchivo(id,xds));
		$("#txtArchivo"+xds+"_"+parseInt(parseInt(id)+1)).ready(function(){
			$("#txtArchivo"+xds+"_"+parseInt(parseInt(id)+1)).bind("change",function(e){
				agregaCampo(parseInt(parseInt(id)+1),xds);													   
			});
		});
		$("#btEliminar"+xds+"_"+parseInt(parseInt(id)+1)).ready(function(){
			$("#btEliminar"+xds+"_"+parseInt(parseInt(id)+1)).bind("click",function(){
				$("#div"+xds+"_"+parseInt(parseInt(id)+1)).hide("slow").remove();
			});
		});
	}	
}

function eliminaCampo(id, xds){
	
}
function ultimoId(id){
	var temp="";
	$("input[type=file]").each(function(){
		temp=$(this).attr("data-contador");
	});	
	if(id==temp)
		return true;
	else
		return false;
}

function campoArchivo(id,xds){
	var nuevo='<div class="item" data-id-solicitud="'+xds+'_'+parseInt(parseInt(id)+1)+'" id="div'+xds+'_'+parseInt(parseInt(id)+1)+'">';
    	nuevo+='<table width="100%" border="0">';
        nuevo+='<tr>';
        nuevo+='<td width="17%"><span class="caracteristica">*Archivo de trabajo</span></td>';
        nuevo+='<td width="83%"><label>';
        nuevo+='<input data-contador="'+parseInt(parseInt(id)+1)+'" data-id-solicitud="'+xds+'" type="file" name="txtArchivo'+xds+'_'+parseInt(parseInt(id)+1)+'" id="txtArchivo'+xds+'_'+parseInt(parseInt(id)+1)+'" />';
        nuevo+='</label></td>';
        nuevo+='</tr>';
        nuevo+='<tr>';
        nuevo+='<td colspan="2"><span class="caracteristica">Descripcion del archivo<span>';
        nuevo+='<textarea name="txtDescripcion'+xds+'_'+parseInt(parseInt(id)+1)+'" id="txtDescripcion'+xds+'_'+parseInt(parseInt(id)+1)+'" cols="45" rows="5"></textarea>';
        nuevo+='<input name="btEliminar'+xds+'_'+parseInt(parseInt(id)+1)+'" id="btEliminar'+xds+'_'+parseInt(parseInt(id)+1)+'" data-contador="'+parseInt(parseInt(id)+1)+'" type="button" value="X" class="item_eliminar" />';
		nuevo+='</td>';
        nuevo+='</tr>';
        nuevo+='</table>';
    	nuevo+='</div>';
	return nuevo;
}