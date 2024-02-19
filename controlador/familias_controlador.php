<?php

class Familias extends Controlador
{
    public function __construct() 
    {
        parent::__construct();
     //   $this->Cargar_Modelo("familias");
    }

    public function Cargar_Vistas()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('familia/consultar'); 
    }   


    public function Registros()
    {
        $this->Seguridad_de_Session();
        $viviendas=$this->modelo->Consultar_viviendas();
        $this->vista->viviendas=$viviendas;
        $persona=$this->modelo->Consultar_personas();
        $this->vista->personas=$persona;
        $integrante=$this->modelo->Integrantes_consultas();
        $this->vista->integrantes=$integrante;
        $this->vista->Cargar_Vistas('familia/registrar');
    }


    public function Consultas()
    {
        $this->Seguridad_de_Session();
        #$this->Establecer_Consultas();
         $viviendas=$this->modelo->Consultar_viviendas();
        $this->vista->viviendas=$viviendas;
        $persona=$this->modelo->Consultar_personas();
        $persona_familia=$this->modelo->Consultar_familia();
        $this->vista->personas=$persona_familia;
        $this->vista->Cargar_Vistas('familia/consultar');
    }

    /* public function Consultas()
    {
        $this->Seguridad_de_Session();
        $persona=$this->modelo->Consultar_personas();
        $this->vista->personas=$persona;
        $this->vista->Cargar_Vistas('familia/consultarIntegrante');
    } */



    public function registrar_familia(){
        $datos_familia=$_POST['datos'];

        echo $datos_familia;
        
        $this->modelo->Registrar_Fami($datos_familia); 
        
     /*     if($resultado){
           $id=$this->Ultimo_Ingresado("familia","id_familia");
           foreach ($id as  $i) {
            foreach ($datos_familia['integrantes'] as $inte) {
             $this->modelo->Registrar_persona_familia([
                "cedula_persona"         =>  $inte,
                "id_familia"            =>   $i['MAX(id_familia)']
            ]);
         }
     }
  } */ 

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
       "id_familia"     =>     $pro['id_familia'],
       "cedula_persona"         =>  $datos[$i]['cedula_persona'],
       "nombre_familia"     =>     $datos[$i]['nombre_familia'],
       "descripcion_familia"  =>   $datos[$i]['descripcion_familia'],
       "parentezco"           =>    $datos[$i]['parentezco']
     ]);
  }
}
 }
 echo count($datos);
 }

 public function agregar_integrante_fun(){
  $verificarBD = $this->modelo->existe($_POST['cedula_integrante']);
  $verificarsiexiste = $this->modelo->existeintegrante($_POST['cedula_integrante']);
  if($verificarsiexiste){
    $this->Escribir_JSON(0);
  }else if($verificarBD){
    $this->Escribir_JSON(1);
  }else if(!empty($_POST['parentezco'])){
    $verificarexistepadre = $this->modelo->existepadre($_POST['cedula_responsable']);
    $verificarexistemadre = $this->modelo->existemadre($_POST['cedula_responsable']);
    $verificarexisteconyugue = $this->modelo->existeconyugue($_POST['cedula_responsable']);
    if($_POST['parentezco'] == "Padre" && count($verificarexistepadre)==1){
      $this->Escribir_JSON(2);
    }else{
      if($_POST['parentezco'] == "Madre" && count($verificarexistemadre)==1){
        $this->Escribir_JSON(3);
      }else{
        if($_POST['parentezco'] == "Conyugue" && count($verificarexisteconyugue)==1){
          $this->Escribir_JSON(4);
        }else{
          $integrante=$this->modelo->Integrantes_familia($_POST['cedula_integrante']);
          $this->modelo->Registrar_persona_familia([
           "id_familia"     =>     $integrante[0]['id_familia'],
           "cedula_persona"         =>  $_POST['cedula_responsable'],
           "nombre_familia"     =>     $_POST['nombre_familia'],
           "descripcion_familia"  =>   $_POST['descripcion_familia'],
           "parentezco"           =>    $_POST['parentezco']
         ]);
         $integrante_nuevos = $this->modelo->get_integrantes($_POST['cedula_responsable']);
         $this->Escribir_JSON($integrante_nuevos);
        }
      }
    }
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


public function consultar_info_familia(){
     $familias=$this->modelo->get_familias();
     $retornar=[];
     foreach ($familias as $f) {
        
        $integrantes=$this->modelo->get_integrantes($f['cedula_persona']);
        $integrantes_familia  = "<table class='table table-striped'><thead class='bg-secondary text-white'><tr><td>Cedula</td><td>Nombre y Apellido</td><td>Parentezco</td><td>Camisa</td><td>Pantalon</td><td>Calzado</td></tr></thead><tbody>";
        foreach ($this->modelo->get_integrantes($f['cedula_persona']) as $en) {
                $integrantes_familia .="<tr><td>". $en['cedula_integrante'] ."</td><td>" . $en['primer_nombre']." " .$en['primer_apellido'] ."</td><td>" . $en['parentezco']. "</td><td>" . $en['camisa']. "</td><td>" . $en['pantalon']. "</td><td>" . $en['calzado']. "</td></tr>";
        }
        $integrantes_familia .="</tbody><tfoot class='bg-secondary text-white'><tr><td>Cedula</td><td>Nombre y Apellido</td><td>Parentezco</td><td>Camisa</td><td>Pantalon</td><td>Calzado</td></tr></tfoot></table>";
        $integrantes_familia  ="<div style='overflow-y:scroll;width:100%;height:100px;'>" . $integrantes_familia . "</div>";
         $retornar[]=[
                "familia"           => $f['nombre_familia'],
                "descripcion"          => $f['descripcion_familia'],
                "responsable"         => $f['cedula_persona']." ".$f['primer_nombre_p']." ".$f['primer_apellido_p'],
                "ubicacion"  =>  $f['nombre_ubi'],
                "cargo"  =>  $f['nombre_cargo'],
                "integrantes"          => $integrantes_familia,
                "editar"            => "<button type='button' class='btn' style='background:#EEA000; color:white; font-weight:bold' data-toggle='modal' data-target='#actualizar' onclick='editar(".$f['id_familia_persona'].",".$f['id_familia'].",".$f['cedula_persona'].")'><em class='fa fa-edit'></em></button>",
                "eliminar"          =>"<button class='btn' style='background:#9D2323; color:white; font-weight:bold' onclick='eliminar(`".$f['cedula_persona']."`)' type='button'><em class='fa fa-trash'></em></button>"
          ];
     }
     $this->Escribir_JSON($retornar);
}


public function consultar_info_familia_caja(){
  $familias=$this->modelo->get_familias();
  $retornar=[];
  foreach ($familias as $f) {
    $array_comprobar = [];
     $integrantes=$this->modelo->get_integrantes($f['cedula_persona']);
     $integrantes_familia  = "<table class='table table-striped'><thead class='bg-secondary text-white'><tr><td>Cedula</td><td>Nombre y Apellido</td><td>Parentezco</td><td>Edad</td></tr></thead><tbody>";
     foreach ($this->modelo->get_integrantes($f['cedula_persona']) as $en) {
            if($en['edad'] < 13  && ($en['parentezco']== "Hijo" || $en['parentezco']== "Hija")){
              $integrantes_familia .="<tr><td>". $en['cedula_integrante'] ."</td><td>" . $en['primer_nombre']." " .$en['primer_apellido'] ."</td><td>" . $en['parentezco']. "</td><td>" . $en['edad']. "</td></tr>";
              array_push($array_comprobar,1);
            }else if($en['edad'] >= 13  && ($en['parentezco']== "Hijo" || $en['parentezco']== "Hija")){
              $integrantes_familia .="<tr style='background:#FBBAB8'><td>". $en['cedula_integrante'] ."</td><td>" . $en['primer_nombre']." " .$en['primer_apellido'] ."</td><td>" . $en['parentezco']. "</td><td>" . $en['edad']. "</td></tr>";
              array_push($array_comprobar,0);
            }
     }
     $contador= 0;
     for ($i = 0; $i < count($array_comprobar); $i++) {
     if($array_comprobar[$i]==1){
       $contador++;
     }
    }
     $integrantes_familia .="</tbody><tfoot class='bg-secondary text-white'><tr><td>Cedula</td><td>Nombre y Apellido</td><td>Parentezco</td><td>Edad</td></tr></tfoot></table>";
     $integrantes_familia = "<div style='overflow-y:scroll;width:100%;height:100px;'>" . $integrantes_familia . "</div>";
    if (in_array(1, $array_comprobar)) {
      $retornar[]=[
             "familia"           => $f['nombre_familia'],
             "descripcion"          => $f['descripcion_familia'],
             "responsable"         => $f['cedula_persona']." ".$f['primer_nombre_p']." ".$f['primer_apellido_p'],
             "ubicacion"  =>  $f['nombre_ubi'],
             "cargo"  =>  $f['nombre_cargo'],
             "hijos_menores" => $contador,
             "integrantes"          => $integrantes_familia,
             "editar"            => "<button type='button' class='btn' style='background:#EEA000; color:white; font-weight:bold' data-toggle='modal' data-target='#actualizar' onclick='editar(".$f['id_familia_persona'].",".$f['id_familia'].",".$f['cedula_persona'].")'><em class='fa fa-edit'></em></button>",
             "eliminar"          =>"<button class='btn' style='background:#9D2323; color:white; font-weight:bold' onclick='eliminar(`".$f['cedula_persona']."`)' type='button'><em class='fa fa-trash'></em></button>"
       ];
    }else{
      $integrantes_familia = [];
    }
  }
  $nuevo_elemento = array('cantidad_familias' => count($retornar));

  $this->Escribir_JSON($retornar);
}


public function Consultas_cedulaV2()
{

 $persona=$this->consultar_familias($_POST['cedula_persona']);


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

  if(count($consul)==0){
    
     echo 0;  
   
  }
  else{
    if(count($consul)>0) 
    {
      $persona=$this->Consultar_Columna("familia","cedula_integrante",$_POST['cedula_integrante']);
    
       /* $this->Escribir_JSON($persona);  */
      
  
  }
    else{
      if(count($persona)==0) 
      {
      
        echo 0; 
      
      /*   echo 2; */
     
    }else{

      echo 1; 
     }

   
    }
   } 
    
  } 


  public function Consultas_integrante()
{

  $consul=$this->Consultar_Tabla_divisiones("familia");

  if(count($consul)==0){
    
     echo 0;  
   
  }
  else{
    if(count($consul)>0) 
    {
      $persona=$this->Consultar_Columna("familia","cedula_integrante",$_POST['cedula_integrante']);
    
       $this->Escribir_JSON($persona);  
      
   
   }
    else{
      if(count($persona)==0) 
      {
       
        echo 0; 
      
      /*   echo 2; */
     
    }else{

      echo 1; 
     }

   
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

public function modificar_integrante(){
  $verificarBD = $this->modelo->existe1($_POST['cedula_integrante'],$_POST["id_familia"]);

  if($verificarBD){
    $this->Escribir_JSON(1);
  }else if(!empty($_POST['parentezco_integrante'])){
    $verificarexistepadre = $this->modelo->existepadre_edit($_POST['cedula_persona'],$_POST["id_familia"]);
    $verificarexistemadre = $this->modelo->existemadre_edit($_POST['cedula_persona'],$_POST["id_familia"]);
    $verificarexisteconyugue = $this->modelo->existeconyugue_edit($_POST['cedula_persona'],$_POST["id_familia"]);
    if($_POST['parentezco_integrante'] == "Padre" && count($verificarexistepadre)==1){
      echo json_encode(2);
    }else{
      if($_POST['parentezco_integrante'] == "Madre" && count($verificarexistemadre)==1){
        echo json_encode(3);
      }else{
        if($_POST['parentezco_integrante'] == "Conyuge" && count($verificarexisteconyugue)==1){
          echo json_encode(4);
        }else{
          $editado=$this->modelo->Actualizar_Familia_integrante($_POST["id"],$_POST["parentezco_integrante"]);
          $editado2=$this->modelo->Actualizar_tabla_familia($_POST["id_familia"],$_POST["cedula_integrante"],$_POST["nombre_integrante"],$_POST["segundo_nombre_integrante"],$_POST["apellido_integrante"],$_POST["segundo_apellido_integrante"],$_POST["genero"],$_POST["fecha_nacimiento"],$_POST["nivel_educativo"],$_POST["Correo"],$_POST["Telefono"],$_POST["Camisa"],$_POST["Pantalon"],$_POST["Calzado"]);
          $retornar = $this->modelo->get_integrantes($_POST['cedula_persona']);
          if($editado==1 && $editado2 ==1){
            echo json_encode($retornar);
          }  
        }
      }
    }
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

public function eliminar_de_familias(){
  echo $this->eliminar_familia_F($_POST['id']);
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

  public function eliminar_integrantes(){
  $retornar=0;
  $integrantes=$this->Consultar_Columna("familia_personas","cedula_persona",$_POST['cedula_persona']);

  if(count($integrantes)!=1){
    $this->Eliminar_Tablas("familia_personas","id_familia_persona",$_POST['id_familia_persona']);
    $retornar = $this->modelo->get_integrantes($_POST['cedula_persona']);
  }
  echo json_encode($retornar);
}

  public function actualizar_familia(){
    $datos_familia=$_POST['datos'];
    $resultado= $this->modelo->Actualizar_Familia($datos_familia);
    echo $data['responsable_familia'];
  }
}
?> 