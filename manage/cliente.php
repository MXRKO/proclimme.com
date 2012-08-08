<?
	session_start();
	include("../lib/php/conexion.php");
	include("../lib/php/settings.php");
	switch($_POST["Accion"]){
		case 'GUARDAR':
			$sql="INSERT INTO usuarios(user,pass,tipo) VALUES('".$_POST['txtUsuario']."',md5('".$_POST['txtContrasena']."'),'C')";
			$r1=mysql_query($sql);
			$idu=mysql_insert_id();
			echo $sql2="INSERT INTO clientes(id_usuario, nombre, apellidos, direccion, cp, ciudad, empresa, rfc, telefono_casa, telefono_celular, telefono_trabajo, email, fax, no_cuenta)";
			$sql2=$sql2."VALUES('".$idu."','".$_POST["txtNombre"]."', '".$_POST["txtApellidos"]."','".$_POST["txtDireccion"]."','".$_POST["txtCP"]."','".$_POST["txtCiudad"]."','".$_POST["txtEmpresa"]."','".$_POST["txtRFC"]."','".$_POST["txtCasa"]."','".$_POST["txtCelular"]."','".$_POST["txtTrabajo"]."','".$_POST["txtEmail"]."','".$_POST["txtFax"]."','".$_POST["txtNoCuenta"]."')";
			$r2=mysql_query($sql2);
			$idc=mysql_insert_id();
			if($r1==1 && $r2==1){
				$resultado="GUARDO";	
				$_POST["idc"]=$idc;
				$_POST["idu"]=$idu;
				$_POST["Accion"]="BUSCAR";
			}
			else{
				$resultado="NOGUARDO";		
			}
		break;
		case 'MODIFICAR':
			if($_POST["txtContrasena"]==$_POST["txtReContrasena"] && $_POST["txtContrasena"]!=""){
				$mod1="UPDATE usuarios SET pass=md5('".$_POST["txtContrasena"]."') WHERE id='".$_POST["idu"]."'";
				$exito_mod_1=mysql_query($mod1);
			}
			else{
				$exito_mod_1=2;	
			}
			$mod_estatus="UPDATE usuarios SET estatus='".$_POST["estatus"]."' WHERE id='".$_POST["idu"]."'";
			$ejestatus=mysql_query($mod_estatus);
			
			$mod="UPDATE clientes SET nombre='".$_POST["txtNombre"]."', apellidos='".$_POST["txtApellidos"]."', direccion='".$_POST["txtDireccion"]."', cp='".$_POST["txtCP"]."', ciudad='".$_POST["txtCiudad"]."', empresa='".$_POST["txtEmpresa"]."', rfc='".$_POST["txtRFC"]."', telefono_casa='".$_POST["txtCasa"]."', telefono_celular='".$_POST["txtCelular"]."', telefono_trabajo='".$_POST["txtTrabajo"]."', email='".$_POST["txtEmail"]."', fax='".$_POST["txtFax"]."', no_cuenta='".$_POST["txtNoCuenta"]."' WHERE id='".$_POST["idc"]."'";
			$exito_mod_2=mysql_query($mod);
			if(($exito_mod_1==1 || $exito_mod_1==2)&& $exito_mod_2==1 && $ejestatus==1){
				$resultado="MODIFICO";	
			}
			else{
				$resultado="NOMODIFICO";
			}
			$_POST["Accion"]="BUSCAR";	
		break;
		case 'ELIMINAR':
			$sql="SELECT*FROM clientes WHERE id='".$_POST["idc"]."'";
			$ejsql=mysql_query($sql);
			if(mysql_num_rows($ejsql)>0){
				$eliminar="DELETE FROM clientes WHERE id='".$_POST["idc"]."'";
				mysql_query($eliminar);
				$eliminar_user="DELETE FROM usuarios WHERE id='".$_POST["idu"]."'";
				mysql_query($eliminar_user);
				$resultado="ELIMINO";
				$_POST["idu"]="";
				$_POST["idc"]="";
			}
			else{
				$resultado="NOEXISTENOELIMINO";
			}
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
<title>Cliente</title>
<link href="../lib/css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="../lib/css/manage.css" rel="stylesheet" type="text/css" media="all" />
<link href="../lib/css/clientes.css" rel="stylesheet" type="text/css" media="all" />
<link href="../lib/css/tinybox2.css" rel="stylesheet" type="text/css" media="all" />
<script language="javascript" type="text/javascript" src="../lib/js/jquery-1.7.min.js"></script>
<script language="javascript" type="text/javascript" src="../lib/js/jquery.sisyphus.js"></script>
<script language="javascript" type="text/javascript" src="../lib/js/tinybox2.js"></script>
<script language="javascript" type="text/javascript" src="cliente.js"></script>
</head>
<body>
<input type="hidden" name="data-estatus" id="data-estatus" value="<?=$usuario["estatus"]?>" /><!-- ESTE CAMPO DEBE QUEDAR FUERA DEL FORMULARIO UNICAMENE SE USA PARA RECIBIR LA VARIABLE Y PODER LEERLA -->
<form id="Datos" action="<?=$_SERVER["PHP_SELF"]?>" method="post">
<input type="hidden" name="Respuesta" id="Respuesta" value="<?=$resultado?>" />
<div class="cabeza">
<div class="menu">
    <ul class="menu_cliente">
        <li><a href="<?=$menu_cliente["pedidos"]?>">Pedidos</a></li>
        <li><a href="<?=$menu_cliente["productos"]?>">Productos</a></li>
        <li><a class="seleccionado" href="<?=$menu_cliente["clientes"]?>">Clientes</a></li>
        <li><a href="<?=$menu_cliente["usuarios"]?>">Usuarios</a></li>
        <li><a href="<?=$menu_cliente["noticias"]?>">Noticias</a></li>
        <li><a href="<?=$menu_cliente["sitio"]?>">Ir al sitio</a></li>
        <li><a href="<?=$menu_cliente["salir"]?>">Salir</a></li>
    </ul>
    <div class="limpiar"></div>
</div>
</div>
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
    <td width="17%">
    <label>
    <input type="radio" name="estatus" id="estatus" value="1" />
      Habilitado</label></td>
    <td width="65%">
    <label>
    <input type="radio" name="estatus" id="estatus" value="0" />
      Deshabilitado</label></td>
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
      <input type="button" name="btModificar" id="btModificar" value="Modificar" />
      <input type="button" name="btEliminar" id="btEliminar" value="Eliminar" /></td>
  </tr>
</table>
</fieldset>
</div>
<div class="fondo">
<p>Sistema de administración de contenido de PROCLIMME</p>
</div>
<input type="hidden" name="Accion" id="Accion" />
<input type="hidden" name="idc" id="idc" value="<?=$_POST["idc"]?>" />
<input type="hidden" name="idu" id="idu" value="<?=$_POST["idu"]?>"/>
</form>
</body>
</html>