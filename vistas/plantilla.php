<?php
session_start();
// Motrar todos los errores de PHP
error_reporting(E_ALL);
// Motrar todos los errores de PHP
ini_set('error_reporting', E_ALL);
?>
<!DOCTYPE html>
<html>
<head>

  <!-- <meta charset="iso-8859-1"> -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Fullgas Pereira</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="vistas/img/plantilla/nombrecompania.png">

   <!--=====================================
  PLUGINS DE CSS
  ======================================-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- Boton Slider -->
  <link rel="stylesheet" href="vistas/dist/css/boton.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

   <!-- pluguin datatables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

   <!-- pluguin datatables responsive -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!-- Select  pluguin -->
  <link rel="stylesheet" href="vistas/dist/css/select2.css">

  <!-- pluguin MOrris .js 2 -->
   <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  
  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
  
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>

  <!-- pluguin datatables -->
  <script type="text/javascript" src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <!-- pluguin datatables responsivo -->
   <script type="text/javascript" src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script type="text/javascript" src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

   <!-- pluguin SWEET ALERT -->
  <script type="text/javascript" src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

  <!-- pluguin Select 2 -->
  <script src="vistas/dist/js/select2.min.js"></script>


  <!-- pluguin MOrris .js 2 -->
  <script type="text/javascript" src="vistas/bower_components/raphael/raphael.min.js"></script>
  <script type="text/javascript" src="vistas/bower_components/morris.js/morris.min.js"></script>

  <!-- pluguin Chart .js 2 -->
  <script type="text/javascript" src="vistas/bower_components/chart.js/Chart.js"></script>

  <!--Plugin HighCharts 7.0.2-->
  <script type="text/javascript" src="vistas/bower_components/highcharts7/code/highcharts.js"></script>
  <script type="text/javascript" src="vistas/bower_components/highcharts7/code/modules/series-label.js"></script>
  <script type="text/javascript" src="vistas/bower_components/highcharts7/code/modules/exporting.js"></script>
  <script type="text/javascript" src="vistas/bower_components/highcharts7/code/modules/export-data.js"></script>
  <script src="vistas/bower_components/highcharts7/code/modules/data.js"></script>
  <script type="text/javascript" src="vistas/bower_components/highcharts7/code/html2canvas.js"></script>
 

</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">
 
  <?php

  if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

   echo '<div class="wrapper">';

    /*=============================================
    CABEZOTE
    =============================================*/

    include "modulos/cabezote.php";


    /*=============================================
    MENU
    =============================================*/

    include "modulos/menu.php";

    /*=============================================
    CONTENIDO
    =============================================*/

    //rutas amigables

    if(isset($_GET["ruta"])){

      if($_GET["ruta"] == "inicio"   ||
         $_GET["ruta"] == "usuarios" ||
         $_GET["ruta"] == "pilotos"  ||
         $_GET["ruta"] == "vehiculos"||
         $_GET["ruta"] == "pagos"    ||
         $_GET["ruta"] == "rodadas"  ||
         $_GET["ruta"] == "asistentes"  ||
         $_GET["ruta"] == "salir"){

        include "modulos/".$_GET["ruta"].".php";


      }else{

        include "modulos/404.php";

      }

    }else{

      include "modulos/inicio.php";

    }

    /*=============================================
    FOOTER
    =============================================*/

    include "modulos/footer.php";

    echo '</div>';

  }else{

    include "modulos/login.php";

  }

  ?>


<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/pilotos.js"></script>
<script src="vistas/js/vehiculos.js"></script>
<script src="vistas/js/pagos.js"></script>
<script src="vistas/js/rodadas.js"></script>
<script src="vistas/js/asistentes.js"></script>


</body>
</html>
