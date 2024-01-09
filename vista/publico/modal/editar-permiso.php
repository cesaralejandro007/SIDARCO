<div class="modal fade" id="actualizar">
    <div class="modal-dialog modal-lg" ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar datos del permiso</h4>
                <button type="button" onclick="location.reload()" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div> 
            <div class="modal-body">
                <form action="" enctype="multipart/form-data"
                id="formulario" method="POST" name="formulario">
                <div class="form-group row justify-content-center"> 


            <div class="col-md-12 mt-2">
                <label for="segundo_apellido">
                Cédula de la persona
                </label><span id='valid_1' style="color:red;"></span>
                <div class="input-group">
                    <input class="form-control mb-10" id="responsable_familia" disabled oninput="Limitar(this,20);" placeholder="Responsable de familia"
                    type="text" />
                </div>
            </div>
            
            <div class="col-md-6 mt-2">
                <label for="segundo_nombre">
                    Fecha de inicio
                </label><span id='valid_2' style="color:red;"></span>
                <div class="input-group">
                    <input class="form-control" id="fecha_inicio" oninput="Limitar(this,20);"
                    name="datos[fecha_inicio]" type="date" />
                </div>

            </div> 

            <div class="col-md-6 mt-2">
                <label for="primer_apellido">
                  Fecha de cierre
                </label><span id='valid_3' style="color:red;"></span>
                <div class="input-group">
                    <input type="date" class="form-control mb-10" id="fecha_cierre" type="text" >
                </div>

            </div>
            
            <div class="col-md-6 mt-2">
                <label for="segundo_nombre">
                    Motivo
                </label><span id='valid_2' style="color:red;"></span>
                <div class="input-group">
                    <input class="form-control" id="motivo" oninput="Limitar(this,20);"
                    name="datos[motivo]" type="text" >
                </div>

            </div>
            
            <div class="col-md-6 mt-2">
                <label for="segundo_nombre">
                    Tipo de permiso
                </label><span id='valid_2' style="color:red;"></span>
                <div class="input-group">
                    <select class="form-control" id="tipo_permiso" name="datos[tipo_permiso]" type="text">
                        <option value="0">-Seleccione</option>
                        <option value=""></option>
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
    <input type="submit" class="btn" style="background:#15406D;color:white"  name="" id="enviar" value="Guardar">
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
