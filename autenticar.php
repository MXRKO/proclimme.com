<?
session_start();
session_register("user_name");
session_register("iduser");
include("lib/php/conexion.php");

function quitar($mensaje)
{
	$mensaje = str_replace("<","<",$mensaje);
	$mensaje = str_replace(">",">",$mensaje);
	$mensaje = str_replace("\'","'",$mensaje);
	$mensaje = str_replace('\"',"'",$mensaje);
	$mensaje = str_replace('\\\\','"\"',$mensaje);
	return $mensaje;
}

if(trim($_POST["txtUser"]) != "" && trim($_POST["txtPass"]) != "")
{
	$nickN = quitar($_POST["txtUser"]);
	$passN = quitar($_POST["txtPass"]);

    $consulta="SELECT id, user, pass FROM usuarios WHERE user='$nickN' AND pass = MD5('$passN') AND estatus = '1' LIMIT 1";
	$result = mysql_query($consulta);
	if($row = mysql_fetch_array($result))
	{
		$sql_cliente="SELECT*FROM clientes WHERE id_usuario='".$row["id"]."'";
		$busca=mysql_query($sql_cliente);
		if(mysql_num_rows($busca)>0){
			$liga="index.php";
			$client=mysql_fetch_array($busca);
			$_SESSION["idclient"]=$client;
		}
		else{
			$liga="manage/clientes.php";	
		}
		$_SESSION["username"]=$row["usuario"];
		$_SESSION["iduser"]=$row["id"];
		?>
        Cargando...
        <script type="text/javascript" languaje="javascript">
        window.location.href="<?=$liga?>";
        </script>
		<?
	}
	else
	{
		session_unset();
		session_destroy();
		echo "<html><script>alert('Datos incorrectos, intentelo nuevamente');";
		echo "window.location.href='login.php';</script></html>";
	}
	mysql_free_result($result);
	}
else
{
	echo "<html><script>alert('Usuario no existente en la base de datos');";
	echo "window.location.href='login.php';</script></html>";
}
mysql_close();
?>