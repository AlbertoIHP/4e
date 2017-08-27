<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cuatro enfoques System - Creación de Modelo</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/prototipo.css">
</head>
<body>
	<div class="container well">
		<fieldset>
			<legend>Nuevo Modelo</legend>
			<div class="row">
				<div class="col-md-8">
					<h5>Mi modelo</h5>
					<div id="modelo"></div>
				</div>
				<div class="col-md-4">
					<h5>Crear stakeholder</h5>
					<div id="stakeholder">
						<form class="form-horizontal" action="creandoMod.html" method="post"  id="contact_form">
							<fieldset>
								<div class="form-group">  
								  	<div class="col-md-12 inputGroupContainer">
										<div class="input-group">
									  		<input  name="nombre-stakeholder" placeholder="Nombre del stakeholder" class="form-control"  type="text" required>
								   	  	</div>
								  	</div>
								</div>
								<div class="form-group">
								  	<div class="col-md-12 inputGroupContainer">
										<div class="input-group">
									  		<input  name="stakeholder-accion" placeholder="¿Qué hace el stakeholder" class="form-control" type="text" required>
								   	  	</div>
								  	</div>
								</div>
								<div class="form-group">
										<label class="col-md-12 control-label"></label>
										<div class="col-md-12">
										<button type="submit" class="btn btn-warning" action="">Añadir<span class="glyphicon glyphicon-send"></span></button>
										</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</fieldset>
	</div>
	<script src="js/prototipo.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</body>
</html>