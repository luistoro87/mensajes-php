<?php
	include 'conexion.php';
	
	session_destroy();
    echo '<meta http-equiv="Refresh" content="3;url=index.php"> ';
    exit ('Te has desconectado del sistema.');
?>