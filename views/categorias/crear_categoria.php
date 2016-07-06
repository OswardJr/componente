<section class="content-header">
  <h1>
    Categorias
    <small></small>
  </h1>
</section>
<hr>
<section class="content">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Nueva categoria</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form name="crear_usuario" action="" method="post" id="crear_usuario">
            <!-- text input -->
            <div class="form-group">
              <label>Nombre<a class="campos-required" title="Campo Obligatorio."> *</a></label>
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre de la categoria" required>
            </div>
            <div class="form-group">
              <label for="textareaDes" class="control-label">Descripcion</label>
              <div class="">
                <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Breve descripción" required></textarea>
              </div>
            </div>
            <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
            <center>
              <span class="" style="font-weight:bold;">Los campos marcados con <a class="obli" rel="tooltip" style="font-size:20px;">*</a> son Obligatorios.</span><br><br>
              <button data-toggle="tooltip" title="Registrar" type="submit" class="btn btn-ver margin glyphicon glyphicon-floppy-disk" ></button>
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
