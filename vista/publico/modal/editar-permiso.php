<div class="modal fade" id="actualizar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar datos del permiso</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div> 
            <div class="modal-body">
                <form action="" enctype="multipart/form-data"
                id="formulario" method="POST" name="formulario">
                <div class="form-group row justify-content-center"> 


            <div class="col-md-12 mt-2">
                <div class="input-group">
                    <input list="cedula_p" id="cedula_persona_editar" class="form-control no-simbolos letras_numeros" placeholder="Cedula de Persona" oninput="Limitar(this,15)"/>
                    <datalist id="cedula_p">
                        <?php foreach ($this->personas as $persona) {   ?>
                            <option value="<?php echo $persona["cedula_persona"]; ?>">
                                <?php echo $persona["primer_nombre"] . " " . $persona["primer_apellido"]; ?>
                            </option>
                        <?php  }  ?>
                    </datalist>
                </div>
            </div>
            
            <div class="col-md-6 mt-2">
                <label for="fecha_inicio">
                    Fecha de inicio
                </label><span id='valid_2' style="color:red;"></span>
                <div class="input-group">
                    <input class="form-control" id="fecha_inicio_editar" oninput="Limitar(this,20);"
                    name="datos[fecha_inicio]" type="date" />
                </div>

            </div> 

            <div class="col-md-6 mt-2">
                <label for="fecha_cierre">
                Fecha de cierre
                </label><span id='valid_3' style="color:red;"></span>
                <div class="input-group">
                    <input type="date" class="form-control mb-10" id="fecha_cierre_editar" name="datos[fecha_cierre]" type="text" >
                </div>
            </div>
            
            <div class="col-md-6 mt-2">
                <label for="motivo">
                    Motivo
                </label><span id='valid_4' style="color:red;"></span>
                <div class="input-group">
                    <input class="form-control" id="motivo_editar" oninput="Limitar(this,20);"
                    name="datos[motivo]" type="text" >
                </div>

            </div>
            
            <div class="col-md-6 mt-2">
                <label for="tipo_permiso_editar">
                    Tipo de permiso
                </label><span id='valid_5' style="color:red;"></span>
                <div class="input-group">
                    <select class="form-control" id="tipo_permiso_editar" name="datos[tipo_permiso]" type="text" style="width: 360px; height: 37px ;">
                         <option value="0">-Seleccione-</option>
                        <?php foreach($this->tipo_permisos as $pr) {?>
                        <option value="<?php echo $pr["tipo_permiso"]; ?>"><?php echo $pr["nombre_permiso"];?></option>
                        <?php }?> 
                    </select>
                </div>
            </div>
        <div class="col-md-12 mt-2">
    <div class="input-group">       
</div>

</div>

</div>
</form>
</div>
<div class="modal-footer ">
    <input type="submit" class="btn" style="background:#15406D;color:white; display: block; margin: 0 auto;"  name="" id="enviar_actualizacion" value="Guardar">
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->



