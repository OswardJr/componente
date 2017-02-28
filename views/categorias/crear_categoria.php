<section class="content-header">
  <center>
  <h1>
    Categorias
    <small></small>
  </h1>
  </center>
</section>
<hr>
<section class="content">
  <div class="row">
    <div class="col-xs-6 col-xs-offset-3">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Nueva categoria</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form name="crear_categoria" action="" method="post" id="crear_usuario">
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
<script type="text/javascript">
    window.onload = function () {
        document.crear_categoria.focus();
        document.crear_categoria.addEventListener('submit', validarFormulario);
    }

    function validarFormulario(evObject) {
        evObject.preventDefault();
        var todoCorrecto = true;
        var formulario = document.crear_categoria;
        for (var i=0; i<formulario.length; i++) {
            if(formulario[i].type =='text') {
             if (formulario[i].value == null || formulario[i].value.length == 0 || /^\s*$/.test(formulario[i].value)){
                 swal ('No puede haber campos vacíos');
                 todoCorrecto=false;
             }
         }
     }
     if (todoCorrecto ==true) {formulario.submit();}
 }
</script>
