
<?php include (call."Inicio.php"); ?>
<?php include (call."main.php"); ?>
<body class="hold-transition sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                    <h1 class="m-0">Consulta de Perfil</h1>
                </div><!-- /.col -->
            </div>
        </div>
    </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Consulta y modificación del Perfil</h3>
            </div>
            <p></p>
            <!-- /.card-header -->
            <div class="card-body" >
                    <div class="container">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                            <div class="card-header pb-1 px-1">
                                <div class="container-fluid d-flex justify-content-between flex-wrap">
                                    <div>
                                        <h6 class="p-0 m-1">Datos personales</h6>
                                    </div>
                                    <button class="btn btn-outline-primary m-1 px-2"  style="padding:3px"
                                        id="editarperfil" 
                                        style="cursor: pointer">
                                        <i class="fas fa-user-edit"></i> Editar perfil
                                    </button>
                                </div><!-- /.container-fluid -->
                            </div>
                            <input id="correo1" type="hidden" value="<?php echo $_SESSION['correo']; ?>">
                            <input id="telefono1" type="hidden" value="<?php echo $_SESSION['telefono'] ?>">
                            <input id="cedula_persona" type="hidden" value="<?php echo $_SESSION['cedula_usuario'] ?>">
                            <div class="card-body">
                                <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0" id="prueba">Cedula:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $_SESSION['cedula_usuario'] ?></p>
                                </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nombre y apellido:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $_SESSION['nombre']. " " . $_SESSION['apellido']  ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Genero:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php if($_SESSION['genero']=="M"){echo "Masculino"; }else{echo "Femenino";}  ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Telefono:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $_SESSION['telefono'] ?></p>
                                </div>
                                </div>
                                <hr>
                                <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Correo:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $_SESSION['correo'] ?></p>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <!-- Bootstrap 4 -->




    <!-- Page specific script -->
</body>

</html>

<!-- /.content-wrapper -->
<?php include (call."Fin.php"); ?>


<?php include (call."Style-agenda.php"); ?>
<script src="<?php echo constant('URL') ?>config/js/news/perfil.js"></script>