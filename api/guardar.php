<?php header("Access-Control-Allow-Origin: *");

include('conexion.php');

// si el id no pasa al php que guarde el string 'null' para la consulta sql
$codigo=$_POST["codigo"] ?? 'NULL';
$categoria = $_POST["categoria"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"]; 
$imagen = NULL; // la imagen puede ser null
	

// Solo si tenemos el $_FILE de imagen y pesa mas de cero kb obtenemos el nombre 
// de archivo y lo movemos a la carpeta donde se guardara

$archivo_imagen = "";
if( isset($_FILES["imagen"]) && $_FILES["imagen"]["size"] > 0 ){
	$temporal=$_FILES["imagen"] ["tmp_name"];
	$imagen = $_FILES["imagen"] ["name"];
	$archivo_imagen = "imagenes/" . $codigo . $imagen;
	move_uploaded_file($temporal, __DIR__ . "/" . $archivo_imagen);
}

//Ejecuta la funcion, sea insert o update
$retorno = guardar( $codigo, $categoria, $nombre, $descripcion, $precio, $imagen );

echo($retorno);


?>