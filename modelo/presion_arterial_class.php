<?php

class presion_arterial_Class extends Modelo
{

    public function __construct()
    {
        parent::__construct();
    }

    public function Administrar()
    {
        $this->sentencia = $this->{$this->SQL}();
        try {

            switch ($this->tipo) {
                case '0':

                    return $this->Resultado_Consulta();

                    break;
                case '1':

                    return $this->Ejecutar_Tarea();
                    break;
                default:
                    die('[Error 400] => "La Peticion es Incorrecta, solo se permite peticion de tipo 0/1."');
                    break;

            }
        } catch (PDOException $e) {

            return $this->Capturar_Error($e);

        }
    }

    // ===============================================================================

    private function SQL_01()
    {
        return "SELECT concat(DATE_FORMAT(fecha_presion, '%d/%m/%Y'),' ', TIME_FORMAT(fecha_presion, '%H:%i:%s') ) AS fecha_hora, cedula_persona, fecha_presion, t_a, f_c, nota FROM presiones_arteriales WHERE estado=1";
    }

    private function SQL_02()
    {
        return "INSERT INTO presiones_arteriales (cedula_persona, t_a, f_c, nota, estado) VALUES (:cedula_persona, :t_a, :f_c, :nota, :estado)";
    }

    private function SQL_03()
    {
        return "SELECT p.cedula_persona,p.primer_nombre,p.primer_apellido FROM personas p WHERE p.estado = 1 ORDER BY p.cedula_persona ASC";
    }

    private function SQL_04()
    {
        return "SELECT D.*,DP.* FROM discapacidad D, discapacidad_persona DP WHERE DP.id_discapacidad=D.id_discapacidad AND D.estado=1";
    }
     /*

    private function SQL_05()
    {
        return "SELECT D.*,DP.* FROM discapacidad D, discapacidad_persona DP WHERE  DP.id_discapacidad=D.id_discapacidad AND D.estado=1 AND DP.cedula_persona= " . $this->cedula;
    } */

    /* private function SQL_06()
    {
        return "INSERT INTO presiones_arteriales (cedula_persona, fecha_presion, t_a, f_c, nota) VALUES (:cedula_persona, :fecha_presion, :t_a, :f_c, :nota)";
    } */

}
