<?php 
session_start();
include 'ConexionBD.php';
	if(isset($_SESSION['Nick_Contratista'])){
	echo "";
	}
	else {
		echo '<script> window.location="Inicio_Sesion_Contratista.php"; </script>';
	}

	$perfil = $_SESSION['Nick_Contratista'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0033)http://ryca.itfip.edu.co/RYCAWeb/ -->
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252"></meta>
<meta http-equiv="expires" content="0"></meta>
<link rel="shortcut icon" href="http://ryca.itfip.edu.co/RYCAWeb/public/img/logo.png"></link>
<link rel="shortcut icon" href="../favicon.ico"></link>
<title>Control del Mantenimiento en la Infraestructura F�sica DEL ITFIP</title>

<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Pagina.css"></link>
<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Miga.css"></link>
<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Formularios.css"></link>
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
    						<li><a href="Salir.php" onclick="return confirm('Seguro que quiere cerrar sesi�n?')">Inicio</a></li>
    						<li><a href="Inicio_Sesion_Contratista.php">Inicio De Sesi�n Contratista</a></li>
    						<li><a href="Pagina_Principal_Contratista.php">P�gina Principal Contratista</a></li>
    						<li><a href="Menu_Cambiar_Contrasena.php">Men� Actualizar Contrase�a</a></li>
						</ul>
				</div>
			</div>
		</div>

		<br></br>
		<div id="Content">
			<div id="path"></div>
				<div id="inicio">
						<fieldset>
    					<legend>
    					<br></br>
    					<?php
    					if ((isset($_SESSION['Nick_Contratista'])) && ($_SESSION['Nick_Contratista'] != ""))
    					{
    						$Nombre = $_SESSION['Nombres_Contratista']; 
    						$Apellido1 = $_SESSION['Primer_Apellido_Contratista'];
    						$Apellido2 = $_SESSION['Segundo_Apellido_Contratista'];
    						echo "Bienvenido (a): ". $Nombre . " ". $Apellido1 . " " . $Apellido2;
    					}
    					else
    					{
    					}
    					?>
						</legend>   
						</fieldset>
				
					<div>
						<img src="./Control_Mantenimiento_Infraestructura_files/Img/Cmif_2.png" style="position: absolute; left: 0px; top: 350px;" alt="Logo2" title="Logo CMIF2"></img>
						<a href="Pagina_Principal_Contratista.php">
						<img src="./Control_Mantenimiento_Infraestructura_files/Img/Volver.png" style="position: absolute; left: 35px; top: 610px;" width="250" height="80" alt="Volver" title="Click para regresar a la p�gina anterior"></img>
						</a>
					</div>	
						
                        <form  method="post" action="Actualizar_Contrasena_Contratista.php" style="position: absolute; left: 410px; top: 320px;"> 
                        <h1> Actualizar Contrase�a Contratista</h1>
                        	<div class="inset">
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Digite la nueva Contrase�a </label>
                                    <input id="passwordsignup" name="Pass_Contratista1" required="required" autofocus type="password" placeholder="Ingrese la nueva contrase�a"></input>
                                </p>
                                
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Confirme la nueva Contrase�a </label>
                                    <input id="passwordsignup" name="Pass_Contratista2" required="required" type="password" placeholder="Ingrese la nueva contrase�a"></input>
                                </p>
                             </div>             
                             
                          <p class="p-container">
    						<input type="submit" name="login" id="go" value="Actualizar"onclick="return confirm('Seguro que quiere actualizar la contrase�a? Si contin�a con este proceso la pr�xima vez deber� iniciar sesi�n con la contrase�a actualizada')"></input>
  						  </p>							
                            </form>
                        </div>
     
				<div>
				<img src="./Control_Mantenimiento_Infraestructura_files/Img/Copyright.png" style="position: absolute; left: -180px; top: 710px;"></img>
				</div>
		</div>
</body>
</html>