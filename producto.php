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
<script type="text/javascript" language="javascript" src="lib/js/jquery-1.5.2.min.js"></script>
<script type="text/javascript" language="javascript" src="lib/js/jquery.cycle.all.js"></script>
<script type="text/javascript" language="javascript" src="lib/js/tinybox2/tinybox.js"></script>
<script type="text/javascript" language="javascript" src="producto.js"></script>
</head>
<body>
<input type="hidden" name="idc" id="idc" value="<?=$_SESSION["idclient"]?>"/>
<?
	if(isset($_SESSION["iduser"])){
?>
<div class="misesion">
	<div class="opciones">
    	<ul class="ulUser">
        	<li class="ultimo"><a class="ultimo" href="<?=$menu_sesion["salir"]?>">Salir</a></li>
            <li><a class="carrito" href="clientes/<?=$menu_sesion["pedido"]?>">Mi pedido (0)</a></li>
            <li class="primero"><a class="primero" href="clientes/<?=$menu_sesion["perfil"]?>">Mi perfil</a></li>
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
                <li><a href="<?=$menu["contacto"]?>">Contacto</a></li>
            </ul>    
        </div>
        <div class="limpiar"></div>    
     </div>
</div>
<div class="contenido">
	<div class="top_encabezado"></div>
    <div class="encabezado">
    <h1><?=utf8_encode($producto["nombre"])?></h1>
    	<div class="datosIzq">
        	<div class="zoom"></div>
            <a class="aProducto" href="#"><img src="media/productos/producto<?=$producto["id"]?>.png" data-with="606" data-height="300" data-url="media/productos/item<?=$producto["id"]?>.png" width="369" height="210" /></a>
        </div>
        <div class="datosDer">
        	<p><strong>Descripción breve: </strong><?=nl2br(utf8_encode($producto["descripcion_corta"]))?></p>
            <p><strong>Tiempo estimado de entrega: </strong><span class="tiempo"><?=$producto["entrega_aprox"]?> días</span></p>
            <p><strong>Formato de entrega: </strong><span>PDF, GIF, JPG</span></p>
            <p><strong>Medio de entrega: </strong><span>Email, CD</span></p>
            <p><strong>Precio: </strong><span>$<?=$producto["precio"]?> MXN</span></p>
            <div class="compra">
              <input class="cantidad" name="txtCantidad" type="text" id="txtCantidad" size="7" value="1" />
              <?
              if(isset($_SESSION["iduser"])){
			  	?>
				<input id="btSolicitar" name="btSolicitar" type="image" src="image/btnPedido.png" />
				<?  
			  }
			  else{
				?>
				<input id="btSesion" type="image" src="image/btnSesion2.png" />
				<?  
		      }
			  ?>
			  
      		</div>
        </div>
        <div class="limpiar"></div>
    </div>
	<div class="descripcionProducto">
        <h1>Descripción detallada del producto</h1>
        <p><?=nl2br(utf8_encode($producto["descripcion"]))?></p>
        <p>Nuestros productos son el resultado de análisis estadísticos y modelación numérica de la atmósfera que permiten acceder a información climática y meteorológica de manera actualizada con el fin de proveer condiciones climatológicas futuras, considerando fenómenos y eventos a distintas escalas espaciales y temporales como sistemas convectivos de mesoescala, ciclones tropicales, oscilaciones planetarias y multidecadales, el fenómeno de “El Niño” entre otros.</p>
        <div class="social separadorDescripcion">
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
</html>