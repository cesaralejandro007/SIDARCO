<?php include (call."Inicio.php"); ?>
<?php include (call."data-table.php"); ?>

<div class="modal fade" id="agregar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar Vacunados</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo constant('URL'); ?>Personas/Asignar_Vacunas" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                <!-- card-body  -->
                <div class="card-body">
                    <div class="card-block">
                        <div class="form-group row justify-content-center">
                            <div class="col-md-12 mt-2">
                                <label for="cedula_persona">
                                    Cédula
                                </label>
                                <div class="input-group">
                                    <input list="cedula_p" id="cedula_persona" name="cedula_persona" class="form-control no-simbolos letras_numeros" placeholder="Cedula de Persona" oninput="Limitar(this,15)"/>
                                    <datalist id="cedula_p">
                                        <?php foreach ($this->personas as $persona) {   ?>
                                            <option value="<?php echo $persona["cedula_persona"]; ?>">
                                                <?php echo $persona["primer_nombre"] . " " . $persona["primer_apellido"]; ?>
                                            </option>
                                        <?php  }   ?>
                                    </datalist>

                                </div>
                            </div>

                            <!--  <div class="col-md-12 mt-2">
                                <label for="nombre_vacuna">Nombre</label>
                                <div>
                                    <input type="text" class="form-control" id="nombre_vacuna" name="nombre_vacuna" placeholder="Indique el nombre de la vacuna">
                                </div>
                            </div> -->

                            <div class="col-md-12 mt-2">
                                <label for="">
                                    Vacunas
                                </label>
                                <table class="table table-bordered" id="tabla">
                                    <tr>
                                        <td class="col-6">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="nombre_vacunas" name="nombre_vacunas[]" placeholder="Nombre de vacuna">
                                            </div>
                                        </td>
                                        <td class="col-6">
                                            <div class="input-group">
                                                <select class="custom-select" id="dosis" name="dosis[]">
                                                    <option value="Dosis Unica">
                                                        Dosis única
                                                    </option>
                                                    <option value="Primera Dosis"> 
                                                        Primera Dosis
                                                    </option>
                                                    <option value="Segunda Dosis">
                                                        Segunda Dosis
                                                    </option>
                                                    <option value="Tercera Dosis">
                                                        Tercera Dosis
                                                    </option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="col-6">
                                            <div class="input-group">
                                                <input class="form-control no-simbolos" id="fecha" name="fecha[]" type="date">
                                            </div>
                                        </td>
                                        <td class="">
                                            <div class="input-group ">
                                                <button type="button" name="agregar" id="agregar_v" class="btn btn-primary">Agregar</button>
                                            </div>

                                        </td>

                    
                                    </tr>
                                </table>
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

            <script>
    $(document).ready(function() {
        var i = 0;

        $('#agregar_v').click(function() {
            var html0 =
                '<tr id="row' + i + '" >' +
                '<td class="col-6">' + 
                '<div class="input-group"><input type="text" class="" id=""><select class="custom-select" id="dosis" name="dosis[]"><option selected value="Dosis Unica">Primera Dosis</option><option value="Dosis Unica">Dosis Única</option><option value="Dosis Unica">Tercera Dosis</option></select></div>' +
                '</td>' +   
                '</tr>';
            var html1 =
                '<tr id="row' + i + '" >' +
                '<td class="col-6">' +
                '<div class="input-group"><input type="text" class="form-control" placeholder="Nombre de vacuna" name="nombre_vacuna[]"></div>' +
                '</td>' +
                '<td class="col-6">' +
                '<div class="input-group"><select class="custom-select" id="dosis" name="dosis[]"><option selected value="Dosis Unica">Dosis Única</option><option selected value="Primera Dosis">Primera Dosis</option><option value="Segunda Dosis">Segunda Dosis</option><option value="Tercera Dosis">Tercera Dosis</option></select></div>' +
                '</td>' +
                '<td class="col-6">' +
                '<div class="input-group"><input class="form-control no-simbolos" id="fecha" name="fecha[]" type="date"></div>' +
                '</td>' +
                '<td>' +
                '<button type="button" style="background:#9D2323;" name="eliminar" id="' + i +
                '" class=" eliminar">X</button>' +
                '</td>' +
                '</tr>';
            var html2 =
                '<tr id="row' + i + '" >' +
                '<td class="col-6">'+
                '<div class="input-group"><input type="text" placeholder="Nombre de vacuna" class="" id="" name="nombre_vacuna[]"></div>'
                '<td class="col-6">' +
                '<div class="input-group"><select class="custom-select" id="dosis" name="dosis[]"><option value="Primera Dosis">Primera Dosis</option><option selected value="Segunda Dosis">Segunda Dosis</option><option value="Tercera Dosis">Tercera Dosis</option></select></div>' +
                '</td>' +
                '<td class="col-6">' +
                '<div class="input-group"><input class="form-control no-simbolos" id="fecha" name="fecha[]" type="date"></div>' +
                '</td>' +
                '<td>' +
                '<button type="button" name="eliminar" id="' + i +
                '" class="btn btn-danger eliminar">X</button>' +
                '</td>' +
                '</tr>';
            var html3 =
                '<tr id="row' + i + '" >' +
                '<td class="col-6">' +
                '<div class="input-group"><select class="custom-select" id="dosis" name="dosis[]"><option value="Primera Dosis">Primera Dosis</option><option value="Segunda Dosis">Segunda Dosis</option><option selected value="Tercera Dosis">Tercera Dosis</option></select></div>' +
                '</td>' +
                '<td class="col-6">' +
                '<div class="input-group"><input class="form-control no-simbolos" id="fecha" name="fecha[]" type="date"></div>' +
                '</td>' +
                '<td>' +
                '<button type="button" name="eliminar" id="' + i +
                '" class="btn btn-danger eliminar">X</button>' +
                '</td>' +
                '</tr>';

            
                if (i <= 1) {
                    $('#tabla').append(html1);
                } else {
                    if (i <= 2) {
                        document.getElementById("texto").innerHTML = "No puede agregar más";
                    } else {

                    }
                }
                
            i == 3 ? i = 3 : i++;
            console.log(i); 

        });

        $(document).on('click', '.eliminar', function() {
            var boton = $(this).attr("id");
            $('#row' + boton + '').remove();
            i == 1 ? i = 1 : i--;
            document.getElementById("texto").innerHTML = "";
            console.log(i);
        });


        $(document).on('click', '#enviar', function() {
            if (document.getElementById("cedula_persona").value != "" ) {


                var todos_inputs = $('#tabla :input');
                var nombre =[];
                var dosis = [];
                var fecha = [];
                var validado = true;

                for (var i = 0; i < todos_inputs.length; i++) {
                    if (todos_inputs[i].type == 'text') {
                        dosis.push(todos_inputs[i].value);

                    }
                }
                for (var i = 0; i < todos_inputs.length; i++) {
                    if (todos_inputs[i].type == 'date') {
                        if (todos_inputs[i].value == "") {
                            validado = false;
                        }  else {
                            fecha.push(todos_inputs[i].value);
                        }
                    }
                } 
/* 
/*                if (validado == false || validado == true) { */
                /*  swal({
                        type: "error",
                        title: "Error",
                        text: "Debe agregar las fechas de vacunación",
                        timer: 2000,
                        showConfirmButton: false
                    });
                } else */ 
                    $.ajax({
                        type: "POST",
                        url: BASE_URL + "Personas/consulta_vacunado",
                        data: {
                            "cedula": document.getElementById("cedula_persona").value
                        }
                    }).done(function(result) {
                        console.log(result);
                        if (result) {
                            swal({
                                type: "success",
                                title: "Éxito",
                                text: "Se ha registrado la vacuna exitosamente",
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                    });

                            setTimeout(function() {
                                document.getElementById("formulario").submit();
                            }, 1000);
                        } else {
                            swal({
                                type: "error",
                                title: "Error",
                                text: "Esta persona ya se encuentra registrada como vacunada",
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                    });
 /*
                }
            } *//*  else {
                swal({
                    type: "error",
                    title: "Error",
                    text: "Debe seleccionar una persona",
                    timer: 2000,
                    showConfirmButton: false
                });
            });
 */

/* 
        });
    }); */
});
/* }); */


</script>

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


<!-- Fin del modal de registrar vacunados/as -->



<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Consulta de Vacunas </h1>
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
                <h3 class="card-title">Consulta y exportación de datos</h3>

            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
            <button class="btn btn-info" id="btn_nuevo" type='button'>Registrar Vacunado</button>
                <table id="example1" class="table table-bordered  table-hover">
                    <thead>
                        <tr>
                        <th style="width: 115px;">Acciones</th>
                            <th>Cédula</th>
                            <th>Nombre y apellido</th>
                            <th>Nombre de la vacuna</th>
                            <th>Dosis</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <script>
                        $(function() {
                            $.ajax({
                                type: 'POST',
                                url: BASE_URL + 'Personas/Consultas_Vacunas_Ajax'
                            }).done(function(datos) {
                                alert(datos);
                                var data = JSON.parse(datos);
                                var tabla = $("#example1").DataTable({
                                    "data": data,   
                                    "columns": [
                                        {
                                            "data": function(data) {
                                                return '<td class="text-center">' +
                                                    '<a href="javascript:void(0)" style="margin-right: 5px; background:#EEA000;" class="btn btnEditar" onclick="editar(this)"  title="Actualizar"  type="button" >' +
                                                    '<i class="fa fa-edit" style="color: white;"></i>' +
                                                    '</a>' +
                                                    '<a href="javascript:void(0)" style="margin-right: 5px; background:#9D2323;" class="btn  mensaje-eliminar" title="Eliminar">' +
                                                    '<i class="fa fa-trash" style="color: white;"></i>' +
                                                    '</a>' +
                                                    '<p style="display: none;">' + data
                                                    .cedula_persona + '</p>' +
                                                    '</td>';
                                            }
                                        },
                                        {
                                            "data": "cedula_persona"
                                        },
                                        {
                                            "data": "nombre_apellido"
                                        },
                                        {
                                            "data": "nombre_vacuna"
                                        },
                                        {
                                            "data": "dosis"
                                        },
                                        {
                                            "data": "fecha_vacuna"
                                        },

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

                                    
                                    
                 $(document).on("click", ".mensaje-eliminar", function () {
                fila = $(this).closest("tr");
                cedula_persona = fila.find("td:eq(0)").text();


                swal(
                    {
                        title: "¿Desea Eliminar este Elemento?",
                        text: "El elemento seleccionado sera eliminado de manera permanente!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Si, Eliminar!",
                        cancelButtonText: "No, Cancelar!",
                        closeOnConfirm: false,
                        closeOnCancel: false,
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                url: BASE_URL + "Personas/Eliminar_Vacunados",
                                type: "POST",
                                data: {
                                    cedula_persona: cedula_persona,
                                },
                            }).done(function (result) {
                                if (result != 0) {
                                    swal({
                                        title: "Eliminado!",
                                        text: "El elemento fue eliminado con exito.",
                                        type: "success",
                                        showConfirmButton: false,
                                    }); 
                                    setTimeout(function () {
                                        location.reload();
                                    }, 2000);

                                    // tabla.ajax.reload(null, false);
                                }
                            });
                        } else {
                            swal("Cancelado", "La accion fue cancelada, la informacion esta segura.", "error");
                        }
                    }
                );
            });
                            }).fail(function() {
                                alert("error")
                            })


                        });
                        </script>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Acciones</th>
                            <th>Cédula</th>
                            <th>Nombre y apellido</th>
                            <th>Nombre de la vacuna</th>
                            <th>Dosis</th>
                            <th>Fecha</th>
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
<!-- <?php include modal."ver-vacuna.php"; ?> -->
<?php include modal."editar-vacuna.php"; ?>
<!-- /.content-wrapper -->
<?php include modal."agregar-vacunados.php"  ?>
<script type="text/javascript" src="<?php echo constant('URL')?>config/js/news/consultar-vacunados.js"></script> 
<?php include (call."Fin.php"); ?>