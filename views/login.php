
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/dist/plugins/bootstrap-admin/css/boostrapAdmin.css">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/dist/plugins/bootstrap-admin/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/dist/plugins/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo Conectar::ruta()?>public/dist/css/estilos.css">
</head>
<header>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
       <a class="navbar-brand" href="index.php">M & E PLUS. C.A</a>
     </div>
   </div>
 </header>

 <body>
  <div class="container">
    <div id="loginbox" style="margin-top:3.5%;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="panel panel-primary" >
        <div class="panel-heading">
          <center><div class="panel-title"><strong>Identifiquese para Iniciar Sesión</strong></div></center>
          <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
        </div>

        <div style="padding-top:30px" class="panel-body" >
          <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
          <form action="" method="post" name="login">

            <div style="margin-bottom: 25px" class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
             <input type="text" class="form-control" name="username" placeholder="usuario"   id="username" required>
           </div>

           <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" class="form-control" name="password" placeholder="clave"  id="password" required>
          </div>

          <div class="input-group">
            <div class="checkbox">
              <label>
                <input id="recordar" type="checkbox" name="recordar" value="1">Recordar Contraseña
              </label>
            </div>
          </div>

          <div style="margin-top:10px" class="form-group">
            <div class="col-sm-12 controls">
              <center><a id="login" href="#" class="btn btn-primary">Iniciar</a></center>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
<script src="<?php echo Conectar::ruta()?>public/dist/plugins/jQuery/js/jQuery-2.1.4.js"></script>
<script src="<?php echo Conectar::ruta()?>public/dist/plugins/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo Conectar::ruta()?>public/dist/plugins/bootstrap-admin/js/app.js"></script>
<script src="<?php echo Conectar::ruta()?>public/dist/js/scripts.js"></script>

<?PHP
/*BOOTSTRAP.CSS: 4643

.skin-blue-light .main-header .navbar {
    background-color: #039be0;
}
.skin-blue-light .main-header .logo {
    background-color: #039be0;;
    color: #ffffff;
    border-bottom: 0 solid transparent;
}
.skin-blue-light .main-header .logo:hover {
    background-color: #038cca;
    text-decoration: none;
}
*/
?>
