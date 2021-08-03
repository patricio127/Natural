<?php header("Access-Control-Allow-Origin: *");

$conexion = mysqli_connect('localhost', 'id15671351_patricio', '[CfFP0uMTz|mko$A', 'id15671351_adm_natural');
//pass = [CfFP0uMTz|mko$A
//usuario= id15671351_patricio
//nombre id15671351_adm_natural
//host="localhost"
if (!$conexion) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

function get_reviews(){
    global $conexion;
	$consulta = "SELECT * FROM reviews ORDER BY id";
    $resultado = mysqli_query($conexion, $consulta);
	$retorno = array();
	
	while($fila = mysqli_fetch_assoc($resultado)){
		$retorno[] = $fila; //agrego cada item al array retorno.
	}

    $resultado = json_encode($retorno);
    
    switch (json_last_error()) {
        case JSON_ERROR_NONE:
        break;
        case JSON_ERROR_DEPTH:
            echo ' - Maximum stack depth exceeded';
        break;
        case JSON_ERROR_STATE_MISMATCH:
            echo ' - Underflow or the modes mismatch';
        break;
        case JSON_ERROR_CTRL_CHAR:
            echo ' - Unexpected control character found';
        break;
        case JSON_ERROR_SYNTAX:
            echo ' - Syntax error, malformed JSON';
        break;
        case JSON_ERROR_UTF8:
            echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
        break;
        default:
            echo ' - Unknown error';
        break;
    }

    return $resultado;
}

function get_listado($limite = null ){ //si mando un n�mero lo mando como limit, sino trae todos los registros
	global $conexion;
	$consulta = "SELECT * FROM productos ORDER BY codigo";
	if($limite != null){ //si recibi algo lo concateno al final del query
		$consulta.=" limit $limite";
	}
	$resultado = mysqli_query($conexion, $consulta);
	$retorno = array();
	
	while($fila = mysqli_fetch_assoc($resultado)){
		$retorno[] = $fila; //agrego cada item al array retorno.
	}
	
	return json_encode($retorno);
	
}

function guardar( $codigo, $categoria, $nombre, $descripcion, $precio, $imagen ){
	global $conexion;	
	//En el editar si la imagen es null, creamos un string vacio y si tenemos imagen lo asociamos al query

	$update_imagen = $imagen ? " , imagen = '$imagen'" : "";
    $consulta = "INSERT INTO productos VALUES ( $codigo, '$categoria','$nombre','$descripcion','$precio','$imagen') 
	on duplicate key update 
	nombre = '$nombre', descripcion = '$descripcion', precio ='$precio', 
	categoria = '$categoria' $update_imagen";
   
   $retorno = mysqli_query($conexion, $consulta);
   echo mysqli_error($conexion);
   return $retorno;
}

function guardar_review( $rating, $text ){
	global $conexion;	
	//En el editar si la imagen es null, creamos un string vacio y si tenemos imagen lo asociamos al query
    $consulta = "INSERT INTO reviews  (`rating`, `text`) VALUES ( $rating, '$text')";
   
   $retorno = mysqli_query($conexion, $consulta);
   echo mysqli_error($conexion);
   return $retorno;
}

function eliminar_item( $codigo ){ 
	global $conexion;
	$consulta = "DELETE FROM productos WHERE codigo in ($codigo) "; //listado de valores separados por coma
	echo $consulta;
	$retorno = mysqli_query($conexion, $consulta);
	
	return $retorno;
}


?>