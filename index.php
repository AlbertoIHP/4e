<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>4Enfoques</title>
	<meta name="description" content="Herramienta WEB para el proceso de toma de requerimientos del software">

	<meta name="keywords" content="ingenieria, requerimientos, educcion, 4enfoques">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">


</head>
<body>

<div class="container tituloInicioSesion">
	<div class="row " style="height: 130px;">
		<div class="col-12">
			
			<img style="width: 40%; max-width: 40%; height: 10%; max-height: 10%; " src="img/logo.png">
		</div>
	</div>
</div>

<div id="contenedorInicioSesion" class="container ">



<div class="well well-lg cajaInicioSesion">
		<form class="form-horizontal" id="formu-inicio">



	<!-- ESTO TIENE UN CAMPO (EMAIL)-->
	<div class="form-group">
		<label class="col-sm-2 control-label">Correo</label>
		<div class="col-sm-10">	
			<input type="email" class="form-control" id="usuario" placeholder="Ingrese su correo electronico" required="true" name="usuario">
		</div>
	</div>

	<!-- PASSWORD -->
	<div class="form-group">
		<label class="col-sm-2 control-label">Contraseña</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" id="password" placeholder="Ingrese su contraseña " required="true" name="password">
		</div>
	</div>

	<!--  SE INCORPORA UN PARAMERO NUEVO MEDIANTE UN INPUT asi el controlador sabra qu siempre este formulario es para registrar usuarios -->
	<input type="hidden" name="tipoOperacion" value="inicioSesion">
	
<div class="row">
			<div class="col-sm-offset-2 col-sm-2">
			<button type="submit" class="btn btn-primary btnInicioSesion" >Iniciar Sesión</button>
		</div>

			<div class="col-sm-2 btnRegistro">
				<button id="btnRegistrarse" type="button" class="btn btn-primary" data-toggle="modal" data-target="#registroUsuario">Registro</button>
			</div>


		<div class="col-sm-6 imagenAviso">
			<span  id="cargando"></span>
		</div>


</div>



	</form>


</div>


</div>	







<!-- VENTANA REGISTRO USUARIO -->
<div class="modal fade" tabindex="-1" role="dialog" id="registroUsuario">
  <div class="modal-dialog" role="document">


  	<!-- CONTENIDO COMO EN CUALQUIER PAGINA -->
    <div class="modal-content">

    <!-- HEADER -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="msnEstadoRegistro">Ingrese sus Credenciales</h4>
      </div>


      <!-- BODY -->
      <div class="modal-body">
		        
		        
					<form class="form-horizontal" id="formu-registro">


					<!-- NOMBRE-->
					<div class="form-group">
					<label for="nombreUsuario" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" id="nombreUsuario" placeholder="Nombre" required="true" name="nombreUsuario">
					</div>
					</div>


					<!-- EMAIL-->
					<div class="form-group">
					<label for="emailUsuario" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
					<input type="email" class="form-control" id="emailUsuario" placeholder="Email" required="true" name="emailUsuario">
					</div>
					</div>

					<!-- PASSWORD -->
					<div class="form-group">
					<label for="passwordUsuario" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
					<input type="password" class="form-control" id="passwordUsuario" placeholder="Password" required="true" name="passwordUsuario">
					</div>
					</div>

					<!--  SE INCORPORA UN PARAMERO NUEVO MEDIANTE UN INPUT asi el controlador sabra qu siempre este formulario es para registrar usuarios -->
					<input type="hidden" name="tipoOperacion" value="registrarUsuario">


					<div class="row">
					<div class="col-sm-offset-2 col-sm-2">
					<button type="submit" class="btn btn btn-warning btnInicioSesion" >Registrarme</button>
					</div>
					
					
					<div class="col-sm-8 imagenAviso">
					<span  id="registrando"></span>
					</div>


					</div>





					</form>


      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->











<script src="js/jquery-3.2.1.min.js"></script>

<script src="js/bootstrap.js"></script>	

<!--Este fichero javascript se encarga de manejar los eventos que se produzcan en la pagina, asi, si el botono de inicio de sesion es presionado entonces se manda la informacion al controlador (Ver el archivo acciones.js) -->
<script src="js/action.js"></script>
</body>
</html>