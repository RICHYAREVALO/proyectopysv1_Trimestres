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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="img/png" href="/img/menu.png"/>
    <link rel="stylesheet" type="text/css" href="css.user/menuempleado.css">
    <title>Menu</title>
</head>
<body>
     <!-- ucfirst convierte la primera letra en mayusculo de una cadena -->
 <nav class="navbar">
        <div class="container">
            <!-- ucfirst convierte la primera letra en mayusculo de una cadena -->
            Aministrador <br>
            Hola <?php echo ucfirst($_SESSION['nombre']); ?>!
            <h1>Pas y Salvo Beyonder</h1>
        <a href="../../controller/cerrarSesion.php">
        <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesion
        </a>
            
        </div>
    </nav>
    <h1>Paz y Salvo Beyonber</h1>
    <p>
        <h2>Empleado</h2>

<nav>
	<a href="solicitar.html">Solicitar</a>
	<a href="consultarusuario.html">Consultar</a>
	<a href="imprimir.html">Imprimir</a>
    <a href="contactenos.html">Contactenos</a>
    <a href="index.html">Salir</a>
	<div class="animation start-home"></div>
</nav>

    
</body>
</html>






