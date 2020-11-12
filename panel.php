<?php

include 'conexion.php';
	if(!isset($_SESSION['id_usuario'])) {
		header("Location: login.php");
	}

if (isset($_POST['enviar'])) {
	//recibimos las variables
	$mensaje = $_POST['mensaje'];

	$mensajeLimpio = str_replace('"', "", $mensaje);
	$mensajeLimpio = str_replace("'", "", $mensajeLimpio);
	$mensajeLimpio = str_replace("=", "", $mensajeLimpio);
	$mensajeLimpio = str_replace(";", "", $mensajeLimpio);
	$mensajeLimpio = str_replace("--", "", $mensajeLimpio);
	$mensajeLimpio = str_replace("<", "", $mensajeLimpio);
	$mensajeLimpio = str_replace("/>", "", $mensajeLimpio);
	$mensajeLimpio = str_replace(">", "", $mensajeLimpio);
	$mensajeLimpio = str_replace("alert(", "", $mensajeLimpio); 

	$id_usuario = $_SESSION['id_usuario'];


	//2. consultamos en base de datos
	$conexion = $GLOBALS['enlace'];
	$consulta = "INSERT INTO `mensaje` (`texto_mensaje`, `id_usuario`) VALUES ('$mensajeLimpio', '$id_usuario')";

	$ejecutarConsulta = $conexion->query($consulta);


	if ($ejecutarConsulta === TRUE) {
		  	$respuesta = "<div class='alert alert-success' role='alert'>
  				Mensaje creado correctamente, ahora podrá <a href='index.php'>Ver mensajes</a><br></div>";
		} else {
			$respuesta = "<div class='alert alert-danger' role='alert'>
	  			Error al crear en mensaje: <br></div>";
		}

		echo $respuesta;
		mysqli_close($enlace);

	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Panel - mensajes App</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<header>
			<h1>mensajes App</h1>
			<h2>Panel de mensajes</h2>
		</header>
		<section>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div>
						<?php 
						echo "hola ".$_SESSION['nombre'];
						?>
						<p></a> </p>
					</div>

					<form name="mensaje" action="" method="POST">
					  	<div class="form-group">
						    <label for="mensaje">Escribe tu mensaje</label>
						    <textarea maxlength="200" class="form-control" id="mensaje" name="mensaje"></textarea>
					    	<small id="mensajeAyuda" class="form-text text-muted">Recuerda usar un lenguaje moderado.</small>
					  	</div>
					  	<button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
					</form>

				</div>
				<div class="col-md-3">
					<div id="logout-box">
						<a class="btn btn-info" href="index.php">Ver mensajes</a>
					</div>
					<div id="logout-box">
						<a class="btn btn-danger" href="logout.php">Salir</a>
					</div>
				</div>
			</div>

		</section>
		<footer>
			<p>Mensajes App - creado para mostrar Owasp 2020 ©</p>
		</footer>
	</body>
</html>