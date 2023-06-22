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

    
    public function Consultar_familia()
    {

        $tabla            = "SELECT * FROM familia WHERE estado=1";
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

    public function Consultar_integrante($cedula)
    {

        $tabla            = "SELECT * FROM familia WHERE estado=1 AND cedula_integrante = $cedula";
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


    public function Buscar_Persona($cedula, $parentezco)
    {

        $tabla            = "SELECT * FROM  familia_personas as fp  inner join familia as fa WHERE fa.cedula_integrante='$cedula' and fp.parentezco='$parentezco' ";
        $respuestaArreglo = '';
        try {
            $datos = $this->conexion->prepare($tabla);
            $datos->execute();
            $datos->setFetchMode(PDO::FETCH_ASSOC);
            $respuestaArreglo = $datos->fetchAll(PDO::FETCH_ASSOC);
            return $respuestaArreglo;
        } catch (PDOException $e) {

           return $this->Capturar_Error($e);
        }
    } 


    public function Integrantes_consultas()
    {

        $tabla            = "SELECT * FROM familia WHERE estado=1";
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

    public function Integrantes_familia($cedula)
    {

        $tabla            = "SELECT * FROM familia WHERE estado=1 AND cedula_integrante= $cedula";
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

        $tabla            = "SELECT F.*,fp.*, p.primer_nombre as primer_nombre_p, p.primer_apellido as primer_apellido_p FROM familia F, personas p, familia_personas fp WHERE F.estado=1 AND F.id_familia=fp.id_familia AND fp.cedula_persona = p.cedula_persona GROUP BY fp.cedula_persona";
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

    public function get_integrantes($cedula_persona)
    {

        $tabla            = "SELECT P.*,FP.*,f.*, f.cedula_integrante as cedula_persona_f, f.primer_nombre as primer_nombre_f, f.primer_apellido as primer_apellido_f FROM familia_personas FP, personas P, familia f WHERE P.cedula_persona='$cedula_persona' AND f.id_familia = FP.id_familia AND FP.cedula_persona = P.cedula_persona";
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

    public function existe($cedula_integrante)
    {
        $tabla            = "SELECT * FROM familia_personas, familia WHERE estado=1 AND familia_personas.id_familia = familia.id_familia AND familia.cedula_integrante = $cedula_integrante";
        $respuesta_arreglo = '';
        try {
            $datos = $this->conexion->prepare($tabla);
            $datos->execute();
            $respuesta = $datos->rowCount();
            if($respuesta > 0){
                return true;
            }
            else{
                return false;
            }
        } catch (PDOException $e) {

            return $this->Capturar_Error($e);
        }
    }
    
    public function existeintegrante($cedula_integrante)
    {
        $tabla            = "SELECT * FROM familia WHERE estado=1 AND cedula_integrante = $cedula_integrante";
        $respuesta_arreglo = '';
        try {
            $datos = $this->conexion->prepare($tabla);
            $datos->execute();
            $respuesta = $datos->rowCount();
            if($respuesta > 0){
                return false;
            }
            else{
                return true;
            }
        } catch (PDOException $e) {

            return $this->Capturar_Error($e);
        }
    }

    public function existepadre($cedula_responsable)
    {
        $tabla            = "SELECT * FROM familia_personas, familia WHERE estado=1 AND familia_personas.id_familia = familia.id_familia  AND familia_personas.cedula_persona = $cedula_responsable AND familia_personas.parentezco = 'Padre'";
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

    public function existemadre($cedula_responsable)
    {
        $tabla            = "SELECT * FROM familia_personas, familia WHERE estado=1 AND familia_personas.id_familia = familia.id_familia  AND familia_personas.cedula_persona = $cedula_responsable AND familia_personas.parentezco = 'Madre'";
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

    public function existeconyugue($cedula_responsable)
    {
        $tabla            = "SELECT * FROM familia_personas, familia WHERE estado=1 AND familia_personas.id_familia = familia.id_familia  AND familia_personas.cedula_persona = $cedula_responsable AND familia_personas.parentezco = 'Conyugue'";
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

    public function Registrar_Fami($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO familia (
                cedula_integrante,
                primer_nombre, 
                segundo_nombre, 
                primer_apellido,
                segundo_apellido,
                estado,
                fecha_nacimiento,
                genero,
                nivel_educativo,
                correo,
                telefono

                ) VALUES (
                :cedula_integrante,
                :primer_nombre, 
                :segundo_nombre, 
                :primer_apellido,
                :segundo_apellido,
                :estado,
                :fecha_nacimiento,
                :genero,
                :nivel_educativo,
                :correo,
                :telefono
            )');

            $datos->execute([
                'cedula_integrante'    => $data['cedula_integrante'],
                'primer_nombre'        => $data['primer_nombre'],
                'segundo_nombre'       => $data['segundo_nombre'],
                'primer_apellido'      =>$data['primer_apellido'],
                'segundo_apellido'     =>$data['segundo_apellido'],
                'estado'               => $data['estado'],
                'fecha_nacimiento'     =>$data['fecha_nacimiento'],
                'genero'               =>$data['genero'],
                'nivel_educativo'      =>$data['nivel_educativo'],
                'correo'               =>$data['correo'],
                'telefono'             =>$data['telefono']
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }






    public function Actualizar_Familia($data)
    {
       try {
            $query = $this->conexion->prepare("UPDATE familia_personas SET
                nombre_familia     =   :nombre_familia,
                descripcion_familia  =   :descripcion_familia
                WHERE cedula_persona =:cedula_persona"
            );
            $query->execute([
                'cedula_persona'  => $data['responsable_familia'],
                'nombre_familia'        => $data['nombre_familia'],
                'descripcion_familia'      => $data['descripcion_familia']
            ]);
            return true;
        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }

       /*  public function Registrar_Integrante($data){

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



        } */




    public function Registrar_persona_familia($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO familia_personas (
                id_familia,
                cedula_persona,
                nombre_familia,
                descripcion_familia,
                parentezco
                ) VALUES (
                :id_familia,
                :cedula_persona,
                :nombre_familia,
                :descripcion_familia,
                :parentezco

            )');

            $datos->execute([
                'id_familia'      => $data['id_familia'],
                'cedula_persona'   => $data['cedula_persona'],
                'nombre_familia'    =>$data['nombre_familia'],
                'descripcion_familia' =>$data['descripcion_familia'],
                'parentezco'          =>$data['parentezco']
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }





}
