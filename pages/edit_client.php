<?php

if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == null) {
  print "<script>alert(\"Acceso invalido!\");window.location='index.php?page=login';</script>";
};
//error_reporting(0);
$idusuario = $_GET["id"];
//leo Data de BD    
if (!$result = mysqli_query($con, "SELECT * FROM `registros`  WHERE id=" . $idusuario . " "))
  die("No data"); {
  $formt = mysqli_fetch_assoc($result);
}

?>
<div class="d-flex flex-column p-4 justify-content-center align-items-center ">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edición de clientes</li>
    </ol>
  </nav>
  <h2>Edición de Clientes</h2>
</div>

<form class="w-50 m-auto" id="form_edit_client">
  <div class="alert d-none" id="responseMessage" role="alert"></div>

  <div class="row ">
    <div class="col">
      <label for="rut" class="form-label">Rut</label>
      <input type="text" id="rut" name="rut" class="form-control" value="<?php echo $formt['rut']; ?>" placeholder="Teléfono" aria-label="Last name">
      <input type="hidden" name="id" value="<?php echo $formt['id']; ?>">
    </div>
    <div class="col">
      <label for="name" class="form-label">Nombre</label>
      <input type="text" id="name" name="name" class="form-control" value="<?php echo $formt['nombre']; ?>" placeholder="Nombre" aria-label="First name">
    </div>
  </div>
  <div class="row mt-4 ">
    <div class="col">
      <label for="phone" class="form-label">Teléfono</label>
      <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $formt['telefono']; ?>" placeholder="Nombre" aria-label="First name">
    </div>
    <div class="col mt-4">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="allowed_connect" id="allowed_connect1" value="1" <?php echo $formt['allowed_connect'] == '1' ? 'checked' : '';  ?>>
        <label class="form-check-label text-success" for="allowed_connect1">
          Permitir conexión
        </label>
      </div>
      <div class="form-check ">
        <input class="form-check-input " type="radio" name="allowed_connect" id="allowed_connect2" value="0" <?php echo $formt['allowed_connect'] == '0' ? 'checked' : '';  ?>>
        <label class="form-check-label text-danger" for="allowed_connect2">
          Denegar conexion
        </label>
      </div>
    </div>
  </div>

  <button type="submit" class="btn btn-dark mt-4">Editar</button>

</form>