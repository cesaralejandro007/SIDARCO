<?php

class Personas extends Controlador 
{

  public function __construct()
  {
    parent::__construct();

   //     $this->Cargar_Modelo("personas");
  }

  public function Cargar_Vistas()
  {
    $this->Seguridad_de_Session();
    $this->vista->Cargar_Vistas('personas/index'); 
  }   

  public function Establecer_Consultas()
  {

    $personas = $this->Consultar_Tabla("personas", 1, "cedula_persona");

    $vacunas =  $this->modelo->Consultar_vacunados();
    $perso_vacuna = $this->modelo->Consultar_Vacuna(); 

    $this->vista->personas = $personas; 
    $this->personas = $personas;

    $this->vista->vacunas = $vacunas; 
    $this->vacunas = $vacunas; 

    $this->vista->perso_vacuna = $perso_vacuna; 
    $this->perso_vacuna = $perso_vacuna; 
  }

  public function Asignar_Vacunas()
  {
    $dosis = ($_POST['dosis'] !== "") ? $_POST['dosis'] : null;
    $fecha = ($_POST['fecha'] !== "") ? $_POST['fecha'] : null;
    $nombre_vacuna =($_POST['nombre_vacuna'] !== "") ? $_POST['nombre_vacuna']: null;

    for ($i = 0; $i < count($fecha); $i++) {
      if ($this->modelo->Registrar_Vacuna(
        [
          'cedula_persona' => $_POST['cedula_persona'],
          'nombre_vacuna'  => $nombre_vacuna[$i], 
          'dosis' => $dosis[$i],
          'fecha_vacuna' => $fecha[$i],
          'estado' => 1,
        ]
      )
    ) {

        $this->mensaje = 'Vacuna Registrada exitosamente!.';
      } else {
        $this->mensaje = $this->ERROR();
      }
    }
    $this->Accion($this->mensaje);
    header('location:' . constant('URL') . "Personas/Vacunados");

    return false;
  }


  public function Consultas_Vacunas_Ajax()
  {
    $this->Establecer_Consultas();

    foreach ($this->perso_vacuna as $persona) {

      $dosis="";
      $fecha="";
      $vacuna="";

      foreach ($this->vacunas as $key => $vacunado) {
      if ($persona["cedula_persona"] == $vacunado["cedula_persona"]) {
        $vacuna.= $vacunado["nombre_vacuna"]."</br>";
        $dosis.= $vacunado["dosis"]."</br>";
        $fecha.= $vacunado["fecha_vacuna"]."</br>";
      }
    }

    $datos[] = [
      /* "id_vacuna_covid" => $vacuna["id_vacuna_covid"], */
      "cedula_persona" => $persona["cedula_persona"],
      "nombre_apellido" => $persona["primer_nombre"]." ".$persona["primer_apellido"],
      "nombre_vacuna"   => $vacuna,
      "dosis" => $dosis,
      "fecha_vacuna" => $fecha,
    ];
  }

  $this->Escribir_JSON($datos);
}

public function Eliminar_Vacunados() 
{

  if ($this->Desactivar("vacuna_covid","cedula_persona",$_POST['cedula_persona'])) { 
    $this->mensaje = 'Vacunado Eliminado Exitosamente';
    $this->Accion("Vacunado: ".$_POST['cedula_persona']." Eliminado Exitosamente.");
  } else {
    $this->mensaje = 0;
  }
  echo $this->mensaje;
  return false;
} 

/* public function Vacuna()
{
 $this->Establecer_Consultas(); 
 $this->Seguridad_de_Session();
 $this->vista->Cargar_Vistas('vacuna/consultar');
} */

public function Vacunados()
{
  $this->Establecer_Consultas(); 
  $this->Seguridad_de_Session();
  $this->vista->Cargar_Vistas('vacuna/consultar');
}
// ==============================VISTAS=====================================
public function Personas()
{
  $this->Seguridad_de_Session();
  $this->vista->Cargar_Vistas('personas/index'); 
}  

public function consulta_vacunado(){
  $this->Establecer_Consultas(); 
  $existe=true;
  foreach($this->vacunas as $v){
    if($v['cedula_persona']==$_POST['cedula_persona']){
      $existe=false;
    }
  }

  echo $existe;
}

public function Registros()
{
  $this->Seguridad_de_Session();
  $this->vista->transportes=$this->modelo->get_transportes();
  //$this->vista->comunidades=$this->modelo->get_comunidades();
  $this->vista->organizaciones=$this->modelo->get_organizaciones();
  //      $this->vista->centros_votacion=$this->modelo->get_centros();
  //      $this->vista->parroquias=$this->modelo->get_parroquias();
  $this->vista->bonos=$this->modelo->get_bonos();
  //      $this->vista->enfermedades=$this->modelo->get_enfermedades();
  $this->vista->discapacidades=$this->modelo->get_discapacidad();
  $this->vista->misiones=$this->modelo->get_misiones();
  $this->vista->ocupaciones=$this->modelo->get_ocupaciones();
  $this->vista->condiciones=$this->modelo->get_condiciones();
  $this->vista->proyectos=$this->modelo->get_proyectos(); 
  //$this->vista->proyectos=$this->modelo->get_divisiones();
  $this->vista->nomina=$this->Consultar_nomina("nomina"); 
  $this->vista->egreso=$this->Consultar_egreso("egresados"); 
  $this->vista->cargo_nominal=$this->consultar_cargo("cargo_nominal");
  $this->vista->ubicaciones=$this->Consultar_Tabla_ubicaciones("ubicaciones");
  $this->vista->estados=$this->Consultar_Tabla_Estados("estados");
  $this->vista->estado_fun=$this->Consultar_Tabla_edo_fun("estados_funcionarios");
  $this->vista->divisiones=$this->Consultar_Tabla_divisiones("divisiones");
 /*  $this->vista->proyectos=$this->modelo->get_divisiones(); */
  $this->vista->Cargar_Vistas('personas/registrar');
}

public function Registros_habitante()
{

  $this->Seguridad_de_Session();
  $this->vista->transportes=$this->modelo->get_transportes();
 // $this->vista->comunidades=$this->modelo->get_comunidades();
  $this->vista->organizaciones=$this->modelo->get_organizaciones();
  //      $this->vista->centros_votacion=$this->modelo->get_centros();
  //      $this->vista->parroquias=$this->modelo->get_parroquias();
  $this->vista->bonos=$this->modelo->get_bonos();
  //      $this->vista->enfermedades=$this->modelo->get_enfermedades();
  $this->vista->discapacidades=$this->modelo->get_discapacidad();
  $this->vista->misiones=$this->modelo->get_misiones();
  $this->vista->ocupaciones=$this->modelo->get_ocupaciones();
  $this->vista->condiciones=$this->modelo->get_condiciones();
  $this->vista->proyectos=$this->modelo->get_proyectos();
  $this->vista->Cargar_Vistas('habitante/registrar_personas');
  
}


public function Consultas_areas()
{
  $divisiones1=$_POST['divisiones'];
  echo $this->vista->divisiones=$this->Consultar_Tabla_areas("areas",$divisiones1);
  return;
  exit;
}

public function Consultas_secciones()
{
  $areas1=$_POST['areas'];
  echo $this->vista->divisiones=$this->Consultar_Tabla_secciones($areas1);
  return;
  exit;
}


public function consultar_tabla_egresados()
{
  echo $this->modelo->consultar_tabla_egresados();
  return;
  exit;
}


public function Consultas()
{
  /* $this->Establecer_Consultas(); */
  $this->vista->transportes=$this->modelo->get_transportes();
  //$this->vista->comunidades=$this->modelo->get_comunidades();
  $this->vista->ocupaciones=$this->modelo->get_ocupaciones();
  $this->vista->condiciones=$this->modelo->get_condiciones();
  $this->vista->organizaciones=$this->modelo->get_organizaciones();
  $this->vista->bonos=$this->Consultar_Tabla("bonos",1,"id_bono");
  $this->vista->misiones=$this->Consultar_Tabla("misiones",1,"id_mision");
  $this->vista->divisiones=$this->Consultar_Tabla_divisiones("divisiones");
  $this->vista->titulos=$this->Consultar_Tabla_divisiones("proyecto");
  $this->vista->cargo=$this->Consultar_Tabla_divisiones("cargo_nominal");
  $this->vista->pp_estado=$this->Consultar_Tabla_divisiones("estados");
  $this->vista->estad_funcionario=$this->Consultar_Tabla_divisiones("estados_funcionarios");
  $this->vista->nomina=$this->Consultar_Tabla_divisiones("nomina");
  $this->vista->ubicacion=$this->Consultar_Tabla_divisiones("ubicaciones");

  $this->vista->secciones=$this->Consultar_Tabla_divisiones("secciones"); 
  $this->Seguridad_de_Session();
  $this->vista->Cargar_Vistas('personas/consultar');
}


public function Consultasegresos()
{
  /* $this->Establecer_Consultas(); */
  $this->vista->transportes=$this->modelo->get_transportes();
  //$this->vista->comunidades=$this->modelo->get_comunidades();
  $this->vista->ocupaciones=$this->modelo->get_ocupaciones();
  $this->vista->condiciones=$this->modelo->get_condiciones();
  $this->vista->organizaciones=$this->modelo->get_organizaciones();
  $this->vista->bonos=$this->Consultar_Tabla("bonos",1,"id_bono");
  $this->vista->misiones=$this->Consultar_Tabla("misiones",1,"id_mision");
  $this->vista->divisiones=$this->Consultar_Tabla_divisiones("divisiones");
  $this->vista->titulos=$this->Consultar_Tabla_divisiones("proyecto");
  $this->vista->cargo=$this->Consultar_Tabla_divisiones("cargo_nominal");
  $this->vista->estad_funcionario=$this->Consultar_Tabla_divisiones("estados_funcionarios");
  $this->vista->pp_estado=$this->Consultar_Tabla_divisiones("estados");
  $this->vista->nomina=$this->Consultar_Tabla_divisiones("nomina");
  $this->vista->ubicacion=$this->Consultar_Tabla_divisiones("ubicaciones");
  $this->vista->secciones=$this->Consultar_Tabla_divisiones("secciones"); 
  $this->Seguridad_de_Session();
  $this->vista->Cargar_Vistas('personas/consultaregresos');
}

public function Consultahistorialfuncionario()
{
  /* $this->Establecer_Consultas(); */
  $this->vista->transportes=$this->modelo->get_transportes();
  //$this->vista->comunidades=$this->modelo->get_comunidades();
  $this->vista->ocupaciones=$this->modelo->get_ocupaciones();
  $this->vista->condiciones=$this->modelo->get_condiciones();
  $this->vista->organizaciones=$this->modelo->get_organizaciones();
  $this->vista->bonos=$this->Consultar_Tabla("bonos",1,"id_bono");
  $this->vista->misiones=$this->Consultar_Tabla("misiones",1,"id_mision");
  $this->vista->divisiones=$this->Consultar_Tabla_divisiones("divisiones");
  $this->vista->nomina=$this->Consultar_Tabla_divisiones("nomina");
  $this->vista->ubicacion=$this->Consultar_Tabla_divisiones("ubicaciones");
  $this->vista->secciones=$this->Consultar_Tabla_divisiones("secciones"); 
  $this->Seguridad_de_Session();
  $this->vista->Cargar_Vistas('personas/historialfuncionario');
  
}



public function consultar_informacion_persona_ingreso(){
  $info_completa=[];
  $personas=$this->modelo->Consultarfecha_ingreso($_POST['fecha_inicio'],$_POST['fecha_fin']);
  
  foreach ($personas as $p) {
   $ocupacion=json_encode($this->modelo->get_ocupacion_persona($p['cedula_persona']));
   $condicion_lab=json_encode($this->modelo->get_cond_laboral_persona($p['cedula_persona']));
   $transporte=json_encode($this->modelo->get_transporte_persona($p['cedula_persona']));
   $bonos=json_encode($this->modelo->get_bonos_persona($p['cedula_persona']));
   $misiones=json_encode($this->modelo->get_misiones_persona($p['cedula_persona']));
   $divisiones=json_encode($this->modelo->get_divisiones($p['cedula_persona']));
   //$comunidad_i=json_encode($this->modelo->get_comunidad_indigena_persona($p['cedula_persona']));
   $org_politica=json_encode($this->modelo->get_org_politica_persona($p['cedula_persona']));
   $persona=json_encode($p);
   $p['genero']=='M'?$genero="Masculino":$genero='Femenino';
   $p['whatsapp']==1?$whatsapp="Si posee":$whatsapp='No posee';

   $info_completa[]=[
    "cedula"    =>    $p['cedula_persona'],
    "primer_nombre"  =>$p['primer_nombre'],
    "segundo_nombre"          =>$p['segundo_nombre'],
    "primer_apellido" =>$p['primer_apellido'],
    "segundo_apellido"          =>$p['segundo_apellido'],
    "telefono"        =>$p['telefono'],
    "whatsapp"          =>$whatsapp,
    "telf_casa"          =>$p['telf_casa'],
    "correo"          =>$p['correo'],
    "correo_institucional"          =>$p['correo_institucional'],
    "fecha_nacimiento"          =>$p['fecha_nacimientoc'],
    "genero"          =>$genero,
    "nacionalidad"          =>$p['nacionalidad'],
    "estado_civil"          =>$p['estado_civil'],
    "nivel_educativo"          =>$p['nivel_educativo'],
    "nombre_ubi"          =>$p['nombre_ubi'],
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

public function consultar_informacion_persona_compleanos(){
  $info_completa=[];
  $personas=$this->modelo->Consultarfecha_cumple($_POST['mescumple']);
  
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
    "primer_nombre"  =>$p['primer_nombre'],
    "segundo_nombre"          =>$p['segundo_nombre'],
    "primer_apellido" =>$p['primer_apellido'],
    "segundo_apellido"          =>$p['segundo_apellido'],
    "telefono"        =>$p['telefono'],
    "whatsapp"          =>$whatsapp,
    "telf_casa"          =>$p['telf_casa'],
    "correo"          =>$p['correo'],
    "correo_institucional"          =>$p['correo_institucional'],
    "fecha_nacimiento"          =>$p['fecha_nacimientoc'],
    "genero"          =>$genero,
    "nacionalidad"          =>$p['nacionalidad'],
    "estado_civil"          =>$p['estado_civil'],
    "nivel_educativo"          =>$p['nivel_educativo'],
    "nombre_ubi"          =>$p['nombre_ubi'],
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
    "correo_institucional"          =>$p['correo_institucional'],
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

public function consultar_informacion_persona(){
  
  $info_completa=[];
  $personas=$this->modelo->Consultar();
  
  foreach ($personas as $p) {
   $ocupacion=json_encode($this->modelo->get_ocupacion_persona($p['cedula_persona']));
   $condicion_lab=json_encode($this->modelo->get_cond_laboral_persona($p['cedula_persona']));
   $transporte=json_encode($this->modelo->get_transporte_persona($p['cedula_persona']));
   $bonos=json_encode($this->modelo->get_bonos_persona($p['cedula_persona']));
   $misiones=json_encode($this->modelo->get_misiones_persona($p['cedula_persona']));
   $divisiones=json_encode($this->modelo->get_divisiones($p['cedula_persona']));
   $titulos=json_encode($this->modelo->get_titulos($p['cedula_persona']));
   //$comunidad_i=json_encode($this->modelo->get_comunidad_indigena_persona($p['cedula_persona']));
   $org_politica=json_encode($this->modelo->get_org_politica_persona($p['cedula_persona']));
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
    "correo_institucional"          =>$p['correo_institucional'],
    "fecha_nacimiento"          =>$p['fecha_nacimientoc'],
    "genero"          =>$genero,
    "nacionalidad"          =>$p['nacionalidad'],
    "estado_civil"          =>$p['estado_civil'],
    "nivel_educativo"          =>$p['nivel_educativo'],
    "nombre_ubi"          =>$p['nombre_ubi'],
    "ing_seniat"          =>$p['ing_seniatc'],
    "ing_publica"          =>$p['ing_publicac'],
    "fecha_notificacion"          =>$p['fecha_notificacionc'],
    "ult_designacion"          =>$p['ult_designacionc'],
    "prima"          =>$p['prima'],
    "declaracion_j"          =>$p['declaracion_j'],
    "inscripcion_ivss"          =>$p['inscripcion_ivss'],
    "fideicomiso"          =>$p['fideicomiso'],
    "grado_resguardo"          =>$p['grado_resguardo'],
    "cargo"                       =>$p['nombre_cargo'],
    "procedencias_estado"          =>$p['nombre_estado_procedencia'],
    "estado_funcionario"          =>$p['nombre_estado'],
    "ver"                   =>"<button class='btn' style='background:#15406D;color:white' type='button' title='Ver información de la persona' onclick='ver_datos(`".$persona."`,`".$ocupacion."`,`".$condicion_lab."`,`".$transporte."`,`".$bonos."`,`".$misiones."`,`".$divisiones."`,`".$titulos."`)'><span class='fa fa-eye'></span></button>",

    "editar"                =>"<button class='btn' style='background:#EEA000;color:white' type='button' title='Editar información de la persona' onclick='editar_datos(`".$persona."`,`".$ocupacion."`,`".$condicion_lab."`,`".$transporte."`,`".$bonos."`,`".$misiones."`,`".$divisiones."`,`".$titulos."`,`".$org_politica."`)'><span class='fa fa-edit'></span></button>",

    "eliminar"              => "<button class='btn' style='background:#9D2323;color:white' type='button' title='Egresar persona' onclick='egresar_datos(`".$p['cedula_persona']."`)'><i class='fas fa-user-slash' style='color:white'></i></button>",
  ];


}

$this->Escribir_JSON($info_completa);
}

public function consultar_informacion_persona_egresos(){
  $info_completa=[];
  $personas=$this->modelo->Consultaregresos();
  
  foreach ($personas as $p) {
   $ocupacion=json_encode($this->modelo->get_ocupacion_persona($p['cedula_persona']));
   $condicion_lab=json_encode($this->modelo->get_cond_laboral_persona($p['cedula_persona']));
   $transporte=json_encode($this->modelo->get_transporte_persona($p['cedula_persona']));
   $bonos=json_encode($this->modelo->get_bonos_persona($p['cedula_persona']));
   $misiones=json_encode($this->modelo->get_misiones_persona($p['cedula_persona']));
   $divisiones=json_encode($this->modelo->get_divisiones($p['cedula_persona']));
   $titulos=json_encode($this->modelo->get_titulos($p['cedula_persona']));
   //$comunidad_i=json_encode($this->modelo->get_comunidad_indigena_persona($p['cedula_persona']));
   $org_politica=json_encode($this->modelo->get_org_politica_persona($p['cedula_persona']));
   $persona=json_encode($p);
   $p['genero']=='M'?$genero="Masculino":$genero='Femenino';
   $p['whatsapp']==1?$whatsapp="Si posee":$whatsapp='No posee';

   $info_completa[]=[
    "nombre_egresado"    =>    $p['nombre_egresado'],
    "descripcion_egresado"    =>    $p['descripcion_egresado'],
    "fecha_egreso"    =>    $p['fecha_egreso'],
    "cedula"    =>    $p['cedula_persona'],
    "primer_nombre"  =>$p['primer_nombre'],
    "segundo_nombre"          =>$p['segundo_nombre'],
    "primer_apellido" =>$p['primer_apellido'],
    "segundo_apellido"          =>$p['segundo_apellido'],
    "telefono"        =>$p['telefono'],
    "whatsapp"          =>$whatsapp,
    "telf_casa"          =>$p['telf_casa'],
    "correo"          =>$p['correo'],
    "correo_institucional"          =>$p['correo_institucional'],
    "fecha_nacimiento"          =>$p['fecha_nacimientoc'],
    "genero"          =>$genero,
    "nacionalidad"          =>$p['nacionalidad'],
    "estado_civil"          =>$p['estado_civil'],
    "nivel_educativo"          =>$p['nivel_educativo'],
    "nombre_ubi"          =>$p['nombre_ubi'],
    "ing_seniat"          =>$p['ing_seniatc'],
    "ing_publica"          =>$p['ing_publicac'],
    "fecha_notificacion"          =>$p['fecha_notificacionc'],
    "ult_designacion"          =>$p['ult_designacionc'],
    "prima"          =>$p['prima'],
    "declaracion_j"          =>$p['declaracion_j'],
    "inscripcion_ivss"          =>$p['inscripcion_ivss'],
    "fideicomiso"          =>$p['fideicomiso'],
    "cargo"                       =>$p['nombre_cargo'],
    "procedencias_estado"          =>$p['nombre_estado_procedencia'],
    "estado_funcionario"          =>$p['nombre_estado'],
    "ver"             =>"<button class='btn' style='background:#15406D;color:white' type='button' title='Ver información de la persona' onclick='ver_datos(`".$persona."`,`".$ocupacion."`,`".$condicion_lab."`,`".$transporte."`,`".$bonos."`,`".$misiones."`,`".$divisiones."`,`".$titulos."`,`".$org_politica."`)'><span class='fa fa-eye'></span></button>",

    "editar"             =>"<button class='btn' style='background:#EEA000;color:white' type='button' title='Editar información de la persona' onclick='editar_datos(`".$persona."`,`".$ocupacion."`,`".$condicion_lab."`,`".$transporte."`,`".$bonos."`,`".$misiones."`,`".$divisiones."`,`".$titulos."`,`".$org_politica."`,`".'editar_egresado'."`)'><span class='fa fa-edit'></span></button>",

    "eliminar"             => "<button class='btn' style='background:#9D2323;color:white' type='button' title='Ingresar persona' onclick='ingresar_datos(`".$persona."`,`".$ocupacion."`,`".$condicion_lab."`,`".$transporte."`,`".$bonos."`,`".$misiones."`,`".$divisiones."`,`".$titulos."`,`".$org_politica."`)'><span class='fas fa-user-alt'></span></button>",
  ];
}

$this->Escribir_JSON($info_completa);
}

public function consultar_informacion_persona_historia(){
  $info_completa=[];
  $personas=$this->modelo->Consultarhistorialfuncionario();
  
  foreach ($personas as $p) {
   $ocupacion=json_encode($this->modelo->get_ocupacion_persona($p['cedula_persona']));
   $condicion_lab=json_encode($this->modelo->get_cond_laboral_persona($p['cedula_persona']));
   $transporte=json_encode($this->modelo->get_transporte_persona($p['cedula_persona']));
   $bonos=json_encode($this->modelo->get_bonos_persona($p['cedula_persona']));
   $misiones=json_encode($this->modelo->get_misiones_persona($p['cedula_persona']));
   $divisiones=json_encode($this->modelo->get_divisiones($p['cedula_persona']));
   //$comunidad_i=json_encode($this->modelo->get_comunidad_indigena_persona($p['cedula_persona']));
   $org_politica=json_encode($this->modelo->get_org_politica_persona($p['cedula_persona']));
   $persona=json_encode($p);
   $p['genero']=='M'?$genero="Masculino":$genero='Femenino';
   $p['whatsapp']==1?$whatsapp="Si posee":$whatsapp='No posee';

   $info_completa[]=[
    "cedula"    =>    $p['cedula_persona'],
    "primer_nombre"  =>$p['primer_nombre'],
    "segundo_nombre"          =>$p['segundo_nombre'],
    "primer_apellido" =>$p['primer_apellido'],
    "segundo_apellido"          =>$p['segundo_apellido'],
    "telefono"        =>$p['telefono'],
    "whatsapp"          =>$whatsapp,
    "telf_casa"          =>$p['telf_casa'],
    "correo"          =>$p['correo'],
    "correo_institucional"          =>$p['correo_institucional'],
    "fecha_nacimiento"          =>$p['fecha_nacimientoc'],
    "genero"          =>$genero,
    "nacionalidad"          =>$p['nacionalidad'],
    "estado_civil"          =>$p['estado_civil'],
    "nivel_educativo"          =>$p['nivel_educativo'],
    "nombre_ubi"          =>$p['nombre_ubi'],
    "ing_seniat"          =>$p['ing_seniatc'],
    "ing_publica"          =>$p['ing_publicac'],
    "fecha_notificacion"          =>$p['fecha_notificacionc'],
    "ult_designacion"          =>$p['ult_designacionc'],
    "prima"          =>$p['prima'],
    "declaracion_j"          =>$p['declaracion_j'],
    "inscripcion_ivss"          =>$p['inscripcion_ivss'],
    "fideicomiso"          =>$p['fideicomiso'],
    "descrip_historial_funcionario"          =>$p['Descripcion'],
    "fecha_historial_funcionario"          =>$p['fecha_cambio'],
    "ver"             =>"<button class='btn' style='background:#15406D;color:white' type='button' title='Ver información de la persona' onclick='ver_datos(`".$persona."`,`".$ocupacion."`,`".$condicion_lab."`,`".$transporte."`,`".$bonos."`,`".$misiones."`,`".$divisiones."`,`".$org_politica."`)'><span class='fa fa-eye'></span></button>",
  ];
}

$this->Escribir_JSON($info_completa);
}

public function Consultas_cedula()
{

 $persona=$this->modelo->Buscar_Persona($_POST['cedula'], $_POST['parentezco']);

 if(count($persona)==0){
   echo 0;
 }
 else{
   $this->Escribir_JSON($persona);
 }

}


public function Consultas_cedulaV2()
{

 $persona=$this->Consultar_Columna("personas","cedula_persona",$_POST['cedula']);

 if(count($persona)==0){
   echo 0;
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

public function Consultas_cedulaV3()
{

 $persona=$this->Consultar_Columna("personas","cedula_persona",$_POST['cedula']);

 if(count($persona)==0){
   echo 0;
 }
 else{
  if($persona[0]['estado'] == 0){
    echo 2;
  }
  else{
    echo json_encode($persona);
  }
 }

}

public function Administracion()
{
  $this->Establecer_Consultas();
  $this->Seguridad_de_Session();
  $this->vista->Cargar_Vistas('personas/administrar');
}


public function registrar_persona(){

  $datos=$_POST['datos'];
  $datos['contrasenia']=$this->Codificar($datos['contrasenia']);
  $datos['preguntas_seguridad']=$this->Codificar($datos['preguntas_seguridad']);
  $datos['estado']=1;
  echo $this->modelo->Registrar($datos);

      // echo json_encode($datos);


}

public function registrar_persona_habitante(){

  $datos=$_POST['datos'];
  $datos['contrasenia']=$this->Codificar($datos['contrasenia']);
  $datos['preguntas_seguridad']=$this->Codificar($datos['preguntas_seguridad']);
  $datos['estado']=2;
  echo $this->modelo->Registrar($datos);

      // echo json_encode($datos);


}

public function registrar_transporte(){

  $datos=[
    "cedula_propietario"            =>  $_POST['cedula_propietario'],
    "tipo_transporte"               =>  $_POST['tipo_transporte'],
    "descripcion_transporte"        =>  $_POST['descripcion_transporte']
    
  ];

  $this->modelo->Registrar_transporte($datos);



}

/* public function registrar_proyectos(){
  $proyectos=$this->modelo->get_divisiones();
  $datos=$_POST['datos'];
  $cont=0;
 
  foreach ($proyectos as $pro) {
    if($pro['id_proyecto']==$datos['proyecto']){
      $this->modelo->Registrar_persona_proyecto([
       "cedula_persona"   =>   $datos['cedula_persona'],
       "id_proyecto"     =>     $pro['id_proyecto'],
       "descripcion"     =>     $pro['descripcion']
     ]);
 
      $cont++;
    }
  }
 
 
  if($cont==0){
 
 
   if($this->modelo->Registrar_proyecto($datos['proyecto'])){
     $id=$this->Ultimo_Ingresado("proyecto","id_proyecto");
 
     foreach ($id as $i) {
       echo  $this->modelo->Registrar_persona_proyecto([
         "cedula_persona"   =>     $datos['cedula_persona'],
         "id_proyecto"     =>     $i['MAX(id_proyecto)']
       ]);
     }
 
 
   }
 }
 
 } */

public function registrar_proyecto(){
  $proyectos=$this->modelo->get_proyectos();
  $datos=$_POST['datos'];

/*   foreach ($proyectos as $pro) { */
 /*    if($pro['id_proyecto']==$datos['id_titulos']){ */
  for ($i = 0; $i < count($datos); $i++) {
    foreach ($proyectos as $pro) {
        if ($pro['id_titulo'] == $datos[$i]['id_titulo']) {
      $this->modelo->Registrar_persona_proyecto([
       "cedula_persona"   =>   $datos[$i]['cedula_persona'],
       "id_titulo"     =>     $pro['id_titulo'],
       "descripcion"     =>     $datos[$i]['descripcion']
     ]);
  }
}

}
echo count($datos);


}





 public function registrar_ubicacion(){
  $ubicaciones_fun=$this->modelo->get_areas();
  $datos=$_POST['datos'];

 
  for ($i = 0; $i < count($datos); $i++) {
    foreach ($ubicaciones_fun as $ubi) {
        if ($ubi['id_area'] == $datos[$i]['id_area']) {
      $this->modelo->Registrar_persona_area([
       "cedula_persona"   =>   $datos[$i]['cedula_persona'],
       "id_area"          =>     $ubi['id_area']
     ]);
  }
  

 
 }

 }

 }

 /* public function registrar_egresados(){
  $ubicaciones_fun=$this->get_areas();
  $datos=$_POST['datos'];

 
  for ($i = 0; $i < count($datos); $i++) {
    foreach ($ubicaciones_fun as $ubi) {
        if ($ubi['id_area'] == $datos[$i]['id_area']) {
      $this->modelo->Registrar_persona_area([
       "cedula_persona"   =>   $datos[$i]['cedula_persona'],
       "id_area"          =>     $ubi['id_area']
     ]);
  }

 }

 }

 } */
 


public function registrar_ocupacion(){

  $ocupaciones=$this->modelo->get_ocupaciones();
  $cont=0;

  $ocupacion_dato=$_POST['ocupacion'];

  if($ocupacion_dato['nueva']=='0'){
   $this->modelo->Registrar_persona_ocupacion([
    "cedula_persona"   =>     $_POST['cedula_persona'],
    "id_ocupacion"     =>     $ocupacion_dato['ocupacion']
  ]);
}
else{

  if($this->Registrar_Tablas("ocupacion","nombre_ocupacion",$ocupacion_dato['ocupacion'])){
    $id=$this->Ultimo_Ingresado("ocupacion","id_ocupacion");

    foreach ($id as $i) {
      $this->modelo->Registrar_persona_ocupacion([
        "cedula_persona"   =>     $_POST['cedula_persona'],
        "id_ocupacion"     =>     $i['MAX(id_ocupacion)']
      ]);
    }
  }

}

}


public function registrar_condicion_laboral(){
  $datos=$_POST['datos'];
  if($this->modelo->Registrar_cond_laboral($datos)){
    echo 1;
  }
}
/*
public function registrar_comunidad_indigena(){
 $comunidades=$this->modelo->get_comunidades();
 $datos=$_POST['datos'];
 $cont=0;

 foreach ($comunidades as $c) {
   if(strtolower($c['nombre_comunidad'])==strtolower($datos['comunidad'])){
     $this->modelo->Registrar_persona_comunidad([
      "cedula_persona"   =>     $datos['cedula_persona'],
      "id_comunidad_indigena"     =>     $c['id_comunidad_indigena']
    ]);

     $cont++;
   }
 }


 if($cont==0){


  if($this->Registrar_Tablas("comunidad_indigena","nombre_comunidad",$datos['comunidad'])){
    $id=$this->Ultimo_Ingresado("comunidad_indigena","id_comunidad_indigena");

    foreach ($id as $i) {
      $this->modelo->Registrar_persona_comunidad([
        "cedula_persona"   =>     $datos['cedula_persona'],
        "id_comunidad_indigena"     =>     $i['MAX(id_comunidad_indigena)']
      ]);
    }



  }
}

}
*/

public function registrar_org_politica(){
 $organizaciones=$this->modelo->get_organizaciones();
 $datos=$_POST['datos'];


 if($datos['nuevo']=='0'){
   $this->modelo->Registrar_persona_organizacion([
    "cedula_persona"   =>     $datos['cedula_persona'],
    "id_org_politica"     =>     $datos['organizacion']
  ]);

 }

 else{
  if($this->Registrar_Tablas("org_politica","nombre_org",$datos['organizacion'])){
    $id=$this->Ultimo_Ingresado("org_politica","id_org_politica");

    foreach ($id as $i) {
      $this->modelo->Registrar_persona_organizacion([
        "cedula_persona"   =>     $datos['cedula_persona'],
        "id_org_politica"     =>     $i['MAX(id_org_politica)']
      ]);
    }


  }
}








}



public function registrar_bonos(){
 $bonos=$this->modelo->get_bonos();
 $datos=$_POST['datos'];


 if($datos['bono']['nuevo']=='0'){
   $this->modelo->Registrar_persona_bono([
    "cedula_persona"   =>     $datos['cedula_persona'],
    "id_bono"     =>     $datos['bono']['bono']
  ]);

 }

 else{

  if($this->Registrar_Tablas("bonos","nombre_bono",$datos['bono']['bono'])){
    $id=$this->Ultimo_Ingresado("bonos","id_bono");

    foreach ($id as $i) {
      echo  $this->modelo->Registrar_persona_bono([
        "cedula_persona"   =>     $datos['cedula_persona'],
        "id_bono"     =>     $i['MAX(id_bono)']
      ]);
    }
  }
}

}

/* public function registrar_proyectos(){


public function registrar_proyectos(){

 $proyectos=$this->modelo->get_divisiones();
 $datos=$_POST['datos'];
 $cont=0;

 foreach ($proyectos as $pro) {
   if($pro['id_proyecto']==$datos['proyecto']){
     $this->modelo->Registrar_persona_proyecto([
      "cedula_persona"   =>   $datos['cedula_persona'],
      "id_proyecto"     =>     $pro['id_proyecto']
    ]);

     $cont++;
   }
 }


 if($cont==0){


  if($this->modelo->Registrar_proyecto($datos['proyecto'])){
    $id=$this->Ultimo_Ingresado("proyecto","id_proyecto");

    foreach ($id as $i) {
      echo  $this->modelo->Registrar_persona_proyecto([
        "cedula_persona"   =>     $datos['cedula_persona'],
        "id_proyecto"     =>     $i['MAX(id_proyecto)']
      ]);
    }



  }
}

} */

public function registrar_carnet(){

  echo $this->modelo->registrar_carnet([
    "cedula_persona"   =>  $_POST['cedula'],
    "serial_carnet"    =>  $_POST['carnet']['serial'],
    "codigo_carnet"    =>  $_POST['carnet']['codigo'],
    "tipo_carnet"      =>  $_POST['tipo']
  ]);


}


public function registrar_misiones(){
 $misiones=$this->modelo->get_misiones();
 $datos=$_POST['datos'];



 if($datos['mision']['nuevo']=='0'){
   $this->modelo->Registrar_persona_mision([
    "cedula_persona"   =>   $datos['cedula_persona'],
    "id_mision"     =>     $datos['mision']['nombre_mision'],
    "recibe_actualmente"  =>  $datos['mision']['recibe_actualmente'],
    "fecha"              =>  $datos['mision']['fecha']
  ]);

 }
 else{

  if($this->Registrar_Tablas("misiones","nombre_mision",$datos['mision']['nombre_mision'])){
    $id=$this->Ultimo_Ingresado("misiones","id_mision");

    foreach ($id as $i) {
      $this->modelo->Registrar_persona_mision([
        "cedula_persona"   =>   $datos['cedula_persona'],
        "id_mision"     =>     $i['MAX(id_mision)'],
        "recibe_actualmente"  =>  $datos['mision']['recibe_actualmente'],
        "fecha"              =>  $datos['mision']['fecha']
      ]);
    }



  }

}

}

public function egresar_persona(){

  $cedula=$_POST['cedula_persona'];
  $id_egresado=$_POST['id_egresado'];
  $descripcion =$_POST['descripcion'];
  $fecha =$_POST['fecha'];

  if($this->Desactivar("personas","cedula_persona",$cedula)){
    $this->modelo->registrar_egresos_personas($cedula,$id_egresado,$descripcion,$fecha);
    echo 1;
  }

}

public function registrar_egresado_persona(){

   
  $datos=[
    "cedula_persona" =>  $_POST['cedula'],
    "id_egresado" =>$_POST['id_egresado']
  ];

  $this->modelo->Registrar_persona_egreso($datos);

   echo $datos; 

          
}   
  




public function ingresar_persona(){

  $cedula=$_POST['cedula_persona'];

  if($this->Activar("personas","cedula_persona",$cedula)){
    $this->modelo->eliminarregistrosegresos($cedula);
    echo 1;
  }

}


public function get_serial_carnet(){
  $serial=$_POST['serial_carnet'];
  $tipo=$_POST['tipo_carnet'];


  $result=$this->modelo->get_serial_carnet($serial,$tipo);


  echo count($result);
}


public function get_codigo_carnet(){
  $codigo=$_POST['codigo_carnet'];
  $tipo=$_POST['tipo_carnet'];


  $result=$this->modelo->get_codigo_carnet($codigo,$tipo);


  echo count($result);
}


public function get_info_habitante(){
  $cedula=$_POST['cedula_persona'];
  $info_completa=[];
  $personas=$this->modelo->Consultar();
  
   $ocupacion=json_encode($this->modelo->get_ocupacion_persona($cedula));
   $condicion_lab=json_encode($this->modelo->get_cond_laboral_persona($cedula));
   $transporte=json_encode($this->modelo->get_transporte_persona($cedula));
   $bonos=json_encode($this->modelo->get_bonos_persona($cedula));
   $misiones=json_encode($this->modelo->get_misiones_persona($cedula));
   $proyectos=json_encode($this->modelo->get_proyectos_persona($cedula));
  // $comunidad_i=json_encode($this->modelo->get_comunidad_indigena_persona($cedula));
   $org_politica=json_encode($this->modelo->get_org_politica_persona($cedula));
   
  echo  json_encode([
                   "ocupacion"=>$ocupacion,    
                   "condicion_lab"=>$condicion_lab,    
                   "transporte"=>$transporte,    
                   "bonos"=>$bonos,    
                   "misiones"=>$misiones,    
                   "proyectos"=>$proyectos,         
                   "org_politica"=>$org_politica         
  ]);



}


public function modificar_persona(){
  $datos_persona=$_POST["datos_persona"];
  $editado=$this->modelo->Actualizar($datos_persona);
  $this->modelo->Actualizar_transporte($datos_persona["cedula_persona"],$datos_persona['transporte'],$datos_persona['observacion_transporte'],);
  $ubi_viej=$this->Consultar_ubicacion_act($datos_persona['ubicacion1']);
  $ubic_act=$this->Consultar_ubicacion_act($datos_persona['ubicacion']);
  
  if($ubi_viej != $ubic_act){
    if($ubi_viej[0]['nombre_ubi'] == 'GRTI-RCO'){
      $var1 = "al Sector/Unidad de";
      $var = "de la";
    }else if($ubic_act[0]['nombre_ubi'] == 'GRTI-RCO'){
      $var = "al Sector/Unidad de";
      $var1 = "a la";
    }else if($ubic_act != 'GRTI-RCO' || $ubi_viej != 'GRTI-RCO'){
      $var = "del Sector/Unidad de";
      $var1 = "al Sector/Unidad de";
    }else{
      $var = "del Sector/Unidad de";
      $var1 = "a la";
    }
    $this->modelo->Registrar_historial(
      "Migrado ". $var ." ". $ubi_viej[0]['nombre_ubi'] ." ". $var1 ." ". $ubic_act[0]['nombre_ubi'] .".",
      $datos_persona['cedula_persona']
  );
  }

 /*if($editado){
  //$this->editar_comunidad_indigena($datos_persona);
  $this->editar_ocupacion($datos_persona);
  $this->editar_cond_laboral($datos_persona);
  $this->editar_org_politica($datos_persona);
  $this->editar_transporte($datos_persona);
  }*/

  echo $editado;
}



public function get_info_vacunado(){

$cedula=$_POST['cedula'];
$vacunas=$this->Consultar_Columna("vacuna_covid","cedula_persona",$cedula);
$devolver="";
foreach($vacunas as $v){
$devolver.="<table style='width:100%'><tr><td>".$v['nombre_vacuna']."</td><td>".$v['dosis']."</td><td>(".$v['fecha_vacuna'].")</td>
<td><button type='button' class='btn btn-danger' onclick='eliminar_dosis(".$v['id_vacuna_covid'].",".$cedula.")'>X</button>
</td>
<td><button type='button' class='btn' style='background:#EEA000; color:white; font-weight:bold' data-toggle='modal' data-target='#actualizar' onclick='editarr(".$v['id_vacuna_covid'].",".$v['cedula_persona'].")'><em class='fa fa-edit'></em></button></td>
</tr></table><hr>";
}
echo $devolver;
}


public function add_vacuna(){
$cedula=$_POST['persona'];
$vacunas=$this->Consultar_Columna("vacuna_covid","cedula_persona",$cedula);
$retornar=1;

 if(count($vacunas)>=3){
  $retornar=0;
}
else{ 
/* foreach($vacunas as $v){
  if($v['dosis']==$_POST['vacuna']){
    $retornar=0;
  }
} */

if($retornar==1){ 
  $this->modelo->Registrar_Vacuna([
    "cedula_persona" =>$cedula,
    "nombre_vacuna"=>$_POST['nombre_vacuna'], 
    "dosis"=>$_POST['vacuna'],
    "fecha_vacuna"=>$_POST['fecha'],
    "estado"=>1
  ]);
} 
 } 

echo $retornar;

}


public function borrar_dosis(){
  echo $this->Eliminar_Tablas("vacuna_covid","id_vacuna_covid",$_POST['id']);
}

/*

public function editar_comunidad_indigena($datos_persona){
  $comunidades_persona=$this->Consultar_Columna("comunidad_indigena_personas","cedula_persona",$datos_persona['cedula_persona']);
   
  if($datos_persona['comunidad_indigena']=='No posee'){
       if(count($comunidades_persona)!=0){
          foreach($comunidades_persona as $cp){
            $this->Eliminar_Tablas("comunidad_indigena_personas","id_comunidad_persona",$cp['id_comunidad_persona']);
          }
       } 
  }
  else{
    $comunidades_indigenas=$this->Consultar_Tabla("comunidad_indigena",1,"id_comunidad_indigena");
    $existe=false;
    foreach($comunidades_indigenas as $ci){
      if(strtolower($ci['nombre_comunidad'])==strtolower($datos_persona['comunidad_indigena'])){
        $existe=$ci['id_comunidad_indigena'];
      }
    }

    if($existe==false){
      $this->Registrar_Tablas("comunidad_indigena","nombre_comunidad",$datos_persona['comunidad_indigena']);
      $id=$this->Ultimo_Ingresado("comunidad_indigena","id_comunidad_indigena");
      $id=$id[0]['MAX(id_comunidad_indigena)'];
      $existe=$id;
    }

     if(count($comunidades_persona)==0){
       $this->modelo->Registrar_persona_comunidad([
                  "cedula_persona"         =>$datos_persona['cedula_persona'],
                  "id_comunidad_indigena"  =>$existe
       ]);
     }
     else{
       $this->Actualizar_Tablas("comunidad_indigena_personas","id_comunidad_indigena","id_comunidad_persona",$existe,$comunidades_persona[0]['id_comunidad_persona']);
     }


  }
}

*/
public function editar_ocupacion($datos_persona){
  $ocupacion_persona=$this->Consultar_Columna("ocupacion_persona","cedula_persona",$datos_persona['cedula_persona']);
  if($datos_persona['ocupacion']=='No posee'){
    if(count($ocupacion_persona)!=0){
       foreach($ocupacion_persona as $op){
         $this->Eliminar_Tablas("ocupacion_persona","id_ocupacion_persona",$op['id_ocupacion_persona']);
       }
    } 
}
else{
  $ocupaciones=$this->Consultar_Tabla("ocupacion",1,"id_ocupacion");
  $existe=false;
  foreach($ocupaciones as $o){
    if($o['id_ocupacion']==$datos_persona['ocupacion']){
      $existe=$o['id_ocupacion'];
    }
  }

  if($existe==false){
    $this->Registrar_Tablas("ocupacion","nombre_ocupacion",$datos_persona['ocupacion']);
    $id=$this->Ultimo_Ingresado("ocupacion","id_ocupacion");
    $id=$id[0]['MAX(id_ocupacion)'];
    $existe=$id;
  }

/*    if(count($ocupacion_persona)==0){
     $this->modelo->Registrar_persona_ocupacion([
                "cedula_persona"         =>$datos_persona['cedula_persona'],
                "id_ocupacion"  =>$existe
     ]);
   }
   else{
     $this->Actualizar_Tablas("ocupacion_persona","id_ocupacion","id_ocupacion_persona",$existe,$ocupacion_persona[0]['id_ocupacion_persona']);
   } */


}
}

public function editar_cond_laboral($datos_persona){
  $cond_lab_persona=$this->Consultar_Columna("condicion_laboral","cedula_persona",$datos_persona['cedula_persona']);
  if($datos_persona['condicion_laboral']=="No posee"){
    if(count($cond_lab_persona)!=0){
      $this->Eliminar_Tablas("condicion_laboral","id_cond_laboral",$cond_lab_persona[0]['id_cond_laboral']);
    }
  }
  else{
    $existe=false;
    $condiciones_laborales=$this->Consultar_Tabla("condicion_laboral",1,"id_cond_laboral");

    foreach($condiciones_laborales as $cl){
      if($cl['id_cond_laboral']==$datos_persona['condicion_laboral']){
        $existe=$cl;
      }
    }

 /*    if($existe==false){
      if(count($cond_lab_persona)==0){
        $this->modelo->Registrar_cond_laboral([
          "cedula_persona" => $datos_persona["cedula_persona"],
          "nombre_cond_laboral" => $datos_persona["condicion_laboral"]['nombre_cond_laboral'],
          "sector_laboral" => $datos_persona['condicion_laboral']['sector_laboral'],
          "pertenece" => $datos_persona['condicion_laboral']['pertenece']
        ]);
      }
      else{
        $this->modelo->Actualizar_cond_laboral([
          "cedula_persona" => $datos_persona["cedula_persona"],
          "nombre_cond_laboral" => $datos_persona["condicion_laboral"]['nombre_cond_laboral'],
          "sector_laboral" => $datos_persona['condicion_laboral']['sector_laboral'],
          "pertenece" => $datos_persona['condicion_laboral']['pertenece'],
          "id_cond_laboral" => $cond_lab_persona[0]['id_cond_laboral']
        ]);
      }
    }
    else{
      if(count($cond_lab_persona)==0){
        $this->modelo->Registrar_cond_laboral([
          "cedula_persona" => $datos_persona["cedula_persona"],
          "nombre_cond_laboral" => $existe["nombre_cond_laboral"],
          "sector_laboral" => $existe['sector_laboral'],
          "pertenece" => $existe['pertenece']
        ]);
      }
      else{
        $this->modelo->Actualizar_cond_laboral([
          "cedula_persona" => $datos_persona["cedula_persona"],
          "nombre_cond_laboral" => $existe['nombre_cond_laboral'],
          "sector_laboral" => $existe['sector_laboral'],
          "pertenece" => $existe['pertenece'],
          "id_cond_laboral" => $cond_lab_persona[0]['id_cond_laboral']
        ]);
      }

    } */

  }
}

public function editar_org_politica($datos_persona){
  $organizaciones_persona=$this->Consultar_Columna("org_politica_persona","cedula_persona",$datos_persona['cedula_persona']);
   
  if($datos_persona['org_politica']=='No posee'){
       if(count($organizaciones_persona)!=0){
          foreach($organizaciones_persona as $op){
            $this->Eliminar_Tablas("org_politica_persona","id_org_persona",$op['id_org_persona']);
          }
       } 
  }
  else{
    $org_politicas=$this->Consultar_Tabla("org_politica",1,"id_org_politica");
    $existe=false;
    foreach($org_politicas as $or){
      if($or['id_org_politica']==$datos_persona['org_politica']){
        $existe=$or['id_org_politica'];
      }
    }

    if($existe==false){
      $this->Registrar_Tablas("org_politica","nombre_org",$datos_persona['org_politica']);
      $id=$this->Ultimo_Ingresado("org_politica","id_org_politica");
      $id=$id[0]['MAX(id_org_politica)'];
      $existe=$id;
    }

 /*     if(count($organizaciones_persona)==0){
       $this->modelo->Registrar_persona_organizacion([
                  "cedula_persona"         =>$datos_persona['cedula_persona'],
                  "id_org_politica"  =>$existe
       ]);
     }
     else{
       $this->Actualizar_Tablas("org_politica_persona","id_org_politica","id_org_persona",$existe,$organizaciones_persona[0]['id_org_persona']);
     }
 */

  }
}

/* public function editar_transporte($datos_persona){
  $transportes=$this->Consultar_Columna("transporte","cedula_propietario",$datos_persona['cedula_persona']);
   
  if($datos_persona['transporte']=='No posee'){
       if(count($transportes)!=0){
          foreach($transportes as $t){
            $this->Eliminar_Tablas("transporte","id_transporte",$t['id_transporte']);
          }
       } 
  }
  else{

    if(count($transportes)==0){
      $this->modelo->Registrar_transporte([
        "cedula_propietario" =>$datos_persona['cedula_persona'],
        "descripcion_transporte" => $datos_persona['transporte']
      ]);
      $id=$this->Ultimo_Ingresado("transporte","id_transporte");
      $id=$id[0]['MAX(id_transporte)'];
      $existe=$id;
    }

     else{
       $this->Actualizar_Tablas("transporte","descripcion_transporte","id_transporte",$datos_persona['transporte'],$transportes[0]['id_transporte']);
     }


  }
} */

/* public function eliminar_bono(){
  $retornar=0;
  
  if($this->Eliminar_Tablas("persona_bonos","id_persona_bono",$_POST['id_bono'])){
    $bonos=$this->Consultar_Columna("persona_bonos","cedula_persona",$_POST['cedula_param']);
    if(count($bonos)!=0){
      $retornar=[];
      for($i=0;$i<count($bonos);$i++){
         $b=$this->Consultar_Columna("bonos","id_bono",$bonos[$i]['id_bono']);
         $retornar[]=[
           "nombre_bono"=>$b[0]['nombre_bono'],
           "id_persona_bono"=>$bonos[$i]['id_persona_bono']
         ];
      }
    }
  }

  echo json_encode($retornar);

} */

public function agg_bono(){
  $all_bonos=$this->Consultar_Tabla("bonos",1,"id_bono");
  $bonos_persona=$this->Consultar_Columna("persona_bonos","cedula_persona",$_POST['cedula_persona']);
  $existe=false;
  $retornar=[];
  foreach($all_bonos as $a){
    if(strtolower($a['nombre_bono'])==strtolower($_POST['bono'])){
      $existe=$a['id_bono'];
    }
  }

  if($existe==false){
    $this->Registrar_Tablas("bonos","nombre_bono",$_POST['bono']);
    $id=$this->Ultimo_Ingresado("bonos","id_bono");
    $this->modelo->Registrar_persona_bono([
      "cedula_persona"=>$_POST['cedula_persona'],
      "id_bono"=>$id[0]['MAX(id_bono)']
    ]);
    $retornar=1;
  }
  else{
    $registrado=false;
     foreach($bonos_persona as $bp){
       if($bp['id_bono']==$existe){
          $registrado=true;
       }
     }

     if($registrado==false){
      $this->modelo->Registrar_persona_bono([
        "cedula_persona"=>$_POST['cedula_persona'],
        "id_bono"=>$existe
      ]);
      $retornar=1;
     }
     else{
       $retornar=0;
     }
  }

  if($retornar==1){
    $bonos=$this->Consultar_Columna("persona_bonos","cedula_persona",$_POST['cedula_persona']);
    if(count($bonos)!=0){
      $retornar=[];
      for($i=0;$i<count($bonos);$i++){
         $b=$this->Consultar_Columna("bonos","id_bono",$bonos[$i]['id_bono']);
         $retornar[]=[
           "nombre_bono"=>$b[0]['nombre_bono'],
           "id_persona_bono"=>$bonos[$i]['id_persona_bono']
         ];
      }
    }

    echo json_encode($retornar);
  }
  else{
    echo $retornar;
  }

  
}

public function eliminar_mision(){
  $id=$_POST['id_mision'];
  echo $this->Eliminar_Tablas("persona_misiones","id_persona_mision",$id);
}

public function eliminar_proyecto(){
  $registros=$this->modelo->Consultar_Tabla_division($_POST['cedula_persona']);
  $consultadivision = $this->Consult_Tabl_divis($_POST['id']);
  if($registros){
    echo $this->Eliminar_Tablas_divisiones($_POST['id']);
    $arr = explode(" ",$consultadivision[0]['areas']);
    if($arr[0]== "Área"){
     $var = "";
    }else{
     $var = "Área de";
    }
    $this->modelo->Registrar_historial(
      "Removido de la división de ". $consultadivision[0]['divisiones'] .", ".$var." ". $consultadivision[0]['areas'] .".",
      $_POST['cedula_persona']);
  }else{
    echo 0;
  }
}

public function eliminar_titulos(){
    echo $this->Eliminar_Tablas_titulos($_POST['id']);
}



public function get_misiones(){
  $misiones=$this->Consultar_Columna("persona_misiones","cedula_persona",$_POST['cedula_persona']);
  for($i=0;$i<count($misiones);$i++){
    $mis=$this->Consultar_Columna("misiones","id_mision",$misiones[$i]['id_mision']);
    $misiones[$i]['nombre_mision']=$mis[0]['nombre_mision'];
  }
  echo json_encode($misiones);
}


public function add_mision(){
  $all_misiones=$this->Consultar_Tabla("misiones",1,"id_mision");
  $misiones_persona=$this->Consultar_Columna("persona_misiones","cedula_persona",$_POST['cedula']);
  $existe=false;
  $retornar=[];
  foreach($all_misiones as $a){
    if(strtolower($a['nombre_mision'])==strtolower($_POST['mision']['mision'])){
      $existe=$a['id_mision'];
    }
  }

  if($existe==false){
    $this->Registrar_Tablas("misiones","nombre_mision",$_POST['mision']['mision']);
    $id=$this->Ultimo_Ingresado("misiones","id_mision");
    $this->modelo->Registrar_persona_mision([
      "cedula_persona"=>$_POST['cedula'],
      "id_mision"=>$id[0]['MAX(id_mision)'],
      "recibe_actualmente"=>$_POST['mision']['recibe'],
      "fecha"=>$_POST['mision']['fecha']
    ]);
    $retornar=1;
  }
  else{
    $registrado=false;
     foreach($misiones_persona as $mp){
       if($mp['id_mision']==$existe){
          $registrado=true;
       }
     }

     if($registrado==false){
        $this->modelo->Registrar_persona_mision([
          "cedula_persona"=>$_POST['cedula'],
          "id_mision"=>$existe,
          "recibe_actualmente"=>$_POST['mision']['recibe'],
          "fecha"=>$_POST['mision']['fecha']
        ]);

      $retornar=1;
     }
     else{
       $retornar=0;
     }
  }

  echo $retornar;

  
}


public function get_divisionesyareas(){


  $divisiones=$this->Consultar_Columna_division($_POST["cedula_persona"]);

  echo json_encode($divisiones);
}


public function get_titulos(){


  $titulos=$this->Consultar_Columna_titulos($_POST["cedula_persona"]);

  echo json_encode($titulos);
}

public function add_division_areas(){
  $divisiones=$_POST['divisiones_info'];
  $divisiones_persona=$this->Consultar_comparacion_division($_POST['cedula_persona']);
  $areas_all=$this->modelo->Consultar_Tabla_divisiones($divisiones['nueva_areas'],$_POST['cedula_persona']);
  $retornar=$areas_all;
  $existe=false;
  if($areas_all){ 
     $this->modelo->Registrar_proyecto(
            $divisiones['nueva_areas'],
            $_POST['cedula_persona']
     );
     $consultadivision1 = $this->Consult_Tabl_divis1($divisiones['nueva_areas'],$_POST['cedula_persona']);
     $arr = explode(" ",$consultadivision1[0]['areas']);
     if($arr[0]== "Área"){
      $var = "";
     }else{
      $var = "Área de";
     }
     $this->modelo->Registrar_historial(
      "Agregado a la división de ". $consultadivision1[0]['divisiones'] .", ".$var ." ". $consultadivision1[0]['areas'] .".",
      $_POST['cedula_persona']
);
    }else{
      $retornar=0;
    } 
/*    $id=$this->Ultimo_Ingresado("proyecto","id_proyecto");
   $this->modelo->Registrar_persona_proyecto([
     "cedula_persona"=>$_POST['cedula_persona'],
     "id_proyecto"=>$id[0]['MAX(id_proyecto)']
   ]); */


/*      if($retornar!=0){
      $this->modelo->Registrar_persona_proyecto([
        "cedula_persona"=>$_POST['cedula_persona'],
        "id_proyecto"=>$proyecto['proyecto']
      ]);
     } */

  

 /*  } */

 /*  else{
    foreach($proyecto_persona as $pp){
      if($pp['id_proyecto']==$proyecto['proyecto']){
        $retornar=0;
      }
    }

    if($retornar!=0){
     $this->modelo->Registrar_persona_proyecto([
       "cedula_persona"=>$_POST['cedula_persona'],
       "id_proyecto"=>$proyecto['proyecto']
     ]);
    }

 
  } */

  echo $retornar;
}


public function add_titulos(){
  $titulos=$_POST['titulos_info'];
/*   $titulos_all=$this->modelo->Consultar_Tabla_titulos($titulos['titulo'],$_POST['cedula_persona']);
  $retornar=$areas_all; */
/*   if($titulos_all){  */
     $this->modelo->Registrar_titulo(
            $titulos['titulo'],
            $titulos['descipcion_titulo'],
            $_POST['cedula_persona']
     );
     $retornar=1;
/*     }else{
      $retornar=0;
    }  */
/*    $id=$this->Ultimo_Ingresado("proyecto","id_proyecto");
   $this->modelo->Registrar_persona_proyecto([
     "cedula_persona"=>$_POST['cedula_persona'],
     "id_proyecto"=>$id[0]['MAX(id_proyecto)']
   ]); */


/*      if($retornar!=0){
      $this->modelo->Registrar_persona_proyecto([
        "cedula_persona"=>$_POST['cedula_persona'],
        "id_proyecto"=>$proyecto['proyecto']
      ]);
     } */

  

 /*  } */

 /*  else{
    foreach($proyecto_persona as $pp){
      if($pp['id_proyecto']==$proyecto['proyecto']){
        $retornar=0;
      }
    }

    if($retornar!=0){
     $this->modelo->Registrar_persona_proyecto([
       "cedula_persona"=>$_POST['cedula_persona'],
       "id_proyecto"=>$proyecto['proyecto']
     ]);
    }

 
  } */

  echo $retornar;
}

}


