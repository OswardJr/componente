<section class="content-header">
  <h1>
    Usuarios
    <small></small>
  </h1>
</section>
<hr>
<section class="content">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Nuevo usuario</h3>
        </div><!-- /.box-header -->
        <div class="modal-body">
          <form name="crear_usuario" action="" method="post" id="crear_usuario">
            <!-- text input -->
            <div class="form-group ">
              <label>Cedula<a class="campos-required" title="Campo Obligatorio."> *</a></label>
              <div class="input-group input-group-sm">
                <input type="text" name="cedula" id="cedula" class="form-control" placeholder="" value="<? echo $cedula?>" required>
                <span class="input-group-btn">
                  <button  data-toggle="tooltip" title="Consultar" class="btn btn-info fa fa-search
                  " type="button"  onClick="buscarUsuario()" name="btn-search"></button>
                </span>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-offset-4 col-xs-4 mensaje">
                <!-- Aqui va el mensaje de la validacion -->
              </div>
            </div>
            <div class="form-group">
              <label>Primer nombre<a class="campos-required" title="Campo Obligatorio."> *</a></label>
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label>Primer apellido<a class="campos-required" title="Campo Obligatorio."> *</a></label>
              <input type="text" name="apellido" id="apellido" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label>Nombre de usuario<a class="campos-required" title="Campo Obligatorio."> *</a></label>
              <input type="text" name="username" id="username" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label>Contraseña<a class="campos-required" title="Campo Obligatorio."> *</a></label>
              <input type="password" name="password" id="password" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="input" class="control-label">Rol</label>
              <select name="rol" id="input" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="Administrador">Administrador</option>
                <option value="empleado">Empleado</option>
              </select>
            </div>
            <div class="form-group">
                <label class="control-label">Pregunta secreta</label>
                   <select name="pregunta" id="preguntaselect" class="form-control" required="true">
                    <option id="pregunta" value="">Seleccione</option>
                    <option id="pregunta" value="Lugar de nacimiento de la madre">Lugar de nacimiento de la madre</option>
                    <option id="pregunta" value="Nombre de su abuela">Nombre de su abuela</option>
                    <option id="pregunta" value="Nombre de su primera mascota">Nombre de su primera mascota</option>
                </select>
        </div>
        <div class="form-group">
            <label class="control-label ">Respuesta</label>
                <input name="respuesta"  class="form-control" type="text" >
                <span class="help-block"></span>
        </div>
            <input type="hidden" name="status" value="activo" />
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
        document.crear_usuario.focus();
        document.crear_usuario.addEventListener('submit', validarFormulario);
    }

    function validarFormulario(evObject) {
        evObject.preventDefault();
        var todoCorrecto = true;
        var formulario = document.crear_usuario;
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
