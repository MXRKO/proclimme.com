<?
	session_start();
	include("lib/php/settings.php");
	include("lib/php/conexion.php");
	if(isset($_GET["id"])){
		$sqlproducto="SELECT*FROM productos WHERE id='".$_GET["id"]."'";
		$ej_sqlproducto=mysql_query($sqlproducto);
		if(mysql_num_rows($ej_sqlproducto)>0){
			$producto=mysql_fetch_array($ej_sqlproducto);
		}
	}
	if(isset($_SESSION["iduser"])){
		$busca_carrito="SELECT productos.id, pedidos.id_usuario, solicitudes.id_producto, solicitudes.descripcion FROM solicitudes, productos, pedidos WHERE pedidos.id_usuario='".$_SESSION["iduser"]."' AND productos.id = solicitudes.id_producto AND pedidos.id = solicitudes.id_pedido AND pedidos.estatus='C'";
		$ejcarrito=mysql_query($busca_carrito);
		$items_pedido=0;
		$total=0;
		while($carrito=mysql_fetch_array($ejcarrito)){
			$items_pedido++;
		}
		
		$id_solicitud=0;
		$busca_pedido_solicitud="SELECT solicitudes.id AS id_solicitud FROM solicitudes, pedidos, productos WHERE productos.id = '".$producto["id"]."' AND pedidos.id = solicitudes.id_pedido AND solicitudes.id_producto = productos.id";
		$ej_pedido_solicitud=mysql_query($busca_pedido_solicitud);
		if(mysql_num_rows($ej_pedido_solicitud)>0){
			$dat_pedido_solicitud=mysql_fetch_array($ej_pedido_solicitud);
			$id_solicitud=$dat_pedido_solicitud["id_solicitud"];
		}
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PROCLIMME</title>
<link href="lib/css/reset.css" rel="stylesheet" type="text/css" />
<link href="lib/css/diseno.css" rel="stylesheet" type="text/css" />
<link href="lib/css/quienes.css" rel="stylesheet" type="text/css" />
<link href="lib/css/tinybox/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="image/favicon.ico" />
</head>
<body>
<?
	if(isset($_SESSION["iduser"])){
?>
<div class="misesion">
	<div class="opciones">
    	<ul class="ulUser">
        	<?
        if(isset($_SESSION["idclient"])){
			?>
            <li class="ultimo"><a class="ultimo" href="<?=$menu_sesion["salir"]?>">Salir</a></li>
            <li><a href="clientes/<?=$menu_sesion["pedido"]?>">Cotización (<?=$items_pedido?>)</a></li>
            <li><a href="clientes/<?=$menu_sesion["productos"]?>">Productos</a></li>
            <li class="primero"><a class="primero" href="clientes/<?=$menu_sesion["perfil"]?>">Mi perfil</a></li>
        <?
		}
		else{
		?>
        	<li class="ultimo"><a class="ultimo" href="<?=$menu_sesion["salir"]?>">Salir</a></li>
            <li class="primero"><a href="manage/<?=$menu_sesion_admin["control"]?>">Control</a></li>
		<?
		}
		?>
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
                <li><a href="#">Quienes somos</a></li>
                <li><a href="<?=$menu["noticias"]?>">Noticias</a></li>
                <li><a href="<?=$menu["contacto"]?>">Contacto</a></li>
            </ul>    
        </div>
        <div class="limpiar"></div>    
     </div>
</div>
<div class="imgCentral">
    <div class="bannerImgs">
        <div class="bannerItem quienes">
        </div>
    </div>
</div>
<div class="contenido texto">
	<div class="marco">
        <div class="marcoTitulo">
        	<h1 class="tituloQuienes">Quienes somos</h1>
        </div>
        <p>Somos un grupo de trabajo especializado en Climatología e Hidrometeorología que ofrece productos enfocados al análisis, estudio, monitoreo y previsión de fenómenos atmosféricos y climáticos, así como sus repercusiones, con el fin de reducir los impactos negativos que puedan ocasionar, mejorar las capacidades de planeación ante su ocurrencia y constituir un apoyo en la toma de decisiones importantes para distintos rubros en la sociedad.</p>
        <p>Nuestros productos son el resultado de análisis estadísticos y modelación numérica de la atmósfera que permiten acceder a información climática y meteorológica de manera actualizada con el fin de proveer condiciones climatológicas futuras, considerando fenómenos y eventos a distintas escalas espaciales y temporales como sistemas convectivos de mesoescala, ciclones tropicales, oscilaciones planetarias y multidecadales, el fenómeno de “El Niño” entre otros.</p>
        <div class="mvision">
        	<div class="mision">
            	<h1>Misión</h1>
                <p>Desarrollar y generar productos de previsión climatológica e Hidrometeorológica confiables, con calidad, eficiencia y operatividad, de una manera clara y continua para usuarios que no necesariamente cuenten con experiencia en la materia, apoyando la toma de decisiones y planeación de actividades en México</p>
            </div>
            <div class="vision">
            	<h1>Visión</h1>
                <p>crecer de manera integral y consolidarse como un grupo de trabajo de excelencia en México, que en conjunto con organismos públicos y privados, disminuyan las afectaciones económicas y de vidas humanas ocasionadas por fenómenos climatológicos e hidrometeorológicos, mejorando además los planes de respuesta y contingencia ante estos.</p>
            </div>
            <div class="limpiar"></div>
        </div>
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