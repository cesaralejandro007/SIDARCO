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
    <input type="hidden" value='<?php echo json_encode($_SESSION['Seguridad']); ?>' id='seguridad_usuario' name="">
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
            <form action=""  enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
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

                                        <div class="col-md-12 text-center">
                                                    <h2>
                                                    Historial Clínico
                                                    </h2>
                                                </div>
                                                <div class="col-md-3 mt-2">
                                            
                                                    <label for="fecha_historial">Fecha de historia</label>
                                                    <div class="input-group">
                                                    <input type="date" id="fecha_historial" class="form-control" name="datos[fecha_historial]" >
                                                </div>
                                                </div>

                                            <div class="col-md-12 mt-4">
                                                <label for="cedula_persona">
                                                    Cédula del funcionario o funcionaria
                                                </label>
                                                <span id='valid_1' style="color:red;"></span>
                                            </div>

                                                <div class="input-group">
                                                <input type="text"  class='form-control letras_numeros' id='cedula_persona' placeholder="Buscar cédula" name="datos[cedula_persona]" list='lista' oninput="Limitar(this,15)">
                                                            <datalist id='lista' >
                                                            <option selected="" value="0"></option>
                                                                <?php foreach ($this->personas as $p) { ?>
                                                                        <option value='<?php echo $p['cedula_persona']; ?>'><?php echo $p['primer_nombre']." ".$p['primer_apellido']; ?></option>
                                                            <?php  } ?>
                                                            </datalist>
                                                    <!-- <button class='btn btn-info' type='button' id='nueva_personas'>Nueva</button> -->
                                                </div>

                                            <!--  </div> -->

                                

                                            <!-- FOOTER -->

                                            
                                        </div> 
                                
                                    <div class="col-md-12 mt-2">
                                                <label for="ant_personal">
                                                    Antecedentes personales
                                                </label><span id='valid_5' style="color:red;"></span>
                                                <div class="input-group">
                                                    <table style='width:100%'>
                                                        <tr>
                                                        <td>
                                                        <input type="text" style='display:none'  placeholder="Nuevo antecedente personal" class='form-control no-simbolos solo-letras' id='ant_personales_input' name="" oninput="Limitar(this,30)">
                                                        <!-- <input type="text" class='form-control letras_numeros' id='ant_personal' placeholder="Antecedentes personales"  list='lista_ant_personal' name="datos[id_ant_personal]" oninput="Limitar(this,15)"> -->
                                                            <select class='form-control no-simbolos' id='id_ant_personal' name="datos[id_ant_personal]">
                                                                <option value="0">Seleccione antecedentes</option>
                                                                <?php foreach ($this->ant_personals as $int) { ?>
                                                                <option value='<?php echo $int['id_ant_personal'];?>'><?php echo $int['nombre_personal']; ?></option>
                                                            <?php } ?>
                                                                </select>
                                                            <td class="col-md-6 p-0">
                                                                <!-- <label for="parentezco">
                                                                    Parentezco
                                                                    
                                                                </label> -->
                                                                <input type="text" placeholder="Descripción..." class="form-control letras_numeros" id="descripcion_personales" name="datos[descripcion_personales]" >
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
                                                        </td><td><button class='btn btn-primary' type='button' id='btn_agregar_per' placeholder="Agregar">Agregar</button> &nbsp;&nbsp;<button class='btn btn-info' type='button' id='btn_nuevo'>Nuevo</button></td>
                                                        </tr>
                                                        <tr><td colspan='2'><br>
                                                        <div style='background:#D4E6F4;overflow-y: scroll;width: 115%; height:200px;'><center>
                                                            <div style='width:100%' id='div_ant_personales'></div>
                                                        </center>
                                                        </div>
                                                        </td>
                                                    </table>
                                                </div>

                                            </div>
                                    </div> 

                                <br>

                                <!---------------ANTECEDENTES Y ALERGIAS-------------------------->

            
                                <div class="tab-pane" id="panel7" role="tabpanel">
                                    <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <h2>
                                                    Antecedentes y hábitos
                                                    </h2>
                                                </div> 
                                                <div class="col-md-12 mt-2">
                                                    <div class="form-group">
                                                        <label for="habit_psicol">
                                                        Antecedentes familiares
                                                        </label><span id='valid_5' style="color:red;"></span>
                                                        <div class="input-group">
                                                            <table style='width:100%'>
                                                            <tr>
                                                                <td>
                                                    
                                                                    <input type="text" class='form-control letras_numeros' id='ant_familia' style="display:none;" placeholder="Nuveo antecedente familiar"   oninput="Limitar(this,15)">
                                                                    
                                                                        <select class="form-control " id="id_ant_familiar">
                                                                            <option value="0">Seleccione antecedente</option>
                                                                            <?php foreach ($this->ant_familiares as $ant_f) { ?>
                                                                            <option value='<?php echo $ant_f['id_ant_familiar'];?>'><?php echo $ant_f['nombre_familiar']; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                        <td class="col-md-6 p-0">
                                                                        <!-- <label for="parentezco">
                                                                            Parentezco
                                                                        </label> -->
                                                                    <input type="text" placeholder="Descripción..." class="form-control letras_numeros" id="descripcion_fam" >
                                                                </td>
                                                                    </td><td><button class='btn btn-primary' type='button' id='btn_agregar_fam'>Agregar</button>&nbsp;&nbsp;<button class='btn btn-info' type='button' id='btn_nuevo'>Nuevo</button></td>
                                                                        </tr>
                                                                    <tr><td colspan='2'><br>
                                                                <div style='background:#D4E6F4;overflow-y: scroll;width: 115%; height:200px;'><center>
                                                                <div style='width:100%' id='div_ant_familiar'></div>
                                                                </center>
                                                                </div>
                                                            </td>
                                                        </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    <div class="col-md-12 mt-2">
                                        <div class="form-group">
                                                <label for="habit_psicol">
                                                    Hábitos psicológicos
                                                </label>
                                                <span id='valid_5' style="color:red;"></span>
                                            <div class="input-group">
                                                        <table style='width:100%'>
                                                        <tr>
                                                        <td>
                                                        <input type="text"  style="display:none;" class='form-control letras_numeros' id='habit_psico' placeholder="Nuevo hábito psicológico"   name="datos[cedula_integrante]" oninput="Limitar(this,15)">
                                                            <select class="form-control" id="id_habit_psicologico" name=[id_habit_psicologico] >
                                                                <option value="0">Seleccione hábito</option>
                                                                <?php foreach ($this->habit_psicols as $habit) { ?>
                                                                <option value='<?php echo $habit['id_habit_psicologico'];?>'><?php echo $habit['nombre_habit']; ?></option>
                                                            <?php } ?>
                                                                </select>
                                                            <td class="col-md-6 p-0">
                                                                <!-- <label for="parentezco">
                                                                    Parentezco
                                                                </label> -->
                                                                <input type="text" placeholder="Descripción..." class="form-control letras_numeros" id="descripcion_habit" name=[descripcion_habit] >
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
                                                    </td><td><button class='btn btn-primary' type='button' id='btn_agregar_psi'>Agregar</button>&nbsp;&nbsp;<button class='btn btn-info' type='button' id='btn_nuevo'>Nuevo</button></td>
                                                    </tr>
                                                    <tr>
                                                    <td colspan='2'><br>
                                                        <div style='background:#D4E6F4;overflow-y: scroll;width: 115%; height:200px;'><center>
                                                            <div style='width:100%' id='div_habit_psicologico'></div> </center>
                                                        </div>
                                                    </td>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                            <!--------------------- Diagnóstico del paciente ----------------------------->
                        
                          <div class="tab-pane" id="panel3" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                            <h2>
                                                Diagnóstico del paciente
                                            </h2>
                                    </div> 
                                    <div class="col-md-12 mt-4">
                                        <label for="examen">Examen físico</label>
                                        <span id="mensaje_examen" style="color:red;"> <span>
                                        <div>
                                            <input type="text" class="form-control" placeholder="Condiciones generales" id="examen" name="datos[examen]">
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
                                                <input class='form-control' id='peso' name="datos[peso]" placeholder="Peso de la persona"  type="text" >
                                                </div>

                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="altura">
                                                    Altura
                                                </label>
                                                <span id='mensaje_altura' style="color:red;"></span>
                                                <div class="input-group">
                                                    <input class='form-control' id='altura' name="datos[altura]" placeholder="Altura de la persona"  type="text" >
                                                </div>

                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="talla">Talla</label>
                                                <span id="mensaje_talla"></span>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="talla" placeholder="Talla" name="datos[talla]">
                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="imc">IMC (Masa corporal)</label>
                                                <span id="mensaje_imc"></span>
                                                <div class="input-group">
                                                    <input type="text" placeholder="Masa corporal" id="imc" name="datos[imc]" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="fc">FC (Frecuencia Cardiaca)</label>
                                                <span id="mensaje_fc"></span>
                                                <div class="input-group">
                                                    <input type="text" id="fc" name="datos[fc]" placeholder=" Frecuencia cardiaca" class="form-control" >
                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="fr">FR (Frecuencia respiratoria)</label>
                                                <span id="mensaje_fr"></span>
                                                <div class="input-group">
                                                    <input type="text"  class="form-control" id="fr" name="datos[fr]" placeholder="Frecuencia respiratoria">
                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="ta">TA (Tensión arterial)</label>
                                                <span id="mensaje_ta"></span>
                                                <div class="input-group">
                                                    <input type="text" id="ta" name="datos[ta]" class="form-control" placeholder="Tensión arterial">
                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="temperatura">Temperatura</label>
                                                <span id="mensaje_t" style=""></span>
                                                <div class="input-group">
                                                    <input type="text" id="temperatura" placeholder="Temperatura" name="datos[temperatura]" class="form-control">
                                                </div>
                                            </div>
                                                



                                    <div class="col-md-12 mt-4">
                                        <label for="diagnostico">Diagnóstico</label>
                                        <span id="idx" style="color:red;"></span>
                                        <div>
                                            <input type="text" id="diagnostico" name="datos[diagnostico]" placeholder="Diagnóstico medico" class="form-control" >
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-12 mt-4">
                                        <label for="plan_trat">Tratamiento y recomendación</label>
                                        <span id="idx" style="color:red;"></span>
                                        <div>
                                            <input type="text" id="tratamiento" name="datos[tratamiento]" placeholder="Plan de tratamiento" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <label for="evolucion">Evolución</label>
                                        <span id="" style="color:red;"></span>
                                        <div>
                                            <input type="text" id="evolucion" name="datos[evolucion]" placeholder="Evolución del paciente (opcional)" class="form-control" >
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <br>
                                    
                        
                        
                <!-- </form> -->

<div class="card-foote   r">
            
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
            <input type="button" class="btn" style="background:#15406D" name="" id="enviar" value="Guardar">
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