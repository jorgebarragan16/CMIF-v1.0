<?php 
session_start();
include 'ConexionBD.php';
	if(isset($_SESSION['Nick_Administrativo'])){
	echo "";
	}
	else {
		echo '<script> window.location="Inicio_Sesion_Administrativo.php"; </script>';
	}

	$perfil = $_SESSION['Nick_Administrativo'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0033)http://ryca.itfip.edu.co/RYCAWeb/ -->
<html lang="en">
<head>

<meta http-equiv="Content-Type"	content="text/html; charset=windows-1252"></meta>
<meta http-equiv="expires" content="0"></meta>
<link rel="shortcut icon" href="http://ryca.itfip.edu.co/RYCAWeb/public/img/logo.png"></link>
<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Pagina.css"></link>

<title>Validando La Contraseņa</title>

</head>

<body style="background-image: url(./Control_Mantenimiento_Infraestructura_files/Img/Fondo.png);">
		
<?php
include 'ConexionBD.php';
//Obtenemos valores del formulario registro usuario
$passw_a1 = $_POST['Pass_Administrativo1'];
$passw_a2 = $_POST['Pass_Administrativo2'];

//0btiene la longitud de un string
$req = (strlen($passw_a1)*strlen($passw_a2)) or die('"<script> alert("Digite TODOS los campos")</script>" "<script> window.location="Menu_Cambiar_Contrasena_Administrativo.php"</script>');

		if($passw_a1 == $passw_a2)
		{
			//Ingresamos la info a la base de datos
			mysql_query("UPDATE administrativo SET Pass_Administrativo = '$passw_a2' WHERE Nick_Administrativo='".$perfil."' LIMIT 1", $link) or die('"<script> alert("Ha ocurrido un error, por favor vuelva a intentarlo")</script>" "<script> window.location="Menu_Cambiar_Contrasena_Administrativo.php"</script>');
			echo '<script> alert("Felicidades ha actualizado su contrasena, por favor ingrese de nuevo con la contraseņa actualizada");</script>';
			echo '<script> window.location="Salir.php"; </script>';
		}
		
		else
		{
			echo '<script> alert("Las nuevas contraseņas NO coinciden");</script>';
			echo '<script> window.location="Menu_Cambiar_Contrasena_Administrativo.php"; </script>';
		}	
?>
</body>
</html>		