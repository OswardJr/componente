<?php
@session_start();
?>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Productos</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-xs-12 detalle-producto">
        <table id="table1" class="table table-bordered table-striped">
          <table id="table1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Codigo</th>
                              <th>Descripcion</th>
                              <th>Precio</th>
                              <th>Cantidad</th>
                              <th>Total neto</th>
                              <th>Opciones</th>
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
                                  <td><input style="width:56px;"  type="text" class="form-control" value="<?php echo $detalle['cantidad'];?>"></td>
                                  <td><?php echo $detalle['total'];?></td>
                                  <td><div class="btn btn-sm btn-delete fa fa-trash eliminar-producto" onClick="eliminar_carrito_venta('<?php echo $detalle['codigo'];?>')"></div></td>
                                </tr>
                                <?php }?>
                              </tbody>
                              <?php }?>
                        </table>
          </div>
        </div>
      </div>
    </div>
    <div  class="col-xs-3" style="padding-left: 0px;">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Forma de pago</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <select name="forma_pago" id="forma_pago" class="form-control" required="required">
                <option value=""></option>
                <option value="efectivo">efectivo</option>
                <option value="transferencia">transferencia</option>
                <option value="deposito">deposito</option>
                <option value="credito">credito</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-4  col-xs-offset-5 " style="padding-right: 0px;">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Total</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-xs-12">
              <!-- general form elements -->
              <table id="example1" class="table table-bordered table-striped">
                <?php if(count($_SESSION['detalle'])>0){?>
                  <?php
                  $subtotal = 0;
                  foreach($_SESSION['detalle'] as $k => $detalle){
                    $subtotal += $detalle['total'];
                    $iva = ($subtotal * 12) / 100;
                    $total_final = $subtotal+$iva;
                  }
                  ?>
                  <?php } ?>
                  <tr >
                    <td class="col-xs-1">Subtotal</td>
                    <td class="col-xs-2"><input id="subtotal" type="text" name="subtotal" class="form-control " value="<?php echo $subtotal;?>"
                      ></td>
                    </tr>
                    <tr>
                      <td class="col-xs-1">IVA</td>
                      <td class="col-xs-2"><input id="iva" type="text" name="impuesto" class="form-control" value="<?php echo $iva;?>" ></td>
                    </tr>
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
      table = $('#table1').DataTable({
        "scrollX": true
      });
    });
  </script>
