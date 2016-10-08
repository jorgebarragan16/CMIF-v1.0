<?php

session_start();
include 'ConexionBD.php';

if(isset($_SESSION['Nick_Usuario'])){

	echo '<script> window.location="Pagina_Principal_Estudiantes.php"; </script>';
}

if(isset($_POST['login_u']))
{
	$nick_u = $_POST['Nick_Usuario'];
	$pass_u = $_POST['Pass_Usuario'];
	$programa  = $_POST['cbxPrograma'];
	$fields = 	$arrayName = array('usuario' => $nick_u, 'clave' => $pass_u, 'programa' => $programa );
	foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string, '&');

	$url = "http://ryca.itfip.edu.co:8888/estudiante/login?". $fields_string;
	//open connection
	$ch = curl_init();
  //set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	//execute post

	$result = curl_exec($ch);
	//close connection
	curl_close($ch);

	$response = json_decode($result);


	//$log = mysql_query("SELECT * FROM usuario WHERE Nick_Usuario = '$nick_c' AND Pass_Usuario = '$pass_c'");

	if ( !$response->error )
	{
		//$row = mysql_fetch_array($log);//lista usuarios
		$_SESSION['Id_Usuario'] = $response->user->id;
		$_SESSION["Nick_Usuario"] = $fields['usuario'];
		$_SESSION['Nombres_Usuario'] = $response->user->nombres;
		$_SESSION['Primer_Apellido_Usuario'] = $response->user->apellidos;
		#$_SESSION['Segundo_Apellido_Usuario'] = $row['Segundo_Apellido_Usuario'];


		echo 'Iniciando sesi�n para '.$_SESSION["Nick_Usuario"].'<p>';
		echo '<script> window.location="Pagina_Principal_Estudiantes.php"; </script>';
	}
	else {
		echo '<script> alert("Usuario o Contrase�a INCORRECTOS");</script>';
		echo '<script> window.location="Inicio_Sesion_Estudiantes.php"; </script>';
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0033)http://ryca.itfip.edu.co/RYCAWeb/ -->
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252"></meta>
<meta http-equiv="expires" content="0"></meta>
<link rel="shortcut icon" href="http://ryca.itfip.edu.co/RYCAWeb/public/img/logo.png"></link>

<title>Control del Mantenimiento en la Infraestructura F�sica DEL ITFIP</title>

<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Pagina.css"></link>
<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Formularios.css"></link>
<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Miga.css"></link>
<script src="./Control_Mantenimiento_Infraestructura_files/JavaScripts/Mayuscula.js"></script>
</head>

<body style="background-image: url(./Control_Mantenimiento_Infraestructura_files/Img/Fondo.png);">
	<div id="Container">
		<div id="Header">
			<div align="center">
				<img src="./Control_Mantenimiento_Infraestructura_files/Img/Banner_1.png" width="1090" height="150" alt="Banner 1" title="Banner CMIF"></img>
				<br></br>
				<img src="./Control_Mantenimiento_Infraestructura_files/Img/Banner_2.png" width="1090" height="35" alt="Banner 2" title="Banner CMIF"></img>
				<br></br>
				<div id="migas">
						<ul id="breadcrumbs-one">
    						<li><a href="Inicio.php">Inicio</a></li>
    						<li><a href="Inicio_Sesion_Estudiantes.php">Inicio De Sesi�n Estudiantes</a></li>
						</ul>
				</div>
			</div>
		</div>

		<br></br>
		<div id="Content">
			<div id="path"></div>
				<div id="inicio">
					<div>
						<img src="./Control_Mantenimiento_Infraestructura_files/Img/Cmif_2.png" style="position: absolute; left: 20px; top: 350px;" alt="Logo2" title="Logo CMIF2"></img>
					</div>

					<form  method="post" action="" style="position: absolute; left: 410px; top: 320px;">
  						<h1>Inicio de sesi�n para ESTUDIANTES</h1>
  						<div class="inset">
  						<p>
    						<label for="usuario">Usuario</label>
    						<input type="text" name="Nick_Usuario" id="nick" autofocus required="required" placeholder="Ingrese el usuario" maxlength="20"></input>
  						</p>
  						
  						<p>
    						<label for="password">Contrase�a</label>
    						<input type="password" name="Pass_Usuario" id="password" required="required" placeholder="Ingrese la contrase�a" maxlength="15"></input>
  						</p>

  						<p>
							<label for="seleccion">Seleccione su programa acad�mico:</label>
							<select id='cbxPrograma' name='cbxPrograma'>
								<option value='0' >0-NO DEFINIDO</option>
								<option value='12' >12-TECNICA PROFESIONAL EN PROMOCION SOCIAL</option>
								<option value='14' >14-TECNICA PROF. EN ADMON DE EMPRESAS AGROPECUARIAS</option>
								<option value='15' >15-T�CNICA PROF CONTABILIDAD DE COSTOS Y AUDITOR�A</option>
								<option value='16' >16-TEC. PROFESIONAL EN CONSTR. Y ADMON OBRAS CIVILES</option>
								<option value='17' >17-T�CNICA PROFESIONAL EN SISTEMAS Y COMPUTACI�N</option>
								<option value='18' >18-TECNICA PROFESIONAL EN ADMINISTRACION OFIMATICA</option>
								<option value='19' >19-T�CNICA PROFESIONAL EN ELECTR�NICA</option>
								<option value='20' >20-TECNICA PROFESIONAL EN MANTENIMIENTO INDUSTRIAL</option>
								<option value='21' >21-TECNICA PROFESIONAL EN PROCESOS ADMINISTRATIVOS</option>
								<option value='22' >22-TECNICA PROFESIONAL EN MERCADEO Y VENTAS</option>
								<option value='23' >23-TECNOLOGO PROFE EN SISTEMAS CONTABLES Y FINANCIER</option>
								<option value='24' >24-TECNOLOGIA EN GESTION EMPRESARIAL</option>
								<option value='25' >25-TECNOLOGIA EN GESTION  DE EMPRESAS AGROPECUARIAS</option>
								<option value='26' >26-CONTADUR�A P�BLICA</option>
								<option value='27' >27-PROFESIONAL UNIVERSITARIO EN ADM�N. DE EMPRESAS</option>
								<option value='28' >28-PROFESIONAL EN EMPRESAS AGROPECUARIAS</option>
								<option value='29' >29-TECNOLOGIA EN AUTOMATIZACION ELECTRONICA INDUSTRIA</option>
								<option value='30' >30-INGENIERIA ELECTRONICA</option>
								<option value='31' >31-T�CNICA PROF. EN PROCESOS LOG�STICOS EMPRESARIALES</option>
								<option value='32' >32-TECNOLOG�A EN GESTI�N LOG�STICA</option>
								<option value='33' >33-TECNICA PROF. EN CONSTRUCCION DE EDIFICACIONES</option>
								<option value='34' >34-TECNOLOG�A EN GESTI�N DE LA CONSTRUCCI�N</option>
								<option value='35' >35-INGENIER�A CIVIL</option>
								<option value='36' >36-TECNOLOGIA EN GESTION INFORMATICA</option>
								<option value='37' >37-INGENIERIA DE SISTEMAS</option>
								<option value='38' >38-TECNICA PROFESIONAL EN SOLUCIONES WEB</option>
								<option value='39' >39-TECNICA PROFESIONAL EN PROMOCION SOCIAL</option>
								<option value='40' >40-TECNOLOGIA EN GESTION SOCIAL</option>
								<option value='41' >41-TRABAJO SOCIAL</option>
								<option value='42' >42-ESPECIALIZACI�N TECNICA PROFESIONAL EN AUTOMATIZAC</option>
								<option value='43' >43-TECNICO PROFESIONAL EN OPERACIONES CONTABLES</option>
							</select>
						</p>
						</div>
 					 	<p class="p-container">
    						<input type="submit" name="login_u" id="go" value="Iniciar Sesi�n"></input>
  						</p>
				</form>
				</div>
				<div>
				<img src="./Control_Mantenimiento_Infraestructura_files/Img/Copyright.png" style="position: absolute; left: -180px; top: 710px;"></img>
				</div>
		</div>
	</div>
</body>
</html>