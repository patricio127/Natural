<?php

// $data = "{
//     \"reviews\": [
//         {
//             \"id\": 1,
//             \"rating\": 4.1,
//             \"text\": \"Muy buen servicio y comida el personal muy gentil y servicial respondió a todo y ayudó asesoró y fue simpática lo mismo que el gerente\"
//         },
//         {
//             \"id\": 2,
//             \"rating\": 4.5,
//             \"text\": \"El sushi es riquisimo! Super fresco y sabroso. Me lo habian recomendado ya varias personas, y finalmente pude probarlo! Lo recomiendo y volveria a ir :)\"
//         },
//         {
//             \"id\": 3,
//             \"rating\": 4,
//             \"text\": \"Hermosa experiencia! Gran calidad de servicio y comida deliciosa. No veo la hora de volver. Muchas gracias!\"
//         },
//         {
//             \"id\": 4,
//             \"rating\": 4.9,
//             \"text\": \"Fui directamente a conocer el \\\"bar secreto\\\". La verdad es un lugar increible. La ambientacion , la decoracion y la atencion superaron mis expectativas.\"
//         }
//     ]
// }";
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");


include('conexion.php');

$retorno = get_reviews();
echo $retorno;
