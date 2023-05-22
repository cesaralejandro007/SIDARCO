

var btn_guardar=document.getElementById("guardar")
var cedula=document.getElementById("cedula");
var primer_nombre=document.getElementById("primer_nombre");
var segundo_nombre=document.getElementById("segundo_nombre");
var primer_apellido=document.getElementById("primer_apellido");
var segundo_apellido=document.getElementById("segundo_apellido");
var fecha_nacimiento=document.getElementById("fecha_nacimiento");
var genero=document.getElementById("genero");
var nacionalidad=document.getElementById("nacionalidad");
var nivel=document.getElementById("nivel_educativo");
var datos_persona=[];




//------------------------Validación de la cédula----------------------------->


cedula.oninput=function(){
    if (cedula.value.length >9) cedula.value =cedula.value.slice(0, 9);
  
  }
  
  cedula.onkeyup=function(){
  
    valid_element("Debe ingresar el documento de identidad de la persona",cedula,document.getElementById("valid_1"));
    $.ajax({
  
     type:"POST",
     url:BASE_URL+"Personas/Consultas_cedulaV2",
     data:{'cedula':cedula.value}
  
   }).done(function(result){
    console.log(result);
    persona_existente=result;
  
  })
  
  }

//------------------Validación de persona existentes---------------

function persona_existe(){

    if(persona_existente==0){
      return true;
    }
  
  
    if(persona_existente==1){
  
      swal({
       type:"error",
       title:"Error",
       text:"Esta persona ya se encuentra registrada en el sistema",
       showConfirmButton:false,
       timer:2000
     });
  
      setTimeout(function(){cedula.style.borderColor="red";cedula.focus();},2000);
  
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
        data:{"cedula_persona":cedula.value,"estado":1}
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
  
          setTimeout(function(){location.href=BASE_URL+"Personas/Consultas"},2000);
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
      validado=false;
      span_element.style.display='';
      span_element.innerHTML=mensaje_error;
    }
  
    else{
      element.style.borderColor="";
      span_element.style.display='none';
    }
  
    return validado;
  
  }




//---------------------Validación de campos--------------------------

function validad_info(){

    var validacion=false;

    if(valid_element("Debe ingresar el documento de identidad", cedula, document.getElementById("valid_1"))){
        if(persona_existe(cedula.value)){
            if(valid_element("Debe ingresar el primer nombre de la persona",primer_nombre, document.getElementById("valid_2"))){
              if(valid_element("Debe ingresar el primer apellido de la persona", primer_apellido, document.getElementById("valid_4"))){
               

                validacion=true;
              }

            }
        }
    }


return validacion;

}




  

//----------------Validación de datos de integrantes-----------------




//----------------Función para enviar la información---------------


btn_guardar.onclick=function(){
  enviar_info_integrantes();
}


//---------------Funcion para enviar la información al controlador------------

function enviar_info_integrantes(){

   
    
datos_persona=new Object();
datos_persona['cedula']=cedula.value;
datos_persona['primer_nombre']=primer_nombre.value;
datos_persona['segundo_nombre']=segundo_nombre.value;
datos_persona['primer_apellido']=primer_apellido.value;
datos_persona['segundo_apellido']=segundo_apellido.value;
datos_persona['fecha_nacimiento']=fecha_nacimiento.value;
datos_persona['estado']=1;

alert(datos_persona);

$.ajax({

type:"POST",
url:BASE_URL+"Familias/registrar_familia",
data:{"datos":datos_persona}
}).done(function(result){
alert(result);
    console.log(result);

    if(result==1){

       
              swal({
               title:"Éxito",
               text:"La persona ha sido registrada exitosamente",
               type:"success",
               timer:2000,
               showConfirmButton:false
             });

         
    }




})


}
