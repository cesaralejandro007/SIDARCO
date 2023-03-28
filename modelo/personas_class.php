<?php

class Personas_Class extends Modelo 
{ 

    public function __construct()
    {   
        parent::__construct();
    }

    public function Consultar_Vacuna()
    {
 
        $tabla            = "SELECT DISTINCT v.cedula_persona, p.primer_nombre, p.primer_apellido FROM vacuna_covid v, personas p WHERE v.cedula_persona = p.cedula_persona AND p.estado =1 AND v.estado = 1";
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

    public function Registrar_Vacuna($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO vacuna_covid (
                cedula_persona,
                dosis,
                fecha_vacuna,
                estado
                ) VALUES (
                    :cedula_persona,
                    :dosis,
                    :fecha_vacuna,
                    :estado
                )');

            $datos->execute([
                'cedula_persona' => $data['cedula_persona'],
                'dosis' => $data['dosis'],
                'fecha_vacuna' => $data['fecha_vacuna'],
                'estado' => $data['estado'],
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }
    public function Registrar($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO personas (
                cedula_persona,
                primer_nombre,
                segundo_nombre,
                primer_apellido,
                segundo_apellido,
                nacionalidad,
                jefe_familia,
                propietario_vivienda,
                fecha_nacimiento,
                telefono,
                correo,
                estado_civil,
                genero,
                whatsapp,
                antiguedad_comunidad,
                nivel_educativo,
                contrasenia,
                rol_inicio,
                preguntas_seguridad,
                estado,
                direccion,
                id_ubicacion,
                ing_seniat,
                ing_publica,
                fecha_notificacion,
                ult_designacion,
                prima,
                declaracion_j,
                inscripcion_ivss,
                fideicomiso,
                telf_casa
                ) VALUES (
                :cedula_persona,
                :primer_nombre,
                :segundo_nombre,
                :primer_apellido,
                :segundo_apellido,
                :nacionalidad,
                :jefe_familia,
                :propietario_vivienda,
                :fecha_nacimiento,
                :telefono,
                :correo,
                :estado_civil,
                :genero,
                :whatsapp,
                :antiguedad_comunidad,
                :nivel_educativo,
                :contrasenia,
                :rol_inicio,
                :preguntas_seguridad,
                :estado,
                :direccion,
                :id_ubicacion,
                :ing_seniat,
                :ing_publica,
                :fecha_notificacion,
                :ult_designacion,
                :prima,
                :declaracion_j,
                :inscripcion_ivss,
                :fideicomiso,
                :telf_casa
                )');

            $datos->execute([
                'cedula_persona'        =>       $data['cedula_persona'],
                'primer_nombre'         =>       $data['primer_nombre'],
                'segundo_nombre'        =>       $data['segundo_nombre'],
                'primer_apellido'       =>       $data['primer_apellido'],
                'segundo_apellido'      =>       $data['segundo_apellido'],
                'nacionalidad'          =>       $data['nacionalidad'],
                'jefe_familia'          =>       $data['jefe_familia'],
                'propietario_vivienda'  =>       $data['propietario_vivienda'],
                'fecha_nacimiento'      =>       $data['fecha_nacimiento'],
                'telefono'              =>       $data['telefono'],
                'correo'                =>       $data['correo'],
                'estado_civil'          =>       $data['estado_civil'],
                'genero'                =>       $data['genero'],
                'whatsapp'              =>       $data['whatsapp'],
                'antiguedad_comunidad'  =>       $data['antiguedad_comunidad'],
                'nivel_educativo'       =>       $data['nivel_educativo'],
                'contrasenia'           =>       $data['contrasenia'],
                'rol_inicio'            =>       $data['rol_inicio'],
                'preguntas_seguridad'   =>       $data['preguntas_seguridad'],
                'estado'                =>       $data['estado'],
                'direccion'             =>       $data['direccion'],
                'id_ubicacion'          =>       $data['id_ubicacion'],
                'ing_seniat'            =>       $data['fecha_seniat'],
                'ing_publica'           =>       $data['fecha_publica'],
                'fecha_notificacion'    =>       $dats['fecha_notificacion'],
                'ult_designacion'       =>       $data['ult_designacion'],
                'prima'                 =>       $data['prima'],
                'declaracion_j'         =>       $data['declaracion_j'],
                'inscripcion_ivss'      =>       $data['inscripcion_ivss'],
                'fideicomiso'           =>       $data['fideicomiso'],
                'telf_casa'             =>       $data['telf_casa']
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }



/*      public function Registrar_transporte($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO transporte (
                cedula_propietario,
                descripcion_transporte,
                estado            
                ) VALUES (
                    :cedula_propietario,
                    :descripcion_transporte,
                    :estado
                )');

            $datos->execute([
                'cedula_propietario'      => $data['cedula_propietario'],
                'descripcion_transporte'   => $data['descripcion_transporte'], 
                'estado'   => 1,
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    } */


/*     public function Registrar_persona_ocupacion($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO ocupacion_persona (
                cedula_persona,
                id_ocupacion,
                estado            
                ) VALUES (
                    :cedula_persona,
                    :id_ocupacion,
                    :estado
                )');

            $datos->execute([
                'cedula_persona'      => $data['cedula_persona'],
                'id_ocupacion'   => $data['id_ocupacion'], 
                'estado'   => 1,
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    } */

        public function  registrar_permisos($data)
    {    
         
         $ejecucion=false;

         if($data['rol_inicio']=="Super Usuario"){


          
          for($i=1;$i<17;$i++){
                         try{
                    $datos=$this->conexion->prepare('INSERT INTO permisos_usuario_modulo(
                        cedula_usuario,
                        id_modulo,
                        registrar,
                        consultar,
                        modificar,
                        eliminar) VALUES (
                        :cedula_usuario,
                        :id_modulo,
                        :registrar,
                        :consultar,
                        :modificar,
                        :eliminar)');

                $datos->execute([
                'cedula_usuario'      => $data['cedula_persona'],
                'id_modulo'           =>$i,
                'registrar'           =>1,
                'consultar'           =>1,
                'modificar'           =>1,
                'eliminar'            =>1
            ]);

                $ejecucion=true;
                }
                catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: ' . $e->getMessage();
            $ejecucion=$e->getMessage();
        }
          }

         }

         else{

            if($data['rol_inicio']=='Administrador'){

            for($i=1;$i<17;$i++){
                if($i!=1 && $i!=16 ){
                      $permiso=1;
                }
                else{
                    $permiso=0;
                }
                try{
                    $datos=$this->conexion->prepare('INSERT INTO permisos_usuario_modulo(
                        cedula_usuario,
                        id_modulo,
                        registrar,
                        consultar,
                        modificar,
                        eliminar) VALUES (
                        :cedula_usuario,
                        :id_modulo,
                        :registrar,
                        :consultar,
                        :modificar,
                        :eliminar)');

                $datos->execute([
                'cedula_usuario'      => $data['cedula_persona'],
                'id_modulo'           =>$i,
                'registrar'           =>$permiso,
                'consultar'           =>$permiso,
                'modificar'           =>$permiso,
                'eliminar'            =>0
            ]);

                $ejecucion=true;
                }
                catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: ' . $e->getMessage();
            $ejecucion=$e->getMessage();
        }
               }
           }
           else{
            for($i=1;$i<17;$i++){
                if($i==2 || $i==9 || $i==12 || $i==3){
                      $permiso=1;
                }
                else{
                    $permiso=0;
                }
                try{
                    $datos=$this->conexion->prepare('INSERT INTO permisos_usuario_modulo(
                        cedula_usuario,
                        id_modulo,
                        registrar,
                        consultar,
                        modificar,
                        eliminar) VALUES (
                        :cedula_usuario,
                        :id_modulo,
                        :registrar,
                        :consultar,
                        :modificar,
                        :eliminar)');

                $datos->execute([
                'cedula_usuario'      => $data['cedula_persona'],
                'id_modulo'           =>$i,
                'registrar'           =>$permiso,
                'consultar'           =>$permiso,
                'modificar'           =>0,
                'eliminar'            =>0
            ]);

                $ejecucion=true;
                }
                catch (PDOException $e) {
            $this->error = 'Ha surgido un error y no se puede cargar los datos. Detalle: ' . $e->getMessage();
            $ejecucion=$e->getMessage();
        }
               }
           }
         }


         return $ejecucion;
          
    }




    public function registrar_carnet($data){

        try {
            $datos = $this->conexion->prepare('INSERT INTO carnets (
                cedula_persona,
                serial_carnet,
                codigo_carnet,
                tipo_carnet        
                ) VALUES (
                :cedula_persona,
                :serial_carnet,
                :codigo_carnet,
                :tipo_carnet
                )');

            $datos->execute([
                'cedula_persona'      => $data['cedula_persona'],
                'serial_carnet'   => $data['serial_carnet'],
                'codigo_carnet'   => $data['codigo_carnet'],
                'tipo_carnet'      => $data['tipo_carnet']
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }


 public function Registrar_persona_proyecto($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO persona_proyecto (
                cedula_persona,
                id_proyecto,
                estado            
                ) VALUES (
                    :cedula_persona,
                    :id_proyecto,
                    :estado
                )');

            $datos->execute([
                'cedula_persona'      => $data['cedula_persona'],
                'id_proyecto'   => $data['id_proyecto'], 
                'estado'   => 1,
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }

/*
        public function Registrar_persona_comunidad($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO comunidad_indigena_personas (
                id_comunidad_indigena,
                 cedula_persona,
                estado            
                ) VALUES (
                 :id_comunidad_indigena,
                 :cedula_persona,
                    :estado
                )');

            $datos->execute([
                'cedula_persona'      => $data['cedula_persona'],
                'id_comunidad_indigena'   => $data['id_comunidad_indigena'], 
                'estado'   => 1,
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }
*/
/*        public function Registrar_persona_organizacion($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO org_politica_persona (
                cedula_persona,
                id_org_politica,
                estado            
                ) VALUES (
                :cedula_persona,
                 :id_org_politica,
                    :estado
                )');

            $datos->execute([
                'cedula_persona'      => $data['cedula_persona'],
                'id_org_politica'   => $data['id_org_politica'], 
                'estado'   => 1,
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    } */

        public function Registrar_persona_bono($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO persona_bonos (
                cedula_persona,
                id_bono         
                ) VALUES (
                :cedula_persona,
                :id_bono
                )');

            $datos->execute([
                'cedula_persona'      => $data['cedula_persona'],
                'id_bono'   => $data['id_bono']
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }

    public function Consultar_Tabla_divisiones($areas)
    {

        $sql               = "SELECT areas.id_area as id_area FROM personas,personas_areas,areas,divisiones WHERE personas.cedula_persona = personas_areas.cedula_persona and personas_areas.id_area = areas.id_area and areas.id_division = divisiones.id_division and areas.id_area = $areas";
        try {
            $datos = $this->conexion->prepare($sql);
            $datos->execute();
            $respuesta_arreglo1 = $datos->rowCount();
            if ($respuesta_arreglo1 > 0){
                return false;
            }else{
                return true;
            }
        } catch (PDOException $e) {

            $errorReturn = ['estatus' => false];
            $errorReturn += ['info' => "error sql:{$e}"];
            return $errorReturn;
        }
    }
    public function Consultar_Tabla_division($cedula)
    {

        $sql               = "SELECT areas.id_area as id_area FROM personas,personas_areas,areas,divisiones WHERE personas.cedula_persona = personas_areas.cedula_persona and personas_areas.id_area = areas.id_area and areas.id_division = divisiones.id_division and personas_areas.cedula_persona = $cedula";
        try {
            $datos = $this->conexion->prepare($sql);
            $datos->execute();
            $respuesta_arreglo1 = $datos->rowCount();
            if ($respuesta_arreglo1 == 1){
                return false;
            }else{
                return true;
            }
        } catch (PDOException $e) {

            $errorReturn = ['estatus' => false];
            $errorReturn += ['info' => "error sql:{$e}"];
            return $errorReturn;
        }
    }


            public function Registrar_proyecto($area,$cedula)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO personas_areas (
                cedula_persona,
                id_area     
                ) VALUES (
                :id_cedula_persona,
                :id_area_division
                )');

            $datos->execute([
                'id_cedula_persona'    =>  $cedula,
                'id_area_division'      =>  $area
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }


                public function Registrar_persona_mision($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO persona_misiones(
                id_mision,
                cedula_persona,
                recibe_actualmente, 
                fecha,
                estado         
                ) VALUES (
                :id_mision,
                :cedula_persona,
                :recibe_actualmente, 
                :fecha,
                :estado 
                )');

            $datos->execute([
                'id_mision'              =>$data['id_mision'],
                'cedula_persona'         =>$data['cedula_persona'],
                'recibe_actualmente'    =>$data['recibe_actualmente'],
                'fecha'                 =>$data['fecha'],
                'estado'              =>  1
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }
   
   
 /*   public function Registrar_cond_laboral($data){
    try {
            $datos = $this->conexion->prepare('INSERT INTO condicion_laboral (
                cedula_persona,
                nombre_cond_laboral,
                sector_laboral,
                pertenece,
                estado            
                ) VALUES (
                :cedula_persona,
                :nombre_cond_laboral,
                :sector_laboral,
                :pertenece,
                :estado
                )');

            $datos->execute([
                'cedula_persona'       =>  $data['cedula_persona'],
                'nombre_cond_laboral'  => $data['nombre_cond_laboral'],
                'sector_laboral'       => $data['sector_laboral'],
                'pertenece'            => $data['pertenece'],
                'estado'   => 1,
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
   } */

    public function Consultar()
    {
        $tabla= "SELECT * FROM personas,ubicaciones,personas_areas,areas,divisiones,secciones WHERE personas.id_ubicacion = ubicaciones.id_ubicacion and personas.cedula_persona = personas_areas.cedula_persona and personas_areas.id_area = areas.id_area and areas.id_seccion = secciones.id_seccion and estado=1 GROUP BY personas.cedula_persona ORDER BY primer_nombre ASC";
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

    public function Actualizar($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE personas  SET
                primer_nombre           =:primer_nombre,
                segundo_nombre          =:segundo_nombre,
                primer_apellido         =:primer_apellido,
                segundo_apellido        =:segundo_apellido,
                fecha_nacimiento        =:fecha_nacimiento,
                nacionalidad            =:nacionalidad,
                telefono                =:telefono,
                telf_casa               =:telf_casa,
                correo                  =:correo,
                estado_civil            =:estado_civil,
                genero                  =:genero,
                whatsapp                =:whatsapp,
                nivel_educativo         =:nivel_educativo,
                ing_seniat              =:ing_seniat,
                ing_publica             =:ing_publica,
                fecha_notificacion      =:fecha_notificacion,
                ult_designacion         =:ult_designacion,
                prima                   =:prima,
                declaracion_j           =:declaracion_j,
                inscripcion_ivss        =:inscripcion_ivss,
                fideicomiso             =:fideicomiso

                WHERE cedula_persona =:cedula_persona"
            );

            $query->execute([
                'cedula_persona'            =>$data['cedula_persona'], 
                'primer_nombre'             =>$data['primer_nombre'],
                'segundo_nombre'            =>$data['segundo_nombre'],
                'primer_apellido'           =>$data['primer_apellido'],
                'segundo_apellido'          =>$data['segundo_apellido'],
                'fecha_nacimiento'          =>$data['fecha_nacimiento'],
                'nacionalidad'              =>$data['nacionalidad'],
                'telefono'                  =>$data['telefono'],
                'telf_casa'                 =>$data['telefono_casa'],
                'correo'                    =>$data['correo'],
                'estado_civil'              =>$data['estado_civil'],
                'genero'                    =>$data['genero'],
                'whatsapp'                  =>$data['whatsapp'],
                'nivel_educativo'           =>$data['nivel_educativo'],
                'ing_seniat'                =>$data['ing_seniat'],
                'ing_publica'               =>$data['ing_publica'],
                'fecha_notificacion'        =>$data['fecha_notificacion'],
                'ult_designacion'           =>$data['fecha_designacion'],
                'prima'                     =>$data['prima'],
                'declaracion_j'             =>$data['declaracionj'],
                'inscripcion_ivss'          =>$data['inscripcionivss'],
                'fideicomiso'               =>$data['fideicomiso']
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }

    public function Actualizar_cond_laboral($data)
    {

        try {
            $query = $this->conexion->prepare("UPDATE condicion_laboral  SET
                cedula_persona           =:cedula_persona,
                nombre_cond_laboral      =:nombre_cond_laboral,
                sector_laboral           =:sector_laboral,
                pertenece                =:pertenece

                WHERE id_cond_laboral    =:id_cond_laboral"
            );

            $query->execute([
                'cedula_persona'            =>$data['cedula_persona'], 
                'nombre_cond_laboral'       =>$data['nombre_cond_laboral'],
                'sector_laboral'            =>$data['sector_laboral'],
                'pertenece'                 =>$data['pertenece'],
                "id_cond_laboral"           =>$data['id_cond_laboral']

            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }

    public function Eliminar($param)
    {
        try {

            $query = $this->conexion->prepare('DELETE FROM personas WHERE cedula_persona = :cedula_persona');
            $query->execute(['cedula_persona' => $param]);

            return true;

        } catch (PDOException $e) {

            return $this->Capturar_Error($e);
        }
    }
    //=======================================================================

   

     public function Buscar_Persona($cedula)
     {

         $tabla            = "SELECT * FROM personas WHERE cedula_persona=$cedula AND estado=1";
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


          public function get_serial_carnet($serial,$tipo)
     {

         $tabla            = "SELECT * FROM carnets WHERE serial_carnet='$serial' AND tipo_carnet='$tipo'";
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


       /*  public function get_ubicacion(){

        $tabla   ="SELECT * FROM ubicaciones ";
        $respuestaArreglo='';

        try{
            
            $datos= $this->conexion->prepare($tabla);
            $datos->execute();
            $datos->setFetchMode(PDO::FETCH_ASSOC);
            $respuestaArreglo= $datos->fetchAll(PDO::FETCH_ASSOC);
            return $respuestaArreglo;
        } catch (PDOException $e){

            return $this->capturar_Error($e);
        }

        } */




         public function get_codigo_carnet($codigo,$tipo)
     {

         $tabla            = "SELECT * FROM carnets WHERE codigo_carnet='$codigo' AND tipo_carnet='$tipo'";
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

      public function get_transportes()
     {

         $tabla            = "SELECT * FROM transporte WHERE estado=1";
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
/*
     public function get_comunidades()
     {

         $tabla            = "SELECT * FROM comunidad_indigena WHERE estado=1";
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
*/
public function get_organizaciones()
     {

         $tabla            = "SELECT * FROM org_politica WHERE estado=1";
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


     public function get_centros()
     {

         $tabla            = "SELECT * FROM centros_votacion WHERE estado=1";
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

 public function get_parroquias()
     {

         $tabla            = "SELECT * FROM parroquias WHERE estado=1";
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


      public function get_bonos()
     {

         $tabla            = "SELECT * FROM bonos WHERE estado=1";
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

     public function get_misiones()
     {

         $tabla            = "SELECT * FROM misiones WHERE estado=1";
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


      public function get_enfermedades()
     {

         $tabla            = "SELECT * FROM enfermedades WHERE estado=1";
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


     public function get_discapacidad()
     {

         $tabla            = "SELECT * FROM discapacidad WHERE estado=1";
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


     public function get_ocupaciones()
     {

         $tabla            = "SELECT * FROM ocupacion WHERE estado=1";
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

     public function get_condiciones()
     {

         $tabla            = "SELECT * FROM condicion_laboral WHERE estado=1";
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

     public function get_proyectos()
     {

         $tabla            = "SELECT * FROM proyecto WHERE estado=1";
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



       public function get_ocupacion_persona($cedula)
     {

         $tabla            = "SELECT O.nombre_ocupacion, O.id_ocupacion FROM ocupacion O, ocupacion_persona OP WHERE OP.cedula_persona = $cedula AND O.id_ocupacion = OP.id_ocupacion AND  O.estado=1";
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


      public function get_cond_laboral_persona($cedula)
     {

         $tabla            = "SELECT * FROM condicion_laboral WHERE cedula_persona = $cedula AND estado=1";
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



      public function get_transporte_persona($cedula)
     {

         $tabla            = "SELECT * FROM transporte WHERE cedula_propietario = $cedula AND estado=1";
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



      public function get_bonos_persona($cedula)
     {

         $tabla            = "SELECT B.nombre_bono, PB.id_persona_bono FROM bonos B, persona_bonos PB WHERE PB.cedula_persona = $cedula AND PB.id_bono=B.id_bono AND B.estado=1";
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

     public function get_misiones_persona($cedula)
     {

         $tabla            = "SELECT M.nombre_mision , PM.* FROM misiones M, persona_misiones PM WHERE PM.cedula_persona = $cedula AND PM.id_mision=M.id_mision AND M.estado=1";
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


     public function get_divisiones($cedula)
     {

         $tabla            = "SELECT personas_areas.id_persona_area as id, divisiones.nombre_division as division, areas.nombre_area as area, secciones.nombre_seccion as seccion FROM personas,personas_areas,areas,divisiones,secciones WHERE personas.cedula_persona = personas_areas.cedula_persona and personas_areas.id_area = areas.id_area and areas.id_division = divisiones.id_division and areas.id_seccion = secciones.id_seccion and personas.cedula_persona= " . $cedula . "";
       
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
/*
      public function get_comunidad_indigena_persona($cedula)
     {

         $tabla            = "SELECT CI.nombre_comunidad  FROM comunidad_indigena CI, comunidad_indigena_personas CIP WHERE CIP.cedula_persona = $cedula AND CIP.id_comunidad_indigena=CI.id_comunidad_indigena AND CI.estado=1";
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

*/
      public function get_org_politica_persona($cedula)
     {

         $tabla            = "SELECT *  FROM org_politica O, org_politica_persona OP WHERE OP.cedula_persona = $cedula AND OP.id_org_politica=O.id_org_politica AND O.estado=1";
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




}
?>