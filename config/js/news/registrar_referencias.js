
//Declaracion de las variables con los ID de Registrar consultas

var id_familia_persona=document.getElementById("id_familia_persona");
var id_familia=document.getElementById("id_familia"); 
var btn_agregar=document.getElementById("btn_agregar");
var inventario=document.getElementById("inventario");
var medica_persona=[];
var div_medica_persona=document.getElementById("medi_agrega");
var btn_nuevo=document.getElementById("btn_nuevo");




/* tn_agregar.onclick=function(){


    if( inventario=="" ){
        swal({
         title:"Error",
         text:"Debe seleccionar",
         type:"error",
         showConfirmButton:false,
         timer:2000
       });
       setTimeout(function () {
        inventario.style.borderColor = 'red'
         
       });
     }else{
        inventario.style.borderColor = '';
    
        var agregado="";
    
        var text="";
        var text1="";
        text = inventario.options[inventario.selectedIndex].text;
      
        
        agregado = parseInt(inventario.value) ;
   
    
        medica_persona.push(agregado);
        
    
        console.log(medica_persona);
        var elemento=document.createElement("div");
        var table=document.createElement("table");
        table.style.width="100%";
        var tr=document.createElement("tr");
        var td1=document.createElement("td");
        td1.style.width="45%";
        var td2=document.createElement("td");
        td2.style.width="45%";
        var td3=document.createElement("td");
        td3.style.width="10%";
        td3.style.textAlign="right";
        td1.innerHTML=text;
        td2.innerHTML=text1;
        var btn_element=document.createElement("input");
        btn_element.type='button';
        btn_element.value="X";
        btn_element.className="btn btn-danger";
        td3.appendChild(btn_element);
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        table.appendChild(tr);
        elemento.appendChild(table);
        var hr=document.createElement("hr");
        elemento.appendChild(hr);
        btn_element.onclick=function(){
        div_medica_persona.removeChild(elemento);
        console.log(medica_persona);
        }
        div_medica_persona.appendChild(elemento);
        inventario.value = "0";
      
    }


}
 */


//Registro de medicamentso en la tabla puente

function registrar_medicamento_consulta(){

    
}

/* type: 'POST',
url: BASE_URL + 'Consultas/Administrar',
data: {
    'datos': datos,
    peticion: "Administrar",
    sql: "SQL_02",
    accion: "Se ha registrado una nueva consulta ", 
    */


//Validación genérica para inputs

function valid_element(mensaje_error, element, span_element){

var validado=true;

if(element.value==" " || element.value=="vacio"){

    element.focus();
    element.style.borderColor="red";
    validado=false;
    span_element.style.display='';
    span_element.innerHTML=mensaje_error;

}
else{

/*     element.style.borderColor="";
    span_element.style.display="none"; */
}

return validado; 

}



// Traer de la base de datos funcionario y familia

id_familia_persona.onchange = function() {

    alert(id_familia_persona.value);

    if(id_familia_persona.value!='0'){
    var cedula = new Object();
    cedula = id_familia_persona.value;

    $.ajax({
      type: "POST",
      url: BASE_URL + "Referencias/Administrar/Consulta_familia",
      data: { "id_familia_persona": cedula}
    }).done(function(result) {
      
        
      id_familia.innerHTML = result;

    });

}
}

//Información para enviar al controlador 

$(document).ready(function() { 

    $("#enviar").on("click", function() {
        var form = $("#formulario"); 

        //Nuevos id de la vista de consulta

        var id_familia_persona = document.getElementById("id_familia_persona"); 

        var fecha_referencia=document.getElementById("fecha_referencia");
        var examen=document.getElementById("examen");
        var informe=document.getElementById("informe");
        var cedula_persona=document.getElementById("cedula_persona");
        var ubicacion=document.getElementById("ubicacion");
        var id_especialidad=document.getElementById("id_especialidad");
        var diagnostico=document.getElementById("diagnostico");

        var mensaje_fecha_referencia = document.getElementById("mensaje_fecha_orden");
        var mensaje_examen = document.getElementById("mensaje_examen");
        var mensaje_id_familia = document.getElementById("mensaje_id_familia");
        var mensaje_cedula= document.getElementById("mensaje_cedula");
        var mensaje_informe=document.getElementById("mensaje_referencia");
        var mensaje_especialidad=document.getElementById("mensaje_referido");
        var mensaje_diagnostico=document.getElementById("mensaje_diagnostico");
        var retornar = false; 
        
/* if(valid_element("La fecha_referencia no debe ser mayor a la fecha_referencia actual", fecha_referencia ,document.getElementById("mensaje_fecha_referencia") )){
    if(new Date(fecha_referencia.value)>new Date()){
        document.getElementById("mensaje_fecha_referencia").innerHTML="Fecha invalida";
        document.getElementById("mensaje_fecha_referencia").style.display='';
        fecha_referencia.style.boderColor="red";
    }
    else{
        document.getElementById("mensaje_fecha_referencia").style.display="none";
        document.getElementById("mensaje_fecha_referencia").innerHTML="Ingrese fecha_referencia";
        fecha_referencia.style.borderColor="";
    }
} */


/* if(datos_medicamento!=0){

    alert(datos_medicamento);
        
    registrar_medicamento_consulta();
}  */



        if (id_familia_persona.value == 0 && examen.value == '' || examen.value == null && fecha_referencia.value == '' || fecha_referencia.value == null  ) {
            mensaje_id_familia.innerHTML = 'Debe seleccionar una Calle';
            id_familia_persona.style.borderColor = 'red';
            mensaje_id_familia.style.color = 'red';
            id_familia_persona.focus();
            mensaje_examen.innerHTML = 'el campo examen no puede estar vacio';
            examen.style.borderColor = 'red';
            mensaje_examen.style.color = 'red';
            examen.focus();
            mensaje_examen.innerHTML = 'el campo nombre no puede estar vacio';
            fecha_referencia.style.borderColor = 'red';
            mensaje_examen.style.color = 'red';
            fecha_referencia.focus();
            mensaje_cedula.innerHTML = 'el campo cedula no puede estar vacio';
            id_familia_persona.style.borderColor = 'red';
            mensaje_cedula.style.color = 'red';
            id_familia_persona.focus();
            mensaje_informe.innerHTML = 'el campo informe no puede estar vacio';
            informe.style.borderColor = 'red';
            mensaje_informe.style.color = 'red';
            informe.focus();
        }
        if (id_familia_persona.value == '0') {
            mensaje_id_familia.innerHTML = 'Debe seleccionar al funcionario/a';
            id_familia_persona.style.borderColor = 'red';
            mensaje_id_familia.style.color = 'red';
            id_familia_persona.focus();
        } else {
           
            id_familia_persona.style.borderColor = '';


          if (cedula_persona.value == '' || cedula_persona.value == null) {
                mensaje_cedula.innerHTML = 'el campo céd no puede estar vacio';
                cedula_persona.style.borderColor = 'red';
                mensaje_cedula.style.color = 'red';
                cedula_persona.focus();
            } else {
                mensaje_cedula.innerHTML='';
                cedula_persona.style.borderColor=""; 

                if (ubicacion.value == '' || ubicacion.value == null) {
                    mensaje_examen.innerHTML = 'el campo ubicación no puede estar vacio';
                    ubicacion.style.borderColor = 'red';
                    mensaje_examen.style.color = 'red';
                    ubicacion.focus();
                } else {
             
                    ubicacion.style.borderColor='';


                    if (id_especialidad.value == '0' || id_especialidad.value == null) {
                        mensaje_especialidad.innerHTML = 'el campo especialidad no puede estar vacio';
                        id_especialidad.style.borderColor = 'red';
                        mensaje_especialidad.style.color = 'red';
                        id_especialidad.focus();
                    } else {
                       
                        id_especialidad.style.borderColor='';

                        if (diagnostico.value == '' || diagnostico.value == null) {
                            mensaje_diagnostico.innerHTML = 'el campo diagnóstico no puede estar vacio';
                            diagnostico.style.borderColor = 'red';
                            mensaje_diagnostico.style.color = 'red';
                            diagnostico.focus();
                        } else {
                          
                            diagnostico.style.borderColor='';



            if (examen.value == '' || examen.value == null) {
                mensaje_examen.innerHTML = 'el campo examen no puede estar vacio';
                examen.style.borderColor = 'red';
                mensaje_examen.style.color = 'red';
                examen.focus();
            } else {
                mensaje_examen.innerHTML = '';
                examen.style.borderColor = '';
                if (fecha_referencia.value == '' || fecha_referencia.value == null) {
                    mensaje_examen.innerHTML = 'el campo fecha_referencia no puede estar vacio';
                    fecha_referencia.style.borderColor = 'red';
                    mensaje_examen.style.color = 'red';
                    fecha_referencia.focus();
                } else {
                    mensaje_examen.innerHTML = '';
                    fecha_referencia.style.borderColor = '';

                   /*  if (id_familia_persona.value == '0' || id_familia_persona.value == null) {
                        mensaje_id_familia.innerHTML = 'el campo cedula no puede estar vacio';
                        id_familia_persona.style.borderColor = 'red';
                        mensaje_id_familia.style.color = 'red';
                        id_familia_persona.focus();
                    } else {
                        id_familia_persona.innerHTML = '';
                        id_familia_persona.style.borderColor = ''; */

                        if (informe.value == '' || informe.value == null) {
                            mensaje_informe.innerHTML = 'el campo informe no puede estar vacio';
                            informe.style.borderColor = 'red';
                            mensaje_informe.style.color = 'red';
                            informe.focus();
                        } else {
                           /*  var datos_medicamento = [];
                            for(var i=0;i<medica_persona.length;i++){
                            var datos=new Object(); */
                              /* datos['id_consulta']=consulta_medicamento[i]; */
                           /*  datos['inventario']=medica_persona[i]; */
                         /* datos['cedula_persona']=cedula.value; */
                        
                            /* datos_medicamento.push(datos); */
                             /* alert(JSON.stringify(datos_medicamento)); */
                           /*   }
                             $.ajax({
                             type:"POST",
                             url:BASE_URL+"Consultas/Administrar",
                             data:{
                                 "datos":datos_medicamento,
                                 peticion:"Administrar",
                                 sql: "SQL_06",
                         }
                             }).done(function(result){
                             alert(result);
                             console.log(result);
                             }) */
                            mensaje_informe.innerHTML = '';
                            informe.style.borderColor = '';
                            var datos = {
                                id_familia_persona: $("#id_familia_persona").val(),
                                fecha_referencia: $("#fecha_referencia").val(),
                                examen: $("#examen").val(),
                                informe: $("#informe").val(),
                                cedula_persona:$("#cedula_persona").val(),
                                ubicacion:$("#ubicacion").val(),
                                id_especialidad: $("#id_especialidad").val(),
                                diagnostico: $("#diagnostico").val(),
                                
                                
                            };
                                    $.ajax({
                                        type: 'POST',
                                        url: BASE_URL + 'Referencias/Administrar',
                                        data: {
                                            'datos': datos,
                                            peticion: "Administrar",
                                            sql: "SQL_02",
                                            accion: "Se ha registrado una nueva consulta ",
                                            
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
                                                    location.href = BASE_URL + 'Referencias/Administrar/Consultas';
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
           /*  } */
        }
    }
}
            }
        }
    });

    
 
    document.onkeypress = function(e) {
        if (e.which == 13 || e.keyCode == 13) {
            return false;
        } else {
            return true;
        }
    }
});