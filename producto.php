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
<link href="lib/css/producto.css" rel="stylesheet" type="text/css" />
<link href="lib/css/tinybox/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="misesion">
	<div class="opciones">
    	<ul class="ulUser">
        	<li class="ultimo"><a class="ultimo" href="#">Salir</a></li>
            <li><a class="carrito" href="#">Mi pedido (0)</a></li>
            <li class="primero"><a class="primero" href="#">Mi perfil</a></li>
        </ul>
    </div>
</div>
<div class="top sesionactiva">
  <div class="centrar">
        <div class="logo">
        </div>
        <div class="dMenu">
            <ul class="menu">
                <li><a href="<?=$menu["inicio"]?>">Inicio</a></li>
                <li><a href="<?=$menu["productos"]?>">Productos</a></li>
                <li><a href="<?=$menu["costos"]?>">Costos</a></li>
                <li><a href="#">Quienes somos</a></li>
                <li><a href="<?=$menu["contacto"]?>">Contacto</a></li>
            </ul>    
        </div>
        <div class="limpiar"></div>    
     </div>
</div>
<!-- <div class="subbarra">
	<div class="marco">
    	<p>breve descripción</p>
    </div>
</div> -->

<div class="contenido">
	<div class="encabezado">
    	<div class="datosIzq">
        	<p>Prueba</p>
        </div>
        <div class="datosDer">
        	<h1>Nombre del producto de este apartado</h1>
            <p><strong>Datos básicos: </strong>Nunc nunc amet, dis quis, non est mus urna! Eros, pulvinar quis elementum nascetur dis? Sed diam elementum. In? Turpis mattis habitasse magna porta mattis lorem odio! Tortor aliquam placerat eros placerat arcu, phasellus nunc, dolor a montes! Tincidunt.</p>
        	<div class="compra">
              <input name="textfield" type="text" id="textfield" size="10" />
              <input type="image" src="image/btnSesion.png" />
      		</div>
        </div>
        <div class="limpiar"></div>
    </div>
	<div class="descripcionProducto">
        <h1>Descripción detallada del producto</h1>
        <p>Somos un grupo de trabajo especializado en Climatología e Hidrometeorología que ofrece productos enfocados al análisis, estudio, monitoreo y previsión de fenómenos atmosféricos y climáticos, así como sus repercusiones, con el fin de reducir los impactos negativos que puedan ocasionar, mejorar las capacidades de planeación ante su ocurrencia y constituir un apoyo en la toma de decisiones importantes para distintos rubros en la sociedad.</p>
        <p>Nuestros productos son el resultado de análisis estadísticos y modelación numérica de la atmósfera que permiten acceder a información climática y meteorológica de manera actualizada con el fin de proveer condiciones climatológicas futuras, considerando fenómenos y eventos a distintas escalas espaciales y temporales como sistemas convectivos de mesoescala, ciclones tropicales, oscilaciones planetarias y multidecadales, el fenómeno de “El Niño” entre otros.</p>
        
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
                <li><a href="#">Quienes somos</a></li>
                <li><a href="<?=$menu["contacto"]?>">Contacto</a></li>
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