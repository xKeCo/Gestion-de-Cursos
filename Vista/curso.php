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
<?php include '..//modelo/Agregar-curso.php'; ?>
    <section class="perfil">
        <div class="menu">
            <figure>
                <img src="img/edit.svg" class="foto-perfil" alt="foto perfil">
            </figure>
            <p class="Nombre">Institucion Educativa <br><strong><?php echo $_SESSION["usuario"]; ?></strong></p>
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
            <form class="formulario" id="Formu" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="contenedor-mensaje-nueva">
                        <label for="Nuevo-curso"><strong>Nuevo Curso</strong></label> 
                        <span class="mensaje-error"><?php echo $fecha_de_inicio_alerta; ?></span>
                    </div>
                    <input require class="input-text linea" type="date" id="Nuevo-curso" placeholder="Fecha de inicio ( Ej. DD/MM/AAAA)" name="fecha_de_inicio">
                    <!-- <input require class="input-text linea" type="text" id="inicio" placeholder="Horario ( Ej. 10:00 - 11:00 )" name="Horario"> -->
                    <select require name="Horario" class="input-text linea"id="Nuev-curso">
                    <option disabled selected>Seleccione su horario</option>
                    <option value="7:00am - 8:00am">7:00am - 8:00am</option>
                    <option value="8:00am - 9:00am">8:00am - 9:00am</option>
                    <option value="9:00am - 10:00am">9:00am - 10:00am</option>
                    <option value="10:00am - 11:00am">10:00am - 11:00am</option>
                    <option value="11:00am - 12:00pm">11:00am - 12:00pm</option>
                    <option value="1:00pm - 2:00pm">1:00pm - 2:00pm</option>
                    <option value="2:00pm - 3:00pm">2:00pm - 3:00pm</option>
                    <option value="3:00pm - 4:00pm">3:00pm - 4:00pm</option>
                    <option value="5:00pm - 6:00pm">5:00pm - 6:00pm</option>
                    <option value="6:00pm - 7:00pm">6:00pm - 7:00pm</option>
                    <option value="7:00pm - 8:00pm">7:00pm - 8:00pm</option>
                    <option value="8:00pm - 9:00pm">8:00pm - 9:00pm</option>
                    </select>
                    <input require class="input-text linea" type="text" id="Nuevo-curso" placeholder="Nombre Instructor" name="nombre_instructor">
                    <input require class="input-text" type="email" id="Nuevo-curso" placeholder="Correo del Instructor" name="correo_instructor">
                    <input class="enviar-curso" type="submit"  value="+"><br>       
            </form>
        </div>
        <span class="mensaje-correcto"><?php echo $fecha_de_inicio_alerta2; ?></span><br>
    </section>
</body>
</html>