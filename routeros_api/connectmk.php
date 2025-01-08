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

    // $response = $API->comm('/interface/print');

    // if (!empty($response)) {
    //     echo "Lista de interfaces:\n";
    //     foreach ($response as $interface) {
    //         echo "Nombre: " . $interface['name'] . "\n";
    //         echo "ID: " . $interface['.id'] . "\n";
    //         echo "Tipo: " . $interface['type'] . "\n";
    //         echo "Estado: " . ($interface['running'] == 'true' ? 'Activo' : 'Inactivo') . "\n";
    //         echo "------------------------\n";
    //     }
    // } else {
    //     echo "No se encontraron interfaces.\n";
    // }

    $response = $API->comm('/ip/hotspot/active/login', [
        'mac-address' => '00:E1:8C:55:C2:97',
        'user' => 'T-00:E1:8C:55:C2:97',
        'ip'     => '192.168.45.251', // Dirección IP del cliente
        // 'server'      => 'hotspot1', // Nombre del servidor Hotspot
    ]);

    if (isset($response['!trap'])) {
        // echo 'Error: ' . $response['!trap'][0]['message'];
        echo 'fallita';
    } else {
        echo 'exito';
    }

    $API->disconnect(); // Desconectar de la API
} else {
    echo 'falló conexion';
}
