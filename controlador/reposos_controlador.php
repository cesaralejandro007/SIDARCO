<?php

class Reposos extends Controlador
{
    public function __construct() 
    {
        parent::__construct();
     //   $this->Cargar_Modelo("familias");
    }

    public function Cargar_Vistas()
    {
        $this->Seguridad_de_Session();
        $this->vista->Cargar_Vistas('reposos/consultar'); 
    }   


    public function Registros()
    {
        $this->Seguridad_de_Session();
        $persona=$this->modelo->Consultar_personas();
        $this->vista->personas=$persona;
        $this->vista->Cargar_Vistas('reposos/consultar');
    }


/*     public function Consultas()
    {
        $this->Seguridad_de_Session();
        #$this->Establecer_Consultas();
        $persona=$this->modelo->Consultar_personas();
        $this->vista->Cargar_Vistas('reposos/consultar');
    } */

    /* public function Consultas()
    {
        $this->Seguridad_de_Session();
        $persona=$this->modelo->Consultar_personas();
        $this->vista->personas=$persona;
        $this->vista->Cargar_Vistas('familia/consultarIntegrante');
    } */



    public function registrar_reposos(){
      
        $datos_reposo=$_POST['datos'];

        echo $datos_reposo;
        
        $this->modelo->Registrar_reposos($datos_reposo); 
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




//------------------------Mostrar datos en registrar----------
 

//---------------------Registrar en tabla puente---------------




//----------------------Registrar Integrantes------------------
/* 
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

}  */


/* public function consultar_info_familia(){
     $familias=$this->modelo->get_familias();
     $retornar=[];
     foreach ($familias as $f) {
        
        $integrantes=$this->modelo->get_integrantes($f['cedula_persona']);
        $integrantes_familia  = "<table class='table table-striped'><thead class='bg-secondary text-white'><tr><td>Cedula</td><td>Nombre y Apellido</td><td>Parentezco</td><td>Camisa</td><td>Pantalon</td><td>Calzado</td></tr></thead><tbody>";
        foreach ($this->modelo->get_integrantes($f['cedula_persona']) as $en) {
                $integrantes_familia .="<tr><td>". $en['cedula_integrante'] ."</td><td>" . $en['primer_nombre']." " .$en['primer_apellido'] ."</td><td>" . $en['parentezco']. "</td><td>" . $en['camisa']. "</td><td>" . $en['pantalon']. "</td><td>" . $en['calzado']. "</td></tr>";
        }
        $integrantes_familia .="</tbody><tfoot class='bg-secondary text-white'><tr><td>Cedula</td><td>Nombre y Apellido</td><td>Parentezco</td><td>Camisa</td><td>Pantalon</td><td>Calzado</td></tr></tfoot></table>";
        $integrantes_familia = "<div style='overflow-y:scroll;width:100%;height:100px;'>" . $integrantes_familia . "</div>";
         $retornar[]=[
                "familia"              => $f['nombre_familia'],
                "descripcion"          => $f['descripcion_familia'],
                "responsable"          => $f['cedula_persona']." ".$f['primer_nombre_p']." ".$f['primer_apellido_p'],
                "ubicacion"            =>  $f['nombre_ubi'],
                "cargo"                =>  $f['nombre_cargo'],
                "integrantes"          => $integrantes_familia,
                "editar"               => "<button type='button' class='btn' style='background:#EEA000; color:white; font-weight:bold' data-toggle='modal' data-target='#actualizar' onclick='editar(".$f['id_familia_persona'].",".$f['id_familia'].",".$f['cedula_persona'].")'><em class='fa fa-edit'></em></button>",
                "eliminar"             =>"<button class='btn' style='background:#9D2323; color:white; font-weight:bold' onclick='eliminar(`".$f['cedula_persona']."`)' type='button'><em class='fa fa-trash'></em></button>"
          ];
     }
     $this->Escribir_JSON($retornar);
} */

public function consultar_info_reposos(){
  $reposos=$this->modelo->get_reposos();
  $retornar=[];
  foreach ($reposos as $r) {
  
      $retornar[]=[
        "responsable"          => $r['cedula_persona']." ".$r['primer_nombre_p']." ".$r['primer_apellido_p'],
        "ubicacion"            => $r['nombre_ubi'],
        "cargo"                => $r['nombre_cargo'],
        "fecha_inicio"         => $r['fecha_inicio_f'],
        "fecha_cierre"         => $r['fecha_cierre_f'],
        "motivo"               => $r['motivo'],
        "diagnostico"          => $r['diagnostico'],
        "medico_tratante"      => $r['medico_tratante'],
        "dias_de_reposo"      => $r['dias_de_reposo'],
        "semanas_de_reposo"      => $r['semanas_de_reposo'],
        "editar"               => "<button type='button' class='btn' style='background:#EEA000; color:white; font-weight:bold' data-toggle='modal' data-target='#actualizarreposos' onclick='editarreposos(".$r['id_reposo'].",".$r['id_cedula'].",`".$r['fecha_inicio']."`,`".$r['fecha_cierre']."`,`".$r['motivo']."`,`".$r['diagnostico']."`,`".$r['medico_tratante']."`)'><em class='fa fa-edit'></em></button>",
        "eliminar"             => "<button class='btn' style='background:#9D2323; color:white; font-weight:bold' onclick='eliminar(".$r['id_reposo'].")' type='button'><em class='fa fa-trash'></em></button>"
      ];
  }
  $this->Escribir_JSON($retornar);
}

public function editar_reposos(){
 echo $reposos=$this->modelo->actualizar_reposos($_POST['id'],$_POST['cedula_persona'],$_POST['fecha_inicio'],$_POST['fecha_cierre'],$_POST['motivo'],$_POST['Diagnostico'],$_POST['medico']);
}



/* public function consultar_info_familia_caja(){
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
} */

/* 
public function modificar_integrante(){
  $verificarBD = $this->modelo->existe1($_POST['cedula_integrante'],$_POST["id_familia"]);

  if($verificarBD){
    $this->Escribir_JSON(1);
  }else{ 
          $editado=$this->modelo->Actualizar_Familia_integrante($_POST["id"],$_POST["parentezco_integrante"]);
          $editado2=$this->modelo->Actualizar_tabla_familia($_POST["id_familia"],$_POST["cedula_integrante"],$_POST["nombre_integrante"],$_POST["segundo_nombre_integrante"],$_POST["apellido_integrante"],$_POST["segundo_apellido_integrante"],$_POST["genero"],$_POST["fecha_nacimiento"],$_POST["nivel_educativo"],$_POST["Correo"],$_POST["Telefono"],$_POST["Camisa"],$_POST["Pantalon"],$_POST["Calzado"]);
          $retornar = $this->modelo->get_integrantes($_POST['cedula_persona']);
          if($editado==1 && $editado2 ==1){
            echo json_encode($retornar);
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
} */
/* 
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
} */

public function eliminar_de_reposos(){
  echo $this->modelo->eliminar_reposos($_POST['id']);
}
/* 
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
 */
  public function actualizar_permiso(){
    $datos_permiso=$_POST['datos'];
    $resultado= $this->modelo->Actualizar_permisos($datos_permiso);
    echo $data['responsable_familia'];
  }
}

?> 