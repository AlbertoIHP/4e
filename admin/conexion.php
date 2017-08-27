	<?php 
	include("config.php");
	
	
	//FUNCIONES
function conexionMySql(){
	
	//VARIABLES
	$conectar = mysqli_connect(SERVER,USER,PASS,BD);
	
	if (!$conectar) {
		//imprimir por pantalla			// CONCATENAR CN .	
		echo "Nose pudo conectar a la BD".mysqli_connect_error();
	}

	mysqli_set_charset($conectar, "utf8");


	//Retornar variable
	return $conectar;
	
}
	?>