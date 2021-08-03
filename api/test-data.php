<?php

$data = "{
    \"listaProductos\": [
        {
            \"codigo\": 123,
            \"nombre\": \"California\",
            \"descripcion\": \"Kanikama-palta\",
            \"precio\": 380,
            \"imagen\": \"https://www.cucinare.tv/wp-content/uploads/2020/06/Sushi.jpg\",
            \"categoria\": \"Clásicos\"
        },
        {
            \"codigo\": 234,
            \"nombre\": \"Tuna Cream\",
            \"descripcion\": \"Atún cocido-mayonesa\",
            \"precio\": 380,
            \"imagen\": \"https://www.clapps.com.ar/wp-content/uploads/2018/10/SUSHI-VA.jpg\",
            \"categoria\": \"Especiales\"
        },
        {
            \"codigo\": 142,
            \"nombre\": \"Miami\",
            \"descripcion\": \"Salmón Cocido-Philadelphia y remolacha\",
            \"precio\": 760,
            \"imagen\": \"https://images.clarin.com/2020/06/17/el-mejor-sushi-en-buenos___PHKOqq47v_1200x630__1.jpg\",
            \"categoria\": \"Hot Rolls\"
        },
        {
            \"codigo\": 667,
            \"nombre\": \"San Pablo\",
            \"descripcion\": \"Pollo Apanado-Philadelphia-salsa Teriyaki\",
            \"precio\": 380,
            \"imagen\": \"https://cdn.kiwilimon.com/recetaimagen/36725/th5-640x426-45808.jpg\",
            \"categoria\": \"Clásicos\"
        }
    ]
}";
    
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
echo $data;