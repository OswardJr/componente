<?php
@session_start();
require_once '../../controller/utilidadesController.php';
$ivaEnt=new utilidadesController;
$impuesto= $ivaEnt->valorIva();
?>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Productos</h3>
        </div>

        <div class="box-body">
          <div class="row">
            <div class="col-xs-12 aux-produc">
              <table id="table_" class="table table-bordered table-striped">
                <table id="table_" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <center><th>Código</th></center>
                              <center><th>Descripción</th></center>
                              <center><th>Precio</th></center>
                              <center><th>Cantidad</th></center>
                              <center><th>Total</th></center>
                              <center><th>Accciones</th></center>
                            </tr>
                          </thead>
                          <?php if(count($_SESSION['detalle'])>0){?>
                            <tbody>
                              <?php foreach($_SESSION['detalle'] as $k => $detalle){ ?>
                                <tr>
                                  <td><?php echo $detalle['codigo'];?></td>
                                  <input type='hidden' name='cod[]' value="<?php echo $detalle['codigo'];?>" >
                                  <td><?php echo $detalle['descripcion'];?></td>
                                  <input type='hidden' name='cant[]' value="<?php echo $detalle['cantidad'];?>" >
                                  <td><?php echo $detalle['precio'];?></td>
                                  <input type="hidden" name='precio_p[]' value="<?php echo $detalle['precio'];?>">
                                  <td><?php echo $detalle['cantidad'];?></td>
                                  <td><?php echo $detalle['total'];?></td>
                                  <td><div class="btn btn-sm btn-delete fa fa-trash eliminar-producto" onClick="eliminar_carrito_presu('<?php echo $detalle['codigo'];?>')"></div></td>
                                </tr>
                                <?php }?>
                              </tbody>
                              <?php }?>
                        </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xs-4  col-xs-offset-8 " style="padding-right: 0px;">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Total</h3>
        </div>

        <div class="box-body">
          <div class="row">
            <div class="col-xs-12">

              <table id="example1" class="table table-bordered table-striped">
                <?php if(count($_SESSION['detalle'])>0){?>
                  <?php
                  $subtotal = 0;
                  $valoriva = $impuesto[0];
                  foreach($_SESSION['detalle'] as $k => $detalle){
                    $subtotal += $detalle['total'];
                    $descuento = ($subtotal * 0);
                    $iva = ($subtotal *  $valoriva) / 100;
                    $total_final = $subtotal+$iva+$descuento;
                  }
                  ?>
                  <?php } ?>
                  <tr >
                    <td class="col-xs-1">Subtotal</td>
                    <td class="col-xs-2"><input id="subtotal" type="text" name="subtotal" class="form-control " value="<?php echo $subtotal;?>"
                      ></td>
                    </tr>
                    <td class="col-xs-1">Descuento</td>
                      <td class="col-xs-2"><input id="descuento" type="text" name="descuento" class="form-control" value="<?php echo $descuento;?>" ></td>
                    </tr>
                    <tr>
                      <td class="col-xs-1">IVA: <?php echo $impuesto[0];?>%</td>
                      <td class="col-xs-2"><input id="iva" type="text" name="impuesto" class="form-control" value="<?php echo $iva;?>" ></td>
                    </tr>
                     <tr>
                    <tr>
                      <td class="col-xs-1">Total</td>
                      <td class="col-xs-2"><input id="total" type="text" name="total" class="form-control" value="<?php echo $total_final;?>" ></td>
                    </tr>
                  </table>
                </div>
              </div>
              <input type="hidden" name="token" id="token" value="<?php echo $_SESSION['token']; ?>" />
            </div>
          </div>
        </div>

        <script type="text/javascript">
          $(document).ready(function() {
      //datatables
      table = $('#table_').DataTable({
        "scrollX": true
      });
    });
  </script>
