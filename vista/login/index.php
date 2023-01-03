<!DOCTYPE html>
<html lang="es">
<?php include(call . "Head.php"); ?>
<?php include(call . "Style-login.php"); ?>

<body class="" id="body">
    <!-- ============================================================== -->
    <!-- Inicio contenido de pagina -->
    <!-- ============================================================== -->
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="<?php echo constant('URL'); ?>config/img/web/x3.png" alt="AdminLTELogo" height="60" width="60">
    </div>


    <div class="d-flex justify-content-center align-items-center" style="position:relative; top:170px;">
        <!-- /.login-logo -->

        <div class="col-sm-4">
            <div class="card card-outline card-primary card-outline-tabs">
                <div class="card-header text-center">
                    <h2 class="m-0 font-weight-bold" style="font-family:Arial, Helvetica, sans-serif">SIDARCO</h2>
                </div>
                <div class="card-header p-0 pt-1 border-bottom-0">

                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade show active" id="login2" role="tabpanel" aria-labelledby="login">

                            <form action="<?php echo constant('URL'); ?>Login/Administrar" method="POST" id="formulario_login">
                                <input type="hidden" name="peticion" value="Ingreso">
                                <div id="mensaje-cedula" style="color:red;"></div>
                                <div class="input-group mb-3">
                                    <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="9" class="form-control" id="cedula" placeholder="Usuario" name="cedula_usuario">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <a href="javascript:void(0);" type="button" class="btn" style="margin: 0px;padding: 0px;">
                                                <span class="fas fa-user"></span>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <div id="mensaje-contrasenia" style="color:red;"></div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control contraseña" placeholder="Contraseña" id="contrasenia" name="datos[password]">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <a href="javascript:void(0);" type="button" class="btn" style="margin: 0px;padding: 0px;" id="mostrar">
                                                <span id="ojito" class="fas fa-eye"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <?php include privado . "Captcha.php"; ?>
                                    <!-- /.col -->
                                    <div class="col-6 mt-2">
                                        <input type="button" class="btn btn-primary btn-block" id="enviar" value="Entrar">
                                    </div>
                                    <div class="col-6 mt-2">
                                        <button type="reset" class="btn btn-danger btn-block">Borrar</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>

                            <div class="text-center mt-3 mb-3">
                                <a href="#password" role="button" class="btn" id='olvidado' data-toggle="modal">
                                    He olvidado mi contraseña
                                </a>
                                <?php include privado . "recuperar_contraseña.php"; ?>
                            </div>

                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Final contenido de pagina -->
    <!-- ============================================================== -->
    <?php include(call . "Script.php"); ?>
    <script src="<?php echo constant('URL') ?>config/js/news/Validacion_Login.js"></script>
    <script src="<?php echo constant('URL') ?>config/js/news/consulta-personas-solicitud.js"></script>
</body>

</html>