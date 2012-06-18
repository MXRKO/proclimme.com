<?
	include("../lib/php/conexion.php");
	include("../lib/php/settings.php");
	switch($_POST["Accion"]){
		case 'GUARDAR':
			$sql="INSERT INTO usuarios(user,pass,tipo,estatus) VALUES('".$_POST['txtUsuario']."',md5('".$_POST['txtPass']."'),'C',)";
		break;
		case 'MODIFICAR':
		break;
		case 'ELIMINAR':
		break;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Usuarios</title>
<link href="../lib/css/reset.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<form id="Datos" action="<?=$_SERVER["PHP_SELF"]?>" method="post">
<div class="cabeza"></div>
<div class="contenido">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="13%">Usuario</td>
    <td colspan="2"><input type="text" name="txtUsuario" id="txtUsuario" /></td>
  </tr>
  <tr>
    <td>Contraseña</td>
    <td colspan="2"><input type="text" name="txtContrasena" id="txtContrasena" /></td>
  </tr>
  <tr>
    <td>Estatus</td>
    <td width="12%"><input type="radio" name="radio" id="radio" value="radio" />
      <label for="radio">Activo</label></td>
    <td width="75%"><input type="radio" name="radio2" id="radio2" value="radio2" />
      <label for="radio2">Inactivo</label></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="13%">Nombre</td>
    <td width="87%"><input type="text" name="txtNombre" id="txtNombre" /></td>
  </tr>
  <tr>
    <td>Apellidos</td>
    <td><input type="text" name="txtApellidos" id="txtApellidos" /></td>
  </tr>
  <tr>
    <td>Dirección</td>
    <td><input type="text" name="txtDireccion" id="txtDireccion" /></td>
  </tr>
  <tr>
    <td>Ciudad</td>
    <td><input type="text" name="txtCiudad" id="txtCiudad" /></td>
  </tr>
  <tr>
    <td>Código Postal</td>
    <td><input type="text" name="txtCP" id="txtCP" /></td>
  </tr>
  <tr>
    <td>Empresa</td>
    <td><input type="text" name="txtEmpresa" id="txtEmpresa" /></td>
  </tr>
  <tr>
    <td>RFC</td>
    <td><input type="text" name="txtRFC" id="txtRFC" /></td>
  </tr>
  <tr>
    <td><p>Teléfono (Oficina)</p></td>
    <td><input type="text" name="txtOficina" id="txtOficina" /></td>
  </tr>
  <tr>
    <td>Teléfono (Celular)</td>
    <td><input type="text" name="txtCelular" id="txtCelular" /></td>
  </tr>
  <tr>
    <td>Teléfono (Casa)</td>
    <td><input type="text" name="txtCasa" id="txtCasa" /></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text" name="txtEmail" id="txtEmail" /></td>
  </tr>
  <tr>
    <td>Fax</td>
    <td><input type="text" name="txtFax" id="txtFax" /></td>
  </tr>
  <tr>
    <td>Número de cuenta</td>
    <td><input type="text" name="txtNoCuenta" id="txtNoCuenta" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="button" name="btGuardar" id="btGuardar" value="Guardar" />
      <input type="button" name="btModificar" id="btModificar" value="Guardar" />
      <input type="button" name="btEliminar" id="btEliminar" value="Eliminar" /></td>
  </tr>
</table>
</div>
<div class="fondo">
<p>Sistema de administración de contenido de PROCLIMME</p>
</div>
<input type="hidden" name="Accion" id="Accion" />
<input type="hidden" name="idc" id="idc" />
</form>
</body>
<script language="javascript" type="text/javascript" src="../lib/js/jquery-1.5.2.min.js"></script>
<script language="javascript" type="text/javascript" src="clientes.js"></script>
</html>