<?php

class Consultas_Class extends Modelo
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

        return "SELECT id_negocio, nombre_negocio, direccion_negocio, cedula_propietario, rif_negocio, c.id_calle, c.nombre_calle, n.estado FROM negocios n INNER JOIN calles c WHERE n.estado = 1 AND n.id_calle = c.id_calle";
    } 

    private function SQL_02()
    {
        return 'INSERT INTO consulta ( id_familia_persona, cedula, fecha_consulta, motivo, instrucciones) VALUES ( :id_familia_persona, :cedula, :fecha_consulta, :motivo, :instrucciones)';
    }

    private function SQL_03()
    {
        return "UPDATE negocios  SET id_calle = :id_calle, nombre_negocio = :nombre_negocio, direccion_negocio = :direccion_negocio, cedula_propietario = :cedula_propietario, rif_negocio = :rif_negocio,estado = :estado WHERE id_negocio = :id_negocio";
    }

    private function SQL_04()
    {

        return "SELECT cedula_persona, id_familia_persona FROM familia_personas GROUP BY cedula_persona ";

    }
L
    private function SQ_05()
    {

        return "SELECT * FROM inventario  ";

    }
    private function SQL_06(){

        return 'INSERT INTO inventario_consulta ( id_consulta, id_inventario) VALUES (:id_consulta, :id_inventario)';
    }


}
