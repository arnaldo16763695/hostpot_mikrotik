<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "cruzwifi";

// Crear conexión
$con = new mysqli($host, $user, $password, $db);

// Verificar conexión
if (!isset($con)) {
    die(json_encode(["status" => "error", "message" => "Conexión no válida"]));
}


// Establecer el conjunto de caracteres a UTF-8
if ($con->connect_error) {
    die(json_encode(["status" => "error", "message" => "Error en la conexión: " . $con->connect_error]));
}


