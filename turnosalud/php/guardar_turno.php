<?php
include("conexion.php");
session_start();

$especialidad = $_POST["especialidad"];
$medico = $_POST["medico"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$id_usuario = $_SESSION["id_usuario"];

$sql = "INSERT INTO turnos (especialidad, medico, fecha, hora, id_usuario)
        VALUES ('$especialidad', '$medico', '$fecha', '$hora', '$id_usuario')";

if (mysqli_query($conexion, $sql)) {
  echo "Turno guardado correctamente";
} else {
  echo "Error al guardar el turno: " . mysqli_error($conexion);
}
?>