<?
	include("lib/php/settings.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PROCLIMME</title>
<link href="lib/css/reset.css" rel="stylesheet" type="text/css" />
<link href="lib/css/diseno.css" rel="stylesheet" type="text/css" />
<link href="lib/css/tinybox/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="top">
     <div class="centrar">
        <div class="logo">
        </div>
        <div class="dMenu">
            <ul class="menu">
                <li><a href="#">Inicio</a></li>
                <li><a href="<?=$menu["productos"]?>">Productos</a></li>
                <li><a href="<?=$menu["costos"]?>">Costos</a></li>
                <li><a href="<?=$menu["quienes"]?>">Quienes somos</a></li>
                <li><a href="<?=$menu["contacto"]?>">Contacto</a></li>
            </ul>    
        </div>
        <div class="limpiar"></div>    
     </div>
</div>
<div class="imgCentral">
    	<div class="bannerImgs">
        	<div class="bannerItem uno">
            <p class="subtitulo">Productos climatologicos y meteorologicos de México</p>
            <p class="slogan">&quot;El clima y el tiempo de tu lado&quot;</p>
        	<input id="sesion" type="image" src="image/btnSesion.png" />
        	</div>
        </div>
    </div>
<div class="centro">
	<div class="miniaturas">
    	<ul class="min">
        	<li><a href="#"><img src="media/productos/miniatura1.png" width="89" height="64" /></a></li>
            <li><a href="#"><img src="media/productos/miniatura2.png" width="89" height="64" /></a></li>
            <li><a href="#"><img src="media/productos/miniatura3.png" width="89" height="64" /></a></li>
            <li><a href="#"><img src="media/productos/miniatura4.png" width="89" height="64" /></a></li>
            <li><a href="#"><img src="media/productos/miniatura5.png" width="89" height="64" /></a></li>
            <li><a href="#"><img src="media/productos/miniatura6.png" width="89" height="64" /></a></li>
            <li><a href="#"><img src="media/productos/miniatura7.png" width="89" height="64" /></a></li>
        </ul>
        <div class="limpiar"></div>
    </div>
	<div class="bannerPrincipal">	
        <div class="productos">
            <div class="item">
            	<div class="imgItem">
                	<img src="media/productos/item1.png" height="300" width="606" />
                </div>
                <div class="datosItem">
                	<h1>Pronóstico meteorológico a 3 días</h1><!-- 1 -->
                    <p>Pronostico de variables y eventos meteorológicos significativos que puedan presentarse dentro de las próximas 72 horas.</p>
                </div>	
                <div class="limpiar"></div>
            </div>
            <div class="item">
            	<div class="imgItem">
                	<img src="media/productos/item2.png" height="300" width="606" />
                </div>
                <div class="datosItem">
                    <h1>Pronóstico de Fenómenos meteorológicos significativos</h1><!-- 2 -->
                    <p>Determinación de valores mínimos de temperatura como sistema de prevención para actividades productivas, pronóstico de lluvias intensas, pronóstico de precipitaciones  que puedan resultar en afectaciones significativas para regiones del territorio mexicano, pronósticos de ondas gélidas y de calor, entre otros.</p>
                </div>	
                <div class="limpiar"></div>
            </div>
            <div class="item">
            	<div class="imgItem">
                	<img src="media/productos/item3.png" height="300" width="606" />
                </div>
                <div class="datosItem">
                    <h1>Pronóstico meteorológico a 7 días</h1><!-- 3 -->
                    <p>Pronostico de variables y eventos meteorológicos significativos que puedan presentarse dentro de las próximas 168 horas, con alta probabilidad de ocurrencia.</p>
                </div>	
                <div class="limpiar"></div>
            </div>
            <div class="item">
            	<div class="imgItem">
                	<img src="media/productos/item4.png" height="300" width="606" />
                </div>
                <div class="datosItem">
                    <h1>Trayectoria y efectos por ciclones tropicales</h1><!-- 4 -->
                    <p>Pronóstico de trayectoria, vientos, rachas y zonas de alertamiento de acuerdo con modelos de pronóstico numérico e información emitida por el Centro Nacional de Huracanes de Miami, EU.</p>
                </div>	
                <div class="limpiar"></div>
            </div>
            <div class="item">
            	<div class="imgItem">
                	<img src="media/productos/item5.png" height="300" width="606" />
                </div>
                <div class="datosItem">
                    <h1>Pronóstico de Marea tormenta</h1><!-- 5 -->
                    <p>Pronóstico de altura de marea asociado con el paso de un ciclón tropical sobre aguas oceánicas que delimitan el territorio mexicano.</p>
                </div>	
                <div class="limpiar"></div>
            </div>
            <div class="item">
            	<div class="imgItem">
                	<img src="media/productos/item6.png" height="300" width="606" />
                </div>
                <div class="datosItem">
                    <h1>Pronóstico climatológico mensual</h1><!-- 6 -->
                    <p>Pronóstico de precipitación, temperatura y otras variables climatológicas para los próximos meses enfocadas a determinar las condiciones esperadas con respecto a valores normales.</p>
                </div>	
                <div class="limpiar"></div>
            </div>
            <div class="item">
            	<div class="imgItem">
                	<img src="media/productos/item7.png" height="300" width="606" />
                </div>
                <div class="datosItem">
                    <h1>Pronóstico climatológico estacional</h1><!-- 7 -->
                    <p>Pronóstico probabilístico de precipitación, temperatura y otras variables climatológicas para 6 o más meses, enfocadas a determinar las condiciones esperadas con respecto a valores normales.</p>
                </div>	
                <div class="limpiar"></div>
            </div>
        </div>        
	</div>
</div>
<div class="contenido">
	<div class="marco">
    	<div class="noticias">
        	<div class="encabezado"><h2>Noticias</h2></div>
            <div class="marco">
                <p class="titulo">Imágenes de la Tierra en HD</p>
                <div class="imgNoticia"></div>
                <p class="fecha">27-05-2012</p>
                <p class="descripcion">Imágenes de la Tierra en alta resolución tomadas por el satélite Ruso Electro-L en distintas longitudes de onda</p>
            </div>
            <div class="marco">
                <p class="titulo">Radiación solar intensa y estabilidad atmosférica propician una disminución en la calidad del aire para el D.F</p>
                <div class="imgNoticia"></div>
                <p class="fecha">24-05-2012</p>
                <p class="descripcion">El Sistema de Monitoreo Atmosférico de la Ciudad de México (Simat) informó que la radiación solar es extremadamente alta en el valle de México, de 11 puntos el Índice de Rayos Ultravioleta (UV).</p>
            </div>
            <div class="marco">
                <p class="titulo">Fuertes vientos asociados a tormenta causan diversos daños en el distrito federal</p>
                <div class="imgNoticia"></div>
                <p class="fecha">21-05-2012</p>
                <p class="descripcion">Tres árboles cayeron por los fuertes vientos y la ligera llovizna, dejando dos vehículos dañados y toda una colonia sin luz en la Gustavo A. Madero</p>
                <div class="limpiar"> </div>
            </div>
        </div>
        <div class="links">
        <div class="monitor">
        	<div class="pantalla" onclick="TINY.box.show({iframe:'video.html',animate:true,close:true,boxid:'frameless',width:505,height:400,fixed:true})"></div>
        </div>
        <div class="iconos">
        <h3>Link de interes</h3>
        	<div class="colIzq">
            	<a target="_blank" href="http://www.climate.org"><img src="image/logo_climate_institute.png" height="77" width="160"/></a>
            	<a target="_blank" href="http://galileo.imta.mx/"><img src="image/logo_galileo.png" height="47" width="160"/></a>
                <a target="_blank" href="http://www.conagua.gob.mx"><img src="image/logo_conagua.png" height="52" width="160"/></a>	
                <a target="_blank" href="http://www.hpc.ncep.noaa.gov"><img src="image/logo_hydrometeorological.png" height="29" width="160"/></a>
            </div>
        	<div class="colDer">
            	<a target="_blank" href="http://www.nhc.noaa.gov"><img src="image/logo_national_hurricane_center.png" width="160" height="65" /></a>
            	<a target="_blank" href="http://www.atmosfera.unam.mx" class="middle"><img src="image/logo_centro_ciencias.png" width="70" height="70" /></a>
                <a target="_blank" href="http://www.proteccioncivil.gob.mx" class="middle"><img src="image/logo_sistema_proteccion_civil.png" height="71" width="70" /></a>
                <a target="_blank" href="http://smn.cna.gob.mx" class="middle"><img src="image/logo_smn.png" width="70" height="82" /></a>
                 <div class="limpiar"></div>
                </div>
            <div class="limpiar"></div>
        </div>
        <!-- <a href="media/video/intro_proclimme.flv"
   style="display:block;width:405px;height:300px;"
   id="player">
</a> -->
        </div>
    	<div class="limpiar"></div>
    </div>
</div>
<div class="footer">
	<div class="marco">
    	<div class="logo_footer">
        	<p><img src="image/logo_footer.png" height="33" width="172"/></p>
    	</div>
        <div class="menufooter">
        	<ul>
            	<li><a href="#">Inicio</a></li>
                <li><a href="#">Productos</a></li>
                <li><a href="#">Costos</a></li>
                <li><a href="#">Quienes somos</a></li>
                <li><a href="#">Contctanos</a></li>
            </ul>
        </div>
        <div class="limpiar"></div>
    </div>
</div>
</body>
<script type="text/javascript" language="javascript" src="lib/js/jquery-1.5.2.min.js"></script>
<script type="text/javascript" language="javascript" src="lib/js/jquery.cycle.all.js"></script>
<script type="text/javascript" language="javascript" src="lib/js/tinybox2/tinybox.js"></script>
<script>
	$(function(){
		$('.productos').cycle({ 
			fx:      'fade', 
			speed:    400, 
			slices: 5,
			timeout:  3500,
			pause:		1,
			pager: 'ul.min',
			pagerAnchorBuilder: function(idx, slide) {
				// return selector string for existing anchor
				return 'ul.min li:eq(' + idx + ') a';
			}
		});
	});
	
	$(document).ready(function(){
		$("#sesion").click(function(){
			alert("En desarrollo");							
		});						   
	});
</script>
</html>