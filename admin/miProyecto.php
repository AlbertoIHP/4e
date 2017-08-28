<?php require "seguridad.php"; require "vistas.php";?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cuatro enfoques System - <?=$_SESSION["nombreProyecto"] ?></title>
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




	<div class="container well">
		<fieldset>

			<legend><?=$_SESSION["nombreProyecto"] ?></legend>




			<div class="row">

				<div class="col-md-12">
					<div class="panel panel-info">
					<div class="panel-body" style="text-align: center">
					<label>Diagrama </label>
					</div>



					<div class="panel-footer">
						<div class="row filaStakeholder">

							<?php 

							if($_SESSION["isStakeholder"])
							{ 


								foreach($_SESSION["stakeholderProyecto"] as $row)
								{	?>
										<div class="col-sm-2" style="text-align: center;">

										<button title="Agregar Goal" value="<?=$row['idstakeholder']?>" type="button"  class=" ocupartodoespacio btn btn-default stakeholders"><?=$row['nombre']?></button>

										</div>
										

						<?php }?> 
						<div class="col-sm-2" style="text-align: center;">
						<button type="button" class="btn btn-primary ocupartodoespacio" data-toggle="modal" data-target="#modalAgregarStakeholder" title="Agregar Stakeholder">+</button>		
						</div>

						<?php  


						}else{?> 

						<div class="col-sm-2" style="text-align: center;">
						<button type="button" class="btn btn-primary ocupartodoespacio" data-toggle="modal" data-target="#modalAgregarStakeholder" title="Agregar Stakeholder">+</button>		
						</div>



						<?php 


							} ?>


							</div>

							<hr  style="color: #0056b2;" />

							<div class="row filaGoal">
							<?php 

							if($_SESSION["isGoal"])
							{ 


								foreach($_SESSION["goalsProyecto"] as $row){	?>
									<div class="col-sm-2" style="text-align: center;">

									<button title="Agregar Softgoal" value="<?=$row['idgoal']?>" type="button"  class=" ocupartodoespacio btn btn-default goals"><?=$row['nombre']?></button>

									</div>
										

									<?php }}?> 

							</div>

							<hr style="color: #0056b2;" />

							<div class="row filaSoftgoal">
							<?php 

							if($_SESSION["isSoftgoal"])
							{ 


								foreach($_SESSION["softgoalsGoal"] as $row){	?>
									<div class="col-sm-2" style="text-align: center;">

									<button title="Agregar NFR" value="<?=$row['idsubgoal']?>" type="button"  class=" ocupartodoespacio btn btn-default softgoals"><?=$row['nombre']?></button>

									</div>
										

									<?php }}?> 
							</div>

							<hr style="color: #0056b2;" />

							<div class="row filaNfr">

							</div>

					</div>
				</div>
				</div>


				


			</div>
			</fieldset>
	</div>




<!-- VENTANA AGREGAR STAKEHOLDER -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalAgregarStakeholder" >
  <div class="modal-dialog" role="document">


  	<!-- CONTENIDO COMO EN CUALQUIER PAGINA -->
    <div class="modal-content">

    <!-- HEADER -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <label>Crear stakeholder</label>
      </div>


      <!-- BODY -->
      <div class="modal-body">
		        
		        
					<form class="form-horizontal" id="agregarStakeholder">


					<!-- NOMBRE-->
					<div class="form-group">
					<label for="nombreUsuario" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
					<input  id="nombreStakeholder" name="nombreStakeholder" placeholder="Ingrese el nombre del stakeholder" class="form-control"  type="text" required>
					</div>
					</div>


					<!-- DESCRIPCION-->
					<div class="form-group">
					<label for="emailUsuario" class="col-sm-2 control-label">Descripción</label>
					<div class="col-sm-10">
					<input id="descripcionStakeholder" name="descripcionStakeholder" placeholder="Ingrese una función para el mismo" class="form-control" type="text" required>
					</div>
					</div>

					<!--  SE INCORPORA UN PARAMERO NUEVO MEDIANTE UN INPUT asi el controlador sabra qu siempre este formulario es para registrar usuarios -->
					<input type="hidden" name="tipoOperacion" value="agregarStakeholder">

					<input type="hidden" name="nombreProyecto" value="<?=$_SESSION["nombreProyecto"] ?>">


					<div class="row">
					<div class="col-sm-offset-2 col-sm-2">
					<button type="submit" class="btn btn-warning" action="">Añadir<span class="glyphicon glyphicon-send"></span></button>
					</div>
					
					
					<div class="col-sm-8 imagenAviso">
							<div id="agregandoStake"></div>
					</div>


					</div>





					</form>


      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- VENTANA AGREGAR GOAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalAgregarGoal" >
  <div class="modal-dialog" role="document">


  	<!-- CONTENIDO COMO EN CUALQUIER PAGINA -->
    <div class="modal-content">

    <!-- HEADER -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="nombreAgrega"></p>
       
      </div>


      <!-- BODY -->
      <div class="modal-body">
		        
		        
					<form class="form-horizontal" id="agregarGoal">


					<!-- NOMBRE-->
					<div class="form-group">
					<label  class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
					<input  id="nombreGoal" name="nombreGoal" placeholder="Ingrese el nombre del Goal" class="form-control"  type="text" required>
					</div>
					</div>


					<!-- DSCRIPCION-->
					<div class="form-group">
					<label for="descripcionGoal" class="col-sm-2 control-label">Descripción</label>
					<div class="col-sm-10">
					<input id="descripcionGoal" name="descripcionGoal" placeholder="Ingrese una especificación del Goal" class="form-control" type="text" required>
					</div>
					</div>

					<!--  SE INCORPORA UN PARAMERO NUEVO MEDIANTE UN INPUT asi el controlador sabra qu siempre este formulario es para registrar usuarios -->
					<input type="hidden" name="tipoOperacion" value="agregarGoal">

					<p type="hidden" class="valorid"></p>

					




					<div class="row">
					<div class="col-sm-offset-2 col-sm-2">
					<button type="submit" class="btn btn-warning" action="">Añadir<span class="glyphicon glyphicon-send"></span></button>
					</div>
					
					
					<div class="col-sm-8 imagenAviso">
							<div id="agregandoGoal"></div>
					</div>


					</div>





					</form>


      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- VENTANA AGREGAR SOFTGOAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalAgregarSoftgoal" >
  <div class="modal-dialog" role="document">


  	<!-- CONTENIDO COMO EN CUALQUIER PAGINA -->
    <div class="modal-content">

    <!-- HEADER -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="nombreAgregaGoal"></p>
       
      </div>


      <!-- BODY -->
      <div class="modal-body">
		        
		        
					<form class="form-horizontal" id="agregarSoftgoal">


					<!-- NOMBRE-->
					<div class="form-group">
					<label  class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
					<input  id="nombreSoftgoal" name="nombreSoftgoal" placeholder="Ingrese el nombre del Softgoal" class="form-control"  type="text" required>
					</div>
					</div>


					<!-- DSCRIPCION-->
					<div class="form-group">
					<label class="col-sm-2 control-label">Descripción</label>
					<div class="col-sm-10">
					<input id="descripcionSoftgoal" name="descripcionSoftgoal" placeholder="Ingrese una especificación del Softgoal" class="form-control" type="text" required>
					</div>
					</div>

					<!--  SE INCORPORA UN PARAMERO NUEVO MEDIANTE UN INPUT asi el controlador sabra qu siempre este formulario es para registrar usuarios -->
					<input type="hidden" name="tipoOperacion" value="agregarSoftgoal">

					<p type="hidden" class="valorIdGoal"></p>

					




					<div class="row">
					<div class="col-sm-offset-2 col-sm-2">
					<button type="submit" class="btn btn-warning" action="">Añadir<span class="glyphicon glyphicon-send"></span></button>
					</div>
					
					
					<div class="col-sm-8 imagenAviso">
							<div id="agregandoSoftgoal"></div>
					</div>


					</div>





					</form>


      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- VENTANA AGREGAR NFR -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalAgregarNfr" >
  <div class="modal-dialog" role="document">


  	<!-- CONTENIDO COMO EN CUALQUIER PAGINA -->
    <div class="modal-content">

    <!-- HEADER -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="nombreAgregarNfr"></p>
       
      </div>


      <!-- BODY -->
      <div class="modal-body">
		        
		        
					<form class="form-horizontal" id="agregarNfr">
					<div class="input-group" style="padding-left: 8%;">
						<div class="input-group-btn" style="text-align: right; ">
							<button class="btn btn-default" type="submit">Agregar</button>
						</div>

					<select  name="idNfr" class="selectpicker selectorNFR" data-live-search="true">



							<?php /* obtener el array de objetos */
							foreach($_SESSION["allNfr"] as $row){?>
							<option value="<?=$row["id"]?>" data-tokens=" <?=$row['nombre']?>"> <?=$row['nombre']?></option>
							<?php } ?>


							
						</select>


					<!--  SE INCORPORA UN PARAMERO NUEVO MEDIANTE UN INPUT asi el controlador sabra qu siempre este formulario es para registrar usuarios -->
					<input type="hidden" name="tipoOperacion" value="agregarNfr">

					<p type="hidden" class="valorIdSubgoal"></p>
					
					
					<div class="col-sm-8 imagenAviso">
							<div id="agregandoSoftgoal"></div>
					</div>


					</div>





					</form>


      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/bootstrap-select.js"></script>
	<script src="../js/action.js"></script>
</body>
</html>