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
		//Existe row, array y column. Array mezcla ambas, osea que se pede entregar como arreglo la posicion o bien por una tabla hash, en este caso se trae como una tabla hash



		//Inicializamos la session para la comunicacion con el front-end
		session_start();

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



 ?>