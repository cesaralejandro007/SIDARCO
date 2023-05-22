 <?php

 class Familias_Class extends Modelo
 {

    public function __construct()
    {
        parent::__construct();
    }


    public function Consultar_viviendas()
    {

        $tabla            = "SELECT * FROM vivienda WHERE estado=1";
        $respuesta_arreglo = '';
        try {
            $datos = $this->conexion->prepare($tabla);
            $datos->execute();
            $datos->setFetchMode(PDO::FETCH_ASSOC);
            $respuesta_arreglo = $datos->fetchAll(PDO::FETCH_ASSOC);
            return $respuesta_arreglo;
        } catch (PDOException $e) {

            return $this->Capturar_Error($e);
        }
    }


    public function Consultar_personas()
    {

        $tabla            = "SELECT * FROM personas WHERE estado=1";
        $respuesta_arreglo = '';
        try {
            $datos = $this->conexion->prepare($tabla);
            $datos->execute();
            $datos->setFetchMode(PDO::FETCH_ASSOC);
            $respuesta_arreglo = $datos->fetchAll(PDO::FETCH_ASSOC);
            return $respuesta_arreglo;
        } catch (PDOException $e) {

            return $this->Capturar_Error($e);
        }
    }


    public function get_familias()
    {

        $tabla            = "SELECT F.*,V.* FROM familia F , vivienda V WHERE F.estado=1 AND F.id_vivienda=V.id_vivienda";
        $respuesta_arreglo = '';
        try {
            $datos = $this->conexion->prepare($tabla);
            $datos->execute();
            $datos->setFetchMode(PDO::FETCH_ASSOC);
            $respuesta_arreglo = $datos->fetchAll(PDO::FETCH_ASSOC);
            return $respuesta_arreglo;
        } catch (PDOException $e) {

            return $this->Capturar_Error($e);
        }
    }

    public function get_integrantes($id_familia)
    {

        $tabla            = "SELECT P.* FROM familia_personas FP, personas P WHERE FP.id_familia='$id_familia' AND FP.cedula_persona = P.cedula_persona";
        $respuesta_arreglo = '';
        try {
            $datos = $this->conexion->prepare($tabla);
            $datos->execute();
            $datos->setFetchMode(PDO::FETCH_ASSOC);
            $respuesta_arreglo = $datos->fetchAll(PDO::FETCH_ASSOC);
            return $respuesta_arreglo;
        } catch (PDOException $e) {

            return $this->Capturar_Error($e);
        }
    }


    public function Registrar_Familia($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO familia (
                id_vivienda,
                cedula,
                primer_nombre, 
                segundo_nombre, 
                primer_apellido,
                segundo_apellido,
                estado

                ) VALUES (
                :id_vivienda,
                :cedula,
                :primer_nombre, 
                :segundo_nombre, 
                :primer_apellido,
                :segundo_apellido,
                :estado
            )');

            $datos->execute([
                'id_vivienda'         => $data['id_vivienda'],
                'cedula'              => $data["cedula_persona"],
                'primer_nombre'       => $data['primer_nombre'],
                'segundo_nombre'      => $data['segundo_nombre'],
                'primer_apellido'     =>$data['primer_apellido'],
                'segundo_apellido'    =>$data['segundo_apellido'],
                'estado'              => $data['estado']
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }


    public function Actualizar_Familia($data)
    {

       try {
            $query = $this->conexion->prepare("UPDATE familia  SET
                id_vivienda     =   :id_vivienda,
                condicion_ocupacion  =   :condicion_ocupacion,
                nombre_familia     =   :nombre_familia,
                observacion  =   :observacion,
                telefono_familia     =   :telefono_familia,
                ingreso_mensual_aprox  =   :ingreso_mensual_aprox,
                estado     =   :estado
                
                WHERE id_familia =:id_familia"
            );

            $query->execute([
                'id_familia'  => $data['id_familia'],
               'id_vivienda'  => $data['id_vivienda'],
                'condicion_ocupacion' => $data["condicion_ocupacion"],
                'nombre_familia'        => $data['nombre_familia'],
                'observacion'      => $data['observacion'],
                'telefono_familia'    =>$data['telefono_familia'],
                'ingreso_mensual_aprox'        =>$data['ingreso_mensual_aprox'],
                'estado'      => $data['estado']
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }

        public function Registrar_Integrante($data){

            try{

           
            $datos=$this->conexion->prepare("INSERT INTO familia ()
            id_familia,
            id_vivienda,
            cedula,
            primer_nombre,
            segundo_nombre,
            primer_apellido,
            segundo_apellido
            
             VALUES(

            :id_familia,
            :id_vivienda,
            :cedula,
            :primer_nombre,
            :segundo_nombre,
            :primer_apellido,
            :segundo_apellido

             )");

            $datos->execute([
                
            'cedula'        => $data['cedula'],
            'primer_nombre' => $data['primer_nombre'],
            ''





            ])



            }catch(PdoException $e){

            }






        }







    public function Registrar_persona_familia($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO familia_personas (
                id_familia,
                cedula_persona        
                ) VALUES (
                :id_familia,
                :cedula_persona
            )');

            $datos->execute([
                'id_familia'      => $data['id_familia'],
                'cedula_persona'   => $data['cedula_persona']
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }





}
