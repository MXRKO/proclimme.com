<?
	session_start();
	include("../lib/php/conexion.php");
	include("../lib/php/settings.php");
	if(isset($_POST["Accion"]) && $_POST["Accion"]=="GUARDAR"){
		if(trim($_POST["xdp"])==""){
			$inserta="insert into productos "; 
			$inserta.="(nombre,"; 
			$inserta.="descripcion_corta,"; 
			$inserta.="descripcion,";
			$inserta.="formatos_entrega,"; 
			$inserta.="medio_entrega,"; 
			$inserta.="estatus,"; 
			$inserta.="fecha_creacion,"; 
			$inserta.="ultima_modificacion,"; 
			$inserta.="mostrar_principal";
			$inserta.=")";
			$inserta.="values";
			$inserta.="('".$_POST["txtNombreProducto"]."',"; 
			$inserta.="'".$_POST["txtDescripcionBreve"]."',"; 
			$inserta.="'".$_POST["txtDescripcionDetallada"]."',"; 
			$inserta.="'".$_POST["txtFormatosEntrega"]."',"; 
			$inserta.="'".$_POST["txtMedioEntrega"]."',"; 
			$inserta.="'".$_POST["estatus"]."',"; 
			$inserta.="now(),"; 
			$inserta.="now(),"; 
			$inserta.="'".$_POST["mostrar"]."'";
			$inserta.=")";
		}
		else{
			$inserta="update productos ";
			$inserta.="set ";
			$inserta.="nombre = '".$_POST["txtNombreProducto"]."', "; 
			$inserta.="descripcion_corta = '".$_POST["txtDescripcionBreve"]."', "; 
			$inserta.="descripcion = '".$_POST["txtDescripcionDetallada"]."', "; 
			$inserta.="formatos_entrega = '".$_POST["txtFormatosEntrega"]."', "; 
			$inserta.="medio_entrega = '".$_POST["txtMedioEntrega"]."', "; 
			$inserta.="estatus = '".$_POST["estatus"]."', "; 
			$inserta.="ultima_modificacion = now(), "; 
			$inserta.="mostrar_principal = '".$_POST["mostrar"]."' ";
			$inserta.="where id = '".$_POST["xdp"]."'";	
		}
		$exito=mysql_query($inserta);
		if($exito==1){
			$respuesta="GUARDO";	
		}	
		else{
			$respuesta="NOGUARDO";	
		}
	}
	if($_POST['Accion']=="ELIMINAR"){
		$eliminar="delete from proclimme_db.productos where id = '".$_POST["xdp"]."'";	
		$exito=mysql_query($eliminar);
		if($exito==1){
			$respuesta="ELIMINO";
		}
		else{
			$respuesta="NOELIMINO";	
		}
	}
	if(isset($_POST["xdp"])){
		$xdp=$_POST["xdp"];
		$sql="SELECT*FROM productos WHERE id='".$xdp."'";
		$ejsql=mysql_query($sql);
		$datos=mysql_fetch_array($ejsql);
		
		$txtNombreProducto=$datos["nombre"];
		$txtDescripcionBreve=$datos["descripcion_corta"];
		$txtFormatosEntrega=$datos["formatos_entrega"];
		$txtMedioEntrega=$datos["medio_entrega"];
		$txtDescripcionDetallada=$datos["descripcion"];
	}
	
	function subirArchivo($nombre,$nombreCampoArchivo,$carpeta){		
		if($_FILES[$nombreCampoArchivo]['tmp_name']!=""){
			try{
				$task=copy($_FILES[$nombreCampoArchivo]['tmp_name'],"../".$carpeta."/".$nombre) or die("[".$_FILES[$nombreCampoArchivo]['tmp_name']."] , porfavor notifique al adminstrador acerca de este error.");
				if(!$task)
					throw new Exception('Error al subir el archivo, porfavor contacte al administrador.');
			}catch(Exception $e){
				return "Descripcion del error:".$e->getMessage();
			}
			if(!$task) return false;
			return true;			
			
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
<title>Producto</title>
<link href="../lib/css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="../lib/css/manage.css" rel="stylesheet" type="text/css" media="all" />
<link href="../lib/css/productos.css" rel="stylesheet" type="text/css" media="all" />
<link href="../lib/css/tinybox2.css" rel="stylesheet" type="text/css" media="all" />
<script language="javascript" type="text/javascript" src="../lib/js/jquery-1.7.min.js"></script>
<script language="javascript" type="text/javascript" src="../lib/js/jquery.sisyphus.js"></script>
<script language="javascript" type="text/javascript" src="../lib/js/tinybox2.js"></script>
<script language="javascript" type="text/javascript" src="producto.js"></script>
</head>
<body>
<form name="Datos" id="Datos" method="post" action="<?=$_SERVER['PHP_SELF']?>">
<input type="hidden" id="Accion" name="Accion" />
<input type="hidden" id="xdp" name="xdp" value="<?=$xdp?>" />
<input type="hidden" id="respuesta" name="respuesta" value="<?=$respuesta?>" />
<div class="cabeza">
<div class="menu">
    <ul class="menu_cliente">
        <li><a href="<?=$menu_cliente["pedidos"]?>">Pedidos</a></li>
        <li><a class="seleccionado" href="<?=$menu_cliente["productos"]?>">Productos</a></li>
        <li><a href="<?=$menu_cliente["clientes"]?>">Clientes</a></li>
        <li><a href="<?=$menu_cliente["usuarios"]?>">Usuarios</a></li>
        <li><a href="<?=$menu_cliente["sitio"]?>">Ir al sitio</a></li>
        <li><a href="<?=$menu_cliente["salir"]?>">Salir</a></li>
    </ul>
    <div class="limpiar"></div>
</div>
</div>
<div class="contenido">
<fieldset><legend>Datos del Producto</legend>
  <table width="100%" border="0" class="formulario">
    <tr>
      <td width="21%">*Nombre del producto</td>
      <td colspan="2"><input name="txtNombreProducto" type="text" id="txtNombreProducto" size="102" value="<?=$txtNombreProducto?>"/></td>
    </tr>
    <tr>
      <td>*Estatus</td>
      <td width="11%"><label>
    <input type="radio" name="estatus" id="estatus" value="1" checked="checked" />
      Habilitado</label></td>
    <td width="68%">
    <label>
    <input type="radio" name="estatus" id="estatus" value="0" />
      Deshabilitado</label></td>
    </tr>
    <tr>
      <td>*Mostrar en página principal</td>
      <td><label>
        <input type="radio" name="mostrar" id="mostrar" value="1" checked="checked" />
        Si</label></td>
      <td><label>
        <input type="radio" name="mostrar" id="mostrar" value="0" />
        No</label></td>
      </tr>
    <tr>
      <td>*Descripción breve</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><label>
        <textarea name="txtDescripcionBreve" id="txtDescripcionBreve" cols="102" rows="5"><?=$txtDescripcionBreve?></textarea>
      </label></td>
      </tr>
    <tr>
      <td>*Formatos de entrega</td>
      <td colspan="2"><input type="text" name="txtFormatosEntrega" size="102" id="txtFormatosEntrega" value="<?=$txtFormatosEntrega?>" /></td>
    </tr>
    <tr>
      <td>*Medio de entrega</td>
      <td colspan="2"><input type="text" name="txtMedioEntrega" size="102" id="txtMedioEntrega" value="<?=$txtMedioEntrega?>" /></td>
    </tr>
    <tr>
      <td>*Descripción detallada</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><textarea name="txtDescripcionDetallada" id="txtDescripcionDetallada" cols="102" rows="10"><?=$txtDescripcionDetallada?></textarea></td>
      </tr>
    <tr>
      <td>Imágen del producto</td>
      <td colspan="2"><label>
        <input type="file" name="txtArchivo" id="txtArchivo" />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><label>
        <input type="button" name="btGuardar" id="btGuardar" value="Guardar" />
        <input type="button" name="btEliminar" id="btEliminar" value="Eliminar" />
      </label></td>
      </tr>
  </table>
</fieldset>
</div>
<div class="fondo">
<p>Sistema de administración de contenido de PROCLIMME</p>
</div>
</form>
</body>
</html>