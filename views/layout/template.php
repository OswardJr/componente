<!doctype html>
<html class="no-js" lang="es_ES" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/dist/plugins/bootstrap-admin/css/boostrapAdmin.css">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/dist/plugins/bootstrap-admin/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/dist/plugins/datatables/css/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/dist/plugins/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/dist/plugins/bootstrap-admin/css/skins/skin-blue-light.css">  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/src/plugins/sweetalert/css/sweetalert.css">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/src/css/app.css">
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

    <script src="<?php echo Conectar::ruta()?>public/dist/plugins/jQuery/js/jQuery-2.1.4.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/src/plugins/sweetalert/js/sweetalert.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/dist/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/dist/plugins/datatables/js/jquery.dataTables.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/dist/plugins/datatables/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/dist/plugins/slimScroll/js/jquery.slimscroll.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/dist/plugins/bootstrap-admin/js/app.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/src/js/app.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/src/js/clientes.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/src/js/login.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/src/js/productos.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/src/js/compra.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/src/js/proveedores.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/src/js/usuarios.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/src/js/presupuesto.js"></script>
    <script src="<?php echo Conectar::ruta()?>public/src/js/venta.js"></script>
  </body>
  </html>
