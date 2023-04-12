function ver_datos(
  persona,
  ocupacion,
  condicion_lab,
  transporte,
  bonos,
  misiones,
  divisiones
  /* comunidad_i,
  org_politica */
){
  var persona_info = JSON.parse(persona);
  var ocupacion_info = JSON.parse(ocupacion);
  var condicion_lab_info = JSON.parse(condicion_lab);
  var transporte_info = JSON.parse(transporte);
  var bonos_info = JSON.parse(bonos);
  var misiones_info = JSON.parse(misiones);
  var divisiones = JSON.parse(divisiones);
/*   var comunidad_i_info = JSON.parse(comunidad_i);
  var org_politica_info = JSON.parse(org_politica); */

  var tabla =
    "<div style='height:380px;overflow-y:scroll;'><em class='fa fa-user' style='font-size:60px'></em>";
    var gen;
    persona_info["genero"] == "M" ? (gen = "mars") : (gen = "venus");
  tabla +=
    "<br><table style='width:100%' border='1'><div class='border border-bottom-0 border-dark rounded-top p-1' style='background:#15406D;color:white;font-weight:bold'>Datos Personales</div><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td style='width:20%;'>Cédula</td><td style='width:20%'>Género</td><td style='width:20%'>Fecha de nacimiento</td><td style='width:20%'>Nacionalidad</td><td style='width:20%'>Estado civil</td></tr>";
  tabla +=
    "<tr><td style='width:20%'><em class='fa fa-drivers-license-o'></em> " +
    persona_info["cedula_persona"];
  tabla +=
  "</td><td style='width:20%'><em class='fa fa-" +
  gen +
  "'></em> " +
  persona_info["genero"] +
  "</td><td style='width:20%'><em class='fa fa-birthday-cake'></em> " +
  persona_info["fecha_nacimiento"] +
  "</td><td style='width:20%'><em class='fa fa-globe'></em> " +
  persona_info["nacionalidad"] +
    "</td><td style='width:20%'><em class='fa fa-address-card'></em> " +
    persona_info["estado_civil"] +
    "</td></tr></table>";

  var tabla2 =
    "<br><table style='width:100%' border='1'><div class='border border-bottom-0 border-dark rounded-top p-1' style='background:#15406D;color:white;font-weight:bold'>Datos de Contacto</div><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td style='width:25%'>Correo</td><td style='width:25%'>Teléfono</td><td style='width:25%'>Teléfono de Casa</td><td style='width:25%'>WhatsApp</td></tr>";    
  tabla2 +=
    "<tr><td style='width:25%'><em class='fa fa-envelope'></em> " +
    persona_info["correo"];

  tabla2 +=
    "</td><td style='width:25%'><em class='fa fa-phone'></em> " +
    persona_info["telefono"] +
    "</td><td style='width:25%'>" +
    persona_info["telf_casa"] +
    "</td><td style='width:25%'><em class='fa fa-whatsapp'></em> " +
    get_letras(persona_info["whatsapp"]) +
    "</td></tr></table>";

  var tabla3 =
    "<br><table style='width:100%' border='1'><div class='border border-bottom-0 border-dark rounded-top p-1' style='background:#15406D;color:white;font-weight:bold'>Datos Laborales</div><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td style='width:25%'>Nivel educativo</td><td style='width:25%'>Condición laboral</td><td style='width:25%'>Ubicación</td><td style='width:25%'>Ocupación</td></tr>";
    var ocup;
    var cond;
    ocupacion_info.length == 0
        ? (ocup = "No posee")
        : (ocup = ocupacion_info[0]["nombre_ocupacion"]);
      condicion_lab_info.length == 0
        ? (cond = "No posee")
        : (cond = condicion_lab_info[0]["nombre_cond_laboral"]);
  tabla3 +=
    "</td><td style='width:25%'><em class='fa fa-mortar-board'></em> " +
    persona_info["nivel_educativo"] +
    "</td><td style='width:25%'><em class='fa fa-briefcase'></em> " +
    ocup +
    "</td><td style='width:25%'><em class='fa fa-briefcase'></em> " +
    persona_info["nombre_ubi"] +
    "</td><td style='width:25%'><em class='fa fa-briefcase'></em> " +
    ocup +
    "</td></tr></table>";


  var tabla6 =
    "<br><table style='width:100%' border='1'><tr  class='text-dark' style='background:#AEB6BF;font-weight:bold'><td style='width:25%'>Organización política</td><td style='width:25%'>Transporte</td><td style='width:25%'>Bonos</td><td style='width:25%'>Misiones</td></tr>";
/*   var org;
  org_politica_info.length == 0
    ? (org = "No")
    : (org = org_politica_info[0]["nombre_org"]);
 */  
var transp;

  transporte_info.length == 0
    ? (transp = "Público")
    : (transp = transporte_info[0]["descripcion_transporte"]);

/*   tabla6 +=
    "<tr><td style='width:25%'><em class='fa fa-puzzle-piece'></em> " +
    org +
    "</td>";
 */
  tabla6 +=
    "<td style='width:25%'><em class='fa fa-car'></em> " + transp + "</td>";

  if (bonos_info.length == 0) {
    tabla6 += "<td style='width:25%'>No aplica</td>";
  } else {
    var texto = "";
    for (var i = 0; i < bonos_info.length; i++) {
      texto += " - " + bonos_info[i]["nombre_bono"] + "<br><hr>";
    }

    tabla6 +=
      "<td ><div style='width:100%;overflow-y:scroll;border-radius:6px;height:200px;'><center>" +
      texto;
    tabla6 += "</center></div></td>";
  }

  if (misiones_info.length == 0) {
    tabla6 += "<td style='width:25%'>No aplica</td></tr></table>";
  } else {
    var texto = "";
    for (var i = 0; i < misiones_info.length; i++) {
      var recibe = "";
      misiones_info[i]['recibe_actualmente'] == 1 ? recibe = "Recibe actualmente" : recibe = misiones_info[i]['fecha'];
      texto += " - " + misiones_info[i]["nombre_mision"] + " (" + recibe + ")<br><hr>";
    }

    tabla6 +=
      "<td ><div style='width:100%;overflow-y:scroll;border-radius:6px'><center>" +
      texto;
    tabla6 += "</center></div></td></tr><table>";
  }

  var tabla7 =
  "<br><table style='width:100%' border='1'><tr  class='text-dark' style='background:#AEB6BF;font-weight:bold'><td style='width:25%'>Ingreso al Seniat</td><td style='width:25%'>Ingreso a la Administración Pública</td><td style='width:25%'>Fecha de Notificación</td></tr>";
  tabla7 +=
  "<tr><td style='width:25%'> " + 
  persona_info["ing_seniat"]+
  "</td><td style='width:25%'> "+ 
  persona_info["ing_publica"]+ 
  "</td><td style='width:25%'> " +
  persona_info["fecha_notificacion"] +
  "</td>" +
  "</center></div></td></tr><table>";

  var tabla8 =
  "<br><table style='width:100%' border='1'><tr  class='text-dark' style='background:#AEB6BF;font-weight:bold'><td style='width:20%'>Prima</td><td style='width:20%'>Fideicomiso</td><td style='width:20%'>Declaración Jurada</td><td style='width:20%'>Inscripción IVSS</td></tr>";
  tabla8 +=
  "<tr><td style='width:20%'> " + 
  persona_info["prima"]+
  "</td><td style='width:20%'> "+ 
  persona_info["fideicomiso"]+ 
  "</td><td style='width:20%'> "+ 
  persona_info["declaracion_j"] +
  "</td><td style='width:20%'> " +
  persona_info["inscripcion_ivss"]+ 
  "</td>" +
  "</center></div></td></tr><table>";

  tabla +=
    "<br>" +
    tabla2 +
    "<br>" +
    tabla3 +
    "<br>" +
    tabla7 +
    "<br>" +
    tabla8;
  tabla +=
    "<br><br><table style='width:100%' border='1'><tr  class='text-dark' style='background:#AEB6BF;font-weight:bold'><div class='border border-bottom-0 border-dark rounded-top p-1' style='background:#15406D;color:white;font-weight:bold'>Ubicación del funcionario</div></tr>";

  if (divisiones.length == 0) {
    tabla += "<tr><td colspan='4'>No aplica</td></tr></table>";
  } else {
    var texto = "";
    texto =
      "<table style='width:100%' class='table table-hover border-dark'><tr class='text-dark' style='background:#AEB6BF;'><td style='width:25% background:#AEB6BF;font-weight:bold;'>Divisiones</td><td style='width:25% background:#AEB6BF;font-weight:bold'>Áreas</td><td style='width:25% background:#AEB6BF;font-weight:bold'>Secciones</td></tr>";
    for (var i = 0; i < divisiones.length; i++) {
      texto +=
        "<tr><td style='width:25%'>" +
        divisiones[i]["division"] +
        "</td><td style='width:25%'>" +
        divisiones[i]["area"] +
        "</td>";
      texto +=
        "<td style='width:25%'>" +
        divisiones[i]["seccion"] +
        "</td></tr>";
    }

    tabla +=
      "<tr><td colspan='4'><div style='width:100%;overflow-y:scroll;border-radius:6px;height:200px;'><center>" +
      texto;
    tabla += "</center></div></td></tr></table>";
  }

  swal({
    title:
      persona_info["primer_nombre"] +
      " " +
      persona_info["segundo_nombre"] +
      " " +
      persona_info["primer_apellido"] +
      " " +
      persona_info["segundo_apellido"],
    text: tabla,
    html: true,
    confirmButtonColor: '#15406D',
    customClass: "bigSwalV2",
  });
}

function get_letras(dato) {
  if (parseInt(dato) == 0) {
    return "No";
  } else {
    return "Si";
  }
}

function egresar_datos(cedula) {
  $.ajax({
    type: "POST",
    url: BASE_URL + "Personas/consultar_tabla_egresados",
  }).done(function(result) {
    document.getElementById("input1").innerHTML = result;
  });

Swal.fire({
  title: 'Motivo de egreso',
  html:
    '<select id="input1" class="form-control col-12 mb-2"><option value="0">-Seleccione-</option></select><span id="v1"></span>'+
    '<textarea id="input2" placeholder="Descripción" class="form-control col-12 mb-2"></textarea><span id="v2"></span>'+
    '<input type="date" id="input3" class="form-control mb-2"><span id="v3"></span>',
  confirmButtonColor: '#15406D',
  focusConfirm: false,
  preConfirm: () => {
    if(document.getElementById('input1').value != "0" && document.getElementById('input2').value != "" && document.getElementById('input3').value != ""){
      egresar( document.getElementById('input1').value,
      document.getElementById('input2').value,document.getElementById('input3').value);
    }else {
      swal({
        type: "error",
        title: "Error",
        text: "Debe completar los campos solicitados",
        timer: 2000,
        showConfirmButton: false,
      });
    }
  }
})
function egresar(v1,v2,v3){
  swal(
    {
      title: "Atención",
      text:
        "Estás por Egresar la persona con la cédula " +
        cedula +
        ", si lo haces será transferido al modulo egresos, ¿Desea continuar?",
      type: "warning",
      showCancelButton: true,
      cancelButtonColor: '#d33',
      confirmButtonColor: '#9D2323',
      cancelButtonText: "No",
      confirmButtonText: "Si",
    },
    function (isConfirm) {
      if (isConfirm) {
        $.ajax({
          type: "POST",
          url: BASE_URL + "Personas/egresar_persona",
          data: { cedula_persona: cedula,id_egresado:v1,descripcion:v2,fecha:v3},
        }).done(function (result) {
          if (result == 1) {
            setTimeout(function () {
              swal({
                title: "Éxtito",
                text: "La persona ha sido removid@ satisfactoriamente",
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
    }
  );
}
}


function ingresar_datos(cedula) {
  swal(
    {
      title: "Atención",
      text:
        "Estás por Ingresar la persona con cédula " +
        cedula +
        ", si lo haces será registrado en ingresos, ¿Desea continuar?",
      type: "warning",
      showCancelButton: true,
      cancelButtonColor: '#d33',
      confirmButtonColor: '#9D2323',
      cancelButtonText: "No",
      confirmButtonText: "Si",
    },
    function (isConfirm) {
      if (isConfirm) {
        $.ajax({
          type: "POST",
          url: BASE_URL + "Personas/ingresar_persona",
          data: { cedula_persona: cedula },
        }).done(function (result) {
          if (result == 1) {
            setTimeout(function () {
              swal({
                title: "Éxtito",
                text: "La persona ha sido Ingresad@ satisfactoriamente",
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
    }
  );
}


var modal_title = document.getElementById("modal-title");
var vn1 = document.getElementById("n1");
var vn2 = document.getElementById("n2");
var va1 = document.getElementById("a1");
var va2 = document.getElementById("a2");
var vtlfc = document.getElementById("tlfc");
var vtlf = document.getElementById("tlf");
var vws = document.getElementById("ws");
var vcor = document.getElementById("cor");
var vfnac = document.getElementById("fnac");
var vgen = document.getElementById("gen");
var vnac = document.getElementById("nac");
var vedoc = document.getElementById("edoc");
var vnedu = document.getElementById("nedu");
var vubic = document.getElementById("ubic");
var vnomina = document.getElementById("idnomina");
var vmili = document.getElementById("mili");
var vjeffam = document.getElementById("jeffam");
var vingresos = document.getElementById("ingresos");
var vingresoa = document.getElementById("ingresoa");
var vfechan = document.getElementById("fechan");
var vdesig = document.getElementById("desig");
var vprima1 = document.getElementById("prima1");
var vdclara = document.getElementById("declara");
var vinscripcion_ivss = document.getElementById("inscripcion_ivss");
var vfideicomiso = document.getElementById("fideicomiso");
var vgrado = document.getElementById('jqresguardo');

var vjefcas = document.getElementById("jefcas");
var vprivlib = document.getElementById("privlib");
var vafro = document.getElementById("afro");
var vcomindi = document.getElementById("comindi");
var vvercomindi = document.getElementById("vercomindi");
var vvalcomindi = document.getElementById("valcomindi");
var vvervalcomindi = document.getElementById("vervalcomindi");
var vocup = document.getElementById("ocup");
var vverocup = document.getElementById("verocup");
var vocupinput = document.getElementById("ocupinput");
var spanocup = document.getElementById("spannewocup");
var vcondlab = document.getElementById("condlab");
var vnomcondlab = document.getElementById("nomcondlab");
var vsectlab = document.getElementById("sectlab");
var vtipsectlab = document.getElementById("tipsectlab");
var spancondlab = document.getElementById("spannewcondlab");
var vorgpol = document.getElementById("orgpol");
var vorgpolinput = document.getElementById("orgpolinput");
var spanorgpol = document.getElementById("spanneworgpol");
var vtransp = document.getElementById("transp");
var vtranspinput = document.getElementById("tiptransinput");
var vvertiptrans = document.getElementById("tiptransp");
var vbonos = document.getElementById("bonos");
var vmisiones = document.getElementById("misiones");
var vproyectos = document.getElementById("proyectos");
var vdivisionesareas = document.getElementById("divisionesareas");
var btn_guardar = document.getElementById("guardar_cambios");
var inf_persona = new Object();
var add_bono = document.getElementById("add_bono");
var add_mision = document.getElementById("add_mision");
function editar_datos(
  persona,
  ocupacion,
  condicion_lab,
  transporte,
  bonos,
  misiones,
  divisiones,
  comunidad_i,
  org_politica
) {

  $("#edit_persona").modal({ backdrop: "static", keyboard: false });
  var persona_info = JSON.parse(persona);
  var ocupacion_info = JSON.parse(ocupacion);
  var condicion_lab_info = JSON.parse(condicion_lab);
  var divisiones = JSON.parse(divisiones);
  /*   var transporte_info = JSON.parse(transporte); */
/*   var bonos_info = JSON.parse(bonos);
  var misiones_info = JSON.parse(misiones); */
/*   var comunidad_i_info = JSON.parse(comunidad_i); */
  /* var org_politica_info = JSON.parse(org_politica); */

  inf_persona["cedula_persona"] = persona_info["cedula_persona"];
  modal_title.innerHTML = "Editar persona: " + persona_info["cedula_persona"];
  document.getElementById("campoubic").value = persona_info["id_ubicacion"];
  vn1.value = persona_info["primer_nombre"];
  vn2.value = persona_info["segundo_nombre"];
  va1.value = persona_info["primer_apellido"];
  va2.value = persona_info["segundo_apellido"];
  vtlfc.value = persona_info["telf_casa"];
  vnac.value = persona_info["nacionalidad"];
  vtlf.value = persona_info["telefono"];
  vws.value = persona_info["whatsapp"];
  vcor.value = persona_info["correo"];
  vfnac.value = persona_info["fecha_nacimiento"];
  vgen.value = persona_info["genero"];
  vedoc.value = persona_info["estado_civil"];
  vnedu.value = persona_info["nivel_educativo"];
  vubic.value = persona_info["id_ubicacion"];
  vnomina.value = persona_info["id_nomina"];
  vingresos.value = persona_info["ing_seniat"];
  vingresoa.value = persona_info["ing_publica"]; 
  vfechan.value = persona_info["fecha_notificacion"];
  vdesig.value = persona_info["ult_designacion"];
  vprima1.value = persona_info["prima"];
  vdclara.value = persona_info["declaracion_j"];
  vinscripcion_ivss.value = persona_info["inscripcion_ivss"];
  vfideicomiso.value = persona_info["fideicomiso"];
  vgrado.value = persona_info["grado_resguardo"];
  if(vnomina.value == 2){
    $(".jq").removeClass("d-none");
  }else{
    $(".jq").addClass("d-none");
  }

  document.getElementById('idnomina').onchange =function(){
    if(vnomina.value == 2){
      $(".jq").removeClass("d-none");
      vgrado.value="";
    }else{
      $(".jq").addClass("d-none");
      vgrado.value="";
    }
  }
/*   vmili.value = persona_info["miliciano"]; */
/*   vjeffam.value = persona_info["jefe_familia"]; */
/*   vafro.value = persona_info["afrodescendencia"]; */

/*   if (comunidad_i_info.length == 0) {
    vvervalcomindi.style.display = "none";
    vcomindi.value = 0;
    vvalcomindi.value = "";
  } else {
    vvervalcomindi.style.display = "";
    vcomindi.value = 1;
    vvalcomindi.value = comunidad_i_info[0]["nombre_comunidad"];
  } */


/*   if (ocupacion_info.length == 0) {
    vocup.value = 0;
  } else {
    vocup.value = ocupacion_info[0]["id_ocupacion"];
  } */

/*   if (condicion_lab_info.length == 0) {
    vcondlab.value = 0;
  } else {
    vcondlab.value = condicion_lab_info[0]["id_cond_laboral"];
  } */

/*   if (org_politica_info.length == 0) {
    vorgpol.value = 0;
  } else {
    vorgpol.value = org_politica_info[0]["id_org_politica"];
  }
 */
/*   if (transporte_info.length == 0) {
    vtransp.value = 0;
    vvertiptrans.style.display = "none";
    vtranspinput.value = "";
  } else {
    vtransp.value = "privado";
    vvertiptrans.style.display = "";
    vtranspinput.value = transporte_info[0]["descripcion_transporte"];
  } */

/*   if (bonos_info.length == 0) {
    vbonos.innerHTML = "No aplica";
  } else {
    vbonos.innerHTML = "";
    for (var i = 0; i < bonos_info.length; i++) {
      var tabl =
        vbonos.innerHTML += " <table style='width:95%'><tr><td>- " + bonos_info[i]["nombre_bono"] + "</td><td style='text-align:right'><span onclick='borrar_bono(" + bonos_info[i]['id_persona_bono'] + ",`" + persona_info['cedula_persona'] + "`)' class='iconDelete fa fa-times-circle' title='Eliminar bono' style='font-size:22px'></span></td></tr></table><br><hr>";
    }
  } */

/*   if (misiones_info.length == 0) {
    vmisiones.innerHTML = "No aplica";
  } else {
    vmisiones.innerHTML = "";
    for (var i = 0; i < misiones_info.length; i++) {
      var recibe = "";
      misiones_info[i]['recibe_actualmente'] == 1 ? recibe = "Recibe actualmente" : recibe = misiones_info[i]['fecha'];
      vmisiones.innerHTML += " <table style='width:95%'><tr><td>- " + misiones_info[i]["nombre_mision"] + "  (" + recibe + ")</td><td style='text-align:right'><span onclick='borrar_mision(" + misiones_info[i]['id_persona_mision'] + ",`" + persona_info['cedula_persona'] + "`)' class='iconDelete fa fa-times-circle' title='Eliminar misión' style='font-size:22px'></span></td></tr></table><br><hr>";
    }
  } */



if (divisiones.length == 0) {
  vdivisionesareas.innerHTML = "No aplica";
  } else {
    var texto = "";
    vdivisionesareas.innerHTML = "";
    console.log(divisiones);
    texto +=
      "<table class='table table-hover border-dark' style='width:100%' id='tabla'><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td style='width:30%'>Divisiones</td><td style='width:30%'>Áreas</td><td style='width:30%'>Secciones</td><td style='width:10%'>Eliminar</td></tr>";
    for (var i = 0; i < divisiones.length; i++) {
      texto +=
        "<tr><td style='width:25%'>" +
        divisiones[i]["division"] +
        "</td><td style='width:25%'>" +
        divisiones[i]["area"] +
        "</td>";
      texto +=
        "<td style='width:25%'>" +
        divisiones[i]["seccion"] +
        "</td><td style='width:25%;'><span onclick='borrar_proyecto(" + divisiones[i]['id'] + ")' class='iconDelete fa fa-times-circle' title='Eliminar proyecto' style='font-size:22px'></span></td></tr>";
    }
    vdivisionesareas.innerHTML += texto + "</table>";
  } 
}
btn_guardar.onclick = function () {

  vn1.style.borderColor = "";
  if (vn1.value == "") {
    swal({
      type: "error",
      title: "Error",
      text: "Debe ingresar el primer nombre de la persona",
      timer: 2000,
      showConfirmButton: false,
    });
    setTimeout(function () {
      vn1.style.borderColor = "red";
      vn1.focus();
    }, 2000);
  }else {
    vn2.style.borderColor = "";
    if (vn2.value == "") {
      swal({
        type: "error",
        title: "Error",
        text: "Debe ingresar el segundo nombre de la persona",
        timer: 2000,
        showConfirmButton: false,
      });
      setTimeout(function () {
        vn2.style.borderColor = "red";
        vn2.focus();
      }, 2000);
    } else {
      va1.style.borderColor = "";
      if (va1.value == "") {
        swal({
          type: "error",
          title: "Error",
          text: "Debe ingresar el primer apellido de la persona",
          timer: 2000,
          showConfirmButton: false,
        });
        setTimeout(function () {
          va1.style.borderColor = "red";
          va1.focus();
        }, 2000);
      } else {
        va2.style.borderColor = "";
        if (va2.value == "") {
          swal({
            type: "error",
            title: "Error",
            text: "Debe ingresar el segundo apellido de la persona",
            timer: 2000,
            showConfirmButton: false,
          });
          setTimeout(function () {
            va2.style.borderColor = "red";
            va2.focus();
          }, 2000);
        } else {
          vfnac.style.borderColor = "";
          if (vfnac.value == "") {
            swal({
              type: "error",
              title: "Error",
              text: "Debe indicar la fecha de nacimiento de la persona",
              timer: 2000,
              showConfirmButton: false,
            });
            setTimeout(function () {
              vfnac.style.borderColor = "red";
              vfnac.focus();
            }, 2000);
          } else {
            vnac.style.borderColor = "";
          if (vnac.value == "") {
            swal({
              type: "error",
              title: "Error",
              text: "Debe ingresar la nacionalidad de la persona",
              timer: 2000,
              showConfirmButton: false,
            });
            setTimeout(function () {
              vnac.style.borderColor = "red";
              vnac.focus();
            }, 2000);
          } else {
            vtlf.style.borderColor = "";
            if (vtlf.value == "") {
              swal({
                type: "error",
                title: "Error",
                text: "Debe ingresar el teléfono de la persona",
                timer: 2000,
                showConfirmButton: false,
              });
              setTimeout(function () {
                vtlf.style.borderColor = "red";
                vtlf.focus();
              }, 2000);
            } else {
                vnedu.style.borderColor = "";
                if (vnedu.value == "") {
                  swal({
                    type: "error",
                    title: "Error",
                    text: "Debe ingresar el nivel de educación de la persona",
                    timer: 2000,
                    showConfirmButton: false,
                  });
                  setTimeout(function () {
                    vnedu.style.borderColor = "red";
                    vnedu.focus();
                  }, 2000);
                } else {
                  vubic.style.borderColor = "";
                  if (vubic.value == "0") {
                    swal({
                      type: "error",
                      title: "Error",
                      text: "Debe ingresar la Ubicación",
                      timer: 2000,
                      showConfirmButton: false,
                    });
                    setTimeout(function () {
                      vubic.style.borderColor = "red";
                      vubic.focus();
                    }, 2000);
                  } else {
                    vnomina.style.borderColor = "";
                    if (vnomina.value == "0") {
                      swal({
                        type: "error",
                        title: "Error",
                        text: "Debe ingresar el tipo de nómina",
                        timer: 2000,
                        showConfirmButton: false,
                      });
                      setTimeout(function () {
                        vnomina.style.borderColor = "red";
                        vnomina.focus();
                      }, 2000);
                    }else {
                    vingresos.style.borderColor = "";
                    if (vingresos.value == "") {
                      swal({
                        type: "error",
                        title: "Error",
                        text: "Debe ingresar la fecha de ingreso al Seniat",
                        timer: 2000,
                        showConfirmButton: false,
                      });
                      setTimeout(function () {
                        vingresos.style.borderColor = "red";
                        vingresos.focus();
                      }, 2000);
                    }else {
                      vingresoa.style.borderColor = "";
                      if (vingresoa.value == "") {
                        swal({
                          type: "error",
                          title: "Error",
                          text: "Debe ingresar la fecha de ingreso a la Administración Pública",
                          timer: 2000,
                          showConfirmButton: false,
                        });
                        setTimeout(function () {
                          vingresoa.style.borderColor = "red";
                          vingresoa.focus();
                        }, 2000);
                      }else {
                        vfechan.style.borderColor = "";
                        if (vfechan.value == "") {
                          swal({
                            type: "error",
                            title: "Error",
                            text: "Debe ingresar la fecha de Notificación",
                            timer: 2000,
                            showConfirmButton: false,
                          });
                          setTimeout(function () {
                            vfechan.style.borderColor = "red";
                            vfechan.focus();
                          }, 2000);
                        } else {

                    inf_persona["primer_nombre"] = vn1.value;
                    inf_persona["segundo_nombre"] = vn2.value;
                    inf_persona["primer_apellido"] = va1.value;
                    inf_persona["segundo_apellido"] = va2.value;
                    inf_persona["nacionalidad"] = vnac.value;
                    inf_persona["telefono"] = vtlf.value;
                    inf_persona["whatsapp"] = vws.value;
                    inf_persona["estado_civil"] = vedoc.value;
                    inf_persona["ing_seniat"] = vingresos.value;
                    inf_persona["ing_publica"] = vingresoa.value;
                    inf_persona["fecha_notificacion"] = vfechan.value;
                    inf_persona["fecha_designacion"] = vdesig.value;

                    if (vcor.value == "No posee" || vcor.value == "") {
                      inf_persona["correo"] = "No posee";
                    } else {
                      inf_persona["correo"] = vcor.value;
                    }
                    if (vtlfc.value == "No posee" || vtlfc.value == "") {
                      inf_persona["telefono_casa"] = "No posee";
                    } else{
                      inf_persona["telefono_casa"] = vtlfc.value;
                    }
                    if (vprima1.value == "No posee" || vprima1.value == "") {
                      inf_persona["prima"] = "No posee";
                    } else{
                      inf_persona["prima"] = vprima1.value;
                    }
                    if (vdclara.value == "No posee" || vdclara.value == "") {
                      inf_persona["declaracionj"] = "No posee";
                    } else{
                      inf_persona["declaracionj"] = vdclara.value;
                    }
                    if (vinscripcion_ivss.value == "No posee" || vinscripcion_ivss.value == "") {
                      inf_persona["inscripcionivss"] = "No posee";
                    } else{
                      inf_persona["inscripcionivss"] = vinscripcion_ivss.value;
                    }
                    if (vfideicomiso.value == "No posee" || vfideicomiso.value == "") {
                      inf_persona["fideicomiso"] = "No posee";
                    } else{
                      inf_persona["fideicomiso"] = vfideicomiso.value;
                    }
                    if (vgrado.value == "N/A" || vgrado.value == "") {
                      inf_persona["grado_resguardo"] = "N/A";
                    } else{
                      inf_persona["grado_resguardo"] = vgrado.value;
                    }
                    inf_persona["fecha_nacimiento"] = vfnac.value;
                    inf_persona["genero"] = vgen.value;
                    inf_persona["nivel_educativo"] = vnedu.value;
                    inf_persona["ubicacion"] = vubic.value;
                    inf_persona["ubicacion1"] = document.getElementById("campoubic").value;
                    inf_persona["nomina"] = vnomina.value;
                    /* 
                    inf_persona["sexualidad"] = vorsex.value;
                    inf_persona["estado_civil"] = vedoc.value;*/                    
/*                     inf_persona["antiguedad_comunidad"] = vantcom.value;
                    inf_persona["miliciano"] = vmili.value; */
/*                     inf_persona["jefe_familia"] = vjeffam.value;
                    inf_persona["propietario_vivienda"] = vpropv.value;
                    inf_persona["jefe_calle"] = vjefcas.value;
                    inf_persona["privado_libertad"] = vprivlib.value;
                    inf_persona["afrodescendencia"] = vafro.value; */
/*                     if (vcomindi.value == 0) {
                      inf_persona["comunidad_indigena"] = "No posee";
                    } else {
                      inf_persona["comunidad_indigena"] = vvalcomindi.value;
                    } */


/*                     if (
                      (vocup.value == 0 && vocup.style.display != "none") ||
                      (vocup.style.display == "none" && vocupinput.value == "")
                    ) {
                      inf_persona["ocupacion"] = "No posee";
                    } else {
                      vocup.style.display == "none"
                        ? (inf_persona["ocupacion"] = vocupinput.value)
                        : (inf_persona["ocupacion"] = vocup.value);
                    }
 */


                    
                    /* if (
                      (vnomcondlab.style.display == "" &&
                        vnomcondlab.value == "") ||
                      (vnomcondlab.style.display == "" &&
                        vsectlab.value == 0) ||
                      (vnomcondlab.style.display == "" &&
                        vsectlab.value == 1 &&
                        vtipsectlab.value == 0)
                    ) {
                      swal({
                        type: "error",
                        title: "Error",
                        text: "Debe ingresar todos los datos de la condición laboral",
                        timer: 2000,
                        showConfirmButton: false,
                      });
                      vnomcondlab.focus();
                    } else {

                      if (vcondlab.style.display == "" && vcondlab.value == 0) {
                        inf_persona["condicion_laboral"] = "No posee";
                      } else {
                        inf_persona["condicion_laboral"] = vcondlab.value;
                        if (vcondlab.style.display == "none") {
                          var condicion = new Object();
                          condicion["nombre_cond_laboral"] = vnomcondlab.value;
                          condicion["sector_laboral"] = vsectlab.value;
                          vsectlab.value == 1
                            ? (condicion["pertenece"] = vtipsectlab.value)
                            : (condicion["pertenece"] = 0);

                          inf_persona["condicion_laboral"] = condicion;
                        }
                      } */
/* 
                      if (spanorgpol.className == "fa fa-plus-square") {
                        vorgpol.value == 0 ? inf_persona['org_politica'] = "No posee" : inf_persona['org_politica'] = vorgpol.value;
                      }
                      else {
                        vorgpolinput.value == "" ? inf_persona['org_politica'] = "No posee" : inf_persona['org_politica'] = vorgpolinput.value;
                      }

                      if (vtransp.value == 0) {
                        inf_persona['transporte'] = "No posee";
                      }
                      else {
                        vtranspinput.value != "" ? inf_persona['transporte'] = vtranspinput.value : inf_persona['transporte'] = "No posee";
                      } */
                      editar_persona();
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
  }
}}}
function editar_persona() {
  //alert(JSON.stringify(inf_persona, null, 4));
  $.ajax({
    type: "POST",
    url: BASE_URL + "Personas/modificar_persona",
    data: { datos_persona: inf_persona },
  }).done(function (result) {
   //alert(result);
    if (result == 1) {
      swal({
        type: "success",
        title: "Éxito",
        text: "Se han almacenado los cambios correctamente",
        timer: 2000,
        showConfirmButton: false
      });
      setTimeout(function () {
        $('#example1').DataTable().clear().destroy();
        cargar_tabla_personas(); $("#edit_persona").modal("hide");
      }, 1000);
    }
  });
}

/* vcomindi.onchange = function () {
  if (vcomindi.value == 1) {
    vvalcomindi.value = "";
    vvervalcomindi.style.display = "";
    vvalcomindi.focus();
  } else {
    vvervalcomindi.style.display = "none";
  }
}; */

/* spanocup.onclick = function () {
  if (spanocup.className == "fa fa-plus-square") {
    spanocup.className = "fa fa-list";
    vocup.style.display = "none";
    vocup.value = 0;
    vocupinput.style.display = "";
    vocupinput.focus();
  } else {
    spanocup.className = "fa fa-plus-square";
    vocup.style.display = "";
    vocupinput.value = "";
    vocupinput.style.display = "none";
  }
}; */

/* spancondlab.onclick = function () {
  if (spancondlab.className == "fa fa-plus-square") {
    spancondlab.className = "fa fa-list";
    vcondlab.style.display = "none";
    vcondlab.value = 0;
    vsectlab.style.display = "";
    vnomcondlab.style.display = "";
    vnomcondlab.focus();
  } else {
    spancondlab.className = "fa fa-plus-square";
    vcondlab.style.display = "";
    vnomcondlab.value = "";
    vnomcondlab.style.display = "none";
    vsectlab.value = 0;
    vsectlab.style.display = "none";
    vtipsectlab.style.display = "none";
    vtipsectlab.value = 0;
  }
}; */

/* vsectlab.onchange = function () {
  if (vsectlab.value == 1) {
    vtipsectlab.style.display = "";
  } else {
    vtipsectlab.style.display = "none";
    vtipsectlab.value = 0;
  }
}

spanorgpol.onclick = function () {
  if (spanorgpol.className == "fa fa-plus-square") {
    spanorgpol.className = "fa fa-list";
    vorgpol.style.display = 'none';
    vorgpol.value = "0";
    vorgpolinput.style.display = "";
    vorgpolinput.focus();
  }
  else {
    spanorgpol.className = "fa fa-plus-square";
    vorgpolinput.style.display = 'none';
    vorgpolinput.value = "";
    vorgpol.style.display = "";
  }
} */

/* vtransp.onchange = function () {
  if (vtransp.value == "privado") {
    vvertiptrans.style.display = "";
    vtranspinput.focus();
  }
  else {
    vvertiptrans.style.display = "none";
    vtranspinput.value = "";
  }
} */

/* function borrar_bono(id, cedula_param) {
  swal({
    type: "warning",
    title: "¿Está seguro?",
    text: "Está por eliminar este bono relacionado con la persona, ¿desea continuar?",
    showCancelButton: true,
    confirmButtonText: "Si, continuar",
    cancelButtonText: "No"
  }, function (isConfirm) {
    if (isConfirm) {
      $.ajax({
        type: "POST",
        url: BASE_URL + "Personas/eliminar_bono",
        data: { "id_bono": id, "cedula_param": cedula_param }
      }).done(function (result) {
        result = JSON.parse(result);
        actualizar_bonos(result, cedula_param);
        $('#example1').DataTable().clear().destroy();
        cargar_tabla_personas();
      })
    }
  });
} */

/* 
function actualizar_bonos(result, cedula_param) {
  console.log(result);
  if (result != 0) {
    vbonos.innerHTML = "";
    for (var i = 0; i < result.length; i++) {
      vbonos.innerHTML += " <table style='width:95%'><tr><td>- " + result[i]["nombre_bono"] + "</td><td style='text-align:right'><span onclick='borrar_bono(" + result[i]['id_persona_bono'] + ",`" + cedula_param + "`)' class='iconDelete fa fa-times-circle' title='Eliminar bono' style='font-size:22px'></span></td></tr></table><br><hr>";
    }
  }
  else {
    vbonos.innerHTML = "No aplica";
  }
} */

/* add_bono.onclick = function () {
  if (document.getElementById("bono_nuevo").value == "") {
    swal({
      type: "error",
      title: "Error",
      text: "Debe seleccionar un bono",
      timer: 2000,
      showConfirmButton: false
    });
    setTimeout(
      function () {
        document.getElementById("bono_nuevo").focus();
        document.getElementById("bono_nuevo").style.borderColor = "red";
      }, 2000
    );
  }
  else {
    document.getElementById("bono_nuevo").style.borderColor = "";
    $.ajax({
      type: "POST",
      url: BASE_URL + "Personas/agg_bono",
      data: { "cedula_persona": inf_persona['cedula_persona'], "bono": document.getElementById("bono_nuevo").value }
    }).done(function (result) {
      if (result == 0) {
        swal({
          type: "error",
          title: "Error",
          text: "Ya esta persona posee ese bono agregado",
          timer: 2000,
          showConfirmButton: false
        });
        setTimeout(() => {
          document.getElementById("bono_nuevo").focus();
        }, 2000);
      }
      else {
        actualizar_bonos(JSON.parse(result), inf_persona['cedula_persona']);
        $('#example1').DataTable().clear().destroy();
        cargar_tabla_personas();
      }

      document.getElementById("bono_nuevo").value = "";
    });
  }
}

document.getElementById("bono_nuevo").onkeyup = function () {
  if (document.getElementById("bono_nuevo").value != "") {
    document.getElementById("bono_nuevo").style.borderColor = "";
  }
}

function cargar_misiones(cedula_persona) {
  $.ajax({
    type: "POST",
    url: BASE_URL + "Personas/get_misiones",
    data: { "cedula_persona": cedula_persona }
  }).done(function (result) {
    console.log(result);
    if (result != 0) {
      result = JSON.parse(result);
      vmisiones.innerHTML = "";
      for (var i = 0; i < result.length; i++) {
        var recibe = "";
        result[i]['recibe_actualmente'] == 1 ? recibe = "Recibe actualmente" : recibe = result[i]['fecha'];
        vmisiones.innerHTML += " <table style='width:95%'><tr><td>- " + result[i]["nombre_mision"] + "  (" + recibe + ")</td><td style='text-align:right'><span onclick='borrar_mision(" + result[i]['id_persona_mision'] + ",`" + cedula_persona + "`)' class='iconDelete fa fa-times-circle' title='Eliminar misión' style='font-size:22px'></span></td></tr></table><br><hr>";
      }
    }
    else {
      vmisiones.innerHTML = "No aplica";
    }
  })
}


function borrar_mision(id, cedula_param) {
  swal({
    type: "warning",
    title: "¿Está seguro?",
    text: "Está por eliminar esta misión relacionada con la persona, ¿desea continuar?",
    showCancelButton: true,
    confirmButtonText: "Si, continuar",
    cancelButtonText: "No"
  }, function (isConfirm) {
    if (isConfirm) {
      $.ajax({
        type: "POST",
        url: BASE_URL + "Personas/eliminar_mision",
        data: { "id_mision": id, "cedula_param": cedula_param }
      }).done(function (result) {
        console.log(result);
        cargar_misiones(cedula_param);
        $('#example1').DataTable().clear().destroy();
        cargar_tabla_personas();
      })
    }
  });
}

add_mision.onclick = function () {
  if (document.getElementById("mision").value == "") {
    swal({
      type: "error",
      title: "Error",
      text: "Debe ingresar la información de la misión",
      timer: 2000,
      showConfirmButton: false
    });
    setTimeout(function () {
      document.getElementById("mision").style.borderColor = "red";
      document.getElementById("mision").focus();
    }, 2000);
  }
  else {
    document.getElementById("mision").style.borderColor = "";
    if (document.getElementById("recibe").value == "vacio" || document.getElementById("recibe").value == 0 && document.getElementById("fecha_recibe").value == "") {
      swal({
        type: "error",
        title: "Error",
        text: "Debe ingresar la información de la misión",
        timer: 2000,
        showConfirmButton: false
      });
      setTimeout(function () {
        document.getElementById("recibe").style.borderColor = document.getElementById("fecha_recibe").style.borderColor = "red";
      }, 2000);
    }
    else {
      document.getElementById("recibe").style.borderColor = document.getElementById("fecha_recibe").style.borderColor = "";
      var mision_data = new Object();
      mision_data['mision'] = document.getElementById("mision").value;
      mision_data['recibe'] = document.getElementById("recibe").value;
      mision_data['fecha'] = document.getElementById("fecha_recibe").value;
      $.ajax({
        type: "POST",
        url: BASE_URL + "Personas/add_mision",
        data: { "cedula": inf_persona['cedula_persona'], "mision": mision_data }
      }).done(function (result) {
        console.log(result);
        if (result == 0) {
          swal({
            type: "error",
            title: "Error",
            text: "Ya esta mision se encuentra relacionada a esta persona",
            timer: 2000,
            showConfirmButton: false
          });
        }
        else {
          cargar_misiones(inf_persona['cedula_persona']);
          $('#example1').DataTable().clear().destroy();
          cargar_tabla_personas();

        }
        document.getElementById("mision").value = "";
        document.getElementById("recibe").value = "vacio";
        document.getElementById("fecha_recibe").value = "";
        document.getElementById("fecha_recibe").style.display = 'none';
      });
    }
  }
}
document.getElementById("recibe").onchange = function () {
  if (document.getElementById("recibe").value == "0") {
    document.getElementById("fecha_recibe").style.display = "";
  }
  else {
    document.getElementById("fecha_recibe").style.display = "none";
  }
}
*/



function cargar_proyectos() {

$.ajax({
    type: "POST",
    url: BASE_URL + "Personas/get_divisionesyareas",
    data: { "cedula_persona": inf_persona['cedula_persona'] }
  }).done(function (result) {
    console.log(result);
    if (result != 0) {
      result = JSON.parse(result);
      vdivisionesareas.innerHTML = "";
      for (var i = 0; i < result.length; i++) {
        var texto = "";
       vdivisionesareas.innerHTML = "";
        console.log(result);
        texto +=
          "<table class='table table-hover border-dark' style='width:100'><tr class='text-dark' style='background:#AEB6BF;font-weight:bold'><td style='width:30%'>Divisiónes</td><td style='width:30%'>Áreas</td><td style='width:30%'>Secciones</td><td style='width:10%'>Eliminar</td></tr>";
        for (var i = 0; i < result.length; i++) {
          texto +=
            "<tr><td style='width:25%'>" +
            result[i]["division"] +
            "</td><td style='width:25%'>" +
            result[i]["area"] +
            "</td>";
          texto +=
            "<td style='width:25%'>" +
            result[i]["seccion"] +
            "</td><td style='width:25%;'><span onclick='borrar_proyecto(" + result[i]['id'] + ")' class='iconDelete fa fa-times-circle' title='Eliminar proyecto' style='font-size:22px'></span></td></tr>";
        }
        vdivisionesareas.innerHTML += texto + "</table>";
      }
    }
    else {
      vdivisionesareas.innerHTML = "<p> No aplica</p>";
    }
  })
}

function borrar_proyecto(id) {
  swal({
    type: "warning",
    title: "¿Estás seguro?",
    text: "Está por eliminar el proyecto asociado a esta persona, ¿desea continuar?",
    showCancelButton: true,
    confirmButtonText: "Sí",
    cancelButtonText: "No"
  }, function (isConfirm) {
    if (isConfirm) {
      $.ajax({
        type: "POST",
        url: BASE_URL + "Personas/eliminar_proyecto",
        data: { "id": id, "cedula_persona": inf_persona['cedula_persona'] }
      }).done(function (result) {
        if (result==1) {
          cargar_proyectos(cedula);
          $('#example1').DataTable().clear().destroy();
          cargar_tabla_personas();
        }else{
          cargar_proyectos(cedula);
          document.getElementById("validarareas").innerHTML = '<div class="alert alert-dismissible fade show" style="background:#9D2323; color:white" role="alert">No puede ser eliminado, Debe contener al menos un registro en División y Área.<i class="far fa-times" id="cerraralert" data-dismiss="alert" aria-label="Close"></i></div>';
          setTimeout(function () {
            $("#cerraralert").click();
          }, 6000);
        }
      });
    }

  });
}




/* document.getElementById("spannewproyect").onclick = function () {
  if (document.getElementById("spannewproyect").className == "fa fa-plus-square") {
    document.getElementById("spannewproyect").className = "fa fa-list";
    document.getElementById("nueva_division").style.display = "none";
    document.getElementById("nueva_areas").value = "0";
    document.getElementById("nuevo_secciones").value = "0";
    document.getElementById("add_proyect").style.display = "";
  }
}
 */
var nuevad = document.getElementById("nueva_division").value;
var nuevaa = document.getElementById("nueva_areas").value;
var nuevas = document.getElementById("nuevo_secciones").value;


document.getElementById("nueva_division").onchange = function () {
  var division = new Object();
  division = document.getElementById("nueva_division").value;
  $.ajax({
    type: "POST",
    url: BASE_URL + "Personas/Consultas_areas",
    data: { "divisiones": division}
  }).done(function(result) {
    document.getElementById("nueva_areas").innerHTML = result;
  });

  if(document.getElementById("nueva_division").value == "" || 
  document.getElementById("nueva_division").value == null || 
  document.getElementById("nueva_division").value == 0 || 
  document.getElementById("nueva_division").value != 0){
      var areas = new Object();
      areas = 0;
      $.ajax({
        type: "POST",
        url: BASE_URL + "Personas/Consultas_secciones",
        data: { "areas": areas}
      }).done(function(result) {
        document.getElementById("nuevo_secciones").innerHTML = result;
      });
  }
}

document.getElementById("nueva_areas").onchange = function () {
  var areas = new Object();
  areas = document.getElementById("nueva_areas").value;
  $.ajax({
    type: "POST",
    url: BASE_URL + "Personas/Consultas_secciones",
    data: { "areas": areas}
  }).done(function(result) {
    document.getElementById("nuevo_secciones").innerHTML = result;
  });
}



document.getElementById("spanaddproyect").onclick = function () {
  if ((document.getElementById("nueva_division").value == 0 || document.getElementById("nueva_areas").value == 0)) {
    swal({
      type: "error",
      title: "Error",
      text: "Debe ingresar los datos de de la División y Área",
      timer: 2000,
      showConfirmButton: false
    });
    setTimeout(function () {
      document.getElementById("nueva_division").style.borderColor = 'red'
      document.getElementById("nueva_areas").style.borderColor = "red";
    });
  }
  else {
    document.getElementById("nueva_division").style.borderColor = ''
    document.getElementById("nueva_areas").style.borderColor = "";
    document.getElementById("nuevo_secciones").style.borderColor = "";
    var divisiones_areas = new Object();
    divisiones_areas['nueva_division'] = document.getElementById("nueva_division").value;
    divisiones_areas['nueva_areas'] = document.getElementById("nueva_areas").value;
    divisiones_areas['nuevo_secciones'] = document.getElementById("nuevo_secciones").value;
    $.ajax({
      type: "POST",
      url: BASE_URL + "Personas/add_division_areas",
      data: { "divisiones_info": divisiones_areas, "cedula_persona": inf_persona['cedula_persona']}
    }).done(function (result) {
      //alert(result);
      if (result == 0) {
        swal({
          type: "error",
          title: "Error",
          text: "Esta persona ya se encuentra asignada a ésta Área",
          timer: 2300,
          showConfirmButton: false
        });
      }
      else {
        cargar_proyectos(inf_persona["cedula_persona"]);
        $('#example1').DataTable().clear().destroy();
        cargar_tabla_personas();
      }
      document.getElementById("nueva_division").value = '0'
      document.getElementById("nueva_areas").value = "0";
      document.getElementById("nuevo_secciones").value = "0";
    });


  }
}



