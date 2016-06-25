<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/dist/css/boostrapAdmin.css">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/dist/css/font-awesome.css">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/css/app.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href=""></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Identifiquese para iniciar sesi&oacuten</p>
      <form action="" method="post" name="login">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="username" placeholder="usuario"   id="username" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="clave"  id="password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <center>
            <button   class="btn btn-primary fa fa-unlock" id="login"> ACCEDER</button>
          </center>
        </div>
      </form>
    </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->
</body>
<script src="<?php echo Conectar::ruta()?>public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo Conectar::ruta()?>public/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo Conectar::ruta()?>public/dist/js/app.js"></script>
<script src="<?php echo Conectar::ruta()?>public/js/login.js"></script>