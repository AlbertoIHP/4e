<?php 

//El controlador maneja las vistas y los modelos por eso son requeridos
require "vistas.php";
require "modelo.php";

//sleep(100);
//Recibimos el input para saber la operacio na realizar
$tipoOp = $_POST["tipoOperacion"];

function ejecutarOperacion($tipoOp){

	if($tipoOp == "registrarUsuario"){
		//Esto se ejecuta en el modelo, ya que hay que guardar
		registrarUsuario($_POST["nombreUsuario"], $_POST["emailUsuario"],$_POST["passwordUsuario"]);


	}elseif ($tipoOp == "inicioSesion"){
		//Como es un select se va a la vista
		inicioSesion($_POST["usuario"],$_POST["password"]);


	}elseif ($tipoOp == "crearProyecto"){
		//Vamos al modelo por que hay que guardar
		crearProyecto($_POST["nombreProyecto"],$_POST["descripcionProyecto"],$_POST["correoUsuario"]);
	}


}


ejecutarOperacion($tipoOp);
 ?>






