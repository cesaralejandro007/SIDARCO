<?php

class Inicio_Class extends Modelo
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

    private function SQL_01()
    {
        return "SELECT p.cedula_persona, p.fecha_nacimiento FROM personas p WHERE p.estado = 1 ORDER BY p.cedula_persona ASC";
    }

    public function consultar_password($contrasenia,$cedula)
    {
        $tabla= "SELECT * FROM personas WHERE contrasenia = '$contrasenia' and cedula_persona = '$cedula'";
        $respuesta_arreglo = '';
        try {
            $datos = $this->conexion->prepare($tabla);
            $datos->execute();
            $respuesta1 = $datos->rowCount();
            if ($respuesta1 > 0) {
                return 1;
            } else {
                return 0;
            }
            return $respuesta_arreglo;
        } catch (PDOException $e) {

            return $this->Capturar_Error($e);
        }
    }

    public function cambiar_password($password,$preguntas,$cedula)
    {
        try {
            $query = $this->conexion->prepare("UPDATE personas SET
                contrasenia           =:clave,
                preguntas_seguridad   =:preguntas,
                inicio_sesion         =:sesion 
                WHERE cedula_persona  =:cedula"
            );
            $query->execute([
                'clave'            =>$password, 
                'preguntas'             =>$preguntas,
                'sesion'             =>2,
                'cedula'     =>$cedula
            ]);
            return true;
        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }
    
    public function actualizarperfil($correo,$telefono,$cedula)
    {
        try {
            $query = $this->conexion->prepare("UPDATE personas SET
                correo           =:correo,
                telefono         =:telefono
                WHERE cedula_persona  =:cedula"
            );
            $query->execute([
                'correo'            =>$correo, 
                'telefono'             =>$telefono,
                'cedula'     =>$cedula
            ]);
            return true;
        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }

}
