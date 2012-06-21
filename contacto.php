<?
	session_start();
	include("lib/php/settings.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PROCLIMME</title>
<link href="lib/css/reset.css" rel="stylesheet" type="text/css" />
<link href="lib/css/diseno.css" rel="stylesheet" type="text/css" />
<link href="lib/css/contacto.css" rel="stylesheet" type="text/css" />
<link href="lib/css/tinybox/style.css" rel="stylesheet" type="text/css" />
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
                <li><a href="<?=$menu["inicio"]?>">Inicio</a></li>
                <li><a href="<?=$menu["productos"]?>">Productos</a></li>
                <li><a href="<?=$menu["costos"]?>">Costos</a></li>
                <li><a href="<?=$menu["quienes"]?>">Quienes somos</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>    
        </div>
        <div class="limpiar"></div>    
     </div>
</div>
<div class="imgCentral">
    <div class="bannerImgs">
        <div class="bannerItem contacto">
        </div>
    </div>
</div>
<!-- <div class="subbarra">
	<div class="marco">
    	<p>breve descripción</p>
    </div>
</div> -->
<div class="contenido texto">
	<div class="marco">
        <div class="marcoTitulo">
        	<h1 class="tituloContacto">Información de Contacto</h1>
        </div>
        <h3>M. en C. Roberto Ramírez Villa</h3>
		<p>Especialista en Hidrometeorología y Meteorología Operativa</p>
		<p>Cel.:  044 2281 876880</p>
		<p>Correo:  robertovilla@proclimme.com</p>
 		<div class="separador"></div>
        <h3>M. en C. Ildefonso Hernández Alcaide</h3>
		<p>Especialista en Hidrometeorología y Meteorología Operativa</p>
		<p>Cel.:  044 5533 789747</p>
		<p>Correo:  ildealcaide@proclimme.com</p>
        <div class="social">
        	<input type="image" src="image/btnFace.png" onclick="window.location.href='https://www.facebook.com/Proclimme'" /><input type="image" src="image/btnYouTube.png" onclick="window.location.href='http://www.youtube.com/channel/UCISegxqV_mwSbUSPw0DrGzw?feature=results_main'" />
        </div>    
    </div>
</div>
<div class="footer">
	<div class="marco">
    	<div class="logo_footer">
        	<p><img src="image/logo_footer.png" height="24" width="122"/></p>
    	</div>
        <div class="menufooter">
        	<ul>
            	<li><a href="<?=$menu["inicio"]?>">Inicio</a></li>
                <li><a href="<?=$menu["productos"]?>">Productos</a></li>
                <li><a href="<?=$menu["costos"]?>">Costos</a></li>
                <li><a href="<?=$menu["quienes"]?>">Quienes somos</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </div>
        <div class="limpiar"></div>
    </div>
</div>
</body>
<script type="text/javascript" language="javascript" src="lib/js/jquery-1.5.2.min.js"></script>
<script type="text/javascript" language="javascript" src="lib/js/jquery.cycle.all.js"></script>
<script type="text/javascript" language="javascript" src="lib/js/tinybox2/tinybox.js"></script>
</html>