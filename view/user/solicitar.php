<?php
// pagina con todas la propiedades de administrador del software
session_start();

//Validamos que existe un session ademas que el cargo que exista sea igual a 1 que es administrador
if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 2) {
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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/solicitar.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Asap+Condensed:wght@800&family=Pirata+One&display=swap" rel="stylesheet">
  <title>SOLICITAR PYS</title>
</head>

<div class="">

  <body background="imagenes/fondobeyonder.jpg">
</div>

<form action="recibe.html" method="post">

  <div align="center">
    <p src="imagenes/marco.png" class="fant">SISTEMA DE PAZ Y SALVO EMPRESARIAL</p>
  </div>


  <div class="Login">
    <footer>
      <div class="container">
    </footer>
    <br>
    <br>
    <br>
    <p>
    <form action="recibe.html" method="post">

      <center>
        <p src="imagenes/marco.png" class="fant">Bienvenido(a)al sistema de expedición de paz y salvo empresarial<br>
        <p><?php echo ucfirst($_SESSION['nombre']); ?> <?php echo ucfirst($_SESSION['cargo']); ?></p>
        <br>
        1016069193<br>
        Ingeniero de sistemas y telecomunicaiones <br>
        <br><br></p>



        <textarea cols="25" rows="10" class="textbox" placeholder="Escriba el motivo por el cual va solicitar el paz y salvo"></textarea>



  </div>

  <div class="container">
    <div class="btn">
      <a href="consultarusuario.html"> <span>Enviar</span></a>
      <div class="dot"></div>
    </div>
    <br>

  </div>
  <div class="container">
    <div class="btn">
      <a href="index.php"> <span>Regresar</span></a>
      <div class="dot"></div>
    </div>

  </div>
</form>



</body>

</html>