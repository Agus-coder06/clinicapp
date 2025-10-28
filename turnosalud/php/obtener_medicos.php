<?php
require "conexion.php";
$especialidad = $_GET['especialidad'] ?? '';
$sql = "SELECT * FROM medicos WHERE especialidad = '$especialidad'";
$resultado = $conexion->query($sql);

$medicos = [];
while ($fila = $resultado->fetch_assoc()) {
    $medicos[] = $fila;
}

echo json_encode($medicos);
?>