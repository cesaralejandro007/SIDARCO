document.getElementById("button-addon").onclick = function(){
    if(document.getElementById("fechad").value !="" && document.getElementById("fechah").value!=""){
      fecha1 = document.getElementById("fechad").value;
      fecha2 = document.getElementById("fechah").value;
      if(document.getElementById("fechad").value <= document.getElementById("fechah").value){
  
        tabla = '<table id="example2" class="table table-striped table-hover m-1" style="font-size: 14px;">'+
        '<thead>'+
           '<th style="width:80px;">Cedula</th>'+
           '<th>Primer Nombre</th>'+
           '<th>Segundo Nombre</th>'+
           '<th>Primer Apellido</th>'+
           '<th>Segundo Apellido</th>'+
           '<th>Género</th>'+
           '<th>Teléfono</th>'+
           '<th>Whatsapp</th>'+
           '<th>Telefono de Casa</th>'+
           '<th>correo</th>'+
           '<th>Nacionalidad</th>'+
           '<th>Fecha de Nacimiento</th>'+
           '<th>Estado Civil</th>'+
           '<th>Nivel Educativo</th>'+
           '<th>Ubicación</th>'+
           '<th>Ingreso al Seniat</th>'+
           '<th>Ingreso a la Administración Pública</th>'+
           '<th>Fecha de Notificación</th>'+
           '<th>Ultima designación</th>'+
           '<th>Declaracion Jurada</th>'+
           '<th>Inscripcion IVSS</th>'+
           '<th>Fideicomiso</th>'+
      '</tr>'+
   '</thead>'+
   '<tbody class="table-group-divider">';   
  
  $(function() {
  
  $.ajax({
  type: 'POST',
  url: BASE_URL + 'Personas/consultar_informacion_persona_ingreso',
  data: { fecha_inicio: fecha1, fecha_fin: fecha2 }
  }).done(function(datos) {
    

  var data = JSON.parse(datos);
  var table = $("#example2").DataTable({
    dom: "B" +
    "<'row'<'col-sm-12'tr>>" +
    "<'row'<'col-sm-5'li><'col-sm-7'p>>",
  orderCellsTop: true,
  columnDefs: [
    {
        target: 2,
        visible: false,
        searchable: false,
    },
    {
        target: 4,
        visible: false,
    },
    {
        target: 7,
        visible: false,
    },
    {
        target: 8,
        visible: false,
    },
    {
        target: 9,
        visible: false,
    },
    {
        target: 10,
        visible: false,
    },
  /*   {
        target: 11,
        visible: false,
    }, */
   {
        target: 16,
        visible: false,
    },
    {
        target: 17,
        visible: false,
    },
    {
        target: 18,
        visible: false,
    },
    {
        target: 19,
        visible: false,
    },
    {
        target: 20,
        visible: false,
    },
    {
        target: 21,
        visible: false,
    },
  ],   
  data: data,
  
  
  columns: [
  {
  data: "cedula"
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
  columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21]
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
  columns: [0,1,3,5,6,12,13,14,15]
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
  columns:  [0,1,3,5,6,12,13,14,15]
  }
  }, 
  ]  
  } );
  table.buttons().container()
  .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );
  
  });
  
  });
  
  tabla +'<tfoot>'+
           '<th>Cedula</th>'+ 
           '<th>Primer Nombre</th>'+
           '<th>Segundo Nombre</th>'+
           '<th>Primer Apellido</th>'+
           '<th>Segundo Apellido</th>'+
           '<th>Género</th>'+
           '<th>Teléfono</th>'+
           '<th>Whatsapp</th>'+
           '<th>Telefono de Casa</th>'+
           '<th>correo</th>'+
           '<th>Nacionalidad</th>'+
           '<th>Fecha de Nacimiento</th>'+
           '<th>Estado Civil</th>'+
           '<th>Nivel Educativo</th>'+
           '<th>Ubicación</th>'+
           '<th>Ingreso al Seniat</th>'+
           '<th>Ingreso a la Administración Pública</th>'+
           '<th>Fecha de Notificación</th>'+
           '<th>Ultima designación</th>'+
           '<th>Declaracion Jurada</th>'+
           '<th>Inscripcion IVSS</th>'+
           '<th>Fideicomiso</th>'+
       '</tr>'+
   '</tfoot>'+
   '</table>';
  
   Swal.fire({
        title: 'Consulta de los funcionarios ingresados a nómina',
        html: tabla,
        confirmButtonColor: '#15406D',
        customClass: 'swal-width'
      });
  
  
      
        document.getElementById("fechad").style.borderColor = "";
        document.getElementById("fechah").style.borderColor = "";
      }else{
          swal({
            type: "error",
            title: "Error",
            text: "La primera fecha no puede ser mayor que la segunda",
            timer: 3000,
            showConfirmButton: false,
          });
          setTimeout(function () {
            document.getElementById("fechad").style.borderColor = "red";
            document.getElementById("fechah").style.borderColor = "red";
            document.getElementById("fechad").focus();
            document.getElementById("fechah").focus();
          }, 2000);
      }
    }else{
      swal({
        type: "error",
        title: "Error",
        text: "Complete los campos de la fecha de ingreso",
        timer: 3000,
        showConfirmButton: false,
      });
      setTimeout(function () {
        document.getElementById("fechad").style.borderColor = "red";
        document.getElementById("fechah").style.borderColor = "red";
        document.getElementById("fechad").focus();
        document.getElementById("fechah").focus();
      }, 2000);
    }
  }



  document.getElementById("button-addon1").onclick = function(){
    if(document.getElementById("fechaselect").value !="0"){
      fechaselects = document.getElementById("fechaselect").value;
        
      
  
      tabla = '<table id="example3" class="table table-striped table-hover" style="font-size: 14px;">'+
      '<thead>'+
         '<th style="width:80px;">Cedula</th>'+
         '<th>Primer Nombre</th>'+
         '<th>Segundo Nombre</th>'+
         '<th>Primer Apellido</th>'+
         '<th>Segundo Apellido</th>'+
         '<th>Género</th>'+
         '<th>Teléfono</th>'+
         '<th>Whatsapp</th>'+
         '<th>Telefono de Casa</th>'+
         '<th>correo</th>'+
         '<th>Nacionalidad</th>'+
         '<th>Fecha de Nacimiento</th>'+
         '<th>Estado Civil</th>'+
         '<th>Nivel Educativo</th>'+
         '<th>Ubicación</th>'+
         '<th>Ingreso al Seniat</th>'+
         '<th>Ingreso a la Administración Pública</th>'+
         '<th>Fecha de Notificación</th>'+
         '<th>Ultima designación</th>'+
         '<th>Declaracion Jurada</th>'+
         '<th>Inscripcion IVSS</th>'+
         '<th>Fideicomiso</th>'+
    '</tr>'+
  '</thead>'+
  '<tbody class="table-group-divider">';   
  
  $(function() {
  
    $.ajax({
      type: 'POST',
      url: BASE_URL + 'Personas/consultar_informacion_persona_compleanos',
      data: { mescumple: fechaselects}
  }).done(function(datos) {
  var data = JSON.parse(datos);
  var table = $("#example3").DataTable({
    dom: "B" +
    "<'row'<'col-sm-12'tr>>" +
    "<'row'<'col-sm-5'li><'col-sm-7'p>>",
  orderCellsTop: true,
  columnDefs: [
  {
      target: 2,
      visible: false,
      searchable: false,
  },
  {
      target: 4,
      visible: false,
  },
  {
      target: 7,
      visible: false,
  },
  {
      target: 8,
      visible: false,
  },
  {
      target: 9,
      visible: false,
  },
  {
      target: 10,
      visible: false,
  },
  /*   {
      target: 11,
      visible: false,
  }, */
  {
      target: 16,
      visible: false,
  },
  {
      target: 17,
      visible: false,
  },
  {
      target: 18,
      visible: false,
  },
  {
      target: 19,
      visible: false,
  },
  {
      target: 20,
      visible: false,
  },
  {
      target: 21,
      visible: false,
  },
  ],   
  data: data,
  
  
  columns: [
  {
  data: "cedula"
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
  columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21]
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
  columns: [0,1,3,5,6,12,13,14,15]
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
  columns:  [0,1,3,5,6,12,13,14,15]
  }
  }, 
  ]  
  } );
  table.buttons().container()
  .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );
  
  });
  
  });
  
  tabla +'<tfoot>'+
         '<th>Cedula</th>'+ 
         '<th>Primer Nombre</th>'+
         '<th>Segundo Nombre</th>'+
         '<th>Primer Apellido</th>'+
         '<th>Segundo Apellido</th>'+
         '<th>Género</th>'+
         '<th>Teléfono</th>'+
         '<th>Whatsapp</th>'+
         '<th>Telefono de Casa</th>'+
         '<th>correo</th>'+
         '<th>Nacionalidad</th>'+
         '<th>Fecha de Nacimiento</th>'+
         '<th>Estado Civil</th>'+
         '<th>Nivel Educativo</th>'+
         '<th>Ubicación</th>'+
         '<th>Ingreso al Seniat</th>'+
         '<th>Ingreso a la Administración Pública</th>'+
         '<th>Fecha de Notificación</th>'+
         '<th>Ultima designación</th>'+
         '<th>Declaracion Jurada</th>'+
         '<th>Inscripcion IVSS</th>'+
         '<th>Fideicomiso</th>'+
     '</tr>'+
  '</tfoot>'+
  '</table>';
  
  Swal.fire({
      title: 'Consulta de los cumpleañeros',
      html: tabla,
      confirmButtonColor: '#15406D',
      customClass: 'swal-width'
    });
      
        document.getElementById("fechaselect").style.borderColor = "";
    }else{
      swal({
        type: "error",
        title: "Error",
        text: "Seleccione el mes del campo",
        timer: 3000,
        showConfirmButton: false,
      });
      setTimeout(function () {
        document.getElementById("fechaselect").style.borderColor = "red";
        document.getElementById("fechaselect").focus();
      }, 2000);
    }
  }
  

  
  document.getElementById("busqueda_nomina").onclick = function(){
    if(document.getElementById("nominaavanzada").value !="0"){
      if(document.getElementById('valor'+document.getElementById('nominaavanzada').value).value != 'Resguardo'){
      nomina = document.getElementById("nominaavanzada").value;
  
        tabla = '<table id="example4" class="table table-striped table-hover" style="font-size: 14px;">'+
        '<thead>'+
           '<th style="width:80px;">Cedula</th>'+
           '<th>Primer Nombre</th>'+
           '<th>Segundo Nombre</th>'+
           '<th>Primer Apellido</th>'+
           '<th>Segundo Apellido</th>'+
           '<th>Nómina</th>'+
           '<th>Género</th>'+
           '<th>Teléfono</th>'+
           '<th>Whatsapp</th>'+
           '<th>Telefono de Casa</th>'+
           '<th>correo</th>'+
           '<th>Nacionalidad</th>'+
           '<th>Fecha de Nacimiento</th>'+
           '<th>Estado Civil</th>'+
           '<th>Nivel Educativo</th>'+
           '<th>Ubicación</th>'+
           '<th>Ingreso al Seniat</th>'+
           '<th>Ingreso a la Administración Pública</th>'+
           '<th>Fecha de Notificación</th>'+
           '<th>Ultima designación</th>'+
           '<th>Declaracion Jurada</th>'+
           '<th>Inscripcion IVSS</th>'+
           '<th>Fideicomiso</th>'+
      '</tr>'+
   '</thead>'+
   '<tbody class="table-group-divider">';   
  
  $(function() {
  
  $.ajax({
  type: 'POST',
  url: BASE_URL + 'Personas/consultar_informacion_persona_nomina',
  data: { vnomina:nomina}
  }).done(function(datos) {
  var data = JSON.parse(datos);
  var table = $("#example4").DataTable({
  dom: "B" +
  "<'row'<'col-sm-12'tr>>" +
  "<'row'<'col-sm-5'li><'col-sm-7'p>>",
  orderCellsTop: true,
  columnDefs: [
    {
        target: 2,
        visible: false,
        searchable: false,
    },
    {
        target: 4,
        visible: false,
    },
    {
        target: 7,
        visible: false,
    },
    {
        target: 8,
        visible: false,
    },
    {
        target: 9,
        visible: false,
    },
    {
        target: 10,
        visible: false,
    },
  /*   {
        target: 11,
        visible: false,
    }, */
   {
        target: 16,
        visible: false,
    },
    {
        target: 17,
        visible: false,
    },
    {
        target: 18,
        visible: false,
    },
    {
        target: 19,
        visible: false,
    },
    {
        target: 20,
        visible: false,
    },
    { 
        target: 21,
        visible: false,
    },
    {
      target: 22,
      visible: false,
  },
  ],   
  data: data,
  
  
  columns: [
  {
  data: "cedula"
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
    data: "nombre_nomina"
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
  columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22]
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
  columns: [0,1,3,5,6,12,13,14,15]
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
  columns:  [0,1,3,5,6,12,13,14,15]
  }
  }, 
  ]  
  } );
  table.buttons().container()
  .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );
  
  });
  
  });
  
  tabla +'<tfoot>'+
           '<th>Cedula</th>'+ 
           '<th>Primer Nombre</th>'+
           '<th>Segundo Nombre</th>'+
           '<th>Primer Apellido</th>'+
           '<th>Segundo Apellido</th>'+
           '<th>Nómina</th>'+
           '<th>Género</th>'+
           '<th>Teléfono</th>'+
           '<th>Whatsapp</th>'+
           '<th>Telefono de Casa</th>'+
           '<th>correo</th>'+
           '<th>Nacionalidad</th>'+
           '<th>Fecha de Nacimiento</th>'+
           '<th>Estado Civil</th>'+
           '<th>Nivel Educativo</th>'+
           '<th>Ubicación</th>'+
           '<th>Ingreso al Seniat</th>'+
           '<th>Ingreso a la Administración Pública</th>'+
           '<th>Fecha de Notificación</th>'+
           '<th>Ultima designación</th>'+
           '<th>Declaracion Jurada</th>'+
           '<th>Inscripcion IVSS</th>'+
           '<th>Fideicomiso</th>'+
       '</tr>'+
   '</tfoot>'+
   '</table>';
  
   Swal.fire({
        title: 'Consulta de la nómina de '+ document.getElementById('valor'+document.getElementById('nominaavanzada').value).value,
        html: tabla,
        confirmButtonColor: '#15406D',
        customClass: 'swal-width'
      });
        document.getElementById("nominaavanzada").style.borderColor = "";
        document.getElementById("nominaavanzada").style.borderColor = "";
    }else if(document.getElementById('valor'+document.getElementById('nominaavanzada').value).value == 'Resguardo'){
      nomina = document.getElementById("nominaavanzada").value;
  
      tabla = '<table id="example4" class="table table-striped table-hover" style="font-size: 14px;">'+
      '<thead>'+
         '<th style="width:80px;">Cedula</th>'+
         '<th>Primer Nombre</th>'+
         '<th>Segundo Nombre</th>'+
         '<th>Primer Apellido</th>'+
         '<th>Segundo Apellido</th>'+
         '<th>Nómina</th>'+
         '<th>Género</th>'+
         '<th>Teléfono</th>'+
         '<th>Whatsapp</th>'+
         '<th>Telefono de Casa</th>'+
         '<th>correo</th>'+
         '<th>Nacionalidad</th>'+
         '<th>Fecha de Nacimiento</th>'+
         '<th>Estado Civil</th>'+
         '<th>Nivel Educativo</th>'+
         '<th>Ubicación</th>'+
         '<th>Grado /JQ</th>'+
         '<th>Ingreso al Seniat</th>'+
         '<th>Ingreso a la Administración Pública</th>'+
         '<th>Fecha de Notificación</th>'+
         '<th>Ultima designación</th>'+
         '<th>Declaracion Jurada</th>'+
         '<th>Inscripcion IVSS</th>'+
         '<th>Fideicomiso</th>'+
    '</tr>'+
 '</thead>'+
 '<tbody class="table-group-divider">';   

$(function() {

$.ajax({
type: 'POST',
url: BASE_URL + 'Personas/consultar_informacion_persona_nomina',
data: { vnomina:nomina}
}).done(function(datos) {
var data = JSON.parse(datos);
var table = $("#example4").DataTable({
dom: "B" +
"<'row'<'col-sm-12'tr>>" +
"<'row'<'col-sm-5'li><'col-sm-7'p>>",
orderCellsTop: true,
columnDefs: [
  {
      target: 2,
      visible: false,
      searchable: false,
  },
  {
      target: 4,
      visible: false,
  },
  {
      target: 7,
      visible: false,
  },
  {
      target: 8,
      visible: false,
  },
  {
      target: 9,
      visible: false,
  },
  {
      target: 10,
      visible: false,
  },
/*   {
      target: 11,
      visible: false,
  }, */
  {
      target: 17,
      visible: false,
  },
  {
      target: 18,
      visible: false,
  },
  {
      target: 19,
      visible: false,
  },
  {
      target: 20,
      visible: false,
  },
  { 
      target: 21,
      visible: false,
  },
  {
    target: 22,
    visible: false,
},
{
  target: 23,
  visible: false,
},
],   
data: data,


columns: [
{
data: "cedula"
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
  data: "nombre_nomina"
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
  data:"grado"
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
columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]
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
columns: [0,1,3,5,6,12,13,15,16]
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
columns:  [0,1,3,5,6,12,13,15,16]
}
}, 
]  
} );
table.buttons().container()
.appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );

});

});

tabla +'<tfoot>'+
         '<th>Cedula</th>'+ 
         '<th>Primer Nombre</th>'+
         '<th>Segundo Nombre</th>'+
         '<th>Primer Apellido</th>'+
         '<th>Segundo Apellido</th>'+
         '<th>Nómina</th>'+
         '<th>Género</th>'+
         '<th>Teléfono</th>'+
         '<th>Whatsapp</th>'+
         '<th>Telefono de Casa</th>'+
         '<th>correo</th>'+
         '<th>Nacionalidad</th>'+
         '<th>Fecha de Nacimiento</th>'+
         '<th>Estado Civil</th>'+
         '<th>Nivel Educativo</th>'+
         '<th>Ubicación</th>'+
         '<th>Grado /JQ</th>'+
         '<th>Ingreso al Seniat</th>'+
         '<th>Ingreso a la Administración Pública</th>'+
         '<th>Fecha de Notificación</th>'+
         '<th>Ultima designación</th>'+
         '<th>Declaracion Jurada</th>'+
         '<th>Inscripcion IVSS</th>'+
         '<th>Fideicomiso</th>'+
     '</tr>'+
 '</tfoot>'+
 '</table>';

 Swal.fire({
      title: 'Consulta de la nómina de '+ document.getElementById('valor'+document.getElementById('nominaavanzada').value).value,
      html: tabla,
      confirmButtonColor: '#15406D',
      customClass: 'swal-width'
    });
      document.getElementById("nominaavanzada").style.borderColor = "";
      document.getElementById("nominaavanzada").style.borderColor = "";
    }}else{
      swal({
        type: "error",
        title: "Error",
        text: "Complete el campo de nómina",
        timer: 3000,
        showConfirmButton: false,
      });
      setTimeout(function () {
        document.getElementById("nominaavanzada").style.borderColor = "red";
        document.getElementById("nominaavanzada").focus();
      }, 2000);
    }
  }
