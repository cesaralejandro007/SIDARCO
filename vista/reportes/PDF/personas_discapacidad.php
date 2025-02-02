<style>
.datos {
    border-collapse: collapse !important;
    width: 100%;
}

.datos th,
.datos td {
    border: 1px solid black !important;
}
</style>

<title>Personas Discapacidad</title>

<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <script>
    window.blur();
    window.print();
     
    </script>
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <!-- card-body -->
            <div class="card-body">
                <table style="width: 100%;">
                    <tr>
                       
                            <center> 
                                <h5>
                                    REPUBLICA BOLIVARIANA DE VENEZUELA<br />
                                    CONSEJO COMUNAL<br />
                                    PRADOS DE OCCIDENTE SECTOR III<br />
                                    RIF. J-30725585 CODIGO 13-03-04-608-0002<br />
                                    Barquisimeto Municipio Iribarren<br />
                                    Parroquia Guerrera Ana Soto Estado Lara<br />
                                    <br />
                                </h5>
                                <u>
                                    <h4>Listado de Personas con Discapadides</h4>
                                </u>
                            </center>
                        </td>
                        <td style="width: 10%;"></td>
                    </tr>

                    <tr> 
                        
                            <div style='width:100%;text-align:justify'>
                                <table class="datos">
                                    <tr>
                                        <td>
                                            Cedula
                                        </td>
                                        <td>
                                            Nombres y Apellidos
                                        </td>
                                        <td>
                                            Direccion
                                        </td>
                                        <td>
                                            Edad
                                        </td>
                                        <td>Sexo</td> 
                                        <td>
                                            Dicapadidad
                                        </td>
                                        <td>Observacion</td>
                                    </tr>
                                    <tbody id="datos">
                                        <?php foreach ($this->discapacitados as $key => $value): ?>
                                            
                                       
                                        <tr>
                                            <td><?php echo $value["cedula_persona"] ?></td>
                                            <td><?php echo $value["primer_nombre"]." ".$value["primer_apellido"] ?></td>
                                            <td><?php echo $value["direccion_vivienda"] ?></td>
                                            <td>
                                                <?php 
                                                    list($ano,$mes,$dia) = explode("-",$value["fecha_nacimiento"]);
                                                    $ano_diferencia  = date("Y") - $ano;
                                                    $mes_diferencia = date("m") - $mes;
                                                    $dia_diferencia   = date("d") - $dia;
                                                    if ($dia_diferencia < 0 || $mes_diferencia < 0)
                                                        $ano_diferencia--;
                                                    echo $ano_diferencia." Años"; 
                                                ?>
                                            </td>
                                            <td><?php echo $value["genero"] ?></td>
                                            
                                                
                                                    <td>
                                                        <?php foreach ($this->discapacidades as $key): ?>
                                                        <?php if ($value["cedula_persona"] == $key["cedula_persona"]): ?>
                                                             <?php echo $key["nombre_discapacidad"]."</br>" ?>
                                                        <?php endif ?>
                                                        <?php endforeach ?>
                                                    </td>
                                                    
                                                 <td>
                                                        <?php foreach ($this->discapacidades as $key): ?>
                                                        <?php if ($value["cedula_persona"] == $key["cedula_persona"]): ?>
                                                             <?php echo $key["observaciones"] ?>
                                                        <?php endif ?>
                                                        <?php endforeach ?>
                                                    </td>
                                        </tr>
                                         <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                        
                    <tr>
                        
                    </tr>
                    </tr>
                </table>

            </div>
        </div>
        <!-- /.card-body -->
    </section>
    <!-- /.content -->
</div>