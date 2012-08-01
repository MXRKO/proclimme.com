<?
	session_start();
	include("../lib/php/conexion.php");
	include("../lib/php/settings.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="../lib/css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="../lib/css/manage.css" rel="stylesheet" type="text/css" media="all" />
<link href="../lib/css/productos.css" rel="stylesheet" type="text/css" media="all" />
<link href="../lib/css/tinybox2.css" rel="stylesheet" type="text/css" media="all" />
<script language="javascript" type="text/javascript" src="../lib/js/jquery-1.7.min.js"></script>
<script language="javascript" type="text/javascript" src="../lib/js/jquery.sisyphus.js"></script>
<script language="javascript" type="text/javascript" src="../lib/js/tinybox2.js"></script>
<script language="javascript" type="text/javascript" src="producto.js"></script>
</head>
<body>
<div class="cabeza">
<div class="menu">
    <ul class="menu_cliente">
        <li><a href="<?=$menu_cliente["pedidos"]?>">Pedidos</a></li>
        <li><a class="seleccionado" href="<?=$menu_cliente["productos"]?>">Productos</a></li>
        <li><a href="<?=$menu_cliente["clientes"]?>">Clientes</a></li>
        <li><a href="<?=$menu_cliente["usuarios"]?>">Usuarios</a></li>
        <li><a href="<?=$menu_cliente["sitio"]?>">Ir al sitio</a></li>
        <li><a href="<?=$menu_cliente["salir"]?>">Salir</a></li>
    </ul>
    <div class="limpiar"></div>
</div>
</div>
<div class="contenido">
<fieldset><legend>Datos del Producto</legend>
lkjlkj
  <table width="100%" border="0">
    <tr>
      <td>Nombre</td>
      <td><input type="text" name="textfield" id="textfield" /></td>
    </tr>
    <tr>
      <td>Descripción breve</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><label>
        <textarea name="textarea" id="textarea" cols="45" rows="5"></textarea>
      </label></td>
      </tr>
    <tr>
      <td>Descripción Detallada</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><textarea name="textarea2" id="textarea2" cols="45" rows="5"></textarea></td>
      </tr>
    <tr>
      <td>Formatos de Entrega</td>
      <td><input type="text" name="textfield2" id="textfield2" /></td>
    </tr>
    <tr>
      <td>Medio de Entrega</td>
      <td><input type="text" name="textfield3" id="textfield3" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</fieldset>
</div>
<div class="fondo">
<p>Sistema de administración de contenido de PROCLIMME</p>
</div>
</body>
</html>