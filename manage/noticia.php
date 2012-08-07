<?
	session_start();
	include("../lib/php/conexion.php");
	include("../lib/php/settings.php");
	
	switch($_POST["Accion"]){
		case 'GUARDAR':
			
		break;
		case 'MODIFICAR':
			
		break;
		case 'ELIMINAR':
			$sql="SELECT*FROM usuarios WHERE id='".$_POST["idu"]."'";
			$ejsql=mysql_query($sql);
			if(mysql_num_rows($ejsql)>0){
				$eliminar="DELETE FROM usuarios WHERE id='".$_POST["idu"]."'";
				mysql_query($eliminar);
				$resultado="ELIMINO";
				$_POST["idu"]="";
			}
		break;
	}
	
	function subirArchivo($nombre,$nombreCampoArchivo, $extension){		
		if($_FILES[$nombreCampoArchivo]['tmp_name']!=""){
			try{
				$taskMin=copy($_FILES[$nombreCampoArchivo]['tmp_name'],"../media/productos/".$nombre."_min.".$extension) or die("[".$_FILES[$nombreCampoArchivo]['tmp_name']."] , porfavor notifique al adminstrador acerca de este error.");
				$taskThumb=copy($_FILES[$nombreCampoArchivo]['tmp_name'],"../media/productos/".$nombre."_thumb.".$extension) or die("[".$_FILES[$nombreCampoArchivo]['tmp_name']."] , porfavor notifique al adminstrador acerca de este error.");
				$task=copy($_FILES[$nombreCampoArchivo]['tmp_name'],"../media/productos/".$nombre.".".$extension) or die("[".$_FILES[$nombreCampoArchivo]['tmp_name']."] , porfavor notifique al adminstrador acerca de este error.");
				if(!$task && !$taskMin && !$taskThumb)
					throw new Exception('Error al subir el archivo, porfavor contacte al administrador.');
				else{
					$resizeObj = new resize("../media/productos/".$nombre."_thumb.".$extension);
					$resizeObj -> resizeImage(109, 74, 'exact');// Resize image (options: exact, portrait, landscape, auto, crop)
					$resizeObj -> saveImage("../media/productos/".$nombre."_thumb.".$extension, 50);					
					
					$resizeObj = new resize("../media/productos/".$nombre."_min.".$extension);
					$resizeObj -> resizeImage(606, 300, 'exact');// Resize image (options: exact, portrait, landscape, auto, crop)
					$resizeObj -> saveImage("../media/productos/".$nombre."_min.".$extension, 50);					
				}
			}catch(Exception $e){
				return "Descripcion del error:".$e->getMessage();
			}
			if(!$task && !task1) return false;
			return true;			
			
		}else{
			return false;	
		}
	}

	function getExtension($nombreCampoArchivo){
		if(strpos($_FILES[$nombreCampoArchivo]['name'],".pdf"))	$extension="pdf";
		else if(strpos($_FILES[$nombreCampoArchivo]['name'],".JPG"))	$extension="JPG";
		else if(strpos($_FILES[$nombreCampoArchivo]['name'],".jpg"))	$extension="jpg";
		else if(strpos($_FILES[$nombreCampoArchivo]['name'],".JPEG"))	$extension="JPEG";
		else if(strpos($_FILES[$nombreCampoArchivo]['name'],".jpeg"))	$extension="jpeg";
		else if(strpos($_FILES[$nombreCampoArchivo]['name'],".PNG"))	$extension="PNG";
		else if(strpos($_FILES[$nombreCampoArchivo]['name'],".png"))	$extension="png";
		else if(strpos($_FILES[$nombreCampoArchivo]['name'],".GIF"))	$extension="GIF";
		else if(strpos($_FILES[$nombreCampoArchivo]['name'],".gif"))	$extension="gif";
		else	$extension="NO";
		return $extension;
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="../lib/css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="../lib/css/manage.css" rel="stylesheet" type="text/css" media="all" />
<link href="../lib/css/usuarios.css" rel="stylesheet" type="text/css" media="all" />
<link href="../lib/css/tinybox2.css" rel="stylesheet" type="text/css" media="all" />
<script language="javascript" type="text/javascript" src="../lib/js/jquery-1.7.min.js"></script>
<script language="javascript" type="text/javascript" src="../lib/js/jquery.sisyphus.js"></script>
<script language="javascript" type="text/javascript" src="../lib/js/tinybox2.js"></script>
<script language="javascript" type="text/javascript" src="usuario.js"></script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Usuario</title>
</head>
<body>
<form id="Datos" action="<?=$_SERVER["PHP_SELF"]?>" method="post">
<input type="hidden" name="idn" id="idn" value="<?=$idn?>" />
<input type="hidden" name="Respuesta" id="Respuesta" value="<?=$resultado?>" />
<div class="cabeza">
<div class="menu">
    <ul class="menu_cliente">
        <li><a href="<?=$menu_cliente["pedidos"]?>">Pedidos</a></li>
        <li><a href="<?=$menu_cliente["productos"]?>">Productos</a></li>
        <li><a href="<?=$menu_cliente["clientes"]?>">Clientes</a></li>
        <li><a class="seleccionado" href="<?=$menu_cliente["usuarios"]?>">Usuarios</a></li>
        <li><a href="<?=$menu_cliente["sitio"]?>">Ir al sitio</a></li>
        <li><a href="<?=$menu_cliente["salir"]?>">Salir</a></li>
    </ul>
    <div class="limpiar"></div>
</div>
</div>
<div class="contenido">
<fieldset>
<legend>Noticia</legend>
  <table class="formulario" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="8%">Titulo</td>minimo que se diga algo bueno
      <td width="92%"><input name="txtUsuario" type="text" id="txtUsuario" value="<?=$titulo?>" size="78"/></td>
    </tr>
    <tr>
      <td colspan="2">Descripcion breve</td>
      </tr>
    <tr>
      <td colspan="2"><label>
        <textarea name="txtBreve" id="txtBreve" cols="98" rows="5"><?=$breve?></textarea>
      </label></td>
      </tr>
    <tr>
      <td colspan="2">Contenido</td>
      </tr>
    <tr>
      <td colspan="2"><textarea name="txtDescripcion" id="txtDescripcion" cols="98" rows="8"><?=$descripcion?></textarea></td>
      </tr>
    <tr>
      <td>Imágen</td>
      <td>
        <input type="file" name="fileField" id="fileField" />
      </td>
      </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      </tr>
    <tr>
      <td colspan="2"><input type="button" name="btGuardar" id="btGuardar" value="Guardar" />
        <input type="button" name="btEliminar" id="btEliminar" value="Eliminar" /></td>
      </tr>
  </table>
  </fieldset>
</div>
<div class="fondo">
<p>Sistema de administración de contenido de PROCLIMME</p>
</div>
<input type="hidden" name="Accion" id="Accion" />
<input type="hidden" name="idu" id="idu" value="<?=$_POST["idu"]?>"/>
<form>
</body>
</html>