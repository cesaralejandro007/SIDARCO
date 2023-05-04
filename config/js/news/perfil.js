alert(document.getElementById("prueba").textContent);
document.getElementById("editarperfil").onclick = function(){
        Swal.fire({
            title: 'Cambiar contraseña',
            html:
            '<span id="validarcontrasena0"></span>' +
            '<label for="message-text" style="color: rgb(21, 64, 109);" class="col-form-label">Ingrese su contraseña actual:</label>'+
            '<input type="password" id="input0" placeholder="Contraseña actual" class="form-control mb-2"><span id="v1"></span>',
            confirmButtonColor: '#15406D',
            confirmButtonText: "Siguiente",
            allowOutsideClick: false,
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
          '<label for="message-text" style="color: rgb(21, 64, 109);" class="col-form-label">Informacion de contraseña:</label>'+
          '<input type="password" id="input1" placeholder="Contraseña" class="form-control mb-2"><span id="v1"></span>' +
          '<input type="password" id="input2" placeholder="Confirmar contraseña" class="form-control mb-2"><span id="v2"></span>'+
          '<label for="message-text" style="color: rgb(21, 64, 109);" class="col-form-label">Preguntas de seguridad:</label>'+
          '<input type="text" id="color" placeholder="Ingrese el color favorito" class="form-control mb-2"><span id="v1"></span>' +
          '<input type="text" id="animal" placeholder="Ingrese el animal favorito" class="form-control mb-2"><span id="v1"></span>' +
          '<input type="text" id="mascota" placeholder="Ingrese el nombre de la primera mascota" class="form-control mb-2"><span id="v2"></span>',
        confirmButtonColor: '#15406D',
        confirmButtonText: "Cambiar",
        focusConfirm: true,
        preConfirm: () => {
            if(document.getElementById('input1').value != "" && document.getElementById('input2').value != "" && document.getElementById('color').value != "" && document.getElementById('animal').value != "" && document.getElementById('mascota').value != ""){
            if(document.getElementById('input1').value == document.getElementById('input2').value){
                preguntas_seguridad = document.getElementById('color').value.toLowerCase()+document.getElementById('animal').value.toLowerCase()+document.getElementById('mascota').value.toLowerCase();
                cambiarcontraseña( 
                    document.getElementById('input1').value,
                    preguntas_seguridad,
                    document.getElementById("cedula_persona").value
                    );
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
                    text: "La contraseña ha sido cambiada satisfactoriamente",
                    type: "success",
                    showConfirmButton: false,
                    timer: 2000,
                });

                setTimeout(function () {
                    location.reload();
                }, 1000);
                }, 500);
            }
        });
    }
