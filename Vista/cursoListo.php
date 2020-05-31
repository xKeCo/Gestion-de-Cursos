<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/curso.css">
    <link rel="icon" href="img/logo.svg">
    <title>Gestion de cursos</title>
</head>
<body>
<?php include '../modelo/mostrar-cursos.php'; ?>
    <section class="perfil">
        <div class="menu">
            <figure>
                <img src="img/logoblanco.png" class="logo" alt="logo">
            </figure>
            <figure>
                <img src="img/perfil.png" class="foto-perfil" alt="foto perfil">
            </figure>
            <p class="Nombre"><strong><?php echo $_SESSION["usuario"]; ?></strong></p>
            <a href="curso.php" class="boton">Agregar Curso</a>
            <a href="cursoListo.php" class="boton">Ver lista de cursos</a>
            <a href="../modelo/cerrar-sesion.php" class="boton cerrar">Cerrar la sesión</a>
        </div>
    </section>
    <section class="task">
        <div class="fecha">
            <script src="js/main.js"></script>
        </div>
        <div class="div-nuevo-curso">
            <div class="cursoListo">
                <table>
                    <?php    
                    $vacio = 0;
                    while($row = mysqli_fetch_array($curso_usuario)){ 
                        $vacio ++;    
                    ?>
                        <tr>
                            <td>
                                
                                <div class="columna">
                                <?php echo $row['fechaInicio']?> 
                                </div>
                                <div class="columna">
                                <?php echo $row['Horario']?> 
                                </div>
                                <div class="columna">
                                <?php echo $row['nombreInstructor']?> 
                                </div>
                                <div class="columna">
                                <?php echo $row['correoInstructor']?>
                                </div>
                                <a class="eliminar" href="cursoListo.php?eliminar=<?php echo $row['id'];?>">x</a>
                            </td>
                        </tr>
                    <?php } if ($vacio===0) { ?>
                        <a class="mas" href="curso.php">
                            <?php echo "+ Añadir un curso"; ?>
                        </a>
                            <?php }
                    ?>
                </table>
            </div>
        </div>
    </section>
</body>
</html>