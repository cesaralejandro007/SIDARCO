<div class="modal fade" data-bs-backdrop="static" id="edit_persona">
  <div class="modal-dialog" style='min-width: 98%'>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id='modal-title'>Editar persona</h4>
        <button type="button" id="modalpersona" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<input type="hidden" id="campoubic">
      <div class="modal-body">
        <center>
          <div style='width:98%;overflow-y: scroll;height:400px'>
            <table style='width:98%;' border='1'>
            <div class='border border-bottom-0 border-dark rounded-top p-1' style='width:98%;background:#15406D;color:white;font-weight:bold'>Datos Personales</div>
              <tr class='text-dark' style='background:#AEB6BF;font-weight:bold'>
                <td style='width:25%'>Primer Nombre</td>
                <td style='width:25%'>Segundo Nombre</td>
                <td style='width:25%'>Primer Apellido</td>
                <td style='width:25%'>Segundo Apellido</td>
              </tr>
              <tr>
                <td style='width:25%'><input type="text" id='n1' class='form-control' placeholder="Primer nombre"></td>
                <td style='width:25%'><input type="text" id='n2' class='form-control' placeholder="Segundo Nombre"></td>
                <td style='width:25%'><input type="text" id='a1' class='form-control' placeholder="Primer Apellido"></td>
                <td style='width:25%'><input type="text" id='a2' class='form-control' placeholder="Segundo Apellido"></td>
              </tr>
            </table>
            
            
                        <br>
            
                        <table style='width:98%;' border='1'>
            
                          <tr class='text-dark' style='background:#AEB6BF;font-weight:bold'>
                            <td style='width:25%'>Fecha de nacimiento</td>
                            <td style='width:25%'>Género</td>
                            <td style='width:25%'>Nacionalidad</td>
                            <td style='width:25%'>Estado Civil</td>
                          </tr>
                          <tr>
                            <td style='width:25%'><input type="date" id='fnac' class='form-control'></td>
                            <td style='width:25%'>
                              <select class='form-control' id='gen'>
                                <option value='M'>Masculino</option>
                                <option value='F'>Femenino</option>
                              </select>
                            </td>
                              <td style='width:25%'><input type="text" id='nac' class='form-control' placeholder="Nacionalidad"></td>
                            <td style='width:25%'>
                              <select class='form-control' id='edoc'>
                                <option value='Soltero(a)'>Soltero(a)</option>
                                <option value='Casado(a)'>Casado(a)</option>
                                <option value='Viudo(a)'>Viudo(a)</option>
                              </select>
                            </td>
                          </tr>
                        </table>
            
                        <br>
          
            <table style='width:98%;' border='1'>
            <div class='border border-bottom-0 border-dark rounded-top p-1' style='width:98%;background:#15406D;color:white;font-weight:bold'>Datos de Contacto</div>
              <tr class='text-dark' style='background:#AEB6BF;font-weight:bold'>
                <td style='width:20%'>Teléfono</td>
                <td style='width:20%'>Telefono de Casa</td>
                <td style='width:20%'>WhatsApp</td>
                <td style='width:20%'>Correo</td>
                <td style='width:20%'>Correo Institucional</td>
              </tr>
              <tr>
                <td style='width:20%'><input type="text" id='tlf' class='form-control' placeholder="Teléfono"></td>
                <td style='width:20%'><input type="text" id='tlfc' class='form-control' placeholder="Telefono de Casa"></td>
                <td style='width:20%'>
                  <select class='form-control' id='ws'>
                    <option value='0'>No</option>
                    <option value='1'>Si</option>
                  </select>
                </td>
                <td style='width:20%'><input type="text" id='cor' class='form-control' placeholder="Correo"></td>
                <td style='width:20%'><input type="text" id='correoins' class='form-control' placeholder="Correo Institucional"></td>
              </tr>
            </table>
           
            <br>

            <table style='width:98%;' border='1'>
            <div class='border border-bottom-0 border-dark rounded-top p-1' style='width:98%;background:#15406D;color:white;font-weight:bold'>Datos Laborales</div>
              <tr class='text-dark' style='background:#AEB6BF;font-weight:bold'>
                <td style='width:20%'>Nivel educativo</td>
                <td style='width:20%'>Condición Laboral</td>
                <td style='width:20%'>Ubicación</td>
                <td style='width:20%'>Nomina</td>
                <td class="d-none jq" style='width:20%'>Grado/JQ</td>
              </tr>
              <tr>
                <td style='width:20%'><input type="text" id='nedu' class='form-control' placeholder="Nivel educativo"></td>
                <td style='width:20%'>
                  <input type="text" id='condil' class='form-control'>
                </td>
                  <td style='width:20%'>
                  <select class='form-control' id='ubic'>
                    <option value='0'>-Seleccione Ubicación-</option>
                    <?php foreach ($this->ubicacion as $p) { ?>
                      <option value='<?php echo $p['id_ubicacion'] ?>'><?php echo $p['nombre_ubi']; ?></option>
                    <?php } ?>
                  </select>
                  </td>
                <td style='width:20%'>
                <select class='form-control' id='idnomina'>
                    <option value='0'>-Seleccione Nomina-</option>
                    <?php foreach ($this->nomina as $p) { ?>
                      <option value='<?php echo $p['id_nomina'] ?>'><?php echo $p['nombre_nomina']; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td style='width:20%' class="d-none jq">
                <input type="text" id='jqresguardo' class='form-control'>
                </td>
              </tr>
            </table>

            <br>

            <table style='width:98%;' border='1'>

              <tr class='text-dark' style='background:#AEB6BF;font-weight:bold'>
                <td style='width:25%'>Ingreso al Seniat</td>
                <td style='width:25%'>Ingreso a la Administración Pública</td>
                <td style='width:25%'>Fecha de Notificación</td>
                <td style='width:25%'>Ultima designación</td>
              </tr>
              <tr>
                <td style='width:25%'><input type="date" id='ingresos' class='form-control'></td>
                <td style='width:25%'><input type="date" id='ingresoa' class='form-control'></td>
                <td style='width:25%'><input type="date" id='fechan' class='form-control'></td>
                <td style='width:25%'><input type="date" id='desig' class='form-control'></td>
              </tr>
            </table>
            <br>
            <table style='width:98%;' border='1'>
              <tr class='text-dark' style='background:#AEB6BF;font-weight:bold'>
                <td style='width:25%'>Cargo</td>
                <td style='width:25%'>Procedencia por estado</td>
                <td style='width:25%'>Estado del funcionario</td>
              </tr>
              <tr>
                <td style='width:25%'>                
                <select class='form-control' id='cargo'>
                    <option value='0'>-Seleccione-</option>
                    <?php foreach ($this->cargo as $p) { ?>
                      <option value='<?php echo $p['id_cargo'] ?>'><?php echo $p['nombre_cargo']; ?></option>
                    <?php } ?>
                  </select>
                </td><center></center>
                <td style='width:25%'>
                <select class='form-control' id='ppestado'>
                    <option value='0'>-Seleccione-</option>
                    <?php foreach ($this->pp_estado as $p) { ?>
                      <option value='<?php echo $p['id_estado'] ?>'><?php echo $p['nombre_estado_procedencia']; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td style='width:25%'>
                <select class='form-control' id='estad_funcionario'>
                    <option value='0'>-Seleccione-</option>
                    <?php foreach ($this->estad_funcionario as $p) { ?>
                      <option value='<?php echo $p['id_estado_fun'] ?>'><?php echo $p['nombre_estado']; ?></option>
                    <?php } ?>
                  </select>
              </td>
              </tr>
            </table>
            <br>

            <table style='width:98%;' border='1'>
              <tr class='text-dark' style='background:#AEB6BF;font-weight:bold'>
                <td style='width:25%'>Prima</td>
                <td style='width:25%'>Fideicomiso</td>
                <td style='width:25%'>Declaración Jurada</td>
                <td style='width:25%'>Inscripción IVSS</td>
              </tr>
              <tr>
                <td style='width:25%'>
                  <select class='form-control' id='prima1'>
                    <option value=''>-Seleccione-</option>
                    <option value='Si posee'>Si posee</option>
                    <option value='No posee'>No posee</option>
                  </select>
                </td>
                <td style='width:25%'>
                  <select class='form-control' id='fideicomiso'>
                    <option value=''>-Seleccione-</option>
                    <option value='Si posee'>Si posee</option>
                    <option value='No posee'>No posee</option>
                  </select>
                </td>
                <td style='width:25%'>
                  <select class='form-control' id='declara'>
                    <option value=''>-Seleccione-</option>
                    <option value='Si posee'>Si posee</option>
                    <option value='No posee'>No posee</option>
                  </select>
                </td>
                <td style='width:25%'>
                  <select class='form-control' id='inscripcion_ivss'>
                    <option value=''>-Seleccione-</option>
                    <option value='Si posee'>Si posee</option>
                    <option value='No posee'>No posee</option>
                  </select>
                </td>
              </tr>
            </table>
            <br>
            <span id="validartitulos"></span>
<table style='width:98%' border='1'>

  <tr style='background:#15406D;color:white; font-weight:bold;'>

    <td style='width:50%' class='text-center'>
      <table style='width:100%'>
        <tr>
          <td style='width:20%'>Títulos obtenidos</td>
          <td style='width:60%'>
            <select id='titulos' style='width:100%;'>
              <option value='0'>-Seleccione titulo-</option>
              <?php foreach ($this->titulos as $p) { ?>
                <option value='<?php echo $p['id_proyecto'] ?>'><?php echo $p['nombre_proyecto']; ?></option>
              <?php } ?>
            <textarea type="text" id='descripcion_titulos' class='' placeholder="Descripcion"  style='width:100%;'></textarea>
          </td>
 <!--          <td style='text-align:center;width:10%'>
            <span class='fa fa-plus-square' id='spannewproyect' title="Crear nuevo proyecto" style='font-size:25px;cursor:pointer'></span>
          </td> -->
          <td style='text-align:center;width:10%'>
            <span class='fa fa-plus-circle' id='spanaddtitulo' title="Agregar titulos" style='font-size:25px;cursor:pointer'></span>
          </td>
        </tr>
      </table>
    </td>

  </tr>

  <tr>

    <td style='width:100%'>
      <div style='width:100%;overflow-y:scroll;border-radius:6px;height:200px;' id='titulos_obtenidos'>

    </div>
  </td>
</tr>
</table>
<br>
            
            <span id="validarareas"></span>
<table style='width:98%' border='1'>

  <tr style='background:#15406D;color:white; font-weight:bold;'>

    <td style='width:50%' class='text-center'>
      <table style='width:100%'>
        <tr>
          <td style='width:20%'>Divisiones y áreas</td>
          <td style='width:60%'>
            <select id='nueva_division' style='width:100%;'>
              <option value='0'>-Seleccione División-</option>
              <?php foreach ($this->divisiones as $p) { ?>
                <option value='<?php echo $p['id_division'] ?>'><?php echo $p['nombre_division']; ?></option>
              <?php } ?>
            </select>
            <select id='nueva_areas' style='width:100%;'>
            <option value='0'>-Seleccione Área-</option>
            </select>
            <select id='nuevo_secciones' style='width:100%;'>
              <option value='0'>-Seleccione Sección-</option>
            </select>
          </td>
 <!--          <td style='text-align:center;width:10%'>
            <span class='fa fa-plus-square' id='spannewproyect' title="Crear nuevo proyecto" style='font-size:25px;cursor:pointer'></span>
          </td> -->
          <td style='text-align:center;width:10%'>
            <span class='fa fa-plus-circle' id='spanaddproyect' title="Agregar proyecto" style='font-size:25px;cursor:pointer'></span>
          </td>
        </tr>
      </table>
    </td>

  </tr>

  <tr>

    <td style='width:100%'>
      <div style='width:100%;overflow-y:scroll;border-radius:6px;height:200px;' id='divisionesareas'>

    </div>
  </td>
</tr>
</table>

          </div>
        </center>
      </div>
      <div class="modal-footer ">
        <button type="button" class="btn" style="background:#15406D; color:white" id='guardar_cambios'>Guardar cambios</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->