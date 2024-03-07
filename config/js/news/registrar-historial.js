//Campos del estudio 
/* var fecha_historial=document.getElementById("fecha_historial"); */
var cedula_persona=document.getElementById("cedula_persona");
var examen= document.getElementById("examen");
var tipo_sangre=document.getElementById("tipo_sangre");
var peso=document.getElementById("peso");
var altura=document.getElementById("altura");
var talla=document.getElementById("talla");
var imc=document.getElementById("imc");
var fc=document.getElementById("fc");
var fr=document.getElementById("fr");
var ta=document.getElementById("ta");
var temperatura=document.getElementById("temperatura");
var diagnostico=document.getElementById("diagnostico");
var tratamiento=document.getElementById("tratamiento");
var evolucion=document.getElementById("evolucion");

//Validación 

var datos_persona=[];
var persona_existente=false;
cedula_persona.focus(); 

/* Validaciones de los inputs genérica */

var element;
var mensaje_error;

//------------------------Botones-------------------------


var index=0;
var btn_siguiente=document.getElementById("siguiente");
var btn_anterior=document.getElementById("anterior");
var btn_guardar=document.getElementById("guardar");
var btn_finales=document.getElementById("botones-finales");


var tab_persona=document.getElementById("tab_1");
var div_persona=document.getElementById("panel5");
var tab_antecedente=document.getElementById("tab_2");
var div_antecedente=document.getElementById("panel7");
var tab_diagnostico=document.getElementById("tab_3");
var div_diagnostico=document.getElementById("panel3");  


//-------------------Botones de agregar antecedentes al DIV--------------

var btn_agregar_per=document.getElementById("btn_agregar_per");
var btn_agregar_fam=document.getElementById("btn_agregar_fam");
var btn_agregar_psi=document.getElementById("btn_agregar_psi");

var ant_personales=document.getElementById("id_ant_personal");
var descripcion_per=document.getElementById("descripcion_personales");
var descripcion_per_array=[];
var ant_familiar=document.getElementById("id_ant_familiar");
var descripcion_fam=document.getElementById("descripcion_fam");
var descripcion_fam_array=[];
var habit_psicologico=document.getElementById("id_habit_psicologico");
var descripcion_psi=document.getElementById("descripcion_habit");
var descripcion_habit_array=[];

var personales_array=[];
var familiar_array=[];
var psicologico_array=[];

var div_ant_personales=document.getElementById("div_ant_personales");
var div_ant_familiar=document.getElementById("div_ant_familiar");
var div_habit_psicologico=document.getElementById("div_habit_psicologico");

//-------------Antecedentes personales--------------

btn_agregar_per.onclick=function(){

  if(ant_personales.value=="0" || descripcion_per==" "){
    //Codigo de la libreria sweetAlert - Libreria de mensajeria pop-up personalizable 
    swal({
      title:"Error",
      text:"Debe seleccionar el antecedente personal",
      type:"error",
      showConfirmButton:false,
      timer:2000
    });
    //Retrasar al ejecucion de una funcion durante un periodo de tiempo especifico 
    setTimeout(function() {

      ant_personales.style.borderColor= 'red';

    });
   }else{

      ant_personales.style.borderColor='';

      var agregar="";
      var text="";
      var text1="";

     /*   text = ant_personales.options[ant_personales.selectedIndex].text; */

      text= ant_personales.options[ant_personales.selectedIndex].text;
      text1= descripcion_per.value;

      //PARA DETERMINAR SI EXITEN UN NUMERO ENTYERO EN EL ARRAY
      agregar=parseInt(ant_personales.value);

      //agregar uno o mas varoles al final de array y devolver nuevamente el array con los nuevos valores
      personales_array.push(agregar);

      alert(personales_array);
      
      descripcion_per_array.push(text1); 

      alert(JSON.stringify(descripcion_per_array))  

      console.log(personales_array);
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
      btn_element.type="button";
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
        div_ant_personales.removeChild(elemento);
        
        console.log(personales_array);
      }

      div_ant_personales.appendChild(elemento);
     
    }
    
    ant_personales.value="0";
    descripcion_per.value=" ";
}


//------------Antecedentes familiares--------------

btn_agregar_fam.onclick=function(){

  if(ant_familiar.value=="0" || descripcion_fam==""){
    
    swal({
      title:"Error",
      text:"Debe seleccionar algun antecedente familiar",
      type:"Error",
      showConfirmButton: false,
      timer:2000
    });
    setTimeout(function(){

      ant_familiar.style.borderColor='red';

    })
  }else{

    ant_familiar.style.borderColor="";

    var agregar_fam="";
    var text2="";
    var text3="";

      //Extraer el valor que se encuentra en el select para que se muestre en el div nos trae el nombre
      
     /*  text= ant_personales.options[ant_personales.selectedIndex].text; */
      
      
      text2=ant_familiar.options[ant_familiar.selectedIndex].text; 

      text3=descripcion_fam.value;

      //determinar si existe un numero entero en el array
      agregar_fam=parseInt(ant_familiar.value);

      //Anexar al final del array los nuevos valores y devolver nuevamente el array con la cantidad de nuevos valores
      
      familiar_array.push(agregar_fam);

      descripcion_fam_array.push(text3);

      //Debemos crear la tabla que va dentro del DIV de Antecedentes familiares

      console.log(familiar_array);
      //Primero debemos crear un div y dentro de él irá una tabla, de la siguiente manera

      var elemento=document.createElement("div");
      var table=document.createElement("table");
      table.style.width="100%";
      //Los tr y los td son para crear tablas 
      var tr=document.createElement("tr");
      var td1=document.createElement("td");
      td1.style.width="45%";
      var td2=document.createElement("td");
      td2.style.width="45%";
      var td3=document.createElement("td");
      //Debemos de colocar en ancho y el espacio donde ira el td del boton de eliminar
      td3.style.width="10%";
      td3.style.textAlign="right";
      //insertamos en le HTML los valores que se pudieron extraer del select
      td1.innerHTML=text2;
      td2.innerHTML=text3;
      //Insertamos en los td los valores que nos dieron en los text 
      var btn_element=document.createElement("input");
      btn_element.type="button";
      btn_element.value="X";
      btn_element.className="btn btn-danger";
      td3.appendChild(btn_element);
      //Insertamos en los tr los td,  el tr en el table y table en elemento
      tr.appendChild(td1);
      tr.appendChild(td2);
      tr.appendChild(td3);
      table.appendChild(tr);
      elemento.appendChild(table);
      var hr=document.createElement("hr");
      elemento.appendChild(hr);
      //Realizarmos la function de respuesta para el boton de eliminar
      btn_element.onclick=function(){
        //Removemos loa dos td con informacion, en elemento(DIV) se encuentra todo lo de la tabla 
        div_ant_familiar.removeChild(elemento);
        console.log(familiar_array)
      }
      div_ant_familiar.appendChild(elemento);
    
    }

      ant_familiar.value="0";
      descripcion_fam.value=""; 

  }

//------------Antecedentes psicológicos-----------

btn_agregar_psi.onclick=function(){

  if(habit_psicologico.value=="0"){
    swal({
      title:"Error",
      text:"Debe ingresar el hábito psicologico",
      type:"error",
      showConfirmButton:false,
      timer: 2000,
    })
    setTimeout(function(){

      habit_psicologico.style.borderColor="red";
    })
  }else{
      habit_psicologico.style.borderColor=" ";

      var agregar_habit="";
      var text4="";
      var text5="";

      //extrae el valor que se encuentra en el select, nos trae el nombre
      text4=habit_psicologico.options[habit_psicologico.selectedIndex].text; 
      text5=descripcion_psi.value;

      //Busca si existe un entero en el select para que despues lo podamos mostrar en el push del array

      agregar_habit=parseInt(habit_psicologico.value);

      //push una funcion agregar un nuevo dato al final del array 
      psicologico_array.push(agregar_habit);

      descripcion_habit_array.push(text5);

      console.log(psicologico_array);
     

     
     

      var elemento=document.createElement("div");
      var table=document.createElement("table");
      table.style.width="100%";
      var tr=document.createElement("tr");
      tr.style.width="45%";
      var td1=document.createElement("td");
      td1.style.width="45%";
      var td2=document.createElement("td");
      td2.style.width="45%";
      var td3=document.createElement("td");
      td3.style.width="10%";
      td3.style.textAlign="right";
      td1.innerHTML=text4;
      td2.innerHTML=text5;
      var btn_element=document.createElement("input");
      btn_element.type="button";
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
        div_habit_psicologico.removeChild(elemento);
        console.log(div_habit_psicologico);
      }

      div_habit_psicologico.appendChild(elemento);
      habit_psicologico.value="0";
      descripcion_psi.value="";


  }
}


//-------------Boton siguiente---------------------

btn_siguiente.onclick=function(){

  funcion_siguiente();

}

//-------------Boton anterior-----------------------

btn_anterior.onclick=function(){

  index--;
  control_indice();


}

//----------------Funcion siguiente-----------------

function funcion_siguiente(){


  switch(index){
    
  case 0:

      if(valida_info()){
        
        index++;
      }

    break;

   case 1:
       {


        index++;

      } 
    break;

    case 2:
      { 

        enviar_info(); 
      }
      break;
    
  }
 

control_indice();

}

//-----------------Funcion control indice-----------


function control_indice(){

  alert(index);

    switch(index){

      case 0:

      btn_anterior.style.display='none';
      btn_finales.style.display='none'; 
      btn_siguiente.style.display='block'; 


      tab_persona.className='nav-link active';
      div_persona.style.display="block";

      tab_antecedente.className='';
      div_antecedente.style.display='none'; 

      tab_diagnostico.className='';
      div_diagnostico.style.display='none';  


      break;

      case 1:

        btn_anterior.style.display='block';
        btn_siguiente.style.display='block'; 
        btn_finales.style.display='none'; 

        tab_antecedente.className='nav-link active';
        div_antecedente.style.display='block';

        tab_diagnostico.className='';
        div_diagnostico.style.display='none';   
        
        tab_persona.className='';
        div_persona.style.display='none'; 



      break;

      case 2:

      btn_anterior.style.display='block';
      btn_siguiente.style.display='none'; 
      btn_finales.style.display='block'; 
     

      tab_diagnostico.className='nav-link active';
      div_diagnostico.style.display='block';   
      
      tab_persona.className='';
      div_persona.style.display='none';

      tab_antecedente.className='';
      div_antecedente.style.display='none';



    break;
  }
}


//----------------------Validación de la cédula------------------->


  cedula_persona.oninput=function(){

    if (cedula_persona.value.length >9) cedula_persona.value =cedula_persona.value.slice(0, 9);
  
  } 
  
   cedula_persona.onkeyup=function(){
  
    valid_element("Debe ingresar el documento de identidad de la persona", cedula_persona ,document.getElementById("valid_2"));
    $.ajax({
  
     type:"POST",
     url:BASE_URL+"Historial/Consultas_cedulaV2",
     data:{'cedula_persona':cedula_persona.value}
  
   }).done(function(result){
    console.log(result);
    alert(JSON.stringify(result));
  
     persona_existente=result; 
   
  
    })
  
  } 

//----------Validación de persona existentes---------------


function persona_existe(){

    if(persona_existente==1){

      return true;
      
    }
  
    if(persona_existente==0){
  
      swal({
       type:"error",
       title:"Error",
       text:"Ésta persona no se encuentra registrada en el sistema",
       showConfirmButton:false,
       timer:2000
     });

     // eL setTimeout tambien se puede utilizar para asignar en que parte se mostrara el resultado 
  
      setTimeout(function(){cedula_persona.style.borderColor="red";cedula_persona.focus();},2000);
  
    }
  
    if(persona_existente==2){
     swal({
      type:"warning",
      title:"Atención",
      text:"Este usuario se encuentra inactivo, ¿desea activarlo nuevamente?",
      showCancelButton:true,
      confirmButtonText:"Sí, activar",
      cancelButtonText:"No"
    },function(isConfirm){
     if(isConfirm){
      $.ajax({
        type:"POST",
        url:BASE_URL+"Seguridad/cambio_estado",
        data:{"cedula_integrante_persona":cedula_persona.value,"estado":1}
      }).done(function(result){
        if(result){
  setTimeout(function(){
          swal({
            type:"success",
            title:"Éxito",
            text:"Se ha reactivado la persona satisfactoriamente",
            showConfirmButton:false,
            timer:2000
          });
  
          setTimeout(function(){location.href=BASE_URL+"Familias/Consultas"},2000);
          },500);
        }
      });
    }
  })
}  

}



//-----------------------------------Validación genérica----------------------------------------//

 function valid_element(mensaje_error,element,span_element){

    var validado=true;
  
    if(element.value=="vacio" || element.value==""){
  
      element.focus();
      element.style.borderColor="red"; 
      span_element.innerHTML=mensaje_error; 
      validado=false;
      span_element.style.display='';
      
    }
  
    else{

      element.style.borderColor="";  
      span_element.style.display='none';
    }
  
    return validado;
  
  } 

//---------------------Validación de campos personas--------------------------

function valida_info(){

    var validacion=false;

          if(valid_element("Debe ingresar el documento de identidad", cedula_persona, document.getElementById("valid_2")))
            {
            if(persona_existe(cedula_persona.value)){  
              /* if(new Date(fecha_historial.value)>new Date){
                  document.getElementById("valid_1").innerHTML="La fecha no debe ser mayor a la actual";
                  document.getElementById("valid_1").style.display='';
                  fecha_historial.style.borderColor="red";
                  }else{
                  document.getElementById("valid_1").style.display='';
                  document.getElementById("valid_1").innerHTML="Ingresar fecha del historial";
                  fecha_historial.style.borderColor=""; */
         /*      if(valid_element("Ingresar exámen realizado", examen, document.getElementById("valid_3"))){
                  if(valid_element("Ingrese el tipo de sangre", tipo_sangre, document.getElementById("valid_4"))){
                    if(valid_element("Ingrese el peso ", peso, document.getElementById("valid_5") )){ 
                      if(valid_element("Ingrese la altura", altura, document.getElementById("valid_6"))){
                        if(valid_element("Ingresela talla", talla, document.getElementById("valid_7"))){
                          if(valid_element("ingrese IMC", imc, document.getElementById("valid_8"))){
                            if(valid_element("Ingrese la FC",fc, document.getElementById("valid_9"))){
                              if(valid_element("Ingrese la FR", fr, document.getElementById("valid_10"))){
                                if(valid_element("Ingrese la tensión arterial", ta, document.getElementById("valie_11"))){
                                  if(valid_element("Ingrese la temperatura", temperatura, document.getElementById("valid_12"))){
                                    if(valid_element("Ingrese el diagnóstico",diagnostico, document.getElementById("valid_13"))){
                                      if(valid_element("Indique el tratamiento", tratamiento, document.getElementById("valid_14"))){
                                        if(valid_element("Indique si hay evolución", evolucion, document.getElementById("valid_15"))){

                                          
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
                }
              } */
              
            /* } */
            validacion=true;
          } 
    } 
    return validacion;
  }

  

  function valid_diagnostico(){

    var validacion=false;

                if(valid_element(" Ingresar exámen realizado", examen, document.getElementById("valid_23"))){
                  if(valid_element(" Ingrese el tipo de sangre", tipo_sangre, document.getElementById("valid_4"))){
                    if(valid_element(" Ingrese el peso ", peso, document.getElementById("valid_5"))){
                      if(valid_element(" Ingrese la altura", altura, document.getElementById("valid_6"))){
                        if(valid_element(" Ingrese la talla", talla, document.getElementById("valid_7"))){
                          if(valid_element(" Ingrese IMC", imc, document.getElementById("valid_8"))){
                            if(valid_element(" Ingrese la FC",fc, document.getElementById("valid_9"))){
                              if(valid_element(" Ingrese la FR", fr, document.getElementById("valid_10"))){
                                if(valid_element(" Ingrese la tensión arterial", ta, document.getElementById("valid_11"))){
                                  if(valid_element(" Ingrese la temperatura", temperatura, document.getElementById("valid_12"))){
                                    if(valid_element(" Ingrese el diagnóstico",diagnostico, document.getElementById("valid_13"))){
                                      if(valid_element(" Indique el tratamiento", tratamiento, document.getElementById("valid_14"))){
                                        if(valid_element(" Indique si hay evolución", evolucion, document.getElementById("valid_15"))){

                                          return validacion=true;
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
                }
              }  

    return validacion;
  }
    



//---------------- Validación de datos de contacto---------------------

/*  function valida_antecedente(){

   var validacion=false;

   if(valid_element("Debe ingresar el correo electronico", examen, document.getElementById("valid_12"))){
    if(valid_element("Debe ingresar el número de teléfono", idx, document.getElementById("Valid_13"))){

      validacion=true;

    }
  } 
  return validacion; 
}  */

 

//----------------Función para enviar la información---------------


 /* btn_guardar.onclick=function(){
  enviar_info();
}  */


//---------------Funcion para enviar la información al controlador------------


$(document).ready(function() { 

  $("#enviar").on("click", function() {
      var form = $("#formulario"); 

if(valid_diagnostico()){  

var datos=[];
var datos_persona=new Object();
datos_persona['cedula_persona']=cedula_persona.value;
/* datos_persona['fecha_historial']=fecha_historial.value; */
datos_persona['examen']=examen.value;
datos_persona['tipo_sangre']=tipo_sangre.value;
datos_persona['peso']=peso.value;
datos_persona['altura']=altura.value;
datos_persona['talla']=talla.value;
datos_persona['imc']=imc.value;
datos_persona['fc']=fc.value;
datos_persona['fr']=fr.value;
datos_persona['ta']=ta.value;
datos_persona['temperatura']=temperatura.value;
datos_persona['diagnostico']=diagnostico.value;
datos_persona['tratamiento']=tratamiento.value;
datos_persona['evolucion']=evolucion.value;


  $.ajax({

    type:"POST",
    url:BASE_URL+"Historial/registrar_historial",
    data:{"datos":datos_persona}

})  



//---------------Envio de datos de antecedentes familiares--------------------

 
  var datos_antecedentes=[];

for(var i=0; i<personales_array.length; i++){
  //creamos un objeto para poder asignarle a sus propiedades los
  //valores

  var datos=new Object();
  datos["id_ant_personal"]=personales_array[i];
  datos["cedula_persona"]=cedula_persona.value;
  datos["descripcion_personales"]=descripcion_per_array[i]; 

  alert(JSON.stringify(datos));

  datos_antecedentes.push(datos);

}

  $.ajax({

    type:"POST",
    url:BASE_URL+"Historial/registro_ant_personal",
   data:{"datos":datos_antecedentes} 

})

//creamos un array donde guardaremos lo que recorra el push

var datos_familias=[];

//realizamos un for que va a recorrer todo el array del PUSH, esto porque seleccionamos varios
//antecedente y se deben guardar

  for(var i=0; i < familiar_array.length; i++){

  //creamos un objeto que asigne en sus proedades e valos de los
  //input
  var datos=new Object();

  datos['id_ant_familiar']=familiar_array[i];
  datos['cedula_persona']=cedula_persona.value;
  datos['descripcion_familiar']=descripcion_fam_array[i];

  datos_familias.push(datos);
  alert(JSON.stringify(datos));
}

$.ajax({
  type:"POST",
  url:BASE_URL+"Historial/registro_ant_familiar",
  data:{"datos":datos_familias}

}).done(function(result){
        alert(result);
}) 

//---------------Hábitos psicologicos---------

 var datos_hab_psicologico=[]; 

  for(var i=0; i < psicologico_array.length; i++){

    var datos=new Object();
        datos['id_habit_psicologico']=psicologico_array[i];
        datos['cedula_persona']=cedula_persona.value;
        datos['descripcion_habit']=descripcion_habit_array[i];

    datos_hab_psicologico.push(datos);
    alert(JSON.stringify(datos));

  }

$.ajax({
  type:"POST",
  url:BASE_URL+"Historial/registro_habit_psicologico",
  data:{"datos":datos_hab_psicologico}

}).done(function(result){

      alert(result);

})

  swal({
  title:"Éxito",
  type:"success",
  text:"Registro exitoso",
  showConfirmButton:false,
  timer:2000
}); 
 setTimeout(function(){
  location.href=BASE_URL+"Historial/Consultas";
},2000)

}

}) 
})
