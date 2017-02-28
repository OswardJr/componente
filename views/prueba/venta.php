<?php
$d = new DateTime();
?>
<section class="content-header" style="padding-top: 0px;">
  <center>
    <h1>
      Comprobante de Venta
  </h1>
</center>
</section>
<!-- Main content -->
<section class="content">
  <div class="row" style="margin-left:10%;">
    <iframe src="views/reportes/factura_venta.php?cod_venta=<?php echo $_GET['cod'] ?>" width="90%" frameborder="0" height="500">
      <p>Your browser does not support iframes.</p>
  </iframe>
</div>
<div class="row">
   <br>
   <div class="col-xs-offset-5 col-xs-1">
      <a class="btn btn-ver glyphicon glyphicon-arrow-left" href="?controller=ventas&action=index"  title="Volver" type="submit"
      >Volver</a>
  </div>
</div>
</section>
