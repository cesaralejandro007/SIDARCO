var fecha_hora = document.getElementById("fecha_presion");
var tension = document.getElementById("t_a");
var frecuencia = document.getElementById("f_c");
var nota = document.getElementById("nota");
var valid_tension = document.getElementById("valid_tension");
var valid_fecha = document.getElementById("valid_fecha_hora");
var valid_frecuencia = document.getElementById("valid_frecuencia");
var btn_seleccionar = document.getElementById("seleccionar_persona");
var persona = document.getElementById("cedula_propietario");
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

/*  function desabilitar() {
  var enviarboton = document.getElementById("enviar");
  enviarboton.disabled = true;
}  */

/* btn_seleccionar.onclick = function() {
  if (persona.value == '' || persona.value == null) {
    valid_persona.innerHTML = "Debe ingresar una persona";
    persona.focus();
    persona.style.borderColor = 'red';
  } else {
    valid_persona.innerHTML = "";
    persona.focus();
    persona.style.borderColor = '';
    $.ajax({
      type: "POST",
      url: BASE_URL + "presion_arterial/Administrar",
      data: {
        peticion: "Personas",
        cedula: persona.value
      },
    }).done(function(result) {
      if (result == 0) {
        valid_persona.innerHTML = "Esta persona no se encuentra registrada";
      } else {
        valid_persona.innerHTML = "";
        var datos = JSON.parse(result);
        span_persona.innerHTML = datos[0].primer_nombre + " " + datos[0].primer_apellido;
        persona.disabled = true;
        btn_seleccionar.style.display = 'none';
        div_info.style.display = '';
        registrar_btn.style.display = 'none';
      }
    });
  }
} */

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

$(document).ready(function() {
  $("#enviar").on("click", function() {

    persona.onclick(function(){
      $.ajax({
        type: 'POST',
        url: BASE_URL+"presion_arterial/",
        data: persona,
      }).done(function(result){
        result;
      })
    });

      var datos = {
        cedula_persona: $("#cedula_propietario").val(),
        t_a: $("#t_a").val(),
        f_c: $("#f_c").val(),
        nota: $("#nota").val(),
        estado: 1
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
              text: "Se ha registrado de forma exitosa",
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
        error: function(respuesta) {
          alert("Error al enviar Controlador");
        }
      });
  /*   } */
  });
});