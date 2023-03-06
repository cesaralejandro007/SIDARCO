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
                        <div class="card-header" style="background:#C29C9C;">
                            <h3 class="card-title font-weight-bold">CRITERIOS DE BUSQUEDA</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus" style="color:black"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 d-flex flex-wrap justify-content-center">
                                    <div style="" class="m-1">
                                        <input type="text" id="Cedulaf" class="form-control" placeholder="Cedula" data-index="0">
                                    </div>
                                    <div style="" class="m-1">
                                        <input type="text" id="Nombref" class="form-control" placeholder="Nombre" data-index="1">
                                    </div>
                                    <div style="" class="m-1">
                                        <input type="text" id="Apellidof" class="form-control" placeholder="Apellido" data-index="2">
                                    </div>
                                    <div style="" class="m-1">
                                        <input type="text" id="Correof" class="form-control" placeholder="Correo" data-index="4">
                                    </div>
                                    <div style="" class="m-1">
                                        <input type="text" id="Generof" class="form-control" placeholder="Genero" data-index="5">
                                    </div>
                                    <div style="" class="m-1">
                                        <input type="text" id="Fechanf" class="form-control" placeholder="Fecha de Nacimiento" data-index="6">
                                    </div>
                                    <div style="" class="m-1">
                                        <input type="text" id="Nivelef" class="form-control" placeholder="Nivel Educativo" data-index="8">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
                <table id="example1" class="table table-bordered table-responsive table-hover">
                    <thead>
                        <tr>
                            <th>Cedula</th> 
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Teléfono</th>
                            <th>correo</th>
                            <th>Género</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Estado Civil</th>
                            <th>Nivel Educativo</th>
                            <th style="width: 20px;">Ver</th> 
                            <?php if($_SESSION['Personas']['modificar']){ ?>  
                            <th style="width: 20px;">Editar</th>
                        <?php } ?>
                        <?php if($_SESSION['Personas']['eliminar']){ ?>  
                            <th style="width: 20px;">Eliminar</th>
                        <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
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
        "columns": [{
            "data": "cedula"
        },
        {
            data: "primer_nombre"
        },
        {
            data: "primer_apellido"
        },
        {
            data:"telefono"
        },
        {
            data:"correo"
        },
        {
            data:"genero"
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
        }
    <?php } ?>
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
        columns: [0,1,2,3,4,5,6,7,8]
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
        columns: [0,1,2,3,4,5,7]
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
        columns: [0,1,2,3,4,5,6,7,8]
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
    $("#Correof").keyup(function() {
        table.column($(this).data('index')).search(this.value).draw();
    });
    $("#Generof").keyup(function() {
    table.column($(this).data('index')).search(this.value).draw();
    });
    $("#Fechanf").keyup(function() {
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
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Teléfono</th>
                            <th>correo</th>
                            <th>Género</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Estado Civil</th>
                            <th>Nivel Educativo</th>
                            <th>Ver</th> 
                             <?php if($_SESSION['Personas']['modificar']){ ?> 
                            <th>Editar</th>
                        <?php } ?>
                         <?php if($_SESSION['Personas']['eliminar']){ ?> 
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

<!-- /.content-wrapper -->
<?php include (call."Fin.php"); ?>
<?php include (modal."editar_persona.php"); ?>
<?php include (call."Style-agenda.php"); ?>

<script type="text/javascript" src="<?php echo constant('URL')?>config/js/news/consulta-personas.js"></script>
