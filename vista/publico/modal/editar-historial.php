<div class="modal fade" id="actualizar">
    <div class="modal-dialog modal-lg" style="max-width:98%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Datos de historial clínico</h4>
                <button type="button" onclick="location.reload()" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div> 
            <div class="modal-body">
            <input type="hidden" id='cedula_persona' name="">
            <input type="hidden" id='id_historiales_clinicos' name="">
                <form action="" enctype="multipart/form-data"
                id="formulario" method="POST" name="formulario">
                <div class="form-group row justify-content-center"> 


            <div class="col-md-12 mt-2">
            <center><div class="col-6" id='valid_ante_pers' style="color:red;"></div></center>
            <div>
            <div class="input-group">
               <table class ="table">
                <tr style="background:#15406D;color:white">
                <td>
                    <label for="antecedentes_personales">
                        Antecedentes personales
                    </label>
                </td>
                <td>
                    <select class='form-control no-simbolos' id='id_ant_personal' name="datos[id_ant_personal]">
                        <option value="0">Seleccione antecedentes personal</option>
                        <?php foreach ($this->ant_personals as $int) { ?>
                            <option value='<?php echo $int['id_ant_personal'];?>'><?php echo $int['nombre_personal']; ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td>
                    <textarea class="form-control" placeholder="Descripción antecedente personal" id="desc_antecedentes_personales"></textarea>
                </td> 
                <td class="">
                <span class='fa fa-plus-circle' id='btn_agregar_ante_p' title="Agregar familia" style='font-size:34px;cursor:pointer'></span>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                <div class="col-12 bg-light" style='overflow-y: scroll;width: 100%;height:150px;'>
                    <center>
                        <div style='width:100%' id='antec_pers_agg'></div>
                    </center>
                </div>
                </td>
            </tr>
            </table>
            <div class="col-md-12 mt-2">
            <center><div class="col-6" id='valid_ante_famy' style="color:red;"></div></center>
            </div>
            <div class="input-group">
               <table class ="table">
                <tr style="background:#15406D;color:white">
                    <td>
                        <label for="segundo_apellido">
                             Antecedentes familiares
                        </label>
                    </td>
                    <td>
                    <select class="form-control " id="id_ant_familiar">
                        <option value="0">Seleccione antecedente familiar</option>
                        <?php foreach ($this->ant_familiares as $ant_f) { ?>
                        <option value='<?php echo $ant_f['id_ant_familiar'];?>'><?php echo $ant_f['nombre_familiar']; ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td>
                <textarea class="form-control" placeholder="Descripción antecedente familiar" id="desc_antecedentes_familiar"></textarea>
                </td> 
                <td class="">
                <span class='fa fa-plus-circle' id='agregar_ante_familiar' title="Agregar familia" style='font-size:34px;cursor:pointer'></span>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                <div class="col-12 bg-light" style='overflow-y: scroll;width: 100%;height:150px;'>
                    <center>
                        <div style='width:100%' id='antec_famy_agg'></div>
                    </center>
                </div>
                </td>
            </tr>
            </table>
            <div class="col-md-12 mt-2">
            <center><div class="col-6" id='valid_habit_psicolog' style="color:red;"></div></center>
            </div>
            <div class="input-group">
               <table class ="table">
                <tr style="background:#15406D;color:white">
                    <td>
                        <label for="segundo_apellido">
                        Hábitos psicológicos
                        </label>
                    </td>
                    <td>
                    <select class="form-control" id="id_habit_psicologico" name=datos[id_habit_psicologico] >
                        <option value="0">Seleccione hábito psicológico</option>
                        <?php foreach ($this->habit_psicols as $habit) { ?>
                            <option value='<?php echo $habit['id_habit_psicologico'];?>'><?php echo $habit['nombre_habit']; ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td>
                <textarea class="form-control" placeholder="Descripción de hábito psicológico" id="desc_habitos_psicol"></textarea>
             </td> 
                <td class="">
                <span class='fa fa-plus-circle' id='agregar_habit_psicolog' title="Agregar habito" style='font-size:34px;cursor:pointer'></span>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                <div class="col-12 bg-light" style='overflow-y: scroll;width: 100%;height:150px;'>
                    <center>
                        <div style='width:100%' id='habit_psicolog_agg'></div>
                    </center>
                </div>
                </td>
            </tr>
            </table>

            <div class="row">
                                    <div class="col-md-12 mt-2">
                                                <label for="examen">
                                                    Examen Físico
                                                </label><span id='valid_23' style="color:red;"></span>
                                                <div class="input-group">
                                                    <input class="form-control mb-10 letras_numeros" id="examen"
                                                        name="datos[examen]" placeholder="Examen"
                                                        type="text" oninput="Limitar(this,25)" />
                                                </div>
                                            </div>

                                    
                                            <div class="col-md-4 mt-2">
                                                <label for="tipo_sangre">
                                                    Tipo de sangre
                                                </label><span id='valid_4' style="color:red;"></span>
                                                <div class="input-group">
                                                    <select class="form-control mb-10 solo-letras" id="tipo_sangre"
                                                        name="datos[tipo_sangre]" placeholder="Tipo de sangre"
                                                        type="text" oninput="Limitar(this,25)" >
                                                        <option value="0">-Seleccione el tipo de sangre-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                        <option value="1">Desconocido</option>
                                                    
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="peso">
                                                    Peso
                                                </label>
                                                <span id='valid_5' style="color:red;"></span>
                                                <div class="input-group">
                                                <input class='form-control' id='peso' name="datos[peso]" placeholder="Peso de la persona"  type="text" >
                                                </div>

                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="altura">
                                                    Altura
                                                </label>
                                                <span id='valid_6' style="color:red;"></span>
                                                <div class="input-group">
                                                    <input class='form-control' id='altura' name="datos[altura]" placeholder="Altura de la persona"  type="text" >
                                                </div>

                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="talla">Talla</label>
                                                <span id="valid_7" style="color:red;"></span>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="talla" placeholder="Talla" name="datos[talla]">
                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="imc">IMC (Masa corporal)</label>
                                                <span id="valid_8" style="color:red;"></span>
                                                <div class="input-group">
                                                    <input type="text" placeholder="Masa corporal" id="imc" name="datos[imc]" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="fc">FC (Frecuencia Cardiaca)</label>
                                                <span id="valid_9" style="color:red;"></span>
                                                <div class="input-group">
                                                    <input type="text" id="fc" name="datos[fc]" placeholder=" Frecuencia cardiaca" class="form-control" >
                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="fr">FR (Frecuencia respiratoria)</label>
                                                <span id="valid_10" style="color:red;"></span>
                                                <div class="input-group">
                                                    <input type="text"  class="form-control" id="fr" name="datos[fr]" placeholder="Frecuencia respiratoria">
                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="ta">TA (Tensión arterial)</label>
                                                <span id="valid_11" style="color:red;"></span>
                                                <div class="input-group">
                                                    <input type="text" id="ta" name="datos[ta]" class="form-control" placeholder="Tensión arterial">
                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="temperatura">Temperatura</label>
                                                <span id="valid_12" style="color:red;"></span>
                                                <div class="input-group">
                                                    <input type="text" id="temperatura" placeholder="Temperatura" name="datos[temperatura]" class="form-control">
                                                </div>
                                            </div>
                                                



                                    <div class="col-md-12 mt-4">
                                        <label for="diagnostico">Diagnóstico</label>
                                        <span id="valid_13" style="color:red;"></span>
                                        <div>
                                            <input type="text" id="diagnostico" name="datos[diagnostico]" placeholder="Diagnóstico medico" class="form-control" >
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-12 mt-4">
                                        <label for="plan_trat">Tratamiento y recomendación</label>
                                        <span id="valid_14" style="color:red;"></span>
                                        <div>
                                            <input type="text" id="tratamiento" name="datos[tratamiento]" placeholder="Plan de tratamiento" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <label for="evolucion">Evolución</label>
                                        <span id="valid_15" style="color:red;"></span>
                                        <div>
                                            <input type="text" id="evolucion" name="datos[evolucion]" placeholder="Evolución del paciente (opcional)" class="form-control" >
                                        </div>
                                    </div>

                                </div>
        </div>

            

</div>

</div>
</form>
</div>
<div class="modal-footer ">
    <input type="button" class="btn" style="background:#15406D;color:white"  name="" id="enviar" value="Guardar">
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
