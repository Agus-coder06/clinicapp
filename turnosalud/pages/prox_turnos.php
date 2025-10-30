<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./bootstrap/bootstrap-5.3.8-dist/css/bootstrap.min.css">
  <title>Próximos Turnos - MiTurnoMedico</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f6f9;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #003b73;
      color: white;
      padding: 15px 25px;
    }
    h1 { margin: 0; }
    main { padding: 20px; }
    table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      border-radius: 10px;
      overflow: hidden;
    }
    th, td {
      padding: 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th { background-color: #0073b7; color: white; }
    tr:hover { background-color: #f1f1f1; }
    .btn-cancelar {
      background-color: #e74c3c;
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 6px;
      cursor: pointer;
      transition: 0.3s;
    }
    .btn-cancelar:hover { background-color: #c0392b; }
    .volver {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #0073b7;
      color: white;
      text-decoration: none;
      border-radius: 8px;
    }
    .volver:hover { background-color: #005a8e; }
  </style>
</head>
<body>
  <header>
    <h1>Próximos Turnos</h1>
  </header>

  <main>
    <h2>Estos son tus turnos reservados:</h2>

    <table id="tablaTurnos">
      <tr>
        <th>Especialidad</th>
        <th>Médico</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Estado</th>
        <th>Acciones</th>
      </tr>
    </table>

    <a href="../index.php" class="volver">← Volver al inicio</a>
  </main>

  <script>
  // Obtener los turnos desde PHP/MySQL
  fetch("../php/obtener_turnos.php")
    .then(res => res.json())
    .then(turnos => {
      const tabla = document.getElementById("tablaTurnos");

      turnos.forEach(t => {
        const fila = document.createElement("tr");
        fila.innerHTML = `
          <td>${t.especialidad}</td>
          <td>${t.medico}</td>
          <td>${t.fecha}</td>
          <td>${t.hora}</td>
          <td>${t.estado}</td>
          <td>
            <button class="btn-cancelar" onclick="cancelarTurno(${t.id}, this)">Cancelar</button>
          </td>
        `;
        tabla.appendChild(fila);
      });
    });

  // Cancelar turno
  function cancelarTurno(id_turno, boton) {
    if (confirm("¿Seguro que querés cancelar este turno?")) {
      fetch("../php/cancelar_turno.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "id_turno=" + id_turno
      })
      .then(() => boton.parentNode.parentNode.remove());
    }
  }
</script>
  <script src:"./bootstrap/bootstrap-5.3.8-dist/js/bootstrap.min.js"></script>
</body>
</html>