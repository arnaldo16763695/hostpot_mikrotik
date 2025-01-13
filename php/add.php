<?php
// Incluir la conexión
require 'conexion.php';

function validateRut($rut)
{
    // Eliminar puntos y guiones
    $rut = preg_replace('/[^k0-9]/i', '', $rut);

    // Dividir el RUT en número y dígito verificador
    $numero = substr($rut, 0, -1);
    $dv = strtoupper(substr($rut, -1));

    // Validar que el número sea numérico
    if (!is_numeric($numero)) {
        return false;
    }

    // Calcular el dígito verificador
    $suma = 0;
    $factor = 2;

    for ($i = strlen($numero) - 1; $i >= 0; $i--) {
        $suma += $numero[$i] * $factor;
        $factor = $factor == 7 ? 2 : $factor + 1;
    }

    $resto = $suma % 11;
    $digitoCalculado = 11 - $resto;

    // Convertir a dígito verificador válido
    if ($digitoCalculado == 11) {
        $digitoCalculado = '0';
    } elseif ($digitoCalculado == 10) {
        $digitoCalculado = 'K';
    }

    // Comparar con el dígito verificador ingresado
    return $digitoCalculado == $dv;
}

// Habilitar la visualización de errores (solo para desarrollo, no en producción)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Validar si los datos esperados están presentes
if (!isset($_POST['phone'], $_POST['rut'], $_POST['name'])) {
    die(json_encode(["status" => "error", "message" => "Datos incompletos"]));
}

if (trim($_POST['name']) === "" || trim($_POST['rut']) === "" || trim($_POST['phone']) === "") {
    die(json_encode(["status" => "error", "message" => "Debe completar todos los campos"]));
}

if (!validateRut($_POST['rut'])){
    die(json_encode(["status" => "error", "message" => "Formato de rut incorrecto"]));
}

// Sanitizar y asignar los datos
$name = $con->real_escape_string(trim($_POST['name']));
$phone = $con->real_escape_string(trim($_POST['phone']));
$rut = $con->real_escape_string(trim($_POST['rut']));

// Validar formato del teléfono (ejemplo para formato internacional: +52 seguido de 10 dígitos)
// Validar formato del teléfono (número nacional o internacional)
if (!preg_match('/^(\+\d{1,3})?\d{7,}$/', $phone)) {
    die(json_encode(["status" => "error", "message" => "Formato de teléfono no válido."]));
}


// Validar  si el registro existe
$sql_check = "SELECT * FROM registros WHERE rut = '$rut'";
$result = $con->query($sql_check);

if (!$result) {
    die(json_encode(["status" => "error", "message" => "Error en la consulta: " . $con->error]));
}

if ($result->num_rows > 0) {
    // Si el rut existe
    die(json_encode(["status" => "exist", "message" => "El registro ya existe"]));
} else {
    // Insertar los datos en la base de datos
    $sql_insert = "INSERT INTO registros (nombre, rut, telefono) VALUES ('$name', '$rut', '$phone')";
    if ($con->query($sql_insert) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Registro exitoso "]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error al guardar los datos: " . $con->error]);
    }
}

// Cerrar la conexión
$con->close();
