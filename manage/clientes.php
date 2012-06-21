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
<script language="javascript" type="text/javascript" src="clientes.js"></script>
<link href="../lib/css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="../lib/css/manage.css" rel="stylesheet" type="text/css" media="all" />
<link href="../lib/css/clientes.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<form id="Datos" method="post">
	<input type="hidden" name="idu" id="idu" />
    <input type="hidden" name="idc" id="idc" />
    <input type="hidden" name="Accion" id="Accion" />
</form>
<div class="cabeza"></div>
<div class="contenido">
<table class="tClientes" width="100%" border="0">
  <tr>
    <td class="cabeza">Nombre</td>
    <td class="cabeza">Apellidos</td>
    <td class="cabeza">RFC</td>
    <td class="cabeza">Ciudad</td>
    <td class="cabeza">&nbsp;</td>
  </tr>
  <?
  $clientes="SELECT*FROM clientes";
  $ej_clientes=mysql_query($clientes);
  if(mysql_num_rows($ej_clientes)>0){
  		while($clientes=mysql_fetch_array($ej_clientes)){
			  $usuario="SELECT*FROM usuarios WHERE id='".$clientes["id"]."'";
			  $ejusuario=mysql_query($usuario);
			  $data_usuario=mysql_fetch_array($ejusuario);
			  ?>
			  <tr>
				<td><?=$clientes["nombre"]?></td>
				<td><?=$clientes["apellidos"]?></td>
				<td><?=$clientes["rfc"]?></td>
				<td><?=$clientes["ciudad"]?></td>
				<td><input data-cliente="<?=$clientes["id"]?>" data-usuario="<?=$data_usuario["id"]?>" type="button" class="btModificar" value="Modificar"  /></td>
			  </tr>
			  <?
		}
  }
  ?>
</table>
<input type="submit" name="btNuevo" id="btNuevo" value="Nuevo" />
</div>
<div class="fondo"></div>
</body>
</html>