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
<link href="lib/css/quienes.css" rel="stylesheet" type="text/css" />
<link href="lib/css/tinybox/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="top">
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
<div class="imgCentral">
    <div class="bannerImgs">
        <div class="bannerItem quienes">
        <h2>Quienes</h2>
        </div>
    </div>
</div>
<!-- <div class="subbarra">
	<div class="marco">
    	<p>breve descripción</p>
    </div>
</div> -->
<div class="contenido texto">
	<div class="marco">
        <div class="marcoTitulo">
        	<h1>Quienes somos</h1>
        </div>
        <p>Somos un grupo de trabajo especializado en Climatología e Hidrometeorología que ofrece productos enfocados al análisis, estudio, monitoreo y previsión de fenómenos atmosféricos y climáticos, así como sus repercusiones, con el fin de reducir los impactos negativos que puedan ocasionar, mejorar las capacidades de planeación ante su ocurrencia y constituir un apoyo en la toma de decisiones importantes para distintos rubros en la sociedad.</p>
        <p>Nuestros productos son el resultado de análisis estadísticos y modelación numérica de la atmósfera que permiten acceder a información climática y meteorológica de manera actualizada con el fin de proveer condiciones climatológicas futuras, considerando fenómenos y eventos a distintas escalas espaciales y temporales como sistemas convectivos de mesoescala, ciclones tropicales, oscilaciones planetarias y multidecadales, el fenómeno de “El Niño” entre otros.</p>
        <div class="mvision">
        	<div class="mision">
            	<h1>Misión</h1>
                <p>Desarrollar y generar productos de previsión climatológica e Hidrometeorológica confiables, con calidad, eficiencia y operatividad, de una manera clara y continua para usuarios que no necesariamente cuenten con experiencia en la materia, apoyando la toma de decisiones y planeación de actividades en México</p>
            </div>
            <div class="vision">
            	<h1>Visión</h1>
                <p>crecer de manera integral y consolidarse como un grupo de trabajo de excelencia en México, que en conjunto con organismos públicos y privados, disminuyan las afectaciones económicas y de vidas humanas ocasionadas por fenómenos climatológicos e hidrometeorológicos, mejorando además los planes de respuesta y contingencia ante estos.</p>
            </div>
            <div class="limpiar"></div>
        </div>
        <div class="marcoTitulo">
        	<h2>IMPORTANCIA DEL ANÁLISIS CLIMATOLÓGICO</h2> 
        </div>
        <div class="imgDer">
        	<img src="image/quienes_texto_1.png" height="174" width="281" />
            <p class="pie">Principales afectaciones en México</p>
        </div>
        <p>El impacto adverso ligado a la ocurrencia de fenómenos meteorológicos y climatológicos extremos o anómalos han mostrado la importancia de la información oportuna, constante y confiable dentro de este ámbito para proteger y mitigar las afectaciones que puedan presentarse en diversos sectores económicos vulnerables como el agropecuario, además de los proveedores de servicios e insumos, instituciones financieras, aseguradoras, niveles de gobierno y sociedad en general, no solo porque las condiciones climatológicas son un factor determinante en la disponibilidad de alimentos y los costos en los productos, sino también por la alta dependencia de factores meteorológicos como viento, precipitación, humedad, temperaturas, sequías, granizo, heladas y por la alta susceptibilidad de afectación por eventos extremos de este tipo que ponen en riesgo dicha actividad.</p>
        <p>Eventos meteorológicos y climáticos severos considerados anomalías con respecto a la condiciones medias y extremas de una región pueden resultar en catástrofes naturales que señalan la importancia de contar con herramientas, instrumentos e información que constituyan un apoyo en la toma de decisiones y planeación de actividades.</p>
        <p>De acuerdo con el CENAPRED los fenómenos de tipo hidrometeorológicos son los que han generado mayor porcentaje de daños tanto en la economía de las regiones afectadas, como en la vida normal de los pobladores en cada caso (figura 1). Durante el año 2002 los fenómenos hidrometeorológicos fueron los que tuvieron mayor incidencia dentro del territorio nacional en cuanto al número y sus efectos destructivos, y la consecuente afectación de las economías nacional y regional. Así mismo, estos fenómenos fueron los que produjeron un mayor número de decesos, solo por debajo de los fenómenos socio-organizativos (Bitran, 2003).</p>
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
</html>