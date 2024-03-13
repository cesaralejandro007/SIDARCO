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


    public function get_historial()
    {

        $tabla            = "SELECT * FROM historiales_clinicos";
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

    public function get_antecedente_personal($id,$cedula)
    {

        $tabla = "SELECT * FROM ant_per_personas, ant_personales WHERE ant_per_personas.id_ant_personal = ant_personales.id_ant_personal AND ant_per_personas.cedula_persona = '$cedula' AND ant_per_personas.id_ant_personal = '$id'";
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

    public function get_historial_clinico($id, $cedula)
    {
        $respuesta_arreglo = array();
        
        try {
            // Consulta 1
            $query1 = "SELECT * FROM ant_per_personas, ant_personales WHERE ant_per_personas.id_ant_personal = ant_personales.id_ant_personal AND ant_per_personas.cedula_persona = ?";
            $stmt1 = $this->conexion->prepare($query1);
            $stmt1->execute([$cedula]);
            $respuesta_arreglo['ant_personales'] = $stmt1->fetchAll(PDO::FETCH_ASSOC);
            
            // Consulta 2
            $query2 = "SELECT * FROM ant_fam_personas, ant_familiares WHERE ant_fam_personas.id_ant_familiar = ant_familiares.id_ant_familiar AND ant_fam_personas.cedula_persona = ?";
            $stmt2 = $this->conexion->prepare($query2);
            $stmt2->execute([$cedula]);
            $respuesta_arreglo['ant_familiares'] = $stmt2->fetchAll(PDO::FETCH_ASSOC);
            
            // Consulta 3
            $query3 = "SELECT * FROM habit_psico_personas, habit_psicologicos WHERE habit_psico_personas.id_habit_psicologico = habit_psicologicos.id_habit_psicologico AND habit_psico_personas.cedula_persona = ?";
            $stmt3 = $this->conexion->prepare($query3);
            $stmt3->execute([$cedula]);
            $respuesta_arreglo['habit_psicologicos'] = $stmt3->fetchAll(PDO::FETCH_ASSOC);
            
            // Consulta 4
            $query4 = "SELECT * FROM historiales_clinicos WHERE id_historial_clinico = ? AND cedula_persona = ?";
            $stmt4 = $this->conexion->prepare($query4);
            $stmt4->execute([$id, $cedula]);
            $respuesta_arreglo['historiales_clinicos'] = $stmt4->fetchAll(PDO::FETCH_ASSOC);
            
            return $respuesta_arreglo;
        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }

    public function get_antecedentesp($cedula_persona)
    {

        $tabla            = "SELECT * FROM ant_per_personas,ant_personales WHERE ant_per_personas.id_ant_personal = ant_personales.id_ant_personal AND ant_per_personas.cedula_persona = '$cedula_persona'";
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

    public function get_antecedentesf($cedula_persona)
    {

        $tabla            = "SELECT * FROM ant_fam_personas,ant_familiares WHERE ant_fam_personas.id_ant_familiar = ant_familiares.id_ant_familiar AND ant_fam_personas.cedula_persona = '$cedula_persona'";
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
    
    public function get_habitosps($cedula_persona)
    {

        $tabla            = "SELECT * FROM habit_psico_personas,habit_psicologicos WHERE habit_psico_personas.id_habit_psicologico = habit_psicologicos.id_habit_psicologico AND habit_psico_personas.cedula_persona = '$cedula_persona'";
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

    
    public function eliminar_historial($id,$param)
    {
        try {

            $query = $this->conexion->prepare('DELETE FROM historiales_clinicos WHERE id_historial_clinico = :id');
            $query->execute(['id' => $id]);

            $query = $this->conexion->prepare('DELETE FROM ant_fam_personas WHERE cedula_persona = :cedula');
            $query->execute(['cedula' => $param]);

            $query = $this->conexion->prepare('DELETE FROM ant_per_personas WHERE cedula_persona = :cedula');
            $query->execute(['cedula' => $param]);

            $query = $this->conexion->prepare('DELETE FROM habit_psico_personas WHERE cedula_persona = :cedula');
            $query->execute(['cedula' => $param]);
            

            return true;

        } catch (PDOException $e) {

            return $this->Capturar_Error($e);
        }
    }

    public function Actualizar_antecedente_perso($id,$id_antecedente,$descripcion)
    {

        try {
            $query = $this->conexion->prepare("UPDATE ant_per_personas SET
                id_ant_personal           =:id_ant_personal,
                descripcion_personales           =:descripcion_personales
                WHERE id_per_personas =:id_per_personas"
            );
            $query->execute([
                'id_ant_personal'            =>$id_antecedente, 
                'descripcion_personales'            =>$descripcion, 
                'id_per_personas'            =>$id
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

    public function existe_ante_personal($id,$cedula)
    {
        $tabla            = "SELECT * FROM ant_per_personas WHERE id_ant_personal = '$id' AND cedula_persona = '$cedula'";
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

    public function existe_ante_familiar($id,$cedula)
    {
        $tabla            = "SELECT * FROM ant_fam_personas WHERE id_ant_familiar = '$id' AND cedula_persona = '$cedula'";
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

    public function existe_habito_psic($id,$cedula)
    {
        $tabla            = "SELECT * FROM habit_psico_personas WHERE id_habit_psicologico = '$id' AND cedula_persona = '$cedula'";
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
        
    

        $tabla="SELECT * FROM ant_personales";
        $respuesta_arreglo='';
        try{
            $datos=$this->conexion->prepare($tabla);
            $datos->execute();
            $datos->setFetchMode(PDO::FETCH_ASSOC);
            $respuesta_arreglo = $datos->fetchAll(PDO::FETCH_ASSOC);
            return $respuesta_arreglo;

        }catch(PDOException $e){

            return $this->Capturar_Error($e);

        }
    }  

      public function consultar_ant_fam(){

        $tabla="SELECT * FROM ant_familiares";
        $respuesta_arreglo="";

        try{
            $datos=$this->conexion->prepare($tabla);
            $datos->execute();
            $datos->setFetchMode(PDO::FETCH_ASSOC);
            $respuesta_arreglo = $datos->fetchAll(PDO::FETCH_ASSOC);
            return $respuesta_arreglo;

        }catch(PDOException $e){

            return $this->Capturar_Error($e);

        }
    }  


     public function consultar_habit_psico(){

        $table="SELECT * FROM habit_psicologicos";
        $respuesta_arreglo="";

        try{
            $datos=$this->conexion->prepare($table);
            $datos->execute();
            $datos->setFetchMode(PDO::FETCH_ASSOC);
            $respuesta_arreglo = $datos->fetchAll(PDO::FETCH_ASSOC);
            return $respuesta_arreglo;

        }catch(PDOException $e){

            return $this->Capturar_Error();
        }

    }  


       public function registrar_ant_personal($data){

        try{

        $tabla=$this->conexion->prepare('INSERT INTO ant_per_personas (

            id_ant_personal,
            cedula_persona,
            descripcion_personales

            ) VALUES (
            
            :id_ant_personal,
            :cedula_persona,
            :descripcion_personales

            )');

            $tabla->execute([
                'id_ant_personal'           =>  $data['id_ant_personal'],
                'cedula_persona'            =>  $data['cedula_persona'],
                'descripcion_personales'    =>  $data['descripcion_personales']
            ]);

            return true;

         }catch(PDOException $e){

            return $this->Capturar_Error($e);

         }
    }   


    public function Registrar_ant_fam_personas($data){

        try{

            $query=$this->conexion->prepare("INSERT INTO ant_fam_personas (

                id_ant_familiar,
                cedula_persona,
                descripcion_familiar

            ) VALUES (
                :id_ant_familiar,
                :cedula_persona,
                :descripcion_familiar
            )");

            $query->execute([
                'id_ant_familiar'       =>  $data['id_ant_familiar'],
                'cedula_persona'        =>  $data['cedula_persona'],
                'descripcion_familiar'  =>  $data['descripcion_familiar']

            ]);

            return true;


        }catch(PDOException $e){

            return $this->Captar_Error($e);

        }
    }


    public function registrar_habit_personas($data){

      try{   $query=$this->conexion->prepare(" INSERT INTO habit_psico_personas (

            descripcion_habit,
            cedula_persona,
            id_habit_psicologico
        ) VALUES (
            :descripcion_habit,
            :cedula_persona,
            :id_habit_psicologico

        )");

        $query->execute([
            'descripcion_habit'     =>$data['descripcion_habit'],
            'cedula_persona'        =>$data['cedula_persona'],
            'id_habit_psicologico'  =>$data['id_habit_psicologico']
        ]);
        return true;
        
      }catch(PDOException $e){

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
