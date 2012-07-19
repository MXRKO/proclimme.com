<?
session_start();
include("../lib/php/settings.php");
include("../lib/php/conexion.php");
$xdpp=$_POST["xdpp"];	
$xds=$_POST["xds"];	
if(!isset($_POST["Accion"])){
	$sql="SELECT*FROM respuestas WHERE id_solicitud='".$xds."' AND tipo='A'";
	$resql=mysql_query($sql);
	if(mysql_num_rows($resql)>0){
		$archivos=mysql_num_rows($resql);
	}	
}
if($_POST["Accion"]=="GUARDAR" && !isset($respuesta)){
	$cont=1;
	$ordena=1;
	$limite=false;
	$errors=0;
	while($limite==false){
		if($_FILES["txtArchivo".$xds."_".$cont]){
			$extension=getExtension("txtArchivo".$xds."_".$ordena);
			if(subirArchivo("publicado".$xds."_".$ordena.".".$extension,"txtArchivo".$xds."_".$ordena,"publicados")){
				$inserta="INSERT INTO respuestas(id_solicitud,tipo,nombre_archivo,descripcion,fecha,formato) "; 
				$inserta=$inserta."VALUES('".$xds."','A','publicado".$xds."_".$ordena.".".$extension."','".utf8_decode($_POST["txtDescripcion".$xds."_".$ordena])."',now(),'".$extension."')";		
				$res=mysql_query($inserta);
				if($res!=1){
					$errors++;	
				}
			}
			else{
				$errors++;	
			}
			if($cont==$_POST["ultimo"]){
				$limite=true;	
			}
			$ordena++;
		}
		$cont++;
	}
	if($errors<1){
		$respuesta="GUARDO";	
		$sql="SELECT*FROM respuestas WHERE id_solicitud='".$xds."' AND tipo='A'";
		$resql=mysql_query($sql);
		$archivos=mysql_num_rows($resql);	
	}
	else{
		$respuesta="NOGUARDO";	
	}
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
<title>Datos de la cotización</title>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/reset.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/manage.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/trabajo.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/redactor.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/tinybox2.css" rel="stylesheet" type="text/css" media="all" />
<script language="javascript" type="text/javascript" src="../lib/js/jquery-1.7.min.js"></script>
<script language="javascript" type="text/javascript" src="../lib/js/redactor.min.js"></script>
<script language="javascript" type="text/javascript" src="../lib/redactor/langs/es.js"></script>
<script language="javascript" type="text/javascript" src="../lib/js/tinybox2.js"></script>
<script language="javascript" type="text/javascript" src="trabajo.js"></script>
</head>
<body>
<form id="Pedido" name="Pedido" method="get">
	<input type="hidden" name="xdpp" id="xdpp" value="<?=$xdpp?>"/>
</form>
<form id="Datos" name="Datos" method="post" enctype="multipart/form-data">
<input type="hidden" name="Accion" id="Accion" />
<input type="hidden" name="xdpp" id="xdpp" value="<?=$xdpp?>"/>
<input type="hidden" name="xds" id="xds" value="<?=$xds?>"/>
<input type="hidden" name="ultimo" id="ultimo" />
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
  <?
    $sql_pedido="SELECT solicitudes.descripcion AS descripcion, productos.nombre AS nombre, productos.id FROM solicitudes, productos WHERE solicitudes.id='".$xds."' AND solicitudes.id_pedido='".$xdpp."' AND solicitudes.id_producto=productos.id";
	$ex_pedido=mysql_query($sql_pedido);
	$datos_solicitud=mysql_fetch_array($ex_pedido);
  ?>
  <div class="cotizacion">
  <table class="datos_cotizacion" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="9%"><span class="caracteristica">Producto</span></td>
      <td width="91%"><?=nl2br(utf8_encode($datos_solicitud["nombre"]))?></td>
    </tr>
    <tr>
      <td colspan="2"><span class="caracteristica">Datos de la cotización</span>
        <textarea name="textarea" readonly="readonly" id="textarea" cols="45" rows="5"><?=nl2br(utf8_encode($datos_solicitud["descripcion"]))?></textarea></td>
      </tr>
  </table>
  </div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%">
    <div id="divArchivos">
	<?
        if($archivos>0){
			$j=1;
			while($datos=mysql_fetch_array($resql)){
			?>
            <div class="item" data-id-solicitud="<?=$xds."_".$j?>" >
              <table width="100%" border="0">
                    <tr>
                      <td width="17%"><span class="caracteristica">*Archivo de trabajo</span></td>
                      <td width="83%">
                        <a href="../publicados/<?=$datos["nombre_archivo"]?>">Archivo de trabajo</a>
                     </td>
                    </tr>
                    <tr>
                      <td colspan="2"><span class="caracteristica">Descripcion del archivo</span>
                          <textarea name="txtDescripcion<?=$xds?>_1" id="txtDescripcion<?=$xds?>_1" cols="45" readonly="readonly" rows="5"><?=nl2br(utf8_encode($datos["descripcion"]))?></textarea>
                      </td>
                    </tr>
                  </table>
            </div>
            <?
			}
        }
		else{
    ?>
    	<div class="item" data-id-solicitud="<?=$xds?>_1">
    	  <table width="100%" border="0">
                <tr>
                  <td width="17%"><span class="caracteristica">*Archivo de trabajo</span></td>
                  <td width="83%">
                    <input data-contador="1" data-id-solicitud="<?=$xds?>" type="file" name="txtArchivo<?=$xds?>_1" id="txtArchivo<?=$xds?>_1" />
                  </td>
                </tr>
                <tr>
                  <td colspan="2"><span class="caracteristica">Descripcion del archivo</span>
                      <textarea name="txtDescripcion<?=$xds?>_1" id="txtDescripcion<?=$xds?>_1" cols="45" rows="5"></textarea>
                  </td>
                </tr>
              </table>
    	</div>
        <?
		}
		?>
    </div>
    </td>
  </tr>
  <tr>
    <td><p class="nota">Todos los campos marcados con (*) asterisco son obligatorios</p></td>
  </tr>
  <tr>
    <td><input type="button" name="btEnviar" id="btEnviar" value="Enviar" <?=(isset($archivos))?"disabled='disabled'":"";?> />
      <input type="button" name="btPedido" id="btPedido" value="Pedido" /></td>
    </tr>
</table>
</div>
<div class="fondo"></div>
</form>
</body>
</html>