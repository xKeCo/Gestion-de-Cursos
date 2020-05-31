<?php

// Incluir archivo de conexion a la base de datos
require_once "conexion.php";

$id_usuario = $_SESSION["id"];


$curso_usuario = mysqli_query($link, "SELECT * FROM curso WHERE usuario = $id_usuario");

if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    mysqli_query($link, "DELETE FROM curso WHERE id = $id");
    header('location: ../vista/cursoListo.php');
}

?>