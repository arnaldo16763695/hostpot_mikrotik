<?php
require_once 'php/conexion.php';
// session_start();
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == null) {
    print "<script>alert(\"Acceso invalido!\");window.location='index.php?page=login';</script>";
};
?>
<h2>Contacto</h2>
<form action="#" method="post">
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" required>
    <br>
    <label for="email">Correo:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="message">Mensaje:</label>
    <textarea id="message" name="message" required></textarea>
    <br>
    <button type="submit">Enviar</button>
</form>
