<?php
// Función que obtiene datos de un recurso de la API (por ejemplo, "users", "products", "addresses")
function obtenerDatos($recurso, $cantidad = 5) {
    // URL de la API con el recurso deseado y la cantidad de datos
    $url = "https://fakerapi.it/api/v1/$recurso?_quantity=$cantidad";
    
    // file_get_contents() lee el contenido de la URL
    $respuesta = file_get_contents($url);
    
    // Se convierte la respuesta JSON en un arreglo 
    return json_decode($respuesta, true)["data"];
}

// Se obtienen 5 registros de cada recurso
$usuarios = obtenerDatos("users");
$productos = obtenerDatos("products");
$direcciones = obtenerDatos("addresses");

// Se indica el contenido que vamos a enviar es JSON
header('Content-Type: application/json');

// Se manda un JSON que contiene todos los datos obtenidos
echo json_encode([
    "usuarios"    => $usuarios,
    "productos"   => $productos,
    "direcciones" => $direcciones
]);
?>