<?php include (call."Inicio.php"); ?>
<?php include (call."data-table.php"); ?>

<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"> 
                    <h1 class="m-0">Consulta de referencias</h1>
                </div><!-- /.col -->
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Consulta y exportación de datos</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered  table-hover">
                    <thead>
                        <tr>
                            <th style="width: 115px;">Acciones</th>
                            <th>Cedula</th>
                            <th>Fecha de referencia</th>
                            <th>Diagnóstico</th>
                            <th>Informe</th>
                            <th>Examen</th>
                            <th>Ubicación</th>
                            <th>Especialidad</th>
                            
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tbody>
                        <script src="<?php echo constant('URL')?>config/js/ajax/Ajax_Consultas_Referencias.js"></script>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="width: 115px;">Acciones</th>
                            <th>Cédula</th>
                            <th>Fecha de referencia</th>
                            <th>Diagnóstico</th>
                            <th>Informe</th>
                            <th>Examen</th>
                            <th>Ubicación</th>
                            <th>Especialidad</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    <!-- /.content -->
</div>
<?php include modal."ver-negocio.php"; ?>
<?php include modal."editar-negocio.php"; ?>
<!-- /.content-wrapper -->
<?php include (call."Fin.php"); ?>