<?php include call . "Inicio.php";?>
<?php include call . "data-table.php";?>


<div class="modal fade" id="agregar">
    <div class="modal-dialog modal-ls">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar presión arterial</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" enctype="multipart/form-data" id="formulario" method="POST" name="formulario">
                    <!-- card-body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Persona</label> <span id='valid_persona' style='color:red'></span>
                                <table style='width:100%'><tr><td>
                                    <input type="number" maxlength="15" placeholder="Buscar cédula" class='form-control ' id='cedula_propietario' name="datos[cedula_propietario]" list='lista_personas' oninput="Limitar(this,15)">
                                    <datalist id='lista_personas'>
                                        <?php foreach ($this->datos["personas"] as $p) { ?>
                                            <option value='<?php echo $p['cedula_persona'];?>'><?php echo $p['primer_nombre']." ".$p['segundo_nombre']; ?></option>
                                        <?php } ?>
                                    </datalist></td>
<!--                                     <td><button type='button' class="btn btn-info" id='seleccionar_persona'>Seleccionar</button></td> 
 -->                                    </tr>
                                </table>
                            </div>

                            <div id='second' style='display:'>
                                <div class='row'>
                                    <div class="col-md-12">
                                        <label>Historial de presión arterial de <span id='nombre_persona'></span></label>
                                        <table style='width:100%'><tr>
                                            <td>
                                            <span id='valid_tension' style='color:red'></span>
                                            <input type="text" class='form-control ' id='t_a' placeholder="Tensión arterial" name="datos[tension]">
                                            </td>
                                            <td>
                                            <span id='valid_frecuencia' style='color:red'></span>
                                            <input type="text" class='form-control ' id='f_c' placeholder="Frecuencia cardiaca" name="datos[frecuencia]">
                                            </td>
                                            <td>
                                                <span id="valid_nota" style="color:red;"></span>
                                                <input type="text" class="form-control" id="nota" name="datos[nota]" placeholder="Nota (opcional)">
                                            </td>
                                        </tr></table>
                                    </div>
                                </div>
                                <br>
                                <!-- /.card-body -->
                                <center><input type="button" onclick="desabilitar()" class="btn" style="background:#15406D; color:white" name="" id="enviar" value="Guardar"></center>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <!--Footer -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog --> 
</div>
<!-- /.modal -->


<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Consulta de presión arterial</h1>
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
                <h3 class="card-title">Consulta y exportacion datos</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            
                <button class='btn btn-info' type='button' onclick="desabilitar2()" id='btn_presion_arterial'>Registrar presión arterial</button>
                <table id="example1" class="table table-bordered  table-hover">
                    <thead>
                        <tr>
                        <?php if ($_SESSION['Discapacitados']['modificar']) {?>
                                <th style="width: 20px;">Editar</th>
                            <?php }?>
                            <?php if ($_SESSION['Discapacitados']['eliminar']) {?>
                                <th style="width: 20px;">Eliminar</th>
                            <?php }?>
                            <th>Cédula - Nombre y apellido</th>
                            <th>Edad</th>
                            <th>Género</th>
                            <th>Fecha de presión</th>
                            <th>Tensión arterial</th>
                            <th>Frecuencia cardiaca</th>
                            <th>Nota</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <script>
$(function() {
    $.ajax({
        type: "POST",
        url: BASE_URL + "presion_arterial/Administrar",
        data: {
            peticion: "Consulta_Ajax",
        },
    }).done(function(datos) {
        var data = JSON.parse(datos);
        console.log(data);
    var table = $("#example1").DataTable({
        dom: "B<'row'<'col-sm-6'><'col-sm-6'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'li><'col-sm-7'p>>",
      orderCellsTop: true,
      fixedHeader: true,    
        "data": data,
    })
        /* var discapacidades = [];
        var div_discapacidades = document.getElementById("presiones_agregadas"); */
        $("#example1").DataTable({
            "data": data,
            "columns": [
                <?php if ($_SESSION['Discapacitados']['modificar']) {?> {
                    "data": "editar"
                }, <?php }?>
                <?php if ($_SESSION['Discapacitados']['eliminar']) {?> {
                    "data": "eliminar"
                }
                <?php }?>, {
                    "data": "cedula_nombre"
                }, {
                    "data":"edad"
                },{
                    "data":"genero"
                },{
                    "data": "fecha"
                }, {
                    "data": "t_a"
                }, {
                    "data": "f_c"
                },{
                    "data": "nota"
                }
            ],
            "responsive": true,
            "autoWidth": false,
            "ordering": true,
            "info": true,
            "processing": true,
            "pageLength": 10,
            "lengthMenu": [5, 10, 20, 30, 40, 50, 100]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $(document).on('click', '.editar', function() {
            fila = $(this).closest("tr");
            cedula = fila.find('td:eq(0)').text();
            nombre = fila.find('td:eq(1)').text();
            $('#cedula').val(cedula);
            $('#nombre').val(nombre);
        });

        $(document).on('click', '#enviar', function() {
            $.ajax({
                type: "POST",
                url: BASE_URL + "presion_arterial/Administrar",
                data: {
                    cedula: $('#cedula').val(),
                    discapacidades: discapacidades,
                    peticion: "Registrar",
                    sql: "SQL_06",
                    accion: "Se ha Actualizado el historial de presión de: " + $('#cedula').val(),
                },
            }).done(function(result) {
                if (result == 1) {
                    swal({
                        title: "Actualizado!",
                        text: "El elemento fue Actualizado con exito.",
                        type: "success",
                        showConfirmButton: false
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                } else {
                    swal({
                        title: "ERROR!",
                        text: "Ha ocurrido un Error.</br>" + result,
                        type: "error",
                        html: true,
                        showConfirmButton: true,
                        customClass: "bigSwalV2",
                    });
                }
            });
        });
    }).fail(function() {
        alert("error")
    })
});
</script>
</tbody>
<tfoot>
    <tr>
   <!--  <?php if ($_SESSION['Discapacitados']['modificar']) {?> -->
        <th style="width: 20px;">Editar</th>
    <?php }?>
    <?php if ($_SESSION['Discapacitados']['eliminar']) {?>
        <th style="width: 20px;">Eliminar</th>
    <?php }?>
       <th>Cédula - Nombre y apellido</th>
       <th>Edad</th>
       <th>Género</th>
       <th>Fecha de presión</th>
       <th>Tensión arterial</th>
       <th>Frecuencia cardiaca</th>
       <th>Nota</th>
     
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
<?php include modal ."editar-presion-arterial.php";?>
<!-- /.content-wrapper -->
<?php include modal."agregar-presion-arterial.php" ?>
<script src="<?php echo constant('URL') ?>config/js/news/registrar_presion_arterial.js"></script>
<?php include call ."Fin.php";?>
<?php include call ."style-agenda.php";?>



