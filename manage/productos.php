<?
	session_start();
	include("../lib/php/settings.php");
	include("../lib/php/conexion.php");
		
	function mover($tipo,$id){
		if($tipo=="arriba"){
			$actual=mysql_fetch_array(mysql_query("SELECT id, orden FROM productos WHERE id='".$id."'"));
			$anterior=datosAnterior($actual["orden"]);
			
			$update="UPDATE productos SET orden='".$anterior["orden"]."' WHERE id='".$actual["id"]."'";
			$update2="UPDATE productos SET orden='".$actual["orden"]."' WHERE id='".$anterior["id"]."'";
			mysql_query($update);
			mysql_query($update2);
		}else{
			$actual=mysql_fetch_array(mysql_query("SELECT id, orden FROM productos WHERE id='".$id."'"));
			$posterior=datosPosterior($actual["orden"]);
			
			$update="UPDATE productos SET orden='".$posterior["orden"]."' WHERE id='".$actual["id"]."'";
			$update2="UPDATE productos SET orden='".$actual["orden"]."' WHERE id='".$posterior["id"]."'";
			mysql_query($update);
			mysql_query($update2);	
		}
	}
	
	function datosAnterior($orden){
		$resul=mysql_query("SELECT*FROM productos WHERE orden='".($orden-1)."'");
		if(mysql_num_rows($resul)<1 && ($orden-1)>1){
			datosAnterior($orden-1);	
		}else{
			$anterior=mysql_fetch_array($resul);	
		}
		return $anterior;
	}
	
	function datosPosterior($orden){
		$resul=mysql_query("SELECT*FROM productos WHERE orden='".($orden+1)."'");
		if(mysql_num_rows($resul)<1){
			datosPosterior($orden+1);	
		}else{
			$anterior=mysql_fetch_array($resul);	
		}
		return $anterior;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Productos</title>
<script language="javascript" type="text/javascript" src="../lib/js/jquery-1.7.min.js"></script>
<script language="javascript" type="text/javascript" src="../lib/js/jquery.dataTables.js"></script>
<script language="javascript" type="text/javascript" src="productos.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/reset.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/manage.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/productos.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/themes/smoothness/jquery-ui-1.8.4.custom.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/demo_table_jui.css"/>
<link rel="shortcut icon" href="../image/favicon.ico" />
</head>
<body>
<form id="Datos" method="post">
	<input type="hidden" name="xdp" id="xdp" />
    <input type="hidden" name="Accion" id="Accion" />
</form>
<div class="cabeza">
<div class="menu">
    <ul class="menu_cliente">
        <li><a href="<?=$menu_cliente["pedidos"]?>">Pedidos</a></li>
        <li><a class="seleccionado" href="<?=$menu_cliente["productos"]?>">Productos</a></li>
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
<table id="tProductos" class="tProductos display" width="100%" border="0" cellpadding="0" cellspacing="0">
 <thead>
  <tr>
    <th class="cabeza">Nombre</td>
    <th class="cabeza">Descripción corta</td>
    <th class="cabeza">&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  <?
  $productos="SELECT*FROM productos ORDER BY orden ASC";
  $ej_productos=mysql_query($productos);
  $i=0;
  if(mysql_num_rows($ej_productos)>0){
  		while($productos=mysql_fetch_array($ej_productos)){
			  if($productos["estatus"]==1)
			  	$tipo_celda="gradeA"; //VERDE
			  else
			  	$tipo_celda="gradeX"; //ROJA
			  ?>
			  <tr class="<?=$tipo_celda?>">
				<td><?=$productos["nombre"]?></td>
                <td><?=$productos["descripcion_corta"]?></td>
				<td><input data-id-producto="<?=$productos["id"]?>" type="button" class="btModificar" value="Modificar"  /></td>
			  </tr>
			  <?
		}
  }
  ?>
  </tbody>
</table>
<div class="opciones">
	<input type="button" name="btNuevo" id="btNuevo" value="Nuevo" /> <input type="button" name="btMostrar" id="btMostrar" value="Productos a Mostrar" />
</div>
</div>
<div class="fondo"></div>
</body>
</html>