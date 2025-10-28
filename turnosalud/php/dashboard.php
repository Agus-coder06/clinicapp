<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}
$nombre = htmlspecialchars($_SESSION['nombre']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel - ClinicApp</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<header>
  <div class="logo">ClinicApp</div>
  <div class="user-info">
    <span>Hola, <?php echo $nombre; ?> 👋</span>
    <a href="logout.php" class="logout-btn">Cerrar sesión</a>
  </div>
</header>

<main>
  <aside class="menu">
    <h3>Turnos</h3>
    <ul>
      <li><a href="../index.php">Reservar Turno</a></li>
      <li><a href="../pages/prox_turnos.html">Próximos Turnos</a></li>
      <li><a href="../pages/preg_frecuentes.html">Preguntas Frecuentes</a></li>
    </ul>
  </aside>

  <div class="content">
    <div class="box">
      <h2>Panel Principal</h2>
      <p>Aquí podrás gestionar tus turnos médicos y ver tu información personal.</p>
    </div>
  </div>
</main>
</body>
</html>