<?php 
session_start(); 
if (!isset($_SESSION['id'])) { 
  header("Location: login.php"); 
  exit; 
} 
$nombre = htmlspecialchars($_SESSION['nombre']); 

// Datos de ejemplo (luego reemplazar con consultas MySQL)
$proximo_turno = "Clínica Médica - Lunes 4 Nov 10:00";
$recetas_pendientes = 2;
$ultimos_resultados = "Análisis de sangre - 15 Oct 2025";
?> 

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel - ClinicApp</title>
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../bootstrap/bootstrap-5.3.8-dist/css/bootstrap.min.css">
  <style>
    /* Navbar personalizado */
    .navbar {
      background-color: #0d3b66 !important; /* azul oscuro */
      font-size: 1.5rem; /* letras más grandes */
    }
    .navbar .nav-link, .navbar .navbar-brand, .navbar .navbar-text {
      color: #ffffff !important;
      font-weight: 500;
    }
    .navbar .nav-link:hover {
      color: #000000ff !important;
    }
    .btn-logout {
      font-size: 1.1rem;
      font-weight: 500;
    }
    .navbar-nav {
      margin: 0 auto;
    }
    body {
      background-color: #e0e7ff;
    }
    .box {
    font-size: 1.3rem; /* texto más grande */
    background-color: #121318ff;
    padding: 30px;
    border-radius: 12px;

    /* CENTRADO */
    margin: 0 auto; /* centrado horizontal */
    max-width: 1200px; /* ancho máximo para que no se estire demasiado */
  }

  body {
    background-color: #e0e7ff;
  }
</style>
</head>
<body>
  <!-- Navbar con Menús Desplegables centrados -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" style="font-size:2.0rem" href="./dashboard.php">ClinicApp</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenus" aria-controls="navbarMenus" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarMenus">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- Menú Turnos -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Turnos</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../index.php">Pedir turno</a></li>
              <li><a class="dropdown-item" href="../pages/prox_turnos.php">Mis turnos</a></li>
              <li><a class="dropdown-item" href="../pages/recetas.php">Recetas digitales</a></li>
            </ul>
          </li>

          <!-- Menú Resultados -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Resultados</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../pages/laboratorios.php">Mis laboratorios</a></li>
              <li><a class="dropdown-item" href="../pages/informes.php">Mis informes</a></li>
            </ul>
          </li>

          <!-- Menú Información -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Información</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../pages/perfil.php">Mi perfil</a></li>
              <li><a class="dropdown-item" href="../pages/medico_cabecera.php">Mi médico de cabecera</a></li>
            </ul>
          </li>
        </ul>

        <!-- Saludo y logout a la derecha -->
        <span class="navbar-text me-3" style="font-size:1.2rem;">
          Hola, <?php echo $nombre; ?> 👋
        </span>
        <a class="btn btn-light btn-logout" href="logout.php">Cerrar sesión</a>
      </div>
    </div>
  </nav>

  <!-- Contenido Principal -->
  <main class="container mt-4">
    <div class="box">
      <h2>Hola, <?php echo $nombre; ?>, ¿qué querés hacer hoy?</h2>
      <div class="row mt-4 g-3">
        <!-- Tarjeta Próximo Turno -->
        <div class="col-md-4">
          <div class="card text-white bg-primary h-100">
            <div class="card-body">
              <h5 class="card-title">Próximo Turno</h5>
              <p class="card-text"><?php echo $proximo_turno; ?></p>
              <a href="../index.php" class="btn btn-light">Ver turno</a>
            </div>
          </div>
        </div>
        <!-- Tarjeta Recetas Pendientes -->
        <div class="col-md-4">
          <div class="card text-white bg-success h-100">
            <div class="card-body">
              <h5 class="card-title">Recetas Pendientes</h5>
              <p class="card-text"><?php echo $recetas_pendientes; ?></p>
              <a href="../pages/recetas.php" class="btn btn-light">Ver recetas</a>
            </div>
          </div>
        </div>
        <!-- Tarjeta Últimos Resultados -->
        <div class="col-md-4">
          <div class="card text-white bg-warning h-100">
            <div class="card-body">
              <h5 class="card-title">Últimos Resultados</h5>
              <p class="card-text"><?php echo $ultimos_resultados; ?></p>
              <a href="../pages/informes.php" class="btn btn-light">Ver resultados</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="../bootstrap/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
