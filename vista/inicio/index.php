<?php include(call . "Inicio.php"); ?>

<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <h1 class="m-0"></h1>
                <h3>Sistema de Información para la Gestión de la División de Administración de la GRTI-RCO del SENIAT</h3>


                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">
        <input id="sesion_iniciada" type="hidden" value="<?php echo $_SESSION['inicio_sesion']; ?>">
        <input id="cedula_persona" type="hidden" value="<?php echo $_SESSION['cedula_usuario']; ?>">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon elevation-1" style="background: #15406D;color: white;">
                        <i class="fa fa-users"></i>
                    </span>

                    <div class="info-box-content">
                        <a href="javascript:void(0)">
                            <span class="info-box-text">
                                <h3>Personas</h3>
                            </span>
                        </a>
                        <h4>
                            <?php
                            if ($this->datos["cantidad_personas"] < 10) {
                                echo "0" . $this->datos["cantidad_personas"];
                            } else {
                                echo $this->datos["cantidad_personas"];
                            }
                            ?>
                        </h4>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon elevation-1" style="background: #15406D;color: white;"><i class="mdi mdi-home-outline"></i></span>

                    <div class="info-box-content">
                        <a href="javascript:void(0)">
                            <span style="background:#15406D">
                                <!--
                                    <h3>Viviendas</h3> -->
                            </span>
                        </a>
                        <h4>
                            <?php
                            if ($this->datos["cantidad_viviendas"] < 10) {
                                echo "0" . $this->datos["cantidad_viviendas"];
                            } else {
                                echo $this->datos["cantidad_viviendas"];
                            }
                            ?>
                        </h4>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon  elevation-1" style="background: #15406D;color: white;"><i class="mdi mdi-view-parallel" style="color: white;"></i></span>

                    <div class="info-box-content">
                        <a href="javascript:void(0)">
                            <span class="">
                                <!--   <h3>Calles</h3>-->
                            </span>
                        </a>
                        <h4>
                            <?php
                            if ($this->datos["cantidad_calles"] < 10) {
                                echo "0" . $this->datos["cantidad_calles"];
                            } else {
                                echo $this->datos["cantidad_calles"];
                            }
                            ?>
                        </h4>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

        </div>

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cartelera de Eventos</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button> -->
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <center>
                            <div id='calendario_eventos_habitante'>
                                <table style="width:100%">
                                    <tr>
                                        <td style="text-align:right;font-size:28px;cursor:pointer;color:#15406D;" onmouseover="this.style.color='#15406D'" onmouseout="this.style.color='#15406D'">
                                            <em class="fas fa-arrow-circle-left" id="back-mes"></em>
                                        </td>
                                        <td style="text-align:center;font-size:26px;font-weight: bold">
                                            <span id="mes-name">Mes</span> <span id="anio-name">Año</span>
                                        </td>
                                        <td style="text-align:left;font-size:28px;cursor:pointer;color:#15406D;" onmouseover="this.style.color='#15406D'" onmouseout="this.style.color='#15406D'">
                                            <em class="fas fa-arrow-circle-right" id="next-mes"></em>
                                        </td>
                                    </tr>
                                </table>
                                <div style="width:100%;height:2px;background:#15406D"></div>
                                <br>
                                <div id="calendario-view" style='width:90%'></div>
                                <br>
                                <br>
                            </div>
                        </center>
                    </div>
                    <!-- /.card-body -->

                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div><br>

            <div class="col-md-4">
                <!-- Info Boxes Style 2 -->
                <div class="info-box mb-3 " style="background:#15406D;color: white;">
                    <span class="info-box-icon"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Miembros de grupo</span>
                        <span class="info-box-number"><?php echo $this->datos["cantidad_miembros"]; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 " style="background: #15406D;color: white;">
                    <span class="info-box-icon"><i class="fa fa-user-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">------</span>
                        <span class="info-box-number"><?php echo $this->datos["adulto_mayor"]; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 " style="background: #15406D;color: white;">
                    <span class="info-box-icon"><i class="fa fa-child"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Menores de edad</span>
                        <span class="info-box-number"><?php echo $this->datos["menores_edad"]; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 " style="background: #15406D;color: white;">
                    <span class="info-box-icon"><i class="fa fa-address-card-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">-------</span>
                        <span class="info-box-number"><?php echo $this->datos["votantes"]; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>

        <!-- /.card -->

    </section>
    <!-- /.content -->
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
<?php include(call . "Fin.php"); ?>
<?php include(call . "style-agenda.php"); ?>
<script src="<?php echo constant('URL') ?>config/js/news/consulta-eventos-habitante.js"></script>