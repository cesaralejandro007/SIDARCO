<div class="modal fade" id="actualizar">
    <div class="modal-dialog modal-lg" style="max-width:98%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Datos de Familia</h4>
                <button type="button" onclick="location.reload()" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div> 
            <div class="modal-body">
                <form action="" enctype="multipart/form-data"
                id="formulario" method="POST" name="formulario">
                <div class="form-group row justify-content-center"> 

             <div class="col-md-6 mt-2">
                <label for="segundo_nombre">
                    Nombre de familia
                </label><span id='valid_2' style="color:red;"></span>
                <div class="input-group">
                    <input class="form-control mb-10 solo-letras" id="nombre_familia" oninput="Limitar(this,20);"
                    name="datos[nombre_familia]" placeholder="Nombre de la familia"
                    type="text" />
                </div>

            </div>

            <div class="col-md-6 mt-2">
                <label for="segundo_apellido">
                    Responsable de familia
                </label><span id='valid_4' style="color:red;"></span>
                <div class="input-group">
                    <input class="form-control mb-10" id="responsable_familia" disabled oninput="Limitar(this,20);" placeholder="Responsable de familia"
                    type="text" />
                </div>
            </div>
            <div class="col-md-12 mt-2">
                <label for="primer_apellido">
                   Descripción de familia
                </label><span id='valid_3' style="color:red;"></span>
                <div class="input-group">
                    <textarea class="form-control mb-10" id="descripcion_familia" placeholder="Descripción..." rows="2">
                    </textarea>    
                </div>

            </div>


            <div class="col-md-12 mt-2">
            <center><div class="col-6" id='valid_5' style="color:red;"></div></center>
            <div class="input-group">
               <table class ="table">
                <tr style="background:#15406D;color:white">
                    <td>
                        <label for="segundo_apellido">
                        Integrantes
                        </label>
                    </td>
                    <td>
                        <input type="number" class='form-control' id='integrante_input' placeholder="Buscar cédula" name="" list='lista_personas'>
                        <datalist id='lista_personas'>
                            <?php foreach ($this->personas as $p) { ?>
                             <option value='<?php echo $p['cedula_integrante']; ?>'><?php echo $p['primer_nombre']." ".$p['primer_apellido']; ?></option>
                         <?php    } ?>
                     </datalist>
                 </td> 
                 <td>
                    <select class="custom-select" id="parentezco"
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
                    </select>
                </td>
                <td class="">
                <span class='fa fa-plus-circle' id='btn_agregar' title="Agregar familia" style='font-size:34px;cursor:pointer'></span>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                <div class="col-12" style='overflow-y: scroll;width: 100%;height:200px;'>
                    <center>
                        <div style='width:100%' id='integrantes_agregados'></div>
                    </center>
                </div>
                </td>
            </tr>
            
                
            </table>
        </div>

            

</div>

</div>
</form>
</div>
<div class="modal-footer ">
    <input type="submit" class="btn" style="background:#15406D;color:white"  name="" id="enviar" value="Guardar">
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
