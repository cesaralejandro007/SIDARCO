<?php

class Perfil_Class extends Modelo 
{ 

    public function __construct()
    {   
        parent::__construct();
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

    public function editar_perfil($password,$preguntas,$cedula)
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

}
?>