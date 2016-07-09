<section class="content-header">
  <h1>
    Productos
    <small></small>
  </h1>
</section>
<hr>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Registro de Productos</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form name="crear_producto" action="" method="post" id="form">
            <div class="form-group col-xs-4 " style="margin-bottom: 0px; height: 60px">
              <label>Codigo de Producto<a class="campos-required" title="Campo Obligatorio."> *</a></label>
              <div class="input-group input-group-sm" >
                <input type="text" id="codigo" name="codigo"  class="form-control" placeholder="XXX000000" required>
                <span class="input-group-btn">
                  <button  onClick="buscarProducto()" class="btn btn-info btn-flat fa fa-search" type="button"></button>
                </span>
              </div>
              <center><span id="mensaje" class="help-block"></span></center>
            </div>
            <div class="form-group col-xs-4">
              <label>Descripción<a class="campos-required" title="Campo Obligatorio."> *</a></label>
              <textarea type="text" name="descripcion" id="Descripcion" class="form-control" placeholder="" required></textarea>
            </div>
            <div class="form-group col-xs-4">
              <label>Modelo<a class="campos-required" title="Campo Obligatorio."> *</a></label>
              <textarea type="text" name="modelo" id="modelo" class="form-control" placeholder=""required ></textarea>
            </div>
            <div class="form-group col-xs-4">
              <label>Peso</label>
              <input type="text" name="peso"  class="form-control" placeholder="" >
            </div>
            <div class="form-group col-xs-4">
              <label>Color</label>
              <input type="text" name="color"  class="form-control" placeholder="">
            </div>
            <div class="form-group col-xs-4">
              <label>Garantia</label>
              <input type="text" name="garantia"  class="form-control" placeholder="">
            </div>
            <div class="form-group col-xs-4">
              <label>Precio de compra<a class="campos-required" title="Campo Obligatorio."> *</a></label>
              <input type="text" name="p_compra"  class="form-control" placeholder="" required>
            </div>
            <div class="form-group col-xs-4">
              <label>Precio de venta<a class="campos-required" title="Campo Obligatorio."> *</a></label>
              <input type="text" name="p_venta"  class="form-control" placeholder="" required>
            </div>
            <div class="form-group col-xs-4">
              <label>Stock inicial<a class="campos-required" title="Campo Obligatorio."> *</a></label>
              <input type="text" name="stock"  class="form-control" placeholder="" required>
            </div>
            <div class="form-group col-xs-4">
              <label>Stock minimo<a class="campos-required" title="Campo Obligatorio."> *</a></label>
              <input type="text" name="stock_min"  class="form-control" placeholder="" required>
            </div>
            <input type="hidden" name="status" id="grabar" value="activo"/>
            <div class="form-group col-xs-4">
              <label><a class="campos-required" title="Campo Obligatorio.">*</a>Procedencia</label>
              <select name="procedencia" id="inputSelect" class="form-control" required>
                <option>-- Seleccione --</option>
                <option>Nacional</option>
                <option>Internacional</option>
              </select>
            </div>
            <div class="form-group col-xs-4">
              <label><a class="campos-required" title="Campo Obligatorio.">*</a>Categoria</label>
              <select name="categoria" id="inputSelect" class="form-control" required>
                <option>-- Seleccione --</option>
                <?php foreach($categorias as $c): ?>
                  <option value="<?php echo $c['id_cat'];?>"><?php echo $c['nombre'];?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <center>
              <span class="" style="font-weight:bold;">Los campos marcados con <a class="obli" rel="tooltip" style="font-size:20px;">*</a> son Obligatorios.</span><br><br>
              <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
              <button data-toggle="tooltip" title="Registrar" type="submit" class="btn btn-ver margin glyphicon glyphicon-floppy-disk" name="agregar"></button>
              <button data-toggle="tooltip" title="Limpiar Formulario" type="reset" class="btn btn-sucedio margin glyphicon glyphicon-repeat"></button><br>
            </center>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
</div>
