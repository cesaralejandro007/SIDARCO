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


//--------------Botones de agregar de los DIV---------

var btn_agregar_per=document.getElementById("btn_agregar_per");
var btn_agregar_fam=document.getElementById("btn_agregar_fam");
var btn_agregar_psi=document.getElementById("btn_agregar_psi");


var ant_personales=document.getElementById("id_ant_personal");
var descripcion_per=document.getElementById("descripcion_personales");
var descripcion_per_array=[];
var ant_familiar=document.getElementById("id_ant_familiar");
var descripcion_fam=document.getElementById("descripcion_fam");
var descripcion_fam_array=[];
var habit_psicologico=document.getElementById("habit_psicol");
var descripcion_psi=document.getElementById("descripcion_psi");


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
    alert(div_ant_personales);
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
     /*  ant_familiar.value="0";
      descripcion_fam.value=" "; */

  }

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

      agregar_habit=parseInt(habit_psicologico);

      //push una funcion agregar un nuevo dato al final del array 
      psicologico_array.push(agregar_habit);

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

/*   alert(index); */

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

var hola="maria";
  alert(hola);

   enviar_info(); 

} 

}

//---------------Funcion para enviar la información al controlador------------


 $(document).ready(function() { 

  $("#enviar").on("click", function() {
      var form = $("#formulario"); 

     alert("hola como stas ");
var datos=[];
datos_persona=new Object();
datos_persona['cedula_persona']=cedula_persona.value;
datos_persona['fecha_historial']=fecha_historial.value;
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
alert(datos_persona['diagnostico']);
datos_persona['tratamiento']=tratamiento.value;
datos_persona['evolucion']=evolucion.value;

//Maria confia en ti.
//alert(datos_persona);

$.ajax({

type:"POST",
url:BASE_URL+"Historial/registrar_historial",
data:{"datos":datos_persona}
}).done(function(result){
    console.log(result);
     alert(result); 
/*  swal({
      title:"exito",
      type:"success",
      text:"registro exitoso",
      showConfirmButton:false,
      timer:200
    });
    setTimeout(function(){location.href=BASE_URL+"Historial/Consultas"})  */ 
})  

//Debemos de crear un array para poder meter en él los datos 
//del div de los antecedentesn en el push


//crear un for para poder recorrer el Div e ingresar en el objeto-array
var datos_ant_personales=[];
for(var i=0; i<personales_array.length; i++){
//Creamos un objeto para poder asignar en sus propiedades(como un array ) los valores
var datos=new Object();
datos['id_ant_personal']=personales_array[i];
datos['cedula_persona']=cedula_persona.value;
datos['descripcion_personales']=descripcion_per_array[i];


datos_ant_personales.push(datos); 

alert(JSON.stringify(datos_ant_personales));
}
//En cada iteracion se crea un objetoto "datos" al que se le asigna los valores
//correspondientes a sus propiedades, es decir a los ['id_consulta']=consulta_medica
    $.ajax({
      type:"POST",
      url:BASE_URL+"Historial/registrar_ant_personal",
      data:{"datos":datos_ant_personales},
    
    })
    

    var datos_fam_array=[];

    for(var i=0; i<familiar_array.length; i++){

      var datos= new Object();
      datos['id_ant_familiar']=familiar_array[i];
      datos['descripcion_familiar']=descripcion_fam_array[i];
      datos['cedula_persona']=cedula_persona.value;

      datos_fam_array.push(datos);

      alert(JSON.stringify(datos_fam_array));

    }

    $.ajax({
      type:"POST",
      url:BASE_URL+"Historial/registrar_ant_fam_personas",
      data:{"datos":datos_fam_array}
    }).done(function(result){

      swal({
        title:"Éxito",
        type:"success",
        text:"Se ha registrado con éxito",
        showConfirmButton:true,
        timer:2000,
      })

    })

    //--------------------------Resultado de los datos mandados al controlador

    /* success: function(respuesta){
      alert(respuesta);

      if(respuesta==1){
        swal({
          title:"Exito",
          text:"Se ha resgistrado el histoial de manera exitosa",
          type:"success",
          showConfirmButton: false,
        });
        setTimeout(function(){
          location.href=BASE_URL+'Historial/Consultas';

        }, 5000)
      } else {
        swal({
          title:"Error",
          type:"error",
          text:"Ha ocurrido un error"+ respuesta,
          html:true,
          showConfirmButton: true,
          customClass: "bigSwalV2",
          timer:5000,

        });

      }
    } */




  })

  })
/*   }
  )}) */

  /* swal({
    title:"Éxito",
    text:"El historial clínico ha sido registrado exitosamente",
    type:"success",
    timer:5000,
    showConfirmButton:false
  });


setTimeout(function(){location.href=BASE_URL+"Historial/registros";},1000);  */

