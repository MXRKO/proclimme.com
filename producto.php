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
<link href="lib/css/producto.css" rel="stylesheet" type="text/css" />
<link href="lib/css/tinybox/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="lib/js/jquery-1.5.2.min.js"></script>
<script type="text/javascript" language="javascript" src="lib/js/jquery.cycle.all.js"></script>
<script type="text/javascript" language="javascript" src="lib/js/tinybox2/tinybox.js"></script>
<script type="text/javascript" language="javascript" src="producto.js"></script>
</head>
<body>
<input type="hidden" name="xdp" id="xdp" value="<?=$producto["id"]?>"/>
<input type="hidden" name="xdc" id="xdc" value="<?=$_SESSION["idclient"]?>"/>
<input type="hidden" name="xdu" id="xdu" value="<?=$_SESSION["iduser"]?>"/>
<?
	if(isset($_SESSION["iduser"])){
?>
<div class="misesion">
	<div class="opciones">
    	<ul class="ulUser">
        	<li class="ultimo"><a class="ultimo" href="<?=$menu_sesion["salir"]?>">Salir</a></li>
            <li><a href="clientes/<?=$menu_sesion["pedido"]?>">Cotización (<span id="cant_items"><?=$items_pedido?></span>)</a></li>
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
            <p><strong>Formato de entrega: </strong><span>PDF, GIF, JPG</span></p>
            <p><strong>Medio de entrega: </strong><span>Email, CD</span></p>
            <div class="compra">
              <!-- <input class="cantidad" name="txtCantidad" type="text" id="txtCantidad" size="7" value="1" /> -->
              <?
              if(isset($_SESSION["iduser"])){
			  	?>
		    	<input id="btSolicitar" name="btSolicitar" type="image" <?=($id_solicitud>0)?"class='novisible'":"";?> src="image/btnInteresa.png" />
				<input id="btModificar" name="btModificar" type="image" <?=(!$id_solicitud>0)?"class='novisible'":"";?> src="image/btnModificar.png" />
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