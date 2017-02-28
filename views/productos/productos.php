<section class="content-header">
  <h1>
    Productos
    <small></small>
  </h1>
</section>
<hr>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">

        <div class="box-header">
          <h3 class="box-title">Listado de productos</h3>
        </div>
        <div class="box-body">
          <table id="table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Codigo</th>
                <th>Descripción</th>
                <th>Categoria</th>
                <th>Precio compra</th>
                <th>Existencia Total</th>
                <th>Stock Mínimo</th>
                <th style="width: 80px;">Acciones</th>
              </tr>
            </thead>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
</div>

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body form">
              <form name="" id="form2" action="" method="post">
                <div class="form-group col-xs-4" style="margin-bottom: 0px; height: 80px;">
                  <label>Codigo de Producto<a class="campos-required" title="Campo Obligatorio."></a></label>
                    <input type="text" name="cod_prod" id="codigo_p" disabled="true" class="form-control" placeholder="XXX000000" required>
                    <span class="help-block"></span>
                </div>
                <div class="form-group col-xs-4" style="margin-bottom: 0px; height: 80px;">
                  <label>Descripción<a class="campos-required" title="Campo Obligatorio."></a></label>
                  <textarea type="text" name="descripcion" id="descripcion_p" disabled="true" class="form-control" placeholder="" required></textarea>
                </div>
                <div class="form-group col-xs-4">
                  <label>Modelo<a class="campos-required" title="Campo Obligatorio."></a></label>
                  <textarea type="text" name="modelo" id="modelo_p" class="form-control" disabled="true" placeholder=""required ></textarea>
                </div>
                <div class="form-group col-xs-offset-2 col-xs-4">
                  <label>Precio de venta<a class="campos-required" title="Campo Obligatorio."></a></label>
                  <input type="text" name="p_venta" id="p_venta"  class="form-control" disabled="true" placeholder="" required>
                </div>
                <div class="form-group col-xs-4">
                  <label>Existencia<a class="campos-required" title="Campo Obligatorio."></a></label>
                  <input type="text" name="stock" id="stock"  class="form-control" disabled="true" placeholder="" required>
                </div>
                <br><br>
                <center>
                  <span class="" style="font-weight:bold;"><a class="obli" rel="tooltip" style="font-size:20px;">.</a></span><br><br>
                  <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
                  <br><br>
                </center>
              </form>
            </div>
        </div>
    </div>
</form>
            </div>
            <div class="modal-footer">
                <center>
                    <a data-dismiss="modal"  type="submit" class="btn btn-sucedio margin glyphicon glyphicon-arrow-left "  data-toggle="tooltip" title="Volver"></a>
                </center>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="modal_form1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>

            <div class="modal-body form">
        <form id="form" class="form" role="form">
            <div class="form-group col-xs-4" style="margin-bottom: 0px; height: 80px;">
                  <label>Codigo de Producto<a class="campos-required" title="Campo Obligatorio."> *</a></label>
                    <input type="text" name="cod_prod" id="codigo_p" disabled="true"  class="form-control" placeholder="XXX000000" required>
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
    <center>
                    <span class="" style="font-weight:bold;">Los campos marcados con <a class="obli" rel="tooltip" style="font-size:20px;">*</a> son Obligatorios.</span><br><br>
                    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
                    <button type="button" id="btnSave" onclick="guardar_producto()" data-toggle="tooltip" title="Guardar" class="btn btn-ver margin glyphicon glyphicon-floppy-disk"></button>
                    <button type="button"  data-dismiss="modal" data-toggle="tooltip" title="Volver" class="btn btn-sucedio margin glyphicon glyphicon-arrow-left "></button>
                </center>
    </form>
        </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
  var table;
  $(document).ready(function() {
        //datatables
        table = $('#table').DataTable({
        "processing": true, //Feature control the processing indicator.
        "ajax": {
          "url": "?controller=productos&action=all",
          "type": "POST"
        },
      });
      });
  function recargar()
  {
        table.ajax.reload(null,false); //reload datatable ajax
      }
    </script>
