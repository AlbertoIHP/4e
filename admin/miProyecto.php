<?php require "seguridad.php"; require "vistas.php";?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cuatro enfoques System - <?=$_SESSION["nombreProyecto"] ?></title>
	<link rel="stylesheet" href="../css/bootstrap.css">
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










	<div class="container well">
		<fieldset>



			<legend><?=$_SESSION["nombreProyecto"] ?></legend>
			<div class="row">
				<div class="col-md-8">
					<label>Diagrama </label>
					<div id="modelo"></div>
				</div>
				<div class="col-md-4">



					<label>Crear stakeholder</label>

						<form class="form-horizontal" id="agregarStakeholder">
							<fieldset>
								<div class="form-group">  
								  	<div class="col-md-12 inputGroupContainer">
										<div class="input-group">
									  		<input  id="nombreStakeholder" name="nombreStakeholder" placeholder="Ingrese el nombre" class="form-control"  type="text" required>
								   	  	</div>
								  	</div>
								</div>



								<div class="form-group">
								  	<div class="col-md-12 inputGroupContainer">
										<div class="input-group">
									  		<input id="descripcionStakeholder" name="descripcionStakeholder" placeholder="Ingrese una función" class="form-control" type="text" required>
								   	  	</div>
								  	</div>
								</div>

					<!--  SE INCORPORA UN PARAMERO NUEVO MEDIANTE UN INPUT asi el controlador sabra qu siempre este formulario es para registrar usuarios -->
					<input type="hidden" name="tipoOperacion" value="agregarStakeholder">

					<input type="hidden" name="nombreProyecto" value="<?=$_SESSION["nombreProyecto"] ?>">

								<div class="form-group">
																			
																			
									<div class="col-md-3 ">
									<button type="submit" class="btn btn-warning" action="">Añadir<span class="glyphicon glyphicon-send"></span></button>
									</div>
																			
																			
									<!--ESTE ES UN DIV VARIABLE EN EL QUE SE INSERTA UNA IMAGEN ANIMADA DE CARGA, ERROR O EXITO MEDIANTE JQUERY -->
									<div class="col-md-4 btnAgregarStakeholder">
									<div id="agregandoStake"></div>
									</div>
																			
													
								</div>
							</fieldset>
						</form>
							





				</div>
			</div>
		</fieldset>
	</div>
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/action.js"></script>
</body>
</html>