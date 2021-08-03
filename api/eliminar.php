<?php header("Access-Control-Allow-Origin: *");
include('conexion.php');


$codigo =  $_REQUEST["codigo"];
	
	eliminar_item($codigo); //Ejecutamos la función
	
	echo get_listado( );
	
?>