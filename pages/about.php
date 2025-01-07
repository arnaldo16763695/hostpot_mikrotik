<?php
require_once 'php/conexion.php';
// session_start();
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == null) {
    print "<script>alert(\"Acceso invalido!\");window.location='index.php?page=login';</script>";
};
?>
<h2>Acerca de nosotros</h2>
<p>Esta es la página acerca de nosotros.</p>