<div class="modal fade" id="actualizar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar datos de inventario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                <form action="" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                    <!-- card-body -->
                    <div class="card-body">
                        <div class="card-block">
                            <div class="form-group row justify-content-center">

                                <div class="col-md-6 mt-2">
                                    <label for="medicamento_2">
                                        Medicamento
                                    </label>
                                    <div class="input-group">
                                        <select class="custom-select" id="medicamento_2" name="datos[medicamento]">
                                        <option>
                                           Seleccione ...
                                        </option>
                                    <?php foreach($this->datos["calle"] as $calles){   ?>
                                        <option value="<?php echo $calles["id_calle"];?>">
                                            <?php echo $calles["nombre_calle"];?>
                                        </option>
                                    <?php  }   ?>
                                    </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="unidades_2">
                                        Unidades
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control no-simbolos mb-10" id="unidades_2"
                                            name="datos[unidades]" placeholder="Nombre de Inmueble"
                                            type="text" oninput="Limitar(this,25)"/>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="id_grupo_2">
                                        Grupo
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control no-simbolos mb-10" id="id_grupo_2"
                                            name="datos[id_grupo]" placeholder="Direccion" type="text" />
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="caducidad_2">
                                        Caducidad
                                    </label>
                                    <div class="input-group">
                                        <input type="date" id="caducidad_2" name="datos[caducidad]" class="form-control no-simbolos solo-letras" placeholder="Tipo de Inmueble" oninput="Limitar(this,20)" />
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="lote_2">
                                        Lote
                                    </label>
                                    <div class="input-group">
                                        <input type="text" id="lote_2" name="datos[lote]" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                </form>
            </div>
            <div class="modal-footer ">
                <input type="button" class="btn" style="background:#15406D; color:white" name="" id="enviar" value="Guardar">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->