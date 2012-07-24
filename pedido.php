<?
	include("lib/php/conexion.php");
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
    <td><p class="listado">Correo electrónico</p></td>
    <td><label>
      <input type="text" id="txtCorreo" name="txtCorreo" size="29" />
    </label></td>
  </tr>
  <tr>
    <td colspan="2">
    	<p class="listado">Requisitos de su cotización:</p>
        <textarea cols="51" rows="6" id="txtDescripcion" name="txtDescripcion"></textarea>
    </td>
    </tr>
</table>
<div class="respuesta"></div>
	<div class="opciones">
    <input id="btEnviar" type="image" src="image/btnEnviar.png" onclick='enviar();' />
    <input id="btCancelar" type="image" src="image/btnCancelar.png" onClick='cancelar();'>
    <input class="novisible" id="btAceptar" type="image" src="image/btnAceptar.png" onClick='cancelar();'>
    </div>
</div>
<?
	}
	else if($_POST["Accion"]=="PEDIDO"){
		$id_pedido=0;
		if(tieneIdPedido($_POST["xdu"])>0){
			$id_pedido=tieneIdPedido($_POST["xdu"]);
		}
		else{
			$inserta_pedido="INSERT INTO pedidos(id_usuario, estatus, fecha) VALUES('".$_POST["xdu"]."','C',now())";
			mysql_query($inserta_pedido);
			$id_pedido=mysql_insert_id();			
		}
		$inserta="INSERT INTO solicitudes(id_pedido, id_producto, fecha_carrito) VALUES('".$id_pedido."','".$_POST["xdp"]."',now())";	
		$res=@mysql_query($inserta);
		if($res=='1'){
			echo "REALIZOPEDIDO";	
		}
		else{
			echo "ERRORPEDIDO";
		}
	}else if($_POST["Accion"]=="PEDIDOSINUSUARIO"){
		$inserta_pedido="INSERT INTO pedidos(id_usuario, estatus, email, fecha) VALUES('0','S','".$_POST["correo"]."',now())";
		mysql_query($inserta_pedido);
		$id_pedido=mysql_insert_id();				
		
		$inserta="INSERT INTO solicitudes(id_pedido, id_producto, fecha_carrito, descripcion) VALUES('".$id_pedido."','".$_POST["xdp"]."',now(),'".$_POST["descripcion"]."')";	
		$res=@mysql_query($inserta);
		mail("pepito@desarrolloweb.com,maria@guiartemultimedia.com","asuntillo","Este es el cuerpo del mensaje")
		if($res=='1'){
			echo "REALIZOPEDIDOSINUSUARIO";	
		}
		else{
			echo "ERRORPEDIDOSINUSUARIO";
		}
	}
	
function tieneIdPedido($xdu){
	$buca_pedido="SELECT id FROM pedidos WHERE id=(SELECT MAX(id) FROM pedidos WHERE id_usuario='".$xdu."' AND estatus='C')";
	$ej_pedido=mysql_query($buca_pedido);
	if(mysql_num_rows($ej_pedido)>0){
		$pdd=mysql_fetch_array($ej_pedido);
		return $pdd["id"]; 	
	}
	else{
		return 0;	
	}
}

function enviarCorreo(){
	mail();	
}
?>