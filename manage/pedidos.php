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
<script language="javascript" type="text/javascript" src="../lib/js/jquery-1.7.min.js"></script>
<script language="javascript" type="text/javascript" src="../lib/js/jquery.dataTables.js"></script>
<script language="javascript" type="text/javascript" src="pedidos.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/reset.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/manage.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/pedidos.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/themes/smoothness/jquery-ui-1.8.4.custom.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/demo_table_jui.css"/>
</head>
<body>
<form id="Datos" method="post">
	<input type="hidden" name="idu" id="idu" />
    <input type="hidden" name="idc" id="idc" />
    <input type="hidden" name="Accion" id="Accion" />
</form>
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
<table id="tPedidos" class="tPedidos display" width="100%" border="0" cellpadding="0" cellspacing="0">
 <thead>
  <tr>
    <th class="cabeza">Producto</td>
    <th class="cabeza">Usuario</td>
    <th class="cabeza">Precio</td>
    <th class="cabeza">Fecha de pedido</td>
    <th class="cabeza">Pagado</td>
    <th class="cabeza">Enviado</td>
    <th class="cabeza">&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  <?
  $sqlpedidos="SELECT*FROM pedidos";
  $ej_pedidos=mysql_query($sqlpedidos);
  if(mysql_num_rows($ej_pedidos)>0){
  		while($pedidos=mysql_fetch_array($ej_pedidos)){
			  if($pedidos["pagado"]==0)
			  	$tipo_celda="gradeA"; //VERDE
			  else
			  	$tipo_celda="gradeX"; //ROJA
			  ?>
			  <tr class="<?=$tipo_celda?>">
				<td><?
				$sqlprod="SELECT*FROM productos WHERE id='".$pedidos["id_producto"]."'";
				$ejprod=@mysql_query($sqlprod);
				$producto=@mysql_fetch_array($ejprod);
				echo utf8_encode($producto["nombre"]);
				?></td>
                <td><?
				$sql_cliente="SELECT*FROM clientes WHERE id_usuario='".$pedidos["id_usuario"]."'";
				$ejcliente=mysql_query($sql_cliente);
				$cliente=mysql_fetch_array($ejcliente);
				echo $cliente["nombre"]." ".$cliente["apellidos"]; ?></td>
				<td><?=$producto["precio"]?></td>
				<td><?=$pedidos["fecha_pedido"]?></td>
				<td><?
				if($pedidos["pagado"]==1)
					echo "Pagado";
				else
					echo "No pagado";
				?></td>
				<td><?
				switch($pedidos["estado"])
				{
					case "P":
						echo "Pedido";
					break;
					case "E":
						echo "Enviado";
					break;
				}
				?></td>
                <td><input data-pedido="<?=$pedidos["id"]?>" type="button" class="btModificar" value="Enviar"  /></td>
			  </tr>
			  <?
		}
  }
  ?>
  </tbody>
</table>
</div>
<div class="fondo"></div>
</body>
</html>