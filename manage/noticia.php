<?
	session_start();
	header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
	header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
	header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
	header ("Pragma: no-cache"); 
	include("../lib/php/conexion.php");
	include("../lib/php/settings.php");
	include("../lib/php/resize-class.php");
	
	switch($_POST["Accion"]){
		case 'GUARDAR':
			if(trim($_POST["idn"])!=""){
				$sql="UPDATE noticias SET titulo='".$_POST["txtTitulo"]."', breve='".$_POST["txtBreve"]."', descripcion='".$_POST["txtDescripcion"]."', fecha=now() WHERE id='".$_POST["idn"]."'";
				$exito=mysql_query($sql);
				$idn=$_POST["idn"];
			}
			else{
				$sql="insert into noticias (titulo,breve, descripcion, fecha)";
				$sql.="values('".$_POST["txtTitulo"]."', '".$_POST["txtBreve"]."', '".$_POST["txtDescripcion"]."', now())";
				$exito=mysql_query($sql);
				$idn=mysql_insert_id();
			}
			$nombre="n_".$idn;
			if($_FILES["txtArchivo"]["size"]>0){
				$extension=getExtension("txtArchivo");
				subirArchivo($nombre,"txtArchivo", $extension);
				if($exito==1){
					$up="UPDATE noticias SET imagen='".$nombre.".".$extension."', extencion='".$extension."' WHERE id='".$idn."'";
					$ex=mysql_query($up);
					if($ex==1){
						$resultado="GUARDO";	
					}else{
						$resultado="GUARDO_NOIMAGEN";
					}
				}else{
					$resultado="NOGUARDO";	
				}
			}else{
				if($exito==1){
					$resultado="GUARDO";	
				}	
				else{
					$resultado="NOGUARDO";	
				}
			}
		break;
		case 'ELIMINAR':
			$idn=$_POST["idn"];
			$bu="SELECT*FROM noticias WHERE id='".$idn."'";
			$re=mysql_query($bu);
			if(mysql_num_rows($re)>0){
				$dats=mysql_fetch_array($re);
				$del="DELETE FROM noticias WHERE id='".$idn."'";
				$exito=mysql_query($del);
				if($exito==1){
					eliminarArchivo("n_".$idn, $dats["extencion"]);				
					$resultado="ELIMINO";	
				}
				else{
					$resultado="NOEXISTEELIMINO";
				}
				
			}
			else{
				$resultado="NOEXISTE";	
			}
			$idn="";
			$_POST["idn"]="";
			$_POST["txtTitulo"]="";
			$_POST["txtBreve"]="";
			$_POST["txtDescripcion"]="";
		break;
	}
	
	if(trim($_POST["idn"])!=""){
		$idn=$_POST["idn"];
	}
	
	if(isset($idn)){
		$sqlB="SELECT*FROM noticias WHERE id='".$idn."'";
		$re=mysql_query($sqlB);
		$noticia=mysql_fetch_array($re);
		$titulo=$noticia["titulo"];
		$breve=$noticia["breve"];
		$descripcion=$noticia["descripcion"];
		$imagen=$noticia["imagen"];
	}
	
	function subirArchivo($nombre,$nombreCampoArchivo, $extension){		
		if($_FILES[$nombreCampoArchivo]['tmp_name']!=""){
			try{
				$taskMin=copy($_FILES[$nombreCampoArchivo]['tmp_name'],"../media/noticias/".$nombre."_min.".$extension) or die("[".$_FILES[$nombreCampoArchivo]['tmp_name']."] , porfavor notifique al adminstrador acerca de este error.");
				$taskThumb=copy($_FILES[$nombreCampoArchivo]['tmp_name'],"../media/noticias/".$nombre."_thumb.".$extension) or die("[".$_FILES[$nombreCampoArchivo]['tmp_name']."] , porfavor notifique al adminstrador acerca de este error.");
				$task=copy($_FILES[$nombreCampoArchivo]['tmp_name'],"../media/noticias/".$nombre.".".$extension) or die("[".$_FILES[$nombreCampoArchivo]['tmp_name']."] , porfavor notifique al adminstrador acerca de este error.");
				if(!$task && !$taskMin && !$taskThumb)
					throw new Exception('Error al subir el archivo, porfavor contacte al administrador.');
				else{
					$resizeObj = new resize("../media/noticias/".$nombre."_thumb.".$extension);
					$resizeObj -> resizeImage(100, 80, 'exact');// Resize image (options: exact, portrait, landscape, auto, crop)
					$resizeObj -> saveImage("../media/noticias/".$nombre."_thumb.".$extension, 50);					
					
					$resizeObj = new resize("../media/noticias/".$nombre."_min.".$extension);
					$resizeObj -> resizeImage(240, 240, 'exact');// Resize image (options: exact, portrait, landscape, auto, crop)
					$resizeObj -> saveImage("../media/noticias/".$nombre."_min.".$extension, 50);					
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
		if(strpos($_FILES[$nombreCampoArchivo]['name'],".JPG"))	$extension="JPG";
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
	
	function eliminarArchivo($nombre, $extension){
		if(!@file_exists("../media/noticias/".$nombre.".".$extension)) return true;
		if(!@unlink("../media/noticias/".$nombre."_thumb.".$extension)) return false;
		if(!@unlink("../media/noticias/".$nombre."_min.".$extension)) return false;
		if(!@unlink("../media/noticias/".$nombre.".".$extension)) return false;
		return true;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="../lib/css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="../lib/css/manage.css" rel="stylesheet" type="text/css" media="all" />
<link href="../lib/css/usuarios.css" rel="stylesheet" type="text/css" media="all" />
<link href="../lib/css/tinybox2.css" rel="stylesheet" type="text/css" media="all" />
<link rel="shortcut icon" href="../image/favicon.ico" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Usuario</title>
</head>
<body>
<form id="Datos" name="Datos" action="<?=$_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="idn" id="idn" value="<?=$idn?>" />
<input type="hidden" name="Accion" id="Accion" />
<input type="hidden" name="resultado" id="resultado" value="<?=$resultado?>" />
<div class="cabeza">
<div class="menu">
    <ul class="menu_cliente">
        <li><a href="<?=$menu_cliente["pedidos"]?>">Pedidos</a></li>
        <li><a href="<?=$menu_cliente["productos"]?>">Productos</a></li>
        <li><a href="<?=$menu_cliente["clientes"]?>">Clientes</a></li>
        <li><a href="<?=$menu_cliente["usuarios"]?>">Usuarios</a></li>
        <li><a class="seleccionado" href="<?=$menu_cliente["noticias"]?>">Noticias</a></li>
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
      <td width="8%">Titulo</td>
      <td width="92%"><input name="txtTitulo" type="text" id="txtTitulo" value="<?=$titulo?>" size="78"/></td>
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
      <?
      	if(isset($imagen)){
			?>
			<img src="../media/noticias/<?=$imagen?>" height="80" width="100" />
			<?
		}
	  ?>
        <input type="file" name="txtArchivo" id="txtArchivo" />
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
</form>
</body>
<script language="javascript" type="text/javascript" src="../lib/js/jquery-1.7.min.js"></script>
<script language="javascript" type="text/javascript" src="../lib/js/tinybox2.js"></script>
<script language="javascript" type="text/javascript" src="noticia.js"></script>
</html>