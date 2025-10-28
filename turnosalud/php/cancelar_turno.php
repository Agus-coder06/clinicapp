<?php
include("conexion.php");

$id_turno = $_POST["id_turno"];
mysqli_query($conexion, "DELETE FROM turnos WHERE id = '$id_turno'");
?>