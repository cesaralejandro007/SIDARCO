 <?php

 class Permisos_Class extends Modelo
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

        $tabla            = "SELECT * FROM  familia, familia_personas WHERE cedula_integrante='$cedula' or parentezco='$parentezco' ";
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

        $tabla            = "SELECT F.*,fp.*,cn.*,up.*, p.primer_nombre as primer_nombre_p, p.primer_apellido as primer_apellido_p FROM familia F, personas p, cargo_nominal cn ,ubicaciones up ,familia_personas fp WHERE F.estado=1 AND F.id_familia=fp.id_familia AND fp.cedula_persona = p.cedula_persona AND cn.id_cargo = p.id_cargo and up.id_ubicacion = p.id_ubicacion GROUP BY fp.cedula_persona";
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
        $tabla            = "SELECT P.*,FP.*,f.*, TIMESTAMPDIFF(YEAR, F.fecha_nacimiento, CURDATE()) - CASE WHEN MONTH(f.fecha_nacimiento) > MONTH(CURDATE()) OR (MONTH(f.fecha_nacimiento) = MONTH(CURDATE()) AND DAY(f.fecha_nacimiento) > DAY(CURDATE()))THEN 1 ELSE 0 END AS edad, f.cedula_integrante as cedula_persona_f,date_format(F.fecha_nacimiento, '%d/%m/%Y') as fecha_nacimientoFa, f.primer_nombre as primer_nombre_f, f.primer_apellido as primer_apellido_f , f.fecha_nacimiento as fecha_nacimiento_f , f.genero as genero_f, f.nivel_educativo as nivel_educativo_f, f.correo as correo_f, f.telefono as telefono_f FROM familia_personas FP, personas P, familia f, cargo_nominal cn ,ubicaciones up WHERE P.cedula_persona='$cedula_persona' AND f.id_familia = FP.id_familia AND FP.cedula_persona = P.cedula_persona AND cn.id_cargo = P.id_cargo and up.id_ubicacion = P.id_ubicacion ";
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

    

    public function get_integrante($cedula_integrante)
    {

        $tabla            = "";
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
    

    public function get_familias_integrante($id)
    {

        $tabla            = "SELECT * FROM familia_personas,familia WHERE familia_personas.id_familia = familia.id_familia AND familia_personas.id_familia_persona = $id";
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

    public function Actualizar_Familia_integrante($id,$parentezco)
    {

        try {
            $query = $this->conexion->prepare("UPDATE familia_personas  SET
                parentezco           =:parentezco
                WHERE id_familia_persona =:id_familia_persona"
            );
            $query->execute([
                'parentezco'            =>$parentezco, 
                'id_familia_persona'            =>$id
            ]);

            return 1;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }
    public function Actualizar_tabla_familia($id_familia,$cedula,$nombre,$segundo_nombre,$apellido,$segundo_apellido,$genero,$fecha_nacimiento,$nivel_educativo,$correo,$telefono,$camisa,$pantalon,$calazado)
    {

        try {
            $query = $this->conexion->prepare("UPDATE familia  SET
                cedula_integrante           ='$cedula',
                primer_nombre          ='$nombre',
                segundo_nombre          ='$segundo_nombre',
                primer_apellido         ='$apellido',
                segundo_apellido         ='$segundo_apellido',
                genero         ='$genero',
                fecha_nacimiento         ='$fecha_nacimiento',
                nivel_educativo         ='$nivel_educativo',
                correo         ='$correo',
                telefono         ='$telefono',
                camisa         ='$camisa',
                pantalon         ='$pantalon',
                calzado         ='$calazado'
                WHERE id_familia ='$id_familia'"
             );

            $query->execute();

            return 1;

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
    public function existe1($cedula_integrante,$id)
    {
        $tabla            = "SELECT * FROM familia_personas, familia WHERE estado=1 AND familia_personas.id_familia = familia.id_familia AND familia.cedula_integrante = $cedula_integrante AND familia.id_familia != $id";
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
    public function existepadre_edit($cedula_responsable, $id)
    {
        $tabla            = "SELECT * FROM familia_personas, familia WHERE estado=1 AND familia_personas.id_familia = familia.id_familia  AND familia_personas.cedula_persona = $cedula_responsable AND familia_personas.parentezco = 'Padre' AND familia.id_familia != $id";
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

    public function existemadre_edit($cedula_responsable,$id)
    {
        $tabla            = "SELECT * FROM familia_personas, familia WHERE estado=1 AND familia_personas.id_familia = familia.id_familia  AND familia_personas.cedula_persona = $cedula_responsable AND familia_personas.parentezco = 'Madre' AND familia.id_familia != $id";
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
        $tabla            = "SELECT * FROM familia_personas, familia WHERE estado=1 AND familia_personas.id_familia = familia.id_familia  AND familia_personas.cedula_persona = $cedula_responsable AND familia_personas.parentezco = 'Conyuge'";
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

    public function existeconyugue_edit($cedula_responsable,$id)
    {
        $tabla            = "SELECT * FROM familia_personas, familia WHERE estado=1 AND familia_personas.id_familia = familia.id_familia  AND familia_personas.cedula_persona = $cedula_responsable AND familia_personas.parentezco = 'Conyuge' AND familia.id_familia != $id";
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

    public function Registrar_permiso($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO permisos (
                motivo,
                fecha_pro, 
                fecha_inicio, 
                fecha_cierre,
                tipo_permiso,
                cedula_persona

                ) VALUES (
                :motivo,
                :fecha_pro, 
                :fecha_inicio, 
                :fecha_cierre,
                :tipo_permiso,
                :cedula_persona
            )');

            $datos->execute([
                'motivo'           => $data['motivo'],
                'fecha_pro'        => $data['fecha_pro'],
                'fecha_inicio'     => $data['fecha_inicio'],
                'fecha_cierre'     => $data['fecha_cierre'],
                'tipo_permiso'     => $data['tipo_permiso'],
                'cedula_persona'   => $data['cedula_persona']
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
