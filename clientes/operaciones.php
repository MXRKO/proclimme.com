<?
	include("../lib/php/conexion.php");
	switch($_POST["Accion"]){
		case 'ACTUALIZA':
			$update="UPDATE pedidos SET cantidad='".$_POST["cantidad"]."' WHERE id_usuario='".$_POST["xdu"]."' AND id='".$_POST["xdp"]."'";
			$efectuado=@mysql_query($update);
			if($efectuado==1)
				echo "ACTUALIZO";	
			else
				echo "NOACTUALIZO";
		break;
		case 'ACTUALIZA_TOTAL':
			$busca_carrito="SELECT pedidos.cantidad, productos.id, pedidos.id_usuario, pedidos.id_producto, productos.precio FROM pedidos, productos WHERE id_usuario='".$_POST["xdu"]."' AND productos.id = pedidos.id_producto";
			$ejcarrito=@mysql_query($busca_carrito);
			$total=0;
			while($carrito=@mysql_fetch_array($ejcarrito)){
				$total=($carrito["precio"]*$carrito["cantidad"])+$total;
			}
			echo $total;
		break;
		case 'ACTUALIZA_ITEMS':
			$busca_carrito="SELECT pedidos.cantidad, productos.id, pedidos.id_usuario, pedidos.id_producto, productos.precio FROM pedidos, productos WHERE id_usuario='".$_POST["xdu"]."' AND productos.id = pedidos.id_producto";
			$ejcarrito=@mysql_query($busca_carrito);
			$items_pedido=0;
			while($carrito=@mysql_fetch_array($ejcarrito)){
				$items_pedido=$carrito["cantidad"]+$items_pedido;
			}
			echo $items_pedido;
		break;
		case 'ELIMINA':
			$sql_elimina="DELETE FROM pedidos WHERE id='".$_POST["xdp"]."'";
			$elimino=mysql_query($sql_elimina);
			if($elimino==1){
				echo "ELIMINO";	
			}
			else{
				echo "NOELIMINO";	
			}
		break;
		case 'CONFIRMAR':
			$i=1;
			$ids=explode("|",$_POST["pds"]);
			$sqlConfirmar="UPDATE pedidos SET estado='P' WHERE";
			foreach($ids as $id){
				$sqlConfirmar=$sqlConfirmar." id='".$id."'";
				if($i<count($ids)){
					$sqlConfirmar=$sqlConfirmar." OR";
				}
				$i++;
			}
			$res=mysql_query($sqlConfirmar);
			if($res)
				echo "CONFIRMO";
			else
				echo "NOCONFIRMO";
		break;
	}
?>