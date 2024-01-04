<?php

class Consultas extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        //   $this->Cargar_Modelo("negocios");
        
    }
    public function Cargar_Vistas()
    {

        $this->Seguridad_de_Session();$this->vista->Cargar_Vistas('consultas/consultar');
    
    } 
    // ==============================================================================
    

    public function Establecer_Consultas()
    {
        $this->modelo->__SET("tipo", "0");
        $this->modelo->__SET("SQL", "SQL_01");$this->datos["negocios"] = $this->modelo->Administrar();
        $this->modelo->__SET("SQL", "_01_");
        $this->modelo->__SET("consultar", array("tabla" => "calles", "estado" => 1, "orden" => "nombre_calle"));
        $this->datos["calle"] = $this->modelo->Administrar();
        $this->modelo->__SET("SQL", "SQL_04");$this->datos["personas"] = $this->modelo->Administrar();
        $this->modelo->__SET("SQL", "SQL_05");$this->datos["inventario"] = $this->modelo->Administrar();
        $this->vista->datos = $this->datos;
    }

    

    public function Administrar($peticion = null)
    {
        $this->Seguridad_de_Session();$this->Establecer_Consultas();
        if (isset($_POST['peticion'])) {$peticion = $_POST['peticion'];} else { $peticion = $peticion[0];}

        switch ($peticion) {
            case 'Registros':$this->vista->Cargar_Vistas('consultas/registrar');break;
            case 'Consultas':$this->vista->Cargar_Vistas('consultas/consultar');break;

            case 'Administrar':
                if (isset($_POST['datos'])) {
                    $this->modelo->Datos($_POST['datos']);
                } else {
                /*   $this->modelo->Estado($_POST['estado']);
                    $this->modelo->Datos([
                        $_POST['estado']["id_tabla"] => $_POST['estado']["param"],
                        "estado"                     => $_POST['estado']["estado"], */
                   /*  ]); */
                }

                $this->modelo->__SET("SQL", $_POST['sql']);$this->modelo->__SET("tipo", "1");

                if ($this->modelo->Administrar()) {$this->mensaje = 1; $this->Accion($_POST['accion']);}

                echo $this->mensaje;unset($_POST, $this->mensaje);
                break;

            case 'Registrar':

                if (isset($_POST['datos'])) {
                    $this->modelo->Datos($_POST['datos']);
                } else {
                /*   $this->modelo->Estado($_POST['estado']);
                    $this->modelo->Datos([
                        $_POST['estado']["id_tabla"] => $_POST['estado']["param"],
                        "estado"                     => $_POST['estado']["estado"], */
                   /*  ]); */
                }

                $this->modelo->__SET("SQL", $_POST['sql']);$this->modelo->__SET("tipo", "1");

                if ($this->modelo->Administrar()) {$this->mensaje = 1; $this->Accion($_POST['accion']);}

                echo $this->mensaje;unset($_POST, $this->mensaje);
                
                return;


            case 'Consulta_Ajax':$this->Escribir_JSON($this->datos["familia_personas"]);break;

            case 'Existente':

                foreach ($this->datos["negocios"] as $key => $value) {
                    if ($value["rif_negocio"] == $_POST['rif_negocio']) {$existente = 1;} else {$existente = 0;}
                }
                echo ($existente);unset($existente);
                break;

            case 'Consulta_familia':

                $id_familia_persona=$_POST['id_familia_persona'];
                echo $this->vista->personas=$this->Consultar_Familia_Persona($id_familia_persona);
                return;

                break;

        /*    case 'Registrar_medic':

                $id_inventario=$_POST['inventario'];
                echo $this->vista->personas=$this->registrar_consulta_inventario($id_inventario);
                
                
                return;
    
                break; */

            case 'Consultas_Calle':
                foreach ($this->datos["calle"] as $key => $value) {
                    if ($value["nombre_calle"] == $_POST['calle']) { $id = $value["id_calle"];}
                }
                echo $id;unset($id);
                break;

            default:$this->vista->Cargar_Vistas('error/400');break;
        }
        unset($peticion, $this->datos, $this->vista->datos);
        exit();
    }
}
