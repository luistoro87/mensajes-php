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
					<form name="login" action="" method="POST">
					  	<div class="form-group">
						    <label for="nombre_completo">Nombre completo</label>
						    <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" aria-describedby="nombre-ayuda">
					    	<small id="nombre-ayuda" class="form-text text-muted">Tu nombre completo .</small>
					  	</div>
					  	<div class="form-group">
						    <label for="correo">Correo</label>
						    <input type="email" class="form-control" id="correo" name="correo" aria-describedby="correo-ayuda">
					    	<small id="correo-ayuda" class="form-text text-muted">No te enviaremos Spam, allí podrás recuperar tu cuenta.</small>
					  	</div>
					  	<div class="form-group">
						    <label for="celular">Celular</label>
						    <input type="tel" class="form-control" id="celular" name="celular" aria-describedby="celular-ayuda">
					    	<small id="celular-ayuda" class="form-text text-muted">también puedes usar tu número para el login.</small>
					  	</div>
					  	<div class="form-group">
					    	<label for="clave">Contraseña</label>
					    	<input type="password" class="form-control" id="clave" name="clave">
					  	</div>
					  	<div class="form-group">
					    	<label for="clave2">Verifica tu Contraseña</label>
					    	<input type="password" class="form-control" id="clave2" name="clave2">
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