<?php

include 'conexion.php';

/**
* This example shows making an SMTP connection with authentication.
*/
//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

//Create a new PHPMailer instance
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer();


if (isset($_POST['enviar'])) {
	//1. buscar el correo en bd
	$correo = $_POST['usuario'];
	$conexion = $GLOBALS['enlace'];

	$consulta = "SELECT * FROM `usuarios` WHERE `correo` = '$correo' ";
	$ejecutarConsulta = $conexion->query($consulta);

	if (mysqli_num_rows($ejecutarConsulta) == 1) {
		//2. generamos una contraseña aleatoria
		function generarClave ($length = 8){
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        	$password = substr( str_shuffle( $chars ), 0, $length );
        	return $password;
		}
		$clave = generarClave();
		$claveCifrada = md5(md5($clave));
		//3. actualizar la clave en bd
		$actualizarClaveEnBd = "UPDATE `usuarios` SET `clave` = '$claveCifrada' WHERE `correo` = '$correo' ";
		$ejecutarConsultaActualizar = $conexion->query($actualizarClaveEnBd);

        //Luego tenemos que iniciar la validación por SMTP:
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
		$mail->Host = $GLOBALS['smtp_host'];
		$mail->Username = $GLOBALS['smtp_user']; 
		$mail->Password = $GLOBALS['smtp_pass']; 
		$mail->Port = $GLOBALS['smtp_port']; 

		//Con estas pocas líneas iniciamos una conexión con el SMTP. Lo que ahora deberíamos hacer, es configurar el mensaje a enviar, el //From, etc.
		$mail->From = "usuario@mensajes.app"; // Desde donde enviamos (Para mostrar)
		$mail->FromName = "Mensajes APP";

		//Estas dos líneas, cumplirían la función de encabezado (En mail() usado de esta forma: “From: Nombre <correo@dominio.com>”) de //correo.
		$mail->AddAddress($correo); // Esta es la dirección a donde enviamos
		$mail->IsHTML(true); // El correo se envía como HTML
		$mail->Subject = "nueva clave Mensajes App"; // Este es el titulo del email.
		$body = "Hola, tu nueva clave de acceso al sistema es: ".$clave."  esta se genera aleatoriamente por seguridad";
		$body .= "<br> mensajes APP";
		$mail->Body = $body; // Mensaje a enviar
		
        //mail($para, $titulo, $mensaje, $cabeceras);
		//También podríamos agregar simples verificaciones para saber si se envió:
		//send the message, check for errors
		if (!$mail->send()) {
			$respuesta = 'Error al enviar correo: ' . $mail->ErrorInfo;
		} else {
			$respuesta = 'mensaje enviado!';
		}

	}else{
		$respuesta = "el correo no se encontró en la base de datos";
	}

	echo "<div class='alert alert-info' role='alert'>".$respuesta."</div>";
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Inicio de sesión - mensajes App</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<header>
			<h1>mensajes App</h1>
			<h2>Recuperar contraseña</h2>
		</header>
		<section>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div>
						<p>Si tienes una cuenta creada, inicia sesión, de lo contrario, puedes <a href="registro.php">registrarte</a> <br>
					</div>
					<form name="login" action="" method="POST">
					  	<div class="form-group">
						    <label for="exampleInputEmail1">Correo</label>
						    <input type="email" class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp">
					  	</div>
					  	<button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>

		</section>
		<footer>
			<p>Mensajes App - creado para mostrar Owasp 2020 ©</p>
		</footer>
	</body>
</html>