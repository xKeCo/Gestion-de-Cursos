<?php

// Incluir archivo de conexion a la base de datos
require_once "conexion.php";


$usuario = $_SESSION["id"];
$fecha_de_inicio = "";
$Horario = "";
$nombre_instructor = "";
$correo_instructor = "";

// Alertas
$fecha_de_inicio_alerta = $fecha_de_inicio_alerta2 = "";
$Horario_alerta = "";
$nombreInstructor_alerta =  "";
$correo_instructor_alerta =  "";

$puede_enviar = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["fecha_de_inicio"])) || empty(trim($_POST["Horario"])) || empty(trim($_POST["nombre_instructor"])) || empty(trim($_POST["correo_instructor"]))){
        $fecha_de_inicio_alerta = "Por favor, ingrese todos los campos";
    }else{
        $fecha_de_inicio = trim($_POST["fecha_de_inicio"]);
        $Horario = trim($_POST["Horario"]);
        $nombre_instructor = trim($_POST["nombre_instructor"]);
        $correo_instructor = trim($_POST["correo_instructor"]);
        $puede_enviar = true;
    }
}


if(empty($fecha_de_inicio_alerta) && empty($Horario_alerta) && empty($nombre_instructor_alerta) && empty($correo_instructor_alerta) && $puede_enviar == true){

    $sql = "INSERT INTO curso (usuario, fechaInicio, Horario, nombreInstructor, correoInstructor) VALUES (?,?,?,?,?)";
            
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "issss", $param_usuario, $param_fechaInicio , $param_Horario, $param_nombreInstructor, $param_correoInstructor);
                
        // ESTABLECIENDO PARAMETRO

        $param_usuario = $usuario; 
        $param_fechaInicio = $fecha_de_inicio;
        $param_Horario = $Horario;
        $param_nombreInstructor = $nombre_instructor;
        $param_correoInstructor = $correo_instructor;

        

        if(mysqli_stmt_execute($stmt)){
            $fecha_de_inicio_alerta2 = "Curso añadido correctamente";
            
        }else{
            echo "Algo Salio mal, intentalo despues";
        }
    }
    $puede_enviar = false;
}

mysqli_close($link);
?>