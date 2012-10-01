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
<link href="lib/css/costos.css" rel="stylesheet" type="text/css" />
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
                <li><a href="#">Costos</a></li>
                <li><a href="<?=$menu["quienes"]?>">Quienes somos</a></li>
                <li><a href="<?=$menu["noticias"]?>">Noticias</a></li>
                <li><a href="<?=$menu["contacto"]?>">Contacto</a></li>
            </ul>    
        </div>
        <div class="limpiar"></div>    
     </div>
</div>
<div class="imgCentral">
    <div class="bannerImgs">
        <div class="bannerItem costos">
        </div>
    </div>
</div>
<div class="contenido texto">
	<div class="marco">
        <!-- <h1 class="titulo">PRODUCTOS QUE OFRECEMOS ACORDE A LAS NECESIDADES DEL CLIENTE</h1> -->
        <!-- <p>Nuestros productos son el resultado de análisis estadísticos y modelación numérica de la atmósfera que permiten acceder a información climática y meteorológica de manera constante para proveer condiciones climatológicas futuras, considerando fenómenos y eventos a distintas escalas espaciales y temporales como sistemas convectivos de mesoescala, ciclones tropicales, oscilaciones planetarias y multidecadales, el fenómeno de “El Niño” entre otros.</p>
		<p>PROCLIMME ofrece una cartera de productos especializados que pueden ajustarse a las necesidades del cliente en función de los requerimientos específicos y el alcance de los resultados finales, proporcionado un apoyo en la toma de decisiones, planeación de actividades y disminución de riesgos involucrados con la afectación e impacto de fenómenos climáticos y meteorológicos.</p>
        <p>El precio base de los productos que PROCLIMME ofrece se mencionan a continuación. Las variables pronosticadas (lluvia, temperatura, etc.) se especificarán por el cliente así como las particularidades específicas a entregar, con ello se reajustan los precios en función del producto final, lo siguiente se refiere por tanto sólo a la guía del costo base del producto.</p>
        <div class="marcoClaro">
            	<h1>a) Pronóstico Meteorológico a 7 días</h1>
                <p>Permite emitir un esquema de pronóstico semanal ante fenómenos meteorológicos relevantes en la región de interés, que puedan tener efectos importantes en los intereses del cliente como el paso de ondas tropicales, huracanes, tormentas severas, precipitaciones intensas, vientos fuertes, ondas de calor, heladas, bajas temperaturas, granizadas, etc.</p>
        </div>
        <p>Se proporciona un producto de probabilidad de afectación, intensidad del fenómeno, tipo de fenómeno y posibles afectaciones relacionadas, imágenes satelitales, mapas sinópticos y diagramas resultados de modelos numéricos en un informe técnico detallado y un glosario de terminología adjunto como complemento para una mejor interpretación.</p>
        <p>*Costo aproximado en función de los requerimientos del cliente: 2000.00 por producto semanal + IVA (Plazo mínimo de contrato: 4 semanas).</p>
        <div class="marcoClaro">
        		<h1>b) Pronóstico Climatológico</h1>
                <p>Proporciona un panorama mensual o trimestral de las condiciones climatológicas esperadas para el país, estado o región de interés, así como fenómenos particulares que puedan tener impacto derivado de las condiciones medias o anomalías esperadas, que pueden desprenderse del análisis de otros fenómenos a una escala mayor. Este tipo de pronóstico beneficia significativamente actividades que requieren un mayor tiempo de planeación y ejecución como el agrícola, ya que puede orientar respecto a la ocurrencia, severidad y duración de eventos como la actividad de lluvias, altas y bajas temperaturas, grado de humedad así como probabilidad de ocurrencia de otros fenómenos como ondas de calor en función de factores y moduladores de clima a gran escala como las oscilaciones Cuasibienal, del Atlántico Norte, Madden-Julian, “El Niño”, entre otros.</p>
        </div>
        <p>Se proporciona un producto de probabilidad de afectación, intensidad del fenómeno, tipos de fenómeno, posibles afectaciones relacionadas y diagramas resultados de modelos estadísticos y dinámicos en un informe técnico detallado y un glosario de terminología adjunto como complemento para una mejor interpretación.</p>
        <div class="marcoClaro">
            <p class="precio">*Costo aproximado en función de los requerimientos del cliente:</p>
            <p class="precio">5000.00 por producto mensual + IVA (Plazo mínimo de contrato: 2 meses).</p>
            <p class="precio">8000.00 por producto trimestral + IVA (Plazo mínimo de contrato: 2 trimestres).</p>
            <p class="nota">NOTA: Todos los precios se encuentran en Moneda Nacional (MXN).</p>
        </div>
        -->
        <p>PROCLIMME ofrece una amplia cartera de productos especializados, que pueden ajustarse a las necesidades del cliente, tomando en consideración los requerimientos específicos y el alcance de los resultados finales, enfocado al apoyo de toma de decisiones, planeación de actividades y disminución de riesgos involucrados con la afectación e impacto de fenómenos naturales diversos.</p>
		<p>Los clientes de PROCLIMME tendrán la oportunidad de estructurar, bajo la asistencia de nuestros especialistas, un producto que cumpla con sus espectativas, cubra sus requerimientos y establezca términos de referencia apropiados de manera objetiva. Los costos finales estarán sujetos a la capacidad de cada uno de nuestros clientes y los alcances de los diferentes productos a generarse, con esto PROCLIMME se comprometerá con cada proyecto, a generar productos con los mas altos estándares de calidad para satisfacer las necesidades del usuario final.</p>
	  <div class="marcoClaro">
       	<p>Si requiere de una cotización, o tiene alguna duda sobre cualquiera de nuestros productos le invitamos a que se ponga en contacto con nosotros:</p>
       	  <table width="100%" cellpadding="0" cellspacing="0">
			  <tr>
               	  <td width="7%"><p>Correo</p></td>
                  <td width="93%"><input name="txtCorreo" type="text" id="txtCorreo" size="30" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2"><p>Descripción de la cotización</p></td>
              </tr>
              <tr>
               	  <td colspan="2"><p>
               	    <textarea name="txtDescripcion" cols="55" id="txtDescripcion"></textarea>
               	  </p></td>
              </tr>
              <tr >
               	  <td><input type="button" id="btEnviar" value="Enviar" /></td>
                  <td>&nbsp;</td>
              </tr>            
          </table>
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
<script type="text/javascript" language="javascript" src="costos.js"></script>
</html>