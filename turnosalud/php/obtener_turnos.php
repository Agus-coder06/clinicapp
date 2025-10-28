<?php
include("conexion.php");
session_start();

// Si no hay login aún, usamos un id fijo para probar
$id_usuario = $_SESSION["id_usuario"] ?? 1;

$sql = "SELECT * FROM turnos WHERE id_usuario = '$id_usuario'";
$result = mysqli_query($conexion, $sql);

$turnos = [];
while ($fila = mysqli_fetch_assoc($result)) {
  $turnos[] = $fila;
}

header("Content-Type: application/json");
echo json_encode($turnos);
?>