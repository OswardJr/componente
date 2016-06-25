<header class="main-header">
  <a href="<?php echo Conectar::ruta()?>" class="logo">
    <!-- LOGO -->
    "M & E plus C.A"
  </a>
  <nav class="navbar navbar-static-top">
    <div class="container-fluid">
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"></span> Configuraci&oacuten <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#"><span class="fa fa-cog "></span><?php echo $_SESSION['username']; ?></a></li>
              <li class="divider"></li>
              <li><a href="?controller=login&action=logout"><span class="fa fa-sign-out"></span> Cerrar Sesi&oacuten</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</header>