//Campos del estudio 
var fecha_historial=document.getElementById("fecha_historial");
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
        div_diagnostico.style.display='nne';   
        
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
  
    valid_element("Debe ingresar el documento de identidad de la persona", cedula_persona ,document.getElementById("valid_1"));
    $.ajax({
  
     type:"POST",
     url:BASE_URL+"Familias/Consultas_cedula_integrante",
     data:{'cedula_persona':cedula_persona.value}
  
   }).done(function(result){
    console.log(result);
  /*  alert(result);  */ 
     persona_existente=result; 
   
  
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

      /* element.style.borderColor="";  */
      span_element.style.display='none';
    }
  
    return validado;
  
  } 

//---------------------Validación de campos personas--------------------------

function valida_info(){

    var validacion=false;

    if(valid_element("Debe ingresar el documento de identidad", cedula_persona, document.getElementById("valid_1")))
    {
       /* if(persona_existe(cedula_persona.value)){  */
/*      if(valid_element("Ingrese el tipo de sangre", tipo_sangre, document.getElementById("valid_2"))){
              if(valid_element("Ingrese el peso", peso, document.getElementById("valid_3"))){
                if(valid_element("Ingrese la altura", altura, document.getElementById("valid_4"))){ 
                  if(new Date(fecha_nacimiento.value)>new Date){
                  document.getElementById("valid_6").innerHTML="La fecha no debe ser mayor a la actual";
                  document.getElementById("valid_6").style.display=''; 
                  fecha_nacimiento.style.borderColor="red";

                }else{
                  document.getElementById("valid_6").style.display='';
                  document.getElementById("valid_6").innerHTML="Ingrese la fecha de nacimiento";
                  fecha_nacimiento.style.borderColor="";
                  if(valid_element("Ingrese el género", genero, document.getElementById("valid_7"))){
                    if(valid_element("Ingrese el nivel educativo", nivel, document.getElementById("valid_8"))){
                      if(valid_element("Ingrese la talla de camisa", camisa, document.getElementById("valid_9") )){ 
                        if(valid_element("Ingrese talla de pantalon", pantalon, document.getElementById("valid_10"))){
                          if(valid_element("Ingrese el número de calzado", calzado, document.getElementById("valid_11"))){


                        
                        }
                      }
                    }
                  }
                } 
             
              }
            }
          } */
      /*   }
      
    } */
       /*   }  */
       validacion=true;
  

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


 btn_guardar.onclick=function(){
  enviar_info();
} 


//---------------Funcion para enviar la información al controlador------------

function enviar_info(){

datos_persona=new Object();
datos_persona['cedula_persona']=cedula_persona.value; 
datos_persona['tipo_sangre']=tipo_sangre.value;
datos_persona['peso']=peso.value;
datos_persona['altura']=altura.value;




//alert(datos_persona);

$.ajax({

type:"POST",
url:BASE_URL+"Historial/registrar_historial",
data:{"datos":datos_persona}
}).done(function(result){
    console.log(result);
    //alert(result);

              swal({
              title:"Éxito",
              text:"El historial clínico ha sido registrado exitosamente",
              type:"success",
              timer:2000,
              showConfirmButton:false
            });

        
          setTimeout(function(){location.href=BASE_URL+"Historial/registros";},1000); 




})


}}
