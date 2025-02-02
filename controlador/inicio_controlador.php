<?php

class Inicio extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        //  $this->Cargar_Modelo("inicio");
    }

    public function Establecer_Consultas()
    {
        $this->modelo->__SET("tipo", "0");
        $this->modelo->__SET("SQL", "_01_");
        $this->modelo->__SET("consultar", array("tabla" => "calles", "estado" => 1, "orden" => "nombre_calle"));
        $this->datos["calle"] = $this->modelo->Administrar();
        $this->modelo->__SET("SQL", "_01_");
        $this->modelo->__SET("consultar", array("tabla" => "vivienda", "estado" => 1, "orden" => "id_vivienda"));
        $this->datos["viviendas"] = $this->modelo->Administrar();
        $this->modelo->__SET("SQL", "SQL_01");$this->datos["personas"] = $this->modelo->Administrar();
        $this->modelo->__SET("SQL", "_06_");
        $this->modelo->__SET("consultar", array("tabla" => "comite_persona", "orden" => "cedula_persona"));
        $this->datos["miembros_consejo"] = $this->modelo->Administrar();

        $adulto_mayor = 0;$menores_edad = 0;$votantes     = 0;

        foreach ($personas as $p) {
            $anio = explode('-', $p["fecha_nacimiento"]);$edad = date("Y") - $anio[0];

            $this->modelo->__SET("SQL", "_05_");
            $this->modelo->__SET("consultar", array(
                "tabla"   => "votantes_centro_votacion",
                "columna" => "cedula_votante",
                "data"    => $p['cedula_persona'],
            ));
            $this->datos["centro_votante"] = $this->modelo->Administrar();

            if ($edad <= 17) {$menores_edad++;}
            if ($edad > 55) {$adulto_mayor++;}
            if (count($this->datos["centro_votante"]) != 0) {$votantes++;}

        }
        $this->datos["cantidad_viviendas"] = count($this->datos["viviendas"]);
        $this->datos["cantidad_personas"]  = count($this->datos["personas"]);
        $this->datos["cantidad_calles"]    = count($this->datos["calle"]);
        $this->datos["cantidad_miembros"]  = count($this->datos["miembros_consejo"]);
        $this->datos["menores_edad"]       = $menores_edad;
        $this->datos["adulto_mayor"]       = $adulto_mayor;
        $this->datos["votantes"]           = $votantes;
        $this->vista->datos = $this->datos;
        unset($menores_edad,$adulto_mayor,$votantes,$anio,$edad);
    }

    public function Cargar_Vistas()
    {
        $this->Seguridad_de_Session();$this->Establecer_Consultas();
        $this->vista->Cargar_Vistas('inicio/index');
        unset($this->datos,$this->vista->datos,);
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
          $_SESSION['inicio_sesion'] = 2;
          echo 1;
      }
      public function actualizarperfil(){
          $this->modelo->actualizarperfil($_POST['correo'],$_POST['telefono'],$_POST['cedula']);
          $_SESSION['correo'] = $_POST['correo'];
          $_SESSION['telefono'] = $_POST['telefono'];
          echo 1;
      }
      
}
