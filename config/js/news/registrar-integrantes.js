var cedula_integrante=document.getElementById("cedula_integrante_modal");
var primer_nombre=document.getElementById("primer_nombre");
var segundo_nombre=document.getElementById("segundo_nombre");
var primer_apellido=document.getElementById("primer_apellido");
var segundo_apellido=document.getElementById("segundo_apellido");
var fecha_nacimiento=document.getElementById("fecha_nacimiento");
var genero=document.getElementById("genero");
var nacionalidad=document.getElementById("nacionalidad");
var nivel=document.getElementById("nivel_educativo");
var camisa=document.getElementById("camisa");
var pantalon=document.getElementById("pantalon");
var calzado=document.getElementById("calzado");
var correo=document.getElementById("correo");
var telefono=document.getElementById("telefono_personal");
var datos_persona=[];
var persona_existente=false;
cedula_integrante.focus(); 
var boton_integrante=document.getElementById("guardar_integrantes");
var element;
var mensaje_error;

//------------------------Botones-------------------------

var index=0;
var btn_siguiente=document.getElementById("siguiente");
var btn_anterior=document.getElementById("anterior");
var btn_guardar=document.getElementById("guardar");
var btn_finales=document.getElementById("botones-finales");
 var btn_integrantes=document.getElementById("btn_nuevo"); 


var tab_persona=document.getElementById("tab_1");
var div_persona=document.getElementById("panel5");
var tab_contacto=document.getElementById("tab_2");
var div_contacto=document.getElementById("panel7");
//---------------------Llamada del modal-------------------------------
 btn_integrantes.onclick=function(){

  $('#agregar').modal().show();
  
  } 

//-------------Boton siguiente---------------------

btn_siguiente.onclick=function(){

  funcion_siguiente();

}

//------------- Boton guardar-----------------------

 boton_integrante.onclick=function(){

  enviar_info_integrantes();

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
      if(valida_contacto()){

         enviar_info_integrantes(); 

      }
    break; 
  }


control_indice();

}

//-----------------Funcion control indice-----------


function control_indice(){

    switch(index){

      case 0:

      btn_anterior.style.display='none';
      btn_finales.style.display='none'; 
      btn_siguiente.style.display='block';


      tab_persona.className='nav-link active';
      div_persona.style.display='block';

      tab_contacto.className='';
      div_contacto.style.display='none';

      break;

      case 1:

        btn_anterior.style.display='block';
        btn_siguiente.style.display='none'; 
        btn_finales.style.display='block'; 


        tab_contacto.className='nav-link active';
        div_contacto.style.display='block';

        tab_persona.className='';
        div_persona.style.display='none';

      break;
  }
}


//----------------------Validación de la cédula------------------->


  cedula_integrante.oninput=function(){
    if (cedula_integrante.value.length >9) cedula_integrante.value =cedula_integrante.value.slice(0, 9);
  
  } 
  
  
  cedula_integrante.onkeyup=function(){
  
    valid_element("Debe ingresar el documento de identidad de la persona", cedula_integrante ,document.getElementById("valid_1"));
     $.ajax({
  
    type:"POST",
    url:BASE_URL+"Familias/Consultas_cedula_integrante",
    data:{'cedula_integrante':cedula_integrante.value}
  
  }).done(function(result){
    console.log(result);
      alert(result);  
    persona_existente=result; 
  
 /*     SI SE ENCUENTRA DATOS EN LA BASE DE DATOS SE VA A MANDAR A LA FUNCION DE PERSONA_EXISTE
    SINO SE HACE LA VALIDACION DIRECTAMENTE */ 
  
    }) 

  }  

//----------Validación de persona existentes---------------

 function persona_existe(){

    if(persona_existente==0){

      return true;
    }
  
  
    if(persona_existente==1){
  
      swal({
       type:"error",
       title:"Error",
       text:"Ésta persona ya se encuentra registrada en el sistema",
       showConfirmButton:false,
       timer:2000
     });
  
      setTimeout(function(){cedula_integrante.style.borderColor="red";cedula_integrante.focus();},2000);
  
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
        data:{"cedula_integrante_persona":cedula_integrante.value,"estado":1}
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
      /* element.style.borderColor="";  */
      span_element.style.display='none';
    }
  
    return validado;
  
  } 




//---------------------Validación de campos personas--------------------------

 function valida_info(){

    var validacion=false;

    if(valid_element("Debe ingresar el documento de identidad", cedula_integrante, document.getElementById("valid_1"))){
        if(persona_existe(cedula_integrante.value)){ 
            if(valid_element("Ingrese el nombre de la persona", primer_nombre, document.getElementById("valid_2"))){
              if(valid_element("Ingrese el apellido", primer_apellido, document.getElementById("valid_4"))){
                if(valid_element("Ingrese fecha de nacimiento", fecha_nacimiento, document.getElementById("valid_6"))){ 
                  if(new Date(fecha_nacimiento.value)>new Date){
                  document.getElementById("valid_6").innerHTML="La fecha no debe ser mayor a la actual";
                   document.getElementById("valid_6").style.display=''; 
                  fecha_nacimiento.style.borderColor="red";
              
                }else{
                  /* document.getElementById("valid_6").style.display=''; */
                  document.getElementById("valid_6").innerHTML="Ingrese la fecha de nacimiento";
                  fecha_nacimiento.style.borderColor="";
                  if(valid_element("Ingrese el género", genero, document.getElementById("valid_7"))){
                    if(valid_element("Ingrese el nivel educativo", nivel, document.getElementById("valid_8"))){
                      if(valid_element("Ingrese la talla de camisa", camisa, document.getElementById("valid_9") )){ 
                        if(valid_element("Ingrese talla de pantalon", pantalon, document.getElementById("valid_10"))){
                          if(valid_element("Ingrese el número de calzado", calzado, document.getElementById("valid_11"))){


                            validacion=true;
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
        /* } */

return validacion;

} 

//---------------- Validación de datos de contacto---------------------

function valida_contacto(){

  var validacion=false;

  if(valid_element("Debe ingresar el correo electronico", correo, document.getElementById("valid_12"))){
    if(valid_element("Debe ingresar el número de teléfono", telefono, document.getElementById("Valid_13"))){

      validacion=true;

    }
  }
  return validacion;
} 

//----------------Validación de datos de integrantes-----------------




//----------------Función para enviar la información---------------


/* btn_guardar.onclick=function(){
  enviar_info_integrantes();
} */


//---------------Funcion para enviar la información al controlador------------

function enviar_info_integrantes(){

datos_persona=new Object();
datos_persona['cedula_integrante']=cedula_integrante.value; 
datos_persona['primer_nombre']=primer_nombre.value;
datos_persona['segundo_nombre']=segundo_nombre.value;
datos_persona['primer_apellido']=primer_apellido.value;
datos_persona['segundo_apellido']=segundo_apellido.value;
datos_persona['fecha_nacimiento']=fecha_nacimiento.value;
datos_persona['estado']=1;
datos_persona['genero']=genero.value;
datos_persona['nivel_educativo']=nivel.value;
datos_persona['correo']=correo.value;
datos_persona['telefono']=telefono.value;


//alert(datos_persona);

$.ajax({

type:"POST",
url:BASE_URL+"Familias/registrar_familia",
data:{"datos":datos_persona}
}).done(function(result){
    console.log(result);
    //alert(result);

              swal({
              title:"Éxito",
              text:"La persona ha sido registrada exitosamente",
              type:"success",
              timer:2000,
              showConfirmButton:false
            });

        
          setTimeout(function(){location.href=BASE_URL+"Familias/registros";},1000); 




})


}
