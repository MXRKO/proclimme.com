<?
	session_start();
	include("../lib/php/conexion.php");
	include("../lib/php/settings.php");
	$sql="SELECT*FROM clientes WHERE id='".$_SESSION["idclient"]."'";
	$ejsql=mysql_query($sql);
	if(mysql_num_rows($ejsql)>0){
		$cliente=mysql_fetch_array($ejsql);
		$busca_carrito="SELECT productos.id, pedidos.id_usuario, solicitudes.id_producto, solicitudes.descripcion FROM solicitudes, productos, pedidos WHERE pedidos.id_usuario='".$cliente["id_usuario"]."' AND productos.id = solicitudes.id_producto AND pedidos.id = solicitudes.id_pedido AND pedidos.estatus='C'";
		$ejcarrito=mysql_query($busca_carrito);
		$items_pedido=0;
		$total=0;
		while($carrito=mysql_fetch_array($ejcarrito)){
			$items_pedido++;
		}
	}
		
	$sql_pp="SELECT pedidos.id AS id_pedido FROM pedidos WHERE pedidos.id_usuario='".$_SESSION["iduser"]."' AND pedidos.estatus='C'";
	$ejpp=@mysql_query($sql_pp);
	$datos_pp=@mysql_fetch_array($ejpp);
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
<script type="text/javascript" language="javascript" src="../lib/js/jquery-1.5.2.min.js"></script>
<script type="text/javascript" language="javascript" src="../lib/js/jquery.cycle.all.js"></script>
<script type="text/javascript" language="javascript" src="../lib/js/tinybox2/tinybox.js"></script>
<script type="text/javascript" language="javascript" src="micarrito.js"></script>
</head>
<body>
<input type="hidden" name="xdu" id="xdu" value="<?=$_SESSION["iduser"]?>" />
<input type="hidden" name="xdpp" id="xdpp" value="<?=$datos_pp["id_pedido"]?>" />
<?
	if(isset($_SESSION["idclient"])){
?>
<div class="misesion">
	<div class="opciones">
    	<ul class="ulUser">
        	<li class="ultimo"><a class="ultimo" href="../<?=$menu_sesion["salir"]?>">Salir</a></li>
            <li><a class="totales" href="#">Cotización (<?=$items_pedido?>)</a></li>
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
			$busca="SELECT solicitudes.id AS id_solicitud, solicitudes.id_producto AS id_producto, pedidos.id AS id_pedido, solicitudes.descripcion AS descripcion FROM pedidos, solicitudes WHERE pedidos.id_usuario='".$_SESSION["iduser"]."' AND pedidos.estatus='C' AND pedidos.id = solicitudes.id_pedido";
			$ejbusca=@mysql_query($busca);
			while($pedido=@mysql_fetch_array($ejbusca)){
				$prod="SELECT*FROM productos WHERE id='".$pedido["id_producto"]."'";
				$ejprod=@mysql_query($prod);
				$datos=@mysql_fetch_array($ejprod);
				?>			
					<table class="confirmacion idTabla_<?=$pedido["id_solicitud"]?>" width="100%" border="0" cellpadding="0" cellspacing="0">
					  <tr>
						<td width="34%"><p class="listado">Nombre del producto</p></td>
						<td width="66%"><p><?=utf8_encode($datos["nombre"])?></p></td>
					  </tr>
					  <tr>
					    <td><p>Descripción</p></td>
					    <td><p><?=nl2br(utf8_encode($datos["descripcion"]))?></p></td>
				      </tr>
                      <tr>
					    <td colspan="2">
                        <p>Requisitos de su cotización:</p>
                        <textarea class="descripcion" cols="59" rows="6" id="txtDescripcion_<?=$pedido["id_solicitud"]?>"><?=nl2br(utf8_encode($pedido["descripcion"]))?></textarea></td>
				      </tr>
					  <tr>
						<td>&nbsp;</td>
						<td><input data-idpp="<?=$pedido["id_pedido"]?>" data-idst="<?=$pedido["id_solicitud"]?>" class="mTop15 btActualizar" type="image" src="../image/btnActualizar.png" />
                            <input data-idpp="<?=$pedido["id_pedido"]?>" data-idst="<?=$pedido["id_solicitud"]?>" type="image" src="../image/btnEliminar.png" class="mTop15 btEliminar" />
                        </td>
					  </tr>
                    </table>
                <?
			    }
				?>
        </fieldset>
        </div><!-- TEMRINA PEDIDO --->
        <div class="detalle">
          <?
          	if($datos_pp["id_pedido"]>0){
				?>
				<p>Si usted esta de acuerdo con las solicitudes para cotizaciones, haga clic en confirmar y serán enviadas, unas vez enviadas  nos pondemos en contacto con ustded a la brevedad.</p>
				<input id="btConfirmar" class="mTop15" type="image" src="../image/btnConfirmar.png" />
				<?
			}
		  ?>
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
</html>