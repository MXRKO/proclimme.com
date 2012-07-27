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
	
	if($_POST["Accion"]=="ASIGNAR"){
		$update="UPDATE pedidos SET id_usuario='".$_POST["slUsuario"]."', estatus='E' WHERE id='".$_POST["xdpp"]."'";
		$exeupdate=mysql_query($update);
		if($exeupdate==1){
			$respuesta="ASIGNO";	
		}
		else{
			$respuesta="NOASIGNO";	
		}
	}
	
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
    <input type="hidden" name="Accion" id="Accion"  />
    <input type="hidden" name="respuesta" id="respuesta" value="<?=$respuesta?>" />
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
		if(mysql_num_rows($ejusuario)<1){
			echo $pedido["email"]." ";	
			$clients="SELECT usuarios.id AS id, clientes.nombre AS nombre, clientes.apellidos AS apellidos FROM clientes, usuarios WHERE clientes.id_usuario=usuarios.id AND usuarios.estatus=1";
			$execlients=@mysql_query($clients);
			?>
			<select id="slUsuario" name="slUsuario">
            	<option value="0">--</option>
                <?
                while($clts=@mysql_fetch_array($execlients)){
					?>
					<option value="<?=$clts["id"]?>"><?=$clts["nombre"]." ".$clts["apellidos"]?></option>
					<?	
				}
				?>
            </select>
            <input type="button" id="btAsignar" name="btAsignar" value="Asignar Usuario" />
			<?
		}
		else{
			$user=mysql_fetch_array($ejusuario);
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
    <td>Enviar : </td>
    <td>
    	<input <?=$pedido["id_usuario"]<1?"disabled='disabled'":"";?> class="btCotizacion" type="button" value="Cotización" data-id-solicitud="<?=$solicitud["id"]?>"/>
        <input <?=$pedido["id_usuario"]<1?"disabled='disabled'":"";?> class="btTrabajo" type="button" value="Trabajo Final" data-id-solicitud="<?=$solicitud["id"]?>"/>
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