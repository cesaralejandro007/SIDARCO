<head> 
    <!-- ============================Etiquetas Meta====================  -->
    <meta charset="utf-8">
    <meta name="author" content="Josseth Arroyo" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="Description" content="Sistema de Informacion" />
    <meta name="distribution" content="global" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta http-equiv="Content-Language" content="es" />
    <!--=======================Titolu del Sistema============================ -->
    <title id="page-title">
        SIDARCO
    </title>
    <!-- ============================Estilos============================ -->
    <!-- icon CSS -->
    <link rel="shortcut icon" type="imagen/x-icon" href="<?php echo constant('URL')?>config/img/web/navigation.png"> 
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo constant('URL')?>config/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars --> 
    <link rel="stylesheet"
        href="<?php echo constant('URL')?>config/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    
    <link rel="stylesheet" href="<?php echo constant('URL')?>config/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo constant('URL')?>config/css/datatables.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL')?>config/plugins/datatables/media/css/select.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL')?>config/plugins/datatables/media/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL')?>config/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL')?>config/plugins/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL')?>config/plugins/font-awesome/css/font-awesome.min.css">
    <!-- SweetAlert2 -->
    <link href="<?php echo constant('URL')?>config/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <script src="<?php echo constant('URL')?>config/plugins/sweetalert2/sweetalert2.js"></script>
    <style>
        .swal-width  {
            width : 100% !important;
        }
    </style>


    <!-- jquery -->
    <script src="<?php echo constant('URL')?>config/plugins/jquery/jquery-3.6.3.min.js"></script>
    <script src="<?php echo constant('URL')?>config/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
    <style>
    @import url(<?php echo constant('URL')?>config/scss/icons/font-awesome/css/font-awesome.min.css);
    @import url(<?php echo constant('URL')?>config/scss/icons/simple-line-icons/css/simple-line-icons.css);
    @import url(<?php echo constant('URL')?>config/scss/icons/weather-icons/css/weather-icons.min.css);
    @import url(<?php echo constant('URL')?>config/scss/icons/material-design-iconic-font/css/materialdesignicons.min.css);
    </style>
       <!--  Select2 -->
   <script src="<?php echo constant('URL') ?>config/plugins/select2/dist/js/select2.js"></script>
   <link rel="stylesheet" href="<?php echo constant('URL')?>config/plugins/select2/dist/css/select2.css">
    <?php include (call."Style-tabs.php"); ?>
    <script>
        const protocol = window.location.protocol;
        const host = window.location.host;

// Definir la parte específica de la ruta
        const subPath = 'dashboard/www/SIDARCO/';

// Combinar todas las partes para obtener la URL base
        const BASE_URL = protocol + '//' + host + '/' + subPath;

       /*  const BASE_URL = 'http://localhost/dashboard/www/SIDARCO/';
        typeof BASE_URL; */

    </script>

    <script src="<?php echo constant('URL')?>config/js/news/validacion-generica.js"></script>
</head>