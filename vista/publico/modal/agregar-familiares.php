<div class="modal fade" id="agregar">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar Familiares</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo constant('URL'); ?>" enctype="multipart/form-data"
                id="formulario" method="POST" name="formulario">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="vtabs">
                                <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                    <li class="nav-item" style="margin-top: 50%; margin-bottom: 50%;">
                                        <a class="nav-link active" data-toggle="tab" id="tab_1" href="#panel5" role="tab">
                                            <span class="hidden-sm-up">
                                                <i class="ti-home"></i>
                                            </span>
                                            <span class="hidden-xs-down">
                                                Informacion Personal
                                            </span>
                                        </a>
                                    </li>
                                <!--  <li class="nav-item" style="margin-top: 50%; margin-bottom: 50%;">
                                        <a class="nav-link" data-toggle="tab" href="#panel6" role="tab">
                                            <span class="hidden-sm-up">
                                                <i class="ti-user"></i>
                                            </span>
                                            <span class="hidden-xs-down">
                                                Documentos Personales
                                            </span>
                                        </a>
                                    </li> -->
                                    <li class="nav-item" style="margin-top: 50%; margin-bottom: 50%;">
                                        <a class="nav-link" data-toggle="tab" id="tab_2" href="#panel7" role="tab">
                                            <span class="hidden-sm-up">
                                                <i class="ti-email"></i>
                                            </span>
                                            <span class="hidden-xs-down">
                                                Información de Contacto
                                            </span>
                                        </a>
                                    </li>
                                    
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="panel5" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h2>
                                                    Miembro de Familia
                                                </h2>
                                            </div>

                                            <div class="col-md-1 mt-2">
                                                <label for="tcedula">
                                                    Tipo
                                                </label>
                                                <div class="input-group solo-letras">
                                                    <select class="custom-select" id="tcedula" >
                                                        <option selected="" value="V">
                                                            V
                                                        </option>
                                                        <option value="E">
                                                            E
                                                        </option>
                                                        <option value="R">
                                                            R
                                                        </option>
                                                        <option value="P">
                                                            P
                                                        </option>
                                                        <option value="J">
                                                            J
                                                        </option>
                                                        <option value="G">
                                                            G
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-11 mt-2">
                                                <label for="cedula">
                                                    Cédula
                                                </label> 
                                                <div class="input-group">
                                                <input class="form-control solo-numeros " id="cedula_integrante_modal"
                                                        name="datos[cedula_integrante]" placeholder="Cedula de identidad"
                                                        type="text-center" oninput="Limitar(this,8)"/> 
                                                </div>
                                                <span id='valid_1' style="color:red;" ></span>
                                            </div>

                                            <div class="col-md-3 mt-4">
                                                <label for="primer_nombre">
                                                    Primer Nombre
                                                </label>
                                                <div class="input-group">
                                                    <input class="form-control mb-10 solo-letras" id="primer_nombre"
                                                        name="datos[primer_nombre]" placeholder="Primer Nombre"
                                                        type="text" oninput="Limitar(this,15)" />
                                                      
                                                </div>
                                                <span id="valid_2" style="color: red;"></span>

                                            </div>

                                            <div class="col-md-3 mt-4">
                                                <label for="segundo_nombre">
                                                    Segundo Nombre
                                                </label> 
                                                <div class="input-group">
                                                    <input class="form-control mb-10 solo-letras" id="segundo_nombre"
                                                        name="datos[segundo_nombre]" placeholder="Segundo Nombre"
                                                        type="text" oninput="Limitar(this,15)"/>
                                                      
                                                </div>
                                                <span id="valid_3" style="color: red;"></span>

                                            </div>

                                            <div class="col-md-3 mt-4">
                                                <label for="primer_apellido">
                                                    Primer Apellido
                                                </label>
                                                <div class="input-group">
                                                    <input class="form-control mb-10 solo-letras" id="primer_apellido"
                                                        name="datos[primer_apellido]" placeholder="Primer Apellido"
                                                        type="text" oninput="Limitar(this,15)" />
                                                       
                                                </div>
                                                <span id="valid_4" style="color: red;"></span>

                                            </div>

                                            <div class="col-md-3 mt-4">
                                                <label for="segundo_apellido">
                                                    Segundo Apellido
                                                </label>
                                                <div class="input-group">
                                                    <input class="form-control mb-10 solo-letras" id="segundo_apellido"
                                                        name="datos[segundo_apellido]" placeholder="Segundo Apellido"
                                                        type="text" oninput="Limitar(this,15)" />
                                                       
                                                </div>
                                                <span id="valid_5" style="color: red;"></span>

                                            </div>

                                            <div class="col-md-4 mt-4">
                                                <div class="form-group">
                                                    <label for="fecha_nacimiento">
                                                        Fecha De Nacimiento
                                                    </label>
                                                    <input class="form-control" id="fecha_nacimiento"
                                                        name="fecha_nacimiento" type="date">
                                                      
                                                </div>
                                                <span id="valid_6" style="color: red;"></span>

                                            </div>
                                            <div class="col-md-4 mt-4">
                                                <label for="genero">
                                                    Género
                                                    </label>
                                                <div class="input-group">
                                                    <select class="custom-select" id="genero" name="datos[genero]">
                                                        <option selected="" value="">
                                                            -Seleccione-
                                                        </option>
                                                        <option value="M">
                                                            Masculino
                                                        </option>
                                                        <option value="F">
                                                            Femenino
                                                        </option>
                                                    </select>
                                                    
                                                </div>
                                                <span id="valid_7" style="color:red;"></span>
                                            </div>
                                            <div class="col-md-4 mt-4">
                                                <label for="tipo_persona">
                                                    Nivel educativo  
                                                </label>
                                                <div class="input-group">
                                                    <select class="custom-select" id="nivel_educativo"
                                                        name="datos[nivel_educativo]">
                                                        <option selected="" value="">
                                                        -Seleccione-
                                                        </option>
                                                        <option value="preescolar">
                                                            Preescolar
                                                        </option>
                                                        <option value="primaria" >
                                                            Primaria
                                                        </option>
                                                        <option value="diversificada" >
                                                            Diversificada 
                                                        </option>
                                                    </select>
                                                    
                                                </div>
                                                <span id="valid_8" style="color:red;"></span>
                                            </div>

                                        <div class="col-md-4 mt-2">
                                                <label for="camisa">
                                                Talla de camisa
                                                </label>
                                            <div class="input-group">
                                            <input class="form-control mb-10 solo-letras" list='camisaa' id="camisa"
                                            name="datos[Camisa]" placeholder="Talla de camisa"  oninput="Limitar(this,3)"/>
                
                                                    <datalist id='camisaa' >
                                                    <option value="XXS">
                                                    <option value="XS">
                                                    <option value="S">
                                                    <option value="M">
                                                    <option value="L"> 
                                                    </datalist>
                                                    
                                                    </div>
                                                    <span id="valid_9" style="color: red;" ></span>
                                            </div>
                                        <div class="col-md-4 mt-2">
                                                <label for="pantalon">
                                            Talla de pantalón 
                                                </label>
                                                <div class="input-group">
                                                    <input class="form-control mb-10 solo-letras" id="pantalon"
                                                        name="datos[pantalon]" list='pantalonn' placeholder="Talla de pantalón" type="text" oninput="Limitar(this,3)"/>
                                                   
                                                    <datalist id="pantalonn">
                                                    <option value="SS">
                                                    <option value="S">
                                                    <option value="M">
                                                    <option value="L">
                                                    <option value="XL">
                                                    </datalist>
                                                   
                                                   
                                                    </div>
                                                    <span id="valid_10" style="color:red;"></span>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="calzado">
                                                Número de calzado
                                                </label>
                                                <div class="input-group">
                                                    <input class="form-control mb-10 solo-numeros" id="calzado"
                                                        name="datos[calzado]" placeholder="Número de calzado" type="number" oninput="Limitar(this,2)"/>
                                                    </div>
                                                    <span id="valid_11" style="color:red;"></span>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="tab-pane" id="panel6" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h2>
                                                    Tallas y números
                                                </h2>
                                            </div>
                                            

                                        </div>
                                    </div>


            
                                    <div class="tab-pane" id="panel7" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h2>
                                                    Información de Contacto
                                                </h2>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <div class="form-group">
                                                    <label for="correo">
                                                        Correo Electrónico
                                                    </label><span id="valid_12" style="color: red;"></span>
                                                    <div class="input-group">
                                                        <input class="form-control letras-numeros" id="correo" name="datos[correo]"
                                                            placeholder="Correo" type="text" oninput="Limitar(this,30)"><span id="valid_"></span>
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">@</span>
                                                        </div>
                                                        <select class="custom-select" id="tcorreo"
                                                            name="datos[tcorreo]">
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


                                            <div class="col-md-10 mt-2">
                                                <label for="telefono_personal">
                                                    Teléfono personal
                                                </label><span id="valid_13" style="color: red;" ></span>
                                                <div class="input-group">
                                                    <input class="form-control mb-10 solo-numeros" id="telefono_personal"
                                                        name="datos[telefono_personal]" placeholder="0000-000-0000"
                                                        type="text" oninput="Limitar(this, 11)"/>
                                                </div>
                                            </div>

                                            
                                            <div class="col-md-2 mt-3">
                                                <label for="telefono_personal">
                                                    <i class="fa fa-whatsapp" style="font-size: 15px;"></i> WhatsApp
                                                </label>
                                                <div class="input-group">
                                                    <div class="form-check mr-2 mt-2">
                                                        <input class="form-check-input " type="radio"
                                                            name="data[wathsapp]" id="no">
                                                        <label class="form-check-label" for="no">No</label>
                                                    </div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="radio"
                                                            name="data[wathsapp]" id="si" checked>
                                                        <label class="form-check-label" for="si">Si</label>
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
                </form>
            </div>
            <!--Footer -->
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
            <input type="submit" class="btn btn-primary" style="background:#15406D" name="" id="guardar_integrantes" value="Guardar">
        </div>
    </div>
</div>  


<!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-primary" name="" id="guardar_integrante" value="Guardar">
            </div>  -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog --> 
</div>
<!-- /.modal -->
<script type="text/javascript" src="<?php echo constant('URL')?>config/js/news/registrar-integrantes.js"></script>