<? php

incluir  'conexion.php' ;

	if ( isset ( $ _session [ 'id_usuario' ])) {
		encabezado ( "Ubicación: panel.php" );
	} más {
		encabezado ( "Ubicación: login.php" );
	}
?>