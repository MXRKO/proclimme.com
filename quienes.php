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
        	<h1 class="tituloQuienes">Quienes somos</h1>
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
        <!--
        <div class="marcoTitulo">
        	<h1 class="tituloQuienes">Importancia del análisis climatológico</h1> 
        </div>
        <div class="imgDer">
        	<img src="image/quienes_texto_1.png" height="174" width="281" />
            <p class="pie">Principales afectaciones en México.</p>
            <div class="separadorParrafo"></div>
            <img src="image/quienes_texto_2.png" height="174" width="281" />
            <p class="pie">Estados afectados; Ponce F., 2010.</p>
        </div>
        <p>El impacto adverso ligado a la ocurrencia de fenómenos meteorológicos y climatológicos extremos o anómalos han mostrado la importancia de la información oportuna, constante y confiable dentro de este ámbito para proteger y mitigar las afectaciones que puedan presentarse en diversos sectores económicos vulnerables como el agropecuario, además de los proveedores de servicios e insumos, instituciones financieras, aseguradoras, niveles de gobierno y sociedad en general, no solo porque las condiciones climatológicas son un factor determinante en la disponibilidad de alimentos y los costos en los productos, sino también por la alta dependencia de factores meteorológicos como viento, precipitación, humedad, temperaturas, sequías, granizo, heladas y por la alta susceptibilidad de afectación por eventos extremos de este tipo que ponen en riesgo dicha actividad.</p>
        <div class="separadorParrafo"></div>
        <p>Eventos meteorológicos y climáticos severos considerados anomalías con respecto a la condiciones medias y extremas de una región pueden resultar en catástrofes naturales que señalan la importancia de contar con herramientas, instrumentos e información que constituyan un apoyo en la toma de decisiones y planeación de actividades.</p>
        <div class="separadorParrafo"></div>
        <p>De acuerdo con el CENAPRED los fenómenos de tipo hidrometeorológicos son los que han generado mayor porcentaje de daños tanto en la economía de las regiones afectadas, como en la vida normal de los pobladores en cada caso (figura 1). Durante el año 2002 los fenómenos hidrometeorológicos fueron los que tuvieron mayor incidencia dentro del territorio nacional en cuanto al número y sus efectos destructivos, y la consecuente afectación de las economías nacional y regional. Así mismo, estos fenómenos fueron los que produjeron un mayor número de decesos, solo por debajo de los fenómenos socio-organizativos (Bitran, 2003).</p>
        <div class="separadorParrafo"></div>
        <p>Durante el 2002 el fenómeno de la sequía tuvo incidencias importantes en el territorio nacional ya que superaron en un 41% las pérdidas registradas por este concepto en el 2001 que ascendieron a 254 millones muy por debajo de las registradas en el 2002 que fueron de 359 millones de pesos. Los estados más afectados fueron Sonora, Sinaloa, Tlaxcala, Veracruz y San Luis Potosí entre otros. El nivel más crítico llegó en los meses de abril, mayo y junio ocasionando la pérdida de 11,600 cabezas de ganado aproximadamente, así como la afectación de 145,000 hectáreas de cultivos.</p>
        <div class="separadorParrafo"></div>
        <p>Los fenómenos relativos a las lluvias e inundaciones causaron un 93.9% del total de pérdidas por desastres de todo tipo registradas en el año 2002 (10,544 millones), causando 52 decesos, poco más de 5.8 millones de personas que presentaron alguna afectación directa por el fenómeno. Así mismo, más de 139 mil viviendas resultaron con algún tipo de daño a causa de las lluvias, mientras que 3,467 escuelas de distintos niveles presentaron los mismos estragos. Por último, en cuanto a la infraestructura pública en lo que respecta a las vías de comunicación, fueron afectados extensos tramos carreteros en diversos estados, (2,742 kilómetros). Mientras que en el sector productivo, en especial el de la agricultura, fueron dañadas un total de más de 514 mil hectáreas de diversos tipos de cultivo.</p>
 		<div class="separadorParrafo"></div>
        <p>En 2002, los recursos autorizados para la atención de desastres naturales ascendieron a 4 044.5 millones de pesos, los cuales se utilizaron principalmente para atender los daños causados en Yucatán, Campeche y Nayarit, por los huracanes Isidore y Kenna, durante septiembre y octubre de 2002. En el periodo enero-junio de 2003, los recursos autorizados ascendieron a 701.7 millones de pesos, de los cuales 681.7 millones de pesos se autorizaron con cargo al Fideicomiso FONDEN y 20 millones de pesos con cargo al Programa FONDEN del Ramo 23 Provisiones Salariales y Económicas. El resto, 21.7 por ciento, se asignó a la mitigación de daños originados por lluvias y sequías atípicas que afectaron activos productivos, a la reparación y reconstrucción de viviendas dañadas de población de bajos ingresos, así como a la rehabilitación y reparación de infraestructura federal, estatal y municipal en diversas entidades federativas (Bitran, 2003).</p>
        <div class="separadorParrafo"></div>
        <p>Tan solo en el año 2005 los daños por fenómenos hidrometeorológicos extremos se resumen en muertes, personas afectadas, viviendas dañadas, caminos destruidos; el monto total de daños ascendió a 45096 millones de pesos y la pérdida de vidas humanas se contabilizó en 203. Tal es el caso de eventos extremos como el ejemplo del huracán Stan, formado en el Océano Atlántico, el cual tocó tierra en territorio mexicano ocasionando lluvias torrenciales en el país, así como inundaciones, desbordamiento de ríos, desgajamiento de cerros y la muerte de alrededor 2,000 personas en México y Centroamérica.</p>
        <div class="separadorParrafo"></div>
        <p>El desastre económico causado por Stan se calcula que fue aproximadamente de 2,000 millones de dólares. Se estima que el costo por los daños a la agricultura fue cercano a los 400 millones de pesos, ya que alcanzaron las 193,253 hectáreas, 23,835 cabezas de ganado, 3,430 unidades pesqueras y 1,027 embarcaciones mientras que en numerosas poblaciones del sur del Estado de Chiapas causó daños calculados en 15,031.5 millones de pesos en daños directos e indirectos, resultando en 208,064.6 hectáreas para cultivo dañadas (CENAPRED, 2003).</p>
        <div class="separadorParrafo"></div>
        <p>Debido a esto, es de suma importancia contar con información climatológica actualizada y confiable, por lo que en PROCLIMME nos preocupamos y ocupamos no sólo en ofrecer a los tomadores de decisiones, sector privado y sociedad en general, las herramientas que ayuden en la interminable tarea de la gestión de riesgos por fenómenos Hidrometeorológicos, sino también el soporte técnico que ayude en el correcto y eficiente uso de las herramientas meteorológicas y climáticas ofertadas por nuestro equipo de trabajo.</p>
        -->
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
</html>