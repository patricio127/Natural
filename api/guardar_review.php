<?php header("Access-Control-Allow-Origin: *");

include('conexion.php');

// si el id no pasa al php que guarde el string 'null' para la consulta sql
$rating =$_POST["rating"];
$text = $_POST["text"];
	

//Ejecuta la funcion, sea insert o update
$retorno = guardar_review( $rating, $text);

echo($retorno);

