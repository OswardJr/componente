
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/dist/plugins/bootstrap-admin/css/boostrapAdmin.css">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/dist/plugins/bootstrap-admin/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/dist/plugins/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/plugins/sweetalert/sweetalert.css">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/dist/css/estilos.css">
</head>
<header>

  <nav class="navbar navbar-inverse" style="border-radius:0px;">
    <div class="container-fluid">
      <div class="navbar-header">
       <a class="navbar-brand" href="index.php"></a>
     </div>
     </nav>
   </div><div class="row">
  <div class="col-md-2">


  </div>
  <div class="col-md-8">
<center><h3>Componente de software administrativo de la comunidad M & E plus.</h3></center>
<center><h3>Manejo de compras, ventas, y presupuestos.</h3></center>
  </div><div class="col-md-2">

</div>

 </header>
 <body class="login-div">
  <div class="container">

    <div id="loginbox" style="margin-top:3.5%;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="panel panel-primary" >
        <div class="panel-heading">
          <center><div class="panel-title"><strong>BIENVENIDO(A) DEBES INICIAR SESION</strong></div></center>
        </div>

        <div style="padding-top:30px" class="panel-body" >
        <img src="public/img/img_avatar4.png" alt="Avatar" style="width:180px; margin-bottom:10% ;margin-left:30%;margin-top: 16px!important;border-radius: 50%!important;">
          <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
          <form action="" method="post" name="login">

            <div style="margin-bottom: 25px" class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
             <input type="text" class="form-control" name="username" placeholder="usuario"   id="username" required="true">
           </div>

           <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" class="form-control" name="password" placeholder="clave"  id="password" required="true">
          </div>

          <div class="input-group">

          </div>

          <div style="margin-top:10px" class="form-group">
            <div class="col-xs-2 col-xs-offset-2 controls">
              <center><a id="login" href="#" class="btn btn-info">Entrar</a></center>
            </div>
            <div class="col-sm-4 controls">
              <center><a id="" href="?controller=login&action=recuperar" class="btn btn-sucedio">Recuperar contrasena</a></center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
<script src="<?php echo Conectar::ruta()?>public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo Conectar::ruta()?>public/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo Conectar::ruta()?>public/dist/plugins/bootstrap-admin/js/app.js"></script>
<script src="<?php echo Conectar::ruta()?>public/plugins/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo Conectar::ruta()?>public/src/js/app.js"></script>
<script src="<?php echo Conectar::ruta()?>public/src/js/login.js"></script>
