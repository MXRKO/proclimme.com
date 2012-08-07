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
<script language="javascript" type="text/javascript" src="clientes.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/reset.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/manage.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/clientes.css"/>
<!-- <link rel="stylesheet" type="text/css" media="all" href="../lib/css/jquery.dataTables_themeroller.css"/> -->
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/themes/smoothness/jquery-ui-1.8.4.custom.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../lib/css/demo_table_jui.css"/>
</head>
<body>
<form id="Datos" method="post">
	<input type="hidden" name="idn" id="idn" />
</form>
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
<table id="tClientes" class="tClientes display" width="100%" border="0" cellpadding="0" cellspacing="0">
 <thead>
  <tr>
    <th class="cabeza">Fecha</td>
    <th class="cabeza">Titulo</td>
    <th class="cabeza">Descripci&oacute;n breve</td>
    <th class="cabeza">&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  <?
	$nts="SELECT*FROM noticias ORDER BY id DESC";
	$re_nts=mysql_query($nts);
	if(mysql_num_rows($re_nts)>0){
		while($noticias=mysql_fetch_array($re_nts)){
			  ?>
			  <tr>
				<td><?=$noticias["fecha"]?></td>
				<td><?=$noticias["titulo"]?></td>
				<td><?=$noticias["breve"]?></td>
				<td><input data-idn="<?=$noticias["id"]?>" type="button" class="btModificar" value="Modificar"  /></td>
			  </tr>
			  <?
		}
	}else{
		?>
			<tr>
            	<td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
		<?	
	}
	?>
  </tbody>
</table>
<div class="opciones">
	<input type="button" name="btNuevo" id="btNuevo" value="Nuevo" />
</div>
</div>
<div class="fondo"></div>
</body>
</html>