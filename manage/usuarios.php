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
<script language="javascript" type="text/javascript" src="usuarios.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/reset.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/manage.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/usuarios.css"/>
<!-- <link rel="stylesheet" type="text/css" media="all" href="../lib/css/jquery.dataTables_themeroller.css"/> -->
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/themes/smoothness/jquery-ui-1.8.4.custom.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/demo_table_jui.css"/>
<link rel="shortcut icon" href="../image/favicon.ico" />
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
        <li><a href="<?=$menu_cliente["pedidos"]?>">Pedidos</a></li>
        <li><a href="<?=$menu_cliente["productos"]?>">Productos</a></li>
        <li><a href="<?=$menu_cliente["clientes"]?>">Clientes</a></li>
        <li><a class="seleccionado" href="<?=$menu_cliente["usuarios"]?>">Usuarios</a></li>
        <li><a href="<?=$menu_cliente["noticias"]?>">Noticias</a></li>
        <li><a href="<?=$menu_cliente["sitio"]?>">Ir al sitio</a></li>
        <li><a href="<?=$menu_cliente["salir"]?>">Salir</a></li>
    </ul>
    <div class="limpiar"></div>
</div>
</div>
<div class="contenido">
<table id="tUsuarios" class="tUsuarios display" width="100%" border="0" cellpadding="0" cellspacing="0">
 <thead>
  <tr>
    <th class="cabeza">Usuario</td>
    <th class="cabeza">Tipo</td>
    <th class="cabeza">Estatus</td>
    <th class="cabeza">&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  <?
  $usuarios="SELECT*FROM usuarios";
  $ej_usuarios=mysql_query($usuarios);
  if(mysql_num_rows($ej_usuarios)>0){
  		while($usuarios=mysql_fetch_array($ej_usuarios)){
			  if($usuarios["estatus"]==1)
			  	$tipo_celda="gradeA"; //VERDE
			  else
			  	$tipo_celda="gradeX"; //ROJA
				
			  if($usuarios["tipo"]=="C"){
				  $cliente="SELECT id FROM clientes WHERE id_usuario='".$usuarios["id"]."'";
				  $ejcliente=mysql_query($cliente);
				  $cliente=mysql_fetch_array($ejcliente);
			  }
			  else{
				$cliente["id"]=0;  
			  }
			  ?>
			  <tr class="<?=$tipo_celda?>">
				<td><?=$usuarios["user"]?></td>
				<td><?
                	if($usuarios["tipo"]=="C"){
						echo "Cliente";	
					}
					else{
						echo "Administrador";
					}
				?></td>
                <td><?
                	if($usuarios["estatus"]==1){
						echo "Habilitado";	
					}
					else{
						echo "Deshabilitado";	
					}
					?></td>
				<td><input data-tipo="<?=$usuarios["tipo"]?>" data-usuario="<?=$usuarios["id"]?>" data-cliente="<?=$cliente["id"]?>" type="button" class="btModificar" value="Modificar"  /></td>
			  </tr>
			  <?
		}
  }
  ?>
  <tbody>
</table>
<div class="opciones">
	<input type="button" name="btNuevo" id="btNuevo" value="Nuevo" />
</div>
</div>
<div class="fondo"></div>
</body>
</html>