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

			//Construimos una tabla Hash mediante fetch array y el resultado del objeto entregado por la ejecucioon de la consulta
			$arreglo = mysqli_fetch_array($proyecto);


			//De esta rescatamos la id
			$nombreProyecto = $arreglo["nombre"];

			//guardamos el nombre del proyecto
			$_SESSION["nombreProyecto"] = $nombreProyecto;

			$respuesta = 1;
	}else{
		$respuesta = 0;
	}

	return printf($respuesta);
}




 ?>