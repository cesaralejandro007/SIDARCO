<?php include (call."Inicio.php"); ?> 
<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registrar consulta</h1>
                </div><!-- /.col -->
                <!-- /.col -->
            </div><!-- /.row --> 
        </div><!-- /.container-fluid --> 
    </div>
    <!-- /.content-header --> 
    
    <!-- Main content -->
    <section class="content"> 
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Formulario de registro</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <form action="" enctype="multipart/form-data" id="formulario" method="POST" name="formulario" >
                <!-- card-body -->
                <div class="card-body">

                    <div class="card-block">
                        <div class="form-group row justify-content-center">
                        <div class="col-md-12 mt-2">                                
            <label for="id_ubicacion" >Ubicación del funcionario o funcionaria</label>
            <span style='display:none;color:red' id='valid_43'>Ingrese la ubicación</span>
            <table style='width:100%'>
                    <!--<tr><td style='width:120%'> -->
                <div class="col-md-12">
                    <!-- <label>Ubicación</label> -->
                    <span id='valid_enfermedad' style='color:red'></span>
                    <table style='width:100%'>
                        <tr>
                            <td class="col-md-6 p-0">
                                <select class='form-control no-simbolos mt-2' id='cedula_persona' name="datos[cedula_persona]" style="width: 100%">
                                    <option value='0' >-Seleccione Funcionario/a-</option>
                                    <?php foreach($this->datos["personas"] as $p) {?>
                                        <option value='<?php echo $p['cedula_persona']; ?>'><?php echo $p['cedula_persona']." ".$p["primer_apellido"]; ?></option>
                                    <?php }?>
                                </select>
                            </td>
                            <td class="col-md-5 p-0">
                                <select class='form-control no-simbolos mt-2' id='id_familia' name="datos[id_familia]" style="width: 100%">
                                    <option value='0' >-Seleccione familiar-</option>
                                </select>
                            </td>
                          
                            <td class="p-0">
                                <button id='agregar_ubicacion' class="btn btn-info mt-2" type="button">Agregar</button>&nbsp;&nbsp;
                            </td>
                        </tr>
                    </table>
                            <!-- <div class="col-md-10 mt-2" style='border-radius: 6px;overflow-y: scroll;background: #CFFEDE; width: 800;height: 200px !important' id='ubicaciones_personas'> -->
                            <!-- </div> -->
                    <!-- <div class="col-md-12 mt-2" style='border-radius: 6px;overflow-y: scroll;background: #CEF6F5;width: 100%;height: 200px !important' id='ubicaciones_persona'>
                    </div> -->
                </div>
            </div>  


                        <!-- <div class="col-md-6 mt-2">
                                <label for="cedula_propietario">
                                    Funcionaria/o
                                </label>
                                <div class="input-group">
                                    <input list="cedula" id="cedula_propietario" name="datos[cedula_propietario]"
                                        class="form-control no-simbolos letras_numeros" placeholder="Cedula" oninput="Limitar(this,15);" />
                                    <datalist id="cedula">
                                        <?php foreach($this->datos["personas"] as $persona){   ?>
                                        <option value="<?php echo $persona["cedula_persona"];?>">
                                            <?php echo $persona["primer_nombre"]." ".$persona["primer_apellido"];?>
                                        </option>
                                    <?php  }   ?>
                                    </datalist>
                                    
                                </div>
                                <span id="mensaje_cedula"></span>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="id_calle">
                                    Familiar
                                </label>
                                <div class="input-group">
                                    <select class="custom-select" id="id_calle" name="datos[id_calle]">
                                        <option value="0">
                                           Seleccione ...
                                        </option>
                                    <?php foreach($this->datos["calle"] as $calles){   ?>
                                        <option value="<?php echo $calles["id_calle"];?>">
                                            <?php echo $calles["nombre_calle"];?>
                                        </option>
                                    <?php  }   ?>
                                    </select>
                                    
                                </div>
                                <span id="mensaje_calle"></span>
                            </div> -->

                           
                            <div class="col-md-6 mt-2">
                                <label for="direccion">
                                    Fecha de consulta
                                </label>
                                <div class="input-group">
                                    <input class="form-control no-simbolos mb-10 letras_numeros" id="fecha" name="datos[fecha_consulta]"
                                         type="date" oninput="Limitar(this,30);" />
                                </div>
                                <span id="mensaje_direccion"></span>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="nombre_negocio">
                                    Motivo de consulta
                                </label>
                                <div class="input-group">
                                    <input class="form-control letras_numeros mb-10" id="motivo" name="datos[motivo]"
                                        placeholder="Motivo de consulta" type="text" oninput="Limitar(this,30);" />
                                         
                                </div>
                                <span id="mensaje_negocio"></span>
                            </div>
                            
                      

                            <div class="col-md-12 mt-2">
                                <label for="rif_negocio">
                                   Instrucciones
                                </label>
                                <div class="input-group">
                                    <textarea class="form-control mb-10 letras_numeros" id="instrucciones" name="datos[instrucciones]"
                                        placeholder="Tratamiento a seguir"></textarea>
                                  <!--   <input  type="text" onkeyup="Filtro(this,'-',RIF,false)" oninput="Limitar(this,12);"/> -->
                                </div>
                                <span id="mensaje_rif"></span>
                            </div>
                
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="text-center m-t-20">
                        <div class="col-xs-12">
                            <input type="button" class="btn" style="background:#15406D; color:white" name="" id="enviar" value="Guardar">
                            
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="<?php echo constant('URL')?>config/js/news/registrar_consultas.js"></script> 
<?php include (call."Fin.php"); ?>
<?php include (call."Style-seguridad.php"); ?>

