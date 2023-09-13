<?php

class presion_arterial extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        //  $this->Cargar_Modelo("discapacitados");
    }
    public function Cargar_Vistas()
    {
        $this->Seguridad_de_Session();$this->Establecer_Consultas();
        $this->vista->Cargar_Vistas('presion_arterial/consultar');
    }
    // ==============================================================================
    public function Establecer_Consultas()
    {
        //Método mágico __set ASIGNAMOS EL VALOR 
        $this->modelo->__SET("tipo", "0");
        $this->modelo->__SET("SQL", "SQL_03");$this->datos["personas"] = $this->modelo->Administrar();
        $this->modelo->__SET("SQL", "SQL_01");$this->datos["presion_arterial"] = $this->modelo->Administrar();
        $this->modelo->__SET("SQL", "SQL_04");$this->datos["discapacidades"] = $this->modelo->Administrar();
       /*  $this->modelo->__SET("SQL", "SQL_02");$this->datos["discapacitados"] = $this->modelo->Administrar(); */
        $this->vista->datos = $this->datos;
    }
    public function Administrar($peticion = null)
    {
        $this->Seguridad_de_Session();$this->Establecer_Consultas();
        if (isset($_POST['peticion'])) {$peticion = $_POST['peticion'];} else { $peticion = $peticion[0];}

        switch ($peticion) {
            case 'Registros':$this->vista->Cargar_Vistas('presion_arterial/registrar');break;
            case 'Consultas':$this->vista->Cargar_Vistas('presion_arterial/consultar');break;

            case 'Eliminar':
                $this->modelo->__SET("eliminar", array(
                    "tabla"    => $_POST['estado']["tabla"],
                    "id_tabla" => $_POST['estado']["id_tabla"])
                );
                $this->modelo->Datos([$_POST['estado']["id_tabla"] => $_POST['estado']["param"]]);
                $this->modelo->__SET("SQL", $_POST['sql']);$this->modelo->__SET("tipo", "1");

                if ($this->modelo->Administrar()) {$this->mensaje = 1;$this->Accion($_POST['accion']);}

                echo $this->mensaje;unset($_POST, $this->mensaje);
                break;
            case 'Registrar':
                for ($i = 0; $i < count($_POST['presion_arterial']); $i++) {
                    if ($_POST['presion_arterial'][$i]['nuevo'] == '0') {
                        $this->modelo->__SET("SQL", $_POST['sql']); $this->modelo->__SET("tipo", "1");
                        $this->modelo->Datos([
                            "cedula_persona"           => $_POST['cedula'],
                            "fecha_presion"            => $_POST['presion_arterial'][$i]['fecha_tension'],
                            "t_a"                      => $_POST['presion_arterial'][$i]['t_a'],
                            "f_c"                      => $_POST['presion_arterial'][$i]['f_c'],
                            "nota"                     => $_POST['presion_arterial'][$i]['nota'],
                        ]);

                        if ($this->modelo->Administrar()) {$this->mensaje = 1;}
                    } else {
                        $this->modelo->__SET("SQL", "_02_");$this->modelo->__SET("tipo", "1");
                        $this->modelo->__SET("registrar", array("tabla" => "presiones_arteriales", "columna" => "nombre_discapacidad"));
                        $this->modelo->Datos(["nombre_discapacidad" => $_POST['discapacidades'][$i]['discapacidad'], "estado" => 1]);

                        if ($this->modelo->Administrar()) {
                            $this->modelo->__SET("SQL", "_03_"); $this->modelo->__SET("tipo", "0");
                            $this->modelo->__SET("ultimo", array("tabla" => "discapacidad", "id" => "id_discapacidad"));
                            $id = $this->modelo->Administrar();

                            foreach ($id as $id_e) {
                                $this->modelo->__SET("SQL", $_POST['sql']);$this->modelo->__SET("tipo", "1");
                                $this->modelo->Datos([
                                    "cedula_persona"           => $_POST['cedula'],
                                    "fecha_presion"            => $_POST['discapacidades'][$i]['fecha_presion'],
                                    "t_a"                      => $_POST['discapacidades'][$i]['t_a'],
                                    "f_c"                      => $_POST['discapacidades'][$i]['f_c'],
                                    "nota"                     => $_POST['discapacidades'][$i]['nota'],
                                ]);
                                if ($this->modelo->Administrar()) {$this->mensaje = 1;}
                            }
                        }
                    }
                }
                echo $this->mensaje;unset($this->mensaje, $id, $_POST);
                break;
            case 'Consulta_Ajax':$this->Escribir_JSON($this->datos["presiones_arteriales"]);break;

            
                
                $this->Escribir_JSON($retornar);
                unset($retornar, $discapacidades_p, $id_discapacidad_p, $en_cama_valor);
                break;

            case 'Datos':
                $this->modelo->__SET("SQL", "SQL_05"); $this->modelo->__SET("tipo", "0");
                $this->modelo->__SET("cedula", $_POST['cedula']);
                $discapacidades = $this->modelo->Administrar();
                $this->Escribir_JSON($discapacidades);unset($_POST, $discapacidades);
                break;

            case 'Eliminar_Discapacidad':
                $retornar = 0;
                $this->modelo->__SET("SQL", "_07_"); $this->modelo->__SET("tipo", "1");
                $this->modelo->__SET("eliminar", array("tabla" => "discapacidad_persona", "id_tabla" => "id_discapacidad_persona"));
                $this->modelo->Datos(["id_discapacidad_persona" => $_POST['id_discapacidad_persona']]);

                if ($this->modelo->Administrar()) {
                    $this->modelo->__SET("tipo", "0");$this->modelo->__SET("SQL", "_05_");
                    $this->modelo->__SET("consultar", array(
                        "tabla"   => "discapacidad_persona",
                        "columna" => "cedula_persona",
                        "data"    => $_POST['cedula_persona'],
                    ));
                    $discapacidades = $this->modelo->Administrar();
                    if (count($discapacidades) != 0) {
                        $retornar = [];
                        for ($i = 0; $i < count($discapacidades); $i++) {
                            $this->modelo->__SET("tipo", "0");
                            $this->modelo->__SET("SQL", "_05_");
                            $this->modelo->__SET("consultar", array(
                                "tabla"   => "discapacidades",
                                "columna" => "id_enfermedad",
                                "data"    => $discapacidades[$i]['id_enfermedad'],
                            ));
                            $enfer      = $this->modelo->Administrar();
                            $retornar[] = [
                                "nombre_discapacidad"     => $enfer[0]['nombre_discapacidad'],
                                "id_discapacidad_persona" => $discapacidades[$i]['id_discapacidad_persona'],
                            ];
                        }
                    }
                }
                echo json_encode($retornar);
                unset($discapacidades, $retornar, $enfer, $_POST);
                break;
            case 'Personas':
                $this->modelo->__SET("tipo", "0"); $this->modelo->__SET("SQL", "_05_");
                $this->modelo->__SET("consultar", array(
                    "tabla"   => "personas",
                    "columna" => "cedula_persona",
                    "data"    => $_POST['cedula'],
                ));
                $persona = $this->modelo->Administrar();

                if (count($persona) == 0) {echo 0;} else {$this->Escribir_JSON($persona);}
                unset($persona, $_POST);
                break;
                
            default:$this->vista->Cargar_Vistas('error/400');break;
        }
        unset($peticion, $this->datos, $this->vista->datos);
        exit();
    }
}