< html >
	< cabeza >
		< meta  charset = " utf-8 " >
		< título > Aplicación de mensajes </ título >
		< title > Inicio de sesión - Mensajes App </ title >
		< Enlace  rel = " hoja de estilo "  href = " https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css "  integridad = " SHA384-TX8t27EcRE3e / ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2 "  crossorigin = " anónimo " >
	</ cabeza >
	< cuerpo >
		< encabezado >
			< h1 > Aplicación de mensajes </ h1 >
			< h2 > Inicio de sesión </ h2 >
		</ encabezado >
		< sección >
			< formulario  nombre = " iniciar sesión "  acción = " "  método = " " >
				
			</ formulario >	
			< div  class = " fila " >
				< div  class = " col-md-3 " > </ div >
				< div  class = " col-md-6 " >
					< div >
						< P > Si tienes Una Cuenta Creada, Inicia Sesión, de lo contrario, PUEDES < un  href = " registro.php " > registrarte </ una > </ p >
					</ div >
					< formulario  nombre = " iniciar sesión "  acción = " "  método = " POST " >
					  	< div  class = " form-group " >
						    < label  for = " exampleInputEmail1 " > Usuario </ label >
						    < input  type = " email "  class = " form-control "  id = " usuario "  name = " usuario "  aria-describedby = " emailHelp " >
					    	< small  id = " emailHelp "  class = " form-text text-muted " > No compartiremos tu información personal. </ small >
					  	</ div >
					  	< div  class = " form-group " >
					    	< label  for = " exampleInputPassword1 " > Contraseña </ label >
					    	< input  type = " contraseña "  class = " form-control "  id = " clave "  name = " clave " >
					  	</ div >
					  	< button  type = " submit "  name = " enviar "  class = " btn btn-primary " > Enviar </ button >
					</ formulario >
				</ div >
				< div  class = " col-md-3 " > </ div >
			</ div >
		</ sección >
		< pie de página >
			< p > App Mensajes - creada para mostrar Owasp 2020 © </ p >