<?php
session_start();
if (!isset($_SESSION['nombre'])) {
    header("Location: php/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Turnos Médicos</title>
  <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
  <header>
  <div class="logo"><a href="./php/dashboard.php" style="text-decoration: none; color: inherit;">ClinicApp</a></div>
    <div class="user-info">
      <span id="fecha-hora"></span>
    <div class="user-icon"></div>
  </div>
</header>

  <main>
    <aside class="menu">
      <h3>Turnos</h3>
      <ul>
        <li class="active">Buscador Turnos</li>
        <li><a href="./pages/prox_turnos.html">Próximos turnos</a></li>
        <li><a href="./pages/preg_frecuentes.html">Preguntas Frecuentes</a></li>
      </ul>
    </aside>

    <section class="content">
      <h2>Hola <b><?php echo htmlspecialchars($_SESSION['nombre']); ?></b>, ¿Cómo te podemos ayudar?</h2>
  
      <div class="box">

<div class="contenedor-turnos" style="padding: 20px; background-color: #0073b7; color: white; border-radius: 10px;">
  <h3>Seleccioná una especialidad médica</h3>
  <select id="especialidad" style="width: 300px; padding: 5px; margin-right: 10px;">
    <option value="">-- Elegí una especialidad --</option>
    <option value="clinica">Clínica Médica</option>
    <option value="traumatologia">Traumatología</option>
    <option value="dermatologia">Dermatología</option>
    <option value="urologia">Urología</option>
    <option value="cardiologia">Cardiología</option>
    <option value="pediatria">Pediatría</option>
    <option value="oftalmologia">Oftalmología</option>
    <option value="ginecologia">Ginecología</option>
  </select>

  <button onclick="buscarMedicos()" style="padding: 6px 15px; background-color: white; color: #0073b7; border: none; border-radius: 5px; cursor: pointer;">
    Buscar médicos disponibles
  </button>

  <div id="resultado" style="margin-top: 20px; background-color: white; color: black; padding: 15px; border-radius: 10px; display: none;">
    <h4>Médicos disponibles:</h4>
    <ul id="lista-medicos"></ul>
  </div>
</div>

<script>
function buscarMedicos() {
  const especialidad = document.getElementById('especialidad').value;
  const lista = document.getElementById('lista-medicos');
  const resultado = document.getElementById('resultado');
  lista.innerHTML = "";

  if (especialidad === "") {
    alert("Por favor, seleccioná una especialidad.");
    return;
  }

  // Datos simulados (después podés reemplazarlos por una consulta PHP/MySQL)
  const medicos = {
    clinica: ["Dr. Pérez - Lunes y Miércoles", "Dra. Martínez - Martes y Jueves"],
    traumatologia: ["Dr. Gómez - Lunes a Viernes", "Dra. Díaz - Martes y Jueves"],
    dermatologia: ["Dra. López - Lunes y Miércoles", "Dr. Ramírez - Viernes"],
    urologia: ["Dr. Torres - Martes y Jueves", "Dr. Suárez - Miércoles y Viernes"],
    cardiologia: ["Dr. Castro - Lunes y Miércoles", "Dra. Vega - Jueves"],
    pediatria: ["Dra. Romero - Martes y Jueves", "Dr. Fernández - Lunes a Viernes"],
    oftalmologia: ["Dr. Benítez - Miércoles y Viernes", "Dra. Correa - Martes"],
    ginecologia: ["Dra. Molina - Lunes y Miércoles", "Dra. Herrera - Viernes"]
  };

  if (medicos[especialidad]) {
    medicos[especialidad].forEach(m => {
      const li = document.createElement("li");
      li.textContent = m + " ";
      const btn = document.createElement("button");
      btn.textContent = "Sacar turno";
      btn.style.marginLeft = "10px";
      btn.onclick = () => alert("Turno solicitado con " + m);
      li.appendChild(btn);
      lista.appendChild(li);
    });
    resultado.style.display = "block";
  }
}
</script>
  <script src="./js/main.js"></script>
</body>
</html>