<section class="content-header">
  <h1>
    Proveedores
    <small></small>
  </h1>
</section>
<hr>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Nuevo proveedor</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form name="crear_Prov" action="" method="post" id="crear_Prov">
            <!-- text input -->
            <div class="form-group col-xs-6"  style="margin-bottom: 0px; height: 60px">
              <label>Rif<a class="campos-required" title="Campo Obligatorio."> *</a></label>
              <div class="input-group input-group-sm">
                <input type="text" name="rif" id="rif" class="form-control" pattern="^([JVEG]{1})-([0-9]{8})-([0-9]{1})$" title="El formato debe ser J-12345678-9"  placeholder="J-12345678-9" onkeyup="this.value=this.value.toUpperCase()" value="<? echo $rif?>" required>
                <span class="input-group-btn">
                  <button  data-toggle="tooltip" title="Consultar" class="btn btn-info btn-flat fa fa-search
                  " type="button"  onClick="buscarProv()" name="btn-search"></button>
                </span>
              </div>
              <center><span id="mensaje" class="help-block"></span></center>
            </div>
            <div class="form-group col-xs-6">
              <label>Raz&oacuten social<a class="campos-required" title="Campo Obligatorio."> *</a></label>
              <input title="Razón Social" type="text" name="razon_social" id="razon_social" class="form-control" placeholder="Nombre de la empresa" required>
            </div>
            <div class="form-group col-xs-6">
              <label>Tel&eacutefono<a class="campos-required" title="Campo Obligatorio."> *</a></label>
              <input  title="Formato 0243-XXXXXXX"  type="text" name="telefono" id="telefono" pattern="^([0-9]{4})-([0-9]{7})$" class="form-control" placeholder="0243-XXXXXXX" required>
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
              <span class="">Los campos marcados con <a class="obli" rel="tooltip" style="font-size:20px;">*</a> son Obligatorios.</span><br><br>
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
<script type="text/javascript">
    window.onload = function () {
        document.crear_Prov.focus();
        document.crear_Prov.addEventListener('submit', validarFormulario);
    }

    function validarFormulario(evObject) {
        evObject.preventDefault();
        var todoCorrecto = true;
        var formulario = document.crear_Prov;
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
