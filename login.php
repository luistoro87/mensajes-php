<?php

include 'conexion.php';

if (isset($_SESSION['id_usuario'])) {
	header("Location: panel.php");
}


if (isset($_POST['enviar'])) {
	//1. recibimos los datos
	$usuario = $_POST['usuario'];
	$usuarioLimpio = str_replace('"', "", $usuario);
	$usuarioLimpio = str_replace("'", "", $usuarioLimpio);
	$usuarioLimpio = str_replace("=", "", $usuarioLimpio);
	$usuarioLimpio = str_replace(" ", "", $usuarioLimpio);
	$usuarioLimpio = str_replace(";", "", $usuarioLimpio);
	$usuarioLimpio = str_replace("--", "", $usuarioLimpio);

	$clave = $_POST['clave'];
	$claveCifrada = md5(md5($clave));
 
 	//2. consultamos en base de datos
	$conexion = $GLOBALS['enlace'];
	$consulta = "SELECT * FROM `usuarios` WHERE (`correo` = '$usuarioLimpio' OR `celular` = '$usuarioLimpio') AND `clave` = '$claveCifrada'";

	$ejecutarConsulta = $conexion->query($consulta);

	if (mysqli_num_rows($ejecutarConsulta) == 1) {
		$respuesta = "<div class='alert alert-success' role='alert'> Inicio de sesión correcto<br>, te redireccionaremos en unos segundos, sino, <a href='panel.php'>clic aquí</a></div>";
		//creamos la sesión y hacemos la redirección
		$resultado = $ejecutarConsulta->fetch_array(MYSQLI_ASSOC);
		$_SESSION['id_usuario'] = $resultado['id_usuario'];
		$_SESSION['nombre'] = $resultado['nombre_completo']; 
		header( "refresh:3;url=panel.php" ); 
	}else{
		$respuesta = "<div class='alert alert-danger' role='alert'>
	  			Los datos de inicio de sesión no coinciden, verifique por favor <br></div>";
	}

	echo $respuesta;
	mysqli_close($enlace);
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
			<h2>Inicio de sesión</h2>
		</header>
		<section>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div>
						<p>Si tienes una cuenta creada, inicia sesión, de lo contrario, puedes <a href="registro.php">registrarte</a> <br>
							<a href="recuperar.php">olvidé mi contraseña</a></p>
					</div>
					<form name="login" action="" method="POST">
					  	<div class="form-group">
						    <label for="exampleInputEmail1">Correo o Celular</label>
						    <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp">
					    	<small id="emailHelp" class="form-text text-muted">No compartiremos tu información personal.</small>
					  	</div>
					  	<div class="form-group">
					    	<label for="exampleInputPassword1">Contraseña</label>
					    	<input type="password" class="form-control" id="clave" name="clave">
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