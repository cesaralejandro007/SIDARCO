var fecha_hora = document.getElementById("fecha_presion");
var tension = document.getElementById("t_a");
var frecuencia = document.getElementById("f_c");
var nota = document.getElementById("nota");
var valid_tension = document.getElementById("valid_tension");
var valid_fecha = document.getElementById("valid_fecha_hora");
var valid_frecuencia = document.getElementById("valid_frecuencia");
var btn_seleccionar = document.getElementById("seleccionar_persona");
var persona = document.getElementById("cedula_persona");
var valid_persona = document.getElementById("valid_persona");
var span_persona = document.getElementById("nombre_persona");
var div_info = document.getElementById("second");
var btn_presion_arterial = document.getElementById("btn_presion_arterial");


function desabilitar2(){
    var mostrarmodal=document.getElementById("btn_presion_arterial");
    mostrarmodal.disabled= true;
}

btn_presion_arterial.onclick = function() {
  $("#agregar").modal().show();
} 

function eliminar(id){

  $.ajax({
  type: "POST",
  url: BASE_URL+"presion_arterial/",
  data:{
    datos: id,
    peticion:"Administrar/",
    sql:"",
    accion:"",
  }
    
  })
}

 var boton_enviar=document.getElementById("enviar");
/* 
boton_enviar.onclick= function(){
}; */ 

var boton_enviar=document.getElementById("enviar");

    boton_enviar.onclick = function(){

    var persona = document.getElementById("cedula_persona");
    $.ajax({
      type: 'POST',
      url: BASE_URL+"presion_arterial/Administrar",
      data:{
        'cedula_persona': persona.value,
        peticion:"Existente",

      }
    }).done(function(result){
      alert(JSON.stringify(result));
      if(result != 1){
        alert(result);
        persona.focus();
        persona.style.borderColor= 'red';
        swal({
          type: "error",
          title:"Error",
          text: "Esta persona no esta registrada",
          timer: 2000,
          showConfirmButton: false,
        });
      };
    });
  };

$(document).ready(function() {
  $("#enviar").on("click", function(){

      var datos = {
        cedula_persona: $("#cedula_persona").val(),
        t_a: $("#t_a").val(),
        f_c: $("#f_c").val(),
        nota: $("#nota").val(),
        estado: 1,
      };
      alert(JSON.stringify(datos));

      $.ajax({
        type: 'POST',
        url: BASE_URL + 'presion_arterial/Administrar',
        data: {
          datos: datos,
          peticion: "Administrar",
          sql: "SQL_02",
          accion: "Se ha registrado un nuevo control arterial: " + datos.cedula_persona
        },
        success: function(respuesta) {
          if (respuesta == 1) {
            swal({
              title: "Exito!",
              text: "Se ha registrado",
              type: "success",
              showConfirmButton: false
            });
            setTimeout(function() {
              location.href = BASE_URL + 'presion_arterial/Administrar/Consultas';
            }, 2000);
          } else {
            swal({
              title: "ERROR!",
              text: "Ha ocurrido un Error.</br>" + respuesta,
              type: "error",
              html: true,
              showConfirmButton: true,
              customClass: "bigSwalV2"
            });
          }
        },
      });
   /*   }  */
  });
});