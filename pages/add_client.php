<?php

if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == null) {
    print "<script>alert(\"Acceso invalido!\");window.location='index.php?page=login';</script>";
};


?>
<div class="d-flex flex-column p-4 justify-content-center align-items-center ">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Agregar clientes</li>
    </ol>
  </nav>
    <h2>Agregar Clientes</h2>
</div>

<form id="form_add_client" class="w-50 m-auto">
    <div class="alert d-none" id="responseMessage" role="alert"></div>
    <div class="row ">
        <div class="col">
            <label for="rut" class="form-label">Rut</label>
            <input type="text" id="rut" name="rut" class="form-control" value="" placeholder="Rut" aria-label="First name">
        </div>
        <div class="col">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" id="name" name="name" class="form-control" value="" placeholder="Nombre" aria-label="Last name">
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="text" id="phone" name="phone" class="form-control" value="" placeholder="Teléfono" aria-label="Last name">
        </div>
        <div class="col">

        </div>
    </div>

    <button type="submit" class="btn btn-dark mt-4">Guardar</button>

</form>
