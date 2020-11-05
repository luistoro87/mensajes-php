<?php
	if (isset($_session['id_usuario'])) {
		header("Location: panel.php");
	}else {
		header("Location: login.php");
	}
?>