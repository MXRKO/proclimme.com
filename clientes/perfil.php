<?
	session_start();
	include("../lib/php/conexion.php");
	include("../lib/php/settings.php");
	$sql="SELECT*FROM clientes WHERE id='".$_SESSION["iduser"]."'";
	$ejsql=mysql_query($sql);
	if(mysql_num_rows($ejsql)>0){
		$cliente=mysql_fetch_array($ejsql);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PROCLIMME</title>
<link href="../lib/css/reset.css" rel="stylesheet" type="text/css" />
<link href="../lib/css/diseno.css" rel="stylesheet" type="text/css" />
<link href="../lib/css/perfil.css" rel="stylesheet" type="text/css" />
<link href="../lib/css/tinybox/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?
	if(isset($_SESSION["iduser"])){
?>
<div class="misesion">
	<div class="opciones">
    	<ul class="ulUser">
        	<li class="ultimo"><a class="ultimo" href="<?=$menu_sesion["salir"]?>">Salir</a></li>
            <li><a class="carrito" href="<?=$menu_sesion["pedido"]?>">Mi pedido (0)</a></li>
            <li class="primero"><a class="primero" href="<?=$menu_sesion["perfil"]?>">Mi perfil</a></li>
        </ul>
    </div>
</div>
<?
	}
?>
<div class="top <? if(isset($_SESSION["iduser"])){ echo "sesionactiva"; } ?>">
     <div class="centrar">
        <div class="logo">
        </div>
        <div class="dMenu">
            <ul class="menu">
                <li><a href="../<?=$menu["inicio"]?>">Inicio</a></li>
                <li><a href="../<?=$menu["productos"]?>">Productos</a></li>
                <li><a href="../<?=$menu["costos"]?>">Costos</a></li>
                <li><a href="../<?=$menu["quienes"]?>">Quienes somos</a></li>
                <li><a href="../<?=$menu["contacto"]?>">Contacto</a></li>
            </ul>    
        </div>
        <div class="limpiar"></div>    
     </div>
</div>
<div class="contenido texto">
	<div class="marco">
        <!-- <div class="marcoTitulo">
        	<h1 class="tituloQuienes">Mi Perfil</h1>
        </div>-->
        <h1 class="tituloQuienes">Bienvenido <?=$cliente["nombre"]." ".$cliente["apellidos"]?></h1>
        <fieldset>
        	<legend>Datos generales</legend>
            <p><span class="carac">Empresa:</span> <?=$cliente["empresa"]?></p>
            <p><span class="carac">RFC:</span> <?=$cliente["rfc"]?></p>
            <p><span class="carac">Dirección:</span> <?=$cliente["direccions"]?></p>
            <p><span class="carac">Ciudad:</span> <?=$cliente["ciudad"]?></p>
            <p><span class="carac">Código Postal:</span> <?=$cliente["cp"]?></p>
		</fieldset>
        <fieldset>
        	<legend>Datos de contacto</legend>
            <p><span class="carac">Telefono de Oficina:</span> <?=$cliente["telefono_oficina"]?></p>
            <p><span class="carac">Telefono de Casa:</span> <?=$cliente["telefono_casa"]?></p>
            <p><span class="carac">Telefono de Celular:</span> <?=$cliente["telefono_celular"]?></p>
        	<p><span class="carac">Fax:</span> <?=$cliente["fax"]?></p>
        	<p><span class="carac">Email:</span> <?=$cliente["email"]?></p>
        </fieldset>
    </div>
</div>
<div class="footer">
	<div class="marco">
    	<div class="logo_footer">
        	<p><img src="../image/logo_footer.png" height="24" width="122"/></p>
    	</div>
        <div class="menufooter">
        	<ul>
            	<li><a href="../<?=$menu["inicio"]?>">Inicio</a></li>
                <li><a href="../<?=$menu["productos"]?>">Productos</a></li>
                <li><a href="../<?=$menu["costos"]?>">Costos</a></li>
                <li><a href="../<?=$menu["costos"]?>">Quienes somos</a></li>
                <li><a href="../<?=$menu["contacto"]?>">Contacto</a></li>
            </ul>
        </div>
        <div class="limpiar"></div>
    </div>
</div>
</body>
<script type="text/javascript" language="javascript" src="../lib/js/jquery-1.5.2.min.js"></script>
<script type="text/javascript" language="javascript" src="../lib/js/jquery.cycle.all.js"></script>
<script type="text/javascript" language="javascript" src="../lib/js/tinybox2/tinybox.js"></script>
</html>