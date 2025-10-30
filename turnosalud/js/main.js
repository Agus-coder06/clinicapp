document.getElementById('especialidad').addEventListener('change', function() {
  const especialidad = this.value;
  const resultado = document.getElementById('resultado');

  if (especialidad === "") {
    resultado.innerHTML = "";
    return;
  }

  fetch(`php/obtener_medicos.php?especialidad=${especialidad}`)
    .then(res => res.json())
    .then(data => {
      if (data.length === 0) {
        resultado.innerHTML = "No hay médicos disponibles en esta especialidad.";
      } else {
        let html = "<h4>Médicos disponibles:</h4><ul>";
        data.forEach(medico => {
          html += `<li>${medico.nombre} - ${medico.horario} 
                   <button onclick="mostrarFormulario('${medico.id}', '${medico.nombre}')">Sacar turno</button></li>`;
        });
        html += "</ul>";
        resultado.innerHTML = html;
      }
    });
});

function mostrarFormulario(id, nombre) {
  const resultado = document.getElementById('resultado');
  resultado.innerHTML = `
    <h4>Reservar turno con ${nombre}</h4>
    <form id="formTurno">
      <label>Fecha:</label><br>
      <input type="date" id="fecha" required><br><br>
      <label>Hora:</label><br>
      <input type="time" id="hora" required><br><br>
      <button type="submit" class="btn btn-primary">Confirmar turno</button>
    </form>
  `;

  document.getElementById('formTurno').addEventListener('submit', (e) => {
    e.preventDefault();
    const fecha = document.getElementById('fecha').value;
    const hora = document.getElementById('hora').value;

    fetch('php/guardar_turno.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ medico_id: id, fecha, hora })
    })
    .then(res => res.text())
    .then(msg => mostrarToast(msg)); // ✅ reemplazado alert() por mostrarToast()
  });
}

function actualizarFechaHora() {
  const fecha = new Date();
  const opciones = { weekday: 'long', day: 'numeric', month: 'long', hour: '2-digit', minute: '2-digit' };
  const fechaFormateada = fecha.toLocaleDateString('es-ES', opciones);
  document.getElementById('fecha-hora').textContent = fechaFormateada;
}

actualizarFechaHora();
setInterval(actualizarFechaHora, 60000);

function mostrarToast(mensaje) {
  const toastEl = document.getElementById('toastMsg');
  toastEl.querySelector('.toast-body').textContent = mensaje;
  const toast = new bootstrap.Toast(toastEl);
  toast.show();
}