<!doctype html>
<html lang="es">

<head>
    <title>Nuevo Usuario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url();?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/jquery/jquery-ui.min.css" rel="stylesheet">
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
                        <h1>Nuevo Usuario</h1>
                    </div>

                    <div class="col-md-12">
                        <a class="btn btn-primary" href="/Website/usuarios/listado_usuarios"> Regresar al listado</a>
                    </div>

                    <div class="col-md-12">

                        <form id="form_usuario" action="" method="POST" autocomplete="off" class="mt-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Apellido</label>
                                    <input type="text" name="apellido" id="apellido" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label>Usuario</label>
                                    <input type="text" name="usuario" id="usuario" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input type="text" name="pass" id="pass" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-primary mt-5" id="btn-nuevo-usuario" data-form="form_usuario">Guardar Datos</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<script src="<?php echo base_url();?>/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/jquery/jquery.js"></script>
<script src="<?php echo base_url();?>/assets/jquery/jquery-ui.min.js"></script>


<!-- Validation Plugin Js -->
<script src="<?php echo base_url();?>/assets/jquery-validation/jquery.validate.js"></script>
<script src="<?php echo base_url();?>/assets/jquery-validation/validator_custom.js"></script>

<script>
    $("body").on('click','#btn-nuevo-usuario',function(){
        var form           = $(this).data("form");
        ValidateForm(form);
        var validator = $("#"+form+"").validate();
        validator.form();
            if(validator.form()) {


    
                var dataString = $("#" + form + "").serialize();
                var  Url = "/usuarios/guardar_usuario";
    
                $.ajax({
                    type: "POST",
                    url: Url,
                    data: dataString,
                    success: function (data) {
                        var response = JSON.parse(data);
                        if (response.status == "success") {
                            $("#" + form + "")[0].reset();
                            var validator = $("#" + form + "").validate();
                            validator.resetForm();
                            RemoveValidate(form);
                        }
                        else {
                            //codigo error
                        }
    
                    }
                });
    
            }
            else{
                //mnensaje de error en caso de que no sea válido el formulario
            }
        });


    function ValidateForm(form){

        $("#"+form+"").validate({
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
                $(element).addClass('is-valid');
            }
        });
    }

    function RemoveValidate(form){
        $("#"+form+"").find('.form-control').removeClass("is-invalid");
        $("#"+form+"").find('.form-control').removeClass("is-valid");
    }

</script>

</body>
</html>