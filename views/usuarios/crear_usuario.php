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
                <option value="Secretaria">Secretaria</option>
              </select>
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