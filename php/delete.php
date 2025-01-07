<?php

// Incluir la conexión
require 'conexion.php';

// Habilitar la visualización de errores (solo para desarrollo, no en producción)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Validar si los datos esperados están presentes
if (!isset($_GET['id'])) {
    die(json_encode(["status" => "error", "message" => "Datos incompletos"]));
}

if (trim($_GET['id']) === "") {
    die(json_encode(["status" => "error", "message" => "Debe completar todos los campos"]));
}

// Sanitizar y asignar los datos
$id = $con->real_escape_string(trim($_GET['id']));


// Validar  si el registro existe
// $sql_check = "SELECT * FROM registros WHERE rut = '$rut'";
$sql_check = "SELECT * FROM registros WHERE id = '$id'";
$result = $con->query($sql_check);

if (!$result) {
    die(json_encode(["status" => "error", "message" => "Error en la consulta: " . $con->error]));
}

if ($result->num_rows > 0) {
    // eLIMINAR los datos en la base de datos
    $sql_delete = "DELETE FROM registros WHERE id = ?";
    $stmt = $con->prepare($sql_delete);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Registro eliminado exitosamente"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error al eliminar los datos: " . $con->error]);
    }
} else {
    // Si el id no existe
    die(json_encode(["status" => "error", "message" => "El registro no existe"]));
}

// Cerrar la conexión
$con->close();
