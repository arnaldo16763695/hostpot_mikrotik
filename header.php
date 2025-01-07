<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CruzWifi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div class="min-vh-100 position-relative">

    <nav style="background-color: #1A237E;" class="navbar navbar-expand-lg" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php?page=home"><img src="LOGO_CRUZ_Wifi.png" width="120" height="50" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <?php
            // Determina la página actual a partir de la URL
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 'home';

            // Función para asignar la clase "active"
            function isActive($page, $currentPage)
            {
              return $page === $currentPage ? 'active' : '';
            }
            ?>

            <!-- <li class="nav-item">
              <a class="nav-link <?= isActive('home', $currentPage) ?>" aria-current="page" href="index.php?page=home">Home</a>
            </li> -->
            <!-- <li class="nav-item">
              <a class="nav-link <?= isActive('about', $currentPage) ?>" href="index.php?page=about">Nosotros</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link <?= isActive('contact', $currentPage) ?>" href="php/logout.php">Cerrar sesión</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>