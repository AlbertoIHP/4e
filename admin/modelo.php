<?php 
require_once "conexion.php";

/*
PUT, DELETE, SET
*/

function registrarUsuario($nombre, $correo, $pass){

	//Se ocupa el metodo de conexion.php para obtener la variable de conexion a la bd
	$mysql = conexionMySql();
	
	//Hacemos la consulta por el correo que han ingresado para ver si ya existe
	$sqlExiste = "SELECT * FROM usuario WHERE correo = '$correo'";
	

	//Se realiza la consulta mediante el metodo query entregando la variable de conexion y el string de consulta SQL
	$resExiste = mysqli_query($mysql,$sqlExiste);


	if(!$resExiste){
		$respuesta = "<img class='miImagen' src='img/error.png'>";
	}else{

		//en el caso de que no exista vamos a construir el SQL para insertar al usuario
		$sql = "INSERT INTO usuario(correo, nombre, contrasena) VALUES('$correo', '$nombre', '$pass')";

		//Ejecutamos la consulta
		$resultado = mysqli_query($mysql,  $sql);

		//si es verdadero dejamos en 1 para que ajax ponga la imagen de hecho correctamente
		if($resultado){
		$respuesta = 1;
		}else{
		//sino, entonces mandamos la imagen de error
		$respuesta = "<img class='miImagen' src='img/error.png'>";
		}


	}
		
	return printf($respuesta);
	}


	function crearProyecto($nombreProyecto, $descripcionProyecto, $correoUsuario){

		$mysql = conexionMySql();

		$sql = "INSERT INTO proyecto() VALUES(null, '$nombreProyecto', '$descripcionProyecto',CURDATE(), '$correoUsuario')";
		
		$resExiste = mysqli_query($mysql,$sql);


		if($resExiste){
			$respuesta = 1;
		}else{
			$respuesta = 0;
		}

		return printf($respuesta);


	 }






 ?>



