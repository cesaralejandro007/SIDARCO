<?php include (call."Inicio.php"); ?>
<?php include (call."data-table.php"); ?>
<?php include (call."main.php"); ?>

<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Consulta de Personas </h1>
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
                <h3 class="card-title">Consulta y Exportacion de Datos de Personas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body" >
            <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header" style="background:#AEB6BF;">
                            <h3 class="card-title font-weight-bold">CRITERIOS DE BUSQUEDA</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus" style="color:black"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class=" d-flex flex-wrap justify-content-center">
                                        <div style="" class="m-1">
                                            <input type="text" id="Cedulaf" class="form-control" placeholder="Cedula" data-index="3">
                                        </div>
                                        <div style="" class="m-1">
                                            <input type="text" id="Nombref" class="form-control" placeholder="Nombre" data-index="4">
                                        </div>
                                        <div style="" class="m-1">
                                            <input type="text" id="Apellidof" class="form-control" placeholder="Apellido" data-index="6">
                                        </div>
                                        <div style="" class="m-1">
                                            <input type="text" id="Generof" class="form-control" placeholder="Genero" data-index="8">
                                        </div>
                                        <div style="" class="m-1">
                                            <input type="text" id="Nacc" class="form-control" placeholder="Nacionalidad" data-index="13">
                                        </div>
                                        <div style="" class="m-1">
                                            <input type="text" id="Fechanf" class="form-control" placeholder="Fecha de Nacimiento" data-index="14">
                                        </div>
                                        <div style="" class="m-1">
                                            <input type="text" id="Estadoc" class="form-control" placeholder="Estado Civil" data-index="15">
                                        </div>
                                        <div style="" class="m-1">
                                            <input type="text" id="Nivelef" class="form-control" placeholder="Nivel Educativo" data-index="16">
                                        </div>
                                        <div style="" class="m-1">
                                            <input type="text" id="Ubicc" class="form-control" placeholder="Ubicación" data-index="17">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="d-flex justify-content-center flex-column">
                                            <div>
                                                <span class="font-weight-bold d-flex justify-content-center">Fecha de ingreso</span>
                                                <div class="input-group">
                                                    <span class="input-group-text">Desde / Hasta</span>
                                                    <input id="fechad" type="date" aria-label="First name" class="form-control">
                                                    <input id="fechah" type="date" aria-label="Last name" class="form-control">
                                                    <button class="btn btn-outline-primary" id="button-addon" type="button">Buscar</button>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="font-weight-bold d-flex justify-content-center">Cumpleañeros</span>
                                                <div class="input-group d-flex justify-content-center">
                                                    <select class="form-select col-10" id="fechaselect" aria-label="Example select with button addon">
                                                        <option value="0">Seleccione...</option>
                                                        <option value="01">Enero</option>
                                                        <option value="02">febrero</option>
                                                        <option value="03">Marzo</option>
                                                        <option value="04">Abril</option>
                                                        <option value="05">Mayo</option>
                                                        <option value="06">Junio</option>
                                                        <option value="07">Julio</option>
                                                        <option value="08">Agosto</option>
                                                        <option value="09">Septiembre</option>
                                                        <option value="10">Octubre</option>
                                                        <option value="11">Noviembre</option>
                                                        <option value="12">Diciembre</option>
                                                    </select>
                                                    <button class="btn btn-outline-primary" id="button-addon1" type="button">Buscar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
                <table id="example1" class="table table-striped table-hover table-responsive border" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 20px;">Ver</th> 
                            <?php if($_SESSION['Personas']['modificar']){ ?>  
                            <th style="width: 20px;">Editar</th>
                        <?php } ?>
                        <?php if($_SESSION['Personas']['eliminar']){ ?>  
                            <th style="width: 20px;">Eliminar</th>
                        <?php } ?>
                            <th>Cedula</th> 
                            <th>Primer Nombre</th>
                            <th>Segundo Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>Género</th>
                            <th>Teléfono</th>
                            <th>Whatsapp</th>
                            <th>Telefono de Casa</th>
                            <th>correo</th>
                            <th>Nacionalidad</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Estado Civil</th>
                            <th>Nivel Educativo</th>
                            <th>Ubicación</th>
                            <th>Ingreso al Seniat</th>
                            <th>Ingreso a la Administración Pública</th>
                            <th>Fecha de Notificación</th>
                            <th>Ultima designación</th>
                            <th>Declaracion Jurada</th>
                            <th>Inscripcion IVSS</th>
                            <th>Fideicomiso</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <script type="text/javascript">
                            

                  cargar_tabla_personas();

 

                            function cargar_tabla_personas(){
    $(function() {
   $.ajax({
    type: 'POST',
    url: BASE_URL + 'Personas/consultar_informacion_persona'
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


        "columns": [
        {
        data: "ver"
        },
         <?php if($_SESSION['Personas']['modificar']){ ?> 
        {
        data: "editar"
        },
    <?php } ?>
     <?php if($_SESSION['Personas']['eliminar']){ ?> 
        {
            data: "eliminar"
        },
    <?php } ?>
        {
            "data": "cedula"
        },
        {
            data: "primer_nombre"
        },
        {
            data: "segundo_nombre"
        },
        {
            data: "primer_apellido"
        },
        {
            data: "segundo_apellido"
        },
        {
            data:"genero"
        },
        {
            data:"telefono"
        },
        {
            data:"whatsapp"
        },
        {
            data:"telf_casa"
        },
        {
            data:"correo"
        },
        {
            data:"nacionalidad"
        },
        {
            data:"fecha_nacimiento"
        },
        {
            data:"estado_civil"
        },
        {
            data:"nivel_educativo"
        },
        {
            data:"nombre_ubi"
        },
        {
            data:"ing_seniat"
        },
        {
            data:"ing_publica"
        },
        {
            data:"fecha_notificacion"
        },
        {
            data:"ult_designacion"
        },
        {
            data:"declaracion_j"
        },
        {
            data:"inscripcion_ivss"
        },
        {
            data:"fideicomiso"
        }
        ],
        responsive: true,
        autoWidth: false,
        ordering: true,
        info: true,
        processing: true,
        pageLength: 10,
        lengthMenu: [5, 10, 20, 30, 40, 50, 100],
        buttons:[ 
    {
      extend:    'excelHtml5',
      filename: function() {
        return "EXCEL-Personas"      
      },          
      title: function() {
        var searchString = table.search();        
        return searchString.length? "Search: " + searchString : "Reporte de Personas"
      },
      text:      '<i class="fas fa-file-excel"></i> ',
      titleAttr: 'Exportar a Excel',
      className: 'btn text-success border border-success',
      exportOptions: {
        columns: [3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]
    }
    },
    {
      extend:    'pdfHtml5',
      filename: function() {
        return "PDF-Personas"      
      },          
      title: function() {
        var searchString = table.search();        
        return searchString.length? "Search: " + searchString : "Reporte de Personas"
      },
      text:      '<i class="fas fa-file-pdf"></i> ',
      titleAttr: 'Exportar a PDF',
      className: 'btn text-danger border border-danger',
      exportOptions: {
        columns: [3,5,6,12,13,14,15]
    }
},
    {
      extend:    'print',
      filename: function() {
        return "Print-Personas"      
      },          
      title: function() {
        var searchString = table.search();        
        return searchString.length? "Search: " + searchString : "Reporte de Personas"
      },
      text:      '<i class="fa fa-print"></i> ',
      titleAttr: 'Imprimir',
      className: 'btn text-info border border-info',
      exportOptions: {
        columns:  [3,5,6,12,13,14,15]
    }
    }, 
  ]  
} );
 table.buttons().container()
     .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );

     table.buttons().container()
     .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );

     $("#Cedulaf").keyup(function() {
    table.column($(this).data('index')).search(this.value).draw();
    });
    $("#Nombref").keyup(function() {
    table.column($(this).data('index')).search(this.value).draw();
    });
    $("#Apellidof").keyup(function() {
    table.column($(this).data('index')).search(this.value).draw();
    });
    $("#Generof").keyup(function() {
    table.column($(this).data('index')).search(this.value).draw();
    });
    $("#Fechanf").keyup(function() {
    table.column($(this).data('index')).search(this.value).draw();
    });
    $("#Nacc").keyup(function() {
    table.column($(this).data('index')).search(this.value).draw();
    });
    $("#Estadoc").keyup(function() {
    table.column($(this).data('index')).search(this.value).draw();
    });
    $("#Ubicc").keyup(function() {
    table.column($(this).data('index')).search(this.value).draw();
    });
    $("#Nivelef").keyup(function() {
    table.column($(this).data('index')).search(this.value).draw();
    });
    
}).fail(function() {
    alert("error")
})

});
}
</script>
<tfoot>
                        <tr>
                            <th style="width: 20px;">Ver</th> 
                             <?php if($_SESSION['Personas']['modificar']){ ?> 
                            <th style="width: 20px;">Editar</th>
                        <?php } ?>
                         <?php if($_SESSION['Personas']['eliminar']){ ?> 
                            <th style="width: 20px;">Eliminar</th>
                        <?php } ?>
                            <th>Cedula</th> 
                            <th>Primer Nombre</th>
                            <th>Segundo Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>Género</th>
                            <th>Teléfono</th>
                            <th>Whatsapp</th>
                            <th>Telefono de Casa</th>
                            <th>correo</th>
                            <th>Nacionalidad</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Estado Civil</th>
                            <th>Nivel Educativo</th>
                            <th>Ubicación</th>
                            <th>Ingreso al Seniat</th>
                            <th>Ingreso a la Administración Pública</th>
                            <th>Fecha de Notificación</th>
                            <th>Ultima designación</th>
                            <th>Declaracion Jurada</th>
                            <th>Inscripcion IVSS</th>
                            <th>Fideicomiso</th>
                        </tr>
                    </tfoot>
                    </table>
            </div>
            <!-- /.card-body -->
        </div>
        <?php include (modal."editar_persona.php"); ?>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    <!-- /.content -->
</div>


<!-- /.content-wrapper -->
<?php include (call."Fin.php"); ?>


<?php include (call."Style-agenda.php"); ?>

<script type="text/javascript" src="<?php echo constant('URL')?>config/js/news/consulta-personas.js"></script>
<script type="text/javascript" src="<?php echo constant('URL')?>config/js/news/modal-reportes-personas.js"></script>