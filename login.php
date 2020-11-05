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
						<p>Si tienes una cuenta creada, inicia sesión, de lo contrario, puedes <a href="registro.php">registrarte</a> </p>
					</div>
					<form name="login" action="" method="POST">
					  	<div class="form-group">
						    <label for="exampleInputEmail1">Usuario</label>
						    <input type="email" class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp">
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