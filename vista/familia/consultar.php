<?php include (call."Inicio.php"); ?>
<?php include (call."data-table.php"); ?>

<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Consulta de Familias </h1>
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
                <h3 class="card-title">Consulta y Exportacion de Datos de Usuarios</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Familia</th>
                            <th>Descripción</th>
                            <th>Responsable de Familia</th>
                            <th>Integrantes</th>
                            <?php if($_SESSION['Nucleo familiar']['modificar']){ ?>
                                <th style="width: 20px;">Editar</th>
                            <?php } ?>
                            <?php if($_SESSION['Nucleo familiar']['eliminar']){ ?>
                                <th style="width: 20px;">Eliminar</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <script>

                            $(function() {
                                $.ajax({
                                    type: 'POST',
                                    url: BASE_URL + 'Familias/consultar_info_familia'
                                }).done(function(datos) {
                                    var data = JSON.parse(datos);

                                    $("#example1").DataTable({
                                        "data": data,
                                        "columns": [{
                                            "data": "familia"
                                        },
                                        {
                                            "data": "descripcion"
                                        },
                                        {
                                            "data": "responsable"
                                        },
                                        {
                                            "data":"integrantes"
                                        },
                                        <?php if($_SESSION['Nucleo familiar']['modificar']){ ?>
                                            {
                                                "data": "editar"
                                            },
                                        <?php } ?>
                                        <?php if($_SESSION['Nucleo familiar']['eliminar']){ ?>  
                                            {
                                                "data": "eliminar"
                                            }
                                        <?php } ?>
                                        ],
                                        "responsive": true,
                                        "autoWidth": false,
                                        "ordering": true,
                                        "info": true,
                                        "processing": true,
                                        "pageLength": 10,
                                        "lengthMenu": [5, 10, 20, 30, 40, 50, 100]
                                    }).buttons().container().appendTo(
                                    '#example1_wrapper .col-md-6:eq(0)');

                                    
                                }).fail(function() {
                                    alert("error")
                                })

                                $(document).on('click', '#enviar', function() {
                                    var nombre_familia=document.getElementById("nombre_familia");
                                    var descripcion_familia=document.getElementById('descripcion_familia');
                                    var responsable=document.getElementById("responsable_familia");
                                    var datos_familia=new Object();
                                    datos_familia['nombre_familia']=nombre_familia.value;
                                    datos_familia['descripcion_familia']=descripcion_familia.value;
                                    datos_familia['responsable_familia']=responsable.value;
alert(nombre_familia.value);
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
                                                    valid_integrantes.innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">Esta persona no está registrada.<i class="far fa-times" id="cerraralert1" data-dismiss="alert" aria-label="Close"></i></div>';
                                                    setTimeout(function () {
                                                        $("#cerraralert1").click();
                                                    }, 6000);
                                                }else if(integrantes==1){
                                                    valid_integrantes.innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">El integrante ya se encuetra registrado en la familia.<i class="far fa-times" id="cerraralert1" data-dismiss="alert" aria-label="Close"></i></div>';
                                                    setTimeout(function () {
                                                        $("#cerraralert1").click();
                                                    }, 6000);
                                                }else if(integrantes==2){
                                                    valid_integrantes.innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">Un padre ya se encuetra registrado en la familia.<i class="far fa-times" id="cerraralert1" data-dismiss="alert" aria-label="Close"></i></div>';
                                                    setTimeout(function () {
                                                        $("#cerraralert1").click();
                                                    }, 6000);
                                                }else if(integrantes==3){
                                                    valid_integrantes.innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">Una madre ya se encuetra registrado en la familia.<i class="far fa-times" id="cerraralert1" data-dismiss="alert" aria-label="Close"></i></div>';
                                                    setTimeout(function () {
                                                        $("#cerraralert1").click();
                                                    }, 6000);
                                                    valid_integrantes.innerHTML='<div class="alert alert-dismissible fade show p-2" style="background:#9D2323; color:white" role="alert">Un conyugue ya se encuetra registrado en la familia.<i class="far fa-times" id="cerraralert1" data-dismiss="alert" aria-label="Close"></i></div>';
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
                                                        "<table class='table table-striped' style='width:100'><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Cedula</td><td>Nombre y Apellido</td><td>Parentezco</td><td>editar</td><td>Eliminar</td></tr>";
                                                    for (var i = 0; i < integrantes.length; i++) {
                                                        texto +=
                                                        "<tr><td>" +
                                                        integrantes[i]["cedula_integrante"] +
                                                        "</td><td>" +
                                                        integrantes[i]["primer_nombre"]+" "+integrantes[i]["primer_apellido"] +
                                                        "</td><td>" +
                                                        integrantes[i]["parentezco"] +
                                                        "</td>";
                                                        texto +=
                                                        "<td><span onclick='borrar(" + integrantes[i]['id_familia_persona'] + ")' class='fa fa-edit' style='font-size:22px;color:#DC9703;font-weight:bold' title='Editar Integrante' style='font-size:22px'></span></td><td><span onclick='borrar_familia("+integrantes[i]['id_familia_persona']+","+integrantes[i]['cedula_persona']+")' class='iconDelete fa fa-times-circle' title='Eliminar integrante' style='font-size:22px'></span></td></tr>";
                                                    }
                                                    integrantes_agregados.innerHTML += texto + "<tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Cedula</td><td>Nombre y Apellido</td><td>Parentezco</td><td>editar</td><td>Eliminar</td></tr></table>";
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
                            <th>Familia</th>
                            <th>Descripció<noscript></noscript></th>
                            <th>Responsable de Familia</th>
                            <th>Integrantes</th>
                            <?php if($_SESSION['Nucleo familiar']['modificar']){ ?>
                                <th>Editar</th>
                            <?php } ?>
                            <?php if($_SESSION['Nucleo familiar']['eliminar']){ ?>
                                <th>Eliminar</th>
                            <?php } ?>
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
<?php include modal."editar-familia.php"; ?> 
<!-- /.content-wrapper -->
<?php include (call."Fin.php"); ?>
<?php include (call."style-agenda.php"); ?>
<script type="text/javascript" src="<?php echo constant('URL')?>config/js/news/consultar-familias.js"></script>

<script type="text/javascript">
    function editar(id_familia_persona,id_familia,responsable_cedula){
        $("#actualizar").modal({ backdrop: "static", keyboard: false });
     $.ajax({
         type:"POST",
         url:BASE_URL+"Familias/consultar_familia_datos",
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
                "<table class='table table-striped' style='width:100'><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Cedula</td><td>Nombre y Apellido</td><td>Parentezco</td><td>editar</td><td>Eliminar</td></tr>";
            for (var i = 0; i < data.length; i++) {
                texto +=
                "<tr><td>" +
                data[i]["cedula_integrante"] +
                "</td><td>" +
                data[i]["primer_nombre"]+" "+data[i]["primer_apellido"] +
                "</td><td>" +
                data[i]["parentezco"] +
                "</td>";
                texto +=
                "<td><span onclick='borrar(" + data[i]['id_familia_persona'] + ")' class='fa fa-edit' style='font-size:22px;color:#DC9703;font-weight:bold' title='Editar Integrante' style='font-size:22px'></span></td><td><span onclick='borrar_familia("+data[i]['id_familia_persona']+","+data[i]['cedula_persona']+")' class='iconDelete fa fa-times-circle' title='Eliminar integrante' style='font-size:22px'></span></td></tr>";
            }
            integrantes_agregados.innerHTML += texto + "<tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Cedula</td><td>Nombre y Apellido</td><td>Parentezco</td><td>editar</td><td>Eliminar</td></tr></table>";
            }
        }

    });
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
                "<table class='table table-striped' style='width:100'><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Cedula</td><td>Nombre y Apellido</td><td>Parentezco</td><td>editar</td><td>Eliminar</td></tr>";
            for (var i = 0; i < integrantes.length; i++) {
                texto +=
                "<tr><td>" +
                integrantes[i]["cedula_integrante"] +
                "</td><td>" +
                integrantes[i]["primer_nombre"]+" "+integrantes[i]["primer_apellido"] +
                "</td><td>" +
                integrantes[i]["parentezco"] +
                "</td>";
                texto +=
                "<td><span onclick='borrar(" + integrantes[i]['id_familia_persona'] + ")' class='fa fa-edit' style='font-size:22px;color:#DC9703;font-weight:bold' title='Editar Integrante' style='font-size:22px'></span></td><td><span onclick='borrar_familia("+integrantes[i]['id_familia_persona']+","+integrantes[i]['cedula_persona']+")' class='iconDelete fa fa-times-circle' title='Eliminar integrante' style='font-size:22px'></span></td></tr>";
            }
            integrantes_agregados.innerHTML += texto + "<tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td>Cedula</td><td>Nombre y Apellido</td><td>Parentezco</td><td>editar</td><td>Eliminar</td></tr></table>";
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
