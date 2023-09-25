<?php include (call."Inicio.php"); ?>
<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <input type="hidden" id="id_solicitud" value="<?php echo $_GET['id'] ?>">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0" id="title-solicitud">Consejo Comunal Prados de Occidente</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


 <div id="app" style="padding-top: 8rem;display:none">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 form-group">
                        <label>
                            Nombre:
                        </label>
                        <input class="form-control" id='email_name'  type="text" v-model="from_name">
                        </input>
                    </div>
                    <div class="col-sm-6 col-sm-offset-3 form-group">
                        <label>
                            Asunto:
                        </label>
                        <input class="form-control" type="text" v-model="subject" id='email_subject'>
                        </input>
                    </div>
                    <div class="col-sm-6 col-sm-offset-3 form-group">
                        <label>
                            Correo:
                        </label>
                        <input class="form-control" type="email" v-model="from_email"  id='email_email'>
                        </input>
                    </div>
                    <div class="col-sm-6 col-sm-offset-3 form-group">
                        <label>
                            Mensaje:
                        </label>
                        <textarea class="form-control" v-model="message" id='email_message'>
                        </textarea>
                    </div>
                    <div class="col-sm-6 col-sm-offset-3 text-center">
                        <button @click="enviar" class="btn btn-success" id='btn_correo'>
                            Enviar
                        </button>
                    </div>
                </div>
            </div>
        </div>

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
  <center>
   <div style="width:95%;background: white;height: 77vh;border-radius: 30px;">
<div style="width:90%;text-align: justify; ">

    <br>
      <div style="width:100%;background: #DEEEE2;padding-left: 6%;padding-right: 6%;border-radius: 30px">
        <br>
        <div style="width:100%;text-align: right;font-size:24px"><em class="fa fa-clock-o" ></em> <span id="fecha_solicitud">Fecha</span></div>
        <center>
          <br>
    <span style="font-size:80px" class="fa fa-user-o"></span> <h4 id="persona">Pruieba</h4>
    </center>
   <!--  <div class="mb-3">
  <label for="formFile" class="form-label">Adjunte la constancia de la solicitud</label>
  
</div> -->
    <br>
 <span style="font-size:60px" id="formFile" class="fa fa-file-text-o"></span></td><td ><h5 id="tipo_constancia">Adjunte la constancia</h5>
<!-- <div class="mb-3">
 <label class="form-label" for="FormFile"></label>
 <input class="form-control" style=""    accept="application/pdf" type="file" id="formFile" name="datos[archivo]">
</div> -->
<div class="mb-3">
<label for="formFileSm" class="form-label">Small file input example</label>
  <input class="form-control form-control-sm" id="formFileSm" type="file">
</div>
 <br>
<span style="font-size:60px" class="fa fa-question-circle-o"></span></td><td ><h5 id="motivo">Motivo de solicitud</h5>
  <br><br>
  <center><button type="button" class="btn btn" style="background:#15406D;color:white" id="aprobar">Aprobar</button> <button type="button" class="btn btn-danger" style="background:#9D2323; color:white" id="rechazar">Rechazar</button></center>
  <br><br>

</div>
     </div>  
   </div>
</center>
    </section>
    <!-- /.content -->
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!--Integrar los archivos de bootstrap-->




<?php include (call."Fin.php"); ?>
<?php include (call."style-agenda.php"); ?>

<link rel="stylesheet" src="<?php echo constant('URL')?>config/css/estilosdowload.css"> 
<script src="<?php echo constant('URL')?>config/js/vue.min.js"></script>
<script type="text/javascript" src="<?php echo constant('URL')?>config/js/email.min.js"></script>
<script type="text/javascript" src="<?php echo constant('URL')?>config/js/news/solicitudes-consulta.js"></script>