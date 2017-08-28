<?php 
require_once "conexion.php";

/*
GET
*/

function inicioSesion($correo, $pass){
	//Se ocupa el metodo de conexion.php para obtener la variable de conexion a la bd
	$mysql = conexionMySql();
	
	//Se construye un string con la consulta del usuario en cuestion
	$sqlExiste = "SELECT * FROM usuario WHERE correo = '$correo' AND contrasena = '$pass'";


	

	//Se realiza la consulta mediante el metodo query entregando la variable de conexion y el string de consulta SQL
	$resExiste = mysqli_query($mysql,$sqlExiste);

	if($resExiste){
			$fila = mysqli_fetch_array($resExiste);
	}


	if(mysqli_num_rows($resExiste) > 0){
			//Inicializamos la session para la comunicacion con el front-end
			session_start();

			//Guardamos el arreglo en una variable de sesion
			obtenerProyectos($correo);


			//Creamos una variable de sesion iniciado y la seteamos con verdadero por que si inicio sesion
			$_SESSION["iniciado"] = true;



			//Creamos correoUsuario para guardar la clave foranea si es que se crean proyectos
			$_SESSION["correoUsuario"] = $fila['correo'];

			//Aqui guardamos el nombre de usuario
			$_SESSION["nombreUsuario"] = $fila['nombre'];

			$respuesta = 1;

		}else{
			$respuesta = 0;


		}





	return printf($respuesta);
}

function obtenerProyectos($correo){

	//Se ocupa el metodo de conexion.php para obtener la variable de conexion a la bd
	$mysql = conexionMySql();

	$recoleccionProyectos =	"SELECT idproyecto,nombre FROM proyecto WHERE usuario_correo='$correo'";

	//Realizamos la consulta 
	$proyectosUsuario = mysqli_query($mysql,$recoleccionProyectos);

	$_SESSION["allNfr"] = obtenerTodosLosNfr();




	if(mysqli_num_rows($proyectosUsuario) > 0){
			while($row = $proyectosUsuario->fetch_array())
			{
				$rows[] = $row;
			}
					
					
			$_SESSION["arregloProyectos"] =  $rows;
	}

}


function cargarProyecto($idProyecto){


	$mysql = conexionMySql();

	$sql = "SELECT * FROM proyecto WHERE idproyecto=$idProyecto";

	$proyecto = mysqli_query($mysql,$sql);

	if($proyecto){


			//Inicializamos la session para la comunicacion con el front-end
			session_start();  
			$_SESSION["isStakeholder"] = false;
			$_SESSION["isGoal"] = false;
			$_SESSION["isSoftgoal"] = false;


			//Construimos una tabla Hash mediante fetch array y el resultado del objeto entregado por la ejecucioon de la consulta
			$arreglo = mysqli_fetch_array($proyecto);


			//De esta rescatamos la id
			$nombreProyecto = $arreglo["nombre"];

			//guardamos el nombre del proyecto
			$_SESSION["nombreProyecto"] = $nombreProyecto;

			if(!cargarStakeholders($idProyecto)){

				$_SESSION["isStakeholder"] = false;
			}else{

				//ESTE ARREGLO CONTIENE EL ID Y NOMBRE DE TODOS LOS STAKEHOLDERS
				$arregloStakeholders = cargarStakeholders($idProyecto);
				$_SESSION["stakeholderProyecto"] = $arregloStakeholders;
				$_SESSION["isStakeholder"] = true;



				//REVISAR ESTE METODO POR QUE REEMPLAZARIA LOS VALORES CON EL ULTIMO STAKEHOLDER Y BORRARIA TODOS LOS OTROS GOALS ASOCIADOS A EL
				foreach($arregloStakeholders as $stakeholders)
					{

						//PARA CADA STAKEHOLDER SE CARGAN SUS GOALS

						if(!cargarGoals($stakeholders['idstakeholder'])){

							$_SESSION["isGoal"] = false;

						}else{

							//ESTE ARREGLO CONTIENE LAS ID Y EL NOMBRE DE TODOS LOS GOALS
							$arregloGoals = cargarGoals($stakeholders['idstakeholder']);
							$_SESSION["goalsProyecto"] = $arregloGoals;
							$_SESSION["isGoal"] = true;

											//REVISAR ESTE METODO POR QUE REEMPLAZARIA LOS VALORES CON EL ULTIMO STAKEHOLDER Y BORRARIA TODOS LOS OTROS GOALS ASOCIADOS A EL
											foreach($arregloGoals as $goals)
											{
												//Para cada GOAL se revisan los SoftGoal
												if(!cargarSoftgoals($goals['idgoal'])){
													$_SESSION["isSoftgoal"] = false;
												}else{

													//ESTE ARREGLO CONTIENE LAS ID Y EL NOMBRE DE TODOS LOS Softgoal
													$arregloSoftgoals = cargarSoftgoals($goals['idgoal']);
													$_SESSION["softgoalsGoal"] = $arregloSoftgoals;
													$_SESSION["isSoftgoal"] = true;
												}



											}
						


						}
					

				
					}




			}



				$respuesta = 1;
	}else{
		$respuesta = 0;
	}

	return printf($respuesta);
}

function cargarStakeholders($idProyecto){
			$mysql = conexionMySql();
			//UNA VEZ QUE CARGAMOS TODO DEL PROYECTO, VEREMOS QUE STAKEHOLDER TIENE ASOCIADOS
			$consultaStakeholderProyecto = "SELECT idstakeholder,nombre FROM stakeholder WHERE proyecto_idproyecto=$idProyecto";

			$stakeholdersProyecto = mysqli_query($mysql,$consultaStakeholderProyecto);

			if(mysqli_num_rows($stakeholdersProyecto) > 0){
					while($row = $stakeholdersProyecto->fetch_array())
					{
						$rows[] = $row;
					}	
							
					$respuesta =  $rows;




			}else{

				$respuesta = false;
			}



			return $respuesta;
}


function cargarGoals($idStakeholder){
			$mysql = conexionMySql();
			//UNA VEZ QUE CARGAMOS TODO DEL PROYECTO, VEREMOS QUE STAKEHOLDER TIENE ASOCIADOS
			$consultaGoalsStake = "SELECT idgoal,nombre FROM goal WHERE stakeholder_idStakeholder=$idStakeholder";

			$goalStake = mysqli_query($mysql,$consultaGoalsStake);

			if(mysqli_num_rows($goalStake) > 0){
					while($row = $goalStake->fetch_array())
					{
						$rows[] = $row;
					}	
							
					$respuesta =  $rows;




			}else{

				$respuesta = false;
			}



			return $respuesta;

}


function obtenerTodosLosNfr(){
			$mysql = conexionMySql();
			//UNA VEZ QUE CARGAMOS TODO DEL PROYECTO, VEREMOS QUE STAKEHOLDER TIENE ASOCIADOS
			$consultaNfr = "SELECT id,nombre FROM nfr";

			$nfr = mysqli_query($mysql,$consultaNfr);

			if(mysqli_num_rows($nfr) > 0){
					while($row = $nfr->fetch_array())
					{
						$rows[] = $row;
					}	
							
					$respuesta =  $rows;




			}else{

				$respuesta = false;
			}



			return $respuesta;
}


function cargarSoftgoals($idGoal){
			$mysql = conexionMySql();
			//UNA VEZ QUE CARGAMOS TODO DEL PROYECTO, VEREMOS QUE STAKEHOLDER TIENE ASOCIADOS
			$consultaSoftgoal = "SELECT idsubgoal,nombre FROM subgoal WHERE goal_idGoal=$idGoal";

			$softgoalsGoal = mysqli_query($mysql,$consultaSoftgoal);

			if(mysqli_num_rows($softgoalsGoal) > 0){
					while($row = $softgoalsGoal->fetch_array())
					{
						$rows[] = $row;
					}	
							
					$respuesta =  $rows;




			}else{

				$respuesta = false;
			}



			return $respuesta;	
}

 ?>