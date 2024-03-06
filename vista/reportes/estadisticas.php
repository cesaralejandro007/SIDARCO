<?php include (call."Inicio.php"); ?>
<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Generar estadísticas</h1>
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de Estadisticas</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"> <i
                        class="fas fa-minus"></i> </button>
                    </div>
                </div>
                <form action="<?php echo constant('URL'); ?>Calles/Nueva_Calle" enctype="multipart/form-data"
                    id="formulario" method="POST" name="formulario">
                    <!-- card-body -->
                    <div class="card-body">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-12 mt-2">
                                    <label for="listados"> Seleccionar Reporte</label>
                                    <div class="input-group">
                                        <select class="custom-select" id="listados" name="listados">
                                            <option value='0'>-Seleccionar-</option>
                                            
                                            <option value="est_permisos">Consultar permisos</option>

                                            <option value="est_permisos1">Consultar tipo de permisos</option>

                                            <option value="est_embarazadas">Consultar embarazadas</option>

                                            <option value="est_edades">
                                                Consultar poblacion de edades
                                            </option>

                             <!--                <option value="est_votantes">
                                                Consultar poblacion votante
                                            </option>
 -->
                                            <option value="est_discapacitados">
                                                Consultar personas con discapacidad
                                            </option>

                                            <!-- <option value="est_bonificados">
                                                Consultar Personas Bonificadas
                                            </option> -->

                                           <!--  <option value="est_vacunados">
                                                Consultar Poblacion Vacunada
                                            </option> -->

                                            <option value="est_educacion">
                                                Consultar niveles educativos
                                            </option>

                                            <option value="todos">
                                                Ver todos
                                            </option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center m-t-20">
                            <div class="col-xs-12">
                                <input type="button" class="btn" style="background:#15406D; color:white" name="" id="imprimir" value="Imprimir">
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </section>

        <div id='estadisticas_div'>
            <br><br>

            <section class="content" id='est_edades' style='display:none'>
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Estadistica de Poblacion de Edades</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                            </button>
                        </div>
                    </div>
                    <!-- card-body -->
                    <div class="card-body">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-12 mt-2">
                                    <center>
                                        <div id="edades" style="height: 370px; width: 100%;"></div></center>
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                var chart = new CanvasJS.Chart("edades", {
                                                    theme: "light2",
                                                    animationEnabled: true,
                                                    title: {
                                                        text: "Poblacion de Edades"
                                                    },
                                                    data: [{
                                                        type: "doughnut",
                                                        indexLabel: "{symbol} - {y}",
                                                        yValueFormatString: "#,##0.0\"%\"",
                                                        showInLegend: true,
                                                        legendText: "{label} : {y}",
                                                        dataPoints: <?php echo json_encode($this->datos_edades, JSON_NUMERIC_CHECK); ?>
                                                    }]
                                                });
                                                chart.render();
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                    </section> <br><br>


               

                <section class="content" id='est_permisos' style='display:none'>
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Estadística de permisos</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                            </button>
                        </div>
                    </div>
                    <!-- card-body -->
                    <div class="card-body">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-12 mt-2">
                                    <center>
                                    <div id="permisos" style="height: 370px; width: 100%;"></div></center>
                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                var chart = new CanvasJS.Chart("permisos", {
                                                    theme: "light2",
                                                    animationEnabled: true,
                                                    title: {
                                                        text: "Permisos de funcionarios(as)"
                                                    },
                                                    data: [{
                                                        type: "doughnut",
                                                        indexLabel: "{symbol} - {y}",
                                                        yValueFormatString: "#,##0.0\"%\"",
                                                        showInLegend: true,
                                                        legendText: "{label} : {y}",
                                                        dataPoints: <?php echo json_encode($this->datos_permiso, JSON_NUMERIC_CHECK); ?>
                                                    }]
                                                });
                                                chart.render();
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!--  <div class="card-block">
                            <div class="form-group row justify-content-center"> -->
                            <!--     <div class="col-md-12 mt-2">
                                    <center>
                                    <div id="permisos" style="height: 370px; width: 100%;"></div></center>
                                        <script type="text/javascript">
                                            
                                        </script>
                                    </div>
                                </div> -->
                        

                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </section> <br><br><br>



                </section> <br><br>


               

                    <section class="content" id='est_permisos1' style='display:none'>
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Estadística de permisos</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                </button>
                            </div>
                        </div>
                        <!-- card-body -->
                        <div class="card-body">
                            <div class="card-block">
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-12 mt-2">
                                        <center>
                                        <div id="permisos1" style="height: 370px; width: 100%;"></div></center>
                                            <script type="text/javascript">
                                                $(document).ready(function() {

                                                    var chart = new CanvasJS.Chart("permisos1", {
                                                        theme: "light2",
                                                        animationEnabled: true,
                                                        title: {
                                                            text: "Permisos de funcionarios(as)"
                                                        },
                                                        data: [{
                                                            type: "doughnut",
                                                            indexLabel: "{symbol} - {y}",
                                                            yValueFormatString: "#,##0.0\"%\"",
                                                            showInLegend: true,
                                                            legendText: "{label} : {y}",
                                                            dataPoints: <?php echo json_encode($this->datos_tipo_permiso1, JSON_NUMERIC_CHECK); ?>
                                                        }]
                                                    });
                                                    chart.render();
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           <!--  <div class="card-block">
                                <div class="form-group row justify-content-center"> -->
                                <!--     <div class="col-md-12 mt-2">
                                        <center>
                                        <div id="permisos" style="height: 370px; width: 100%;"></div></center>
                                            <script type="text/javascript">
                                                
                                            </script>
                                        </div>
                                    </div> -->
                            

                            <!-- /.card-footer-->
                        </div>
                        <!-- /.card -->
                    </section> <br><br><br>


                <section class="content" id='est_embarazadas' style='display:none'>
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Estadistica de mujeres embarazadas</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                </button>
                            </div>
                        </div>
                        <!-- card-body -->
                        <div class="card-body">
                            <div class="card-block">
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-12 mt-2">
                                        <center>
                                            <div id="embarazadas" style="height: 370px; width: 100%;"></div></center>
                                            <script type="text/javascript">
                                                $(document).ready(function() {
                                                    var chart = new CanvasJS.Chart("embarazadas", {
                                                        theme: "light2",
                                                        animationEnabled: true,
                                                        title: {
                                                            text: "Mujeres embarazadas"
                                                        },
                                                        data: [{
                                                            type: "doughnut",
                                                            indexLabel: "{symbol} - {y}",
                                                            yValueFormatString: "#,##0.0\"%\"",
                                                            showInLegend: true,
                                                            legendText: "{label} : {y}",
                                                            dataPoints: <?php echo json_encode($this->datos_embarazadas, JSON_NUMERIC_CHECK); ?>
                                                        }]
                                                    });
                                                    chart.render();
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- /.card-footer-->
                        </div>
                        <!-- /.card -->
                    </section> <br><br><br>

<!-- 
                    <section class="content" id='est_votantes' style='display:none'>
                    
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Estadistica de población votante</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                    </button>
                                </div>
                            </div>
                        
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="form-group row justify-content-center">
                                        <div class="col-md-12 mt-2">
                                            <center>
                                                <div id="votantes" style="height: 370px; width: 100%;"></div></center>
                                                <script type="text/javascript">
                                                    $(document).ready(function() {
                                                        var chart = new CanvasJS.Chart("votantes", {
                                                            theme: "light2",
                                                            animationEnabled: true,
                                                            title: {
                                                                text: "Población votante"
                                                            },
                                                            data: [{
                                                                type: "doughnut",
                                                                indexLabel: "{symbol} - {y}",
                                                                yValueFormatString: "#,##0.0\"%\"",
                                                                showInLegend: true,
                                                                legendText: "{label} : {y}",
                                                                dataPoints: <?php echo json_encode($this->datos_votantes, JSON_NUMERIC_CHECK); ?>
                                                            }]
                                                        });
                                                        chart.render();
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                    
                            </div>
                        
                        </section> --> <br><br>


                        <section class="content" id='est_educacion' style='display:none'>
                            <!-- Default box -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Niveles de educación</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- card-body -->
                                <div class="card-body">
                                    <div class="card-block">
                                        <div class="form-group row justify-content-center">
                                            <div class="col-md-12 mt-2">
                                                <center>
                                                    <div id="educacion" style="height: 370px; width: 100%;"></div></center>
                                                    <script type="text/javascript">
                                                        $(document).ready(function() {
                                                            var chart = new CanvasJS.Chart("educacion", {
                                                                theme: "light2",
                                                                animationEnabled: true,
                                                                title: {
                                                                    text: "Niveles de educación"
                                                                },
                                                                data: [{
                                                                    type: "doughnut",
                                                                    indexLabel: "{symbol} - {y}",
                                                                    yValueFormatString: "#,##0.0\"%\"",
                                                                    showInLegend: true,
                                                                    legendText: "{label} : {y}",
                                                                    dataPoints: <?php echo json_encode($this->datos_educacion, JSON_NUMERIC_CHECK); ?>
                                                                }]
                                                            });
                                                            chart.render();
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- /.card-footer-->
                                </div>
                                <!-- /.card -->
                            </section> <br><br>

                            <section class="content" id='est_vacunados' style='display:none'>
                                <!-- Default box -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Vacunados contra el COVID</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- card-body -->
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="form-group row justify-content-center">
                                                <div class="col-md-12 mt-2">
                                                    <center>
                                                        <div id="vacunados" style="height: 370px; width: 100%;"></div></center>
                                                        <script type="text/javascript">
                                                            $(document).ready(function() {
                                                                var chart = new CanvasJS.Chart("vacunados", {
                                                                    theme: "light2",
                                                                    animationEnabled: true,
                                                                    title: {
                                                                        text: "Vacuna COVID"
                                                                    },
                                                                    data: [{
                                                                        type: "doughnut",
                                                                        indexLabel: "{symbol} - {y}",
                                                                        yValueFormatString: "#,##0.0\"%\"",
                                                                        showInLegend: true,
                                                                        legendText: "{label} : {y}",
                                                                        dataPoints: <?php echo json_encode($this->datos_vacuna, JSON_NUMERIC_CHECK); ?>
                                                                    }]
                                                                });
                                                                chart.render();
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- /.card-footer-->
                                    </div>
                                    <!-- /.card -->
                                </section> <br><br>

                                <section class="content" id='est_discapacitados' style="display: none;">

                                    <!-- Default box -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Personas con alguna discapacidad</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- card-body -->
                                        <div class="card-body">
                                            <div class="card-block">
                                                <div class="form-group row justify-content-center">
                                                    <div class="col-md-12 mt-2">
                                                        <center>
                                                            <div id="discapacitados" style="height: 370px; width: 100%;"></div></center>
                                                            <script type="text/javascript">
                                                                $(document).ready(function() {
                                                                    var chart = new CanvasJS.Chart("discapacitados", {
                                                                        theme: "light2",
                                                                        animationEnabled: true,
                                                                        title: {
                                                                            text: "Personas con discapacidad"
                                                                        },
                                                                        data: [{
                                                                            type: "doughnut",
                                                                            indexLabel: "{symbol} - {y}",
                                                                            yValueFormatString: "#,##0.0\"%\"",
                                                                            showInLegend: true,
                                                                            legendText: "{label} : {y}",
                                                                            dataPoints: <?php echo json_encode($this->datos_discapacitados, JSON_NUMERIC_CHECK); ?>
                                                                        }]
                                                                    });
                                                                    chart.render();
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- /.card-footer-->
                                        </div>
                                        <!-- /.card -->
                                    </section> <br><br> 


                                    <section id='est_bonificados' class='content' style="display: none;">
                                        <!-- Default box -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Personas Bonificadas</h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- card-body -->
                                            <div class="card-body">
                                                <div class="card-block">
                                                    <div class="form-group row justify-content-center">
                                                        <div class="col-md-12 mt-2">
                                                            <center>
                                                                <div id="bonificados" style="height: 370px; width: 100%;"></div></center>
                                                                <script type="text/javascript">
                                                                    $(document).ready(function() {
                                                                        var chart = new CanvasJS.Chart("bonificados", {
                                                                            theme: "light2",
                                                                            animationEnabled: true,
                                                                            title: {
                                                                                text: "Personas bonificadas"
                                                                            },
                                                                            data: [{
                                                                                type: "doughnut",
                                                                                indexLabel: "{symbol} - {y}",
                                                                                yValueFormatString: "#,##0.0\"%\"",
                                                                                showInLegend: true,
                                                                                legendText: "{label} : {y}",
                                                                                dataPoints: <?php echo json_encode($this->datos_bonos, JSON_NUMERIC_CHECK); ?>
                                                                            }]
                                                                        });
                                                                        chart.render();
                                                                    });
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- /.card-footer-->
                                            </div>
                                            <!-- /.card -->
                                        </section> 
                                    </div>
                                </div>

<!-- Chart JS -->
<script src="<?php echo constant('URL')?>config/plugins/Chart.js/Chart.min.js"></script>
<script type="text/javascript" src="<?php echo constant('URL')?>config/js/Estadistica.js"></script>
<script type="text/javascript" src="<?php echo constant('URL')?>config/js/news/estadisticas.js"></script>
<?php include (call."Fin.php"); ?>  

