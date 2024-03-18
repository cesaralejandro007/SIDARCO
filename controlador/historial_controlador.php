<?php
class Historial extends Controlador
{
    public function __construct() 
    {
        parent::__construct();
     //   $this->Cargar_Modelo("familias");
    }

    public function Cargar_Vistas()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('historial/consultar'); 
    }   


    public function Registros()
    {
        $this->Seguridad_de_Session();
        $persona=$this->modelo->Consultar_personas();
        $this->vista->personas=$persona;
        $integrante=$this->modelo->Integrantes_consultas();
        $this->vista->integrantes=$integrante;
        $habit_psicol=$this->Consultar_ant("habit_psicologicos");
        $this->vista->habit_psicols=$habit_psicol;
        $ant_personal=$this->Consultar_ant("ant_personales");
        $this->vista->ant_personals=$ant_personal;
        $ant_familiar=$this->Consultar_ant("ant_familiares");
        $this->vista->ant_familiares=$ant_familiar;
        $this->vista->Cargar_Vistas('historial/registrar');
    }


    public function Consultas()
    {
        $this->Seguridad_de_Session();
        #$this->Establecer_Consultas();
        $persona=$this->modelo->Consultar_personas();
        $this->vista->personas=$persona;
        $persona_familia=$this->modelo->Consultar_familia(); 
        $this->vista->personas=$persona_familia;
        $habit_psicol=$this->Consultar_ant("habit_psicologicos");
        $this->vista->habit_psicols=$habit_psicol;
        $ant_personal=$this->Consultar_ant("ant_personales");
        $this->vista->ant_personals=$ant_personal;
        $ant_familiar=$this->Consultar_ant("ant_familiares");
        $this->vista->ant_familiares=$ant_familiar;
        $this->vista->Cargar_Vistas('historial/consultar');
    }
    

    /* public function Consultas()
    {
        $this->Seguridad_de_Session();
        $persona=$this->modelo->Consultar_personas();
        $this->vista->personas=$persona;
        $this->vista->Cargar_Vistas('familia/consultarIntegrante');
    } */



    public function registrar_historial(){
      
        $datos_historial=$_POST['datos'];

        echo $datos_historial;
        
        $this->modelo->Registrar_historial($datos_historial); 
        

}  

//----------------------Registro de la tabla puente ANT_PER_PERSONAS----------------

//CREAMOS EL MÉTODO
public function registro_ant_personal(){
  // Debemos consultar la tabla para validar que ese ID existan (es una validación)
  $consulta_ant = $this->modelo->consulta_ant_personal();
  $datos = $_POST['datos'];
  
  // Como es una tabla puente, debemos realizar la validación y el recorrido cuantas veces se envíen los datos por el AJAX
  // Leemos el for del lado izquierdo, $i menor que count($datos), $i++
  for($i = 0; $i < count($datos); $i++){
      foreach($consulta_ant as $consulta){
          // Le colocamos [$i] porque debemos recorrer todos los id_ant_personal que pasen por el for, es un array bidimensional
          if($consulta['id_ant_personal'] == $datos[$i]['id_ant_personal']){
              $this->modelo->registrar_ant_personal([
                  "id_ant_personal"         => $consulta['id_ant_personal'],
                  "cedula_persona"          => $datos[$i]['cedula_persona'],
                  "descripcion_personales"  => $datos[$i]['descripcion_personales']
              ]);
          }
      }
  }
}

//---------------------Registrar tabla puente ANT_FAM_PERSONALES----------------

 public function registro_ant_familiar(){

  //Debemos consultar la tbla de ant_familiares para poder realizar la valiadcion
  //de la llave foranea-primary
  //this es un puntero de PhP el this se utiloza para cceder a las propiedades y metods
  //de ese objeto de la clase que se instancio
  $consulta_ant_familiar=$this->modelo->consultar_ant_fam();

  $datos_fam=$_POST['datos'];

  for($i=0; $i< count($datos_fam); $i++){
    foreach($consulta_ant_familiar as $consulta_fam){
       if($consulta_fam['id_ant_familiar']==$datos_fam[$i]['id_ant_familiar']){
         $this->modelo->Registrar_ant_fam_personas([
          'id_ant_familiar'       => $consulta_fam['id_ant_familiar'],
          'cedula_persona'        => $datos_fam[$i]['cedula_persona'],
          'descripcion_familiar'  => $datos_fam[$i]['descripcion_familiar']

         ]);

      } 
    }
  }
} 


//---------------------Registrar tabla puente HABIT_PSICO_PSICOLOGICOS


 public function registro_habit_psicologico(){

  $consulta_habit_psico=$this->modelo->consultar_habit_psico();

  $datos=$_POST['datos'];

   for($i=0;$i<count($datos); $i++){
    foreach($consulta_habit_psico as $consulta_habit){
       if($consulta_habit['id_habit_psicologico']==$datos[$i]['id_habit_psicologico']){
          $this->modelo->registrar_habit_personas([
          'descripcion_habit'     =>$datos[$i]['descripcion_habit'],
          'cedula_persona'        =>$datos[$i]['cedula_persona'],
          'id_habit_psicologico'  =>$consulta_habit['id_habit_psicologico']
          ]);
      } 
    }
  } 
} 


//---------------------Registrar en tabla puente---------------


public function registrar_integrante_fun(){
  $integrante=$this->modelo->Integrantes_consultas();
  $datos=$_POST['datos'];

 echo $datos;
/*   foreach ($proyectos as $pro) { */
 /*    if($pro['id_proyecto']==$datos['id_titulos']){ */
  for ($i = 0; $i < count($datos); $i++) {
    foreach ($integrante as $pro) {
        if ($pro['id_familia'] == $datos[$i]['id_familia']) {
      $this->modelo->Registrar_persona_familia([
       "id_familia"           =>$pro['id_familia'],
       "cedula_persona"       =>$datos[$i]['cedula_persona'],
       "nombre_familia"       =>$datos[$i]['nombre_familia'],
       "descripcion_familia"  =>$datos[$i]['descripcion_familia'],
       "parentezco"           =>$datos[$i]['parentezco']
     ]);
  }
}
 }
 echo count($datos);
 }

 public function agregar_antec_personal(){
  $verificarBD = $this->modelo->existe_ante_personal($_POST['id_ant_personal'],$_POST['cedula_persona']);
  if($verificarBD){
    $this->Escribir_JSON(1);
  }else{
          $this->modelo->registrar_ant_personal([
           "id_ant_personal"     =>     $_POST['id_ant_personal'],
           "cedula_persona"         =>  $_POST['cedula_persona'],
           "descripcion_personales"     =>     $_POST['desc_antec_perso']
         ]);
         $nuevo_registro = $this->modelo->get_historial_clinico($_POST['id_historial'],$_POST['cedula_persona']);
         $this->Escribir_JSON($nuevo_registro);
  }
}

public function agregar_antec_familiar(){
  $verificarBD = $this->modelo->existe_ante_familiar($_POST['id_ant_familiar'],$_POST['cedula_persona']);
  if($verificarBD){
    $this->Escribir_JSON(1);
  }else{
          $this->modelo->Registrar_ant_fam_personas([
           "id_ant_familiar"     =>     $_POST['id_ant_familiar'],
           "cedula_persona"         =>  $_POST['cedula_persona'],
           "descripcion_familiar"     =>     $_POST['desc_antec_famy']
         ]);
         $nuevo_registro = $this->modelo->get_historial_clinico($_POST['id_historial'],$_POST['cedula_persona']);
         $this->Escribir_JSON($nuevo_registro);
  }
}


public function agregar_habit_psicologico(){
  $verificarBD = $this->modelo->existe_habito_psic($_POST['id_habit_psicologico'],$_POST['cedula_persona']);
  if($verificarBD){
    $this->Escribir_JSON(1);
  }else{
          $this->modelo->registrar_habit_personas([
           "descripcion_habit"     =>     $_POST['desc_habitos_psicol'],
           "cedula_persona"         =>  $_POST['cedula_persona'],
           "id_habit_psicologico"     =>     $_POST['id_habit_psicologico']
         ]);
         $nuevo_registro = $this->modelo->get_historial_clinico($_POST['id_historial'],$_POST['cedula_persona']);
         $this->Escribir_JSON($nuevo_registro);
  }
}
//----------------------Registrar Integrantes------------------

public function registrar_integrante(){

  $datos_integrante=$_POST['datos'];

  $resultado= $this->modelo->Registrar_Integrante($datos_integrante);
  
  if($resultado){
     $id=$this->Ultimo_Ingresado("familia","id_familia");
     foreach ($id as  $i) {
      foreach ($datos_familia['integrantes'] as $inte) {
       $this->modelo->Registrar_persona_familia([
          "cedula_persona"         =>  $inte,
          "id_familia"            =>   $i['MAX(id_familia)']
      ]);
   }
}
}
echo $resultado;

} 


public function consultar_historial_clinico(){
    $historial=$this->modelo->get_historial();
    $retornar=[];

    foreach ($historial as $h) {
        
        $tabla_antecedentesp  = "<table class='table table-striped'><thead class='bg-secondary text-white'><tr><td>Cedula persona:</td><td>Descripción:</td><td>Nombre personal:</td></tr></thead><tbody>";
        foreach ($this->modelo->get_antecedentesp($h['cedula_persona']) as $en) {
                $tabla_antecedentesp .="<tr><td>". $en['cedula_persona'] ."</td><td>" . $en['descripcion_personales']. "</td><td>" . $en['nombre_personal']. "</td></tr>";
        }
        $tabla_antecedentesp .="</tbody><tfoot class='bg-secondary text-white'><tr><td>Cedula persona:</td><td>Descripción:</td><td>Nombre personal:</td></tr></tfoot></table>";
        $tabla_antecedentesp = "<div style='overflow-y:scroll;width:100%;height:150px;'>" . $tabla_antecedentesp . "</div>";


        $tabla_antecedentesf  = "<table class='table table-striped'><thead class='bg-secondary text-white'><tr><td>Cedula persona:</td><td>Descripción familiar:</td><td>Nombre familiar:</td></tr></thead><tbody>";
        foreach ($this->modelo->get_antecedentesf($h['cedula_persona']) as $en) {
                $tabla_antecedentesf .="<tr><td>". $en['cedula_persona'] ."</td><td>" . $en['descripcion_familiar']. "</td><td>" . $en['nombre_familiar']. "</td></tr>";
        }
        $tabla_antecedentesf .="</tbody><tfoot class='bg-secondary text-white'><tr><td>Cedula persona:</td><td>Descripción familiar:</td><td>Nombre familiar:</td></tr></tfoot></table>";
        $tabla_antecedentesf = "<div style='overflow-y:scroll;width:100%;height:150px;'>" . $tabla_antecedentesf . "</div>";

        $tabla_habitosps  = "<table class='table table-striped'><thead class='bg-secondary text-white'><tr><td>Cedula persona:</td><td>Descripción de habito:</td><td>Nombre de habito:</td></tr></thead><tbody>";
        foreach ($this->modelo->get_habitosps($h['cedula_persona']) as $en) {
                $tabla_habitosps .="<tr><td>". $en['cedula_persona'] ."</td><td>" . $en['descripcion_habit']. "</td><td>" . $en['nombre_habit']. "</td></tr>";
        }
        $tabla_habitosps .="</tbody><tfoot class='bg-secondary text-white'><tr><td>Cedula persona:</td><td>Descripción de habito:</td><td>Nombre de habito:</td></tr></tfoot></table>";
        $tabla_habitosps = "<div style='overflow-y:scroll;width:100%;height:150px;'>" . $tabla_habitosps . "</div>";

         $retornar[]=[
                "cedula"           => $h['cedula_persona'],
                "diagnostico"           => $h['diagnostico'],
                "tratamiento"          => $h['tratamiento'],
                "evolucion"         => $h['evolucion'],
                "fecha"         => $h['fecha_historial'],
                "examen"         => $h['examen'],
                "tipo_sangre"         => $h['tipo_sangre'],
                "peso"         => $h['peso'],
                "altura"         => $h['altura'],
                "talla"         => $h['talla'],
                "imc"         => $h['imc'],
                "fc"         => $h['fc'],
                "fr"         => $h['fr'],
                "ta"         => $h['ta'],
                "temperatura"         => $h['temperatura'],
                "antecedentes_personales"          => $tabla_antecedentesp,
                "antecedentes_familiares"          => $tabla_antecedentesf,
                "habitos_psicologicos"          => $tabla_habitosps,
                "editar"            => "<button type='button' class='btn' style='background:#EEA000; color:white; font-weight:bold' data-toggle='modal' data-target='#actualizar' onclick='editar(".$h['id_historial_clinico'].",`".$h['cedula_persona']."`)'><em class='fa fa-edit'></em></button>",
                "eliminar"          =>"<button class='btn' style='background:#9D2323; color:white; font-weight:bold' onclick='eliminar(".$h['id_historial_clinico'].",`".$h['cedula_persona']."`)' type='button'><em class='fa fa-trash'></em></button>"
          ];
     }

     $this->Escribir_JSON($retornar);
}


public function Consultas_cedulaV2()
{

  $persona=$this->Consultar_Columna("personas","cedula_persona",$_POST['cedula']);

  if(count($persona)==0){
    echo 0;
  }
  else{
     echo 1;
   
  }
}


public function Consultas_cedula_integrante()
{
  $consul=$this->Consultar_Tabla_divisiones("familia");

  /* $persona=$this->Consultar_Columna("familia","cedula_integrante",$_POST['cedula_integrante']); */

  if(count($persona==0)){
    $this->Escribir_JSON($persona);
   /*  echo 0; */
  }
  else{
    if($persona[0]['estado'] == 0){
    echo 2;
   }
   else{
    echo 1;
   } 
  } 

} 

public function Consultar_integrante_personas()
{

 $persona=$this->modelo->Consultar_integrante($_POST['cedula']);

 if(count($persona)==0){
   echo 0;        
 }
 else{
    $this->Escribir_JSON($persona); 
 }

}

public function modificar_antecedente_personal(){
  if($this->modelo->validar_antecedente($_POST["id_antecedente_personales"],$_POST['cedula_persona'],$_POST["id_antec_pers"]) == false){
      $editado=$this->modelo->Actualizar_antecedente_perso($_POST["id_antecedente_personales"],$_POST["id_antec_pers"],$_POST["descripcion_ante_perso"]);
      $registro_editado = $this->modelo->get_historial_clinico($_POST['id_historial'],$_POST['cedula_persona']);
      if($editado==1){
      echo json_encode($registro_editado);
    }  
  }else{
    echo 1;
  }
}

public function modificar_antecedente_familiar(){
  if($this->modelo->validar_antecedente_fami($_POST["id_antecedente_familiares"],$_POST['cedula_persona'],$_POST["id_antec_fami"]) == false){
      $editado=$this->modelo->Actualizar_antecedente_fami($_POST["id_antecedente_familiares"],$_POST["id_antec_fami"],$_POST["descripcion_ante_fami"]);
      $registro_editado = $this->modelo->get_historial_clinico($_POST['id_historial'],$_POST['cedula_persona']);
      if($editado==1){
      echo json_encode($registro_editado);
    }  
  }else{
    echo 1;
  }
}


public function eliminar_antecedente_personal(){
  $retornar=0;
    $eliminado=$this->modelo->eliminar_antecedentes_perso($_POST['id_antec'],$_POST['cedula_persona']);
    $registro_editado = $this->modelo->get_historial_clinico($_POST['id_historial'],$_POST['cedula_persona']);
    if($eliminado==1){
      echo json_encode($registro_editado);
    }
}


public function eliminar_antecedente_familiar(){
  $retornar=0;
    $eliminado=$this->modelo->eliminar_antecedentes_familiar($_POST['id_antec'],$_POST['cedula_persona']);
    $registro_editado = $this->modelo->get_historial_clinico($_POST['id_historial'],$_POST['cedula_persona']);
    if($eliminado==1){
      echo json_encode($registro_editado);
    }
}

public function eliminar_habitos_psicologicos(){
  $retornar=0;
    $eliminado=$this->modelo->eliminar_habitos_psicol($_POST['id_habit'],$_POST['cedula_persona']);
    $registro_editado = $this->modelo->get_historial_clinico($_POST['id_historial'],$_POST['cedula_persona']);
    if($eliminado==1){
      echo json_encode($registro_editado);
    }
}

public function Consultas_cedula_funcionario()
{
 $persona=$this->Consultar_Columna("familia_personas","cedula_persona",$_POST['cedula_persona']);
 if(count($persona)==0){

   echo 0;

 }else{
  echo 1;
 
 }
}

public function consultar_datos_clinicos(){
     

  $historiales=$this->modelo->get_historial_clinico($_POST['id_historial'],$_POST['cedula']);

  $this->Escribir_JSON($historiales);
}

public function consultar_per_ant_perso(){
     

  $historiales=$this->modelo->get_antecedente_personal($_POST['id_antec_personal'],$_POST['cedula']);

  $this->Escribir_JSON($historiales);
}

public function consultar_per_ant_fam(){
     

  $historiales=$this->modelo->get_antecedente_familiar($_POST['id_antec_familiar'],$_POST['cedula']);

  $this->Escribir_JSON($historiales);
}

public function consultar_familia_datos(){
     
     $familias=$this->modelo->get_familias();
     foreach ($familias as $f) {
        if ($f['id_familia'] == $_POST['id_familia']) { 
            $integrantes=$this->modelo->get_integrantes($_POST['cedula_responsable']);
        }
     }
     $this->Escribir_JSON($integrantes);
}

public function consultar_familia_integrante(){
  $integrante_familias=$this->modelo->get_familias_integrante($_POST['id_familia_integrante']);

  $this->Escribir_JSON($integrante_familias);
}

public function eliminar_historial_clinico(){
  echo $this->modelo->eliminar_historial($_POST['id'],$_POST['cedula']);
}

public function eliminar_familia(){
   $integrantes=$this->Consultar_Columna("familia_personas","id_familia",$_POST['id']);

   foreach($integrantes as $i){
       $persona=$this->Consultar_Columna("personas","cedula_persona",$i['cedula_persona']);
       if($persona[0]['estado']==2){
        $this->Eliminar_Tablas("personas","cedula_persona",$persona[0]['cedula_persona']);
       }
   }

    echo $this->Eliminar_Tablas("familia","id_familia",$_POST['id']);
  }

  public function activar_familia(){
    $integrantes=$this->Consultar_Columna("familia_personas","id_familia",$_POST['id_familia']);

    foreach($integrantes as $i){
        $persona=$this->Consultar_Columna("personas","cedula_persona",$i['cedula_persona']);
        if($persona[0]['estado']==2){
         $this->Activar("personas","cedula_persona",$persona[0]['cedula_persona']);
        }
    }
    echo $this->Activar("familia","id_familia",$_POST['id_familia']);
  }



  public function actualizar_familia(){
    $datos_familia=$_POST['datos'];
    $resultado= $this->modelo->Actualizar_Familia($datos_familia);
    echo $data['responsable_familia'];
  }
}
?> 