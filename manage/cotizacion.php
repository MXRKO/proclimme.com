<?
session_start();
include("../lib/php/settings.php");
include("../lib/php/conexion.php");
$xdpp=$_POST["xdpp"];	
$xds=$_POST["xds"];	
if(!isset($_POST["Accion"])){
	$sql_respuestas="SELECT*FROM respuestas WHERE id_solicitud='".$xds."'";
	$ej_respuestas=mysql_query($sql_respuestas);
	if(mysql_num_rows($ej_respuestas)>0){
		$respuesta=mysql_fetch_array($ej_respuestas);
		$txtDescripcion=$respuesta["descripcion"];
		$txtArchivo=$respuesta["nombre_archivo"];
	}
}
if($_POST["Accion"]=="GUARDAR" && !isset($respuesta)){
	if($_FILES["txtArchivo"]['size']>0){
		if(subirArchivo("cotizacion_".$xds.".".$extension,"txtArchivo","cotizaciones")){
			$extension=getExtension("txtArchivo");
			$inserta="INSERT INTO respuestas(id_solicitud,tipo,nombre_archivo,descripcion,fecha,formato) "; 
			$inserta=$inserta."VALUES('".$xds."','C','cotizacion_".$xds.".".$extension."','".$_POST["txtDescripcion"]."',now(),'".$extension."')";		
			$res=mysql_query($inserta);
		}
		else{
			$res=0;	
		}
	}else{
		$inserta="INSERT INTO respuestas(id_solicitud,tipo,nombre_archivo,descripcion,fecha,formato) "; 
		$inserta=$inserta."VALUES('".$xds."','C','','".$_POST["txtDescripcion"]."',now(),'')";		
		$res=mysql_query($inserta);
	}
	if($res==1){
		$respuesta="GUARDO";	
		$sql="SELECT*FROM respuestas WHERE id_solicitud='".$xds."' AND tipo='C'";
		$resql=mysql_query($sql);
		$datos=mysql_fetch_array($resql);
		$txtDescripcion=$datos["descripcion"];
		$txtArchivo=$datos["nombre_archivo"];
	}
	else{
		$respuesta="NOGUARDO";
	}
}

function subirArchivo($nombre,$nombreCampoArchivo,$carpeta){		
	if($_FILES[$nombreCampoArchivo]['tmp_name']!=""){
		$extension=getExtension($nombreCampoArchivo);
		if($extension!="NO"){
			try{
				$task=copy($_FILES[$nombreCampoArchivo]['tmp_name'],"../".$carpeta."/".$nombre.".".$extension) or die("[".$_FILES[$nombreCampoArchivo]['tmp_name']."] , porfavor notifique al adminstrador acerca de este error.");
				if(!$task)
					throw new Exception('Error al subir el archivo, porfavor contacte al administrador.');
			}catch(Exception $e){
				return "Descripcion del error:".$e->getMessage();
			}
			if(!$task) return false;
			return true;			
		}
		else{
			return false;	
		}
	}else{
		return false;	
	}
}

function getExtension($nombreCampoArchivo){
	if(strpos($_FILES[$nombreCampoArchivo]['name'],".pdf"))	$extension="pdf";
	else if(strpos($_FILES[$nombreCampoArchivo]['name'],".PDF"))	$extension="pdf";
	else if(strpos($_FILES[$nombreCampoArchivo]['name'],".doc"))	$extension="doc";
	else if(strpos($_FILES[$nombreCampoArchivo]['name'],".DOC"))	$extension="doc";
	else if(strpos($_FILES[$nombreCampoArchivo]['name'],".docx"))	$extension="docx";
	else if(strpos($_FILES[$nombreCampoArchivo]['name'],".DOCX"))	$extension="docx";
	else if(strpos($_FILES[$nombreCampoArchivo]['name'],".xls"))	$extension="xls";
	else if(strpos($_FILES[$nombreCampoArchivo]['name'],".XLS"))	$extension="XLS";
	else if(strpos($_FILES[$nombreCampoArchivo]['name'],".xlsx"))	$extension="xlsx";
	else if(strpos($_FILES[$nombreCampoArchivo]['name'],".XLSX"))	$extension="XLSX";
	else	$extension="NO";
	return $extension;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Datos de la cotización</title>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/reset.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/manage.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/cotizacion.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/redactor.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/tinybox2.css" rel="stylesheet" type="text/css" media="all" />
<script language="javascript" type="text/javascript" src="../lib/js/jquery-1.7.min.js"></script>
<script language="javascript" type="text/javascript" src="../lib/js/redactor.min.js"></script>
<script language="javascript" type="text/javascript" src="../lib/redactor/langs/es.js"></script>
<script language="javascript" type="text/javascript" src="../lib/js/tinybox2.js"></script>
<script language="javascript" type="text/javascript" src="cotizacion.js"></script>
</head>
<body>
<form id="Pedido" name="Pedido" method="get">
	<input type="hidden" name="xdpp" id="xdpp" value="<?=$xdpp?>"/>
</form>
<form id="Datos" name="Datos" method="post" enctype="multipart/form-data">
<input type="hidden" name="Accion" id="Accion" />
<input type="hidden" name="xdpp" id="xdpp" value="<?=$xdpp?>"/>
<input type="hidden" name="xds" id="xds" value="<?=$xds?>"/>
<input type="hidden" name="respuesta" id="respuesta" value="<?=$respuesta?>"/>
<div class="cabeza">
<div class="menu">
    <ul class="menu_cliente">
        <li><a class="seleccionado" href="<?=$menu_cliente["pedidos"]?>">Pedidos</a></li>
        <li><a href="<?=$menu_cliente["productos"]?>">Productos</a></li>
        <li><a href="<?=$menu_cliente["clientes"]?>">Clientes</a></li>
        <li><a href="<?=$menu_cliente["usuarios"]?>">Usuarios</a></li>
        <li><a href="<?=$menu_cliente["sitio"]?>">Ir al sitio</a></li>
        <li><a href="<?=$menu_cliente["salir"]?>">Salir</a></li>
    </ul>
    <div class="limpiar"></div>
</div>
</div>
<div class="contenido">
<fieldset>
  <legend>Requerimientos cotización</legend>	
  <?
    $sql_pedido="SELECT solicitudes.descripcion AS descripcion, productos.nombre AS nombre, productos.id FROM solicitudes, productos WHERE solicitudes.id='".$xds."' AND solicitudes.id_pedido='".$xdpp."' AND solicitudes.id_producto=productos.id";
	$ex_pedido=mysql_query($sql_pedido);
	$datos_solicitud=mysql_fetch_array($ex_pedido);
  ?>
  <table class="datos_cotizacion" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="9%">Producto</td>
      <td width="91%"><?=$datos_solicitud["nombre"]?></td>
    </tr>
    <tr>
      <td colspan="2">Datos de la cotización
        <textarea name="textarea" readonly="readonly" id="textarea" cols="45" rows="5"><?=$datos_solicitud["descripcion"]?></textarea></td>
      </tr>
  </table>
  </fieldset>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2">*Describa la cotización
      <textarea name="txtDescripcion" id="txtDescripcion" cols="45" rows="5" <?=(isset($respuesta))?"readonly='readonly'":"";?>><?=$txtDescripcion?></textarea></td>
  </tr>
  <tr>
    <td width="15%">agregar documento</td>
    <td width="85%">
      <?
    	if(trim($txtArchivo)!=""){
			?>
      <a href="../cotizaciones/<?=$txtArchivo?>" >Archivo de Cotizacion</a>
      <?
		}else if(isset($respuesta)){
			?>
      <a href="#" >No se adjunto documento</a>
      <?
		}else{
	?>
      <input type="file" name="txtArchivo" id="txtArchivo" />
      <?
		}
	?></td>
  </tr>
  <tr>
    <td colspan="2"><p class="nota">Todos los campos marcados con (*) asterisco son obligatorios</p></td>
    </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><input type="button" name="btEnviar" id="btEnviar" value="Enviar" <?=(isset($respuesta))?"disabled='disabled'":"";?> />
      <input type="button" name="btPedido" id="btPedido" value="Pedido" /></td>
    </tr>
</table>
</div>
<div class="fondo"></div>
</form>
</body>
</html>