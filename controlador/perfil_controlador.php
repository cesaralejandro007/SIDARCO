<?php

class perfil extends Controlador 
{
  public function __construct()
  {
    parent::__construct();
   //     $this->Cargar_Modelo("personas");
  }

  public function Cargar_Vistas()
  {
    $this->Seguridad_de_Session();
    $this->vista->Cargar_Vistas('perfil/perfil'); 
  }   

  public function Perfil()
{
  $this->Seguridad_de_Session();
  $this->vista->Cargar_Vistas('perfil/perfil'); 
}  



public function consultar_informacion_persona_nomina(){
    $info_completa=[];
    $personas=$this->modelo->Consultar_nomina($_POST['vnomina']);
    
    foreach ($personas as $p) {
     $ocupacion=json_encode($this->modelo->get_ocupacion_persona($p['cedula_persona']));
     $condicion_lab=json_encode($this->modelo->get_cond_laboral_persona($p['cedula_persona']));
     $transporte=json_encode($this->modelo->get_transporte_persona($p['cedula_persona']));
     $bonos=json_encode($this->modelo->get_bonos_persona($p['cedula_persona']));
     $misiones=json_encode($this->modelo->get_misiones_persona($p['cedula_persona']));
     $divisiones=json_encode($this->modelo->get_divisiones($p['cedula_persona']));
     //$comunidad_i=json_encode($this->modelo->get_comunidad_indigena_persona($p['cedula_persona']));
  /*    $org_politica=json_encode($this->modelo->get_org_politica_persona($p['cedula_persona'])); */
     $persona=json_encode($p);
     $p['genero']=='M'?$genero="Masculino":$genero='Femenino';
     $p['whatsapp']==1?$whatsapp="Si posee":$whatsapp='No posee';
  
     $info_completa[]=[
      "cedula"    =>    $p['cedula_persona'],
      "nombre_nomina"          =>$p['nombre_nomina'],
      "primer_nombre"  =>$p['primer_nombre'],
      "segundo_nombre"          =>$p['segundo_nombre'],
      "primer_apellido" =>$p['primer_apellido'],
      "segundo_apellido"          =>$p['segundo_apellido'],
      "telefono"        =>$p['telefono'],
      "whatsapp"          =>$whatsapp,
      "telf_casa"          =>$p['telf_casa'],
      "correo"          =>$p['correo'],
      "fecha_nacimiento"          =>$p['fecha_nacimientoc'],
      "genero"          =>$genero,
      "nacionalidad"          =>$p['nacionalidad'],
      "estado_civil"          =>$p['estado_civil'],
      "nivel_educativo"          =>$p['nivel_educativo'],
      "nombre_ubi"          =>$p['nombre_ubi'],
      "grado"          =>$p['grado_resguardo'],
      "ing_seniat"          =>$p['ing_seniatc'],
      "ing_publica"          =>$p['ing_publicac'],
      "fecha_notificacion"          =>$p['fecha_notificacionc'],
      "ult_designacion"          =>$p['ult_designacionc'],
      "prima"          =>$p['prima'],
      "declaracion_j"          =>$p['declaracion_j'],
      "inscripcion_ivss"          =>$p['inscripcion_ivss'],
      "fideicomiso"          =>$p['fideicomiso']
    ];
  }
  
  $this->Escribir_JSON($info_completa);
  }

  public function Verificar_password(){
    $contrasena=$this->Codificar($_POST['verificar_password']);
      $v = $this->modelo->consultar_password($contrasena,$_POST['cedula_persona']);
      if($v == 1){
        echo 1;
      }else{
        echo 0;
      }
  }

  public function cambiar_password(){
    $preguntas=$this->Codificar($_POST['preguntas']);
    $contrasena=$this->Codificar($_POST['password']);
      $this->modelo->cambiar_password($contrasena,$preguntas,$_POST['cedula_persona']);
      echo 1;
  }

  
}


