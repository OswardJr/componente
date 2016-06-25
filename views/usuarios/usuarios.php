<section class="content-header">
    <h1>
        Usuarios
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <a  href="?controller=usuarios&action=create" role="button" class="btn btn-sucedio"><span class="glyphicon glyphicon-plus"></span> Nuevo usuario</a>
    </ol>
</section>
<hr>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                
                <div class="box-header">
                    <h3 class="box-title"><strong>Usuarios registrados</strong></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Nombre de usuario</th>
                                <th>Rol</th>
                                <th style="width: 80px;" >Acci&oacuten</th>
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
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="forma" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Cedula</label>
                            <div class="col-md-9">
                                <input name="cedula" class="form-control" type="text" disabled="true" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nombre</label>
                            <div class="col-md-9">
                                <input name="nombre" placeholder="" class="form-control" type="text" disabled="true" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Apellido</label>
                            <div class="col-md-9">
                                <input name="apellido" placeholder="" class="form-control" type="text" disabled="true" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nombre de usuario</label>
                            <div class="col-md-9">
                                <input name="username"  class="form-control" type="text" disabled="true" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Rol</label>
                            <div class="col-md-9">
                                <input name="rol" class="form-control" type="text" disabled="true" >
                                <span class="help-block"></span>
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
                <form action="" id="form" class="form-horizontal" method="POST">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Cedula</label>
                            <div class="col-md-9">
                                <input name="cedula" class="form-control" type="text" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nombre</label>
                            <div class="col-md-9">
                                <input name="nombre" placeholder="" class="form-control" type="text" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Apellido</label>
                            <div class="col-md-9">
                                <input name="apellido" placeholder="" class="form-control" type="text" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nombre de usuario</label>
                            <div class="col-md-9">
                                <input name="username"  class="form-control" type="text" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Rol</label>
                            <div class="col-md-9">
                                <select name="rol" id="inputRol" class="form-control" required="true">
                                    <option id="rol" value="">Seleccione</option>
                                    <option id="rol" value="Secretaria">Secretaria</option>
                                    <option id="rol" value="Administrador">Administrador</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
                        <input value="" name="id_emp" type="hidden" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <center>
                    <span class="" style="font-weight:bold;">Los campos marcados con <a class="obli" rel="tooltip" style="font-size:20px;">*</a> son Obligatorios.</span><br><br>
                    <button type="button" id="btnSave" onclick="guardar_usuario()" data-toggle="tooltip" title="Guardar" class="btn btn-ver margin glyphicon glyphicon-floppy-disk"></button>
                    <button type="button"  data-dismiss="modal" data-toggle="tooltip" title="Volver" class="btn btn-sucedio margin glyphicon glyphicon-arrow-left "></button>
                </center>
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
                                                "url": "?controller=usuarios&action=all",
                                                "type": "POST"
                                            },
                                        });
                                        });
    function recargar()
    {
                                            table.ajax.reload(null,false); //reload datatable ajax
                                        }
                                    </script>