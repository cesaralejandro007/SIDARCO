 <?php

 class Historial_Class extends Modelo
 {

    public function __construct()
    {
        parent::__construct();
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

    public function Actualizar_tabla_familia($id_familia,$cedula,$nombre,$apellido)
    {

        try {
            $query = $this->conexion->prepare("UPDATE familia  SET
                cedula_integrante           ='$cedula',
                primer_nombre          ='$nombre',
                primer_apellido         ='$apellido'
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

    public function Registrar_historial($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO historiales_clinicos (
                diagnostico,
                tratamiento,
                evolucion,
                fecha_historial,
                cedula_persona,
                examen,
                estado,
                tipo_sangre,
                peso,
                altura,
                talla,
                imc,
                fc,
                fr,
                ta,
                temperatura

                ) VALUES (
                :diagnostico,
                :tratamiento, 
                :evolucion,
                :fecha_historial,
                :cedula_persona,
                :examen,
                :estado,
                :tipo_sangre,
                :peso,
                :altura,
                :talla,
                :imc,
                :fc,
                :fr,
                :ta,
                :temperatura

            )');

            $datos->execute([
                'diagnostico'                => $data['diagnostico'],
                'tratamiento'                => $data['tratamiento'],
                'evolucion'                  => $data['evolucion'],
                'fecha_historial'            =>$data['fecha_historial'],
                'cedula_persona'             =>$data['cedula_persona'],
                'examen'                     =>$data['examen'],
                'estado'                     =>1,
                'tipo_sangre'                =>$data['tipo_sangre'],
                'peso'                       =>$data['peso'],
                'altura'                     =>$data['altura'],
                'talla'                      =>$data['talla'],
                'imc'                        =>$data['imc'],
                'fc'                         =>$data['fc'],
                'fr'                         =>$data['fr'],
                'ta'                         =>$data['ta'],
                'temperatura'                =>$data['temperatura']
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }

 
    public function consulta_ant_personal(){
        
        $respuestaArreglo="";

        $tabla="SELECT ant_personales *FROM";

        try{

            $datos=$this->conexion->prepare($tabla);
            $datos->execute();
            $datos->setFechMode(PDO::FETCH_ASSOC);
            $respuestaArreglo=$datos->fetchAll(PDO::FETCH_ASSOC);
            return $respuestaArreglo;

        }catch(PDOException $e){

            return $this->Capturar_Error($e);

        }
    } 


    /* public function registrar_ant_personal($data){

        try{

        $tabla=$this->conexion->prepare("INSERT INTO ant_per_personas(

            id_ant_personal,
            cedula_persona,
            descripcion_personales

            ) VALUES (
            
            :id_ant_personal,
            :cedula_persona,
            :descripcion_personales

            )");

            $tabla->execute([
                "id_ant_personal"           =>  $data["id_ant_personal"],
                "cedula_persona"            =>  $data["cedula_persona"],
                "descripcion_personales"    =>  $data["descripcion_personales"]
            ])

         }catch(PDOException $e){

            return $this->Capturar_Error($e);

         }
    } */



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
