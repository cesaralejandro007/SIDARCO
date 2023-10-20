
//Declaracion de las variables con los ID de Registrar consultas

/* var cedula_persona=document.getElementById("cedula_persona"); */
/* var id_familia=document.getElementById("id_familia");  */
var btn_agregar=document.getElementById("btn_agregar");
var inventario=document.getElementById("id_inventario");
var medica_persona=[];
var div_medica_persona=document.getElementById("medi_agrega");
var btn_nuevo=document.getElementById("btn_nuevo");


btn_agregar.onclick=function(){


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
         /* descripcion.style.borderColor = "red"; */
    });
    }else{
        inventario.style.borderColor = '';
        /* descripcion.style.borderColor = ""; */
        var agregado="";
       /*  var agregado1=""; */
        var text="";
        var text1="";
        text = inventario.options[inventario.selectedIndex].text;
        /* text1=descripcion.value; */
        
        agregado = parseInt(inventario.value) ;
       /*  agregado1 = descripcion.value; */
    
        medica_persona.push(agregado);
        /* medica_persona_descripcion.push(agregado1); */
    
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
         /* descripcion.value = "";  */
    }


}



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

/* cedula_persona.onchange = function() {

    alert(cedula_persona.value);
    if(cedula_persona.value!='0'){
    var cedula = new Object();
    cedula = cedula_persona.value;

    $.ajax({
    type: "POST",
    url: BASE_URL + "Consultas/Administrar/Consulta_familia",
    data: { "cedula_persona": cedula}
    }).done(function(result) {

    id_familia.innerHTML = result;

    });

}

} */



//Información para enviar al controlador 

$(document).ready(function() { 

    $("#enviar").on("click", function() {
        var form = $("#formulario"); 

        //Nuevos id de la vista de consulta

        var cedula_persona=document.getElementById("cedula_persona"); 

        alert(cedula_persona.value);

        var fecha_consulta=document.getElementById("fecha_consulta");
        var motivo=document.getElementById("motivo");
        var instrucciones=document.getElementById("instrucciones");
    

        var mensaje_fecha_consulta = document.getElementById("mensaje_fecha_consulta");
        var mensaje_motivo = document.getElementById("mensaje_motivo");
        var mensaje_cedula = document.getElementById("mensaje_cedula");
        var mensaje_instruc = document.getElementById("mensaje_instruc");
        var retornar = false; 
        
/* if(valid_element("La fecha_consulta no debe ser mayor a la fecha_consulta actual", fecha_consulta ,document.getElementById("mensaje_fecha_consulta") )){
    if(new Date(fecha_consulta.value)>new Date()){
        document.getElementById("mensaje_fecha_consulta").innerHTML="Fecha invalida";
        document.getElementById("mensaje_fecha_consulta").style.display='';
        fecha_consulta.style.boderColor="red";
    }
    else{
        document.getElementById("mensaje_fecha_consulta").style.display="none";
        document.getElementById("mensaje_fecha_consulta").innerHTML="Ingrese fecha_consulta";
        fecha_consulta.style.borderColor="";
    }
} */


/* if(datos_medicamento!=0){

    alert(datos_medicamento);
        
    registrar_medicamento_consulta();
}  */



        if (cedula_persona.value == 0 && motivo.value == '' || motivo.value == null && fecha_consulta.value == '' || fecha_consulta.value == null && cedula_persona.value == '' || cedula_persona.value == null ) {
            mensaje_fecha_consulta.innerHTML = 'Debe seleccionar una Calle';
            cedula_persona.style.borderColor = 'red';
            mensaje_fecha_consulta.style.color = 'red';
            cedula_persona.focus();
            mensaje_motivo.innerHTML = 'el campo motivo no puede estar vacio';
            motivo.style.borderColor = 'red';
            mensaje_motivo.style.color = 'red';
            motivo.focus();
            mensaje_motivo.innerHTML = 'el campo nombre no puede estar vacio';
            fecha_consulta.style.borderColor = 'red';
            mensaje_motivo.style.color = 'red';
            fecha_consulta.focus();
            mensaje_cedula.innerHTML = 'el campo cedula no puede estar vacio';
            cedula_persona.style.borderColor = 'red';
            mensaje_cedula.style.color = 'red';
            cedula_persona.focus();
            mensaje_instruc.innerHTML = 'el campo instrucciones no puede estar vacio';
            instrucciones.style.borderColor = 'red';
            mensaje_instruc.style.color = 'red';
            instrucciones.focus();
        }
        if (cedula_persona.value == 0) {
            mensaje_fecha_consulta.innerHTML = 'Debe seleccionar al funcionario/a';
            cedula_persona.style.borderColor = 'red';
            mensaje_fecha_consulta.style.color = 'red';
            cedula_persona.focus();
        } else {
            cedula_persona.style.borderColor = '';
            if (motivo.value == '' || motivo.value == null) {
                mensaje_motivo.innerHTML = 'el campo motivo no puede estar vacio';
                motivo.style.borderColor = 'red';
                mensaje_motivo.style.color = 'red';
                motivo.focus();
            } else {
                mensaje_motivo.innerHTML = '';
                motivo.style.borderColor = '';
                if (fecha_consulta.value == '' || fecha_consulta.value == null) {
                    mensaje_motivo.innerHTML = 'el campo fecha_consulta no puede estar vacio';
                    fecha_consulta.style.borderColor = 'red';
                    mensaje_motivo.style.color = 'red';
                    fecha_consulta.focus();
                } else {
                    mensaje_motivo.innerHTML = '';
                    fecha_consulta.style.borderColor = '';
                    if (cedula_persona.value == '' || cedula_persona.value == null) {
                        mensaje_cedula.innerHTML = 'el campo cedula no puede estar vacio';
                        cedula_persona.style.borderColor = 'red';
                        mensaje_cedula.style.color = 'red';
                        cedula_persona.focus();
                    } else {
                        mensaje_cedula.innerHTML = '';
                        cedula_persona.style.borderColor = '';
                        if (instrucciones.value == '' || instrucciones.value == null) {
                            mensaje_instruc.innerHTML = 'el campo instrucciones no puede estar vacio';
                            instrucciones.style.borderColor = 'red';
                            mensaje_instruc.style.color = 'red';
                            instrucciones.focus();
                        } else {
                            /*  var datos_medicamento = [];
                            for(var i=0;i<medica_persona.length;i++){
                           var datos=new Object();  */
                            /* datos['id_consulta']=consulta_medicamento[i]; */ 
                             /* datos['inventario']=medica_persona[i];  */
                          /* datos['cedula_persona']=cedula.value;  */
                        
                           /*   datos_medicamento.push(datos); 
                              alert(JSON.stringify(datos_medicamento)); 
                             
                              }
                             $.ajax({
                             type:"POST",
                             url:BASE_URL+"Consultas/Registrar",
                             data:{
                                 "datos":datos_medicamento,
                                 peticion:"Administrar",
                                 sql: "SQL_06",
                         }
                             }).done(function(result){
                             alert(result);
                             console.log(result);
                             })  */
                            
                            mensaje_instruc.innerHTML = '';
                            instrucciones.style.borderColor = '';
                            var datos = {
                                cedula_persona:$("#cedula_persona").val(), 
                                fecha_consulta: $("#fecha_consulta").val(),
                                motivo: $("#motivo").val(),
                                instrucciones: $("#instrucciones").val(),
                              /*   cedula:$("#cedula").val(), */

                                
                            };
                                    $.ajax({
                                        type: 'POST',
                                        url: BASE_URL + 'Consultas/Administrar',
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
                                                    location.href = BASE_URL + 'Consultas/Administrar/Consultas';
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