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
            <label for="id_ubicacion" >Cédula del Funcionario o funcionaria</label>
            
            <table style='width:100%'>
                    <!--<tr><td style='width:120%'> -->

                <div class="col-md-12">
                    <!-- <label>Ubicación</label> -->
                    <span id='valid_enfermedad' style='color:red'></span>
                    <table style='width:100%'>
                        <tr>
                            <td class="col-md-6 p-0">
                                <select class='form-control no-simbolos mt-2' id='id_familia_persona' name="datos[id_familia_persona]" style="width: 100%">
                                    <option value='0' >-Seleccione Funcionario/a-</option>
                                    <?php foreach($this->datos["familia_personas"] as $p) {?>
                                        <option value='<?php echo $p['id_familia_persona']; ?>'><?php echo $p['cedula_persona']." ".$p["primer_nombre"]." ".$p["primer_apellido"]; ?></option>
                                    <?php }?>
                                </select>
                                <span id="mensaje_cedula"></span>
                            </td>
                            <td class="col-md-5 p-0">
                                <select class='form-control no-simbolos mt-2' id='id_familia' name="datos[id_familia]" style="width: 100%">
                                    <option value='0' >-Seleccione familiar-</option>
                                </select>
                            </td>
                        
                        <!--  <td class="p-0">
                                <button id='agregar_ubicacion' class="btn btn-info mt-2" type="button">Agregar</button>&nbsp;&nbsp;
                            </td> -->
                        </tr>
                    </table>
                            <!-- <div class="col-md-10 mt-2" style='border-radius: 6px;overflow-y: scroll;background: #CFFEDE; width: 800;height: 200px !important' id='ubicaciones_personas'> -->
                            <!-- </div> -->
                    <!-- <div class="col-md-12 mt-2" style='border-radius: 6px;overflow-y: scroll;background: #CEF6F5;width: 100%;height: 200px !important' id='ubicaciones_persona'>
                    </div> -->
                </div>
            </div>  

                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <label for="direccion">
                                    Fecha de consulta
                                </label>
                                <div class="input-group">
                                
                                <input class="form-control " id="fecha_consulta" name="datos[fecha_consulta]" type="date" oninput="Limitar(this,30);" />
                                <!-- <button type="button" class="btn btn-default" id='fecha_actual'>Fecha actual</button> -->
                                </div>
                                <span id="mensaje_fecha_consulta"></span>
                            </div>
                        
            

                            <div class="col-md-6 mt-2">
                                <label for="nombre_negocio">
                                    Motivo de consulta
                                </label>
                                <div class="form-group">
                                    <input class="form-control  mb-10" id="motivo" name="datos[motivo]"
                                        placeholder="Motivo de consulta" type="text" oninput="Limitar(this,30);" />
                                </div>
                                <span id="mensaje_motivo"></span>
                            </div>
                            </div>
                            
                            
                            
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <label for="rif_negocio">
                                Instrucciones
                                </label>
                                <div class="input-group">
                                    <textarea class="form-control mb-10" id="instrucciones" name="datos[instrucciones]"
                                        placeholder="Tratamiento a seguir" height="500px" width=""></textarea>
                                <!--   <input  type="text" onkeyup="Filtro(this,'-',RIF,false)" oninput="Limitar(this,12);"/> -->
                            </div>
                        <span id="mensaje_instruc"></span>
                        </div>
                                        <br>

                                        <div class="col-md-6 mt-2">
                                                <label for="segundo_apellido">
                                                    Medicamentos recetados
                                                </label><span id='valid_5' style="color:red;"></span>
                                                <div class="input-group">
                                                <table style='width:100%'>
                                                    <tr>
                                                        <td>
                                                       <!--  <input type="text" class='form-control letras_numeros' id='inventario' placeholder="Buscar medicamento"  list='lista_persona' name="datos[id_inventario]" oninput="Limitar(this,15)"> -->
                                                            <select aria-label="Default select example" id="inventario" class='form-control no-simbolos'>
                                                            <option value='vacio'> Medicamentos </option> 
                                                                <?php foreach ($this->datos["inventario"] as $inv) { ?>
                                                                <option value='<?php echo $inv['id_inventario'];?>'><?php echo $inv['medicamento']; ?></option>
                                                            <?php    } ?>
                                                                </select>
                                                        
                                                        </td>
                                                        <td><button class='btn btn-primary' type='button' id='btn_agregar'>Agregar</button>&nbsp;&nbsp;<button class='btn btn-info' type='button' id='btn_nuevo'>Nuevo</button></td>
                                                    </tr>
                                                    <tr><td colspan='2'><br>
                                                        <div style='background:#D4E6F4;overflow-y: scroll;width: 80%; height:100px;'><center>
                                                            <div style='width:100%' id='medi_agrega'></div>
                                                        </center>
                                                        </div>
                                                    </td>
                                                </table>
                                                </div>

                                        </div> 
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

