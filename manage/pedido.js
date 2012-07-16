$(document).ready(function(){
	var buttons = new Array('formatting', '|', 'bold', '|','italic', '|','justify','fullscreen', '|', 'table', '');	
	$('.redactor').redactor({
		focus: true, 
		xhtml:true,
		lang: 'es',
		clanUp: true,
		buttons: buttons
	});
	
	$("#btEnviar").click(function(){
		/*$(".redactor").each(function(){
			alert($(this).getCode());						
		});*/
		var errors=0;
		$(".solicitud").each(function(){
			if($("input:radio[name=radio"+$(this).attr("data-")+"]:nth(0)").attr("checked")==true){
				
			}else if($("input:radio[name=estatus]:nth(1)").attr("checked")==true){
				
			}
			else{
				errors++;	
			}
		});
	});
});

function mostrar(opcion,id){
	//alert('Click en la opcion:'+opcion+', con el ID:'+id);
	if(opcion=="cotizacion"){
		$(".material"+id).css({'display':'none'});
		$(".cotizacion"+id).css({'display':'block'});
	}
	else{
		$(".cotizacion"+id).css({'display':'none'});
		$(".material"+id).css({'display':'block'});
	}
}

function listenerFile(id,id_solicitud){
	var valor=$("#txtMaterial"+id_solicitud+"_"+id).val();							  
	//alert("#txtMaterial"+id_solicitud+"_"+id);
	var extencion=valor.split(".");
	if(extencion[extencion.length-1]=="jpg"||extencion[extencion.length-1]=="jpeg"||extencion[extencion.length-1]=="JPG"||extencion[extencion.length-1]=="JPEG"||extencion[extencion.length-1]=="png"||extencion[extencion.length-1]=="PNG" ||extencion[extencion.length-1]=="doc"||extencion[extencion.length-1]=="DOC"||extencion[extencion.length-1]=="docx"||extencion[extencion.length-1]=="DOCX"||extencion[extencion.length-1]=="xls"||extencion[extencion.length-1]=="XLS"||extencion[extencion.length-1]=="xlsx"||extencion[extencion.length-1]=="XLSX"){
		if(ultimo(id,id_solicitud)){
			var temp=get_tabla_solicitud_material(parseInt(id)+1,id_solicitud);
			$(".material"+id_solicitud).append(temp);
		}
	}
	else{
		TINY.box.show({html:'Debe ser una extención de archivo valida, word, excell o formatos de imagen como (jpg, png, gif)',animate:false,close:true,mask:false,boxid:'error',top:3, width:480})	
	}
}

function get_tabla_solicitud_material(id,id_solicitud){
	var msj="<table width='100%' id='tSolicitudMaterial"+id_solicitud+"_"+id+"' border='0' cellspacing='0' cellpadding='0' class='tItemSolicitud' >";
		msj+="<tr>";
        msj+="<td width='11%'>Archivo</td>";
        msj+="<td width='89%'><input type='file' data-id-solicitud='"+id_solicitud+"' name='txtMaterial"+id_solicitud+"_"+id+"' id='txtMaterial"+id_solicitud+"_"+id+"' onchange='listenerFile(\""+id+"\",\""+id_solicitud+"\");' data-contador='"+id+"'/>"; 
		msj+="<input type='button' value='- Eliminar' onclick='eliminar(\"#tSolicitudMaterial"+id_solicitud+"_"+id+"\");' /></td>";
        msj+="</tr>";
        msj+="<tr>";
        msj+="<td colspan='2'><p>Observaciones:</p>";
        msj+="<textarea id='txtObervaciones"+id_solicitud+"_"+id+"'></textarea></td>";
        msj+="</tr>";
        msj+="<tr>";
        msj+="<td colspan='2'><p>*Una vez que haya seleccionado un archivo o escrito en el campo observaciones aparecera automaticamente los campos para subir otro archivo </p></td>";	
        msj+="</tr>";
        msj+="</table>";
	return msj;	
}

function ultimo(id_actual,id_solicitud){
	var temp="";
	$(".material"+id_solicitud+" input[type=file]").each(function(){
		temp=$(this).attr("data-contador");
	});
	if(temp==id_actual)
		return true;
	else
		return false;
}

function eliminar(id){
	$(id).remove();
}