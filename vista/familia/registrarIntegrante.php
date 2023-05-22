<?php include (call."Inicio.php"); ?> 
<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registrar Integrantes</h1>
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
                <h3 class="card-title">Formulario de Registro</h3>
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
                                                <label for="cedula">
                                                Documento de identidad            
                                                   </label> <span style='color:red;display:none' id='valid_1'>Ingrese el documento de identidad</span>
                                                <div class="input-group">
                                                    <input class="form-control input-numero solo-numeros" id="cedula"
                                                    name="datos[cedula]" placeholder="Cedula de identidad"
                                                    type="number" oninput="Limite(this,8)"/>
                                                </div>
                                            </div>

                                            <div class="col-md-3 mt-4">
                                                <label for="primer_nombre">
                                                    Primer nombre
                                                </label>
                                                <span style='display:none;color:red' id='valid_2'>Ingrese el primer nombre</span>
                                                <div class="input-group">
                                                    <input class="form-control mb-10 solo-letras" id="primer_nombre"
                                                    name="datos[primer_nombre]" placeholder="Primer Nombre"
                                                    type="text" oninput="Limitar(this,15)"/>
                                                </div>

                                            </div>

                                            <div class="col-md-3 mt-4">
                                                <label for="segundo_nombre">
                                                    Segundo nombre
                                                </label>
                                                <span style='display:none;color:red' id='valid_3'>Ingrese el segundo nombre</span>
                                                <div class="input-group">
                                                    <input class="form-control mb-10 solo-letras" id="segundo_nombre"
                                                    name="datos[segundo_nombre]" placeholder="Segundo Nombre"
                                                    type="text" oninput="Limitar(this,15)" />
                                                </div>

                                            </div>

                                            <div class="col-md-3 mt-2">
                                                <label for="primer_apellido">
                                                    Primer apellido
                                                </label>
                                                <span style='display:none;color:red' id='valid_4'>Ingrese el primer apellido</span>
                                                <div class="input-group">
                                                    <input class="form-control mb-10 solo-letras" id="primer_apellido"
                                                    name="datos[primer_apellido]" placeholder="Primer Apellido"
                                                    type="text" oninput="Limitar(this,15)"/>
                                                </div>

                                            </div>

                                            <div class="col-md-3 mt-2">
                                                <label for="segundo_apellido">
                                                    Segundo apellido
                                                </label>
                                                <span style='display:none;color:red' id='valid_5'>Ingrese el segundo apellido</span>
                                                <div class="input-group">
                                                    <input class="form-control mb-10 solo-letras" id="segundo_apellido"
                                                    name="datos[segundo_apellido]" placeholder="Segundo Apellido"
                                                    type="text" oninput="Limitar(this,15)"/>
                                                </div>

                                            </div>

                                            <div class="col-md-3 mt-2">
                                                <div class="form-group">
                                                    <label for="fecha_nacimiento">
                                                        Fecha De Nacimiento 
                                                    </label> <span style='display:none;color:red' id='valid_6'>Ingrese la fecha de nacimiento</span>
                                                    <input class="form-control" id="fecha_nacimiento"
                                                    name="fecha_nacimiento" type="date">
                                                </input>
                                            </div>

                                        </div>


                                        <div class="col-md-3 mt-2">
                                            <label for="genero">
                                                Género
                                            </label>
                                            <span style='display:none;color:red' id='valid_7'>Ingrese el género</span>
                                            <div class="input-group">
                                                <select class="custom-select" id="genero" name="datos[genero]">
                                                    <option selected="" value="vacio">
                                                        -Seleccione-
                                                    </option>
                                                    <option value="M">
                                                        Femenino
                                                    </option>
                                                    <option value="F">
                                                        Masculino
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                    <div class="col-md-3 mt-2">
                                        <label for="nacionalidad">
                                            Nacionalidad
                                        </label>
                                        <span style='display:none;color:red' id='valid_8'>Ingrese la nacionalidad</span>
                                        <div class="input-group">
                                            <input class="form-control mb-10 solo-letras" id="nacionalidad"
                                            name="datos[nacionalidad]" value=" Venezolana" placeholder="Nacionalidad" type="text" oninput="Limitar(this,15)"  />
                                        </div>

                                    </div>

                                    <div class="col-md-3 mt-2">
                                        <label for="nivel_educativo">
                                            Nivel Educativo
                                        </label>
                                        <span style='display:none;color:red' id='valid_9'>Ingrese el nivel educativo</span>
                                        <div class="input-group">
                                            <select class='form-control' name="datos[nivel_educativo]" id='nivel_educativo'>
                                                <option value='vacio'>-Seleccione-</option>
                                                <option value='Preescolar'>Bachiller</option>
                                                <option value='Medio diversificado'>Profesional</option>
                                
                                            </select>
                                           
                                        </div>
                                    </div>

                       
                                
<!------------------------------------------------------------------------------------------------------------------------> 
           <!--                  <div class="col-md-6 mt-2">
                                <label for="direccion">
                                    Direccion de Negocio
                                </label>
                                <div class="input-group">
                                    <input class="form-control no-simbolos mb-10 letras_numeros" id="direccion" name="datos[direccion_negocio]"
                                        placeholder="Direccion de Negocio" type="text" oninput="Limitar(this,30);" />
                                </div>
                                <span id="mensaje_direccion"></span>
                            </div>

                            <div class="col-md-12 mt-2">
                                <label for="nombre_negocio">
                                    Nombre de Negocio
                                </label>
                                <div class="input-group">
                                    <input class="form-control letras_numeros mb-10" id="nombre_negocio" name="datos[nombre_negocio]"
                                        placeholder="Nombre de Negocio" type="text" oninput="Limitar(this,30);" />
                                         
                                </div>
                                <span id="mensaje_negocio"></span>
                            </div>
                            
                            <div class="col-md-6 mt-2">
                                <label for="cedula_propietario">
                                    Propietario
                                </label>
                                <div class="input-group">
                                    <input list="cedula" id="cedula_propietario" name="datos[cedula_propietario]"
                                        class="form-control no-simbolos letras_numeros" placeholder="Cedula" oninput="Limitar(this,15);"/>
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
                                <label for="rif_negocio">
                                    Rif del Negocio
                                </label>
                                <div class="input-group">
                                    <input class="form-control mb-10 letras_numeros" id="rif_negocio" name="datos[rif_negocio]"
                                        placeholder="Rif del Negocio" type="text" onkeyup="Filtro(this,'-',RIF,false)" oninput="Limitar(this,12);"/>
                                </div>
                                <span id="mensaje_rif"></span>
                            </div>
                
                        </div>
                    </div>

                </div>
                /.card-body 
                <div class="card-footer">
                    <div class="text-center m-t-20">
                        -->
                        <div class="col-xs-12">
                            <input type="button" class="btn" style="background:#15406D; color:white" name="" id="enviar" value="Guardar">
                            
                        </div>
                    </div>
                </div> 

<!------------------------------------------------------------------------------------------------------------------------------------------------------->              
            </form>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="<?php echo constant('URL')?>config/js/news/registrar_integrantes.js"></script> 
<?php include (call."Fin.php"); ?>
<?php include (call."Style-seguridad.php"); ?>

