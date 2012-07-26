<?
	include("../lib/php/conexion.php");
	switch($_POST["Accion"]){
		case 'ACTUALIZA':
			$update="UPDATE solicitudes SET descripcion='".utf8_decode($_POST["descripcion"])."' WHERE id_pedido='".$_POST["xdpp"]."' AND id='".$_POST["xdst"]."'";
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
			$busca_carrito="SELECT productos.id, pedidos.id_usuario, solicitudes.id_producto, solicitudes.descripcion FROM solicitudes, productos, pedidos WHERE pedidos.id_usuario='".$_POST["xdu"]."' AND productos.id = solicitudes.id_producto AND pedidos.id = solicitudes.id_pedido AND pedidos.estatus='C'";
			$ejcarrito=@mysql_query($busca_carrito);
			$items_pedido=0;
			while($carrito=@mysql_fetch_array($ejcarrito)){
				$items_pedido++;
			}
			echo $items_pedido;
		break;
		case 'ELIMINA':
			$sql_elimina="DELETE FROM solicitudes WHERE id='".$_POST["xdst"]."'";
			$elimino=mysql_query($sql_elimina);
			if($elimino==1){
				$sql_pdd="SELECT solicitudes.id FROM pedidos, solicitudes WHERE pedidos.id = solicitudes.id_pedido AND pedidos.estatus='C' AND pedidos.id='".$_POST["xdpp"]."'";
				$ejpdd=mysql_query($sql_pdd);
				if(mysql_num_rows($ejpdd)>0){
					echo "ELIMINO";			
				}
				else{
					$sql_elimina_pdd="DELETE FROM pedidos WHERE id='".$_POST["xdpp"]."'";
					$elimino2=mysql_query($sql_elimina_pdd);
					if($elimino2==1){
						echo "ELIMINOTODO";	
					}
					else{
						echo "ELIMINO";	
					}
				}
			}
			else{
				echo "NOELIMINO";	
			}
		break;
		case 'CONFIRMAR':
			$sqlSolicitudes="UPDATE solicitudes SET fecha_envio=now() WHERE id_pedido='".$_POST["xdpp"]."'";
			$sqlPedidos="UPDATE pedidos SET estatus='E' AND id='".$_POST["xdpp"]."'";
			$resS=mysql_query($sqlSolicitudes);
			$resP=mysql_query($sqlPedidos);
			if($resS==1 && $resP==1)
				echo "CONFIRMO";
			else
				echo "NOCONFIRMO";
		break;
	}
?>