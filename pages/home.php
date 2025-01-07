<?php
require_once 'php/conexion.php';
// session_start();
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == null) {
    print "<script>alert(\"Acceso invalido!\");window.location='index.php?page=login';</script>";
};
//error_reporting(0);
$idusuario = $_SESSION["user_id"];
//leo Data de BD    
if (!$result = mysqli_query($con, "SELECT * FROM `user`  WHERE id=" . $_SESSION["user_id"] . " "))
    die("No data"); {
    $formt = mysqli_fetch_array($result);
}
$user = $formt['nombre'];
if (!$row422 = mysqli_query($con, "SELECT * FROM registros"))
    die("No data1"); {
}

if (!$row4 = mysqli_query($con, "SELECT * FROM registros"))
    die("No data1"); {
}


?>
<!-- <h2>Bienvenido <?php echo $user ?></h2> -->

<div class="container">
    <div class="d-flex p-4 justify-content-center ">
        <h2>Listado de Clientes</h2>
    </div>
    <div class="d-flex justify-content-start mb-4"><a href="index.php?page=add_client" class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                <path d="M16 19h6"></path>
                <path d="M19 16v6"></path>
                <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
            </svg> </a></div>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <div class="alert d-none" id="responseMessage" role="alert"></div>

        <thead>
            <tr>
                <th>MAC</th>
                <th>RUT</th>
                <th>NOMBRE</th>
                <th>TELEFONO</th>
                <th>STATUS</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>

            <?php while ($row3 = $row4->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row3['mac']; ?></td>
                    <td><?php echo $row3['rut']; ?></td>
                    <td><?php echo $row3['nombre']; ?></td>

                    <td><?php echo $row3['telefono']; ?></td>
                    <td><?php echo $row3['allowed_connect'] == '1' ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2"> <path d="M12 18l.01 0"></path> <path d="M9.172 15.172a4 4 0 0 1 5.656 0"></path> <path d="M6.343 12.343a8 8 0 0 1 11.314 0"></path> <path d="M3.515 9.515c4.686 -4.687 12.284 -4.687 17 0"></path> </svg> ' : '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2"> <path d="M12 18l.01 0"></path> <path d="M9.172 15.172a4 4 0 0 1 5.656 0"></path> <path d="M6.343 12.343a7.963 7.963 0 0 1 3.864 -2.14m4.163 .155a7.965 7.965 0 0 1 3.287 2"></path> <path d="M3.515 9.515a12 12 0 0 1 3.544 -2.455m3.101 -.92a12 12 0 0 1 10.325 3.374"></path> <path d="M3 3l18 18"></path> </svg> ';  ?></td>
                    <td>
                        <div class="icon-container">
                            <a title="Editar" href="index.php?page=edit_client&id=<?php echo $row3['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4"></path>
                                    <path d="M13.5 6.5l4 4"></path>
                                </svg> </a> <a title="Eliminar" href="#" class="btn-delete" id="<?php echo $row3['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                    <path d="M4 7l16 0"></path>
                                    <path d="M10 11l0 6"></path>
                                    <path d="M14 11l0 6"></path>
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                </svg> </a>
                            <a href="#" class="btn-disconnect" id="<?php echo $row3['id'] ?>" title="Desconectar"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                                    <path d="M9 12h12l-3 -3"></path>
                                    <path d="M18 15l3 -3"></path>
                                </svg> </a>
                        </div>
                    </td>

                </tr>
            <?php endwhile; ?>



        </tbody>

    </table>
</div>