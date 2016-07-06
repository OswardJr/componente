<section class="content-header">
  <h1>
    Clientes
    <small></small>
  </h1>
</section>
<hr>
<section class="content">
  <div class="row">
    <div class="col-md-12 ">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Nuevo cliente</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form name="crear_cliente" action="" method="post" id="crear_cliente">
            <!-- text input -->
            <div class="form-group col-xs-6 " style="margin-bottom: 0px; height: 60px">
              <label>Rif<a class="campos-required" title="Campo Obligatorio."> *</a></label>
              <div class="input-group input-group-sm">
                <input type="text" name="rif" id="rif" class="form-control " placeholder="J-12345678-9" value="<? echo $rif?>" required>
                <span class="input-group-btn">
                  <button  data-toggle="tooltip" title="Consultar" class="btn btn-info btn-flat fa fa-search
                  " type="button"  onClick="buscarCliente()" name="btn-search"></button>
                </span>
              </div>
              <center><span id="mensaje" class="help-block"></span></center>
            </div>
            <div class="form-group col-xs-6">
              <label>Raz&oacuten social<a class="campos-required" title="Campo Obligatorio."> *</a></label>
              <input type="text" name="razon_social" id="razon_social" class="form-control" placeholder="Nombre de la empresa" required>
            </div>
            <div class="form-group col-xs-6">
              <label>Tel&eacutefono<a class="campos-required" title="Campo Obligatorio."> *</a></label>
              <input type="text" name="telefono" id="telefono" class="form-control" placeholder="0243-XXXXXXX" required>
            </div>
            <div class="form-group col-xs-6">
              <label>Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="contact@example.com">
            </div>
            <!-- textarea -->
            <div class="form-group col-xs-offset-3 col-xs-6">
              <label>Direcci&oacuten<a class="campos-required" title="Campo Obligatorio."> *</a></label>
              <textarea type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion exacta" required></textarea>
            </div>
            <center class="col-xs-offset-3 col-xs-6">
              <span class="" style="font-weight:bold;">Los campos marcados con <a class="obli" rel="tooltip" style="font-size:20px;">*</a> son Obligatorios.</span><br><br>
              <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
              <button data-toggle="tooltip" title="Registrar" type="submit" class="btn btn-ver margin glyphicon glyphicon-floppy-disk" name="agregar"></button>
              <button data-toggle="tooltip" title="Limpiar Formulario" type="reset" class="btn btn-sucedio margin glyphicon glyphicon-repeat"></button>
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
