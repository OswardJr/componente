<section class="content-header">
    <h1>
        Clientes
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <a  href="?controller=clientes&action=create" role="button" class="btn btn-sucedio"><span class="glyphicon glyphicon-plus"></span> Nuevo cliente</a>
    </section>
    <hr>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    
                    <div class="box-header">
                        <h3 class="box-title"><strong>Ultimos clientes registrados</strong></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Rif</th>
                                    <th>Raz&oacuten social</th>
                                    <th>Direcci&oacuten</th>
                                    <th>Tel&eacutefono</th>
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
                            <label class="control-label col-md-3">Rif</label>
                            <div class="col-md-9">
                                <input name="rif" class="form-control" type="text" disabled="true" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Razon social</label>
                            <div class="col-md-9">
                                <input name="razon_social" placeholder="Last Name" class="form-control" type="text" disabled="true" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Telefono</label>
                            <div class="col-md-9">
                                <input name="telefono"  class="form-control" type="text" disabled="true" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input name="email" class="form-control" type="text" disabled="true" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Direccion</label>
                            <div class="col-md-9">
                                <textarea name="direccion" placeholder="Address" class="form-control" disabled="true" ></textarea>
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
                            <label class="control-label col-md-3">Rif<a class="campos-required" title="Campo Obligatorio."> *</a></label>
                            <div class="col-md-9">
                                <input name="rif" class="form-control" type="text"  >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Razon social<a class="campos-required" title="Campo Obligatorio."> *</a></label>
                            <div class="col-md-9">
                                <input name="razon_social" placeholder="Last Name" class="form-control" type="text"  >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Telefono<a class="campos-required" title="Campo Obligatorio."> *</a></label>
                            <div class="col-md-9">
                                <input name="telefono"  class="form-control" type="text"  >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input name="email" class="form-control" type="text"  >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Direccion<a class="campos-required" title="Campo Obligatorio."> *</a></label>
                            <div class="col-md-9">
                                <textarea name="direccion" placeholder="Address" class="form-control"  ></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
                        <input value="" name="id_cliente" type="hidden" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <center>
                    <span class="" style="font-weight:bold;">Los campos marcados con <a class="obli" rel="tooltip" style="font-size:20px;">*</a> son Obligatorios.</span><br><br>
                    <button type="button" id="btnSave" onclick="guardar_cliente()" data-toggle="tooltip" title="Guardar" class="btn btn-ver margin glyphicon glyphicon-floppy-disk"></button>
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
                                                    "scrollX": true,
                                                "processing": true, //Feature control the processing indicator.
                                                "ajax": {
                                                    "url": "?controller=clientes&action=all",
                                                    "type": "POST"
                                                },
                                            });
                                            });
    function recargar()
    {
                                                table.ajax.reload(null,false); //reload datatable ajax
                                            }
                                        </script>
