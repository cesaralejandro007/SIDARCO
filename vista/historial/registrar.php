<?php include (call."Inicio.php"); ?>
<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registrar Historial Clínico</h1>
                </div><!-- /.col -->
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
<section class="content">
        <!-- Default box -->
        <div class="card"><!--LISTO-->
            <div class="card-header">
                <h3 class="card-title">Formulario de Registro</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <form action="<?php echo constant('URL'); ?>" enctype="multipart/form-data"
                id="formulario" method="POST" name="formulario">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="vtabs">
                                <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                    <li class="nav-item" style="margin-top: 50%; margin-bottom: 50%;">
                                        <a class="nav-link active" data-toggle="tab" id="tab_1" href="#panel5" role="tab">
                                            <span class="hidden-sm-up">
                                                <i class="ti-home"></i>
                                            </span>
                                            <span class="hidden-xs-down">
                                            Información básica del paciente
                                            </span>
                                        </a>
                                    </li>
                                <!--  <li class="nav-item" style="margin-top: 50%; margin-bottom: 50%;">
                                        <a class="nav-link" data-toggle="tab" href="#panel6" role="tab">
                                            <span class="hidden-sm-up">
                                                <i class="ti-user"></i>
                                            </span>
                                            <span class="hidden-xs-down">
                                                Documentos Personales
                                            </span>
                                        </a>
                                    </li> -->
                                    <li class="nav-item" style="margin-top: 50%; margin-bottom: 50%;">
                                        <a class="nav-link" data-toggle="tab" id="tab_2" href="#panel7" role="tab">
                                            <span class="hidden-sm-up">
                                                <i class="ti-email"></i>
                                            </span>
                                            <span class="hidden-xs-down">
                                            Antecedentes patológicos y alérgias
                                            </span>
                                        </a>
                                    </li>

                                    <li class="nav-item" style="margin-top: 50%; margin-bottom: 50%;">
                                        <a class="nav-link" data-toggle="tab" id="tab_3" href="#panel3" role="tab">
                                            <span class="hidden-sm-up">
                                                <i class="ti-email"></i>
                                            </span>
                                            <span class="hidden-xs-down">
                                            Diagnóstico del paciente
                                            </span>
                                        </a>
                                    </li>
                                    
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="panel5" role="tabpanel">
                                        <div class="row">
                                        <div class="col-md-12 mt-4">
                                                <label for="primer_nombre">
                                                    Cédula del funcionario o funcionaria
                                                </label>
                                                <span id='valid_1' style="color:red;"></span>
                                                <div class="input-group">
                                                <input type="text"  class='form-control letras_numeros' id='cedula_persona' placeholder="Buscar cédula" name="datos['cedula_persona']" list='lista' oninput="Limitar(this,15)">
                                                            <datalist id='lista' >
                                                            <option selected="" value=""></option>
                                                                <?php foreach ($this->personas as $p) { ?>
                                                                        <option value='<?php echo $p['cedula_persona']; ?>'><?php echo $p['primer_nombre']." ".$p['primer_apellido']; ?></option>
                                                            <?php    } ?>
                                                            </datalist>
                                                    <button class='btn btn-info' type='button' id='nueva_personas'>Nueva</button>
                                                </div>

                                                </div>

                               
                                                <div class="col-md-4 mt-2">
                                                <label for="tipo_sangre">
                                                    Tipo de sangre
                                                </label><span id='valid_2' style="color:red;"></span>
                                                <div class="input-group">
                                                    <input class="form-control mb-10 solo-letras" id="tipo_sangre"
                                                        name="datos[tipo_sangre]" placeholder="Tipo de sangre"
                                                        type="text" oninput="Limitar(this,25)" />
                                                </div>

                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="peso">
                                                    Peso
                                                </label>
                                                <span id='valid_3' style="color:red;"></span>
                                                <div class="input-group">
                                                <input class='form-control' id='peso'  placeholder="Peso de la persona"  type="text" >
                                                </div>

                                             </div>

                                             <div class="col-md-4 mt-2">
                                                <label for="altura">
                                                    Altura
                                                </label>
                                                <span id='valid_4' style="color:red;"></span>
                                                <div class="input-group">
                                                <input class='form-control' id='altura'  placeholder="Altura de la persona"  type="text" >
                                                </div>

                                            </div> <!-- FOOTER -->

                                            
                                        </div>
                                   
                                      <div class="col-md-12 mt-2">
                                                <label for="habit_psicol">
                                                    Hábitos psicológicos
                                                </label><span id='valid_5' style="color:red;"></span>
                                                <div class="input-group">
                                                    <table style='width:100%'>
                                                        <tr>
                                                        <td>
                                                        <input type="text" class='form-control letras_numeros' id='habit_psicol' placeholder="Buscar hábitos"  list='lista_persona' name="datos[cedula_integrante]" oninput="Limitar(this,15)">
                                                            <datalist id='lista_persona'>
                                                                <?php foreach ($this->habit_psicols as $int) { ?>
                                                                <option value='<?php echo $int['nombre_psicol'];?>'><?php echo $int['id_habit_psicol']; ?></option>
                                                            <?php } ?>
                                                            </datalist>
                                                            <td class="col-md-6 p-0">
                                                                <!-- <label for="parentezco">
                                                                    Parentezco
                                                                    
                                                                </label> -->
                                                                <input type="text" placeholder="Descripción (opcional)" class="form-control letras_numeros" id="observacion" >
                                                            <!--    <select class="custom-select" id="parentezco"
                                                        name="datos[parentezco]" >
                                                        <option selected="" value="0">
                                                            -Seleccione el tipo de parentezco-
                                                        </option>
                                                        <option value="Padre">
                                                            Padre
                                                        </option>
                                                        <option value="Madre" >
                                                            Madre
                                                        </option>
                                                        <option value="Hijo">
                                                            Hijo
                                                        </option>
                                                        <option value="Hija">
                                                            Hija
                                                        </option>
                                                        <option value="Conyugue">
                                                            Conyugue 
                                                        </option>
                                                        </select> -->
                                                        </td>
                                                        </td><td><button class='btn btn-primary' type='button' id='btn_agregar'>Agregar</button>&nbsp;&nbsp;<button class='btn btn-info' type='button' id='btn_nuevo'>Nuevo</button></td>
                                                        </tr>
                                                        <tr><td colspan='2'><br>
                                                        <div style='background:#D4E6F4;overflow-y: scroll;width: 115%; height:200px;'><center>
                                                            <div style='width:100%' id='integrantes_agregados'></div>
                                                        </center>
                                                        </div>
                                                        </td>
                                                    </table>
                                                </div>

                                            </div>
                                    
                                            </div>



                            <!---------------ANTECEDENTES Y ALERGIAS-------------------------->

            
                                <div class="tab-pane" id="panel7" role="tabpanel">
                                    <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <h2>
                                                    Antecedentes y alérgias
                                                    </h2>
                                                </div> 

                                                <div class="col-md-12 mt-2">
                                                    <div class="form-group">
                                                        <label for="habit_psicol">
                                                        Antecedentes patológicos
                                                        </label><span id='valid_5' style="color:red;"></span>
                                                        <div class="input-group">
                                                            <table style='width:100%'>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class='form-control letras_numeros' id='habit_psicol' placeholder="Buscar hábitos"  list='lista_persona' name="datos[cedula_integrante]" oninput="Limitar(this,15)">
                                                                        <datalist id='lista_persona'>
                                                                            <?php foreach ($this->habit_psicols as $int) { ?>
                                                                            <option value='<?php echo $int['nombre_psicol'];?>'><?php echo $int['id_habit_psicol']; ?></option>
                                                                            <?php } ?>
                                                                        </datalist>
                                                                        <td class="col-md-6 p-0">
                                                                        <!-- <label for="parentezco">
                                                                            Parentezco
                                                                        </label> -->
                                                                    <input type="text" placeholder="Descripción (opcional)" class="form-control letras_numeros" id="observacion" >
                                                                </td>
                                                                    </td><td><button class='btn btn-primary' type='button' id='btn_agregar'>Agregar</button>&nbsp;&nbsp;<button class='btn btn-info' type='button' id='btn_nuevo'>Nuevo</button></td>
                                                                        </tr>
                                                                    <tr><td colspan='2'><br>
                                                                <div style='background:#D4E6F4;overflow-y: scroll;width: 115%; height:200px;'><center>
                                                                <div style='width:100%' id='integrantes_agregados'></div>
                                                                </center>
                                                                </div>
                                                            </td>
                                                        </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mt-2">
                                                <label for="habit_psicol">
                                                Alergias
                                                </label><span id='valid_5' style="color:red;"></span>
                                                <div class="input-group">
                                                    <table style='width:100%'>
                                                        <tr>
                                                        <td>
                                                        <input type="text" class='form-control letras_numeros' id='habit_psicol' placeholder="Buscar hábitos"  list='lista_persona' name="datos[cedula_integrante]" oninput="Limitar(this,15)">
                                                            <datalist id='lista_persona'>
                                                                <?php foreach ($this->habit_psicols as $int) { ?>
                                                                <option value='<?php echo $int['nombre_psicol'];?>'><?php echo $int['id_habit_psicol']; ?></option>
                                                            <?php } ?>
                                                            </datalist>
                                                            <td class="col-md-6 p-0">
                                                                <!-- <label for="parentezco">
                                                                    Parentezco
                                                                    
                                                                </label> -->
                                                                <input type="text" placeholder="Descripción (opcional)" class="form-control letras_numeros" id="observacion" >
                                                            <!--    <select class="custom-select" id="parentezco"
                                                        name="datos[parentezco]" >
                                                        <option selected="" value="0">
                                                            -Seleccione el tipo de parentezco-
                                                        </option>
                                                        <option value="Padre">
                                                            Padre
                                                        </option>
                                                        <option value="Madre" >
                                                            Madre
                                                        </option>
                                                        <option value="Hijo">
                                                            Hijo
                                                        </option>
                                                        <option value="Hija">
                                                            Hija
                                                        </option>
                                                        <option value="Conyugue">
                                                            Conyugue 
                                                        </option>
                                                        </select> -->
                                                        </td>
                                                        </td><td><button class='btn btn-primary' type='button' id='btn_agregar'>Agregar</button>&nbsp;&nbsp;<button class='btn btn-info' type='button' id='btn_nuevo'>Nuevo</button></td>
                                                        </tr>
                                                        <tr><td colspan='2'><br>
                                                        <div style='background:#D4E6F4;overflow-y: scroll;width: 115%; height:200px;'><center>
                                                            <div style='width:100%' id='integrantes_agregados'></div>
                                                        </center>
                                                        </div>
                                                        </td>
                                                    </table>
                                                </div>

                                            </div>

                                    <div class="col-md-12 mt-2">
                                        <div class="form-group">
                                                <label for="habit_psicol">
                                                    Intervenciones quirúrgicas 
                                                </label>
                                                <span id='valid_5' style="color:red;"></span>
                                            <div class="input-group">
                                                        <table style='width:100%'>
                                                        <tr>
                                                        <td>
                                                        <input type="text" class='form-control letras_numeros' id='habit_psicol' placeholder="Buscar hábitos"  list='lista_persona' name="datos[cedula_integrante]" oninput="Limitar(this,15)">
                                                            <datalist id='lista_persona'>
                                                                <?php foreach ($this->habit_psicols as $int) { ?>
                                                                <option value='<?php echo $int['nombre_psicol'];?>'><?php echo $int['id_habit_psicol']; ?></option>
                                                            <?php } ?>
                                                            </datalist>
                                                            <td class="col-md-6 p-0">
                                                                <!-- <label for="parentezco">
                                                                    Parentezco
                                                                </label> -->
                                                                <input type="text" placeholder="Descripción (opcional)" class="form-control letras_numeros" id="observacion" >
                                                                <!--    <select class="custom-select" id="parentezco"
                                                                name="datos[parentezco]" >
                                                                <option selected="" value="0">
                                                                    -Seleccione el tipo de parentezco-
                                                                </option>
                                                                <option value="Padre">
                                                                    Padre
                                                                </option>
                                                                <option value="Madre" >
                                                                    Madre
                                                                </option>
                                                                <option value="Hijo">
                                                                    Hijo
                                                                </option>
                                                                <option value="Hija">
                                                                    Hija
                                                                </option>
                                                                <option value="Conyugue">
                                                                    Conyugue 
                                                                </option>
                                                                </select> -->
                                                            </td>
                                                    </td><td><button class='btn btn-primary' type='button' id='btn_agregar'>Agregar</button>&nbsp;&nbsp;<button class='btn btn-info' type='button' id='btn_nuevo'>Nuevo</button></td>
                                                    </tr>
                                                    <tr>
                                                    <td colspan='2'><br>
                                                        <div style='background:#D4E6F4;overflow-y: scroll;width: 115%; height:200px;'><center>
                                                            <div style='width:100%' id='integrantes_agregados'></div> </center>
                                                        </div>
                                                    </td>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                            <!--------------------- Diagnóstico del paciente ----------------------------->
                        
                          <div class="tab-pane active" id="panel3" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 mt-4">

                                    
                                               <!--    <label for="primer_nombre">
                                                    Cédula del funcionario prueba
                                                </label>
                                                <span id='valid_1' style="color:red;"></span>
                                        <div class="input-group">
                                                <input type="text"  class='form-control letras_numeros' id='cedula_persona' placeholder="Buscar cédula" name="datos['cedula_persona']" list='lista' oninput="Limitar(this,15)">
                                                            <datalist id='lista' >
                                                            <option selected="" value=""></option>
                                                                <?php foreach ($this->personas as $p) { ?>
                                                                        <option value='<?php echo $p['cedula_persona']; ?>'><?php echo $p['primer_nombre']." ".$p['primer_apellido']; ?></option>
                                                            <?php    } ?>
                                                            </datalist>
                                                    <button class='btn btn-info' type='button' id='nueva_personas'>Nueva</button> -->
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>








                            

                            </div>  
                            </div>  
                    </div>    
                            
                    </div>    
                 </div> 
                <!-- </form> -->
            <div class="card-footer">
            
            <!--Footer -->
        
        <div class="col-md-12 mt-4">
        <div style="float: right;">
            <a id="siguiente" type="button" class="btn btn-primary text-white">
                Siguiente
            </a>
        </div>
    </div>
    <div style="float: left;">
            <a id="anterior" style='display:none' type="button" class="btn btn-secondary text-white">
                Anterior
            </a>
        </div>

        <div class="text-center m-t-20" id="botones-finales" style='display:none'>
        <div class="col-xs-12">
            <input type="submit" class="btn btn-primary" style="background:#15406D" name="" id="guardar_integrantes" value="Guardar">
        </div>
    </div>


    </div><!--  FOOTER -->


</form>
</div>
</section>


</div>

<script type="text/javascript" src="<?php echo constant('URL')?>config/js/news/registrar-historial.js"></script>
<!-- /.content-wrapper -->
<?php include (call."Fin.php"); ?>

<style>
.color-table.info-table thead th {
    background-color: #009efb;
    color: #fff;
}
</style>