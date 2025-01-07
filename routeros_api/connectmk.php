<?php
include 'routeros_api.class.php';
$ip = "192.168.45.1";
$username = "admin";
$password = "-NHmqdca83-";
$port = "8728";


$API = new RouterosAPI();
$API->debug = false;
$API->port = $port;

if ($API->connect($ip, $username, $password)) {

    $response = $API->comm('/interface/print');

    if (!empty($response)) {
        echo "Lista de interfaces:\n";
        foreach ($response as $interface) {
            echo "Nombre: " . $interface['name'] . "\n";
            echo "ID: " . $interface['.id'] . "\n";
            echo "Tipo: " . $interface['type'] . "\n";
            echo "Estado: " . ($interface['running'] == 'true' ? 'Activo' : 'Inactivo') . "\n";
            echo "------------------------\n";
        }
    } else {
        echo "No se encontraron interfaces.\n";
    }
    $API->disconnect(); // Desconectar de la API
} else {
    echo 'falló conexion';
}
