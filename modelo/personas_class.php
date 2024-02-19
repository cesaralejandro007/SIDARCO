<?php

class Personas_Class extends Modelo 
{ 

    public function __construct()
    {   
        parent::__construct();
    }

    public function Consultar_Vacuna()
    {
 
        $tabla            = "SELECT DISTINCT v.cedula_persona, p.primer_nombre, p.primer_apellido, DATE_FORMAT(fecha_vacuna, '%d/%m/%Y') as fecha_v FROM vacuna_covid v, personas p WHERE v.cedula_persona = p.cedula_persona AND p.estado =1 AND v.estado = 1";
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

    public function Consultar_vacunados(){

        $tabla            = "SELECT id_vacuna_covid, cedula_persona, nombre_vacuna, dosis, DATE_FORMAT(fecha_vacuna, '%d/%m/%Y') as fecha_vacuna FROM vacuna_covid group by id_vacuna_covid ";
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

    public function Registrar_Vacuna($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO vacuna_covid (
                cedula_persona,
                nombre_vacuna, 
                dosis,
                fecha_vacuna,
                estado
                ) VALUES (
                    :cedula_persona,
                   :nombre_vacuna, 
                    :dosis,
                    :fecha_vacuna,
                    :estado
                )');

            $datos->execute([
                'cedula_persona' => $data['cedula_persona'],
               'nombre_vacuna' => $data['nombre_vacuna'],
                'dosis' => $data['dosis'],
                'fecha_vacuna' => $data['fecha_vacuna'],
                'estado' => $data['estado']
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }
    public function Registrar($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO personas(
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
                correo_institucional,
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
                telf_casa,
                id_nomina,
                inicio_sesion,
                id_cargo,
                id_estado,
                id_estado_fun
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
                :correo_institucional,
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
                :telf_casa,
                :id_nomina,
                :inicio_sesion,
                :id_cargo,
                :id_estado,
                :id_estado_fun
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
                'correo_institucional'  =>       $data['correo_institucional'],
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
                'fecha_notificacion'    =>       $data['fecha_notificacion'],
                'ult_designacion'       =>       $data['ult_designacion'],
                'prima'                 =>       $data['prima'],
                'declaracion_j'         =>       $data['declaracion_j'],
                'inscripcion_ivss'      =>       $data['inscripcion_ivss'],
                'fideicomiso'           =>       $data['fideicomiso'],
                'telf_casa'             =>       $data['telf_casa'],
                'id_nomina'             =>       $data['id_nomina'],
                'inicio_sesion'         =>       1,
                'id_cargo'              =>       $data['cargo_nominal'],
                'id_estado'             =>       $data['id_estado'],
                'id_estado_fun'         =>       $data['id_estado_fun']
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }

    public function registrar_egresos_personas($cedula, $id_egresado, $descripcion, $fecha)
    {
        try {
            $this->conexion->query("INSERT INTO personas_egresados(
				cedula_persona,id_egresado,descripcion,fecha_engreso
				)
			VALUES(
				'$cedula', '$id_egresado', '$descripcion', '$fecha'

			)");
        } catch (Exception $e) {
            return $this->Capturar_Error($e);
        }  
    }

    public function Actualizar_transporte($cedula_persona,$transporte,$observacion)
    {
        try {
            $query = $this->conexion->prepare("UPDATE transporte  SET
                tipo_transporte           =:tipo_transporte,
                descripcion_transporte    =:descripcion_transporte
                WHERE cedula_propietario =:cedula_persona"
            );

            $query->execute([
                'cedula_persona'              =>$cedula_persona, 
                'tipo_transporte'             =>$transporte, 
                'descripcion_transporte'      =>$observacion
            ]);
            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    } 

     public function Registrar_transporte($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO transporte (
                cedula_propietario,
                tipo_transporte,
                descripcion_transporte,
                estado            
                ) VALUES (
                    :cedula_propietario,
                    :tipo_transporte,
                    :descripcion_transporte,
                    :estado
                )');

            $datos->execute([
                'cedula_propietario'       => $data['cedula_propietario'],
                'tipo_transporte'          => $data['tipo_transporte'],
                'descripcion_transporte'   => $data['descripcion_transporte'], 
                'estado'                   => 1,
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    } 


/*  public function Registrar_persona_ocupacion($data)
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
            $datos = $this->conexion->prepare('INSERT INTO persona_proyecto(
                cedula_persona,
                id_titulo,
                estado,
                descripcion           
                ) VALUES (
                    :cedula_persona,
                    :id_titulo,
                    :estado,
                    :descripcion
                )');

            $datos->execute([
                'cedula_persona'      => $data['cedula_persona'],
                'id_titulo'   => $data['id_titulo'], 
                'estado'   => 1,
                'descripcion'   => $data['descripcion']
            ]);

            return $data['descripcion'];

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

    public function Consultar_Tabla_divisiones($areas,$cedula)
    {

        $sql               = "SELECT areas.id_area as id_area FROM personas,personas_areas,areas,divisiones WHERE personas.cedula_persona = personas_areas.cedula_persona and personas_areas.id_area = areas.id_area and areas.id_division = divisiones.id_division and areas.id_area = $areas and personas.cedula_persona = $cedula";
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

/*     public function Consultar_Tabla_titulos($titulos,$cedula)
    {

        $sql               = "SELECT proyecto.nombre_proyecto FROM personas,persona_proyecto,proyecto WHERE personas.cedula_persona = persona_proyecto.cedula_persona and persona_proyecto.id_proyecto = proyecto.id_proyecto AND personas.cedula_persona = $cedula AND persona_proyecto.id_proyecto = $titulos";
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
    } */

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




    public function Registrar_persona_egreso($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO personas_egresados (
                cedula_persona,
                id_egresado 
                ) VALUES (
                :cedula_persona,
                :id_egresado 
                )');

            $datos->execute([
                'cedula_persona'         =>  $data['cedula_persona'],
                'id_egresado'            =>  $data['id_egresado'] 
            ]);

                    echo $datos;
            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }





    public function Registrar_titulo($titulo,$descripcion,$cedula)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO persona_proyecto (
                cedula_persona,
                id_titulo,
                estado,     
                descripcion
                ) VALUES (
                :cedula_persona,
                :id_titulo,
                :estado,
                :descripcion
                )');

            $datos->execute([
                'cedula_persona'    =>  $cedula,
                'id_titulo'      =>  $titulo,
                'estado'      =>  1,
                'descripcion'      =>  $descripcion
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }

    public function Registrar_historial($descripcion,$cedula)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO historial_funcionario (
                cedula_persona,
                Descripcion     
                ) VALUES (
                :cedulaf,
                :Descripcionf
                )');

            $datos->execute([
                'cedulaf'    =>  $cedula,
                'Descripcionf'      =>  $descripcion
            ]);
        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }


    public function Registrar_proyectos($proyecto,$cedula)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO personas_areas (
                cedula_persona,
                id_proyecto    
                ) VALUES (
                :id_cedula_persona,
                :id_proyecto
                )');

            $datos->execute([
                'id_cedula_persona'    =>  $cedula,
                'id_proyecto'      =>  $proyecto
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }

    public function Registrar_persona_area($data)
    {

        try {
            $datos = $this->conexion->prepare('INSERT INTO personas_areas(
                cedula_persona,
                id_area
                          
                ) VALUES (
                    :cedula_persona,
                    :id_area
                    
                )');

            $datos->execute([
                'cedula_persona'      => $data['cedula_persona'],
                'id_area'         => $data['id_area']
                
            ]);

            return $data['id_area'];

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }




    public function get_areas(){

        $tabla            = "SELECT * FROM areas";
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

    



    /*             public function Registrar_persona_mision($data)
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
    } */
   
   
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
        $tabla= "SELECT *, date_format(personas.fecha_nacimiento, '%d/%m/%Y') as fecha_nacimientoc, date_format(personas.fecha_notificacion, '%d/%m/%Y') as fecha_notificacionc,date_format(personas.ing_seniat, '%d/%m/%Y') as ing_seniatc,date_format(personas.ing_publica, '%d/%m/%Y') as ing_publicac,date_format(personas.ult_designacion, '%d/%m/%Y') as ult_designacionc  FROM personas,ubicaciones,personas_areas,areas,divisiones,secciones,nomina,cargo_nominal,estados,estados_funcionarios WHERE personas.id_ubicacion = ubicaciones.id_ubicacion and personas.cedula_persona = personas_areas.cedula_persona and personas_areas.id_area = areas.id_area and areas.id_seccion = secciones.id_seccion and nomina.id_nomina = personas.id_nomina and personas.id_cargo = cargo_nominal.id_cargo and personas.id_estado = estados.id_estado and  personas.id_estado_fun = estados_funcionarios.id_estado_fun and personas.estado=1 GROUP BY personas.cedula_persona ORDER BY primer_nombre ASC";
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

    public function Consultaregresos()
    {
        $tabla= "SELECT *,personas_egresados.descripcion as descripcion_egresado,date_format(personas_egresados.fecha_engreso, '%d/%m/%Y') as fecha_egreso,  date_format(personas.fecha_nacimiento, '%d/%m/%Y') as fecha_nacimientoc, date_format(personas.fecha_notificacion, '%d/%m/%Y') as fecha_notificacionc,date_format(personas.ing_seniat, '%d/%m/%Y') as ing_seniatc,date_format(personas.ing_publica, '%d/%m/%Y') as ing_publicac,date_format(personas.ult_designacion, '%d/%m/%Y') as ult_designacionc  FROM personas,ubicaciones,personas_areas,areas,divisiones,secciones,personas_egresados,egresados,cargo_nominal,estados,estados_funcionarios WHERE personas.id_ubicacion = ubicaciones.id_ubicacion and personas.cedula_persona = personas_areas.cedula_persona and personas_areas.id_area = areas.id_area and areas.id_seccion = secciones.id_seccion and personas.cedula_persona = personas_egresados.cedula_persona and egresados.id_egresado = personas_egresados.id_egresado and personas.id_cargo = cargo_nominal.id_cargo and personas.id_estado = estados.id_estado and  personas.id_estado_fun = estados_funcionarios.id_estado_fun and personas.estado=0 GROUP BY personas.cedula_persona ORDER BY primer_nombre ASC";
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

    public function Consultarhistorialfuncionario()
    {
        $tabla= "SELECT *, date_format(historial_funcionario.Fecha, '%d/%m/%Y a las %r') as fecha_cambio FROM personas,historial_funcionario,ubicaciones WHERE personas.cedula_persona = historial_funcionario.cedula_persona and ubicaciones.id_ubicacion = personas.id_ubicacion ORDER BY historial_funcionario.Fecha DESC";
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

    public function consultar_tabla_egresados()
    {
        $sql               = "SELECT * FROM egresados";
        $respuesta_arreglo = '';
        try {
            $datos = $this->conexion->prepare($sql);
            $datos->execute();
            $datos->setFetchMode(PDO::FETCH_ASSOC);
            $respuesta_arreglo = $datos->fetchAll(PDO::FETCH_ASSOC);


           $resul ="<option class='swal2-input col-8' value='0'>-Seleccione-</option>";
            foreach ($respuesta_arreglo as $p) {
                $resul = $resul.  "<option value=". $p['id_egresado'] .">".$p['nombre_egresado']."</option>";
            }
            return $resul;
        } catch (PDOException $e) {

            $errorReturn = ['estatus' => false];
            $errorReturn += ['info' => "error sql:{$e}"];
            return $errorReturn;
        }
    }

    public function Consultarfecha_ingreso($f1,$f2)
    {
        $tabla= "SELECT *, date_format(personas.fecha_nacimiento, '%d/%m/%Y') as fecha_nacimientoc, date_format(personas.fecha_notificacion, '%d/%m/%Y') as fecha_notificacionc,date_format(personas.ing_seniat, '%d/%m/%Y') as ing_seniatc,date_format(personas.ing_publica, '%d/%m/%Y') as ing_publicac,date_format(personas.ult_designacion, '%d/%m/%Y') as ult_designacionc  FROM personas,ubicaciones,personas_areas,areas,divisiones,secciones WHERE personas.id_ubicacion = ubicaciones.id_ubicacion and personas.cedula_persona = personas_areas.cedula_persona and personas_areas.id_area = areas.id_area and areas.id_seccion = secciones.id_seccion and personas.estado=1 and personas.ing_seniat BETWEEN '$f1' and '$f2' GROUP BY personas.cedula_persona ORDER BY primer_nombre ASC";
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

    public function Consultarfecha_cumple($mes)
    {
        $tabla= "SELECT *, date_format(personas.fecha_nacimiento, '%d/%m/%Y') as fecha_nacimientoc, date_format(personas.fecha_notificacion, '%d/%m/%Y') as fecha_notificacionc,date_format(personas.ing_seniat, '%d/%m/%Y') as ing_seniatc,date_format(personas.ing_publica, '%d/%m/%Y') as ing_publicac,date_format(personas.ult_designacion, '%d/%m/%Y') as ult_designacionc FROM personas,ubicaciones,personas_areas,areas,divisiones,secciones WHERE personas.id_ubicacion = ubicaciones.id_ubicacion and personas.cedula_persona = personas_areas.cedula_persona and personas_areas.id_area = areas.id_area and areas.id_seccion = secciones.id_seccion and personas.estado=1 and date_format(personas.fecha_nacimiento, '%m') = '$mes' GROUP BY personas.cedula_persona ORDER BY primer_nombre ASC";
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

    public function Consultar_nomina($id_nomina)
    {
        $tabla= "SELECT *, date_format(personas.fecha_nacimiento, '%d/%m/%Y') as fecha_nacimientoc, date_format(personas.fecha_notificacion, '%d/%m/%Y') as fecha_notificacionc,date_format(personas.ing_seniat, '%d/%m/%Y') as ing_seniatc,date_format(personas.ing_publica, '%d/%m/%Y') as ing_publicac,date_format(personas.ult_designacion, '%d/%m/%Y') as ult_designacionc  FROM personas,ubicaciones,personas_areas,areas,divisiones,secciones,nomina WHERE personas.id_ubicacion = ubicaciones.id_ubicacion and personas.cedula_persona = personas_areas.cedula_persona and personas_areas.id_area = areas.id_area and areas.id_seccion = secciones.id_seccion and nomina.id_nomina = personas.id_nomina and nomina.id_nomina = $id_nomina and personas.estado=1 GROUP BY personas.cedula_persona ORDER BY primer_nombre ASC";
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
                correo_institucional    =:correoi,
                estado_civil            =:estado_civil,
                genero                  =:genero,
                whatsapp                =:whatsapp,
                nivel_educativo         =:nivel_educativo,
                id_ubicacion            =:ubicacion,
                grado_resguardo         =:grado,
                ing_seniat              =:ing_seniat,
                ing_publica             =:ing_publica,
                fecha_notificacion      =:fecha_notificacion,
                ult_designacion         =:ult_designacion,
                prima                   =:prima,
                declaracion_j           =:declaracion_j,
                inscripcion_ivss        =:inscripcion_ivss,
                fideicomiso             =:fideicomiso,
                id_nomina               =:nomina,
                id_cargo                =:cargo,
                id_estado               =:pro_estado,
                id_estado_fun           =:estado_fun

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
                'correoi'                   =>$data['correo_institucional'],
                'estado_civil'              =>$data['estado_civil'],
                'genero'                    =>$data['genero'],
                'whatsapp'                  =>$data['whatsapp'],
                'nivel_educativo'           =>$data['nivel_educativo'],
                'ubicacion'                 =>$data['ubicacion'],
                'grado'                     =>$data['grado_resguardo'],
                'ing_seniat'                =>$data['ing_seniat'],
                'ing_publica'               =>$data['ing_publica'],
                'fecha_notificacion'        =>$data['fecha_notificacion'],
                'ult_designacion'           =>$data['fecha_designacion'],
                'prima'                     =>$data['prima'],
                'declaracion_j'             =>$data['declaracionj'],
                'inscripcion_ivss'          =>$data['inscripcionivss'],
                'fideicomiso'               =>$data['fideicomiso'],
                'nomina'                    =>$data['nomina'],
                'cargo'                     =>$data['cargo'],
                'pro_estado'                =>$data['procedencia_estado'],
                'estado_fun'                =>$data['estado_funcionario']
            ]);

            return true;

        } catch (PDOException $e) {
            return $this->Capturar_Error($e);
        }
    }

    /* public function Actualizar_cond_laboral($data)
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
    } */

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

    public function eliminarregistrosegresos($cedula)
    {
        try {

            $query = $this->conexion->prepare('DELETE FROM personas_egresados WHERE cedula_persona = :cedula_persona');
            $query->execute(['cedula_persona' => $cedula]);

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

         $tabla            = "SELECT * FROM proyecto";
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

     public function get_titulos($cedula)
     {
        $tabla            = "SELECT persona_proyecto.id_persona_titulo as id, proyecto.nombre_titulo as titulo, persona_proyecto.descripcion as descripcion FROM personas,persona_proyecto,proyecto WHERE personas.cedula_persona = persona_proyecto.cedula_persona and persona_proyecto.id_titulo = proyecto.id_titulo and personas.cedula_persona = " . $cedula . "";       
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