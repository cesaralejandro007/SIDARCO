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
                                    <select name="datos[tipo_permiso]" id="tipo_permiso" class="form-control" style="width: 360px height: 30px " >
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

 <script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
 </script>


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

                            $(function(){
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
                                                        var fecha_inicio=document.getElementById("fecha_inicio");
                                                        var fecha_cierre=document.getElementById("fecha_cierre");
                                                        var motivo=document.getElementById("motivo");
                                                        var tipo_permiso=document.getElementById("tipo_permiso");
                                                        var datos_permiso=new Object();
                                                        datos_permiso['fecha_inicio']=fecha_inicio.value;
                                                        datos_permiso['fecha_cierre']=fecha_cierre.value;
                                                        datos_permiso['motivo']=motivo.value;
                                                        datos_permiso['tipo_permiso']=tipo_permiso.value;
                                                        $.ajax({
                                                        type:"POST",
                                                        url:BASE_URL+"permisos/actualizar_permiso",
                                                        data:{"datos":datos_permiso}
                                                    }).done(function(result){
                                                    console.log(result);
                                                    swal({
                                                        title:"Éxito",
                                                        text:"Permiso actualizado satisfactoriamente",
                                                        timer:2000,
                                                        showConfirmButton:false,
                                                        type:"success"
                                                    });
                                                    setTimeout(function(){location.href=BASE_URL+"permisos/registros";},2000);
                                                });
                                            }
                                        });
                             });

                               /*  $(document).on('click', '#btn_agregar', function() {
                                    
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
                               }); */
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

