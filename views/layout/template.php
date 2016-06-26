<!doctype html>
<html class="no-js" lang="es_ES" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/plugins/sweetalert/sweetalert.css">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/dist/css/boostrapAdmin.min.css">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/dist/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/dist/css/skins/skin-blue-light.css">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/css/app.css">
</head>
<body class="skin-blue-light fixed body">
  <?php
  require_once("views/layout/topbar.php")
  ?>
  <div class="content-wrapper" style="min-height: 1024px;">
    <!-- Content Header (Page header) -->
    <?php
    require_once("views/layout/sidebar.php")
    ?>
      <!-- ejemplo de pesta#a arriba del content
      <section class="content-header">
        <h1>
        Compras
        </h1>
      </section>  -->
      <!-- El contenido de la vista que se este ejecutando va aqui ejemplo:
      <section class="content">
        <div class="row">
          <h1>hola error</h1>
        </div>
      </section>
    -->
    
    <script src="<?php echo Conectar::ruta()?>public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/plugins/sweetalert/sweetalert-dev.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/dist/js/app.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/js/app.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/js/clientes.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/js/proveedores.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/js/usuarios.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/js/compra.js"></script>
  </body>
  </html>