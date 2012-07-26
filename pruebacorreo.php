<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prueba Correo</title>
</head>

<body>
<?
function correo($de_nombre,$de,$para_nombre,$para,$asunto, $contenido){
	$headers   = array();
	$headers[] = "MIME-Version: 1.0";
	$headers[] = "Content-type: text/html; charset=utf-8";
	$headers[] = "From: ".$de_nombre." <".$de.">";
	$headers[] = "Reply-To: ".$para_nombre." <".$para_nombre.">";
	$headers[] = "Subject: {".$asunto."}";
	$headers[] = "X-Mailer: PHP/".phpversion();
	mail($para, $asunto, $contenido, implode("\r\n", $headers));	
}
correo("Pancho Lopez","pancho@lopez.com","Mark Antuan","zero.marko@gmail.com","mensaje de prueba","<h1>Mensaje enviado automaticamente desde la pagina</h1><p>este es un mensaje enviado desde la página a solicitud del <strong>posible cliente XXX</strong>, para solicitar el producto: <strong>Nombre producto</strong> con las siguientes caracteristicas:</p><h3>Caracteristicas de la cotización</h3><p>\"Un producto con las caracteristicas X, Y, Z\"</p><p>*Este correo ha sido generado de manera automatica</p>");
?>
</body>
</html>