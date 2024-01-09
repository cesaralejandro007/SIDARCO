<?php include (call."Inicio.php"); ?>
<?php include (call."data-table.php"); ?>
<style> 
</style>
<!-- DCJIMENEZT -->


<div class="modal fade" id="agregar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar permiso</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                <!-- card-body  -->
                <div class="card-body">
                    <div class="card-block">
                        <div class="form-group row justify-content-center">
                            <div class="col-md-12 mt-2">
                                <label for="cedula_persona">
                                    Cédula de Persona
                                </label>
                                <div class="input-group">
                                    <input list="cedula_p" id="cedula_persona" name="datos[cedula_persona]" class="form-control no-simbolos letras_numeros" placeholder="Cedula de Persona" oninput="Limitar(this,15)"/>
                                    <datalist id="cedula_p">
                                        <?php foreach ($this->personas as $persona) {   ?>
                                            <option value="<?php echo $persona["cedula_persona"]; ?>">
                                                <?php echo $persona["primer_nombre"] . " " . $persona["primer_apellido"]; ?>
                                            </option>
                                        <?php  }  ?>
                                    </datalist>
                                </div>

                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="fecha_incio">Fecha de inicio</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="fecha_inicio" name="datos[fecha_inicio]" placeholder="Indique la fecha de inicio">
                                </div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="fecha_cierre">Fecha de cierre</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="fecha_cierre" name="datos[fecha_cierre]" placeholder="Indique la fecha de cierre">
                                </div>
                            </div>

                            <div class="col-md-6 mt-2" >
                                <label for="motivo">Motivo</label>
                                <div class="input-group">
                                    <input type="text" id="motivo" name="datos[motivo]" class="form-control" placeholder="Escriba el motivo del permiso">
                                </div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="tipo_permiso">Tipo de permiso</label>
                                <div class="input-group">
                                    <select name="datos[tipo_permiso]" id="tipo_permiso" class='form-control' >
                                        <option value="0" >-Seleccione-</option>
                                    <?php foreach($this->tipo_permisos as $per) {?>
                                    <option value="<?php echo $per["tipo_permiso"]; ?>"><?php echo $per["nombre_permiso"]; ?></option>
                                    <?php }?>
                                    </select>
                                </div>
                            </div>

                        

                            <span id="texto"></span>


                        </div>
                    </div>
                </div>
            <!--      /.card-body  -->
                <div class="card-footer">
                    <div class="text-center m-t-20">
                        <div class="col-xs-12">
                            <input type="button" class="btn" style="background:#15406D; color:white" name="" id="enviar" value="Guardar">
                            
                        </div>
                    </div>
                </div>
            </form>

            </div>
         <!--  Footer -->

 <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-primary" name="" id="guardar_integrante" value="Guardar">
            </div>  --> 
        </div>
       <!--  /.modal-content  -->
    </div>
   <!--  /.modal-dialog  -->
 </div> 


<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registro y consulta de permisos </h1>
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
                <h3 class="card-title">Registro y consulta de datos</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="col-lg-12">

            <button id="btn_registrar" class="btn btn-info" type="button" >Registrar permiso</button>
            <br>
            
                    <!--  <div class="card">
                        <div class="card-header" style="background:#AEB6BF;">
                            <h3 class="card-title font-weight-bold">CRITERIOS DE BUSQUEDA</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus" style="color:black"></i></button>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                        <button class="btn btn-outline-primary"  id="reporte_merienda">Reporte de la caja de merienda</button>
                        </div>
                    </div>  -->

            </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <?php if($_SESSION['Nucleo familiar']['modificar']){ ?>
                                <th style="width: 20px;">Editar</th>
                            <?php } ?>
                            <?php if($_SESSION['Nucleo familiar']['eliminar']){ ?>
                                <th style="width: 20px;">Eliminar</th>
                            <?php } ?>
                            <th>Nombre y apellido</th>
                            <th>Ubicación</th>
                            <th>Cargo</th>
                            <th>Inicio</th>
                            <th>Cierre</th>
                            <th>Recepción</th>
                            <th>Motivo</th>
                            <th>Tipo de permiso</th>
                        </tr>
                    </thead>
                    <tbody>
                        <script>

                            $(function() {
                                $.ajax({
                                    type: 'POST',
                                    url: BASE_URL + 'permisos/consultar_info_permiso'
                                }).done(function(datos) {
                                    var data = JSON.parse(datos);

                                    var table = $("#example1").DataTable({
                                        dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                                            "<'row'<'col-sm-12'tr>>" +
                                            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                                        orderCellsTop: true,  
                                        "data": data,
                                        "columns": [
                                        <?php if($_SESSION['Nucleo familiar']['modificar']){ ?>
                                            {
                                                "data": "editar"
                                            },
                                        <?php } ?>
                                        <?php if($_SESSION['Nucleo familiar']['eliminar']){ ?>  
                                            {
                                                "data": "eliminar"
                                            },
                                        <?php } ?>
                                        {
                                            "data": "responsable"
                                        },
                                        {
                                            "data": "ubicacion"
                                        },
                                        {
                                            "data": "cargo"
                                        },
                                        {
                                            "data": "fecha_inicio"
                                        },
                                        {
                                            "data": "fecha_cierre"
                                        },
                                        {
                                            "data": "fecha_pro"
                                        },
                                        {
                                            "data":"motivo"
                                        },
                                        {
                                            "data":"nombre_permiso_tp"
                                        }
                                        ],
                                        responsive: true,
                                        autoWidth: false,
                                        ordering: true,
                                        info: true,
                                        processing: true,
                                        pageLength: 10,
                                        lengthMenu: [5, 10, 20, 30, 40, 50, 100], 
                                    });
                                    table.buttons().container()
                                    .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );

                                    table.buttons().container()
                                    .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );
                                }).fail(function() {
                                    alert("error")
                                })

                                $(document).on('click', '#enviar_actualizacion', function() {

                                    swal({
                                            title: "Atención",
                                            text:
                                            "Estás por actualizar el permiso del funcionario" +
                                            document.getElementById("cedula_persona").value +
                                            ", ¿Desea continuar?",
                                            type: "warning",
                                            showCancelButton: true,
                                            cancelButtonColor: '#d33',
                                            confirmButtonColor: '#15406D',
                                            cancelButtonText: "No",
                                            confirmButtonText: "Si",
                                            closeOnConfirm: false,
                                        },
                                        function (isConfirm) {
                                            if (isConfirm) {
                                                var nombre_familia=document.getElementById("nombre_familia");
                                                        var descripcion_familia=document.getElementById('descripcion_familia');
                                                        var responsable=document.getElementById("responsable_familia");
                                                        var datos_familia=new Object();
                                                        datos_familia['nombre_familia']=nombre_familia.value;
                                                        datos_familia['descripcion_familia']=descripcion_familia.value;
                                                        datos_familia['responsable_familia']=responsable.value;
                                                        $.ajax({
                                                        type:"POST",
                                                        url:BASE_URL+"Familias/actualizar_familia",
                                                        data:{"datos":datos_familia}
                                                    }).done(function(result){
                                                    console.log(result);
                                                    swal({
                                                        title:"Éxito",
                                                        text:"Familia Actualizada satisfactoriamente",
                                                        timer:2000,
                                                        showConfirmButton:false,
                                                        type:"success"
                                                    });
                                                    setTimeout(function(){location.href=BASE_URL+"Familias/Consultas";},2000);
                                                });
                                            }
                                        });
                             });

                                $(document).on('click', '#btn_agregar', function() {
                                    
                                    if(integrantes_input.value=="" || document.getElementById('parentezco').value ==""){
                                        integrantes_input.focus();
                                        valid_integrantes.innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">Debe ingresar la cédula y el parentezco.<i class="far fa-times" id="cerraralert1" data-dismiss="alert" aria-label="Close"></i></div>';
                                        setTimeout(function () {
                                            $("#cerraralert1").click();
                                        }, 6000);
                                    }
                                    else{
                                        valid_integrantes.innerHTML="";
                                        if(valid_integrantes_agregados()){
                                            valid_integrantes.innerHTML="";
                                            $.ajax({
                                            type: 'POST',
                                            url: BASE_URL + 'Familias/agregar_integrante_fun',
                                            data:{'cedula_integrante':integrantes_input.value,'cedula_responsable':document.getElementById('responsable_familia').value
                                                ,'nombre_familia':document.getElementById('nombre_familia').value,'descripcion_familia':document.getElementById('descripcion_familia').value
                                                ,'parentezco':document.getElementById('parentezco').value}
                                            })
                                            .done(function (datos) {
                                                var integrantes = JSON.parse(datos);
                                                if(integrantes==0){
                                                    valid_integrantes.innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">Persona no está registrada.<i class="far fa-times" id="cerraralert1" data-dismiss="alert" aria-label="Close"></i></div>';
                                                    setTimeout(function () {
                                                        $("#cerraralert1").click();
                                                    }, 6000);
                                                }else if(integrantes==1){
                                                    valid_integrantes.innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">Cedula ya registrado.<i class="far fa-times" id="cerraralert1" data-dismiss="alert" aria-label="Close"></i></div>';
                                                    setTimeout(function () {
                                                        $("#cerraralert1").click();
                                                    }, 6000);
                                                }else if(integrantes==2){
                                                    valid_integrantes.innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">Padre ya registrado.<i class="far fa-times" id="cerraralert1" data-dismiss="alert" aria-label="Close"></i></div>';
                                                    setTimeout(function () {
                                                        $("#cerraralert1").click();
                                                    }, 6000);
                                                }else if(integrantes==3){
                                                    valid_integrantes.innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">Madre ya registrado.<i class="far fa-times" id="cerraralert1" data-dismiss="alert" aria-label="Close"></i></div>';
                                                    setTimeout(function () {
                                                        $("#cerraralert1").click();
                                                    }, 6000);
                                                }else if(integrantes==4){
                                                    valid_integrantes.innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">Conyuge ya encuetra.<i class="far fa-times" id="cerraralert1" data-dismiss="alert" aria-label="Close"></i></div>';
                                                    setTimeout(function () {
                                                        $("#cerraralert1").click();
                                                    }, 6000);
                                                }else{
                                                    integrantes_agregados.innerHTML="";
                                                    for (var i = 0; i < integrantes.length; i++) {
                                                    var texto = "";
                                                    integrantes.innerHTML = "";
                                                    console.log(integrantes);
                                                    texto +=
                                                        "<table class='table table-striped' style='width:100'><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Cedula</td><td>Nombre y Apellido</td><td>Parentezco</td><td>Fecha de nacimiento</td><td>Genero</td><td>Nivel educativo</td><td>Correo</td><td>Telefono</td><td>Camisa</td><td>Pantalon</td><td>Calzado</td><td>editar</td><td>Eliminar</td></tr>";
                                                    for (var i = 0; i < integrantes.length; i++) {
                                                        texto +=
                                                        "<tr><td>" +
                                                        integrantes[i]["cedula_integrante"] +
                                                        "</td><td>" +
                                                        integrantes[i]["primer_nombre"]+" "+integrantes[i]["primer_apellido"] +
                                                        "</td><td>" +
                                                        integrantes[i]["parentezco"] +
                                                        "</td><td>" +
                                                        integrantes[i]["fecha_nacimientoFa"] +
                                                        "</td><td>" +
                                                        integrantes[i]["genero"] +
                                                        "</td><td>" +
                                                        integrantes[i]["nivel_educativo"] +
                                                        "</td><td>" +
                                                        integrantes[i]["correo"] +
                                                        "</td><td>" +
                                                        integrantes[i]["telefono"] +
                                                        "</td><td>" +
                                                        integrantes[i]["camisa"] +
                                                        "</td><td>" +
                                                        integrantes[i]["pantalon"] +
                                                        "</td><td>" +
                                                        integrantes[i]["calzado"] +
                                                        "</td>";
                                                        texto +=
                                                        "<td><span onclick='editar_integrante(" + integrantes[i]['id_familia_persona'] + ")' class='fa fa-edit' style='font-size:22px;color:#DC9703;font-weight:bold' title='Editar Integrante' style='font-size:22px'></span></td><td><span onclick='borrar_familia("+integrantes[i]['id_familia_persona']+","+integrantes[i]['cedula_persona']+")' class='iconDelete fa fa-times-circle' title='Eliminar integrante' style='font-size:22px'></span></td></tr>";
                                                    }
                                                    integrantes_agregados.innerHTML += texto + "<tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Cedula</td><td>Nombre y Apellido</td><td>Parentezco</td><td>Fecha de nacimiento</td><td>Genero</td><td>Nivel educativo</td><td>Correo</td><td>Telefono</td><td>Camisa</td><td>Pantalon</td><td>Calzado</td><td>editar</td><td>Eliminar</td></tr></table>";
                                                    }
                                                }
                                            });
                                        }
                                    }
                               });
                            });
                        </script>
                    </tbody>
                    <tfoot>
                        <tr>
                            <?php if($_SESSION['Nucleo familiar']['modificar']){ ?>
                                <th>Editar</th>
                            <?php } ?>
                            <?php if($_SESSION['Nucleo familiar']['eliminar']){ ?>
                                <th>Eliminar</th>
                            <?php } ?>
                            <th>Nombre y apellido</th>
                            <th>Ubicación<noscript></noscript></th>
                            <th>Cargo</th>
                            <th>Inicio</th>
                            <th>Cierre</th>
                            <th>Recepción</th>
                            <th>Motivo</th>
                            <th>Tipo de permiso</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    <!-- /.content -->
</div>
<?php include modal."editar-permiso.php"; ?> 
<!-- /.content-wrapper -->
<?php include (call."Fin.php"); ?>
<?php include (call."style-agenda.php"); ?>

<script type="text/javascript" src="<?php echo constant('URL')?>config/plugins/datatables/media/js/sum.js"></script>
<script type="text/javascript" src="<?php echo constant('URL')?>config/js/news/consultar-permiso.js"></script>

<script type="text/javascript">

    var keyup_cedula = /^[0-9]{7,8}$/;
    var keyup_nombre = /^[A-ZÁÉÍÓÚ][a-zñáéíóú\s]{2,30}$/;
    var keyup_apellido = /^[A-ZÁÉÍÓÚ][a-zñáéíóú\s]{2,30}$/;
    var keyup_genero = /^[A-ZÁÉÍÓÚ][a-zñáéíóú]{7,8}$/;
    var generica = /^[A-ZÁÉÍÓÚa-zñáéíóú]{2,15}$/;
    var keyup_telefono = /^[0-9]{11}$/;
    var keyup_correo =/^[A-Za-z0-9_\u00d1\u00f1\u00E0-\u00FC]{3,25}[@]{1}[A-Za-z0-9]{3,8}[.]{1}[A-Za-z]{2,4}$/;
    var keyup_direccion = /^[A-ZÁÉÍÓÚa-zñáéíóú0-9,.#%$^&*:\s]{2,100}$/;
    var Camisa = /^[A-ZÁÉÍÓÚa-zñáéíóú0-9,.\s]{1,30}$/;
    var Pantalon = /^[A-ZÁÉÍÓÚa-zñáéíóú0-9,.\s]{1,30}$/;
    var Calzado = /^[A-ZÁÉÍÓÚa-zñáéíóú0-9,.\s]{1,30}$/;
    function editar(id_familia_persona,id_familia,responsable_cedula){
        $("#actualizar").modal({ backdrop: "static", keyboard: false });
     $.ajax({
         type:"POST",
         url:BASE_URL+"permisos/consultar_familia_datos",
         data:{'id_familia_persona':id_familia_persona,'id_familia':id_familia,'cedula_responsable':responsable_cedula}
     }).done(function(datos){
        var data = JSON.parse(datos);
        var familia = document.getElementById('integrantes_agregados');
        if (data.length == 0) {
            familia.innerHTML = "No aplica";
        }else {
            integrantes_agregados.innerHTML="";
            for (var i = 0; i < data.length; i++) {
                document.getElementById("nombre_familia").value =data[i]['nombre_familia'];
                document.getElementById("descripcion_familia").value =data[i]['descripcion_familia'];
                document.getElementById("responsable_familia").value =data[i]['cedula_persona'];
            var texto = "";
            data.innerHTML = "";
            console.log(data);
            texto +=
                "<table class='table table-striped' style='width:100'><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Cedula</td><td>Nombre y Apellido</td><td>Parentezco</td><td>Fecha de nacimiento</td><td>Genero</td><td>Nivel educativo</td><td>Correo</td><td>Telefono</td><td>Camisa</td><td>Pantalon</td><td>Calzado</td><td>editar</td><td>Eliminar</td></tr>";
            for (var i = 0; i < data.length; i++) {
                texto +=
                "<tr><td>" +
                data[i]["cedula_integrante"] +
                "</td><td>" +
                data[i]["primer_nombre"]+" "+data[i]["primer_apellido"] +
                "</td><td>" +
                data[i]["parentezco"] +
                "</td><td>" +
                data[i]["fecha_nacimientoFa"] +
                "</td><td>" +
                data[i]["genero"] +
                "</td><td>" +
                data[i]["nivel_educativo"] +
                "</td><td>" +
                data[i]["correo"] +
                "</td><td>" +
                data[i]["telefono"] +
                "</td><td>" +
                data[i]["camisa"] +
                "</td><td>" +
                data[i]["pantalon"] +
                "</td><td>" +
                data[i]["calzado"] +
                "</td>";
                texto +=
                "<td><span onclick='editar_integrante(" + data[i]['id_familia_persona'] + ")' class='fa fa-edit' style='font-size:22px;color:#DC9703;font-weight:bold' title='Editar Integrante' style='font-size:22px'></span></td><td><span onclick='borrar_familia("+data[i]['id_familia_persona']+","+data[i]['cedula_persona']+")' class='iconDelete fa fa-times-circle' title='Eliminar integrante' style='font-size:22px'></span></td></tr>";
            }
            integrantes_agregados.innerHTML += texto + "<tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Cedula</td><td>Nombre y Apellido</td><td>Parentezco</td><td>Fecha de nacimiento</td><td>Genero</td><td>Nivel educativo</td><td>Correo</td><td>Telefono</td><td>Camisa</td><td>Pantalon</td><td>Calzado</td><td>editar</td><td>Eliminar</td></tr></table>";
            }
        }

    });
 }
    function editar_integrante(id) {
        $.ajax({
            type:"POST",
            url:BASE_URL+"Familias/consultar_familia_integrante",
            data:{'id_familia_integrante':id}
        }).done(function(datos){
            var data = JSON.parse(datos);
            console.log(datos);
        Swal.fire({
            title: 'Información personal del integrante de la familia:',
            html:
            '<span id="validar_editar_integrant"></span>'+
            '<span id="v1" style="font-size:14px"></span>'+
            '<div class="d-flex align-items-start">'+


            '<div class="input-group mb-3 col-12">'+
            '<span class="input-group-text" id="inputGroup-sizing-default">Cedula</span>'+
            '<input type="text" id="cedula_integrante" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default placeholder="Cedula" value="'+ data[0].cedula_integrante +'""></div>'+
            '</div>'+


            '<div class="d-flex align-items-start">'+

            '<div class="input-group mb-3 col-6">'+
            '<span class="input-group-text" id="inputGroup-sizing-default">Primer Nombre</span>'+
            '<input type="text" id="nombre_integrante" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default placeholder="Nombre" value="'+ data[0].primer_nombre +'"">'+
            '<span id="v2" style="font-size:14px"></span>'+
                '</div>'+
                '<div class="input-group mb-3 col-6">'+
                '<span class="input-group-text" id="inputGroup-sizing-default">Segundo Nombre</span>'+
                '<input type="text" id="segundo_nombre_integrante" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default placeholder="Apellido" value="'+ data[0].segundo_nombre +'"">'+
                '<span id="v3" style="font-size:14px"></span>'+
                '</div>'+
            '</div>'+


            '<div class="d-flex align-items-start">'+

            '<div class="input-group mb-3 col-6">'+
            '<span class="input-group-text" id="inputGroup-sizing-default">Primer Apellido</span>'+
            '<input type="text" id="apellido_integrante" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default placeholder="Apellido" value="'+ data[0].primer_apellido +'"">'+
            '<span id="v4" style="font-size:14px"></span>'+
                '</div>'+
                '<div class="input-group mb-3 col-6">'+
                '<span class="input-group-text" id="inputGroup-sizing-default">Segundo Apellido</span>'+
                '<input type="text" id="segundo_apellido_integrante" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default placeholder="Apellido" value="'+ data[0].segundo_apellido +'"">'+
                '<span id="v5" style="font-size:14px"></span>'+
                '</div>'+


            '</div>'+
            '<div class="d-flex align-items-start">'+

            '<div class="input-group mb-3 col-6">'+
            '<span class="input-group-text" id="inputGroup-sizing-default">Parentezco</span>'+
            '<select class="form-control" id="parentezco_integrante"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"><option value="Padre">Padre</option><option value="Madre">Madre</option><option value="Hijo">Hijo</option><option value="Hija">Hija</option><option value="Conyuge">Conyuge</option></select>'+
            '<span id="v6" style="font-size:14px"></span>'+
                '</div>'+
                '<div class="input-group mb-3 col-6">'+
                '<span class="input-group-text">Genero</span>'+
                '<select class="form-control" id="ID_genero" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"><option value="M">Masculino</option><option value="F">Femenino</option></select>'+
                '<span id="v6" style="font-size:14px"></span>'+
                '</div>'+


            '</div>'+
            '<div class="d-flex align-items-start">'+

            '<div class="input-group mb-3 col-6">'+
            '<span class="input-group-text" id="inputGroup-sizing-default">fecha de nacimiento</span>'+
            '<input type="date" id="fecha_nacimiento" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default value="'+ data[0].fecha_nacimiento +'"">'+
            '<span id="v7" style="font-size:14px"></span>'+
                '</div>'+
                '<div class="input-group mb-3 col-6">'+
                '<span class="input-group-text" id="inputGroup-sizing-default">Nivel educativo</span>'+
                '<input type="text" id="nivel_educativo" value="'+ data[0].nivel_educativo +'" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">'+
                '<span id="v9" style="font-size:14px"></span>'+
                '</div>'+


            '</div>'+
            '<div class="d-flex align-items-start">'+

            '<div class="input-group mb-3 col-6">'+
            '<span class="input-group-text" id="inputGroup-sizing-default">Correo</span>'+
            '<input type="text" id="Correo" value="'+ data[0].correo +'" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">'+
            '<span id="v10" style="font-size:14px"></span>'+
                '</div>'+
                '<div class="input-group mb-3 col-6">'+
                '<span class="input-group-text" id="inputGroup-sizing-default">Telefono</span>'+
                '<input type="text" id="Telefono" value="'+ data[0].telefono +'" class="form-control" maxlength="11" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">'+
                '<span id="v11" style="font-size:14px"></span>'+
                '</div>'+
            '</div>'+
            '<div class="d-flex align-items-start">'+
            '<div class="input-group mb-3 col-6">'+
            '<span class="input-group-text" id="inputGroup-sizing-default">Camisa</span>'+
            '<input type="text" id="Camisa" value="'+ data[0].camisa +'" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">'+
            '<span id="v12" style="font-size:14px"></span>'+
            '</div>'+
                '<div class="input-group mb-3 col-6">'+
                '<span class="input-group-text" id="inputGroup-sizing-default">Pantalon</span>'+
                '<input type="text" id="Pantalon" value="'+ data[0].pantalon +'" class="form-control" maxlength="11" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">'+
                '<span id="v13" style="font-size:14px"></span>'+
                '</div>'+
            '</div>'+
             '<div class="d-flex align-items-center justify-content-center">'+

            '<div class="input-group mb-3 col-6">'+
                '<span class="input-group-text" id="inputGroup-sizing-default">Calzado</span>'+
                '<input type="text" id="Calzado" value="'+ data[0].calzado +'" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">'+
                '<span id="v14" style="font-size:14px"></span>'+
            '</div>'+

            '</div>',
            confirmButtonColor: '#15406D',
            confirmButtonText: "Actualizar",
            width: '800px',
            padding: '1em',
            customClass: {
                modal: 'no-scroll',
            },
            focusConfirm: true,
            preConfirm: () => {
                if(document.getElementById('cedula_integrante').value != ""
                 && document.getElementById('nombre_integrante').value != "" 
                 && document.getElementById('segundo_nombre_integrante').value != "" 
                 && document.getElementById('apellido_integrante').value != "" 
                 && document.getElementById('segundo_apellido_integrante').value != ""
                 && document.getElementById('parentezco_integrante').value != ""
                 && document.getElementById('ID_genero').value != ""
                 && document.getElementById('fecha_nacimiento').value != ""
                 && document.getElementById('nivel_educativo').value != ""
                 ){
                    a = valida_registrar();
                    if (a != "") {
                        return false;
                    }else {
                        if (document.getElementById("Telefono").value == "N/A" || document.getElementById("Telefono").value == "") {
                           var tlfm = "N/A";
                        } else{
                            var tlfm = document.getElementById("Telefono").value;
                        }
                        if (document.getElementById("Correo").value == "N/A" || document.getElementById("Correo").value == "") {
                           var correom = "N/A";
                        } else{
                            var correom = document.getElementById("Correo").value;
                        }
                        if (document.getElementById("Camisa").value == "N/A" || document.getElementById("Camisa").value == "") {
                           var Camisam = "N/A";
                        } else{
                            var Camisam = document.getElementById("Camisa").value;
                        }
                        if (document.getElementById("Pantalon").value == "N/A" || document.getElementById("Pantalon").value == "") {
                           var Pantalonm = "N/A";
                        } else{
                            var Pantalonm = document.getElementById("Pantalon").value;
                        }
                        if (document.getElementById("Calzado").value == "N/A" || document.getElementById("Calzado").value == "") {
                           var Calzadom = "N/A";
                        } else{
                            var Calzadom = document.getElementById("Calzado").value;
                        }
                        $.ajax({
                        type: "POST",
                        url: BASE_URL + "Familias/modificar_integrante",
                        data: { "id": id, 
                                "cedula_persona" : data[0].cedula_persona,
                                "id_familia" : data[0].id_familia,
                                "cedula_integrante": document.getElementById('cedula_integrante').value,
                                "nombre_integrante": document.getElementById("nombre_integrante").value, 
                                "segundo_nombre_integrante": document.getElementById("segundo_nombre_integrante").value, 
                                "apellido_integrante": document.getElementById("apellido_integrante").value,
                                "segundo_apellido_integrante": document.getElementById("segundo_apellido_integrante").value, 
                                "parentezco_integrante": document.getElementById("parentezco_integrante").value,
                                "genero": document.getElementById("ID_genero").value,
                                "fecha_nacimiento": document.getElementById("fecha_nacimiento").value,
                                "nivel_educativo": document.getElementById("nivel_educativo").value,
                                "Correo": correom,
                                "Telefono": tlfm,
                                "Camisa": Camisam,
                                "Pantalon": Pantalonm,
                                "Calzado": Calzadom
                            }
                        }).done(function (result){
                            if(result==1){
                                document.getElementById("validar_editar_integrant").innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">Cedula ya registrada.<i class="far fa-times" id="cerraralert2" data-dismiss="alert" aria-label="Close"></i></div>';
                                setTimeout(function () {
                                    $("#cerraralert2").click();
                                }, 6000);
                            }else if(result==2){
                                document.getElementById("validar_editar_integrant").innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">Padre ya registrado.<i class="far fa-times" id="cerraralert2" data-dismiss="alert" aria-label="Close"></i></div>';
                                setTimeout(function () {
                                    $("#cerraralert2").click();
                                }, 6000);
                                return false;
                            }else if(result==3){
                                document.getElementById("validar_editar_integrant").innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">Madre ya registrado.<i class="far fa-times" id="cerraralert2" data-dismiss="alert" aria-label="Close"></i></div>';
                                setTimeout(function () {
                                    $("#cerraralert2").click();
                                }, 6000);
                            }else if(result==4){
                                document.getElementById("validar_editar_integrant").innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">Conyuge ya registrado.<i class="far fa-times" id="cerraralert2" data-dismiss="alert" aria-label="Close"></i></div>';
                                setTimeout(function () {
                                    $("#cerraralert2").click();
                                }, 6000);
                            }else{
                                swal({
                                    title: "Éxtito",
                                    text: "La persona ha sido modificada satisfactoriamente",
                                    type: "success",
                                    timer: 2000,
                                    showConfirmButton: false,
                                });
                                var integrantes = JSON.parse(result);
                                if(integrantes!=0){
                                    integrantes_agregados.innerHTML="";
                                    for (var i = 0; i < integrantes.length; i++) {
                                            var texto = "";
                                            integrantes.innerHTML = "";
                                            console.log(integrantes);
                                            texto +=
                                            "<table class='table table-striped' style='width:100'><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Cedula</td><td>Nombre y Apellido</td><td>Parentezco</td><td>Fecha de nacimiento</td><td>Genero</td><td>Nivel educativo</td><td>Correo</td><td>Telefono</td><td>Camisa</td><td>Pantalon</td><td>Calzado</td><td>editar</td><td>Eliminar</td></tr>";
                                            for (var i = 0; i < integrantes.length; i++) {
                                                texto +=
                                                "<tr><td>" +
                                                integrantes[i]["cedula_integrante"] +
                                                "</td><td>" +
                                                integrantes[i]["primer_nombre"]+" "+integrantes[i]["primer_apellido"] +
                                                "</td><td>" +
                                                integrantes[i]["parentezco"] +
                                                "</td><td>" +
                                                integrantes[i]["fecha_nacimientoFa"] +
                                                "</td><td>" +
                                                integrantes[i]["genero"] +
                                                "</td><td>" +
                                                integrantes[i]["nivel_educativo"] +
                                                "</td><td>" +
                                                integrantes[i]["correo"] +
                                                "</td><td>" +
                                                integrantes[i]["telefono"] +
                                                "</td><td>" +
                                                integrantes[i]["camisa"] +
                                                "</td><td>" +
                                                integrantes[i]["pantalon"] +
                                                "</td><td>" +
                                                integrantes[i]["calzado"] +
                                                "</td>";
                                                texto +=
                                                "<td><span  onclick='editar_integrante(" + integrantes[i]['id_familia_persona'] + ")' class='fa fa-edit' style='font-size:22px;color:#DC9703;font-weight:bold' title='Editar Integrante' style='font-size:22px'></span></td><td><span onclick='borrar_familia("+integrantes[i]['id_familia_persona']+","+integrantes[i]['cedula_persona']+")' class='iconDelete fa fa-times-circle' title='Eliminar integrante' style='font-size:22px'></span></td></tr>";
                                            }
                                            integrantes_agregados.innerHTML += texto + "<tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Cedula</td><td>Nombre y Apellido</td><td>Parentezco</td><td>Fecha de nacimiento</td><td>Genero</td><td>Nivel educativo</td><td>Correo</td><td>Telefono</td><td>Camisa</td><td>Pantalon</td><td>Calzado</td><td>editar</td><td>Eliminar</td></tr></table>";
                                        }
                                        Swal.close('mi-sweet-alert');   
                                }
                                else{
                                    valid_integrantes.innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">De tener por lo menos un integrante registrado.<i class="far fa-times" id="cerraralert1" data-dismiss="alert" aria-label="Close"></i></div>';
                                    setTimeout(function () {
                                        $("#cerraralert1").click();
                                    }, 6000);
                                }
                            }
                        });
                        return false;
                    }
                }else{
                    document.getElementById("validar_editar_integrant").innerHTML = '<div class="alert alert-dismissible fade show pl-5" style="background:#9D2323; color:white" role="alert">Complete los campos solicitados.<i class="far fa-backspace p-0 m-0 d-none" id="cerraralert" data-dismiss="alert" aria-label="Close"></i></div>';
                    setTimeout(function () {
                        $("#cerraralert").click();
                    }, 3000);
                    return false;
                }
            }
        })
            document.getElementById("parentezco_integrante").value = data[0].parentezco;
            document.getElementById("ID_genero").value = data[0].genero;
            document.getElementById("fecha_nacimiento").value = data[0].fecha_nacimiento;


    document.getElementById("cedula_integrante").onkeypress = function (e) {
        er = /^[0-9]*$/;
        validarkeypress(er, e);
    };
    document.getElementById("cedula_integrante").onkeyup = function () {
    r = validarkeyup(
        keyup_cedula,
        this,
        document.getElementById("v1"),
        "El formato debe ser 99999999"
    );
    };
    document.getElementById("nombre_integrante").onkeypress = function (e) {
         er = /^[A-Za-z\b\u00f1\u00d1\u00E0-\u00FC]*$/;
        validarkeypress(er, e);
    };
    document.getElementById("nombre_integrante").onkeyup = function () {
    r = validarkeyup(
        keyup_nombre,
        this,
        document.getElementById("v2"),
        "Solo letras de 3 a 30 caracteres, siendo la primera en mayúscula."
    );
    };
    document.getElementById("segundo_nombre_integrante").onkeypress = function (e) {
         er = /^[A-Za-z\b\u00f1\u00d1\u00E0-\u00FC]*$/;
        validarkeypress(er, e);
    };
    document.getElementById("segundo_nombre_integrante").onkeyup = function () {
        r = validarkeyup(
            keyup_nombre,
            this,
            document.getElementById("v3"),
            "Solo letras de 3 a 30 caracteres, siendo la primera en mayúscula."
        );
    };
    document.getElementById("apellido_integrante").onkeypress = function (e) {
         er = /^[A-Za-z\b\u00f1\u00d1\u00E0-\u00FC]*$/;
        validarkeypress(er, e);
    };
    document.getElementById("apellido_integrante").onkeyup = function () {
        r = validarkeyup(
        keyup_apellido,
        this,
        document.getElementById("v4"),
        "Solo letras de 3 a 30 caracteres, siendo la primera en mayúscula."
        );
    };
    document.getElementById("segundo_apellido_integrante").onkeypress = function (e) {
         er = /^[A-Za-z\b\u00f1\u00d1\u00E0-\u00FC]*$/;
        validarkeypress(er, e);
    };
    document.getElementById("segundo_apellido_integrante").onkeyup = function () {
        r = validarkeyup(
        keyup_apellido,
        this,
        document.getElementById("v5"),
        "Solo letras de 3 a 30 caracteres, siendo la primera en mayúscula."
        );
    };


    document.getElementById("nivel_educativo").onkeypress = function (e) {
         er = /^[A-Za-z\b\u00f1\u00d1\u00E0-\u00FC]*$/;
        validarkeypress(er, e);
    };
    document.getElementById("nivel_educativo").onkeyup = function () {
        r = validarkeyup(
        generica,
        this,
        document.getElementById("v9"),
        "El campo debe contener de 3 a 25 caracteres"
        );
    };
    document.getElementById("Correo").onkeypress = function (e) {
        er = /^[A-Za-z0-9_\u00d1\u00f1\u00E0-\u00FC@.-]*$/;
        validarkeypress(er, e);
    };
    document.getElementById("Correo").onkeyup = function () {
        r = validarkeyup(
        keyup_correo,
        this,
        document.getElementById("v10"),
        "El formato debe ser ejemplo@gmail.com"
        );
    };
    document.getElementById("Telefono").onkeypress = function (e) {
        er = /^[0-9]*$/;
        validarkeypress(er, e);
    };
    document.getElementById("Telefono").onkeyup = function () {
        r = validarkeyup(
        keyup_telefono,
        this,
        document.getElementById("v11"),
        "Solo numeros de 11 digitos"
        );
    };

    document.getElementById("Camisa").onkeyup = function () {
        r = validarkeyup(
        Camisa,
        this,
        document.getElementById("v12"),
        "El campo camisa debe contener letras de 1 a 30 caracteres"
        );
    };

    document.getElementById("Pantalon").onkeyup = function () {
        r = validarkeyup(
        Pantalon,
        this,
        document.getElementById("v13"),
        "El campo pantalon debe contener letras de 1 a 30 caracteres"
        );
    };

    document.getElementById("Calzado").onkeyup = function () {
        r = validarkeyup(
        Calzado,
        this,
        document.getElementById("v14"),
        "El campo calzado debe contener letras de 1 a 30 caracteres"
        );
    };

        });
    }

    function validarkeypress(er, e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key);
        a = er.test(tecla);
        if (!a) {
            e.preventDefault();
        }
    }


    function valida_registrar() {
      var error = false;
      cedula_integrante = validarkeyup(
        keyup_cedula,
        document.getElementById("cedula_integrante"),
        document.getElementById("v1"),
        "El campo debe contener de 5 a 8 caracteres"
      );
      nombre_integrante = validarkeyup(
        keyup_nombre,
        document.getElementById("nombre_integrante"),
        document.getElementById("v2"),
        "El campo debe contener de 5 a 8 caracteres"
      );
      segundo_nombre_integrante = validarkeyup(
        keyup_nombre,
        document.getElementById("segundo_nombre_integrante"),
        document.getElementById("v3"),
        "El campo debe contener de 3 a 25 caracteres"
      );
      apellido_integrante = validarkeyup(
        keyup_apellido,
        document.getElementById("apellido_integrante"),
        document.getElementById("v4"),
        "El campo debe contener de 3 a 25 caracteres"
      );
      segundo_apellido_integrante = validarkeyup(
        keyup_apellido,
        document.getElementById("segundo_apellido_integrante"),
        document.getElementById("v5"),
        "El campo debe contener de 3 a 25 caracteres"
      );

      nivel_educativo = validarkeyup(
        generica,
        document.getElementById("nivel_educativo"),
        document.getElementById("v9"),
        "El campo debe contener de 3 a 25 caracteres"
      );
      if (
        cedula_integrante == 0 ||
        nombre_integrante == 0 ||
        segundo_nombre_integrante == 0 ||
        apellido_integrante == 0 ||
        segundo_apellido_integrante == 0 ||
        nivel_educativo == 0
      ) {
        //variable==0, indica que hubo error en la validacion de la etiqueta
        error = true;
      }
      return error;
    }

    
function validarkeyup(er, etiqueta, etiquetamensaje, mensaje) {
  a = er.test(etiqueta.value);
  if (!a) {
    etiquetamensaje.innerText = mensaje;
    etiquetamensaje.style.color = "red";
    etiqueta.classList.add("is-invalid");
    return 0;
  } else {
    etiquetamensaje.innerText = "";
    etiqueta.classList.remove("is-invalid");
    etiqueta.classList.add("is-valid");
    return 1;
  }
}

function borrar_familia(id,cedula_param){
    swal({
      type:"warning",
      title:"¿Está seguro?",
      text:"Está por eliminar este integrantes , ¿desea continuar?",
      showCancelButton:true,
      confirmButtonText:"Si, continuar",
      cancelButtonText:"No"
  },function(isConfirm){
      if(isConfirm){
        $.ajax({
          type:"POST",
          url:BASE_URL+"Familias/eliminar_integrantes",
          data:{"id_familia_persona":id,"cedula_persona":cedula_param}
      }).done(function(result){
        var integrantes = JSON.parse(result);
        if(integrantes!=0){
            integrantes_agregados.innerHTML="";
            for (var i = 0; i < integrantes.length; i++) {
            var texto = "";
            integrantes.innerHTML = "";
            console.log(integrantes);
            texto +=
                "<table class='table table-striped' style='width:100'><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Cedula</td><td>Nombre y Apellido</td><td>Parentezco</td><td>Fecha de nacimiento</td><td>Genero</td><td>Nivel educativo</td><td>Correo</td><td>Telefono</td><td>Camisa</td><td>Pantalon</td><td>Calzado</td><td>editar</td><td>Eliminar</td></tr>";
            for (var i = 0; i < integrantes.length; i++) {
                texto +=
                "<tr><td>" +
                integrantes[i]["cedula_integrante"] +
                "</td><td>" +
                integrantes[i]["primer_nombre"]+" "+integrantes[i]["primer_apellido"] +
                "</td><td>" +
                integrantes[i]["parentezco"] +
                "</td><td>" +
                integrantes[i]["fecha_nacimientoFa"] +
                "</td><td>" +
                integrantes[i]["genero"] +
                "</td><td>" +
                integrantes[i]["nivel_educativo"] +
                "</td><td>" +
                integrantes[i]["correo"] +
                "</td><td>" +
                integrantes[i]["telefono"] +
                "</td><td>" +
                integrantes[i]["camisa"] +
                "</td><td>" +
                integrantes[i]["pantalon"] +
                "</td><td>" +
                integrantes[i]["calzado"] +
                "</td>";
                texto +=
                "<td><span  onclick='editar_integrante(" + integrantes[i]['id_familia_persona'] + ")' class='fa fa-edit' style='font-size:22px;color:#DC9703;font-weight:bold' title='Editar Integrante' style='font-size:22px'></span></td><td><span onclick='borrar_familia("+integrantes[i]['id_familia_persona']+","+integrantes[i]['cedula_persona']+")' class='iconDelete fa fa-times-circle' title='Eliminar integrante' style='font-size:22px'></span></td></tr>";
            }
            integrantes_agregados.innerHTML += texto + "<tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Cedula</td><td>Nombre y Apellido</td><td>Parentezco</td><td>Fecha de nacimiento</td><td>Genero</td><td>Nivel educativo</td><td>Correo</td><td>Telefono</td><td>Camisa</td><td>Pantalon</td><td>Calzado</td><td>editar</td><td>Eliminar</td></tr></table>";
            }
        }
        else{
        valid_integrantes.innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">De tener por lo menos un integrante registrado.<i class="far fa-times" id="cerraralert1" data-dismiss="alert" aria-label="Close"></i></div>';
        setTimeout(function () {
            $("#cerraralert1").click();
        }, 6000);
        }
          
      })
  }
});
}

function actualizar_integrantes(result,cedula_param){

  var enfermedades = document.getElementById('integrantes_agregados'); 
  if(result!=0){
    enfermedades.innerHTML = "";
    for (var i = 0; i < result.length; i++) {
      enfermedades.innerHTML += " <table style='width:95%'><tr><td>- " + result[i]["cedula_persona"] + "</td><td style='text-align:right'><span onclick='borrar_familia("+result[i]['id_familia_persona']+","+result[i]['cedula_persona']+")' class='iconDelete fa fa-times-circle' title='Eliminar' style='font-size:22px'></span></td></tr></table><br><hr>";
  }
}

}
var integrantes_input=document.getElementById("integrante_input");
var integrantes=[];
var valid_integrantes=document.getElementById("valid_5");
var div_integrantes=document.getElementById("integrantes_agregados");

function valid_integrantes_agregados(){
    var validar=true;
    for(var i=0;i<integrantes.length;i++){
        if(integrantes[i]==integrantes_input.value){
            validar=false;
        }
    }

    if(!validar){
        valid_integrantes.innerHTML='Ya esta persona fue agregada';
    }

    return validar;
}
</script>
