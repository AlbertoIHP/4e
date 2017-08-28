<?php require "seguridad.php"; require "vistas.php";?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cuatro enfoques System - Inicio</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/bootstrap-select.css">
	<link rel="stylesheet" href="../css/prototipo.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">4Enfoques</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["correoUsuario"]; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="cerrarSesion.php">Cerrar Sesión</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>














	<div class="container cajaInicioSesion tituloInicioSesion">
<div class="row">
	
<div class="panel panel-default">
  <div class="panel-body">
   	Mis Proyectos
  </div>


  <div class="panel-footer">
	
				<!-- ESTE SELECTOR PERMITE LA BUSQUEDA EN VIVO
				CON DATA-TOKEN  PODEMOS AGREGAR TAG PARA LA BUSQUEDA
				
				-->
				<form  id="cargarProyecto" >
				<div class="form-group">

										<!--  SE INCORPORA UN PARAMERO NUEVO MEDIANTE UN INPUT asi el controlador sabra qu siempre este formulario es para registrar usuarios -->
					<input type="hidden" name="tipoOperacion" value="cargarProyecto">
					<div class="input-group" style="padding-right: 28%;">
						<div class="input-group-btn" style="text-align: right; ">
							<button class="btn btn-default" type="submit">Abrir</button>
						</div>


						<select  name="idProyecto" class="selectpicker" data-live-search="true">



							<?php /* obtener el array de objetos */
							foreach($_SESSION["arregloProyectos"] as $row){?>
							<option value="<?=$row["idproyecto"]?>" data-tokens=" <?=$row['nombre']?>"> <?=$row['nombre']?></option>
							<?php } ?>


							
						</select>
					
					</div><!-- /input-group -->
				</div>
				</form>



  </div>
</div>

</div>

<div class="row">
		<form id="crearProyecto" class="well form-horizontal">
			<fieldset>



				<legend>Bienvenido <?php echo $_SESSION["nombreUsuario"]; ?></legend>


				<div class="form-group">
				  	<label class="col-md-4 control-label">Nombre Proyecto</label>  
				  	<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
					  		<input id="nombreProyecto"  name="nombreProyecto" placeholder="Nombre del proyecto" class="form-control"  type="text" required>
				   	  	</div>
				  	</div>
				</div>



				<div class="form-group">
				  	<label class="col-md-4 control-label">Descripción</label>  
				  	<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>


					  		<textarea id="descripcionProyecto"  name="descripcionProyecto" placeholder="Ingrese una descripción" class="form-control" required></textarea>


					<!--  SE INCORPORA UN PARAMERO NUEVO MEDIANTE UN INPUT asi el controlador sabra qu siempre este formulario es para registrar usuarios -->
					<input type="hidden" name="tipoOperacion" value="crearProyecto">

					<input type="hidden" name="correoUsuario" value="<?=$_SESSION["correoUsuario"] ?>">

				   	  	</div>
				  	</div>
				</div>






				<div class="form-group">
  					<label class="col-md-4 control-label"></label>
  					<div class="col-md-4">
    					<button type="submit" class="btn btn-warning" action="">Crear nuevo proyecto <span class="glyphicon glyphicon-send"></span></button>
  					</div>

						<!--ESTE ES UN DIV VARIABLE EN EL QUE SE INSERTA UNA IMAGEN ANIMADA DE CARGA, ERROR O EXITO MEDIANTE JQUERY -->
  					<div class="col-md-4">
  						<div id="creandoProyecto"></div>
  					</div>
				</div>



			</fieldset>
		</form>

</div>



	</div>


	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/bootstrap-select.js"></script>
	<script src="../js/action.js"></script>
</body>
</html>