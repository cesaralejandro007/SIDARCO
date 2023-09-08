<?php include (call."Inicio.php"); ?>
<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registrar Personas</h1>
                </div><!-- /.col -->
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <input type="hidden" value='<?php echo json_encode($_SESSION['Seguridad']); ?>' id='seguridad_usuario' name="">
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
             <div class="card-header">
                <h3 class="card-title">Formulario de Registro</h3>
                
            </div>
            <form action="<?php echo constant('URL'); ?>Personas/Nuevo_Persona" enctype="multipart/form-data"
                id="formulario" method="POST" name="formulario">
                <!-- card-body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="vtabs">
                                <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                    <li class="nav-item" style="margin-top: 50%; margin-bottom: 50%;">
                                        <a class="nav-link active" id='tab_1'>
                                            <span class="hidden-sm-up">
                                                <i class="ti-home"></i>
                                            </span>
                                            <span class="hidden-xs-down">
                                                Información Personal
                                            </span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item" style="margin-top: 50%; margin-bottom: 50%;">
                                        <a id='tab_2' >
                                            <span class="hidden-sm-up">
                                                <i class="ti-user"></i>
                                            </span>
                                            <span class="hidden-xs-down">
                                                Información de Contacto
                                                <!--carnets-->
                                            </span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item" style="margin-top: 50%; margin-bottom: 50%;">
                                        <a id='tab_3' >
                                            <span class="hidden-sm-up">
                                                <i class="ti-email"></i>
                                            </span>
                                            <span class="hidden-xs-down">
                                                
                                                Información Laboral
                                                <!--DATOS DE CONTACTO-->
                                                
                                            </span>
                                        </a>
                                    </li>

                                    <!--
                                    <li class="nav-item" style="margin-top: 50%; margin-bottom: 50%;">
                                        <a id='tab_3' >
                                            <span class="hidden-sm-up">
                                                <i class="ti-email"></i>
                                            </span>
                                            <span class="hidden-xs-down">
                                                Información política
                                            </span>
                                        </a>
                                    </li>
--><!--
                                    <li class="nav-item" style="margin-top: 50%; margin-bottom: 50%;">
                                        <a id='tab_5'>
                                            <span class="hidden-sm-up">
                                                <i class="ti-email"></i>
                                            </span>
                                            <span class="hidden-xs-down">
                                                Información laboral
                                            </span>
                                        </a>
                                    </li>
-->
                                    <li class="nav-item" style="margin-top: 50%; margin-bottom: 50%;">
                                        <a id='tab_4'>
                                            <span class="hidden-sm-up">
                                                <i class="ti-email"></i>
                                            </span>
                                            <span class="hidden-xs-down">
                                                Información de usuario
                                            </span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="panel1" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h2>
                                                    Información  Personal
                                                </h2>
                                            </div>
                                            
                                            <div class="col-md-12 mt-2">
                                                <label for="cedula">
                                                Documento de identidad </label> <span style='color:red;display:none' id='valid_1'>Ingrese el documento de identidad</span>
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
                                                
                                                <div class="input-group">
                                                    <input class="form-control mb-10 solo-letras" id="primer_nombre"
                                                    name="datos[primer_nombre]" placeholder="Primer Nombre"
                                                    type="text" oninput="Limitar(this,15)"/>
                                                </div>
                                                <span style='display:none;color:red' id='valid_2'>Ingrese el primer nombre</span>
                                            </div>

                                            <div class="col-md-3 mt-4">
                                                <label for="segundo_nombre">
                                                    Segundo nombre
                                                </label>
                                                
                                                <div class="input-group">
                                                    <input class="form-control mb-10 solo-letras" id="segundo_nombre"
                                                    name="datos[segundo_nombre]" placeholder="Segundo Nombre"
                                                    type="text" oninput="Limitar(this,15)" />
                                                </div>
                                                <span style='display:none;color:red' id='valid_3'>Ingrese el segundo nombre</span>
                                            </div>

                                            <div class="col-md-3 mt-4">
                                                <label for="primer_apellido">
                                                    Primer apellido
                                                </label>
                                                
                                                <div class="input-group">
                                                    <input class="form-control mb-10 solo-letras" id="primer_apellido"
                                                    name="datos[primer_apellido]" placeholder="Primer Apellido"
                                                    type="text" oninput="Limitar(this,15)"/>
                                                </div>
                                                <span style='display:none;color:red' id='valid_4'>Ingrese el primer apellido</span>
                                            </div>

                                            <div class="col-md-3 mt-4">
                                                <label for="segundo_apellido">
                                                    Segundo apellido
                                                </label>
                                                
                                                <div class="input-group">
                                                    <input class="form-control mb-10 solo-letras" id="segundo_apellido"
                                                    name="datos[segundo_apellido]" placeholder="Segundo Apellido"
                                                    type="text" oninput="Limitar(this,15)"/>
                                                </div>
                                                <span style='display:none;color:red' id='valid_5'>Ingrese el segundo apellido</span>
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
                                            <label for="estado_civil">
                                                Estado Civil
                                            </label>
                                            <span style='display:none;color:red' id='valid_7'>Ingrese el estado civil </span>
                                            <div class="input-group">
                                                <select class="custom-select" id="estado_civil" name="datos[estado_civil]">
                                                    <option selected="" value="vacio">
                                                        -Seleccione-
                                                    </option>
                                                    <option value="Casado(a)">
                                                        Casado(a)
                                                    </option>
                                                    <option value="Soltero(a)">
                                                        Soltero(a)
                                                    </option>
                                                    <option value="Viudo(a)">
                                                        Viudo(a)
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <label for="genero">
                                                Género
                                            </label>
                                            <span style='display:none;color:red' id='valid_8'>Ingrese el género</span>
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
<!--
                                        
                                        <div class="col-md-6 mt-2">
                                        <label for="tiempo_comunidad">
                                        Tiempo en la comunidad    
                                        </label>
                                        <span style='display:none;color:red' id='valid_13'>Campo vacío</span>
                                        <div class="input-group">
                                        <input  class="form-control mb-10" id="tiempo_comunidad"
                                        name="datos[tiempo_comunidad]"
                                        type="date" />
                                        <button type="button" class="btn btn-default" id='desde_siempre'>Desde siempre</button>
                                        </div>


                                        </div>
-->
                                       <div class="col-md-3 mt-2">
                                        <label for="nacionalidad">
                                            Nacionalidad
                                        </label>
                                        <span style='display:none;color:red' id='valid_10'>Ingrese la nacionalidad</span>
                                        <div class="input-group">
                                            <input class="form-control mb-10 solo-letras" id="nacionalidad"
                                            name="datos[nacionalidad]" value=" Venezolana" placeholder="Nacionalidad" type="text" oninput="Limitar(this,15)"  />
                                        </div>

                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label for="nivel_educativo">
                                            Nivel Educativo
                                        </label>
                                        <span style='display:none;color:red' id='valid_11'>Ingrese el nivel educativo</span>
                                        <div class="input-group">
                                            <select class='form-control' name="datos[nivel_educativo]" id='nivel_educativo'>
                                                <option value='vacio'>-Seleccione-</option>
                                                <option value='Preescolar'>Bachiller</option>
                                                <option value='Medio diversificado'>Profesional</option>
                                
                                            </select>
                                           
                                        </div>
                                    </div>

<!--

                            <div class="col-md-4 mt-2">
                                <label for="jefe_familia">
                                    Jefe de familia
                                </label>
                                <span style='display:none;color:red' id='valid_14'>Vacío</span>
                                <select class="custom-select" id="jefe_familia"
                                name="jefe_familia">
                                <option selected="" value="vacio">
                                    -Seleccione-
                                </option>
                                <option value="1">
                                    Si
                                </option>
                                <option value="0">
                                 No
                             </option>

                         </select>
                     </div>
-->
<!--
                     <div class="col-md-4 mt-2">
                        <label for="propietario_vivienda">
                            Propietario de vivienda
                        </label>
                        <span style='display:none;color:red' id='valid_15'>Vacío</span>
                        <select class="custom-select" id="propietario_vivienda"
                        name="propietario_vivienda">
                        <option selected="" value="vacio">
                            -Seleccione-
                        </option>
                        <option value="1">
                            Si
                        </option>
                        <option value="0">
                         No
                     </option>

                 </select>
             </div>
-->

<!--
             <div class="col-md-4 mt-2">
                <label for="jefe_calle">
                    Jefe de calle
                </label>
                <span style='display:none;color:red' id='valid_16'>Vacío</span>
                <select class="custom-select" id="jefe_calle"
                name="jefe_calle">
                <option selected="" value="vacio">
                    -Seleccione-
                </option>
                <option value="1">
                    Si
                </option>
                <option value="0">
                 No
             </option>

         </select>
     </div>
-->


<div class="col-md-6 mt-2">
    <label for="transporte">
        Transporte
    </label>
    <span style='display:none;color:red' id='valid_18'>Indique el tipo de transporte</span>
    <table style="width:100%">
        <tr><td>
            <select  class="custom-select" id="transporte"
            name="datos[transporte]">
            <option selected="" value="vacio">
                -Seleccione-
            </option>
            <option value="0">
                Público
            </option>
            <option value="privado">
             Privado
         </option>

     </select></td><td style='display:none' id='tipo_transporte_view'>

       <input type="text" id='tipo_transporte' name="datos[tipo_transporte]" placeholder="Indique el tipo de transporte" class="form-control letras_numeros" list='transportes_regitrados' oninput="Limitar(this,15)"> 

       <datalist id='transportes_regitrados'>
           <?php foreach ($this->transportes as $tr) { ?>
            <option value="<?php echo $tr['descripcion_transporte']; ?>"></option>
        <?php } ?>
    </datalist>

    
</td></tr>
</table>
</div>
           </div>
           </div>
           
<!--
<div class="col-md-6 mt-2">
    <label for="comunidad_indigena">
        Comunidad indigena
    </label>
    <span style='display:none;color:red' id='valid_19'>Campo vacío</span>
    <table style="width:100%">
        <tr><td>
            <select  class="custom-select" id="comunidad_indigena"
            name="comunidad_indigena">
            <option selected="" value="vacio">
                -Seleccione-
            </option>
            <option value="si">
                Si
            </option>
            <option value="0">
             No
         </option>

     </select></td><td style='display:none' id='comunidad_indigena_view'>

       <input type="text" id='nombre_comunidad' name="nombre_comunidad" placeholder="Nombre de la comunidad indigena" class="form-control solo-letras" list='comunidades_indigenas' oninput="Limitar(this,20)"> 

       <datalist id='comunidades_indigenas'>
           <?php foreach ($this->comunidades as $cm) { ?>
            <option value="<?php echo $cm['nombre_comunidad']; ?>"></option>
        <?php } ?>
    </datalist>

</td></tr>
</table>
</div>
           -->
<!--
<div class="col-md-6 mt-2">
    <label for="privado_libertad">
        Privado de libertad
    </label>
    <span style='display:none;color:red' id='valid_20'>Campo vacío</span>
    <select class="custom-select" id="privado_libertad"
    name="privado_libertad">
    <option selected="" value="vacio">
        -Seleccione-
    </option>
    <option value="1">
        Si
    </option>
    <option value="0">
     No
 </option>

</select>
</div>
           -->
<!-- 


                                        </div>

                                    </div>
                        
                                    <div class="tab-pane" id="panel3" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h2>
                                                    Documentos
                                                </h2>
                                            </div>

                                            <div class="col-md-6 mt-4">
                                                <label for=""> Carnet de la Patria</label>
                                            </div>
                                            <div class="col-md-6 mt-4">
                                                <label for=""> Carnet de el PSUV (opcional)</label>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <label for="serial_patria">
                                                    Serial Patria
                                                </label>
                                                <span style='color:red' id='valid_serial_patria'></span>
                                                <div class="input-group">

                                                    <input class="form-control mb-10 no-espacios no-acentos" id="serial_patria"
                                                    name="datos[serial_patria]" placeholder="Serial" type="text" oninput="Limitar(this,10)"/>
           
                                                </div>
                                            </div>
          
                                            <div class="col-md-6 mt-2">
                                                <label for="serial_psuv">
                                                    Serial PSUV
                                                </label>
                                                <span style='color:red' id='valid_serial_psuv'></span>
                                                <div class="input-group">
                                                    <input class="form-control mb-10 no-espacios no-acentos" id="serial_psuv"
                                                    name="datos[serial_psuv]" placeholder="Serial" type="text" oninput="Limitar(this,12)"/>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-2">
                                                <label for="codigo_patria">
                                                    Codigo Patria
                                                </label>
                                                <span style='color:red' id='valid_codigo_patria'></span>
                                                <div class="input-group">
                                                    <input class="form-control mb-10 no-espacios no-acentos" id="codigo_patria"
                                                    name="datos[codigo_patria]" placeholder="Codigo" type="text" oninput="Limitar(this,10)"/>
                                                </div>

                                            </div>

                                            <div class="col-md-6 mt-2">
                                                <label for="codigo_psuv">
                                                    Codigo PSUV
                                                </label>
                                                <span style='color:red' id='valid_codigo_psuv'></span>
                                                <div class="input-group">
                                                    <input class="form-control mb-10 no-espacios no-acentos" id="codigo_psuv"
                                                    name="datos[codigo_psuv]" placeholder="Codigo" type="text" oninput="Limitar(this,12)"/>
                                                </div>
                                            </div>
 
                                            <div class="col-md-6 mt-2">
                                                <label for="certificado">
                                                    Certificado de discapacidad
                                                </label>
                                                <br>
                                                <label for="serial_discapacidad">
                                                    Serial discapacidad
                                                </label>
                                                <span style='color:red' id='valid_serial_discapacidad'></span>
                                                <div class="input-group">
                                                    <input class="form-control mb-10 no-espacios no-acentos" id="serial_discapacidad"
                                                    name="datos[serial_discapacidad]" placeholder="Serial" type="text" oninput="Limitar(this,12)"/>
                                                </div>
                                                <label for="codigo_discapacidad">
                                                    Código discapacidad
                                                </label>
                                                <span style='color:red' id='valid_codigo_discapacidad'></span>
                                                <div class="input-group">
                                                    <input class="form-control mb-10 no-espacios no-acentos" id="codigo_discapacidad"
                                                    name="datos[codigo_discapacidad]" placeholder="Codigo" type="text" oninput="Limitar(this,12)"/>
                                                </div>
                                            </div>
           
                                            </div>

                                            </div>
                                            -->
                                            <!-- <div class="tab-pane" id="panel2" role="tabpanel">-->
                                    <!-- </div> -->
                                    <div class="tab-pane" id="panel2" role="tabpanel">

                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h2>
                                                    Información de Contacto
                                                </h2>
                                            </div> 
                                            <div class="col-md-12 mt-2">
                                                <div class="form-group">
                                                    <label for="correo">
                                                        Correo Electronico personal
                                                    </label>
                                                    <div class="input-group">
                                                        <input class="form-control no-espacios" id="correo" name="datos[correo]"
                                                        placeholder="Correo" type="text">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">@</span>
                                                        </div>
                                                        <select class="custom-select" id="tipo_correo"
                                                        name="datos[tipo_correo]">
                                                        <option selected="" value="@gmail.com">
                                                            gmail.com
                                                        </option>
                                                        <option value="@hotmail.com">
                                                            hotmail.com
                                                        </option>
                                                        <option value="@yahoo.com">
                                                            yahoo.com
                                                        </option>
                                                        <option value="@yahoo.es">
                                                            yahoo.es
                                                        </option>
                                                        <option value="@outlok.com">
                                                            outlok.com
                                                        </option>
                                                    </select>
                                                </input>
                                            </div>

                                           </div>

                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <div class="form-group">
                                                    <label for="correo">
                                                        Correo Electrónico institucional
                                                    </label>
                                                    <div class="input-group">
                                                        <input class="form-control no-espacios" id="correo_institucional" name="datos[correo_institucional]"
                                                        placeholder="Correo institucional" type="text">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">@</span>
                                                        </div>
                                                        <select class="custom-select" id="tipo_correo_inst"
                                                        name="datos[tipo_correo_inst]">
                                                        <option selected="" value="@seniat.gob.ve">
                                                            seniat.gob.ve
                                                        </option>
                                                    </select>
                                                </input>
                                            </div>

                                           </div>

                                           </div>


                                            <!--  -->
                                            <div class="col-md-9 mt-2">
                                    
                                          <label for="telefono_personal">
                                            Teléfono Personal
                                          </label>
                                           <span style='display:none;color:red' id='valid_21'>Ingrese el número de teléfono</span>
                                           <div class="input-group">
                                            <input class="form-control mb-10 solo-numeros no-espacios" id="telefono"
                                            name="datos[telefono]" placeholder="0000-000-0000"
                                            type="number" oninput="Limitar(this,12)"/>
                                          <!-- </div>  -->
                                           
                                                
                                            </div>
                                       </div> 
                                       <div class="col-md-3 mt-2"> 
                                           <label for="whatsapp">
                                            <i class="fa fa-whatsapp" style="font-size: 15px;"></i> WhatsApp
                                          </label>
                                           <span style='display:none;color:red' id='valid_22'>Campo vacío</span>
                                            <div class="input-group"> 
                                           <select class="custom-select" id="whatsapp" name="datos[whatsapp]">
                                            <option selected="" value="vacio">
                                                -Seleccione-
                                            </option>
                                            <option value="1">
                                             Si
                                         </option>
                                         <option value="0">
                                            No
                                          </option>
                                           </select>
                                            </div>
                                           </div>
                                         <div class="col-md-3 mt-2">  
                                         
                                                <label for="telf_casa">
                                                    Teléfono local
                                                </label>
                                                <span style='display:none;color:red' id='valid_40'>Ingrese el número de casa</span>
                                                <div class="input-group">
                                                    <input class="form-control mb-10 solo-numeros no-espacios" id="telf_casa"
                                                    name="datos[telf_casa]" placeholder="0000-000-0000"
                                                    type="number" oninput="Limitar(this,12)"/>
                                                </div>
                                            </div>
                                                <br>

                                                <div class="col-md-9 mt-2">
                                       <label for="direccion">Dirección</label>
                                       <span style='display:none; color:red' id='valid_23'>Campo vacío</span>

                                       <div class="input-group">
                                            <input type="text" class="form-control mb-10" name="datos[direccion]" id="direccion"  style="resize: both; width: 100%; heigth: 200px" placeholder="Indique dirección"> 
                                           
                    
                                        </div>
           
                                      </div>
                                        </div>
           
                                    </div>
                                     
                                     <!--   <div class="col-md-12 mt-2">
                                                <label for="telefono_casa">
                                                    Telefono de Casa
                                                </label>
                                                <div class="input-group">
                                                    <input class="form-control mb-10" id="telefono_casa"
                                                        name="datos[telefono_casa]" placeholder="0000-000-0000"
                                                        type="text" />
                                                        -->
                                        <!-- </div>
                                       </div> -->

                                       <!--
                                        <div class="tab-pane" id="panel3" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h2>
                                                    Información política
                                                </h2>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <label for="organizacion_politica">
                                                    Organización política
                                                </label>
                                                <span style='display:none;color:red' id='valid_23'>Indique si pertenece a una org política</span>
                                                <table style="width:100%">
                                                    <tr><td>
                                                        <div class="input-group">
                                                            <select  class="custom-select" id="organizacion_politica" name="datos[organizacion_politica]">
                                                                <option selected="" value="0">
                                                                    Ninguna
                                                                </option>
                                                                <?php foreach ($this->organizaciones as $org) { ?>
                                                                    <option value="<?php echo $org['id_org_politica']; ?>"><?php echo $org['nombre_org']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <input style='display:none' type="text" id='nombre_organizacion' class='form-control' placeholder="Escriba el nombre de la organización" name="" oninput="Limitar(this,30)">
                                                        </div></td><td>
                                                            <input type="button" id='btn_nueva_org'  class='btn btn-primary' value="Nueva organización">
                                                        </td></tr></table>
                                                    </div>





                                                    <div class="col-md-12 text-center mt-2">
                                                        <h4>
                                                            Beneficios Politicos
                                                        </h4>
                                                    </div>

                                                    <div class="col-md-12 mt-2">
                                                        <label for="bonos">
                                                            Bonos
                                                        </label>
                                                        <span style='display:none;color:red' id='valid_24'>Ingrese el nombre del bono</span>
                                                        <table style="width:100%">
                                                            <tr><td><br>
                                                                <div class="input-group">
                                                                 <select id='input_bonos' class='form-control'>
                                                                    <option value='vacio'>-Seleccione-</option>
                                                                    <?php foreach ($this->bonos as $b) { ?>
                                                                       <option value="<?php echo $b['id_bono']; ?>"><?php echo $b['nombre_bono'];?></option>
                                                                   <?php  } ?>
                                                               </select>

                                                               <input style='display:none' type="text" id='bono_nuevo' name="bono_nuevo" class='form-control' placeholder="Nombre del bono" oninput="Limitar(this,20)">
                                                           </div>
                                                       </td>
                                                       <td><br>
                                                        <button class="btn btn-primary" type="button" id='btn_nuevo_bono'>
                                                            Nuevo
                                                        </button>
                                                        <button class="btn btn-info" type="button" id='btn_agregar_bono'>
                                                            Agregar
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="text-align:center"><br>
                                                        <div style='width:80%;border-radius: 6px;height: 250px !important;background:#B8F1FF;overflow-y: scroll' id='bonos_agregados'>

                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="col-md-12 mt-2">
                                           <label for="misiones">
                                             Misiones
                                         </label>
                                         <span style='display:none;color:red' id='valid_25'>Ingrese el nombre de la misión</span>
                                         <table style="width:100%">
                                            <tr><td>
                                                Nombre misión
                                                <div class="input-group">
                                                 <input type="text" id='nombre_mision' style='display:none'  class='form-control' placeholder="Nombre de la misión" >
                                                 <select class='form-control' id='input_misiones'>
                                                    <option value='vacio'>-Seleccione-</option>
                                                    <?php foreach ($this->misiones as $m) { ?>
                                                       <option value="<?php echo $m['id_mision']; ?>"><?php echo $m['nombre_mision'];?></option>
                                                   <?php  } ?>
                                               </select>
                                           </div>
                                       </td><td>
                                        Recibe actualmente 
                                        <select id='recibe_actualmente' class='form-control'>
                                            <option value='1'>Si</option>
                                            <option value='0'>No</option>
                                        </select>

                                    </td>

                                    <td style='display:none' id='ver_fecha_recepcion'>Última vez recibido
                                        <input  type="date" id='ultima_recepcion' class='form-control' name="">
                                    </td>
                                    <td>
                                        <br>
                                        <button class="btn btn-info" type="button" id='btn_nueva_mision'>
                                            Nueva
                                        </button>
                                        <button class="btn btn-info" type="button" id='btn_agregar_mision'>
                                            Agregar
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" style="text-align:center"><br>
                                        <div style='width:80%;border-radius: 6px;height: 250px !important;background:#B8D7FF;overflow-y: scroll' id='misiones_agregadas'>

                                        </div>
                                    </td>
                                </tr>
                            </table>
                                                    </div>

                    </div>

                      
                </div>
                       -->                             
                <div class="tab-pane" id="panel3" role="tabpanel">


                    <div class="col-md-12 text-center mt-2">
                        <h2>Información laboral</h2>
                    </div>
                        <div class="row mt-2 d-flex flex-wrap">
                            <div class="col-md-3 mt-2">
                                <div class="form-group">
                                    <label for="ing_seniat">Ingreso al SENIAT</label>
                                    <span style='display:none;color:red' id='valid_28'>Fecha de ingreso al SENIAT</span>
                                    <input class="form-control" id="ing_seniat"   name="ing_seniat" type="date"> 
                                </div>
                            </div>

                            <div class="col-md-3 mt-2">
                                <div class="form-group">
                                    <label for="ing_publica">Ingreso a la admin. pública </label> 
                                    <span style='display:none; color:red' id='valid_29'>Fecha de ingreso a la administración pública</span>
                                    <input class="form-control" name="datos[ing_publica]"  id="ing_publica" type="date" style="width: 100%">
                                </div>
                            </div>
                        
                            <div class="col-md-3 mt-2">
                                <div class="form-group">
                                    <label for="fecha_notificacion">Fecha de notificación</label> 
                                    <span style='display:none; color:red' id='valid_30'>Ingrese fecha de notificación</span>
                                    <input class="form-control" name="datos[fecha_notificacion]"  id="fecha_notificacion" type="date"></input>
                                </div>
                            </div>

                            <div class="col-md-3 mt-2">
                                <div class="form-group">
                                    <label for="ult_designacion">Última designación</label> 
                                    <span style='display:none; color:red' id='valid_31'>Ingrese fecha de designación</span>
                                    <input class="form-control" name="datos[ult_designacion]"  id="ult_designacion" type="date"></input>
                                </div>
                            </div>

                            <div class="col-md-3 mt-2">
                                <label for="prima">Cobra Prima</label>
                                <span style='display:none;color:red' id='valid_32'>Debe seleccionar si recibe prima</span>
                                <div class="input-group">
                                    <select class="custom-select" id="prima" name="datos[prima]">
                                        <option selected="" value="vacio">
                                            -Seleccione-
                                        </option>
                                        <option value="S">
                                                Sí
                                        </option>
                                        <option value="N">
                                            No
                                        </option>
                                    </select>
                                </div>
                            </div>
                                            
                                        <!-- Si cesar realiza los filtro en consultar no modifico el value de los select -->
                            <div class="col-md-3 mt-2">
                                <label for="declaracion_j">Declaración Jurada</label>
                                <span style='display:none;color:red' id='valid_33'>Debe seleccionar alguna opción</span>
                                <div class="input-group">
                                    <select class="custom-select" id="declaracion_j" name="datos[declaracion_j]">
                                        <option selected="" value="vacio">
                                            -Seleccione-
                                        </option>
                                        <option value="S">
                                                Sí
                                        </option>
                                        <option value="N">
                                            No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-3 mt-2">
                                <label for="incripcion_ivss">Inscripción en el IVSS</label>
                                <span style='display:none;color:red' id='valid_34'>Debe seleccionar alguna opción</span>
                                <div class="input-group">
                                    <select class="custom-select" id="inscripcion_ivss" name="datos[inscripcion_ivss]">
                                        <option selected="" value="vacio">
                                            -Seleccione-
                                        </option>
                                        <option value="S">
                                                Sí
                                        </option>
                                        <option value="N">
                                            No
                                        </option>
                                    </select>
                                </div>
                            </div>
<!---------------------------------------------------------------------------------------------------------->
                            <div class="col-md-3 mt-2">
                                <label for="fideicomiso">Posee cuenta de fideicomiso</label>
                                <span style='display:none;color:red' id='valid_35'>Debe seleccionar alguna opción</span>
                                <div class="input-group">
                                    <select class="custom-select" id="fideicomiso" name="datos[fideicomiso]" style="width: 80%">
                                        <option selected="" value="vacio">
                                            -Seleccione-
                                        </option>
                                        <option value="S">
                                                Sí
                                        </option>
                                        <option value="N">
                                            No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <br>
<!--------------------------------------------------------------------------------------------------------------------------->  

                            <div class="col-md-6 mt-2">
                                <label for="egresado">Procedencia por traslado</label>
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
                                                <!-- <td style='display:none;' id='ver_sector_formal'>

                                                <input  class="form-control" id="tipo_sector_formal"
                                                name="datos[tipo_sector_formal]" type="date">
                                                </td> -->
                                        <td style='display:none;' id='ver_estado'>  
                                            <!-- <div class="input-group"> -->
                                            <span style='display:none;color:red' id='valid_51'>Campo sin llenar</span>
                                            <select class="form-control" name="datos[estado]" id="id_estado" style= "width: 100%;" placeholder="Indique el estado">
                                                <option value='vacio' >-Seleccione el estado-</option>
                                                <?php foreach ($this->estados as $edos) { ?>
                                                <option value='<?php echo $edos["id_estado"]; ?>'><?php echo $edos['nombre_estado_procedencia'];?></option>
                                                <?php  } ?>
                                            </select>
                                        </td>

                                        <!-- <td>
                                        <input type="button" class='btn btn-info' id='nueva_cond' value='Nueva' name="">
                                        </td> -->
                                    </tr>
                                </table>
                            </div>              
 
<!--------------------------------------------------------->

                            <div class="col-md-6 mt-2">
                            <label for="nomina">Nómina a la que pertenece </label>
                                <span style='display:none;color:red' id='valid_38'>Campo sin llenar</span>
                                <table style='width:100%'>
                                    <tr>
                                        <td>
                                            <!-- <div class="input-group"> -->
                                            <select class="form-control"  name="datos[nomina]" id="nomina" style= "width: 100%;">
                                                <option value='vacio' >-Seleccione-</option>
                                                <?php foreach ($this->nomina as $nomi) { ?>
                                                <option value='<?php echo $nomi["id_nomina"]; ?>'><?php echo $nomi['nombre_nomina'];?></option>
                                                <?php  } ?>
                                            </select>
                                        </td>

                                            <!--  <td style='display:none;' id='ver_grado'>
                                            <input  class="form-control" id="tipo_sector_formal"
                                            name="datos[tipo_sector_formal]" type="date">
                                            </td>
                                            -->  
                                        <td style='display:none;' id='ver_grado'>
                                            <!-- <div class="input-group"> -->
                                            <span style='display:none;color:red' id='valid_39'>Campo sin llenar</span>
                                            <select class="form-control" id="grado_fun" name="datos[grado_fun]"  placeholder="Indique el grado o jerarquía" >
                                                <option value='vacio' >-Seleccione  el grado o jerarquía-</option>
                                                <option value='Coronel'>Coronel</option>
                                                <option value='Tiniente'>Teniente</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
<!--------------------------------------------------------------------------------------------------->    
<!--------------------------------------------------------------------------------------------------------------------------->
                            <div class="col-md-6 mt-2">
                            <label for="ocupacion">Cargo Funcional</label>
            <span style='display:none;color:red' id='valid_42'>Ingrese la ocupación</span>
            <table style='width:100%'>
                <tr>
                    <td>
                        <div class="input-group" id="ocupaciones_agregadas">
                            <select id='ocupacion' name="datos[cargos]" id="cargos" class='form-control' style="width: 350px">
                                <option value='vacio'>Sin cargo</option>
                                <?php foreach ($this->ocupaciones as $o) { ?>
                                <option value='<?php echo $o["id_ocupacion"]; ?>'><?php echo $o['nombre_ocupacion'];?></option>
                                <?php  } ?>
                            </select>
                            <input style='display:none' type="text" class='form-control' id='ocupacion_nueva' name="ocupacion" placeholder="Ocupación de la persona">
                            <!-- <td><input type="button" id='agregar_cargo' class="btn btn-info" type="button" value="Agregar"></td> -->
                        </div>
                        <!--  <input type="button" id='btn_nueva_ocupacion' class='btn btn-info' value='Nueva' name="">  -->          
                    <td><!-- <input type="button" id='agregar_cargo' class="btn btn-info" type="button" value="Agregar"> Agregar</button>&nbsp;&nbsp; -->  
                </tr>
            </table> <!-- <input type="button" class='btn btn-info' id='nueva_cond' value='Nueva' name=""> -->
          </div>      


<!----------------------------------------------------------------------------->
<!-- Prueba -->
<!--------------------------------------------------------------------------------------------------->    
                        

        <div class="col-md-6 mt-2">
            <label for="cargo_nominal">Cargo nominal</label>
            <span style='display:none;color:red' id='valid_40'>Campo sin llenar</span>
            <table style='width:100%'>
                <tr>
                    <td>
                        <div class="input-group">
                            <select class='form-control'name="datos[cargo_nominal]" id="cargo_nominal" style=" width:100%" >
                                <option value='vacio' >-Seleccione-</option>
                                <?php foreach ($this->cargo_nominal as $cargo) { ?>
                                <option value='<?php echo $cargo["id_cargo"]; ?>'><?php echo $cargo['nombre_cargo'];?></option>
                                <?php  } ?>
                            </select>
                        </div>
                    </td>
                    <td>
                        <!-- <td style='display:none;' id='ver_estado_fun'> -->
                        <span style='display:none;color:red' id='valid_41'>Campo sin llenar</span>
                        <select class="form-control" name="datos[id_estado_fun]" id="id_estado_fun" style= "width: 100%;" placeholder="Indique estado del funcionario">
                            <option value='1' >-Seleccione estado del funcionario-</option>
                            <?php foreach ($this->estado_fun as $edo_fun) { ?>
                            <option value='<?php echo $edo_fun["id_estado_fun"]; ?>'><?php echo $edo_fun['nombre_estado'];?></option>
                            <?php  } ?>
                        </select>
                    </td>
                            <!-- <select class="form-control" id="estado_funcionario"
                            name="datos[sector_laboral]" >
                            <option value='vacio'>-Estado del funcionario-</option>
                            <option value="1">
                            Seleccionar
                            </option>
                            <option value="2">
                            Presente
                            </option> </select>  -->
                </tr>
            </table>
        </div>
<!---------------------------------------------------------------------------------------------------------------------------------->
        <div class="col-md-12 mt-2">
        <label for="egresado">Egresado de nómina</label>
                                <span style='display:none;color:red' id='valid_36'>Campo sin llenar</span>
                                <table style='width:100%'>
                                    <tr>
                                        <td>
                                            <select class="form-control" id="egresado" style="width: 100%">
                                                <option value='vacio'>-Seleccione-</option>
                                                <option value="1">
                                                Sí
                                                </option>
                                                <option value="2">
                                                No
                                                </option>
                                            </select>
                                        </td> 
                                                <!-- <td style='display:none;' id='ver_sector_formal'>
                                                <input  class="form-control" id="tipo_sector_formal"
                                                name="datos[tipo_sector_formal]" type="date">
                                                </td> -->
                                        <td style='display:none;' id='ver_egresado'>
                                            <!-- <div class="input-group"> -->
                                            <span style='display:none;color:red' id='valid_37'>Campo sin llenar</span>
                                            <select class="form-control" name="datos[id_egresado]" id="egresado_nomina" style= "width: 100%;" placeholder="Indique motivo de egreso">
                                                <option value='vacio' >-Seleccione-</option>
                                                <?php foreach ($this->egreso as $egre) { ?>
                                                <option value='<?php echo $egre["id_egresado"]; ?>'><?php echo $egre['nombre_egresado'];?></option>
                                                <?php  } ?>
                                            </select>
                           
                                        </td>
                                       


                                        <td style='display:none;' id='ver_descripcion'>
                                            <!-- <div class="input-group"> -->
                                            <span style='display:none;color:red' id='valid'>Campo sin llenar</span>
                                            <input type="text" name="datos[descripcion]" id="descripcion_egresados" style= "width: 100%;" placeholder="fecha de egreso">
                                        </td>
                                                <!-- <td>
                                                <input type="button" class='btn btn-info' id='nueva_cond' value='Nueva' name="">
                                                </td> -->
                                    </tr>
                                </table>
        <div><!--Descomentar--><!--<div class="col-md-10 mt-2" style='border-radius: 6px;overflow-y: scroll;background: #CFFEDE; width: 800;height: 200px !important' id='cargos_personas'> -->

 

<!----------------------------------------------------------------------------------------------------------------------------------->
        <div class="col-md-12 mt-2">                                
            <label for="id_ubicacion" >Ubicación del funcionario o funcionaria</label>
            <span style='display:none;color:red' id='valid_43'>Ingrese la ubicación</span>
            <table style='width:100%'>
                    <!--<tr><td style='width:120%'> -->
                <div  id='proyect_agregados'>
                    <select class="form-control mt-2" name="datos[id_ubicacion]" id="id_ubicacion" style= "width: 100%;">
                        <option value='vacio' >-Seleccione-</option>
                        <?php foreach ($this->ubicaciones as $ubi) { ?>
                        <option value='<?php echo $ubi["id_ubicacion"]; ?>'><?php echo $ubi['nombre_ubi'];?></option>
                        <?php  } ?>
                    </select>
                </div> 
                <div class="col-md-12">
                    <!-- <label>Ubicación</label> -->
                    <span id='valid_enfermedad' style='color:red'></span>
                    <table style='width:100%'>
                        <tr>
                            <td class="col-md-4 p-0">
                                <select class='form-control no-simbolos mt-2' id='id_division' name="datos[id_division]" style="width: 100%">
                                    <option value='0' >-Seleccione división-</option>
                                    <?php foreach ($this->divisiones as $e) {?>
                                        <option value='<?php echo $e['id_division']; ?>'><?php echo $e['nombre_division']; ?></option>
                                    <?php }?>
                                </select>
                            </td>
                            <td class="col-md-3 p-0">
                                <select class='form-control no-simbolos mt-2' id='id_area' name="datos[id_area]" style="width: 100%">
                                    <option value='0' >-Seleccione área-</option>
                                </select>
                            </td>
                            <td class="col-md-3 p-0">
                                <select class='form-control no-simbolos mt-2' id='id_seccion' name="datos[id_seccion]"  style="width: 100%">
                                    <option value='0' >-Secccione sección-</option>
                                </select>
                            </td>
                            <td class="p-0">
                                <button id='agregar_ubicacion' class="btn btn-info mt-2" type="button">Agregar</button>&nbsp;&nbsp;
                            </td>
                        </tr>
                    </table>
                            <!-- <div class="col-md-10 mt-2" style='border-radius: 6px;overflow-y: scroll;background: #CFFEDE; width: 800;height: 200px !important' id='ubicaciones_personas'> -->
                            <!-- </div> -->
                    <div class="col-md-12 mt-2" style='border-radius: 6px;overflow-y: scroll;background: #CEF6F5;width: 100%;height: 200px !important' id='ubicaciones_persona'>
                    </div>
                </div>
        </div>   
                        <br>
                       <!--  <div>
                        </div>  Aqui vemos que tal -->                  

                    <!--------------------------------------------------------------------------------------------------------------->

        <div class="col-md-12 mt-2">
            <label >
            Títulos obtenidos
            </label>
            <table style='width:100%'><tr>
                <div  id='proyectos_agregados'>
                    <td class="col-md-5 p-0">
                        <select class="form-control" id="proyectos" name="datos[id_titulo]" style= "width: 100%">
                            <option value='0' >-Seleccione-</option>
                            <?php foreach ($this->proyectos as $pro) { ?>
                            <option value="<?php echo $pro['id_titulo']; ?>"><?php echo $pro['nombre_titulo']; ?></option>
                            <?php   } ?>
                        </select>
                    </td>
                    <td class="col-md-5 p-0">
                        <input  type="text" name="datos[descripcion]"  id="descripcion" class='form-control' style=" width: 100%" placeholder="Descripción del título" >
                    </td>
                    <td class="p-0">
                        <input type="button" id="agregar_proyecto"   value="Agregar" class="btn btn-info">
                    </td>
                </div> 
            </table>
        </div>

                <!--  </td><td><input type="button" id="otro_proyecto" value="Otro" class='btn btn-info'></td>
                <td ><input type="button" id="agregar_proyecto" value="Agregar" class='btn btn-primary'></td></tr></table> -->
                <!-- </div>  -->

        <div class="col-md-12 mt-2" style='border-radius: 6px;overflow-y: scroll;background: #CEF6F5;width: 100%;height: 200px !important' id='proyectos_persona'>
        </div>

        </div> 

        </div> 

    </div>
 
<!---------------------------------------------------------------------------------------------------------------------->            

<div class="tab-pane" id="panel4" role="tabpanel">
    <div class="row">
        <div class="col-md-12 text-center mt-2">
            <h2>
                Información de Usuario
            </h2>
        </div>
        <div class="col-md-12 mt-2">
            <div class="form-group">
                <label for="correo">
                Contraseña
                </label> <span id='valid_contrasenia' style='color:red;display:none'>Debe ingresar la contraseña del usuario</span>
            <div class="input-group">
                <table style='width:100%'>
                    <tr><td>
                        <input class="form-control no-espacios" id="contrasenia" name=""
                        placeholder="Contraseña de ingreso" type="password" oninput="Limitar(this,10)" value="Seniat2023" readonly>
        <td><button type='button' class='btn btn-default' id='ver_clave'><em class='fa fa-eye'></em></button></td></tr></table>
                </table>

            </div>
        </div>

        <div class="col-md-12 mt-2">
            <div class="form-group">
                <label for="correo">
                 Confirmar contraseña
             </label> <span id='valid_confirmar' style='color:red;display:none'>Debe confirmar la contraseña del usuario</span>
             <div class="input-group">
                        <input class="form-control no-espacios" id="confirmar" name=""
                        placeholder="Contraseña de ingreso" type="password" oninput="Limitar(this,10)" value="Seniat2023" readonly>

            </div>
        </div>

        <br>

        <label for="telefono_personal">
            Preguntas de seguridad
        </label>
        <div class="col-md-12 mt-2">
            <table style='width:100%'><tr><td>
            <span style='display:none;color:red' id='valid_color'>Ingrese el color favorito</span>
            <div class="input-group">
                <input class="form-control mb-10" id="color_fav"
                placeholder="Color favorito"
                type="text" oninput="Limitar(this,10)" value="Seniat2023" readonly/>
            </div></td>

<td>
            <span style='display:none;color:red' id='valid_animal'>Ingrese el animal favorito</span>
            <div class="input-group">
                <input class="form-control mb-10" id="animal_fav"
                placeholder="Animal favorito"
                type="text" oninput="Limitar(this,10)" value="Seniat2023" readonly/>
            </div>
</td><td>
            <span style='display:none;color:red' id='valid_mascota'>Ingrese el nombre de la primera mascota</span>
            <div class="input-group">
                <input class="form-control mb-10" id="primera_mascota"
                placeholder="Nombre de la primera mascota"
                type="text"  oninput="Limitar(this,10)" value="Seniat2023" readonly/>
            </div>
</td></tr></table>  


    </div>

    <div class="col-md-12 mt-2" id='ver_rol' style='display:none'>
                            <label for="nombre_calle">
                               Rol
                            </label> <span id='valid_rol' style='display:none;color:red'></span>
                            <div class="input-group">
                                <select class='form-control' id='rol_usuario'>
                                    <option value='vacio'>-Seleccione-</option>
                                    <option value='Funcionario'>Funcionaria/o</option>
                                    <option value='Usuario'>Usuario</option>
                                    <option value='Jefe de división'>Jefa de división</option>
                                    <option value='Administrador'>Administrador</option>
                                    <option value='Super Usuario'>Súper Usuario</option>
                                </select>
                            </div>

                            
                        </div>




                    </div>





</div>

</div>
</div>
</div>
</div>
</div>
</div>

<!-- /.card-body -->
<div class="card-footer">

    <div class="col-md-12 mt-4">
        <div style="float: left;">
            <a id="anterior" style='display:none' type="button" class="btn btn-secondary text-white">
                Anterior
            </a>
        </div>
    </div>
    <div class="col-md-12 mt-4">
        <div style="float: right;">
            <a id="siguiente" type="button" class="btn btn-primary text-white">
                Siguiente
            </a>
        </div>
    </div>
    <div class="text-center m-t-20" id="botones-finales" style='display:none'>
        <div class="col-xs-12">
            <input type="button" class="btn text-white m-r-10" style="background:#15406D" name="" id="guardar" value="Guardar">
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
<?php include (call."Fin.php"); ?>


<script type="text/javascript" src="<?php echo constant('URL')?>config/js/news/registrar-personas.js"></script>
<style>
    .color-table.info-table thead th {
        background-color: #009efb;
        color: #fff;
    }
</style>