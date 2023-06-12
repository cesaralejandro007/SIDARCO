var integrantes=[];
var parentezco_array2=[];
var valid_vivienda=document.getElementById('valid_1');
var valid_nombre_familia=document.getElementById("valid_2");
var valid_telefono_familia=document.getElementById("valid_3");
var valid_ingreso_familia=document.getElementById("valid_4");
var valid_integrantes=document.getElementById("valid_5");
var vivienda=document.getElementById("vivienda_familia");
var btn_personas_nueva=document.getElementById("nueva_personas");
var cedula_persona=document.getElementById("cedula_persona");
var nombre_familia=document.getElementById("nombre_familia");
var parentezco=document.getElementById("parentezco");



var integrantes_input=document.getElementById("cedula_integrante");
var btn_nuevo_integrante=document.getElementById("btn_nuevo");
var btn_agregar_integrante=document.getElementById("btn_agregar");
var div_integrantes=document.getElementById("integrantes_agregados");
var observaciones=document.getElementById("observaciones_familia");
var btn_limpiar=document.getElementById("limpiar");
var btn_guardar=document.getElementById("guardar");
var condicion_ocupacion_select=document.getElementById("select-cond-ocupacion");
var condicion_ocupacion_input=document.getElementById("input_condicion_ocupacion");
var boton_otro_cond=document.getElementById("nueva_condicion_ocupacion");
var valid_cond_ocupacion=document.getElementById("valid_cond_ocupacion");



//-----------------------------Modal integrantes---------------------------

/* var btn_guardar_integrante=document.getElementById("guardar_integrantes");
var cedula_persona_integrante=document.getElementById("cedula_persona");
var primer_nombre=document.getElementById("primer_nombre");
var segundo_nombre=document.getElementById("segundo_nombre");
var primer_apellido=document.getElementById("primer_apellido");
var segundo_apellido=document.getElementById("segundo_apellido");
var fecha_nacimiento=document.getElementById("fecha_nacimiento");
var genero=document.getElementById("genero");
var parentezco=document.getElementById("parentezco");
var correo=document.getElementById("correo");
var telefono_personal=document.getElementById("telefono_personal"); */
//--------------------------------------------------------------------------
btn_personas_nueva.onclick=function(){

	window.open(BASE_URL+"Personas/Registros/");
}


/* btn_nuevo_integrante.onclick=function(){

	$('#agregar').modal().show();

	/* window.open(modal+"agregar-familiares");
} */

//---------------------------Validacion de boton de integrantes-------------------

/* btn_guardar_integrante.onclick = function() {
    if (cedula_persona_integrante.value == "") {
        swal({
            type: "error",
            title: "Error",
            text: "Debe especificar qué tipo de evento se está creando",
            timer: 2000,
            showConfirmButton: false
        });
        cedula_persona_integrante.focus();
        cedula_persona_integrante.style.borderColor = "red";
    } else{

		guardar_integrantes();

	}

} */

//--------------------------Envio de informaciòn de usuario-------------



btn_guardar.onclick=function(){
	enviar_informacion();
}


  /*   document.onkeypress=function(e){
 if(e.which == 13  || e.keyCode==13 ) {

      enviar_informacion();
          return false;
       
       }
       else{return true;}
} */


function enviar_informacion(){

	if(validar_informacion()){
   var datos_familia=[];
   for(var i=0; i<integrantes.length; i++){
	var datos=new Object();
	datos['id_familia']=integrantes[i];
	datos['cedula_persona']=cedula_persona.value;
	datos['nombre_familia']=nombre_familia.value;
	datos['descripcion_familia']=observaciones.value;
	datos['parentezco']=parentezco_array2[i];
	datos_familia.push(datos);
  
	//alert(datos_familia);

   }
  
  /*  datos_familia['integrantes']=integrantes;
   datos_familia['estado']=1;   */ 


	$.ajax({
         type:"POST",
         url:BASE_URL+"Familias/registrar_integrante_fun",
         data:{"datos":datos_familia}
	}).done(function(result){
           console.log(result);
		   //alert(result);
            
            swal({
            title:"Éxito",
            text:"Familia registrada satisfactoriamente",
            timer:2000,
            showConfirmButton:false,
            type:"success"
            });

            setTimeout(function(){location.href=BASE_URL+"Familias/Consultas";},1000);


	});
}
 }
 
integrantes_input.onkeyup=function(){
	if(integrantes_input.value!=''){
		valid_integrantes.innerHTML='';
	}
}



btn_agregar.onclick=function(){
	if(integrantes_input.value==""){
		integrantes_input.focus();
		valid_integrantes.innerHTML='Debe ingresar la cédula o el nombre de una persona';
	}
	else{
		valid_integrantes.innerHTML="";
        
        if(valid_integrantes_agregados()){
        valid_integrantes.innerHTML="";
		$.ajax({
			type: 'POST',
			url: BASE_URL + 'Familias/Consultar_cedula',
			data:{'cedula_integrante':integrantes_input.value}
		})
		.done(function (datos) {

alert(datos);
			if(datos!=0){

				var parentezco_array="";
				 parentezco_array = parentezco.value;

				var result=JSON.parse(datos);
                integrantes.push(result[0]['id_familia']);
				parentezco_array2.push(parentezco_array);
                integrantes_input.value='';
                var div=document.createElement("div");
                div.style.width='100%';
				var tabla=document.createElement("table");
				tabla.style.width='100%';
				var tr=document.createElement("tr");
				var td1=document.createElement("td");
				var td2=document.createElement("td");
				var td3=document.createElement("td");
				td1.innerHTML=result[0]['primer_nombre']+" "+result[0]['primer_apellido'];
				td1.innerHTML=document.getElementById("cedula_integrante").value;
				td2.innerHTML=document.getElementById("parentezco").value;
				var btn=document.createElement("input");
				btn.type="button";
				btn.className="btn btn-danger";
				btn.value="X";
				td3.style.textAlign="right";
				td3.appendChild(btn);
				tr.appendChild(td1);
				tr.appendChild(td2);
				tr.appendChild(td3);
				tabla.appendChild(tr);
				div.appendChild(tabla);
				var hr=document.createElement("hr");
				div.appendChild(tabla);
				div.appendChild(hr);
				div_integrantes.appendChild(div);
				btn.onclick=function(){
                       div_integrantes.removeChild(div);
                       integrantes.splice(integrantes.indexOf(result[0]['cedula_integrante']),1);
                       console.log(integrantes);
				}
				console.log(integrantes);
			}
			else{
				valid_integrantes.innerHTML="Esta persona no está registrada";
			
			
			
			}
			parentezco.value="0";

		});

}
}

	}



function valid_integrantes_agregados(){
	var validar=true;
	for(var i=0;i<integrantes.length;i++){
		if(integrantes[i]==integrantes_input.value){
			validar=false;
		}
	}

	if(!validar){
        valid_integrantes.innerHTML='Ya esta persona fue agregada';
	}

	return validar;
}



/* vivienda.onchange=function(){
	if(vivienda.value!='vacio'){
		valid_vivienda.innerHTML='';
	}
	else{
		valid_vivienda.innerHTML="Debe seleccionar la vivienda de la familia";
	}
}

condicion_ocupacion_select.onchange=function(){
	if(condicion_ocupacion_select.value!=''){
		valid_cond_ocupacion.innerHTML='';
	}
	else{
		valid_cond_ocupacion.innerHTML="Campo vacío";
	}
}

condicion_ocupacion_input.onkeyup=function(){
	if(condicion_ocupacion_select.value!=''){
		valid_cond_ocupacion.innerHTML='';
	}
	else{
		valid_cond_ocupacion.innerHTML="Campo vacío";
	}
} */


nombre_familia.onkeyup=function(){
	if(nombre_familia.value!=''){
		valid_nombre_familia.innerHTML='';
	}
	else{
		valid_nombre_familia.innerHTML="Debe ingresar el nombre de la familiao";
	}
}

/* telefono_familia.onkeyup=function(){
	if(telefono_familia.value!=''){
		valid_telefono_familia.innerHTML='';
	}
	else{
		valid_telefono_familia.innerHTML="Ingrese el teléfono de la familia";
	}
}

ingreso_aprox.onkeyup=function(){
	if(ingreso_aprox.value!=''){
		valid_ingreso_familia.innerHTML='';
	}
	else{
		valid_ingreso_familia.innerHTML="Ingrese el ingreso mensual aproximado";
	}
} */




	function validar_informacion(){
		var validar=false;

			if(nombre_familia.value==""){
				valid_nombre_familia.innerHTML="Debe ingresar el nombre de la familia";
				nombre_familia.focus();
			}
			else{
              valid_nombre_familia.innerHTML="";


              		if(integrantes.length<2){
              			valid_integrantes.innerHTML="Ingrese al menos 2 integrantes de la familia";
              			integrantes_input.focus();
              		}
              		else{
              			valid_integrantes.innerHTML="";
              			validar=true;
              		}
              	}

              
		
	

		return validar;
	
}
