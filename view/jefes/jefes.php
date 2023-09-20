<?php
// pagina con todas la propiedades de administrador del software
session_start();

//Validamos que existe un session ademas que el cargo que exista sea igual a 1 que es administrador
if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] !=3){
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
    <link rel="stylesheet" href="css.jefes/styles.css">
    <title>Vista Jefe Area</title>
</head>
<body>
    <header>
        <img src="../../img/beyonder22.jpg" alt="">
        <h1 id="titulo">Bienvenido a Beyonde Pas y Salvo</h1>
        <nav class="navbar">
        <div class="container">
            <!-- ucfirst convierte la primera letra en mayusculo de una cadena -->
            Jefe Recursos Humanos <p>
            Hola <?php echo ucfirst($_SESSION['nombre']); ?>!
        <a href="../../controller/cerrarSesion.php">
       <button  id="animatedButton" class="animated-button"> Cerrar sesion</button>
        </a>
        </div>
    </nav>
        <nav>
            <ul>
                <li><a href="#" id="inicio">Inicio</a></li>
                <li><a href="#" id="acerca">Acerca de</a></li>
                <li><a href="#" id="servicios">Servicios</a></li>
                <li><a href="#" id="contacto">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="contenido" id="contenido-principal">
        <div class="container2">
        <h1>Peticion de Pas y Salvo</h1>
        <table class="mi-tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Estado Pys</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Juan</td>
                    <td>juan@gmail.com</td>
                    <td><button>pendiente</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Maria</td>
                    <td>maria@gmail.com</td>
                    <td><button>pendiente</button></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Carlos</td>
                    <td>carlos@gmail.com</td>
                    <td><button>pendiente</button></td>
                </tr>
            </tbody>
        </table>
    </div>
        </section>
    </main>

    <script src="js/jefes.js"></script>
</body>
</html>