
       var fecha_hora=document.getElementById("fecha_hora");
       var tension =document.getElementById("tension");
       var frecuencia=document.getElementById("frecuencia");
       var valid_tension=document.getElementById("valid_tension");
       var valid_fecha=document.getElementById("valid_fecha_hora");
       var valid_frecuencia=document.getElementById("valid_frecuencia");
       var btn_seleccionar=document.getElementById("seleccionar_persona");
        var persona=document.getElementById("cedula_propietario");
        var valid_persona=document.getElementById("valid_persona");
        var span_persona=document.getElementById("nombre_persona");
        var div_info= document.getElementById("second");


        btn_seleccionar.onclick = function() {
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
                        "cedula": persona.value
                    },
                }).done(function(result) {
                    if (result == 0) {
                        valid_persona.innerHTML = "Esta persona no se encuentra registrada";
                    } else {
                        valid_persona.innerHTML = "";
                        var datos = JSON.parse(result);
                        span_persona.innerHTML = datos[0]['primer_nombre'] + " " + datos[0]['primer_apellido'];
                        persona.disabled = 'disabled';
                        btn_seleccionar.style.display = 'none';
                        div_info.style.display = '';
                        registrar_btn.style.display = 'none';
                    }
                })
            }
        }

        $(document).ready(function() { 
            $("#enviar").on("click", function() {
       /*   if (fecha_hora.value == '' && tension.value == '' && frecuencia.value == '') {
            valid_fecha.innerHTML = 'Debe seleccionar una fecha y hora';
            fecha_hora.style.borderColor = 'red';
            valid_fecha.style.color = 'red';
            fecha_hora.focus();
            valid_tension.innerHTML = 'el campo de tensión no puede estar vacio';
            tension.style.borderColor = 'red';
            valid_tension.style.color = 'red';
            tension.focus();
            valid_frecuencia.innerHTML = 'el campo frecuencia no puede estar vacio';
            frecuencia.style.borderColor = 'red';
            valid_frecuencia.style.color = 'red';
            frecuencia.focus(); */
           /*  valid_persona.innerHTML = 'el campo cedula no puede estar vacio';
            persona.style.borderColor = 'red';
            valid_persona.style.color = 'red';
            persona.focus(); */
        
        if (fecha_hora.value == '') {
            valid_fecha.innerHTML = 'Debe seleccionar una fecha y hora';
            fecha_hora.style.borderColor = 'red';
            valid_fecha.style.color = 'red';
            fecha_hora.focus();
        } 
        /* else {
            valid_persona.innerHTML = '';
            fecha_hora.style.borderColor = '';
            if (direccion.value == '' || direccion.value == null) {
                valid_tension.innerHTML = 'el campo direccion no puede estar vacio';
                direccion.style.borderColor = 'red';
                valid_tension.style.color = 'red';
                direccion.focus();
            } else {
                valid_tension.innerHTML = '';
                direccion.style.borderColor = '';
                if (nombre_negocio.value == '' || nombre_negocio.value == null) {
                    mensaje_negocio.innerHTML = 'el campo nombre no puede estar vacio';
                    nombre_negocio.style.borderColor = 'red';
                    mensaje_negocio.style.color = 'red';
                    nombre_negocio.focus();
                } else {
                    mensaje_negocio.innerHTML = '';
                    nombre_negocio.style.borderColor = '';
                    if (persona.value == '' || persona.value == null) {
                        valid_persona.innerHTML = 'el campo cedula no puede estar vacio';
                        persona.style.borderColor = 'red';
                        valid_persona.style.color = 'red';
                        persona.focus();
                    } */  
                    else {
                        valid_persona.innerHTML = '';
                        persona.style.borderColor = '';
                            var datos = {
                                fecha_hora: $("#fecha_hora").val(),
                                tension: $("#tension").val(),
                                frecuencia: $("#frecuencia").val(),
                                persona: $("#cedula_propietario").val(),
                                estado: 1
                            };
                                    $.ajax({
                                        type: 'POST',
                                        url: BASE_URL + 'presion_arterial/Administrar',
                                        data: {
                                            'datos': datos,
                                            peticion: "Administrar",
                                            sql: "SQL_02",
                                            accion: "Se ha registrado un nuevo control arterial: "+datos.nombre_negocio,
                                        },
                                        success: function(respuesta) {
                                            if (respuesta == 1) {
                                                swal({
                                                    title: "Exito!",
                                                    text: "Se ha registrado de forma exitosa",
                                                    type: "success",
                                                    showConfirmButton: false,
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
                                                    customClass: "bigSwalV2",
                                                });
                                            }
                                        },
                                        error: function(respuesta) {
                                            alert("Error al enviar Controlador")
                                        }
                                    });
                                }
                            }
               /*          }
                    }
        }

    }
}); */

   /*  document.onkeypress = function(e) {
        if (e.which == 13 || e.keyCode == 13) {
            return false;
        } else {
            return true;
        }
    }
       */  
            )})