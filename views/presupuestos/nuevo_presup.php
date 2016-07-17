<?php
  $d = new DateTime();
?>
      <section class="content-header">
          <h1>
          Nuevo Presupuesto
          </h1>
        </section>

        <section class="content">
        <form role="form" class="form" action="?controller=presupuestos&action=create" method="POST">
          <div class="row" id="row">
            <div class="col-xs-8">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Datos del Cliente</h3>
                </div>

            <div class="box-body">
               <div class="row">
                 <div class="col-xs-12">
                   <div class="form-group col-xs-5" style="margin-bottom: 0px; height: 60px">
                      <p class="margin"><strong>Rif</strong></p>
                        <div class="input-group input-group-sm">
                         <input id="rif-unic" name="rif-unic" type="text" class="form-control"  value="<? echo $rif?>" required="true" maxlength="12" placeholder="J-01234567-0">
                            <span class="input-group-btn">
                             <button data-toggle="tooltip" title="Buscar"  class="btn btn-ver btn-flat fa fa-search" type="button"  onClick="buscar_cliente_presu()"></button>
                        </span>
                    <input type="hidden" name="id_cliente" id="id_cliente" class="campo" style="width: 180px" />
                  </div>
                </div>

                  <div title="Nuevo" class="form-group col-xs-1 btn boton btn-agregar fa fa-plus" data-toggle="modal" href="#modal-id" style="padding-bottom: 4px;padding-top: 4px;margin-bottom: 0px;margin-top: 31px;padding-right: 0px;padding-left: 0px;width:8.3%;border-right-width: 1px;"></div>
                   <div class="form-group col-xs-6  ">
                    <p class="margin"><strong>Razón Social</strong></p>
                    <input type="text" name="razon_social" class="form-control" disabled>
                  </div>

                  <div class="form-group col-xs-6  ">
                    <p class="margin"><strong>Teléfono</strong></p>
                    <input type="text" name="telefono" class="form-control" disabled>
                  </div>

                  <div class="form-group col-xs-6 ">
                    <p class="margin"><strong>Dirección</strong></p>
                    <input type="text" name="direccion" class="form-control" disabled>
                  </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xs-3">
        <div class="box box-primary box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Orden de Presupuesto</h3>
          </div>

                <div class="box-body">
            <?php foreach($serial as $key): ?>
              <h5><strong>Numero:</strong> <?php echo $key+1; ?></h5>
              <input type="hidden" name="cod_factura" id="cod_factura" class="campo" value="<?php echo $key+1; ?>" />
            <?php endforeach; ?>
            <h5><strong>Fecha Actual:</strong><?php  echo "\n" . $d -> format('d/m/Y'); ?></h5>
            <input type="hidden" name="fecha" id="fecha" class="campo" value="<?php  echo $d -> format('Y-m-d'); ?>"/>
            <h5><strong>Responsable:</strong> <?php echo $_SESSION['nombre']; ?> <?php echo $_SESSION['apellido']; ?></h5>
            <input type="hidden" name="id_emp" id="id_emp" class="campo" value="<?php echo $_SESSION['id_emp']; ?>"/>
          </div>
        </div>
      </div>

      <div class="col-xs-12">
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
                    <input id="codigo" name="code" type="text" class="form-control" disabled>
                    <span class="input-group-btn">
                      <div data-toggle="tooltip" onclick="buscar_producto_presu()" title="Buscar"  class="btn btn-ver btn-flat fa fa-search " ></div>
                    </span>
                  </div>
                </div>
                <div title="Nuevo" class="form-group col-xs-1 btn boton btn-agregar fa fa-plus" data-toggle="modal" href="#modal-prod" style="padding-bottom: 4px;padding-top: 4px;margin-bottom: 0px;margin-top: 31px;padding-right: 0px;padding-left: 0px;width:5.2%;border-right-width: 1px;margin-right: 3%;"></div>
                <div class="form-group col-xs-3 ">
                  <p class="margin"><strong>Precio</strong></p>
                  <input type="text" name="precio" class="form-control" id="precio">
                </div>
                <div class="form-group col-xs-4 ">
                  <label>Descripción</label>
                  <textarea type="text" name="descripcion" id="descripcion" class="form-control" disabled ></textarea>
                </div>
                <div class="form-group col-xs-3 ">
                  <p class="margin"><strong>Existencia</strong></p>
                  <input type="text" id="existencia" name="stock" class="form-control" id="stock"  disabled>
                </div>
                <div class="form-group col-xs-3 col-xs-offset-1 ">
                  <p class="margin"><strong>Stock Minimo</strong></p>
                  <input type="text" id="minimo" name="stock_m" class="form-control" id="stock_m"  disabled>
                </div>
                  <div class="form-group col-xs-3 ">
                  <p class="margin"><strong>Cantidad</strong></p>
                  <input type="text" id="cantidad" class="form-control"  disabled >
                </div>
                <div class="form-group col-xs-1">
                  <div class="btn boton btn-ver fa fa-shopping-cart btn-agregar-producto" onClick="agregar_carrito_presu()"> Añadir</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="aux-produc">
      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Productos</h3>
            </div>
              <div class="box-body">
                    <div class="row">
                      <div class="col-xs-12 ">
                        <table id="table_" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Código</th>
                              <th>Descripción</th>
                              <th>Precio</th>
                              <th>Cantidad</th>
                              <th>Total</th>
                              <th>Acciones</th>
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
                                  <td><div class="btn btn-sm btn-delete fa fa-trash eliminar-producto" onClick="eliminar_carrito_presu(<?php echo $detalle['codigo'];?>)"></div></td>
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
                <h3 class="box-title">Válido Por:</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-12">
                    <select name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" required="required">
                      <option value=""></option>
                      <option value="7 Días">7 Días</option>
                      <option value="15 Días">15 Días</option>
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
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-12">
                    <table id="example1" class="table table-bordered table-striped">
                      <?php if(count($_SESSION['detalle'])>0){?>
                        <?php
                        $subtotal = 0;
                        foreach($_SESSION['detalle'] as $k => $detalle){
                          $subtotal += $detalle['total'];
                          $descuento = ($subtotal * 0);
                          $iva = ($subtotal * 12) / 100;
                          $total_final = $subtotal+$iva+$descuento;
                        }
                        ?>
                        <?php } ?>
                        <tr >
                          <td class="col-xs-1">Subtotal</td>
                          <td class="col-xs-2"><input id="subtotal" type="text" name="subtotal" class="form-control " value="<?php echo $subtotal;?>" ></td>
                        </tr>
                        <td class="col-xs-1">Descuento</td>
                          <td class="col-xs-2"><input id="descuento" type="text" name="descuento" class="form-control" value="<?php echo $descuento;?>" ></td>
                        </tr>
                        <tr>
                          <td class="col-xs-1">IVA</td>
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
          </div>
          <div class="row">
            <div class="col-xs-offset-4 col-xs-2">
              <button class="btn btn-ver glyphicon glyphicon-floppy-saved" type="submit"> GUARDAR</button>
            </div>
            <div class="col-xs-2">
              <button class="btn btn-sucedio glyphicon glyphicon-arrow-left"> VOLVER</button>
            </div>
          </div>
        </form>
      </section>

<!-- Modal para crear al cliente en pleno presupuesto-->
      <div class="modal fade" id="modal-id" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body form">
              <form action="" id="form" class="form-horizontal" method="POST">
                <div class="form-body">
                  <div class="form-group">
                    <label class="control-label col-xs-3">Rif<a class="campos-required" title="Campo Obligatorio."> *</a></label>
                    <div class="col-xs-9">
                      <input id="rif" name="rif" class="form-control" type="text" required >
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-xs-3">Razon social<a class="campos-required" title="Campo Obligatorio."> *</a></label>
                    <div class="col-xs-9">
                      <input id="razon_social" name="razon_social"  class="form-control" type="text" required >
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-xs-3">Telefono<a class="campos-required" title="Campo Obligatorio."> *</a></label>
                    <div class="col-xs-9">
                      <input id="telefono" name="telefono"  class="form-control" type="text" required >
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-xs-3">Email</label>
                    <div class="col-xs-9">
                      <input id="email" name="email" class="form-control" type="email" required >
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-xs-3">Direccion<a class="campos-required" title="Campo Obligatorio."> *</a></label>
                    <div class="col-xs-9">
                      <textarea id="direccion" name="direccion"  class="form-control" required ></textarea>
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <input type="hidden" name="token" id="token" value="<?php echo $_SESSION['token']; ?>" />
                </div>
              </div>
              <div class="modal-footer">
                <center>
                  <span class="" style="font-weight:bold;">Los campos marcados con <a class="obli" rel="tooltip" style="font-size:20px;">*</a> son Obligatorios.</span><br><br>
                  <button type="submit" id="btnSave" onclick="crear_cliente()" data-toggle="tooltip" title="Guardar" class="btn btn-ver margin glyphicon glyphicon-floppy-disk"></button>
                  <button data-toggle="tooltip" title="Limpiar Formulario" type="reset" class="btn btn-sucedio margin glyphicon glyphicon-repeat"></button><br>
                </center>
              </div>
            </form>
          </div>
        </div>
      </div>

<!-- Modal para crear al producto en pleno presupuesto-->
      <div class="modal fade" id="modal-prod" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body form">
              <form name="" id="form2" action="" method="post">
                <div class="form-group col-xs-4" style="margin-bottom: 0px; height: 80px;">
                  <label>Codigo de Producto<a class="campos-required" title="Campo Obligatorio."> *</a></label>
                    <input type="text" name="codigo" id="codigo_p"  class="form-control" placeholder="XXX000000" required>
                    <span class="help-block"></span>
                </div>
                <div class="form-group col-xs-4" style="margin-bottom: 0px; height: 80px;">
                  <label>Descripción<a class="campos-required" title="Campo Obligatorio."> *</a></label>
                  <textarea type="text" name="descripcion" id="descripcion_p" class="form-control" placeholder="" required></textarea>
                </div>
                <div class="form-group col-xs-4">
                  <label>Modelo<a class="campos-required" title="Campo Obligatorio."> *</a></label>
                  <textarea type="text" name="modelo" id="modelo_p" class="form-control" placeholder=""required ></textarea>
                </div>
                <div class="form-group col-xs-4">
                  <label>Peso</label>
                  <input type="text" name="peso" id="peso"  class="form-control" placeholder="" >
                </div>
                <div class="form-group col-xs-4">
                  <label>Color</label>
                  <input type="text" name="color" id="color"  class="form-control" placeholder="">
                </div>
                <div class="form-group col-xs-4">
                  <label>Garantia</label>
                  <input type="text" name="garantia" id="garantia"  class="form-control" placeholder="">
                </div>
                <div class="form-group col-xs-4">
                  <label>Precio de compra<a class="campos-required" title="Campo Obligatorio."> *</a></label>
                  <input type="text" name="p_compra" id="p_compra"  class="form-control" placeholder="" required>
                </div>
                <div class="form-group col-xs-4">
                  <label>Precio de venta<a class="campos-required" title="Campo Obligatorio."> *</a></label>
                  <input type="text" name="p_venta" id="p_venta"  class="form-control" placeholder="" required>
                </div>
                <div class="form-group col-xs-4">
                  <label>Stock inicial<a class="campos-required" title="Campo Obligatorio."> *</a></label>
                  <input type="text" name="stock" id="stock"  class="form-control" placeholder="" required>
                </div>
                <div class="form-group col-xs-4">
                  <label>Stock minimo<a class="campos-required" title="Campo Obligatorio."> *</a></label>
                  <input type="text" name="stock_min" id="stock_min"  class="form-control" placeholder="" required>
                </div>
                <div class="form-group col-xs-4">
                  <label>Procedencia<a class="campos-required" title="Campo Obligatorio."> *</a></label>
                  <select name="procedencia" id="procedencia" class="form-control" required>
                    <option>-- Seleccione --</option>
                    <option>Nacional</option>
                    <option>Internacional</option>
                  </select>
                </div>
                <div class="form-group col-xs-4">
                  <label>Categoria<a class="campos-required" title="Campo Obligatorio."> *</a></label>
                  <select name="categoria" id="categoria" class="form-control" required>
                    <option>-- Seleccione --</option>
                    <?php foreach($categorias as $c): ?>
                      <option value="<?php echo $c['id_cat'];?>"><?php echo $c['nombre'];?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <center>
                  <span class="" style="font-weight:bold;">Los campos marcados con <a class="obli" rel="tooltip" style="font-size:20px;">*</a> son Obligatorios.</span><br><br>
                  <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
                  <button data-toggle="tooltip" title="Registrar" type="submit" class="btn btn-ver margin glyphicon glyphicon-floppy-disk" onclick="crear_producto()" ></button>
                  <button data-toggle="tooltip" title="Limpiar Formulario" type="reset" class="btn btn-sucedio margin glyphicon glyphicon-repeat"></button><br>
                </center>
              </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
 <script type="text/javascript">
          $(document).ready(function() {
      //datatables
      table = $('#table_').DataTable({
        "scrollX": true
      });
    });
  </script>
