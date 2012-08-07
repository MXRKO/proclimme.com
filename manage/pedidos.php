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
<form id="Datos" method="get">
    <input type="hidden" name="xdpp" id="xdpp" />
</form>
<div class="cabeza">
<div class="menu">
    <ul class="menu_cliente">
        <li><a class="seleccionado" href="<?=$menu_cliente["pedidos"]?>">Pedidos</a></li>
        <li><a href="<?=$menu_cliente["productos"]?>">Productos</a></li>
        <li><a href="<?=$menu_cliente["clientes"]?>">Clientes</a></li>
        <li><a href="<?=$menu_cliente["usuarios"]?>">Usuarios</a></li>
        <li><a href="<?=$menu_cliente["noticias"]?>">Noticias</a></li>
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
    <th class="cabeza">Fecha</td>
    <th class="cabeza">Usuario</td>
    <th class="cabeza">Cotizaciones</td>
    <th class="cabeza">Estatus</td>
    <th class="cabeza">&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  <?
  $sqlpedidos="SELECT*FROM pedidos WHERE estatus='E' OR estatus='S' ORDER BY fecha DESC";
  $ej_pedidos=mysql_query($sqlpedidos);
  if(mysql_num_rows($ej_pedidos)>0){
  		while($pedido=mysql_fetch_array($ej_pedidos)){
			?>	  
        	<tr>	
				<td><?=$pedido["fecha"]?></td>
                <td><?
                	if($pedido["estatus"]!="S"){
						$user="SELECT*FROM clientes WHERE id_usuario='".$pedido["id_usuario"]."'";
						$ejuser=mysql_query($user);
						$datos_usuario=mysql_fetch_array($ejuser);
						if(empty($datos_usuario["nombre"])){
							echo $datos_usuario["email"];	
						}
						else{
							echo $datos_usuario["nombre"]." ".$datos_usuario["apellidos"];	
						}
					}else{
						echo $pedido["email"];	
					}
				?></td>
                <td>
				<?
                	$sqlSolicitudes="SELECT*FROM solicitudes WHERE id_pedido='".$pedido["id"]."'";
					$ejSolicitudes=mysql_query($sqlSolicitudes);
					echo @mysql_num_rows($ejSolicitudes);
				?>
                </td>
                <td>
				<?
                	switch($pedido["estatus"]){
						case "E":
							echo "Pendiente";
						break;
						case "S":
							echo "Usuario no registrado";
						break;
						case "R":
							echo "Respondida";
						break;
						case "T":
							echo "Terminada";
						break;
					}
				?>
                </td>
            	<td><input data-pp="<?=$pedido["id"]?>" type="button" class="btModificar" value="Detalles"  /></td>
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