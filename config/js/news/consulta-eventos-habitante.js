var anio_view = document.getElementById("anio-name");
var mes_view = document.getElementById("mes-name");
var next_mes = document.getElementById("next-mes");
var back_mes = document.getElementById("back-mes");
var keyup_telefono = /^[0-9]{11}$/;
var keyup_correo = /^[A-Za-z0-9_\u00d1\u00f1\u00E0-\u00FC]{3,25}[@]{1}[A-Za-z0-9]{3,8}[.]{1}[A-Za-z]{2,4}$/;
var keyup_contrasena = /^[A-ZÁÉÍÓÚa-zñáéíóú0-9,.@#%$^&*!?:]{5,8}$/;
var keyup_seguridad = /^[A-ZÁÉÍÓÚa-zñáéíóú0-9,.@#%$^&*!?:]{3,25}$/;
var cant_anios_back = 0;
var cant_anios_next = 0;
var div_calendario = document.getElementById("calendario-view");
var lista_fechas = [];
var eventos_registrados = [];
get_eventos();
setTimeout(function () {
    obtener_calendario("vacio", "vacio");
}, 500);

if(document.getElementById("sesion_iniciada").value ==1){
    Swal.fire({
        title: 'Cambiar contraseña',
        html:
        '<span id="validarcontrasena0"></span>' +
        '<label for="message-text" style="color: rgb(21, 64, 109);" class="col-form-label">Ingrese su contraseña actual:</label>'+
        '<div class="input-group mt-1"><input id="input0" maxlength="8" class="form-control mb-2" type="password" placeholder="Contraseña actual"/><div class="input-group-append"><button id="show_password" class="btn border border-left-0 mb-2" type="button" onclick="mostrarPasswordactual()"><i class="fas fa-low-vision" style="font-size:16px; color:#8C8F92"></i></div></div>',
        confirmButtonColor: '#15406D',
        confirmButtonText: "Siguiente",
        focusConfirm: true,
        preConfirm: () => {
            $.ajax({
            type: "POST",
            url: BASE_URL + "Inicio/Verificar_password",
            data: { "verificar_password": document.getElementById('input0').value ,"cedula_persona": document.getElementById("cedula_persona").value},
            }).done(function (result) {
                if(result==1){
                    cambiarpassword();
                    return true;
                }else if(document.getElementById('input0').value ==""){
                    document.getElementById("validarcontrasena0").innerHTML = '<div class="alert alert-dismissible fade show pl-5" style="background:#9D2323; color:white" role="alert">Complete el campo solicitado.<i class="far fa-backspace p-0 m-0 d-none" id="cerraralert" data-dismiss="alert" aria-label="Close"></i></div>';
                    setTimeout(function () {
                        $("#cerraralert").click();
                      }, 3000);
                    return false;
                }else{
                    document.getElementById("validarcontrasena0").innerHTML = '<div class="alert alert-dismissible fade show pl-5" style="background:#9D2323; color:white" role="alert">La contraseña actual no coincide.<i class="far fa-backspace p-0 m-0 d-none" id="cerraralert" data-dismiss="alert" aria-label="Close"></i></div>';
                    setTimeout(function () {
                        $("#cerraralert").click();
                      }, 3000);
                    return false;
                }
            });
            return false;
            }
        })
        }
        function cambiarpassword(){
            Swal.fire({
                title: 'Cambiar contraseña',
                html:                        
                  '<span id="validarcontrasena1"></span>' +
                  '<label for="message-text" style="color: rgb(21, 64, 109);" class="col-form-label">Informacion de contraseña:</label><br>'+
                  '<span id="v1" style="font-size:14px"></span><div class="input-group mt-1"><input id="input1" maxlength="8" class="form-control mb-2" type="password" placeholder="Contraseña"/><div class="input-group-append"><button id="show_password" class="btn border border-left-0 mb-2" type="button" onclick="mostrarPassword()"><i class="fas fa-low-vision" style="font-size:16px; color:#8C8F92"></i></div></div>' +
                  '<span id="v2" style="font-size:14px"></span><div class="input-group mt-1"><input id="input2" maxlength="8" class="form-control mb-2" type="password" placeholder="Contraseña"/><div class="input-group-append"><button id="show_password" class="btn border border-left-0 mb-2" type="button" onclick="mostrarPassword1()"><i class="fas fa-low-vision" style="font-size:16px; color:#8C8F92"></i></div></div>'+
                  '<label for="message-text" style="color: rgb(21, 64, 109);" class="col-form-label">Preguntas de seguridad:</label><br>'+
                  '<span id="v3" style="font-size:14px"></span><input type="text" maxlength="25" id="color" placeholder="Ingrese el color favorito" class="form-control mb-2">' +
                  '<span id="v4" style="font-size:14px"></span><input type="text" maxlength="25" id="animal" placeholder="Ingrese el animal favorito" class="form-control mb-2">' +
                  '<span id="v5" style="font-size:14px"></span><input type="text" maxlength="25" id="mascota" placeholder="Ingrese el nombre de la primera mascota" class="form-control mb-2">',
                confirmButtonColor: '#15406D',
                confirmButtonText: "Cambiar",
                focusConfirm: true,
                preConfirm: () => {
                    if(document.getElementById('input1').value != "" && document.getElementById('input2').value != "" && document.getElementById('color').value != "" && document.getElementById('animal').value != "" && document.getElementById('mascota').value != ""){
                    if(document.getElementById('input1').value == document.getElementById('input2').value){
                      a = valida_registrar1();
                      if (a != "") {
                          return false;
                          } else {
                        preguntas_seguridad = document.getElementById('color').value.toLowerCase()+document.getElementById('animal').value.toLowerCase()+document.getElementById('mascota').value.toLowerCase();
                        cambiarcontraseña( 
                            document.getElementById('input1').value,
                            preguntas_seguridad,
                            document.getElementById("cedula_persona").value
                            );
                        }
                    }else{
                        document.getElementById("validarcontrasena1").innerHTML = '<div class="alert alert-dismissible fade show pl-5" style="background:#9D2323; color:white" role="alert">La contraseña no coincide.<i class="far fa-backspace p-0 m-0 d-none" id="cerraralert" data-dismiss="alert" aria-label="Close"></i></div>';
                        setTimeout(function () {
                            $("#cerraralert").click();
                          }, 3000);
                        return false;
                    }
                  }else{
                    document.getElementById("validarcontrasena1").innerHTML = '<div class="alert alert-dismissible fade show pl-5" style="background:#9D2323; color:white" role="alert">Complete los campos solicitados.<i class="far fa-backspace p-0 m-0 d-none" id="cerraralert" data-dismiss="alert" aria-label="Close"></i></div>';
                    setTimeout(function () {
                        $("#cerraralert").click();
                      }, 3000);
                    return false;
                  }
                }
              })
        
        
              //-------------------------------------------------------------------------------
              document.getElementById("input1").onkeypress = function (e) {
                er = /^[A-Za-z0-9_\u00d1\u00f1\u00E0-\u00FC@,.#%$^&*!?:]*$/;
                validarkeypress(er, e);
              };
              document.getElementById("input1").onkeyup = function () {
                r = validarkeyup(
                  keyup_contrasena,
                  this,
                  document.getElementById("v1"),
                  "El campo debe contener de 5 a 8 caracteres"
                );
              };
              document.getElementById("input2").onkeypress = function (e) {
                er = /^[A-Za-z0-9_\u00d1\u00f1\u00E0-\u00FC@,.#%$^&*!?:]*$/;
                validarkeypress(er, e);
              };
              document.getElementById("input2").onkeyup = function () {
                r = validarkeyup(
                  keyup_contrasena,
                  this,
                  document.getElementById("v2"),
                  "El campo debe contener de 5 a 8 caracteres"
                );
              };
              document.getElementById("color").onkeypress = function (e) {
                er = /^[A-Za-z0-9_\u00d1\u00f1\u00E0-\u00FC@,.#%$^&*!?:]*$/;
                validarkeypress(er, e);
              };
            document.getElementById("color").onkeyup = function () {
                r = validarkeyup(
                  keyup_seguridad,
                  this,
                  document.getElementById("v3"),
                  "El campo debe contener de 3 a 25 caracteres"
                );
                document.getElementById("animal").onkeypress = function (e) {
                  er = /^[A-Za-z0-9_\u00d1\u00f1\u00E0-\u00FC@,.#%$^&*!?:]*$/;
                  validarkeypress(er, e);
                };
              document.getElementById("animal").onkeyup = function () {
                  r = validarkeyup(
                    keyup_seguridad,
                    this,
                    document.getElementById("v4"),
                    "El campo debe contener de 3 a 25 caracteres"
                  );
                };
              
              document.getElementById("mascota").onkeypress = function (e) {
                er = /^[A-Za-z0-9_\u00d1\u00f1\u00E0-\u00FC@,.#%$^&*!?:]*$/;
                  validarkeypress(er, e);
                };
              document.getElementById("mascota").onkeyup = function () {
                  r = validarkeyup(
                    keyup_seguridad,
                    this,
                    document.getElementById("v5"),
                    "El campo debe contener de 3 a 25 caracteres"
                  );
                };
              };
            }
            function cambiarcontraseña(contrasena,preguntas,cedula){
                $.ajax({
                    type: "POST",
                    url: BASE_URL + "Inicio/cambiar_password",
                    data: { "password": contrasena,"preguntas": preguntas,"cedula_persona": cedula},
                    }).done(function (result){
                    if (result == 1) {
                        setTimeout(function () {
                        swal({
                            title: "Éxtito",
                            text: "Los datos de seguridad se actualizo correctamente",
                            type: "success",
                            showConfirmButton: false,
                            timer: 3000,
                        });
        
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                        }, 500);
                    }
                });
            }        

            function valida_registrar1() {
                var error = false;
                contrasena1 = validarkeyup(
                  keyup_contrasena,
                  document.getElementById("input1"),
                  document.getElementById("v1"),
                  "El campo debe contener de 5 a 8 caracteres"
                );
                contrasena2 = validarkeyup(
                  keyup_contrasena,
                  document.getElementById("input2"),
                  document.getElementById("v2"),
                  "El campo debe contener de 5 a 8 caracteres"
                );
                color = validarkeyup(
                  keyup_seguridad,
                  document.getElementById("color"),
                  document.getElementById("v3"),
                  "El campo debe contener de 3 a 25 caracteres"
                );
                animal = validarkeyup(
                  keyup_seguridad,
                  document.getElementById("animal"),
                  document.getElementById("v4"),
                  "El campo debe contener de 3 a 25 caracteres"
                );
                mascota = validarkeyup(
                  keyup_seguridad,
                  document.getElementById("mascota"),
                  document.getElementById("v5"),
                  "El campo debe contener de 3 a 25 caracteres"
                );
          
                if (
                  contrasena1 == 0 ||
                  contrasena2 == 0 ||
                  color == 0 || 
                  animal == 0 || 
                  mascota == 0 
                ) {
                  //variable==0, indica que hubo error en la validacion de la etiqueta
                  error = true;
                }
                return error;
              }
          
              
  function mostrarPasswordactual() {
    var cambio = document.getElementById("input0");
    if (cambio.type == "password") {
      cambio.type = "text";
    } else {
      cambio.type = "password";
    }
  }

  function mostrarPassword() {
    var cambio = document.getElementById("input1");
    if (cambio.type == "password") {
      cambio.type = "text";
    } else {
      cambio.type = "password";
    }
  }

  function mostrarPassword1() {
    var cambio = document.getElementById("input2");
    if (cambio.type == "password") {
      cambio.type = "text";
    } else {
      cambio.type = "password";
    }
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

  function validarkeypress(er, e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key);
    a = er.test(tecla);
    if (!a) {
      e.preventDefault();
    }
  }

//===========================================================================//
function get_eventos() {
    $.ajax({
        type: "POST",
        url: BASE_URL + "Agenda/Administrar",
        data: {
            peticion: "Consulta_Ajax",
        },
    }).done(function (result) {
        var resultado = JSON.parse(result);
        for (var i = 0; i < resultado.length; i++) {
            var fecha_event = new Date(resultado[i]['fecha']);
            if (fecha_event >= new Date()) {
                eventos_registrados.push(resultado[i]);
            }
        }
    });
}
//===========================================================================//
function obtener_calendario(mes, anio) {
    if (anio == "vacio") {
        anio = new Date().getFullYear();
    }
    if (mes == "vacio") {
        mes = new Date().getMonth();
    }
    var ultimo_dia = new Date(anio, mes + 1, 0);
    mes_view.innerHTML = getMes(mes);
    anio_view.innerHTML = anio;
    llenar_calendario(ultimo_dia.getDate(), mes, anio);
}
//_--------------------------------------------------------------------------------------------//
function validar_ubicacion_hora() {
    var validar = true;
    var horas = [];
    var texto_horas = "";
    for (var i = 0; i < eventos_registrados.length; i++) {
        for (var j = 0; j < lista_fechas.length; j++) {
            if (lista_fechas[j] == eventos_registrados[i]['fecha']) {
                if (eventos_registrados[i]['ubicacion'].toLowerCase() == ubicacion_evento.value.toLowerCase()) {
                    if (!validacion_horas(eventos_registrados[i]['horas'])) {
                        validar = false;
                        horas.push(eventos_registrados[i]['horas']);
                    }
                }
            }
        }
    }
    if (horas.length > 1) {
        for (var x = 0; x < horas.length; x++) {
            if (x == horas.length - 1) {
                texto_horas += " y " + horas[x];
            } else {
                texto_horas += horas[x] + " , ";
            }
        }
    } else {
        texto_horas = horas[0];
    }
    if (!validar) {
        swal({
            type: "error",
            text: "Existen eventos creados en " + ubicacion_evento.value + " " + texto_horas,
            title: "Error"
        });
    }
    return validar;
}

function get_time(hora) {
    var numero = "";
    switch (hora) {
        case "08:00 AM":
            numero = 1;
            break;
        case "09:00 AM":
            numero = 2;
            break;
        case "10:00 AM":
            numero = 3;
            break;
        case "11:00 AM":
            numero = 4;
            break;
        case "12:00 PM":
            numero = 5;
            break;
        case "01:00 PM":
            numero = 6;
            break;
        case "02:00 PM":
            numero = 7;
            break;
        case "03:00 PM":
            numero = 8;
            break;
        case "04:00 PM":
            numero = 9;
            break;
        case "05:00 PM":
            numero = 10;
            break;
        case "06:00 PM":
            numero = 11;
            break;
        case "07:00 PM":
            numero = 12;
            break;
        case "08:00 PM":
            numero = 13;
            break;
    }
    return numero;
}
//===========================================================================//
back_mes.onclick = function () {
    var mes_back = 0;
    switch (mes_view.innerHTML) {
        case "Enero":
            mes_back = 11;
            cant_anios_back++;
            break;
        case "Febrero":
            mes_back = 0;
            break;
        case "Marzo":
            mes_back = 1;
            break;
        case "Abril":
            mes_back = 2;
            break;
        case "Mayo":
            mes_back = 3;
            break;
        case "Junio":
            mes_back = 4;
            break;
        case "Julio":
            mes_back = 5;
            break;
        case "Agosto":
            mes_back = 6;
            break;
        case "Septiembre":
            mes_back = 7;
            break;
        case "Octubre":
            mes_back = 8;
            break;
        case "Noviembre":
            mes_back = 9;
            break;
        case "Diciembre":
            mes_back = 10;
            break;
    }
    var retornar_anio = parseInt(anio_view.innerHTML);
    if (cant_anios_back != 0) {
        retornar_anio = parseInt(anio_view.innerHTML) - cant_anios_back;
        cant_anios_back = 0;
    }
    obtener_calendario(mes_back, retornar_anio);
}
//===========================================================================//
next_mes.onclick = function () {
    var mes_next = 0;
    switch (mes_view.innerHTML) {
        case "Enero":
            mes_next = 1;
            break;
        case "Febrero":
            mes_next = 2;
            break;
        case "Marzo":
            mes_next = 3;
            break;
        case "Abril":
            mes_next = 4;
            break;
        case "Mayo":
            mes_next = 5;
            break;
        case "Junio":
            mes_next = 6;
            break;
        case "Julio":
            mes_next = 7;
            break;
        case "Agosto":
            mes_next = 8;
            break;
        case "Septiembre":
            mes_next = 9;
            break;
        case "Octubre":
            mes_next = 10;
            break;
        case "Noviembre":
            mes_next = 11;
            break;
        case "Diciembre":
            mes_next = 0;
            cant_anios_next++;
            break;
    }
    var retornar_anio = parseInt(anio_view.innerHTML);
    if (cant_anios_next != 0) {
        retornar_anio = parseInt(anio_view.innerHTML) + cant_anios_next;
        cant_anios_next = 0;
    }
    obtener_calendario(mes_next, retornar_anio);
}
//===========================================================================//
function llenar_calendario(ultimo, mes, anio) {
    var table = "<table class='table_calendar' border='1'><tr style='background:#15406D;color:white'>";
    table += "<td style='text-align:center'>Lunes</td>";
    table += "<td style='text-align:center'>Martes</td>";
    table += "<td style='text-align:center'>Miércoles</td>";
    table += "<td style='text-align:center'>Jueves</td>";
    table += "<td style='text-align:center'>Viernes</td>";
    table += "<td style='text-align:center'>Sabado</td>";
    table += "<td style='text-align:center'>Domingo</td></tr>";
    for (var i = 1; i < ultimo + 1; i++) {
        var fecha_view = new Date(anio, mes, i);
        var fila = "";
        var day = "";
        if (i.toString().length == 1) {
            day = "0" + i;
        } else {
            day = i;
        }
        if (mes < 10) {
            var clase_td = getClassTd(anio + "-0" + (mes + 1) + "-" + day, i);
        } else {
            var clase_td = getClassTd(anio + "-" + (mes + 1) + "-" + day, i);
        }
        if (i == 1) {
            switch (fecha_view.getDay()) {
                case 1:
                    fila += "<tr><td " + clase_td + i + "</td>";
                    break;
                case 2:
                    fila += "<tr><td></td><td " + clase_td + i + "</td>";
                    break;
                case 3:
                    fila += "<tr><td></td><td></td><td " + clase_td + i + "</td>";
                    break;
                case 4:
                    fila += "<tr><td></td><td></td><td></td><td " + clase_td + i + "</td>";
                    break;
                case 5:
                    fila += "<tr><td></td><td></td><td></td><td></td><td " + clase_td + i + "</td>";
                    break;
                case 6:
                    fila += "<tr><td></td><td></td><td></td><td></td><td></td><td " + clase_td + i + "</td>";
                    break;
                default:
                    fila += "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td " + clase_td + i + "</td></tr>";
                    break;
            }
        } else {
            switch (fecha_view.getDay()) {
                case 1:
                    fila += "<tr><td " + clase_td + i + "</td>";
                    break;
                case 0:
                    fila += "<td " + clase_td + i + "</td></tr>";
                    break;
                default:
                    fila += "<td " + clase_td + i + "</td>";
                    break;
            }
            if (i == ultimo) {
                switch (fecha_view.getDay()) {
                    case 1:
                        fila += "<td></td><td></td><td></td><td></td><td></td><td></td></tr>";
                        break;
                    case 2:
                        fila += "<td></td><td></td><td></td><td></td><td></td></tr>";
                        break;
                    case 3:
                        fila += "<td></td><td></td><td></td><td></td></tr>";
                        break;
                    case 4:
                        fila += "<td></td><td></td><td></td></tr>";
                        break;
                    case 5:
                        fila += "<td></td><td></td></tr>";
                        break;
                    case 6:
                        fila += "<td></td></tr>";
                        break;
                }
            }
        }
        table += fila;
    }
    table += "</table>";
    div_calendario.innerHTML = table;
}
//===========================================================================//
//===========================================================================//
function getMes(mesNro) {
    var mesRetornar = "";
    switch (mesNro + 1) {
        case 1:
            mesRetornar = "Enero";
            break;
        case 2:
            mesRetornar = "Febrero";
            break;
        case 3:
            mesRetornar = "Marzo";
            break;
        case 4:
            mesRetornar = "Abril";
            break;
        case 5:
            mesRetornar = "Mayo";
            break;
        case 6:
            mesRetornar = "Junio";
            break;
        case 7:
            mesRetornar = "Julio";
            break;
        case 8:
            mesRetornar = "Agosto";
            break;
        case 9:
            mesRetornar = "Septiembre";
            break;
        case 10:
            mesRetornar = "Octubre";
            break;
        case 11:
            mesRetornar = "Noviembre";
            break;
        default:
            mesRetornar = "Diciembre";
            break;
    }
    return mesRetornar;
}
//===========================================================================//
function get_mes_number(mes) {
    var mesRetornar = "";
    switch (mes) {
        case "Enero":
            mesRetornar = 1;
            break;
        case "Febrero":
            mesRetornar = 2;
            break;
        case "Marzo":
            mesRetornar = 3;
            break;
        case "Abril":
            mesRetornar = 4;
            break;
        case "Mayo":
            mesRetornar = 5;
            break;
        case "Junio":
            mesRetornar = 6;
            break;
        case "Julio":
            mesRetornar = 7;
            break;
        case "Agosto":
            mesRetornar = 8;
            break;
        case "Septiembre":
            mesRetornar = 9;
            break;
        case "Octubre":
            mesRetornar = 10;
            break;
        case "Noviembre":
            mesRetornar = 11;
            break;
        default:
            mesRetornar = 12;
            break;
    }
    return mesRetornar;
}
//================================================================================//
function getClassTd(fecha, indice) {
    var retornar = "";
    var day = "";
    var mes = "";
    if (new Date().getDate() == 1 || new Date().getDate() == 2 || new Date().getDate() == 3 || new Date().getDate() == 4 || new Date().getDate() == 5 || new Date().getDate() == 6 || new Date().getDate() == 7 || new Date().getDate() == 8 || new Date().getDate() == 9) {
        day = "0" + new Date().getDate();
    } else {
        day = new Date().getDate();
    }
    if (new Date().getMonth() == 0 || new Date().getMonth() == 1 || new Date().getMonth() == 2 || new Date().getMonth() == 3 || new Date().getMonth() == 4 || new Date().getMonth() == 5 || new Date().getMonth() == 6 || new Date().getMonth() == 7 || new Date().getMonth() == 8 || new Date().getMonth() == 9) {
        mes = new Date().getMonth() + 1;
        mes = "0" + mes.toString();
    } else {
        mes = new Date().getMonth() + 1;
    }
    var fecha_act = new Date().getFullYear() + "-" + mes + "-" + day;
    if (eventos_registrados.length == 0) {
        retornar = getClassTdAuxiliar(fecha);
    } else {
        var cont = 0;
        for (var i = 0; i < eventos_registrados.length; i++) {
            if (eventos_registrados[i]['fecha'] == fecha) {
                cont++;
            }
        }
        if (cont == 0) {
            retornar = getClassTdAuxiliar(fecha);
        } else {
            retornar = getClassTdAuxiliarOcupado(fecha, indice);
        }
    }
    if (fecha_act == fecha) {
        retornar = "style='color:#0682A1'" + retornar;
    }
    return retornar;
}

function getClassTdAuxiliar(fecha) {
    var retornar = "";
    if (lista_fechas.length == 0) {
        retornar = "class='calendar_td'  >";
    } else {
        var existe = false;
        for (var i = 0; i < lista_fechas.length; i++) {
            if (lista_fechas[i] == fecha) {
                existe = true;
            }
        }
        if (existe == false) {
            retornar = "class='calendar_td'  >";
        } else {
            retornar = "class='calendar_td_selected'  >";
        }
    }
    return retornar;
}

function getClassTdAuxiliarOcupado(fecha, indice) {
    var retornar = "";
    var texto = "";
    for (var i = 0; i < eventos_registrados.length; i++) {
        if (eventos_registrados[i]['fecha'] == fecha) {
            texto += eventos_registrados[i]['tipo_evento'] + "/" + eventos_registrados[i]['ubicacion'] + "/" + eventos_registrados[i]['horas'] + "/" + eventos_registrados[i]["detalle"] + "º";
        }
    }
    if (lista_fechas.length == 0) {
        retornar = " class='calendar_ocupado' onclick='ver_evento(`" + texto + "`,`" + fecha + "`)'  ><span class='fa fa-map-marker' ></span>";
    } else {
        var existe = false;
        for (var i = 0; i < lista_fechas.length; i++) {
            if (lista_fechas[i] == fecha) {
                existe = true;
            }
        }
        if (existe == false) {
            retornar = " class='calendar_ocupado' onclick='ver_evento(`" + texto + "`,`" + fecha + "`)' ><span class='fa fa-map-marker' ></span>";
        } else {
            retornar = " class='calendar_ocupado_selected' onclick='ver_evento(`" + texto + "`,`" + fecha + "`)' ><span class='fa fa-map-marker' ></span>";
        }
    }
    return retornar;
}

function ver_evento(texto, fecha) {
    var separado = texto.split("º");
    var contenido = "<br>";
    for (var i = 0; i < separado.length - 1; i++) {
        var detalle = "";
        var separado2 = separado[i].split("/");
        if (separado2[3] == "" || separado2[3] == null) {
            detalle = "Sin detalles";
        } else {
            detalle = separado2[3];
        }
        contenido += "<div style='width:95%;text-align:left;font-size:20px;padding-left:2%'><span class='fa fa-bookmark-o'></span> " + separado2[0];
        contenido += "<br><br><span class='fa fa-map-marker'></span> " + separado2[1] + "<br><br>";
        contenido += "<span class='fa fa-clock-o'></span> " + separado2[2] + "<br><br>";
        contenido += "<span class='fa fa-warning'></span> " + detalle + "</div><br><br><div style='width:100%;height:2px !important;background:white;'></div><br>";
    }
    swal({
        title: "Eventos del " + fecha,
        text: "<center><em class='fa fa-calendar' style='font-size:50px;color:black;'></em></center><br><br><div style='width:100%;height:280px;color:white;background:#9A8BBA; overflow-y:scroll'>" + contenido + "</div>",
        html: true
    });
}

