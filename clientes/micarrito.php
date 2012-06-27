<?
	session_start();
	include("../lib/php/conexion.php");
	include("../lib/php/settings.php");
	$sql="SELECT*FROM clientes WHERE id='".$_SESSION["idclient"]."'";
	$ejsql=mysql_query($sql);
	if(mysql_num_rows($ejsql)>0){
		$cliente=mysql_fetch_array($ejsql);
		$busca_carrito="SELECT pedidos.cantidad, productos.id, pedidos.id_usuario, pedidos.id_producto, productos.precio FROM pedidos, productos WHERE id_usuario='".$cliente["id_usuario"]."' AND productos.id = pedidos.id_producto";
		$ejcarrito=mysql_query($busca_carrito);
		$items_pedido=0;
		$total=0;
		while($carrito=mysql_fetch_array($ejcarrito)){
			$items_pedido=$carrito["cantidad"]+$items_pedido;
			$total=$carrito["precio"]+$total;
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PROCLIMME</title>
<link href="../lib/css/reset.css" rel="stylesheet" type="text/css" />
<link href="../lib/css/diseno.css" rel="stylesheet" type="text/css" />
<link href="../lib/css/micarrito.css" rel="stylesheet" type="text/css" />
<link href="../lib/css/tinybox/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?
	if(isset($_SESSION["idclient"])){
?>
<div class="misesion">
	<div class="opciones">
    	<ul class="ulUser">
        	<li class="ultimo"><a class="ultimo" href="../<?=$menu_sesion["salir"]?>">Salir</a></li>
            <li><a class="carrito" href="<?=$menu_sesion["pedido"]?>">Mi pedido (<?=$items_pedido?>)</a></li>
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
        
        <h1 class="tituloQuienes">Bienvenido <?=$cliente["nombre"]." ".$cliente["apellidos"]?></h1>
        <div class="pedido">
		<fieldset>
        	<legend>Mi Carro de Compra</legend>
            <?
			$busca="SELECT*FROM pedidos WHERE id_usuario='".$_SESSION["iduser"]."' AND estado='C'";
			$ejbusca=@mysql_query($busca);
			while($pedido=@mysql_fetch_array($ejbusca)){
				$prod="SELECT*FROM productos WHERE id='".$pedido["id_producto"]."'";
				$ejprod=@mysql_query($prod);
				$datos=@mysql_fetch_array($ejprod);
				?>			
					<table class="confirmacion" width="100%" border="0" cellpadding="0" cellspacing="0">
					  <tr>
						<td width="44%"><p class="listado">Nombre del producto</p></td>
						<td width="56%"><p><?=utf8_encode($datos["nombre"])?></p></td>
					  </tr>
					  <tr>
						<td><p class="listado">Precio</p></td>
						<td><p>$ <?=$datos["precio"]?> MXN</p></td>
					  </tr>
					  <tr>
						<td><p class="listado">Cantidad</p></td>
						<td><p><?=$pedido["cantidad"]?></p></td>
					  </tr>
					  <tr>
						<td><p class="listado">Fecha tentativa de entrega</p></td>
						<td><p>En <?=$datos["entrega_aprox"]?> días (aprox.) a partir de hoy</p>
                        	<input class="mTop15 btnEliminar" type="image" src="../image/btnEliminar.png" />
                        </td>
					  </tr>
                    </table>
                <?
			    }
				?>
        </fieldset>
        </div><!-- TEMRINA PEDIDO --->
        <div class="detalle">
        	<p><span class="item">Total:</span> <span class="item_data">$ <?=$total?> MXN</span></p>
            <input class="mTop15" type="image" src="../image/btnConfirmar.png" />
        </div>
        <div class="limpiar"></div>
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