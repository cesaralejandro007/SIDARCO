var keyup_telefono = /^[0-9]{11}$/;
var keyup_correo = /^[A-Za-z0-9_\u00d1\u00f1\u00E0-\u00FC]{3,25}[@]{1}[A-Za-z0-9]{3,8}[.]{1}[A-Za-z]{2,4}$/;
var keyup_contrasena = /^[A-ZÁÉÍÓÚa-zñáéíóú0-9,.@#%$^&*!?:]{5,8}$/;
var keyup_seguridad = /^[A-ZÁÉÍÓÚa-zñáéíóú0-9,.@#%$^&*!?:]{3,25}$/;

document.getElementById("editarpassword").onclick = function(){
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
    };
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

    document.getElementById("editarperfil").onclick = function(){
        Swal.fire({
            title: 'Editar perfil',
            html:
            '<span id="validarcontrasena1"></span>' +
            '<label for="message-text" style="color: rgb(21, 64, 109);" class="col-form-label">Información de contacto:</label><br>'+
            '<span id="va1" style="font-size:14px"></span><input type="text" id="correo" value='+document.getElementById("correo1").value+' maxlength="40" placeholder="Correo" class="form-control mb-2">'+
            '<span id="va2" style="font-size:14px"></span><input type="text" id="tlf" value='+document.getElementById("telefono1").value+' maxlength="11" placeholder="Telefono" class="form-control mb-2">',
            confirmButtonColor: '#15406D',
            confirmButtonText: "Actualizar",
            focusConfirm: true,
            preConfirm: () => {
                if(document.getElementById('correo').value != "" && document.getElementById('tlf').value != ""){
                    a = valida_registrar();
                    if (a != "") {
                        return false;
                        } else {
                            $.ajax({
                                type: "POST",
                                url: BASE_URL + "Inicio/actualizarperfil",
                                data: { "correo":  document.getElementById('correo').value, "telefono": document.getElementById('tlf').value, "cedula": document.getElementById("cedula_persona").value},
                                }).done(function (result){
                                if (result == 1) {
                                    setTimeout(function () {
                                    swal({
                                        title: "Éxtito",
                                        text: "Los datos de perfil se actualizo correctamente",
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
                    }else{
                        document.getElementById("validarcontrasena1").innerHTML = '<div class="alert alert-dismissible fade show pl-5" style="background:#9D2323; color:white" role="alert">Complete los campos solicitados.<i class="far fa-backspace p-0 m-0 d-none" id="cerraralert" data-dismiss="alert" aria-label="Close"></i></div>';
                        setTimeout(function () {
                            $("#cerraralert").click();
                          }, 3000);
                        return false;
                      }
                }
            })
            document.getElementById("tlf").onkeypress = function (e) {
              er = /^[0-9]*$/;
              validarkeypress(er, e);
            };
              document.getElementById("tlf").onkeyup = function () {
                r = validarkeyup(
                  keyup_telefono,
                  this,
                  document.getElementById("va2"),
                  "Solo numeros de 11  digitos"
                );
              };
              document.getElementById("correo").onkeypress = function (e) {
                er = /^[A-Za-z0-9_\u00d1\u00f1\u00E0-\u00FC@.-]*$/;
                validarkeypress(er, e);
              };
            document.getElementById("correo").onkeyup = function () {
                r = validarkeyup(
                  keyup_correo,
                  this,
                  document.getElementById("va1"),
                  "El formato debe ser ejemplo@gmail.com"
                );
              };

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

        
function valida_registrar() {
    var error = false;
    correo = validarkeyup(
      keyup_correo,
      document.getElementById("correo"),
      document.getElementById("va1"),
      "El formato debe ser ejemplo@gmail.com"
    );
    telefono = validarkeyup(
      keyup_telefono,
      document.getElementById("tlf"),
      document.getElementById("va2"),
      "Solo numeros de 11  digitos"
    );
    if (
        telefono == 0 ||
      correo == 0 
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