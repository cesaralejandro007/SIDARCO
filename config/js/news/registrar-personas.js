
//--------------------------Indice y datos especificos de las tablas-------------------------------------//

var index=0;
var datos_persona=new Object();
var seguridad=JSON.parse(document.getElementById("seguridad_usuario").value);

//_------------------------botones------------------------------------------------//
var btn_siguiente=document.getElementById("siguiente");
var btn_anterior=document.getElementById("anterior");
var btn_guardar=document.getElementById("guardar");
var btn_desde_siempre=document.getElementById("desde_siempre");
var botones_finales=document.getElementById("botones-finales");


//------------------ Información personal-----------------------------------------//

var tab_info_personal=document.getElementById("tab_1");
var div_info_personal=document.getElementById("panel1");
var primer_nombre=document.getElementById("primer_nombre");
var segundo_nombre=document.getElementById("segundo_nombre");
var primer_apellido=document.getElementById("primer_apellido");
var segundo_apellido=document.getElementById("segundo_apellido");
var fecha_nacimiento=document.getElementById("fecha_nacimiento");
var estado_civil=document.getElementById("estado_civil");
var genero=document.getElementById("genero");
//var sexualidad=document.getElementById("sexualidad");
var nacionalidad=document.getElementById("nacionalidad");
var nivel_educativo=document.getElementById("nivel_educativo");
//var afrodescendencia=document.getElementById("afrodescendencia");
//var tiempo_comunidad=document.getElementById("tiempo_comunidad");
//var jefe_familia=document.getElementById("jefe_familia");
//var miliciano=document.getElementById("miliciano");
var cedula=document.getElementById("cedula");
var transporte=document.getElementById("transporte");
var tipo_transporte_ver=document.getElementById("tipo_transporte_view");
var tipo_transporte=document.getElementById("tipo_transporte");
//var comunidad_indigena=document.getElementById("comunidad_indigena");
//var comunidad_indigena_ver=document.getElementById("comunidad_indigena_view");
//var nombre_comunidad=document.getElementById("nombre_comunidad");
//var jefe_calle=document.getElementById("jefe_calle");
//var propietario_vivienda=document.getElementById("propietario_vivienda");
var persona_existente=false;
cedula.focus();



//------------------ Documentos personales----------------------------------  -------//

/*
var serial_patria=document.getElementById("serial_patria");
var codigo_patria=document.getElementById("codigo_patria");
var serial_psuv=document.getElementById("serial_psuv");
var codigo_psuv=document.getElementById("codigo_psuv");
var serial_discapacidad=document.getElementById("serial_discapacidad");
var codigo_discapacidad=document.getElementById("codigo_discapacidad");
*/

//------------------ Información de contacto-----------------------------------------//

var tab_doc_personales=document.getElementById("tab_2");
var div_doc_personales=document.getElementById("panel2");
var correo=document.getElementById("correo");
var tipo_correo=document.getElementById("tipo_correo");
var correo_institucional=document.getElementById("correo_institucional");
var tipo_correo_inst=document.getElementById("tipo_correo_inst");
var telefono=document.getElementById("telefono");
var telf_casa=document.getElementById("telf_casa");
var whatsapp=document.getElementById("whatsapp");
var direccion=document.getElementById("direccion");


//------------------ Información política-----------------------------------------//


/* var org_politica=document.getElementById("organizacion_politica");
var nombre_organizacion=document.getElementById("nombre_organizacion");
var btn_nueva_org=document.getElementById("btn_nueva_org");
var bonos_persona=[];
var misiones_persona=[];
var btn_agregar_mision=document.getElementById("btn_agregar_mision");
var btn_agregar_bono=document.getElementById("btn_agregar_bono");
var div_bonos_agregados=document.getElementById("bonos_agregados");
var div_misiones_agregadas=document.getElementById("misiones_agregadas");
var bonos_input=document.getElementById("input_bonos");
var misiones_input=document.getElementById("input_misiones");
var ultima_recepcion=document.getElementById("ultima_recepcion");
var recibe_actualmente=document.getElementById("recibe_actualmente");
var ver_fecha_recepcion=document.getElementById("ver_fecha_recepcion");
var btn_nuevo_bono=document.getElementById("btn_nuevo_bono");
var nombre_bono=document.getElementById("bono_nuevo");
var btn_nueva_mision=document.getElementById("btn_nueva_mision");
var nombre_mision=document.getElementById("nombre_mision");
 */


//-----------------------------Informacion laboral--------------------------------------------//

//var //tab_info_laboral=document.getElementById("tab_5");
//var //div_info_laboral=document.getElementById("panel5");
var div_info_contacto=document.getElementById("panel3");
var tab_info_contacto=document.getElementById("tab_3");
var ocupacion=document.getElementById("ocupacion");
var btn_nueva_ocupacion=document.getElementById("btn_nueva_ocupacion");
var fecha_seniat=document.getElementById("ing_seniat");
var fecha_publica=document.getElementById("ing_publica");
var fecha_notificacion=document.getElementById("fecha_notificacion");
var ult_designacion=document.getElementById("ult_designacion");
var prima=document.getElementById("prima");
var declaracion_j=document.getElementById("declaracion_j");
var inscripcion_ivss=document.getElementById("inscripcion_ivss");
var fideicomiso=document.getElementById("fideicomiso");
var id_ubicacion=document.getElementById("id_ubicacion");
var nombre_ocupacion=document.getElementById("ocupacion_nueva");
var nombre_condicion=document.getElementById("nombre_condicion_laboral");
var nueva_cond=document.getElementById("nombre_cond_nueva");
var btn_nueva_cond=document.getElementById("nueva_cond");
var sector_formal=document.getElementById("tipo_sector_formal");
var ver_sector_formal=document.getElementById("ver_sector_formal");
var div_proyectos_existentes=document.getElementById("proyectos_agregados");
var div_proyecto_nuevo=document.getElementById("nuevo_proyecto");
var proyectos=document.getElementById("proyectos");
var descripcion=document.getElementById("descripcion");
var nombre_proyecto=document.getElementById("nombre_proyecto");
var area_proyecto=document.getElementById("area_proyecto");
var estado_proyecto=document.getElementById("estado_proyecto");
var btn_otro_proyecto=document.getElementById("otro_proyecto");
var btn_agregar_proyecto=document.getElementById("agregar_proyecto");
var div_proyectos_persona=document.getElementById("proyectos_persona");
var proyectos_persona=[];
var proyectos_persona_descripcion=[];

var btn_agregar_ubicacion=document.getElementById("agregar_ubicacion");
var division=document.getElementById("id_division");
var area=document.getElementById("id_area");
var seccion=document.getElementById("id_seccion");
var div_ubicacion_persona=document.getElementById("ubicaciones_persona");
var ubicaciones_persona=[];
//var id_estado=document.getElementById()


var select_estado=document.getElementById("estado");
var ver_estado=document.getElementById("ver_estado");
var id_estado=document.getElementById("id_estado");

var div_cargos_existentes=document.getElementById("cargos_agregados");
var cargos=document.getElementById("cargos");
var nombre_cargo=document.getElementById("nombre_ocupacion");
var btn_agregar_cargo=document.getElementById("agregar_cargo");
var div_cargos_persona=document.getElementById("cargos_personas");
var cargos_persona=[];
 var egresado=document.getElementById("egresado");
var egresado_nomina=document.getElementById("egresado_nomina"); 
var ver_egresado=document.getElementById("ver_egresado");
var ver_fecha=document.getElementById("fecha");
var ver_descripcion=document.getElementById("ver_descripcion");
var descripcion_egresados=document.getElementById("descripcion_egresados");

var id_estado_fun=document.getElementById("id_estado_fun"); 
var cargo_nominal=document.getElementById("cargo_nominal");
var nomina=document.getElementById("nomina");
var ver_grado_fun=document.getElementById("ver_grado"); 
var grado_fun=document.getElementById("grado_fun"); 
/* var grado_fun=documente.getElementById("ver_funcionario"); */
/* var estado_funcionario=document.getElementById("estado_funcionario");  */
/* var ver_estado_fun=document.getElementById("ver_estado_fun"); */
 /* var estado_fun=document.getElementById("estado_fun");  */
//var ver_fecha_egresado=document.getElementById("ver_fecha_egresado");
var id_division=document.getElementById("id_division");

var id_seccion=document.getElementById("id_seccion");
var agregar=document.getElementById("agregar");
//--------------------------------------------------------------------------------------------//

//var //tab_info_usuario=document.getElementById("tab_4");
//var //div_info_usuario=document.getElementById("panel4");

var tab_info_politica=document.getElementById("tab_4");
var div_info_politica=document.getElementById("panel4");

var contrasenia=document.getElementById("contrasenia");
var valid_contrasenia=document.getElementById("valid_contrasenia");
var confirmar=document.getElementById("confirmar");
var valid_confirmar=document.getElementById("valid_confirmar");
var color=document.getElementById("color_fav");
var valid_color=document.getElementById("valid_color");
var animal=document.getElementById("animal_fav");
var valid_animal=document.getElementById("valid_animal");
var mascota=document.getElementById("primera_mascota");
var valid_mascota=document.getElementById("valid_mascota");
var btn_ver_clave=document.getElementById("ver_clave");
var rol=document.getElementById("rol_usuario");
var ver_rol=document.getElementById("ver_rol");




//--------------------------------Avanzar con enter-------------------------------------------//

document.onkeypress=function(e){
 if(e.which == 13  || e.keyCode==13 ) {

  funcion_siguiente();
  return false;

}
else{return true;}
}

//-----------------------------------------------------------------------------------------------//

btn_ver_clave.onclick=function(){
  if(contrasenia.type=='password'){
    contrasenia.type=confirmar.type='text';
    btn_ver_clave.innerHTML="<em class='fa fa-eye-slash'></em>";
  }
  else{
    contrasenia.type=confirmar.type='password';
    btn_ver_clave.innerHTML="<em class='fa fa-eye'></em>";
  }
}

//--------------------------validar informacion personal----------------------------------------//


primer_nombre.maxLength=segundo_nombre.maxLength=primer_apellido.maxLength=segundo_apellido.maxLength=12;
nacionalidad.maxLength=nivel_educativo.maxLength=15;
primer_nombre.onkeyup=function(){valid_element("Ingrese primer nombre",primer_nombre,document.getElementById("valid_2"));}
segundo_nombre.onkeyup=function(){valid_element("Ingrese segundo nombre",segundo_nombre,document.getElementById("valid_3"));}
primer_apellido.onkeyup=function(){valid_element("Ingrese primer apellido ",primer_apellido,document.getElementById("valid_4"));}
segundo_apellido.onkeyup=function(){valid_element("Ingrese segundo apellido",segundo_apellido,document.getElementById("valid_5"));}
fecha_nacimiento.onchange=function(){valid_element("Ingrese fecha de nacimiento",fecha_nacimiento,document.getElementById("valid_6"));}
estado_civil.onchange=function(){valid_element("Ingrese estado civil",estado_civil,document.getElementById("valid_7"));}
genero.onchange=function(){valid_element("Debe indicar el género de la persona",genero,document.getElementById("valid_8"));}
//sexualidad.onchange=function(){valid_element("Debe indicar la orientación sexual de la persona",sexualidad,document.getElementById("valid_9"));}
nacionalidad.onkeyup=function(){valid_element("Debe ingresar la nacionalidad de la persona",nacionalidad,document.getElementById("valid_10"));}
nivel_educativo.onkeyup=function(){valid_element("Debe ingresar el nivel educativo de la persona",nivel_educativo,document.getElementById("valid_11"));}
//jefe_familia.onchange=function(){valid_element("Debe indicar si la persona es jefe de familia",jefe_familia,document.getElementById("valid_14"));}
//propietario_vivienda.onchange=function(){valid_element("Debe indicar si la persona es propietario dela vivienda",propietario_vivienda,document.getElementById("valid_15"));}
//jefe_calle.onchenge=function(){valid_element("Debe indicar si la persona es jefe de calle",jefe_calle,document.getElementById("valid_16"));}
//privado_libertad.onchange=function(){valid_element("Debe indicar si la persona es privada de libertad",privado_libertad,document.getElementById("valid_20"));}

function valid_info_personal(){

  var validacion=false;

  if(valid_element("Debe ingresar el documento de identidad de la persona",cedula,document.getElementById("valid_1"))){
   if(persona_existe(cedula.value)){ 
     if(valid_element("Ingrese primer nombre",primer_nombre,document.getElementById("valid_2"))){
       if(valid_element("Ingrese segundo nombre",segundo_nombre,document.getElementById("valid_3"))){
         if(valid_element("Ingrese primer apellido",primer_apellido,document.getElementById("valid_4"))){
           if(valid_element("Ingrese segundo apellido",segundo_apellido,document.getElementById("valid_5"))){
             if(valid_element("Ingrese fecha de nacimiento",fecha_nacimiento,document.getElementById("valid_6"))){
               if(new Date(fecha_nacimiento.value)>new Date()){
                document.getElementById("valid_6").innerHTML="Fecha de nacimiento errónea";
                document.getElementById("valid_6").style.display='';
                fecha_nacimiento.style.borderColor="red";

              }
              else{

                document.getElementById("valid_6").style.display='none';
                document.getElementById("valid_6").innerHTML="Ingrese la fecha de nacimiento";
                fecha_nacimiento.style.borderColor="";
                if(valid_element("Debe indicar el estado civil de la persona",estado_civil,document.getElementById("valid_7"))){
                 if(valid_element("Debe indicar el género de la persona",genero,document.getElementById("valid_8"))){
                 //if(valid_element("Debe indicar la orientación sexual de la persona",sexualidad,document.getElementById("valid_9"))){
                     if(valid_element("Debe ingresar la nacionalidad de la persona",nacionalidad,document.getElementById("valid_10"))){
                       if(valid_element("Debe ingresar el nivel educativo de la persona",nivel_educativo,document.getElementById("valid_11"))){
                        //if(valid_element("Debe indicar si la persona es afrodescendente",afrodescendencia,document.getElementById("valid_12"))){
                           //if(valid_element("Debe ingresar la fecha en que la persona llegó a la comunidad",tiempo_comunidad,document.getElementById("valid_13"))){
                           //  if(valid_element("Debe indicar si la persona es jefe de familia",jefe_familia,document.getElementById("valid_14"))){
                            //   if(valid_element("Debe indicar si la persona es propietario dela vivienda",propietario_vivienda,document.getElementById("valid_15"))){
                                 //if(valid_element("Debe indicar si la persona es jefe de calle",jefe_calle,document.getElementById("valid_16"))){
                                   //if(valid_element("Debe indicar si la persona pertenece o perteneció a la milicia",miliciano,document.getElementById("valid_17"))){
                                     if(valid_element("Debe indicar si la persona se desplaza en transporte público o privado",transporte,document.getElementById("valid_18"))){
                                       if(valid_tipo_transporte()){
                                        // if(valid_element("Debe indicar si la persona pertenece a alguna comunidad indigena",comunidad_indigena,document.getElementById("valid_19"))){
                                          // if(valid_comunidad_indigena()){  
                                            //if(valid_element("Debe indicar si la persona es privada de libertad",privado_libertad,document.getElementById("valid_20"))){
                                              
                                              
                                              validacion=true;
                                            
                                            

                                            }  } } } } } } 
                                          
                                          
                                          }  }   }  } } } }


                                            return validacion;

                                          }

//-------------------------Funcion de boton siguiente-------------------------------------//

btn_siguiente.onclick=function(){

  funcion_siguiente();
  
}

//-------------------------------Funcion de boton anterior-------------------------------------//

btn_anterior.onclick=function(){

 index--;
 control_indice();

}

//-------------------------------Funcion de boton desde siempre-------------------------------------//

/*
btn_desde_siempre.onclick=function(){

  tiempo_comunidad.value=fecha_nacimiento.value;
  valid_element("Debe ingresar la fecha en que la persona llegó a la comunidad",tiempo_comunidad,document.getElementById("valid_13"));

}
*/
//---------------------------------funcion para visualizar campo de tipo de transporte---------------//

 transporte.onchange=function(){

  valid_element("Debe indicar si la persona se desplaza en transporte público o privado",transporte,document.getElementById("valid_18"));
  change_to_dynamic_record("privado",tipo_transporte_ver,transporte,tipo_transporte);

} 


//----------------------------------------------------------------------------------------------------//
/*
recibe_actualmente.onchange=function(){
  if(recibe_actualmente.value=='0'){
    ver_fecha_recepcion.style.display='';

  }
  else{
    ver_fecha_recepcion.style.display='none';

  }

}
*/

//---------------------------------funcion para visualizar campo de tipo de transporte---------------//
/*
comunidad_indigena.onchange=function(){
 valid_element("Debe indicar si la persona pertenece a alguna comunidad indigena",comunidad_indigena,document.getElementById("valid_19"));
 change_to_dynamic_record("si",comunidad_indigena_ver,comunidad_indigena,nombre_comunidad);

}
*/

//---------------------------------funcion para visualizar campo de organizacion politica---------------//
/*
org_politica.onchange=function(){

  change_to_dynamic_record("si",org_politica_ver,org_politica,nombre_organizacion);


}
*/
//---------------------------------------------------------------------------------//

 /* sector_laboral.onchange=function(){

  change_to_dynamic_record("1",ver_sector_formal,sector_laboral,id_estado_fun);
  sector_laboral.value='vacio';


}  */


nomina.onchange=function(){


  change_to_dynamic_record("2",ver_grado_fun,nomina,grado_fun);
  


}    

egresado.onchange=function(){

  change_to_dynamic_record("1",ver_egresado, egresado,egresado_nomina);



}  

select_estado.onchange=function(){

change_to_dynamic_record("1",ver_estado, select_estado,id_estado );


}



//----------------------------------boton guardar funcion---------------------------------------------//

btn_guardar.onclick=function(){
  funcion_siguiente();
}


//-------------------------------------------------------------------------------------------//
/*
btn_nuevo_bono.onclick=function(){
  if(nombre_bono.style.display=='none'){
    btn_nuevo_bono.innerHTML='Atrás';
    bonos_input.value='vacio';
    bonos_input.style.display='none';
    nombre_bono.style.display='';
    nombre_bono.focus();
  }
  else{
    btn_nuevo_bono.innerHTML='Nuevo';
    nombre_bono.value='';
    bonos_input.style.display='';
    nombre_bono.style.display='none';
  }
}
*/

//------------------------------------funcion agregar bonos-----------------------------//

/*

nombre_bono.maxLength=30;
bonos_input.onchange=function(){
  if(bonos_input.value!="vacio"){
    document.getElementById("valid_24").style.display="none";
  }
}
btn_agregar_bono.onclick=function(){
  var continuar=false;
  if(nombre_bono.style.display=='none'){
   if(valid_element("Debe ingresar el nombre del bono",bonos_input,document.getElementById("valid_24")) && valid_bono()){
    continuar=true;
  }}
  else{
    if(valid_element("Debe ingresar el nombre del bono",nombre_bono,document.getElementById("valid_24")) && valid_bono()){
      continuar=true;
    }
  }



  if(continuar){
    var texto="";
    var bono_agg= new Object;
    if(nombre_bono.style.display=='none'){
     bono_agg['nuevo']='0';
     bono_agg['bono']=bonos_input.value;
     texto=bonos_input.options[bonos_input.selectedIndex].text;
   }
   else{
    bono_agg['nuevo']='1';
    bono_agg['bono']=nombre_bono.value;
    texto=nombre_bono.value;
  }

  bonos_persona.push(bono_agg);

  console.log(bonos_persona);
  var elemento=document.createElement("div");
  var table=document.createElement("table");
  table.style.width="100%";
  var tr=document.createElement("tr");
  var td1=document.createElement("td");
  var td2=document.createElement("td");
  td2.style.textAlign="right";
  td1.innerHTML=texto;
  var btn_element=document.createElement("input");
  btn_element.type='button';
  btn_element.value="X";
  btn_element.className="btn btn-danger";
  td2.appendChild(btn_element);
  tr.appendChild(td1);
  tr.appendChild(td2);
  table.appendChild(tr);
  elemento.appendChild(table);
  var hr=document.createElement("hr");
  elemento.appendChild(hr);
  btn_element.onclick=function(){
   div_bonos_agregados.removeChild(elemento);
   bonos_persona.splice(bonos_persona.indexOf(texto),1);
   console.log(bonos_persona);
 }

 div_bonos_agregados.appendChild(elemento);

}
}
*/
//------------------------------------------------------------------------------------//

function valid_bono(){
  var validar=true;

  for(var i=0;i<bonos_persona.length;i++){
    if(bonos_persona[i]['bono']==bonos_input.value || bonos_persona[i]['bono']==nombre_bono.value){
      validar=false;
    }
  }

  if(!validar){
    document.getElementById("valid_24").innerHTML="Este bono ya fue agregado";
    document.getElementById("valid_24").style.display='';
    bonos_input.style.borderColor='red';
    nombre_bono.style.borderColor='red';
  }
  else{

    bonos_input.style.borderColor='';
    nombre_bono.style.borderColor='';
    document.getElementById("valid_24").style.display='none';
    document.getElementById("valid_24").innerHTML="Este bono ya fue agregado";
  }

  return validar;
}

//------------------------------------funcion agregar bonos-----------------------------//
 
 btn_agregar_proyecto.onclick=function(){
  
  alert(descripcion.value);
  if( proyectos.value=="0" ||  descripcion.value=="" ){
    swal({
     title:"Error",
     text:"Debe seleccionar la información del título",
     type:"error",
     showConfirmButton:false,
     timer:2000
   });
   setTimeout(function () {
     proyectos.style.borderColor = 'red'
     descripcion.style.borderColor = "red";
   });
 }else{
    proyectos.style.borderColor = ''
    descripcion.style.borderColor = "";
    var agregado="";
    var agregado1="";
    var text="";
    var text1="";
    text = proyectos.options[proyectos.selectedIndex].text;
    text1=descripcion.value;
    
    agregado = parseInt(proyectos.value) ;
    agregado1 = descripcion.value;

    proyectos_persona.push(agregado);
    proyectos_persona_descripcion.push(agregado1);

    console.log(proyectos_persona);
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
      div_proyectos_persona.removeChild(elemento);
      console.log(proyectos_persona);
    }
    div_proyectos_persona.appendChild(elemento);
    proyectos.value = "0";
     descripcion.value = ""; 
}
}  

//--------------------------------------------------------------------------------------------//

/* btn_otro_proyecto.onclick=function(){
  if(div_proyectos_existentes.style.display=="" || div_proyectos_existentes.style.display=="block"){
    div_proyectos_existentes.style.display='none';
    btn_otro_proyecto.value='Atrás';
    div_proyecto_nuevo.style.display="block"; 
  }
  else{
    proyectos.value='vacio';
    div_proyecto_nuevo.style.display="none"; 
    div_proyectos_existentes.style.display='block';
    div_proyectos_existentes.style.width="100%";
    btn_otro_proyecto.value='Otro';
    nombre_proyecto.value=estado_proyecto.value=area_proyecto.value="";
  }
} */

//------------UBICACION DE FUNCIONARIAS Y FUNCIONARIOS-----------------------------------------------------------//


btn_agregar_ubicacion.onclick=function(){
  if (id_division.value == 0 || id_area.value == 0 || id_seccion.value==0) {
    swal({
      type: "error",
      title: "Error",
      text: "Debe ingresar los datos de la división, área y sección",
      timer: 2000,
      showConfirmButton: false
    });
    setTimeout(function () {
      id_division.style.borderColor = 'red'
      id_area.style.borderColor = "red";
    });
  }
  else {
    id_division.style.borderColor = ''
    id_area.style.borderColor = "";

    var area1="";

    text=division.options[division.selectedIndex].text;
    text1=area.options[area.selectedIndex].text;
    text2=seccion.options[seccion.selectedIndex].text;
  
    area1=parseInt(area.value);

    ubicaciones_persona.push(area1);

   console.log(proyectos_persona);
   var elemento=document.createElement("div");
   var table=document.createElement("table");
   table.style.width="100%";
   var tr=document.createElement("tr");
   var td1=document.createElement("td");
   td1.style.width="32%";
   var td2=document.createElement("td");
   td2.style.width="32%";
   var td3=document.createElement("td");
   td3.style.width="32%";
   var td4=document.createElement("td");
   td4.style.width="4%";
   td4.style.textAlign="right";
   td1.innerHTML=text;
   td2.innerHTML=text1;
   td3.innerHTML=text2;
   var btn_element=document.createElement("input");
   btn_element.type='button';
   btn_element.value="X";
   btn_element.className="btn btn-danger";
   td4.appendChild(btn_element);
   tr.appendChild(td1);
   tr.appendChild(td2);
   tr.appendChild(td3);
   tr.appendChild(td4);
   table.appendChild(tr);
   elemento.appendChild(table);
   var hr=document.createElement("hr");
   elemento.appendChild(hr);
   btn_element.onclick=function(){
     div_ubicacion_persona.removeChild(elemento);
     console.log(ubicaciones_persona);
   }

   div_ubicacion_persona.appendChild(elemento);
  }

    id_division.value="0";
    id_area.value="0";
    id_seccion.value="0";
     

  }


//----------------------------------Funcion agregar cargos funcionales-----------------------//

/* btn_agregar_cargo.onclick=function(){
  if(valid_datos_cargo()){
    var agregado="";
    var text="";
    if(div_cargos_existentes.style.display=="" || div_cargos_existentes.style.display=="block"){
      agregado=parseInt(cargos.value);
      text=cargos.options[cargos.selectedIndex].text;
      
    }
    else{
      
      
    }

    cargos_persona.push(agregado);

    console.log(cargos_persona);
    var elemento=document.createElement("div");
    var table=document.createElement("table");
    table.style.width="100%";
    var tr=document.createElement("tr");
    var td1=document.createElement("td");
    var td2=document.createElement("td");
    td2.style.textAlign="right";
    td1.innerHTML=text;
    var btn_element=document.createElement("input");
    btn_element.type='button';
    btn_element.value="X";
    btn_element.className="btn btn-danger";
    td2.appendChild(btn_element);
    tr.appendChild(td1);
    tr.appendChild(td2);
    table.appendChild(tr);
    elemento.appendChild(table);
    var hr=document.createElement("hr");
    elemento.appendChild(hr);
    btn_element.onclick=function(){
      div_cargos_persona.removeChild(elemento);
      cargos_persona.splice(cargos_persona.indexOf(agregado),1);
      console.log(cargos_persona);
    }

    div_cargos_persona.appendChild(elemento);

  }
} */

//-------------------------------------Validaciones de cargos funcionales---------------------------//

/* function valid_datos_cargo(){
  var validar=false;
  if(div_cargos_existentes.style.display=="" || div_cargos_existentes.style.display=="block"){
    if(cargos.value=='vacio'){
     swal({
      title:"Error",
      text:"Debe seleccionar un Cargo funcional",
      type:"error",
      showConfirmButton:false,
      timer:2000
    });

   }
   else{
    validar=true;
  }
}
else{
  if(nombre_cargo.value==""){
    swal({
      title:"Error",
      text:"Debe ingresar el nombre",
      type:"error",
      showConfirmButton:false,
      timer:2000
    });
  }
  else{
    validar=true;
  }
}

return validar;
} */



//------------------------------------funcion agregar misiones-----------------------------//
/*
btn_nueva_mision.onclick=function(){
  if(nombre_mision.style.display=='none'){
    btn_nueva_mision.innerHTML='Atrás';
    misiones_input.value='vacio';
    misiones_input.style.display='none';
    nombre_mision.style.display='';
    nombre_mision.focus();
  }
  else{
    btn_nueva_mision.innerHTML='Nueva';
    nombre_mision.value='';
    misiones_input.style.display='';
    nombre_mision.style.display='none';
  }
}

nombre_mision.maxLength=30;


btn_agregar_mision.onclick=function(){

  var continuar=false;
  if(nombre_mision.style.display=='none'){
    if(valid_element("Debe ingresar el nombre de la mision",misiones_input,document.getElementById("valid_25")) && valid_mision()){
      continuar=true;
    }}
    else{
      if(valid_element("Debe ingresar el nombre de la mision",nombre_mision,document.getElementById("valid_25")) && valid_bono()){
        continuar=true;
      }
    }


    if(continuar){
      if(recibe_actualmente.value=='1'  ||  (recibe_actualmente.value=='0' && ultima_recepcion.value!="") ){

        var texto="";
        var mis=new Object();
        if(nombre_mision.style.display=='none'){
         mis['nuevo']='0';
         mis['nombre_mision']=misiones_input.value;
         texto=misiones_input.options[misiones_input.selectedIndex].text;
       }
       else{
        mis['nuevo']='1';
        mis['nombre_mision']=nombre_mision.value;
        texto=nombre_mision.value;
      }


      mis['recibe_actualmente']=parseInt(recibe_actualmente.value);
      recibe_actualmente.value=='0'?mis['fecha']=ultima_recepcion.value:mis['fecha']="";


      misiones_persona.push(mis);
      console.log(misiones_persona);
      var elemento=document.createElement("div");
      var table=document.createElement("table");
      table.style.width="100%";
      var tr=document.createElement("tr");
      var td1=document.createElement("td");
      var td2=document.createElement("td");
      td2.style.textAlign="right";
      td1.innerHTML=texto;
      var btn_element=document.createElement("input");
      btn_element.type='button';
      btn_element.value="X";
      btn_element.className="btn btn-danger";
      td2.appendChild(btn_element);
      tr.appendChild(td1);
      tr.appendChild(td2);
      table.appendChild(tr);
      elemento.appendChild(table);
      var hr=document.createElement("hr");
      elemento.appendChild(hr);
      btn_element.onclick=function(){
      	div_misiones_agregadas.removeChild(elemento);
      	misiones_persona.splice(misiones_persona.indexOf(texto),1);
        console.log(misiones_persona);
      }

      div_misiones_agregadas.appendChild(elemento);

    }    
    else{
      swal({
       title:"Error",
       type:"error",
       text:"Debe completar los datos de la mision que está asignando a la persona"
     });
    }
  }
}
*/
//--------------------------Divisiones, areas y seccion-----------------------------------------------------------------------//


id_division.onchange = function () {
    if(id_division.value!='0'){
    var division = new Object();
    division = id_division.value;
    $.ajax({
      type: "POST",
      url: BASE_URL + "Personas/Consultas_areas",
      data: { "divisiones": division}
    }).done(function(result) {
      id_area.innerHTML = result;
    });
  }else{
    var areas = new Object();
    division = 0;
    $.ajax({
      type: "POST",
      url: BASE_URL + "Personas/Consultas_areas",
      data: { "divisiones": division}
    }).done(function(result) {
      id_area.innerHTML = result;
    });

    var areas = new Object();
    areas = 0;
    $.ajax({
      type: "POST",
      url: BASE_URL + "Personas/Consultas_secciones",
      data: { "areas": areas}
    }).done(function(result) {
      id_seccion.innerHTML = result;
    });
  }
  
}

  
    id_area.onchange = function () {
      var areas = new Object();
      areas = id_area.value;
      $.ajax({
        type: "POST",
        url: BASE_URL + "Personas/Consultas_secciones",
        data: { "areas": areas}
      }).done(function(result) {
        id_seccion.innerHTML = result;
      });
    }







//---------------------------------------------------------------------//
function valid_mision(){
  var validar=true;

  for(var i=0;i<misiones_persona.length;i++){
    if(misiones_persona[i]['nombre_mision']==misiones_input.value || misiones_persona[i]['nombre_mision']==nombre_mision.value){
      validar=false;
    }
  }


  if(!validar){
    document.getElementById("valid_25").innerHTML="Estea misión ya fue agregada";
    document.getElementById("valid_25").style.display='';
    misiones_input.style.borderColor='red';
    nombre_mision.style.borderColor='red';
  }
  else{

    misiones_input.style.borderColor='';
    nombre_mision.style.borderColor='';
    document.getElementById("valid_25").style.display='none';
    document.getElementById("valid_25").innerHTML="Esta misión ya fue agregada";
  }

  return validar;
}



//----------------------------Funcion validar registros dinamicos de un campo---------------------------//

 function change_to_dynamic_record(clave,elemento_ver,elemento_select,elemento_input){


  if(elemento_select.value==clave){
   elemento_ver.style.display="block";
   elemento_input.focus();
 }
 else{
   elemento_ver.style.display="none";
   elemento_input.blur();
   elemento_input.value="";
 }


}


//-----------------------------------Validacion genérica----------------------------------------//

function valid_element(mensaje_error,element,span_element){



  var validado=true;

  if(element.value=="vacio" || element.value=="" ){

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


//_----------------------------validar info laboral--------------------------------------------//


/* fecha_seniat.onchange=function(){valid_element("Debe ingresar la fecha de ingreso al seniat",fecha_seniat,document.getElementById("valid_28"));}

if(valid_element("Debe indicar la fecha de ingreso al SENIAT",fecha_seniat,document.getElementById("valid_28"))){
  if(new Date(fecha_seniat.value)>new Date()){
    document.getElementById("valid_28").innerHTML="Fecha de ingreso al SENIAT errónea"
    document.getElementById("valid_28").style.display='';
    fecha_seniat.style.borderColor="red";
  
    
  }
  
  }else{
    document.getElementById("valid_28").style.display='none';
    document.getElementById("valid_28")
  
  
  } */


function valid_info_laboral(){

var validacion=false;
      
          if(valid_element("Indique la fecha de ingreso al SENIAT",fecha_seniat,document.getElementById("valid_28"))){
            if(new Date(fecha_seniat.value)>new Date()){
            document.getElementById("valid_28").innerHTML="La fecha no puede ser mayor a la actual"
              document.getElementById("valid_28").style.display='';
              fecha_seniat.style.borderColor="red";
            }
            if(valid_element("Indique fecha de ingreso a la administración",fecha_publica,document.getElementById("valid_29"))){
              if(new Date(fecha_publica.value)>new Date()){
                document.getElementById("valid_29").innerHTML="La fecha no puede ser mayor a la actual"
                document.getElementById("valid_29").style.display='';
                fecha_publica.style.borderColor="red";
              }
                if(valid_element("Indique fecha de notificación",fecha_notificacion,document.getElementById("valid_30"))){
                if(new Date(fecha_notificacion.value)>new Date()){
                  document.getElementById("valid_30").innerHTML="La fecha no puede ser mayor a la actual"
                  document.getElementById("valid_30").style.display='';
                  fecha_notificacion.style.borderColor="red";
                }
                  if(valid_element("Indique fecha de designación", ult_designacion,document.getElementById("valid_31"))){ 
                    if(new Date(ult_designacion.value)>new Date()){
                        document.getElementById("valid_31").innerHTML="La fecha no puede ser mayor a la actual"
                        document.getElementById("valid_31").style.display='';
                        ult_designacion.style.borderColor="red";
                      }if(valid_element("Indique si cobra prima",prima, document.getElementById("valid_32"))){ 
                          if(valid_element("Indique si realizó la declaración",declaracion_j, document.getElementById("valid_33"))){ 
                            if(valid_element("Indique inscripción en el IVSS",inscripcion_ivss, document.getElementById("valid_34"))){ 
                              if(valid_element("Indique si posee cuenta de fideicomiso",fideicomiso, document.getElementById("valid_35"))){ 
                                if(valid_element("Indique si la persona viene por traslado", estado, document.getElementById("valid_50"))){ 
                                  if(estado.value==1){
                                    valid_element("Indique el estado de procedencia",id_estado, document.getElementById("valid_51"))
                                  }
                                    if(valid_element("Indique si la persona es egresada de nómina", egresado, document.getElementById("valid_36"))){ 
                                      if(egresado.value==1){
                                        valid_element("Indique razón de egreso",egresado_nomina, document.getElementById("valid_37"))
                                    }
                                        if(valid_element("Indique nómina a la que pertenece",nomina, document.getElementById("valid_38"))){
                                          if(nomina.value==2){
                                              
                                              valid_element("Indique cargo o jeraquía",grado_fun, document.getElementById("valid_39"))
                                            }
                                              if(valid_element("Indique el cargo nominal",cargo_nominal, document.getElementById("valid_40"))){
                                                if(valid_element("Indique el estado ",id_estado_fun, document.getElementById("valid_41"))){
                                                    /* if(valid_element("Indique el cargo funcional",cargos, document.getElementById("valid_42"))){ */
                                                  if(valid_element("Indique la ubicación",id_ubicacion, document.getElementById("valid_43"))){

                          validacion=true;

                                    } }  } } } } } } } } } } } }

                                            return validacion;

                                          }


//------------------------------------------------------------------------------------------------//

/* btn_nueva_ocupacion.onclick=function(){
  if(ocupacion_nueva.style.display=='none'){
    ocupacion_nueva.style.display='';
    btn_nueva_ocupacion.value='Atrás';
    ocupacion.style.display='none';
    ocupacion_nueva.focus();
    ocupacion.value='0';
  }
  else{
    ocupacion_nueva.style.display='none';
    btn_nueva_ocupacion.value='Nueva';
    ocupacion.style.display='';
    ocupacion_nueva.value='';
  }
} */

//--------------------------------------------------------------------------------------------------//

/* function valid_cond_laboral(){
  var validar=false;

  if(nueva_cond.style.display=="none" && nombre_condicion.value!="0"){
   if(valid_element("Debe seleccionar el sector laboral de la persona",sector_laboral,document.getElementById("valid_27"))){
    if(sector_laboral.value=="1"){
      if(valid_element("Debe indicar qué tipo de sector formal ejerce la persona",sector_formal,document.getElementById("valid_27"))){
        validar=true;
      }
    }
    else{
      validar=true;
    }
  }
}
else{
  if(nueva_cond.style.display!='none' && nueva_cond.value!=""){
   if(valid_element("Debe seleccionar el sector laboral de la persona",sector_laboral,document.getElementById("valid_27"))){
    if(sector_laboral.value=="1"){
      if(valid_element("Debe indicar qué tipo de sector formal ejerce la persona",sector_formal,document.getElementById("valid_27"))){
        validar=true;
      }
    }
    else{validar=true;}
  }
}
else{
  validar=true;
}
}




return validar;
}
 */

//--------------------------------------------------------------------------------------//

/* btn_nueva_cond.onclick=function(){
  if(nueva_cond.style.display=='none'){
    nueva_cond.style.display='';
    btn_nueva_cond.value='Atrás';
    nombre_condicion.style.display='none';
    nueva_cond.focus();
    nombre_condicion.value='0';
  }
  else{
    nueva_cond.style.display='none';
    btn_nueva_cond.value='Nueva';
    nombre_condicion.style.display='';
    nueva_cond.value='';
  }
}
 */
//------------------------------------------------------------------------------------------//


//----------------------Validar si la persona existe al escribir la cedula--------------------//

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

//----------------------------------Validar información de contacto-----------------------------//

telefono.oninput=function(){
  if (telefono.value.length >12) telefono.value =telefono.value.slice(0, 12);
}

telefono.onkeyup=function(){valid_element("Debe ingresar el número de teléfono de la persona",telefono,document.getElementById("valid_21"));}
whatsapp.onchange=function(){valid_element("Seleccione una opción",whatsapp,document.getElementById("valid_22"));}
direccion.onchange=function(){valid_element("Debe ingresar la dirección de habitacion de la persona", direccion,document.getElementById("valid_23"));}

/* fecha_seniat.onchange=function(){valid_element("Debe ingresarla fecha ",fecha_seniat,document.getElementById("valid_28"));} */



function valid_info_contacto(){

	var validar=false;

if(valid_element("Debe ingresar el número de teléfono de la persona",telefono,document.getElementById("valid_21"))){
  if(valid_element("Seleccione una opción",whatsapp,document.getElementById("valid_22"))){
  if(valid_element("Debe ingresar la dirección de habitacion de la persona",direccion,document.getElementById("valid_23"))){
    /*  if(valid_element("Debe ecribir la fecha de ingreso al SENIAT",fecha_seniat,document.getElementById("valid_28"))){ */

      validar=true;

  }	} } 

  return validar;

}


//----------------------------------Validar información politica-----------------------------//
/*
org_politica.onchange=function(){
  document.getElementById('valid_23').style.display='none';
}


nombre_organizacion.onkeyup=function(){
 if(nombre_organizacion.value!=""){
   document.getElementById('valid_23').style.display="";
 }
}


function valid_info_politica(){

	var validar=false;

 if(valid_element("Indique si la persona pertenece a una organización política",org_politica,document.getElementById('valid_23'))){
   if(valid_org_politica()){        


    validar=true;

  }	 }

  document.getElementById('valid_24').style.display=document.getElementById('valid_25').style.display='none';
  return validar;

}
*/
//----------------------------------Validar org politica-----------------------------//
/*
nombre_organizacion.maxLength=15;

nombre_organizacion.onkeyup=function(){
 if(nombre_organizacion.vlaue!=''){
  document.getElementById('valid_23').style.display="none";
  document.getElementById('valid_23').innerHTML='Indique si la persona pertenece a una organización política';
  nombre_organizacion.style.borderColor="";
}
}


function valid_org_politica(){


	var validar=false;

	if(nombre_organizacion.style.display=="" && nombre_organizacion.value==""){

    document.getElementById('valid_23').innerHTML='Debe ingresar el nombre de la organización';
    document.getElementById('valid_23').style.display="";

    nombre_organizacion.focus();
    nombre_organizacion.style.borderColor="red";

  }
  else{
   validar=true;
   nombre_organizacion.style.borderColor="";
   nombre_organizacion.blur();
 }


 return validar;

}


//_---------------------------------------------------------------------------------------------//

btn_nueva_org.onclick=function(){
 if(nombre_organizacion.style.display=='none'){
  btn_nueva_org.value="Atrás";
  nombre_organizacion.style.display="";
  nombre_organizacion.focus();
  organizacion_politica.style.display="none";
  organizacion_politica.value="0";
} 
else{
  btn_nueva_org.value="Nueva organización";
  nombre_organizacion.style.display="none";
  nombre_organizacion.value="";
  organizacion_politica.style.display="";
}
}
*/

//----------------------------persona_existe--------------------------------------------------//

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

// var retornar=false;

// switch (persona_existente){
//   case "no existe": 
//   retornar=true;
//   break;
//   case "existe":
//   swal({
//        type:"error",
//        title:"Error",
//        text:"Esta persona ya se encuentra registrada en el sistema",
//        showConfirmButton:false,
//        timer:2000
//      });

//       setTimeout(function(){cedula.style.borderColor="red";cedula.focus();},2000);
//   break;
//   case "inactivo":
//        swal({
//       type:"warning",
//       title:"Atención",
//       text:"Este usuario se encuentra inactivo, ¿desea activarlo nuevamente?",
//       showCancelButton:true,
//       confirmButtonText:"Sí, activar",
//       cancelButtonText:"No"
//     },function(isConfirm){
//      if(isConfirm){
//       $.ajax({
//         type:"POST",
//         url:BASE_URL+"Seguridad/cambio_estado",
//         data:{"cedula_persona":cedula.value,"estado":1}
//       }).done(function(result){
//         if(result){

//           swal({
//             type:"success",
//             title:"Éxito",
//             text:"Se ha reactivado la persona satisfactoriamente",
//             showConfirmButton:false,
//             timer:2000
//           });

//           setTimeout(function(){location.href=BASE_URL+"Seguridad/cambio_estado"},2000);
//         }
//       });
//     }
//   })
//   break;
// }



}





//--------------------------------validar tipo de trasnporte--------------------------------------//

function valid_tipo_transporte(){
 var validar=false;

 if(transporte.value==0){
  validar=true;
}
else{
  if(tipo_transporte.value==""){
   swal({
     type:"error",  
     title:"Error",
     text:"Debe especificar qué tipo de transporte privado emplea la persona",
     showConfirmButton:false,
     timer:2000
   });

 }
 else{
   validar=true;
 }
}

return validar;

}

//--------------------------------validar comunidad indigena--------------------------------------//
/*
function valid_comunidad_indigena(){
 var validar=false;

 if(comunidad_indigena.value==0){
  validar=true;
}
else{
  if(nombre_comunidad.value==""){
   swal({
     type:"error",
     title:"Error",
     text:"Debe especificar el nombre de la comunidad indígena",
     showConfirmButton:false,
     timer:2000
   });

 }
 else{
   validar=true;
 }
}

return validar;

}
*/
//------------------------------------------------------------------------------------------------//

confirmar.onkeyup=function(){
  valid_element("Debe confirmar la contraseña",confirmar,valid_confirmar);
}

contrasenia.onkeyup=function(){
  valid_element("Debe ingresar la contraseña del usuario",contrasenia,valid_contrasenia);
}

if(seguridad['registrar']=='1'){
  ver_rol.style.display='';
}
else{
  ver_rol.style.display='none';
}

rol.onchange=function(){
  valid_element("Seleccione el rol del usuario",rol,document.getElementById("valid_rol"));
}

function valid_info_usuario(){
  var validar=false;
  if(valid_element("Debe ingresar la contraseña del usuario",contrasenia,valid_contrasenia)){
    if(valid_element("Debe confirmar la contraseña",confirmar,valid_confirmar)){
      if(confirmar.value!=contrasenia.value){
        valid_contrasenia.innerHTML="Las contraseñas no coinciden";
        valid_contrasenia.style.display="";
        contrasenia.focus();
      }
      else{
        valid_contrasenia.style.display=="none";
        contrasenia.blur();

        if(valid_element("Indique el color favorito",color,valid_color)){
          if(valid_element("Indique el animal favorito",animal,valid_animal)){
            if(valid_element("Indique el nombre de la mascota",mascota,valid_mascota)){

              if(seguridad['registrar']=='1'){
                if(valid_element("Seleccione el rol del usuario",rol,document.getElementById("valid_rol"))){
                  validar=true;
                }
              }
              else{
                validar=true;
              }

            } } } } } }

            return validar;

          }
//-------------------------------- Control de índice-------------------------------------------//

function control_indice(){

 /*  alert(index); */

	switch(index){


    case 0:
    btn_anterior.style.display='none';
  
    
    tab_info_personal.className='nav-link active';
    div_info_personal.style.display="block";
   //  cedula.focus();

   tab_doc_personales.className='';
   div_doc_personales.style.display="none";

   tab_info_contacto.className='';
   div_info_contacto.style.display="none";

   tab_info_politica.className='';
   div_info_politica.style.display="none"; 

   //tab_info_laboral.className="";
   //div_info_laboral.style.display="none";

   //tab_info_usuario.className="";
   //div_info_usuario.style.display="none";
   break;

   case 1:
   btn_anterior.style.display='block';  
   btn_siguiente.style.display='block';

   tab_doc_personales.className='nav-link active';
   div_doc_personales.style.display="block";
  //serial_patria.focus();

  tab_info_personal.className='';
  div_info_personal.style.display="none";

  tab_info_contacto.className='';
  div_info_contacto.style.display="none";

  tab_info_politica.className='';
  div_info_politica.style.display="none";

  //tab_info_laboral.className="";
  //div_info_laboral.style.display="none";

  //tab_info_usuario.className="";
  //div_info_usuario.style.display="none";

  break;

  case 2:

  tab_info_contacto.className="nav-link active";
  div_info_contacto.style.display="block";

  tab_doc_personales.className='';
  div_doc_personales.style.display="none";

  tab_info_personal.className='';
  div_info_personal.style.display="none";

  
  tab_info_politica.className='';
  div_info_politica.style.display="none";

  //tab_info_laboral.className="";
  //div_info_laboral.style.display="none";

  //tab_info_usuario.className="";
  //div_info_usuario.style.display="none";

  break;


  case 3:

  btn_siguiente.style.display='none';
  botones_finales.style.display="block";

  tab_info_politica.className="nav-link active";
  div_info_politica.style.display="block";

  tab_info_contacto.className='';
  div_info_contacto.style.display="none";

  tab_doc_personales.className='';
  div_doc_personales.style.display="none";


  tab_info_personal.className='';
  div_info_personal.style.display="none";   

 //tab_info_laboral.className="";
  //div_info_laboral.style.display="none";

  //tab_info_usuario.className="";
  //div_info_usuario.style.display="none";


  break;

/*
  case 4:

  //tab_info_laboral.className="nav-link active";
  //div_info_laboral.style.display="block";


 tab_doc_personales.className='';
div_doc_personales.style.display="none";

  tab_info_personal.className='';
  div_info_personal.style.display="none";

  tab_info_contacto.className="";
  div_info_contacto.style.display="none";

 tab_info_politica.className="";
  div_info_politica.style.display="none";

  botones_finales.style.display="none";
  btn_siguiente.style.display='block';

  //tab_info_usuario.className="";
  //div_info_usuario.style.display="none";

  break;
  */

}
}



//-----------------------------------------------------------------------------------------//
/*
serial_patria.maxLength=10;
codigo_patria.maxLength=10;
serial_psuv.maxLength=10;
codigo_psuv.maxLength=11;
serial_discapacidad.maxLength=10;
codigo_discapacidad.maxLength=10;

var existe_serial_patria=false;
var existe_codigo_patria=false;
var existe_serial_psuv=false;
var existe_codigo_psuv=false;
var existe_serial_discapacidad=false;
var existe_codigo_discapacidad=false;

serial_patria.oninput=function(){serial_patria.value=serial_patria.value.toUpperCase();}
codigo_patria.oninput=function(){codigo_patria.value=codigo_patria.value.toUpperCase();}
serial_psuv.oninput=function(){serial_psuv.value=serial_psuv.value.toUpperCase();}
codigo_psuv.oninput=function(){codigo_psuv.value=codigo_psuv.value.toUpperCase();}
serial_discapacidad.oninput=function(){serial_discapacidad.value=serial_discapacidad.value.toUpperCase();}
codigo_discapacidad.oninput=function(){codigo_discapacidad.value=codigo_discapacidad.value.toUpperCase();}

serial_patria.onkeyup=function(){
  if(serial_patria.value!=""){
    serial_patria.style.borderColor="";
    document.getElementById("valid_serial_patria").innerHTML='';

    $.ajax({
      type:"POST",
      url:BASE_URL+"Personas/get_serial_carnet",
      data:{"serial_carnet":serial_patria.value,"tipo_carnet":1}
    }).done(function(result){
      if(result!=0){
        existe_serial_patria=true;
      }
      else{
        existe_serial_patria=false; 
      }
    });

  }

codigo_patria.onkeyup=function(){
  if(codigo_patria.value!=""){
    codigo_patria.style.borderColor="";
    document.getElementById("valid_codigo_patria").innerHTML='';

    $.ajax({
      type:"POST",
      url:BASE_URL+"Personas/get_codigo_carnet",
      data:{"codigo_carnet":codigo_patria.value,"tipo_carnet":1}
    }).done(function(result){
      if(result!=0){
        existe_codigo_patria=true;
      }
      else{
        existe_codigo_patria=false; 
      }
    });

  }
}


serial_psuv.onkeyup=function(){
  if(serial_psuv.value!=""){
    serial_psuv.style.borderColor="";
    document.getElementById("valid_serial_psuv").innerHTML='';

    $.ajax({
      type:"POST",
      url:BASE_URL+"Personas/get_serial_carnet",
      data:{"serial_carnet":serial_psuv.value,"tipo_carnet":2}
    }).done(function(result){
      if(result!=0){
        existe_serial_psuv=true;
      }
      else{
        existe_serial_psuv=false; 
      }
    });

  }
}


codigo_psuv.onkeyup=function(){
  if(codigo_psuv.value!=""){
    codigo_psuv.style.borderColor="";
    document.getElementById("valid_codigo_psuv").innerHTML='';

    $.ajax({
      type:"POST",
      url:BASE_URL+"Personas/get_codigo_carnet",
      data:{"codigo_carnet":codigo_psuv.value,"tipo_carnet":2}
    }).done(function(result){
      if(result!=0){
        existe_codigo_psuv=true;
      }
      else{
        existe_codigo_psuv=false; 
      }
    });

  }
}


serial_discapacidad.onkeyup=function(){
  if(serial_discapacidad.value!=""){
    serial_discapacidad.style.borderColor="";
    document.getElementById("valid_serial_discapacidad").innerHTML='';

    $.ajax({
      type:"POST",
      url:BASE_URL+"Personas/get_serial_carnet",
      data:{"serial_carnet":serial_discapacidad.value,"tipo_carnet":3}
    }).done(function(result){
      if(result!=0){
        existe_serial_discapacidad=true;
      }
      else{
        existe_serial_discapacidad=false; 
      }
    });

  }
}


codigo_discapacidad.onkeyup=function(){
  if(codigo_discapacidad.value!=""){
    codigo_discapacidad.style.borderColor="";
    document.getElementById("valid_codigo_discapacidad").innerHTML='';

    $.ajax({
      type:"POST",
      url:BASE_URL+"Personas/get_codigo_carnet",
      data:{"codigo_carnet":codigo_discapacidad.value,"tipo_carnet":3}
    }).done(function(result){
      if(result!=0){
        existe_codigo_discapacidad=true;
      }
      else{
        existe_codigo_discapacidad=false; 
      }
    });

  }
}




function valid_info_carnets(){
  var validar=true;
  console.log(existe_codigo_patria);

  if(serial_patria.value!="" && codigo_patria.value=="" ){
   codigo_patria.focus();
   codigo_patria.style.borderColor="red";
   document.getElementById("valid_codigo_patria").innerHTML='Ingrese el código';
   validar=false;
 }


 if(codigo_patria.value!="" && serial_patria.value=="" ){
  serial_patria.focus();
  serial_patria.style.borderColor="red";
  document.getElementById("valid_serial_patria").innerHTML='Ingrese el serial';
  validar=false;
}


if(serial_psuv.value!="" && codigo_psuv.value=="" ){
  codigo_psuv.focus();
  codigo_psuv.style.borderColor="red";
  document.getElementById("valid_codigo_psuv").innerHTML='Ingrese el código';
  validar=false;
}


if(codigo_psuv.value!="" && serial_psuv.value=="" ){
  serial_psuv.focus();
  serial_psuv.style.borderColor="red";
  document.getElementById("valid_serial_psuv").innerHTML='Ingrese el serial';
  validar=false;
}


if(serial_discapacidad.value!="" && codigo_discapacidad.value=="" ){
  codigo_discapacidad.focus();
  codigo_discapacidad.style.borderColor="red";
  document.getElementById("valid_codigo_discapacidad").innerHTML='Ingrese el codigo';
  validar=false;
}


if(codigo_discapacidad.value!="" && serial_discapacidad.value=="" ){
  serial_discapacidad.focus();
  serial_discapacidad.style.borderColor="red";
  document.getElementById("valid_serial_discapacidad").innerHTML='Ingrese el serial';
  validar=false;
}


if(existe_serial_patria){
  validar=false;
  serial_patria.focus();
  serial_patria.style.borderColor="red";
  document.getElementById("valid_serial_patria").innerHTML='Este serial de patria ya ha sido registrado';
}

if(existe_codigo_patria){
  validar=false;
  codigo_patria.focus();
  codigo_patria.style.borderColor="red";
  document.getElementById("valid_codigo_patria").innerHTML='Este código de patria ya ha sido registrado';
}

if(existe_serial_psuv){
  validar=false;
  serial_psuv.focus();
  serial_psuv.style.borderColor="red";
  document.getElementById("valid_serial_psuv").innerHTML='Este serial de psuv ya ha sido registrado';
}

if(existe_codigo_psuv){
  validar=false;
  codigo_psuv.focus();
  codigo_psuv.style.borderColor="red";
  document.getElementById("valid_codigo_psuv").innerHTML='Este código de psuv ya ha sido registrado';
}

if(existe_serial_discapacidad){
  validar=false;
  serial_discapacidad.focus();
  serial_discapacidad.style.borderColor="red";
  document.getElementById("valid_serial_discapacidad").innerHTML='Este serial de discapacidad ya ha sido registrado';
}

if(existe_codigo_discapacidad){
  validar=false;
  codigo_discapacidad.focus();
  codigo_discapacidad.style.borderColor="red";
  document.getElementById("valid_codigo_discapacidad").innerHTML='Este código de codigo_discapacidad ya ha sido registrado';
}


return validar;


}
*/

//---------------------- funcion siguiente -----------------------------------------------------//

function funcion_siguiente(){

 switch(index){

   case 0:
   if(valid_info_personal()){
     index++;
   }
   break;

/*
   case 1:
   if(valid_info_carnets()){
     index++;
   }

   break;
*/

   case 1:
   if(valid_info_contacto()){
    index++;
  }
  break;

/*
  case 3:
  if(valid_info_politica()){
    index++;
  }
  break;
*/
  case 2:
  if(valid_info_laboral()){
    index++;
  }
  break;


  case 3:
  if(valid_info_usuario()){
    enviar_informacion();
  }
  break;
}

control_indice();

}


function enviar_informacion(){

  datos_persona['cedula_persona']=cedula.value;
  datos_persona['primer_nombre']=primer_nombre.value;
  datos_persona['segundo_nombre']=segundo_nombre.value;
  datos_persona['primer_apellido']=primer_apellido.value;
  datos_persona['segundo_apellido']=segundo_apellido.value;
  datos_persona['fecha_nacimiento']=fecha_nacimiento.value;
  datos_persona['estado_civil']=estado_civil.value;
  datos_persona['genero']=genero.value;
  //datos_persona['sexualidad']=sexualidad.value;
  datos_persona['nacionalidad']=nacionalidad.value;
  datos_persona['nivel_educativo']=nivel_educativo.value;
  //datos_persona['jefe_familia']=jefe_familia.value;
  //datos_persona['propietario_vivienda']=propietario_vivienda.value;
  //datos_persona['jefe_calle']=jefe_calle.value;
  //datos_persona['comunidad_indigena']=comunidad_indigena.value;
  datos_persona['direccion']=direccion.value; 
  datos_persona['telefono']=telefono.value;
  datos_persona['telf_casa']=telf_casa.value;
  datos_persona['whatsapp']=whatsapp.value;
  datos_persona['fecha_seniat']=fecha_seniat.value;
  datos_persona['fecha_publica']=fecha_publica.value;
  datos_persona['fecha_notificacion']=fecha_notificacion.value;
  datos_persona['ult_designacion']=ult_designacion.value;
  datos_persona['prima']=prima.value;
  datos_persona['declaracion_j']=declaracion_j.value;
  datos_persona['inscripcion_ivss']=inscripcion_ivss.value;
  datos_persona['fideicomiso']=fideicomiso.value;
  datos_persona['id_ubicacion']=id_ubicacion.value;
  datos_persona['id_nomina']=nomina.value;
  datos_persona['id_estado_fun']=id_estado_fun.value;
  datos_persona['cargo_nominal']=cargo_nominal.value;
  datos_persona['id_estado']=id_estado.value;
  correo.value==""?datos_persona['correo']="No posee" : datos_persona['correo']=correo.value+tipo_correo.value;
  correo_institucional.value==""?datos_persona['correo_institucional']="No posee" : datos_persona['correo_institucional']=correo_institucional.value+tipo_correo_inst.value;
  datos_persona['contrasenia']=contrasenia.value;
  datos_persona['preguntas_seguridad']=color.value.toLowerCase()+animal.value.toLowerCase()+mascota.value.toLowerCase();
  seguridad['registrar']=='1'?datos_persona['rol_inicio']=rol.value:datos_persona['rol_inicio']='Habitante';
/*
  if(codigo_patria.value!='' && serial_patria.value!=''){
    var carnet_de_patria=new Object();
    carnet_de_patria['serial']=serial_patria.value;
    carnet_de_patria['codigo']=codigo_patria.value;
    datos_persona['carnet_patria']=carnet_de_patria;
  }
  else{
    datos_persona['carnet_patria']='';
  }
*/
/*
  if(codigo_psuv.value!='' && serial_psuv.value!=''){
    var carnet_de_psuv=new Object();
    carnet_de_psuv['serial']=serial_psuv.value;
    carnet_de_psuv['codigo']=codigo_psuv.value;
    datos_persona['carnet_psuv']=carnet_de_psuv;
  }
  else{
    datos_persona['carnet_psuv']='';
  }


  if(codigo_discapacidad.value!='' && serial_discapacidad.value!=''){
    var carnet_de_discapacidad=new Object();
    carnet_de_discapacidad['serial']=serial_discapacidad.value;
    carnet_de_discapacidad['codigo']=codigo_discapacidad.value;
    datos_persona['carnet_discapacidad']=carnet_de_discapacidad;
  }
  else{
    datos_persona['carnet_discapacidad']='';
  }
  
*/
  $.ajax({
    type:"POST",
    url:BASE_URL+"Personas/registrar_persona",
    data:{"datos":datos_persona}
  }).done(function(result){
    console.log(result);

    if(result==1){

      if(transporte.value!="0"){
       registrar_transporte();
     }

     /* registrar_ocupacion(); */
     


     //registrar_condicion_laboral();

      if(egresado.length!=0){
        registrar_egresado();
    }
      


   /*   if(proyectos_persona.length!=0){
      registrar_titulos_persona();
    }
 */
    


     //if(comunidad_indigena.value!="0"){
     // registrar_comunidad_indigena();
   // }


    //registrar_org_politica();
/*

    if(bonos_persona.length!=0){
      registrar_bonos_persona();
    }

    if(misiones_persona.length!=0){
      registrar_misiones_persona();
    }

    if(proyectos_persona.length!=0){
      registrar_titulos_persona();
    }


    registrar_carnets(datos_persona['carnet_patria'],1);
    registrar_carnets(datos_persona['carnet_psuv'],2);
    registrar_carnets(datos_persona['carnet_discapacidad'],3);

*/

if(ubicaciones_persona.length!=0){
  registrar_areas_persona();
}

if(proyectos_persona.length!=0){
  registrar_titulos_persona();
}
    swal({
     title:"Éxito",
     text:"La persona ha sido registrada exitosamente",
     type:"success",
     timer:2000,
     showConfirmButton:false
   });

    setTimeout(function(){location.href=BASE_URL+"Personas/Consultas";},1000);
  }
})

}







function registrar_carnets(carnet,tipo){

  if(carnet!=' '){
    $.ajax({
      type:"POST",
      url:BASE_URL+"Personas/registrar_carnet",
      data:{"tipo":tipo,"carnet":carnet,"cedula":cedula.value}
    }).done(function(result){
      console.log(result);
    });
  }

}

/*  function registrar_ubicacion(){

  $.ajax({
      type:"POST",
      url:BASE_URL+"Personas/Consultas",
      data:{"id_ubicacion": id_ubicacion}
    }).done(function(result)
{
console.log(result);
})
} */

function registrar_bonos_persona(){

 for(var i=0;i<bonos_persona.length;i++){

   var datos=new Object();
   datos['bono']=bonos_persona[i];
   datos['cedula_persona']=cedula.value;


   $.ajax({
    type:"POST",
    url:BASE_URL+"Personas/registrar_bonos",
    data:{"datos":datos}
  }).done(function(result){
    console.log(result);
  })
}


}


function registrar_titulos_persona(){
  var datos_proyectos = [];
 for(var i=0;i<proyectos_persona.length;i++){
   var datos=new Object();
   datos['id_titulo']=proyectos_persona[i];
   datos['descripcion']=proyectos_persona_descripcion[i];
   datos['cedula_persona']=cedula.value;
   datos_proyectos.push(datos);
  }
   $.ajax({
    type:"POST",
    url:BASE_URL+"Personas/registrar_proyecto",
    data:{"datos":datos_proyectos}
  }).done(function(result){
    alert(result);
    console.log(result);
  })
}


function registrar_areas_persona(){
  var datos_ubicacion = [];
 for(var i=0;i<ubicaciones_persona.length;i++){
   var datos=new Object();
   datos['id_area']=ubicaciones_persona[i];
   datos['cedula_persona']=cedula.value;
   datos_ubicacion.push(datos); 
   alert(datos_ubicacion)
  }
  $.ajax({
    type:"POST",
    url:BASE_URL+"Personas/registrar_ubicacion",
    data:{"datos":datos_ubicacion}
  }).done(function(result){
    alert(result);
     console.log(result); 
   }) 
}


function registrar_egresado(){
/*   var datos_egreso= [];
  var datos=new Object();
    datos['cedula_persona']=cedula.value;
    datos['id_egresado']=egresado_nomina.value;
    datos_egreso.push(datos);
    alert(datos_egreso); */
    $.ajax({
     type:"POST",
     url:BASE_URL+"Personas/registrar_egresado_persona",
     data:{"cedula":cedula.value,"id_egresado":egresado_nomina.value}
   }).done(function(result){
    alert(result);
     console.log(result);
    
   })
   
  }

  



function registrar_misiones_persona(){

 for(var i=0;i<misiones_persona.length;i++){

   var datos=new Object();
   datos['mision']=misiones_persona[i];
   datos['cedula_persona']=cedula.value;


   $.ajax({
    type:"POST",
    url:BASE_URL+"Personas/registrar_misiones",
    data:{"datos":datos}
  }).done(function(result){
    console.log(result);
  })
}


}


function registrar_transporte(){


 $.ajax({
   type:"POST",
   url:BASE_URL+"Personas/registrar_transporte",
   data:{"cedula_propietario":cedula.value, "tipo_transporte":transporte.value,"descripcion_transporte":tipo_transporte.value}

 });


}




/* if(ocupacion_nueva.style.display=='none'){
  if(valid_element("Debe indicar la ocupación de la persona",ocupacion,document.getElementById("valid_26"))){
    validar=true;
  }
}
else{
  if(valid_element("Debe indicar la ocupación de la persona",ocupacion_nueva,document.getElementById("valid_26"))){
    validar=true;
  }
} */


/* if(validar){
 if(valid_cond_laboral()){

   validar=true;

 }
 else{
  validar=false;
}
} */

/* function registrar_ocupacion(){

  var ocup=new Object();
  var lleno=false;
  if(ocupacion_nueva.style.display=='none' && ocupacion.value!='0'){
    ocup['nueva']='0';
    ocup['ocupacion']=ocupacion.value;
    lleno=true;
  }
  else{
    if(ocupacion_nueva.style.display!='none' && ocupacion_nueva.value!=''){
      ocup['nueva']='1';
      ocup['ocupacion']=ocupacion_nueva.value;
      lleno=true;
    }
  }

  if(lleno){
    $.ajax({
     type:"POST",
     url:BASE_URL+"Personas/registrar_ocupacion",
     data:{"cedula_persona":cedula.value,"ocupacion":ocup}
   });
  }


} */

/* function registrar_cargos_persona(){

  for(var i=0;i<cargos_persona.length;i++){

    var datos=new Object();
    datos['ocupacion']=cargos_persona[i];
    datos['cedula_persona']=cedula.value;

  
    $.ajax({
     type:"POST",
     url:BASE_URL+"Personas/registrar_ocupacion",
     data:{"datos":datos}
   }).done(function(result){
    console.log(result);
  })
  }


} */






/* function registrar_condicion_laboral(){

  var cond_lab=new Object();
  var lleno=false;
  cond_lab['cedula_persona']=cedula.value;
  cond_lab['sector_laboral']=sector_laboral.value;
  sector_laboral.value=="2"?cond_lab['pertenece']=0:cond_lab['pertenece']=tipo_sector_formal.value;
  
  if(nueva_cond.style.display=='none' && nombre_condicion.value!='0'){
   cond_lab['nombre_cond_laboral']=nombre_condicion.value;
   lleno=true;
 }
 else{

  if(nueva_cond.style.display!='none' && nueva_cond.value!=''){
    cond_lab['nombre_cond_laboral']=nueva_cond.value;
    lleno=true;
  }

}

if(lleno){
  $.ajax({
   type:"POST",
   url:BASE_URL+"Personas/registrar_condicion_laboral",
   data:{"datos":cond_lab}
 }).done(function(result){
 });
}


} */
  


/*
function registrar_comunidad_indigena(){

  var datos_indigenas=new Object();
  datos_indigenas['cedula_persona']=cedula.value;
  datos_indigenas['comunidad']=nombre_comunidad.value;

  $.ajax({
   type:"POST",
   url:BASE_URL+"Personas/registrar_comunidad_indigena",
   data:{"datos":datos_indigenas}
 }).done(function(result){
 });

}


function registrar_org_politica(){
  var datos_org=new Object();
  var lleno=false;
  datos_org['cedula_persona']=cedula.value;
  

  if(nombre_organizacion.style.display=='none' && org_politica.value!='0'){
    lleno=true;
    datos_org['organizacion']=org_politica.value;
    datos_org['nuevo']='0';
  }
  else{
    if(nombre_organizacion.style.display!='none' && nombre_organizacion.value!=''){
      lleno=true;
      datos_org['organizacion']=nombre_organizacion.value;
      datos_org['nuevo']='1';

    }
  }


  if(lleno){
    $.ajax({
     type:"POST",
     url:BASE_URL+"Personas/registrar_org_politica",
     data:{"datos":datos_org}
   }).done(function(result){
   });
 }
*/
