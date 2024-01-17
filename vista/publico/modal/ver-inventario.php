<div class="modal fade" id="ver">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ver datos de inventario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
            <form action="<?php echo constant('URL'); ?>Inventario/Nuevo_Inmueble" enctype="multipart/form-data"
                id="formulario" method="POST" name="formulario">
                <!-- card-body -->
                <div class="card-body">
                    <div class="card-block">
                        <div class="form-group row justify-content-center">

                            <div class="col-md-6 mt-2">
                                <label for="medicamento">
                                    Medicamento 
                                </label>
                                <div class="input-group">
                                <input disabled class="form-control mb-10" id="medicamento" name="datos[medicamento]"
                                        placeholder="" type="text"  />
                                </div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="unidades">
                                    Unidades
                                </label>
                                <div class="input-group">
                                    <input disabled class="form-control mb-10" id="unidades" name="datos[unidades]"
                                        placeholder="" type="text" />
                                </div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="id_grupo">
                                    Grupo
                                </label>
                                <div class="input-group">
                                    <input disabled class="form-control mb-10" id="id_grupo" name="datos[id_grupo]"
                                        placeholder="" type="text" />
                                </div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="caducidad">
                                    Caducidad
                                </label>
                                <div class="input-group">
                                <input disabled class="form-control mb-10" id="caducidad" name="datos[caducidad]"
                                        placeholder="" type="text" />
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="lote">
                                    Lote
                                </label>
                                <div class="input-group">
                                    <input type="text" id="lote" name="datos[lote]" class="form-control">
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                
            </form>
            </div>
            <div class="modal-footer ">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->