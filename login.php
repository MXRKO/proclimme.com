<?
	session_start();
	include("lib/php/settings.php");
	if($_POST["txtUser"]=="demo" && $_POST["txtPass"]=="demo"){
		$_SESSION["idUser"]="demo";
		?>
		<script>
			alert("Bienvenido");
        	window.location.href="index.php";
        </script>
		<?
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PROCLIMME</title>
<link href="lib/css/reset.css" rel="stylesheet" type="text/css" />
<link href="lib/css/diseno.css" rel="stylesheet" type="text/css" />
<link href="lib/css/login.css" rel="stylesheet" type="text/css" />
<link href="lib/css/tinybox/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="fondo">
	<div class="login">
    	<div class="logoBlanco">
        	<img src="image/logoSesion.png" width="182" height="93" />
        </div>
        <div class="datosSesion">
        <form id="Datos" name="Datos" action="<?=$_SERVER['PHP_SELF']?>" method="post">
          <table class="tSesion" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="45%" class="texto"><label for="txtUser">Usuario</label></td>
              <td width="55%"><input type="text" name="txtUser" id="txtUser" /></td>
            </tr>
            <tr>
              <td class="texto"><label for="txtPass">Contraseña</label></td>
              <td><input type="password" name="txtPass" id="txtPass" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="image" src="image/btnEntrar.png" width="110" height="33" /></td>
            </tr>
          </table>
		</form>        	
    </div>
        <div class="limpiar"></div>
    </div>
</div>
</body>
<script type="text/javascript" language="javascript" src="lib/js/jquery-1.5.2.min.js"></script>
<script type="text/javascript" language="javascript" src="lib/js/jquery.cycle.all.js"></script>
<script type="text/javascript" language="javascript" src="lib/js/tinybox2/tinybox.js"></script>
</html>