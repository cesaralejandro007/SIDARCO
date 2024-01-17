<?php

class Inventario_Class extends Modelo
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
        return "SELECT *from inventario";
    }

    private function SQL_02()
    {
        return "INSERT INTO inventario (medicamento, unidades, id_grupo , caducidad, lote, pertenece, estado ) VALUES (:medicamento, :unidades, :id_grupo, :caducidad, :lote, :pertenece, :estado)";
    }

    private function SQL_03()
    {
        return "UPDATE inventario  SET medicamento = :medicamento, unidades = :unidades, id_grupo = :id_grupo, caducidad = :caducidad, lote = :lote, pertenece = :pertenece, estado = :estado WHERE id_inventario = :id_inventario";
    }


}
