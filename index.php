<?php
// index.php

// Define la página por defecto
$page = isset($_GET['page']) ? $_GET['page'] : 'login';

// Sanitiza la entrada para evitar acceso a rutas no permitidas
$page = preg_replace('/[^a-zA-Z0-9_-]/', '', $page);

// Archivo de la página seleccionada
$pageFile = __DIR__ . "/pages/$page.php";

// Si el archivo no existe, muestra un error 404
if (!file_exists($pageFile)) {
    $pageFile = __DIR__ . "/pages/404.php";
}

require_once 'php/conexion.php';
session_start();
if (isset($_SESSION["user_id"])) {
    $idusuario = $_SESSION["user_id"];
    if (!$result = mysqli_query($con, "SELECT * FROM `user`  WHERE id=" . $_SESSION["user_id"] . " ")) {
        die("No data");
    } else {
        $formt = mysqli_fetch_array($result);
    }
    $user = $formt['nombre'];
};

// Manejo de parámetros adicionales
$params = $_GET;
unset($params['page']); // Eliminamos 'page' de los parámetros adicionales para evitar conflictos

// Incluye la plantilla principal
if (!isset($_SESSION["user_id"])) {
    include $pageFile;
} else {
    include 'header.php';
    include $pageFile;
    include 'footer.php';
}
