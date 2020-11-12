<?php

	include 'conexion.php';
	
	if(!isset($_SESSION['id_usuario'])) {
		header("Location: login.php");
	}
     
	function mostrarMensajes(){
		$conexion = $GLOBALS['enlace'];
		$consulta = "SELECT `mensaje`.*,`usuarios`.`nombre_completo` FROM `mensaje` JOIN `usuarios` where `mensaje`.`id_usuario` = `usuarios`.`id_usuario`";

		$ejecutarConsulta = $conexion->query($consulta);


		echo "<table class='table table-striped table-bordered' >"; 
		echo "<tr>"; 
		echo "<td><b>Id mensaje</b></td>"; 
		echo "<td><b>Mensaje</b></td>"; 
		echo "<td><b>Fecha</b></td>";
		echo "<td><b>Autor</b></td>";  
		echo "</tr>";

		$contador = 0;
		while($row = $ejecutarConsulta->fetch_array(MYSQLI_NUM))
		{
			$rows[] = $row;
			echo "<tr>";
			echo "<td valign='top'>". $rows[$contador][0]."</td>";
			echo "<td valign='top'>". htmlspecialchars(stripslashes($rows[$contador][1]))."</td>";
			echo "<td valign='top'>". $rows[$contador][2]."</td>";
			echo "<td valign='top'>". htmlspecialchars(stripslashes($rows[$contador][4]))."</td>"; 
			$contador++;
			echo "</tr>";
		} 

		echo "</table>";
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
					<?php
					mostrarMensajes();
					?>
					</div>
				</div>
				<div class="col-md-3">
					<div id="logout-box">
						<a class="btn btn-info" href="panel.php">Escribir mensaje</a>
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