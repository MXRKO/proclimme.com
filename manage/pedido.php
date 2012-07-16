<?
	session_start();
	include("../lib/php/settings.php");
	include("../lib/php/conexion.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clientes</title>
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
<form id="Datos" method="post">
	<input type="hidden" name="idu" id="idu" />
    <input type="hidden" name="Accion" id="Accion" />
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
  	$sql="SELECT*FROM pedidos WHERE id='".$_GET["xdpp"]."'";
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
    <td>Responder con :</td>
    <td><input type="radio" id="radio<?=$solicitud["id"]?>" name="radio<?=$solicitud["id"]?>" value="Cotización" data-id="<?=$solicitud["id"]?>" onclick="mostrar('cotizacion','<?=$solicitud["id"]?>')"  checked="checked"/>
      <label >Cotización</label>
      <input type="radio" id="radio<?=$solicitud["id"]?>" name="radio<?=$solicitud["id"]?>" value="Material" data-id="<?=$solicitud["id"]?>" onclick="mostrar('material','<?=$solicitud["id"]?>')" />
      <label >Material Terminado</label></td>
  </tr>
  <tr>
    <td colspan="2" class="texto">
    <div class="cotizacion<?=$solicitud["id"]?>">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="2">
        	<p>Describa a continuación la cotización:</p>
        	<textarea class="txtCot"></textarea>
        </td>
        </tr>
      <tr>
        <td width="17%">y/o Adjunte archivo:</td>
        <td width="83%">
          <input type="file" name="txtArchivo<?=$solicitud["id"]?>" id="fileField<?=$solicitud["id"]?>" /></td>
      </tr>
    </table>
    </div>
    <div class="material<?=$solicitud["id"]?> item_solicitud" data-id-solicitud="<?=$solicitud["id"]?>" style="display:none;">
      <table width="100%" id="tSolicitudMaterial<?=$solicitud["id"]?>_1" class="tItemSolicitud" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="11%">Archivo</td>
          <td width="89%"><input type="file" data-id-solicitud="<?=$solicitud["id"]?>" name="txtMaterial<?=$solicitud["id"]?>_1" id="txtMaterial<?=$solicitud["id"]?>_1" onchange="listenerFile('1','<?=$solicitud["id"]?>');" data-contador='1' />
            </td>
        </tr>
        <tr>
          <td colspan="2"><p>Observaciones:</p>
          <textarea id="txtObervaciones<?=$solicitud["id"]?>_1"></textarea></td>
        </tr>
        <tr>
          <td colspan="2"><p>*Una vez que haya seleccionado un archivo o escrito en el campo observaciones aparecerá automaticamente los campos para subir otro archivo </p></td>	
        </tr>
      </table>
    </div>
    
    </td>
    </tr>
  </table>
   <?
	}
   ?>
   <input type="button" id="btEnviar" value="Enviar" />
</div>
<div class="fondo"></div>
</form>
</body>
</html>