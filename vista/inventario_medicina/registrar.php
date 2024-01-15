<?php include (call."Inicio.php"); ?>
<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registrar inventario</h1>
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
                <h3 class="card-title">Formulario de registro</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <form action="" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                <!-- card-body -->
                <div class="card-body">
                    <div class="card-block">
                        <div class="form-group row justify-content-center">

                            <div class="col-md-6 mt-2">
                                <label for="medicamento">
                                    Medicamento
                                </label>
                                <div class="input-group">
                                    <select class="custom-select" id="medicamento" name="datos[medicamento]">
                                        <option value="0">
                                           -Seleccione-
                                        </option>
                                        <option value="ibuprofeno">Holis</option>
                                    </select>
                                </div>
                                <span id="mensaje_1"></span>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="unidades">
                                    Unidades
                                </label>
                                <div class="input-group">
                                
                                    <input class="form-control no-simbolos mb-10" id="unidades" name="datos[unidades]"
                                        placeholder="Unidades disponibles" type="number" oninput="Limitar(this,25)"/>
                                </div>
                                <span id="mensaje_2"></span>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="grupo">
                                    Grupo 
                                </label>
                                <div class="input-group">
                                    <input class="form-control no-simbolos mb-10" id="grupo" name="datos[grupo]"
                                        placeholder="Grupo al que pertenece el medicamento" type="text" />
                                </div>
                                <span id="mensaje_3"></span>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="caducidad">
                                        Caducidad
                                </label>
                                <div class="input-group">
                                    <input class="form-control" type="date" placeholder="Fecha de caducidad" id="caducidad" name="datos[caducidad]">
                                </div>
                                <span id="mensaje_4"></span>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="lote">
                                    Lote
                                </label>
                                <div class="input-group">
                                    <input  id="lote" name="datos[lote]" class="form-control no-simbolos solo-letras " placeholder="Lote del inventario" oninput="Limitar(this,20)"/>
                                </div>
                                <span id="mensaje_5"></span>
                            </div>

                            <!-- <div class="col-md-6 mt-2">
                                <label for="tipo_inmueble">
                                    Lote
                                </label>
                                <div class="input-group">
                                    <input  id="lote" name="datos[lote]" class="form-control no-simbolos solo-letras " placeholder="Lote del inventario" oninput="Limitar(this,20)"/>
                                </div>
                                <span id="mensaje_5"></span>
                            </div> -->

                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="text-center m-t-20">
                        <div class="col-xs-12">
                            <input type="button" class="btn" style="background:#15406D; color:white" name="" id="enviar" value="Guardar">
                           
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include (call."Fin.php"); ?>
<?php include (call."Style-seguridad.php"); ?>

<script src="<?php echo constant('URL')?>config/js/news/registrar-inventario.js"></script> 