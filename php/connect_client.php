<?php
// Incluir la conexión
require 'conexion.php';

// Habilitar la visualización de errores (solo para desarrollo, no en producción)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Validar si los datos esperados están presentes
if (!isset($_POST['rut'], $_POST['mac'], $_POST['terms'])) {
    die(json_encode(["status" => "error", "message" => "Datos incompletos"]));
}

// Sanitizar y asignar los datos
$rut = $con->real_escape_string(trim($_POST['rut']));
$mac = $con->real_escape_string(trim($_POST['mac']));

// Validate rut



// Validate if the rut exist
$stmt = $con->prepare("SELECT * FROM registros WHERE rut = ? AND allowed_connect = '1'");
$stmt->bind_param("s", $rut); // 's' indica que $rut es una cadena
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    die(json_encode(["status" => "error", "message" => "Error en la consulta: " . $con->error]));
}

if ($result->num_rows > 0) {
    $sql_update = "UPDATE registros SET mac = '$mac' WHERE rut = '$rut'";

    if ($con->query($sql_update) === TRUE) {     
    echo json_encode(["status" => "success", "message" => "Bienvenido"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error al guardar los datos: " . $con->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Usted no esta autorizado"]);
}

// Cerrar la conexión
$con->close();

