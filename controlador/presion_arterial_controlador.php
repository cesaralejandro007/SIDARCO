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
        $this->modelo->__SET("SQL", "SQL_01");$this->datos["presiones_arteriales"] = $this->modelo->Administrar();
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

            case 'Administrar':
                if (isset($_POST['datos'])) {
                    $this->modelo->Datos($_POST['datos']);
                } else {
                    $this->modelo->Estado($_POST['estado']);
                    $this->modelo->Datos([
                        $_POST['estado']["id_tabla"] => $_POST['estado']["param"],
                        "estado"                     => $_POST['estado']["estado"],
                    ]);
                }

                $this->modelo->__SET("SQL", $_POST['sql']);$this->modelo->__SET("tipo", "1");

                if ($this->modelo->Administrar()) {$this->mensaje = 1; $this->Accion($_POST['accion']);}

                echo $this->mensaje;unset($_POST, $this->mensaje);
                break;

            case 'Consulta_Ajax':

                $retornar = [];
                foreach ($this->datos["presiones_arteriales"] as $p) {
                    $discapacidades_p  = '<table style="width:100%">';$id_discapacidad_p = [];
                  /*   foreach ($this->datos["discapacidades"] as $dis) {
                        if ($dis['cedula_persona'] == $d['cedula_persona']) {
                            $en_cama_valor = "";
                            $dis['en_cama'] == '1' ? $en_cama_valor = 'Si' : $en_cama_valor = 'No';
                            $discapacidades_p .= "<tr><td>" . $dis['nombre_discapacidad'] . "</td><td>" . $en_cama_valor . "</td><td>" . $dis['necesidades_discapacidad'] . "</td><td>" . $dis['observacion_discapacidad'] . "</td></tr>";
                            $id_discapacidad_p[] = $dis['id_discapacidad_persona'] . "/";
                        }
                    } */
                   /*  $discapacidades_p = "<div style='overflow-y:scroll;width:100%;height:100px;background:#D4E6F4;'>" . $discapacidades_p . "</div></table>"; */

                    $retornar[] = [
                        "cedula_nombre"  => $p['cedula_persona']." ".$p['primer_nombre']." ".$p['primer_apellido'],
                        "edad"           => $p['edad'],
                        "genero"         => $p['genero'],
                        "fecha"          => $p['fecha_hora'],
                        "t_a"            => $p['t_a'],
                        "f_c"            => $p['f_c'],
                        "nota"           => $p['nota'],
                        /* "discapacidades" => $discapacidades_p, */
                        "editar"         => "<button type='button' class='btn' style='background:#EEA000; color:white;' onclick='editar(`" . $p['cedula_persona'] . "`)' data-toggle='modal' data-target='#actualizar'><em class='fa fa-edit'></em></button>",
                        "eliminar"       => "<button class='btn' style='background:#9D2323; color:white;' onclick='eliminar(`" . $p['cedula_persona'] . "`)' type='button'><em class='fa fa-trash'></em></button>",
                    ];
                }
                $this->Escribir_JSON($retornar);
                unset($retornar, $discapacidades_p, $id_discapacidad_p, $en_cama_valor);
                break;






                $this->Escribir_JSON($this->datos["presiones_arteriales"]);
                break;
                $this->Escribir_JSON($retornar);
                unset($retornar, $discapacidades_p, $id_discapacidad_p, $en_cama_valor);
                break;

            case 'Datos':
                /* $this->modelo->__SET("SQL", "SQL_05"); $this->modelo->__SET("tipo", "0"); */
                /* $this->modelo->__SET("cedula", $_POST['cedula']);
                $discapacidades = $this->modelo->Administrar();
                $this->Escribir_JSON($discapacidades);unset($_POST, $discapacidades); */
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