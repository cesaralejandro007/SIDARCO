$(function() {
    $.ajax({
        type: "POST",
        url: BASE_URL + "Inventario/Administrar",
        data: {
            peticion: "Consulta_Ajax",
        },
    }).done(function(datos) {
        var data = JSON.parse(datos);
        $("#example1").DataTable({
            data: data,
            columns: [{
                data: function(data) {
                    return ('<td class="text-center">' + '<a href="javascript:void(0)" style="margin-right: 5px;background:#15406D; color:white" class="btn ver-popup" title="Ver" type="button" data-toggle="modal" data-target="#ver">' + '<i class="fa fa-eye"></i>' + "</a>" + '<a href="javascript:void(0)" style="margin-right: 5px;background:#EEA000" class="btn btnEditar"  title="Actualizar" type="button" data-toggle="modal" data-target="#actualizar">' + '<i class="fa fa-edit" style="color: white;"></i>' + "</a>" + '<a href="javascript:void(0)" style="margin-right: 5px;background:#9D2323;color:white" class="btn mensaje-eliminar" title="Eliminar">' + '<i class="fa fa-trash"></i>' + "</a>" + '<p style="display: none;">' + data.id_inventario + "</p>" + "</td>");
                },
            },{
                data: "medicamento",
            }, {
                data: "unidades",
            }, {
                data: "id_grupo",
            }, {
                data: "caducidad",
            },{
                data: "lote",
            },  ],
            responsive: true,
            autoWidth: false,
            ordering: true,
            info: true,
            processing: true,
            pageLength: 10,
            lengthMenu: [5, 10, 20, 30, 40, 50, 100]
        }).buttons().container().appendTo("#example1_wrapper .col-md-6:eq(0)");
        $("#example1").on("click", ".mensaje-eliminar", function() {
            fila = $(this).closest("tr");
            id = fila.find("td:eq(5)").text();
            var estado = {
                tabla: "inventario",
                id_tabla: "id_inventario",
                param: id,
                estado: 0
            };
            swal({
                title: "¿Desea eliminar éste elemento?",
                text: "¡El elemento seleccionado será eliminado de manera permanente!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#9D2323",
                confirmButtonText: "¡Si, eliminar!",
                cancelButtonText: "¡No, cancelar!",
                closeOnConfirm: false,
                closeOnCancel: false,
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: BASE_URL + "Inventario/Administrar",
                        type: "POST",
                        data: {
                            peticion: "Eliminar",
                            estado: estado,
                            sql: "ACT_DES",
                            accion: "Se ha eliminado el medicamento: " + fila.find("td:eq(1)").text(),
                        },
                    }).done(function(result) {
                        if (result == 1) {
                            swal({
                                title: "Eliminado!",
                                text: "El elemento fue eliminado con exito.",
                                type: "success",
                                showConfirmButton: false,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            swal({
                                title: "ERROR!",
                                text: "Ha ocurrido un Error.</br>" + result,
                                type: "error",
                                html: true,
                                showConfirmButton: true,
                                customClass: "bigSwalV2",
                            });
                        }
                    });
                } else {
                    swal({                             
                        title: "Cancelado",
                        text: "La acción fue cancelada, la información esta segura.",
                        confirmButtonColor: "#15406D",
                        type: "error",
                        html: true,
                        showConfirmButton: true,
                        customClass: "bigSwalV2"});
                }
            });
        });
        $(document).on("click", ".ver-popup", function() {
            fila = $(this).closest("tr");
            medicamento = fila.find("td:eq(0)").text();
            unidades    = fila.find("td:eq(1)").text();
            grupo       = fila.find("td:eq(2)").text();
            caducidad   = fila.find("td:eq(3)").text();
            lote        = fila.find("td:eq(4)").text();
            $("#calle").val(medicamento);
            $("#nombre_inmueble").val(unidades);
            $("#direccion").val(grupo);
            $("#tipo_inmueble").val(caducidad);
            $("#lote").val(lote);
        });
        $(document).on("click", ".btnEditar", function() {
            fila        = $(this).closest("tr");
            id          = fila.find("td:eq(5)").text();
            medicamento = fila.find("td:eq(0)").text();
            unidades    = fila.find("td:eq(1)").text();
            grupo       = fila.find("td:eq(2)").text();
            caducidad   = fila.find("td:eq(3)").text();
            lote        = fila.find("td:eq(4)").text();
            $("#medicamento_2").val(medicamento);
            $("#unidades_2").val(unidades);
            $("#id_grupo_2").val(grupo);
            $("#caducidad_2").val(caducidad);
            $("#lote_2").val(lote);
           /*  $.ajax({

                type: "POST",
                url: BASE_URL + "inventario/Administrar",
                data: {
                    peticion: "Consultas_Calle",
                    calle: calle,
                },
            }).done(function(datos) {
                document.getElementById("id_calle2").value = datos;
            }).fail(function() {
                alert("error")
            }) */
            $(document).on("click", "#enviar", function() {

                var datos = {
                    id_calle: $("#id_calle2").val(),
                    medicamento: $("#medicamento_2").val(),
                    direccion_inmueble: $("#direccion2").val(),
                    id_tipo_inmueble: $("#tipo_inmueble2").val(),
                    estado: 1,
                    id_inmueble: id,
                };
                
                $.ajax({
                    type: "POST",
                    url: BASE_URL + "inventario/Administrar",
                    data: {
                        datos: datos,
                        peticion: "Administrar",
                        sql: "SQL_03",
                        accion: "Se ha Actualizado el inventario: " + datos.medicamento,
                    },
                }).done(function(datos) {
                    if (datos == 1) {
                        swal({
                            title: "Actualizado!",
                            text: "El elemento fue Actualizado con exito.",
                            type: "success",
                            showConfirmButton: false
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    } else {
                        swal({
                            title: "ERROR!",
                            text: "Ha ocurrido un Error.</br>" + datos,
                            type: "error",
                            html: true,
                            showConfirmButton: true,
                            customClass: "bigSwalV2",
                        });
                    }
                }).fail(function() {
                    alert("error");
                });
            });
        });
    }).fail(function() {
        alert("error");
    });
});