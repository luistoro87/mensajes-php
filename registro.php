<! DOCTYPE html>
< html >
	< cabeza >
		< meta  charset = " utf-8 " >
		< título > Registro de usuario - Aplicación de mensajes </ título >
		< Enlace  rel = " hoja de estilo "  href = " https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css "  integridad = " SHA384-TX8t27EcRE3e / ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2 "  crossorigin = " anónimo " >
	</ cabeza >
	< cuerpo >
		< encabezado >
			< h1 > Aplicación de mensajes </ h1 >
			< h2 > Registro de usuario </ h2 >
		</ encabezado >
		< sección >
			< div  class = " fila " >
				< div  class = " col-md-3 " > </ div >
				< div  class = " col-md-6 " >
					< div >
						< P > Si tienes Una Cuenta Creada, < un  href = " login.php " > Inicia Sesión </ una > </ p >
					</ div >
					< formulario  nombre = " iniciar sesión "  acción = " "  método = " POST " >
					  	< div  class = " form-group " >
						    < label  for = " nombre_completo " > Nombre completo </ label >
						    < input  type = " text "  class = " form-control "  id = " nombre_completo "  name = " nombre_completo "  aria-describedby = " nombre-ayuda " >
					    	< small  id = " nombre-ayuda "  class = " form-text text-muted " > Tu nombre completo. </ small >
					  	</ div >
					  	< div  class = " form-group " >
						    < label  for = " correo " > Correo </ label >
						    < input  type = " email "  class = " form-control "  id = " correo "  name = " correo "  aria-describedby = " correo-ayuda " >
					    	< small  id = " correo-ayuda "  class = " form-text text-muted " > No te enviaremos Spam, podrás recuperar tu cuenta. </ small >
					  	</ div >
					  	< div  class = " form-group " >
						    < label  for = " celular " > Celular </ label >
						    < input  type = " tel "  class = " form-control "  id = " celular "  name = " celular "  aria-describedby = " celular-ayuda " >
					    	< small  id = " celular-ayuda "  class = " form-text text-muted " > también puedes usar tu número para el login. </ small >
					  	</ div >
					  	< div  class = " form-group " >
					    	< label  for = " clave " > Contraseña </ label >
					    	< input  type = " contraseña "  class = " form-control "  id = " clave "  name = " clave " >
					  	</ div >
					  	< div  class = " form-group " >
					    	< label  for = " clave2 " > Verifica tu Contraseña </ label >
					    	< input  type = " contraseña "  class = " form-control "  id = " clave2 "  name = " clave2 " >
					  	</ div >
					  	< button  type = " submit "  name = " enviar "  class = " btn btn-primary " > Enviar </ button >
					</ formulario >
				</ div >
				< div  class = " col-md-3 " > </ div >
			</ div >
		</ sección >
		< pie de página >
			< p > App Mensajes - creada para mostrar Owasp 2020 © </ p >
		</ pie de página >
	</ cuerpo >
</ html >