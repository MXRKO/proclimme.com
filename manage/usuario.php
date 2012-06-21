<?
	session_start();
	include("../lib/php/conexion.php");
	include("../lib/php/settings.php");
	
	switch($_POST["Accion"]){
		case 'GUARDAR':
			$insertarPass="INSERT INTO usuarios(user, pass, tipo, estatus) VALUES('".$_POST["txtUsuario"]."',md5('".$_POST["txtContrasena"]."'),'A','".$_POST["estatus"]."')";
			$res_insert=mysql_query($insertarPass);
			$_POST["idu"]=mysql_insert_id();
			$_POST["Accion"]="BUSCAR";
			if($res_insert==1){
				$resultado="GUARDO";
			}
			else{
				$resultado="NOGUARDO";	
			}
		break;
		case 'MODIFICAR':
			if($_POST["txtContrasena"]==$_POST["txtReContrasena"] && $_POST["txtContrasena"]!=""){
				$update="UPDATE usuarios SET pass='".$_POST["txtContrasena"]."' WHERE id='".$_POST["idu"]."'";
				$exito_mod_1=mysql_query($update);
			}
			else{
				$exito_mod_1=2;	
			}
			$updateEstatus="UPDATE usuarios SET estatus='".$_POST["estatus"]."' WHERE id='".$_POST["idu"]."'";
			$exito_mod_2=mysql_query($updateEstatus);
			if(($exito_mod_1==1 || $exito_mod_1==2) && $exito_mod_2==1 ){
				$resultado="MODIFICO";
			}
			else{
				$resultado="NOMODIFICO";	
			}
			$_POST["Accion"]="BUSCAR";
		break;
		case 'ELIMINAR':
			$sql="SELECT*FROM usuarios WHERE id='".$_POST["idu"]."'";
			$ejsql=mysql_query($sql);
			if(mysql_num_rows($ejsql)>0){
				$eliminar="DELETE FROM usuarios WHERE id='".$_POST["idu"]."'";
				mysql_query($eliminar);
				$resultado="ELIMINO";
				$_POST["idu"]="";
			}
		break;
	}
	if($_POST["Accion"]=="BUSCAR"){
		$sql="SELECT*FROM usuarios WHERE id='".$_POST["idu"]."'";
		$ejsql=mysql_query($sql);
		if(mysql_num_rows($ejsql)>0){
			$usuario=mysql_fetch_array($ejsql);	
		}
		else{
			$resultado="NOEXISTE";	
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="../lib/css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="../lib/css/manage.css" rel="stylesheet" type="text/css" media="all" />
<link href="../lib/css/usuarios.css" rel="stylesheet" type="text/css" media="all" />
<link href="../lib/css/tinybox2.css" rel="stylesheet" type="text/css" media="all" />
<script language="javascript" type="text/javascript" src="../lib/js/jquery-1.7.min.js"></script>
<script language="javascript" type="text/javascript" src="../lib/js/jquery.sisyphus.js"></script>
<script language="javascript" type="text/javascript" src="../lib/js/tinybox2.js"></script>
<script language="javascript" type="text/javascript" src="usuario.js"></script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Usuario</title>
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
        <li><a href="<?=$menu_cliente["clientes"]?>">Clientes</a></li>
        <li><a class="seleccionado" href="<?=$menu_cliente["usuarios"]?>">Usuarios</a></li>
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
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2"><p class="nota">Todos los campos marcados con (*) son obligatorios.</p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2"><input type="button" name="btGuardar" id="btGuardar" value="Guardar" />
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
<input type="hidden" name="idu" id="idu" value="<?=$_POST["idu"]?>"/>
<form>
</body>
</html>