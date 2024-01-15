    $(document).ready(function() {
        $("#enviar").on("click", function() {
            var form = $("#formulario");
            var medicamento = document.getElementById("medicamento");
            var unidades = document.getElementById("unidades");
            var grupo = document.getElementById("grupo");
            var caducidad = document.getElementById("caducidad");
            var lote      = document.getElementById("lote");
            var mensaje_1 = document.getElementById("mensaje_1");
            var mensaje_2 = document.getElementById("mensaje_2");
            var mensaje_3 = document.getElementById("mensaje_3");
            var mensaje_4 = document.getElementById("mensaje_4");
            var mensaje_5 = document.getElementById("mensaje_5");
            var datos = {
                medicamento: $("#medicamento").val(),
                unidades: $("#unidades").val(),
                grupo: $("#grupo").val(),
                caducidad: $("#caducidad").val(), 
                lote:$("#lote").val(),
                estado: 1
            };
            var retornar = false;
            if (medicamento.value == 0) {
                mensaje_1.innerHTML = 'Debe seleccionar un medicamento';
                medicamento.style.borderColor = 'red';
                mensaje_1.style.color = 'red';
                medicamento.focus();
            } else {
                mensaje_1.innerHTML = '';
                medicamento.style.borderColor = '';
                if (unidades.value == '' || unidades.value == null) {
                    mensaje_2.innerHTML = 'el campo nombre no puede estar vacio';
                    unidades.style.borderColor = 'red';
                    mensaje_2.style.color = 'red';
                    unidades.focus();
                } else {
                    mensaje_2.innerHTML = '';
                    unidades.style.borderColor = '';
                    if (grupo.value == '' || grupo.value == null) {
                        mensaje_3.innerHTML = 'el campo grupo no puede estar vacio';
                        grupo.style.borderColor = 'red';
                        mensaje_3.style.color = 'red';
                        grupo.focus();
                    } else {
                        mensaje_3.innerHTML = '';
                        grupo.style.borderColor = '';
                        if (caducidad.value == '' || caducidad.value == null) {
                            mensaje_4.innerHTML = 'el campo tipo de inmueble no puede estar vacio';
                            caducidad.style.borderColor = 'red';
                            mensaje_4.style.color = 'red';
                            caducidad.focus();
                        } else {
                            mensaje_4.innerHTML = '';
                            caducidad.style.borderColor = '';
                            $.ajax({
                                type: 'POST',
                                url: BASE_URL + 'inventario/Administrar',
                                data: {
                                    'datos': datos,
                                    peticion: "Administrar",
                                    sql: "SQL_02",
                                    accion: "Se ha registrado un nuevo medicamento: " + datos.medicamento,
                                },
                                success: function(respuesta) {
                                    if (respuesta == 1) {
                                        swal({
                                            title: "Éxito!",
                                            text: "Se ha registrado de forma exitosa",
                                            type: "success",
                                            showConfirmButton: false,
                                        });
                                        setTimeout(function() {
                                            location.href = BASE_URL + 'inventario/Administrar/Consultas';
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
                }
            }
        });
        document.onkeypress = function(e) {
            if (e.which == 13 || e.keyCode == 13) {
                envioFormulario();
                return false;
            } else {
                return true;
            }
        }
    });