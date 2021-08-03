<?php header("Access-Control-Allow-Origin: *"); 
header('Content-Type: application/json');

include('conexion.php');

$retorno = get_listado();
echo $retorno;

