<?php
// Incluir la conexión
require 'conexion.php';

// Habilitar la visualización de errores (solo para desarrollo, no en producción)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Validar si los datos esperados están presentes
if (!isset($_POST['phone'], $_POST['rut'], $_POST['name'], $_POST['id'], $_POST['allowed_connect'])) {
    die(json_encode(["status" => "error", "message" => "Datos incompletos"]));
}

if (trim($_POST['name']) === "" || trim($_POST['rut']) === "" || trim($_POST['phone']) === "") {
    die(json_encode(["status" => "error", "message" => "Debe completar todos los campos"]));
}

// Sanitizar y asignar los datos
$name = $con->real_escape_string(trim($_POST['name']));
$phone = $con->real_escape_string(trim($_POST['phone']));
$rut = $con->real_escape_string(trim($_POST['rut']));
$id = $con->real_escape_string(trim($_POST['id']));
$allowed_connect = $con->real_escape_string(trim($_POST['allowed_connect']));


// Validar formato del teléfono (ejemplo para formato internacional: +52 seguido de 10 dígitos)
// Validar formato del teléfono (número nacional o internacional)
if (!preg_match('/^(\+\d{1,3})?\d{7,}$/', $phone)) {
    die(json_encode(["status" => "error", "message" => "Formato de teléfono no válido."]));
}


// Validar  si el registro existe
// $sql_check = "SELECT * FROM registros WHERE rut = '$rut'";
$sql_check = "SELECT * FROM registros WHERE rut = '$rut' AND id != '$id'";
$result = $con->query($sql_check);

if (!$result) {
    die(json_encode(["status" => "error", "message" => "Error en la consulta: " . $con->error]));
}

if ($result->num_rows > 0) {
    // Si el rut existe
    die(json_encode(["status" => "exist", "message" => "El registro ya existe"]));
} else {
    // Insertar los datos en la base de datos
    $sql_update = "UPDATE registros SET nombre = '$name', rut = '$rut', telefono = '$phone', allowed_connect = '$allowed_connect' WHERE id = '$id'";

    if ($con->query($sql_update) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Registro exitoso "]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error al guardar los datos: " . $con->error]);
    }
}

// Cerrar la conexión
$con->close();
