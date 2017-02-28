<?php
$d = new DateTime();
?>
<section class="content-header" style="padding-top: 0px;">
  <center>
    <h1>
      Comprobante de Presupuesto
    </h1>
  </center>
</section>
<!-- Main content -->
<section class="content">
  <div class="row" style="margin-left:10%;">
    <iframe src="views/reportes/factura_presu.php?cod_presu=<?php echo $_GET['cod'] ?>" width="90%" frameborder="0" height="500">
      <p>Your browser does not support iframes.</p>
    </iframe>
  </div>
     <div class="row">
     <br>
            <div class="col-xs-offset-5 col-xs-1">
              <a class="btn btn-ver glyphicon glyphicon-arrow-left" href="?controller=presupuestos&action=index"  title="Volver" type="submit"
               >Volver</a>
            </div>
          </div>
</section>

<!-- <script>
  $( "#option" ).click(function() {
   $('#capa').html(`<div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Agregar Productos</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-xs-12">
            <div class="form-group col-xs-3 " style="margin-bottom: 0px; height: 60px">
              <p class="margin"><strong>Producto</strong></p>
              <div class="input-group input-group-sm">
                <input id="codigo" name="codigo-entrada" type="text" class="form-control" placeholder="XXX000" disabled>
                <span class="input-group-btn">
                  <div data-toggle="tooltip" onclick="buscar_producto_compra()" title="Buscar"  class="btn btn-ver btn-flat fa fa-search " ></div>
                </span>
              </div>
            </div>
            <div title="Nuevo" class="form-group col-xs-1 btn boton btn-agregar fa fa-plus" data-toggle="modal" href="#modal-prod" style="padding-bottom: 4px;padding-top: 4px;margin-bottom: 0px;margin-top: 31px;padding-right: 0px;padding-left: 0px;width:5.2%;border-right-width: 1px;margin-right: 3%;"></div>
            <div class="form-group col-xs-3 ">
              <p class="margin"><strong>Precio de Compra</strong></p>
              <input type="text" name="precio" class="form-control" id="precio">
            </div>
            <div class="form-group col-xs-4 ">
              <label>Descripción</label>
              <textarea type="text" name="descripcion" id="descripcion" class="form-control" disabled ></textarea>
            </div>
            <div class="form-group col-xs-2 ">
              <p class="margin"><strong>Existencia</strong></p>
              <input type="text" id="existencia" name="stock" class="form-control" id="stock"  disabled>
            </div>
            <div class="form-group col-xs-2 ">
              <label style="margin-bottom: 10px;"><strong>Stock Minimo</strong></label>
              <input type="text" id="minimo" name="stock_m" class="form-control" id="stock_m"  disabled>
            </div>
            <div class="form-group col-xs-2 ">
              <p class="margin"><strong>Cantidad</strong></p>
              <input type="text" id="cantidad" class="form-control"  disabled >
            </div>
            <div class="form-group col-xs-1">
              <div class="btn boton btn-ver fa fa-shopping-cart btn-agregar-producto" onClick="agregar_carrito_compra()"> Añadir</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>`);

 });

</script> -->
