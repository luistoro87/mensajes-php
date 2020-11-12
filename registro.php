<?php

include 'conexion.php';


if (isset($_POST['enviar'])) {
	//1. recibimos las variables del formulario
	$nombre_completo = $_POST['nombre_completo'];
	$celular = $_POST['celular'];
	$correo = $_POST['correo'];
	$clave = $_POST['clave'];
	$clave2 = $_POST['clave2'];

	function limpiarCampos($campo){
		$campoLimpio = str_replace('"', "", $campo);
		$campoLimpio = str_replace("'", "", $campoLimpio);
		$campoLimpio = str_replace("=", "", $campoLimpio);
		$campoLimpio = str_replace(" ", "", $campoLimpio);
		$campoLimpio = str_replace(";", "", $campoLimpio);
		$campoLimpio = str_replace("--", "", $campoLimpio);

		return $campoLimpio;
	}

	$nombre_completo = limpiarCampos($nombre_completo);
	$celular = limpiarCampos($celular);
	$correo = limpiarCampos($correo);

	//2. validar nuevamente las contraseñas
	if ($clave != $clave2 || strlen($clave)<7) {
		$respuesta = "Las contraseñas no coinciden o son menores a 7 caracteres";
	}else{
		//3. vamos a validar que no exista el correo o el celular en base de datos
		$conexion = $GLOBALS['enlace'];
		$consultaCorreo = "SELECT * FROM `usuarios` WHERE `correo` = '$correo' OR `celular` = '$celular'";
		$ejecutarconsultaCorreo = $conexion->query($consultaCorreo);

		if (mysqli_num_rows($ejecutarconsultaCorreo) > 0) {

			//validamos si es el correo o el celular, el que ya está registrado
			$resultado = $ejecutarconsultaCorreo->fetch_array(MYSQLI_ASSOC);

			if ($resultado['correo'] == $correo) {
			 	$respuesta = "el correo ya se encuentran registrado";
			} 
			if ($resultado['celular'] == $celular){
				$respuesta = "el celular ya se encuentran registrado";
			}			
		}else{
			//4. inserción en la bd
			//4.1 ciframos la clave
			$claveCifrada = md5(md5($clave));

			$consultaRegistro = "INSERT INTO `usuarios` (`nombre_completo`, `correo`, `celular`, `clave`) VALUES ( '$nombre_completo', '$correo', '$celular', '$claveCifrada')";
		
			$ejecutar = $conexion->query($consultaRegistro);

			if ($ejecutar === TRUE) {
			  	echo "<div class='alert alert-success' role='alert'>
	  				Usuario creado correctamente, ahora podrá <a href='login.php'>inicia sesión</a><br>
				</div>";
			} else {
				$respuesta = "no se pudo ingresar el usuario, contacte al soporte";
			}
		}

		//mostramos el mensaje de error
		if (isset($respuesta)) {
			echo "<div class='alert alert-danger' role='alert'>
	  			Error, no se pudo crear el usuario: ".$respuesta." <br>
			</div>";
		}


		echo " <br>";
		mysqli_close($enlace);
	}

}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registro de usuario - mensajes App</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<header>
			<h1>mensajes App</h1>
			<h2>Registro de usuario</h2>
		</header>
		<section>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div>
						<p>Si tienes una cuenta creada, <a href="login.php">inicia sesión</a> </p>
					</div>
					<form name="login" action="" method="POST" onsubmit="return validarClave()">
					  	<div class="form-group">
						    <label for="nombre_completo">Nombre completo</label>
						    <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" aria-describedby="nombre-ayuda" required>
					    	<small id="nombre-ayuda" class="form-text text-muted">Tu nombre completo .</small>
					  	</div>

					  	<div class="form-group">
						    <label for="correo">Correo</label>
						    <input type="email" class="form-control" id="correo" name="correo" aria-describedby="correo-ayuda" required>
					    	<small id="correo-ayuda" class="form-text text-muted">No te enviaremos Spam, allí podrás recuperar tu cuenta.</small>
					  	</div>

					  	<div class="form-group">
						    <label for="celular">Celular</label>
						    <input type="tel" class="form-control" id="celular" name="celular" aria-describedby="celular-ayuda" required>
					    	<small id="celular-ayuda" class="form-text text-muted">también puedes usar tu número para el login.</small>
					  	</div>

					  	<div class="form-group">
					    	<label for="clave">Contraseña</label>
					    	<input required type="password" class="form-control" id="clave" name="clave">
					  	</div>

					  	<div class="form-group">
					    	<label for="clave2">Verifica tu Contraseña</label>
					    	<input required type="password" class="form-control" id="clave2" name="clave2">
					  	</div>
					  	<button id="enviar" type="submit" name="enviar" class="btn btn-primary"  >Enviar</button>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>

		</section>
		<footer>
			<p>Mensajes App - creado para mostrar Owasp 2020 ©</p>
		</footer>
		<script type="text/javascript">

			function validarClave(){
				let clave = document.getElementById('clave').value;	
				let clave2 = document.getElementById('clave2').value;

				if(clave == clave2 && clave.length>7){
					return true;
				}else{
					return false;
				}
			}

		</script>
	</body>
</html>