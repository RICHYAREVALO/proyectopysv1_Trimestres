<?php
// pagina con todas la propiedades de administrador del software
session_start();

//Validamos que existe un session ademas que el cargo que exista sea igual a 1 que es administrador
if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] !=2){
    /* 
    para redireccionar en php se utiliza header
    pero al ser datos enviados por la cabecera debe esjecutarse
    antes de mostrar cualquier informcaionen DOM es por eso que coloco
    el codigo antes de la estructura del html 
    */
    header('location: ../../index.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.user/menuempleado.css">
    <title>Vista Usuario</title>
</head>
<body>
    <header>
        <h1 id="titulo">Bienvenido a Beyonde Pas y Salvo</h1>
        <nav class="navbar">
        <div class="container">
            <!-- ucfirst convierte la primera letra en mayusculo de una cadena -->
            <h2 >Usuario </h2><p>
            Hola <?php echo ucfirst($_SESSION['nombre']); ?>!
        <a href="../../controller/cerrarSesion.php">
       <button  id="animatedButton" class="animated-button"> Cerrar sesion</button>
        </a>
        </div>
    </nav>
        <nav>
            <ul>
                <li><a href="solicitar.html" id="inicio">Solicitar PYS</a></li>
                <li><a href="consultarusuario.html" id="acerca">Consultar PYS</a></li>
                <li><a href="imprimir.html" id="servicios">Imprimir PYS</a></li>
                <li><a href="contactenos.html" id="contacto">Contacto</a></li>
            </ul>
        </nav>
    </header>
    

    <script src="js/user.js"></script>
</body>
</html>






