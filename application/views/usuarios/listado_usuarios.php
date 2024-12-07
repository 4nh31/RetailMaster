<!doctype html>
<html lang="es">

<head>
    <title>Listado de Usuarios</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/jquery/jquery-ui.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-4">Menu Principal</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">

                    <li>
                        <a href="/usuarios" class="nav-link active text-white">
                            Usuarios
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link  text-white">
                            Clientes
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col py-3">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <h1>Listado de Usuarios</h1>
                    </div>

                    <div class="col-md-12">
                        <a class="btn btn-primary" href="/Website/usuarios/agregar_usuario"> Nuevo Usuario</a>
                    </div>

                    <div class="col-md-12">

                        <table class="table table-responsive table-striped mt-3">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Usuario</th>
                                <th>Password</th>
                                <th>Estado</th>
                            </tr>

                            <?php
                            if(isset($usuarios) && !empty($usuarios)){
                                foreach($usuarios as $usuario){
                                    $estadousuario = "Activo";
                                    if($usuario->estado == 0){
                                        $estadousuario = "Inactivo";
                                    }

                                    ?>

                                    <tr>
                                        <td><?php echo $usuario->nombre;?></td>
                                        <td><?php echo $usuario->apellido;?></td>
                                        <td><?php echo $usuario->usuario;?></td>
                                        <td><?php echo $usuario->password;?></td>
                                        <td><?php echo $estadousuario;?></td>
                                    </tr>

                                <?php } } ?>

                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>






    <script src="/assets/jquery/jquery-ui.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>



</body>
</html>