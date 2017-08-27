<?php 
session_start();

if($_SESSION["iniciado"] != true){
	header("location: ../index.php");

}

 ?>