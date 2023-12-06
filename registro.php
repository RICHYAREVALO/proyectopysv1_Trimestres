<?php

/* 
En ocaciones el usuario puede volver al login
aun si ya exixte una sesion iniciada lo correcto
es no mostrar otra vez el login sino redireccionarlo
a su pagina principal mientras exista un sesion entonces 
creamos un archivo que controle el redireccionamiento
*/

session_start();

  // isset verifica si existe una variable
  if(isset($_SESSION['id'])){
    header('location: controller/redirec.php');
  }

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>

    <!-- Importamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
    <link rel="stylesheet" href="css/sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>

   <!-- 
    Las clases que se utlizan y los divs son de Bootstrap
-->

<!-- Formulario Login -->
<div class="container">
      <div class="">
        <div class="">
          <!-- Margen superior (css personalizado )-->
          <div class="spacing-1"></div>

          <form id="formulario_registro">
            <!-- Estructura del formulario -->
            <fieldset>

              <legend class="center">Registro</legend>

              <!-- Caja de texto para usuario -->
              <label class="sr-only" for="user">Nombre</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                <input type="text" class="form-control" name="name" placeholder="Ingresa tu nombre">
              </div>

              <!-- Div espaciador -->
              <div class="spacing-2"></div>

              <!-- Caja de texto para email -->
              <label class="sr-only" for="user">Email</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                <input type="text" class="form-control" name="email" placeholder="Ingresa tu email">
              </div>

              <div class="spacing-2"></div>

                <!-- Caja de texto para email -->
                <label class="sr-only" for="user">numero de documento</label>
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-user"></i></div>
                  <input type="number" class="form-control" name="num_doc" placeholder="Ingresa numero de documento">
                </div>



                <div class="spacing-2"></div>

                    <!-- Caja de texto para email -->
                    <label class="sr-only" for="user">tipo de documento</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="texto" class="form-control" name="tipo_docu" placeholder="Ingresa tu tipo de documento">
                    </div>
              <!-- Div espaciador -->
              <div class="spacing-2"></div>


              <!-- Caja de texto para la clave-->
              <label class="sr-only" for="clave">Contraseña</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                <input type="password" autocomplete="off" class="form-control" name="clave" placeholder="Ingresa tu clave">
              </div>

              <!-- Div espaciador -->
              <div class="spacing-2"></div>

              <!-- Caja de texto para la clave-->
              <label class="sr-only" for="clave">Verificar contraseña</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                <input type="password" autocomplete="off" class="form-control" name="clave2" placeholder="Verificar contraseña">
              </div>

              <!-- Animacion de load (solo sera visible cuando el cliente espere una respuesta del servidor )-->
              <div class="row" id="load" hidden="hidden">
                <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
                  <img src="img/load.gif" width="100%" alt="">
                </div>
                <div class="col-xs-12 center text-accent">
                  <span>Validando información...</span>
                </div>
              </div>
              <!-- Fin load -->

            <!-- Boton Login para activar la funcion click y enviar los datos mediante ajax --> 
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                  <div class="spacing-2"></div>
                  <button type="button" class="custom-btn btn-1" name="button" id="registro">Registrate</button>
                </div>
              </div>

            </fieldset>
          </form>
        </div>
      </div>
    </div>

<!-- Final formulario login -->

 <!-- Jquery -->
 <script src="js/jquery.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- SweetAlert js -->
    <script src="js/sweetalert.min.js"></script>
    <!-- Js personalizado -->
    <script src="js/operaciones.js"></script>
  </body>
</html>