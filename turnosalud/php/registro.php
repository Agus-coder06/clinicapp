<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $email, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Usuario registrado correctamente'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Error al registrar usuario');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro - ClinicApp</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<header>
  <div class="logo">ClinicApp</div>
</header>

<main>
  <div class="content">
    <div class="box">
      <h2>Crear cuenta</h2>
      <form method="post">
        <input type="text" name="nombre" placeholder="Nombre completo" required><br>
        <input type="email" name="email" placeholder="Correo electrónico" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <button type="submit">Registrarse</button>
      </form>
      <p>¿Ya tienes cuenta? <a href="login.php" style="color:white; text-decoration:underline;">Inicia sesión</a></p>
    </div>
  </div>
</main>
</body>
</html>