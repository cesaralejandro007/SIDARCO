<?php include (call."Inicio.php"); ?> 
<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registrar referencia</h1>
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
                 <!--    <div class="col-md-6 mt-2">
                                <label for="">Seleccione</label>
                                <span style='display:none;color:red' id='valid_50'>Campo sin llenar</span>
                                <table style='width:100%'>
                                    <tr>
                                        <td>
                                            <select class="form-control" id="estado"
                                                style="width: 100%">
                                                <option value='vacio'>-Seleccione-</option>
                                                <option value="1">
                                                Sí
                                                </option>
                                                <option value="2">
                                                No
                                                </option>
                                            </select>
                                        </td> 
                                        <td>
                                            
                                        </td>
                                
                                        
                                        <td style='display:none;' id='ver_estado'>  
                                             <div class="input-group"> 
                                            <span style='display:none;color:red' id='valid_51'>Campo sin llenar</span>
                        
                                        </td>

                                    
                                        
                                    </tr>
                                </table>
                            </div>  -->


                 <!--    <div>

                        <label for="cedula_persona">Cédula del funcionario/a</label>
                    <select name="datos[cedula_persona]" id="cedula_persona" class="form-control">
                        <option value="0">-Selecciona la funcionario</option>
                        <?php  foreach($this->datos["familia_personas"] as $cedula) {?>
                        <option value='<?php echo $cedula['cedula_persona'];?>'><?php echo $cedula['cedula_persona']?></option>
                        <?php }?>

                    </select>

                    <span id="mensaje_cedula"></span>

                    </div> -->

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
        
                            <div class="col-md-4 mt-2">
                                <label for="examen">
                                Examen solicitado
                                </label>
                                <div class="input-group">
                                    <textarea class="form-control mb-10" id="examen" name="datos[examen]"
                                        placeholder="Escriba el informe a solicitar" height="500px" width=""></textarea>
                                <!--   <input  type="text" onkeyup="Filtro(this,'-',RIF,false)" oninput="Limitar(this,12);"/> -->
                            </div>
                        <span id="mensaje_examen"></span>
                        </div>
                        <div class="col-md-4 mt-2">
                                <label for="informe">
                                Informe de referencia
                                </label>
                                <div class="input-group">
                                    <textarea class="form-control mb-10" id="informe" name="datos[informe]"
                                        placeholder=" Informe de referencia" height="500px" width=""></textarea>
                                <!--   <input  type="text" onkeyup="Filtro(this,'-',RIF,false)" oninput="Limitar(this,12);"/> -->
                            </div>
                        <span id="mensaje_referencia"></span>

                        </div>

                        <div class="col-md-4 mt-2">
                                <label for="diagnostico">
                                    Diagnostico
                                </label>
                                <div class="input-group">
                                    <textarea class="form-control mb-10" id="diagnostico" name="datos[diagnostico]"
                                        placeholder=" Describa el diagnostico" height="500px" width=""></textarea>
                                <!--   <input  type="text" onkeyup="Filtro(this,'-',RIF,false)" oninput="Limitar(this,12);"/> -->
                            </div>
                        <span id="mensaje_diagnostico"></span>
                        </div>




                            <div class="col-md-4 mt-2">
                                <label for="fecha_referencia">
                                    Fecha de orden
                                </label>
                                <div class="input-group">
                                
                                    <input class="form-control " id="fecha_referencia" name="datos[fecha_referencia]" type="date" oninput="Limitar(this,30);" />
                                    <!-- <button type="button" class="btn btn-default" id='fecha_actual'>Fecha actual</button> -->
                                </div>
                                <span id="mensaje_fecha_orden"></span>
                            </div>
                        
                        
                            <div class="col-md-4 mt-2">
                                <label for="id_especialidad">
                                    Referido a
                                </label>
                                <div class="form-group">
                                    <select name="datos[id_especialidad]" id="id_especialidad"  class='form-control form-select-lg mb-3' aria-label="Large select example">
                                        <option value='0' selected>-Seleccione una especialidad</option>
                                    <?php  foreach($this->datos["especialidades"] as $esp) {?>
                                    <option value="<?php echo $esp["id_especialidad"]?>"><?php  echo $esp["nombre_especialidad"]?> </option>
                                <?php }?>
                                </select>
                                </div>
                                <span id="mensaje_referido"></span>
                            </div>

                            <div class="col-md-4 mt-2">
                                <label for="ubicacion">
                                    Ubicado en:
                                </label>
                                <div class="form-group">
                                    <input class="form-control  mb-10" id="ubicacion" name="datos[ubicacion]"
                                        placeholder="Ubicación" type="text" oninput="Limitar(this,30);" />
                                </div>
                                <span id="mensaje_ubicacion"></span>
                            </div>
                            </div>
                            
                            
                            
                    
                                        <br>
<!-- 
                                        <div class="col-md-6 mt-2">
                                                <label for="segundo_apellido">
                                                    Medicamentos recetados
                                                </label><span id='valid_5' style="color:red;"></span>
                                                <div class="input-group">
                                                <table style='width:100%'>
                                                    <tr>
                                                        <td>-->
                                                    <!--  <input type="text" class='form-control letras_numeros' id='inventario' placeholder="Buscar medicamento"  list='lista_persona' name="datos[id_inventario]" oninput="Limitar(this,15)"> 
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
<script src="<?php echo constant('URL')?>config/js/news/registrar_referencias.js"></script> 
<?php include (call."Fin.php"); ?>
<?php include (call."Style-seguridad.php"); ?>

