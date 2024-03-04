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
                    <div class="col-md-6 mt-2">
                    
                            
                    
                            </div> 


                            <div class="col-md-12">
                         <label>Cédula de funcionario/a</label> <span id='valid_persona' style='color:red'></span>
                         <table style='width:100%'><tr><td>
                             <input type="number" id="cedula_persona" maxlength="15" placeholder="Buscar cédula" class='form-control no-simbolos letras_numeros' id='persona' name="" list='lista_personas' oninput="Limitar(this,15)">

                             <datalist id='lista_personas'>
                                 <?php foreach ($this->datos["personas"] as $p) { ?>
                                     <option value='<?php echo $p['cedula_persona'];?>'><?php echo $p['primer_nombre']." ".$p['segundo_nombre']; ?></option>
                                 <?php   } ?>
                             </datalist></td>
   
                         </tr>
                         <span id="mensaje_cedula"></span>
                        </table>

                     </div>



                        <div class="form-group row justify-content-center">

                        <div class="col-md-12 mt-2">                                
        
                </div>
            </div>  

                         <div class="row">
                         <div class="col-md-6 mt-2">
                                <label for="motivo">
                                    Motivo de consulta
                                </label>
                                <div class="form-group">
                                    <input class="form-control  mb-10" id="motivo" name="datos[motivo]"
                                        placeholder="Motivo de consulta" type="text" oninput="Limitar(this,30);" />
                                </div>
                                <span id="mensaje_motivo"></span>
                            </div>
                         <div class="col-md-6 mt-2">
                                <label for="instrucciones">
                                Instrucciones
                                </label>
                                <div class="input-group">
                                    <textarea class="form-control mb-10" id="instrucciones" name="datos[instrucciones]"
                                        placeholder="Tratamiento a seguir" height="500px" width=""></textarea>
                                <!--   <input  type="text" onkeyup="Filtro(this,'-',RIF,false)" oninput="Limitar(this,12);"/> -->
                            </div>
                        <span id="mensaje_instruc"></span>
                        </div> 
                        
            

                           
                            </div>
                            
                            
                            
                        <div class="row">
                            
                                        <br>
                                        <div class="col-md-6 mt-2">
                                                <label for="inventario">
                                                    Medicamentos recetados
                                                </label><span id='valid_5' style="color:red;"></span>
                                                <div class="input-group">
                                                <table style='width:100%'>
                                                    <tr>
                                                        <td>
                                                        <!--  <input type="text" class='form-control letras_numeros' id='inventario' placeholder="Buscar medicamento"  list='lista_persona' name="datos[id_inventario]" oninput="Limitar(this,15)"> -->
                                                            <select aria-label="Default select example" id="id_inventario" name="datos[id_inventario]" class='form-control no-simbolos'>
                                                            <option value='vacio'>-Selecciones el medicamento</option> 
                                                                <?php foreach ($this->datos["inventario"] as $inv) { ?>
                                                                <option value='<?php echo $inv['id_inventario'];?>'><?php echo $inv['medicamento']; ?></option>
                                                            <?php } ?>
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

