<div class="modal fade" id="agregar">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar Vacunados</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


            <form action="" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                <!-- card-body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                         <label>Persona</label> <span id='valid_persona' style='color:red'></span>
                         <table style='width:100%'><tr><td>
                             <input type="number" maxlength="15" placeholder="Buscar cédula" class='form-control ' id='cedula_propietario' name="" list='lista_personas' oninput="Limitar(this,15)">

                             <datalist id='lista_personas'>
                                 <?php foreach ($this->datos["personas"] as $p) { ?>
                                     <option value='<?php echo $p['cedula_persona'];?>'><?php echo $p['primer_nombre']." ".$p['segundo_nombre']; ?></option>
                                 <?php   } ?>
                             </datalist></td>
                             <td><button type='button' id='registrar_btn' class="btn btn-info" onclick='window.open(BASE_URL+"Personas/Registros")'>Registrar</button></td>

                             <td><button type='button' class="btn btn-info" id='seleccionar_persona'>Seleccionar</button></td>
                         </tr></table>

                     </div>
                 </div>
                 <br>

                 <div id='second' style='display:none'>
                     <div class='row'>

                         <div class="col-md-12">

                         <label>Historial de presión arterial de <span id='nombre_persona'></span></label>
                             
                             <table style='width:100%'><tr>
                                  <td>
                                  <input type="text" style='display:none'  placeholder="Discapacidad..." class='form-control' id='discapacidad_input' name="" oninput="Limitar(this,30)"> 
                                        
                                 <select class='form-control' id='discapacidad_select' style='display:none' > 
                                   <!--  <option value='vacio'>-Fecha-</option>
                                   <?php foreach ($this->datos["discapacidad"] as $d) { ?>
                                     <option value='<?php echo $d['id_discapacidad'];?>'><?php echo $d['nombre_discapacidad']; ?></option>
                                 <?php   } ?>  -->
                                   </select>
                            </td> 

                            <!--  <td>
                                <select id='en_cama' class='form-control no-simbolos'>
                                    <option value='vacio'>-Tensión arterial-</option>
                                    <option value="1">Si</option>
                                    <option value='0'>No</option>
                                </select>
                             </td> -->
                             <td>
                             <span id='valid_fecha_hora' style='color:red'></span>
                               <input type="datetime-local" class='form-control ' id='fecha_hora' placeholder="Tension arterial" name="datos[fecha_hora]">
                             </td>
                             <td>
                             <span id='valid_tension' style='color:red'></span>
                               <input type="text" class='form-control ' id='tension' placeholder="Tension arterial" name="datos[tension]">
                             </td>
                            <td>
                            <span id='valid_frecuencia' style='color:red'></span>
                               <input type="text" class='form-control ' id='frecuencia' placeholder="Frecuencia cardiaca" name="datos[frecuencia]">
                             </td>
                             <td>
                            <!--     <button id='agregar' class="btn btn-info" type="button">Agregar</button>&nbsp;&nbsp;<button type='button' class="btn btn-primary" id='btn_nueva_discapacidad' >Nueva discapacidad</button> -->
                            </td>
                        </tr>
                    </table>


                </div>


            </div>
            <br>


             <!-- /.card-body -->

             <center><input type="button" class="btn" style="background:#15406D; color:white" name="" id="enviar" value="Guardar"></center>
         </form>



            </div>
            <!--Footer -->
        <div class="card-footer">

    <div class="col-md-12 mt-4">
        <div style="float: left;">
            <a id="anterior" style='display:none' type="button" class="btn btn-secondary text-white">
                Anterior
            </a>
        </div>
    </div>
    <div class="col-md-12 mt-4">
        <div style="float: right;">
            <a id="siguiente" type="button" class="btn btn-primary text-white">
                Siguiente
            </a>
        </div>
    </div>
    <div class="text-center m-t-20" id="botones-finales" style='display:none'>
        <div class="col-xs-12">
            <input type="submit" class="btn btn-primary" style="background:#15406D" name="" id="guardar_integrantes" value="Guardar">
        </div>
    </div>
</div>  


<!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-primary" name="" id="guardar_integrante" value="Guardar">
            </div>  -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog --> 
</div>
<!-- /.modal -->
<script type="text/javascript" src="<?php echo constant('URL')?>config/js/news/registrar_presion_arterial.js"></script> 