<?
	include("lib/php/conexion.php");
	//xdc variable que contiene el id del cliente
	//xdp variable que contiene el id de producto 
	$busca="SELECT*FROM productos WHERE id='".$_POST["xdp"]."' AND estatus='1'";
	$datos=@mysql_fetch_array(mysql_query($busca));
	if(!isset($_POST["Accion"])){
?>
<div class="pedido">
<table class="confirmacion" width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="44%"><p class="listado">Nombre del producto</p></td>
    <td width="56%"><p><?=utf8_encode($datos["nombre"])?></p></td>
  </tr>
  <tr>
    <td><p class="listado">Descripción breve</p></td>
    <td><p><?=utf8_encode($datos["descripcion_corta"])?></p></td>
  </tr>
  <tr>
    <td><p class="listado">Precio</p></td>
    <td><p>$ <?=$datos["precio"]?> MXN</p></td>
  </tr>
  <tr>
    <td><p class="listado">Cantidad</p></td>
    <td><p><?=$_POST["cant"]?></p></td>
  </tr>
  <tr>
    <td><p class="listado">Fecha tentativa de entrega</p></td>
    <td><p>En <?=$datos["entrega_aprox"]?> días (aprox.) a partir de hoy</p></td>
  </tr>
</table>
	<div class="respuesta"></div>
	<div class="opciones">
    	<input id="btConfirmar" type="image" src="image/btnConfirmar.png" onClick='confirmar();'>
        <input id="btCancelar" type="image" src="image/btnCancelar.png" onClick='cancelar();'>
    	<input class="novisible" id="btAceptar" type="image" src="image/btnAceptar.png" onClick='cancelar();'>
    </div>
</div>
<?
	}
	else if($_POST["Accion"]=="PEDIDO"){
		$inserta="INSERT INTO pedidos(id_producto, id_usuario, fecha_pedido, cantidad) VALUES('".$_POST["xdp"]."','".$_POST["xdu"]."', NOW(), '".$_POST["cant"]."')";	
		$res=@mysql_query($inserta);
		if($res=='1'){
			echo "REALIZOPEDIDO";	
		}
		else{
			echo "ERRORPEDIDO";
		}
	}
?>