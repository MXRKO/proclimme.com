<?
	session_start();
	include("../lib/php/settings.php");
	include("../lib/php/conexion.php");
	if(!isset($_POST["Accion"])){
		$xdpp=$_GET["xdpp"];	
	}
	else{
		$xdpp=$_POST["xdpp"];	
	}
	
	/*if($_POST["Accion"]=="GUARDAR"){
		$error=0;
		$sql_solicitudes="SELECT*FROM solicitudes WHERE id_pedido='".$xdpp."'";
		$ej_solicitudes=mysql_query($sql_solicitudes);
		$solicitud=mysql_fetch_array($ej_solicitudes);
		if($_POST["radio".$solicitud["id"]]=="Cotizacion"){
			echo "<script>alert('Entro Cotizacion')</script>";
			$inserta="INSERT INTO respuestas(id_solicitud,tipo,nombre_archivo,descripcion,fecha,formato) "; 
			if(subirArchivo("psolicitud_".$solicitud["id"],"txtArchivo".$solicitud["id"],"cotizaciones")){
				echo $inserta=$inserta."VALUES('".$solicitud["id"]."','C','psolicitud_".$solicitud["id"]."','".$_POST["txtDescripcionCotizacion".$solicitud["id"]]."',now(),'".getExtension("txtArchivo".$solicitud["id"])."')";	
			}
			else
				echo $inserta=$inserta."VALUES('".$solicitud["id"]."','C','','".$_POST["txtDescripcionCotizacion".$solicitud["id"]]."',now(),'')";	
			$resp=mysql_query($inserta);
			if($resp!=1){
				$error++;	
			}
		}
		else{
			echo "<script>alert('Entro Material')</script>";
			$continua=1;
			$count=1;
			while($continua==1){
				echo "<script>alert('Entro While Material')</script>";
				if(!isset($_FILES["txtMaterial".$solicitud["id"]."_".$count])){
					$inserta="INSERT INTO respuestas(id_solicitud,tipo,nombre_archivo,descripcion,fecha,formato) "; 
					if(subirMaterial("pterminado_".$solicitud["id"],"txtMaterial".$solicitud["id"]."_".$count,"cotizaciones")){
						echo $inserta=$inserta."VALUES('".$solicitud["id"]."','A','pterminado".$solicitud["id"]."_".$count."','".$_POST["txtObservaciones".$solicitud["id"]."_".$count]."',now(),'".getExtension("txtMaterial".$solicitud["id"]."_".$count)."')";	
						$resp=mysql_query($inserta);
						if($resp!=1){
							$error++;	
						}		
					}else{
						$error++;	
					}
				}
				else{
					$continua=0;	
				}
				$count++;
			}
		}
		if($error>0){
			$respuesta="GUARDO";	
		}
		else{
			$respuesta="NOGUARDO";	
		}
	}
	
	function subirArchivo($nombre,$nombreCampoArchivo,$carpeta){		
		if($_FILES[$nombreCampoArchivo]['tmp_name']!=""){
			$extension=getExtension($nombreCampoArchivo);
			if($extencion!="NO"){
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
	
	function subirMaterial($nombre,$nombreCampoArchivo,$carpeta){		
		$extension=getExtension($nombreCampoArchivo);
		if($extencion!="NO"){
			try{
				echo "[".$nombreCampoArchivo."] - ";
				$task=copy($_FILES[$nombreCampoArchivo]['tmp_name'],"../".$carpeta."/".$nombre.".".$extension) or die("[".$_FILES[$nombreCampoArchivo]['tmp_name']."], porfavor notifique al adminstrador acerca de este error.");
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
	}
	
	function getExtension($nombreCampoArchivo){
		if(strpos($_FILES[$nombreCampoArchivo][name],".pdf"))	$extension="pdf";
		else if(strpos($_FILES[$nombreCampoArchivo][name],".PDF"))	$extension="pdf";
		else if(strpos($_FILES[$nombreCampoArchivo][name],".doc"))	$extension="doc";
		else if(strpos($_FILES[$nombreCampoArchivo][name],".DOC"))	$extension="doc";
		else if(strpos($_FILES[$nombreCampoArchivo][name],".docx"))	$extension="docx";
		else if(strpos($_FILES[$nombreCampoArchivo][name],".DOCX"))	$extension="docx";
		else if(strpos($_FILES[$nombreCampoArchivo][name],".xls"))	$extension="xls";
		else if(strpos($_FILES[$nombreCampoArchivo][name],".XLS"))	$extension="XLS";
		else if(strpos($_FILES[$nombreCampoArchivo][name],".xlsx"))	$extension="xlsx";
		else if(strpos($_FILES[$nombreCampoArchivo][name],".XLSX"))	$extension="XLSX";
		else	$extension="NO";
		return $extension;
	}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Datos pedido</title>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/reset.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/manage.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/pedidos.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/redactor.css"/>
<link href="../lib/css/tinybox2.css" rel="stylesheet" type="text/css" media="all" />
<script language="javascript" type="text/javascript" src="../lib/js/jquery-1.7.min.js"></script>
<script language="javascript" type="text/javascript" src="../lib/js/redactor.min.js"></script>
<script language="javascript" type="text/javascript" src="../lib/redactor/langs/es.js"></script>
<script language="javascript" type="text/javascript" src="../lib/js/tinybox2.js"></script>
<script language="javascript" type="text/javascript" src="pedido.js"></script>
</head>
<body>
<form id="Datos" name="Datos" method="post">
	<input type="hidden" name="xds" id="xds" />
    <input type="hidden" name="xdpp" id="xdpp" value="<?=$xdpp?>" />
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
  <legend>Datos del Pedido</legend>
  <?
  	$sql="SELECT*FROM pedidos WHERE id='".$xdpp."'";
	$ejsql=@mysql_query($sql);
	$pedido=@mysql_fetch_array($ejsql);
  ?>
  <table class="datos_principales" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="21%"><p>Usuario</p></td>
      <td width="79%">
      <?
      	$usuario="SELECT*FROM clientes WHERE id_usuario='".$pedido["id_usuario"]."'";
		$ejusuario=mysql_query($usuario);
		$user=mysql_fetch_array($ejusuario);
		if(empty($user["nombre"])){
			echo $user["email"];	
		}
		else{
			echo $user["nombre"]." ".$user["apellidos"];	
		}
	  ?>
      </td>
    </tr>
    <tr>
      <td><p>Fecha de pedido</p></td>
      <td>
      <?=$pedido["fecha"]?></td>
    </tr>
    <tr>
      <td><p>Solicitudes de Cotización</p></td>
      <td>
      	<?
        	$num_sol="SELECT*FROM solicitudes WHERE id_pedido='".$pedido["id"]."'";
			$ej_sol=@mysql_query($num_sol);
			echo @mysql_num_rows($ej_sol);
		?>
      </td>
    </tr>
  </table>
  </fieldset>
  <?
  	$sql_solicitudes="SELECT*FROM solicitudes WHERE id_pedido='".$pedido["id"]."'";
	$ej_solicitudes=@mysql_query($sql_solicitudes);
	while($solicitud=@mysql_fetch_array($ej_solicitudes)){
  ?>
  <table id="tabla<?=$solicitud["id"]?>" data-id="<?=$solicitud["id"]?>" class="solicitud" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20%">Producto</td>
    <td width="80%">
	<?
    	$sql_producto="SELECT*FROM productos WHERE id='".$solicitud["id_producto"]."'";
		$ej_producto=mysql_query($sql_producto);
		$producto=mysql_fetch_array($ej_producto);
		echo utf8_encode($producto["nombre"]);
	?>
    </td>
  </tr>
  <tr>
    <td>Requisitos de la cotización</td>
    <td>
    <?
    	echo nl2br(utf8_decode($solicitud["descripcion"]));
	?>
    </td>
  </tr>
  <tr>
    <td>Enviar :</td>
    <td>
    	<input class="btCotizacion" type="button" value="Cotización" data-id-solicitud="<?=$solicitud["id"]?>"/>
        <input class="btArchivos" type="button" value="Trabajo Final" data-id-solicitud="<?=$solicitud["id"]?>"/>
    </td>
    </tr>
  </table>
   <?
	}
   ?>
</div>
<div class="fondo"></div>
</form>
</body>
</html>