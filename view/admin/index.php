<?php
// pagina con todas la propiedades de administrador del software
session_start();

//Validamos que existe un session ademas que el cargo que exista sea igual a 1 que es administrador
if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] !=1){
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
    <title>Administrador</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="vanilla-DT/vanilla-datatables.css">
    <link rel="stylesheet" href="css.admin/admin.css">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="vanilla-DT/vanilla-datatables.js"></script>
    
</head>

<body>
   
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
    <div class="container px- my-3">
        <div class="row">
            <div class="col-lg-10 col-md-11 col-sm-12  mx-auto">
                <div class="container-fluid">
                    <div class="card shadow rounded-0">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="card-title col-auto flex-shrink-1 flex-grow-1"><b>Gestión de usuarios</b></div>
                                <div class="col-auto">
                                    <button type="button" id="add_new" class="custom-btn btn-1 rounded-0"><i class="fa-solid fa-plus-square"></i> Agregar Nuevo</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body rounded-0">
                            <div class="container-fluid">
                                <table id="memberTable" class="table table-stripped table-bordered" bgcolor="#99A3A4">
                                    <colgroup>
                                        <col width="10%">
                                        <col width="25%">
                                        <col width="20%">
                                        <col width="30%">
                                        <col width="15%">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Cargo</th>
                                            <th class="text-center">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Member Form Modal -->
    <div class="modal fade" id="memberFormModal" aria-labelledby="memberFormModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable rounded-0">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h1 class="modal-title fs-5"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <form action="api.php" method='POST' id="member-form">
                            <input type="hidden" name="id">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control rounded-0" name="name" id="name" required="required">
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">Email</label>
                                <input type="text" class="form-control rounded-0" name="contact" id="contact" required="required">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Rol</label>
                                <textarea rows="2" class="form-control rounded-0" name="address" id="address" required="required"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="submit" form="member-form" class="custom-btn btn-2">Guardar</button>
                        <button type="button" class="custom-btn btn-3" data-bs-dismiss="modal">Cerrar</button>
                    </div>
            </div>
        </div>
    </div>
    <!-- End of Member Form Modal -->
    <script src="js/app.js"></script>
</body>

</html>
