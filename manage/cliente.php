<?
	include("../lib/php/conexion.php");
	include("../lib/php/settings.php");
	switch($_POST["Accion"]){
		case 'GUARDAR':
			echo $sql="INSERT INTO usuarios(user,pass,tipo) VALUES('".$_POST['txtUsuario']."',md5('".$_POST['txtContrasena']."'),'C')";
			$r1=mysql_query($sql);
			$idu=mysql_insert_id();
			$sql2="INSERT INTO clientes(id_usuario, nombre, apellidos, direccion, cp, ciudad, empresa, rfc, telefono_casa, telefono_celular, telefono_trabajo, email, fax, no_cuenta)";
			$sql2=$sql2."VALUES('".$idu."','".$_POST["txtNombre"]."', '".$_POST["txtApellidos"]."','".$_POST["txtDireccion"]."','".$_POST["txtCP"]."','".$_POST["txtCiudad"]."','".$_POST["txtEmpresa"]."','".$_POST["txtRFC"]."','".$_POST["txtCasa"]."','".$_POST["txtCelular"]."','".$_POST["txtTrabajo"]."','".$_POST["txtEmail"]."','".$_POST["txtFax"]."','".$_POST["txtNoCuenta"]."')";
			echo $sql2;
			$r2=mysql_query($sql2);
			$idc=mysql_insert_id();
			if($r1==1 && $r2==1){
				$resultado="GUARDO";	
				$_POST["idc"]=$idc;
				$_POST["idu"]=$idu;
				$_POST["Accion"]="BUSCAR";
			}
		break;
		case 'MODIFICAR':
			
		break;
		case 'ELIMINAR':
		break;
	}
	
	if($_POST["Accion"]=="BUSCAR"){
		$sql_buscar="SELECT*FROM clientes WHERE id='".$_POST["idc"]."'";
		$ej_buscar=mysql_query($sql_buscar);
		if(mysql_num_rows($ej_buscar)>0){
			$cliente=mysql_fetch_array($ej_buscar);	
		}
		$sql_buscar_user="SELECT*FROM usuarios WHERE id='".$_POST["idu"]."'";
		$ej_buscar_user=mysql_query($sql_buscar_user);
		if(mysql_num_rows($ej_buscar_user)>0){
			$usuario=mysql_fetch_array($ej_buscar_user);
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Usuarios</title>
<link href="../lib/css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="../lib/css/manage.css" rel="stylesheet" type="text/css" media="all" />
<script language="javascript" type="text/javascript" src="../lib/js/jquery-1.7.min.js"></script>
<script language="javascript" type="text/javascript" src="../lib/js/jquery.sisyphus.js"></script>
<script language="javascript" type="text/javascript" src="cliente.js"></script>
</head>
<body>
<form id="Datos" action="<?=$_SERVER["PHP_SELF"]?>" method="post">
<div class="cabeza"></div>
<div class="contenido">
<fieldset>
<legend>Datos de acceso al sistema</legend>
<table class="formulario" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="1%">*</td>
    <td width="17%">Usuario</td>
    <td colspan="2"><input type="text" name="txtUsuario" id="txtUsuario" value="<?=$usuario["user"]?>"/></td>
  </tr>
  <tr>
    <td>*</td>
    <td>Contraseña</td>
    <td colspan="2"><input type="password" name="txtContrasena" id="txtContrasena" /></td>
  </tr>
  <tr>
    <td>*</td>
    <td>Repetir contraseña</td>
    <td><input type="password" name="txtReContrasena" id="txtReContrasena" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>*</td>
    <td>Estatus</td>
    <td width="17%"><input type="radio" name="estatus" id="estatus" value="1" />
      <label for="radio">Activo</label></td>
    <td width="65%"><input type="radio" name="estatus" id="estatus" value="0" />
      <label for="radio2">Inactivo</label></td>
  </tr>
</table>
</fieldset>
<fieldset>
<legend>Información general del cliente</legend>
<table class="formulario" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="1%">*</td>
    <td width="21%">Nombre</td>
    <td width="78%"><input type="text" name="txtNombre" id="txtNombre" value="<?=$cliente["nombre"]?>"/></td>
  </tr>
  <tr>
    <td>*</td>
    <td>Apellidos</td>
    <td><input type="text" name="txtApellidos" id="txtApellidos" value="<?=$cliente["apellidos"]?>"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Dirección</td>
    <td><input type="text" name="txtDireccion" id="txtDireccion" value="<?=$cliente["direccion"]?>"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Ciudad</td>
    <td><input type="text" name="txtCiudad" id="txtCiudad" value="<?=$cliente["ciudad"]?>"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Código Postal</td>
    <td><input type="text" name="txtCP" id="txtCP" value="<?=$cliente["cp"]?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Empresa</td>
    <td><input type="text" name="txtEmpresa" id="txtEmpresa" value="<?=$cliente["empresa"]?>"/></td>
  </tr>
  <tr>
    <td>*</td>
    <td>RFC</td>
    <td><input type="text" name="txtRFC" id="txtRFC" value="<?=$cliente["rfc"]?>" /></td>
  </tr>
  <tr>
    <td>*</td>
    <td><p>Teléfono (Oficina)</p></td>
    <td><input type="text" name="txtOficina" id="txtOficina" value="<?=$cliente["telefono_oficina"]?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Teléfono (Celular)</td>
    <td><input type="text" name="txtCelular" id="txtCelular" value="<?=$cliente["telefono_celular"]?>"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Teléfono (Casa)</td>
    <td><input type="text" name="txtCasa" id="txtCasa" value="<?=$cliente["telefono_casa"]?>" /></td>
  </tr>
  <tr>
    <td>*</td>
    <td>Email</td>
    <td><input type="text" name="txtEmail" id="txtEmail" value="<?=$cliente["email"]?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Fax</td>
    <td><input type="text" name="txtFax" id="txtFax" value="<?=$cliente["fax"]?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Número de cuenta</td>
    <td><input type="text" name="txtNoCuenta" id="txtNoCuenta" value="<?=$cliente["no_cuenta"]?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><p class="nota">Todos los campos marcados con (*) son obligatorios.</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="button" name="btGuardar" id="btGuardar" value="Guardar" />
      <input class="novisible" type="button" name="btModificar" id="btModificar" value="Guardar" />
      <input type="button" name="btEliminar" id="btEliminar" value="Eliminar" /></td>
  </tr>
</table>
</fieldset>
</div>
<div class="fondo">
<p>Sistema de administración de contenido de PROCLIMME</p>
</div>
<input type="hidden" name="Accion" id="Accion" />
<input type="hidden" name="idc" id="idc" />
<input type="hidden" name="idc" id="idu" />
</form>
</body>
</html>