<section class="content-header">
    <h1>
        Búsqueda de Presupuestos por Cliente
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <a  href="views/reportes/presupuestosClientes.php" role="button" class="btn btn-delete"><span class="fa fa-file-pdf-o"></span> Imprimir</a>
    </section>
    <hr>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">

                    <div class="box-header">
                        <h3 class="box-title"><strong>Búsqueda Avanzada</strong></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Rif</th>
                                    <th>Cliente</th>
                                    <th>Fecha</th>
                                    <th>Monto</th>
                                    <th style="width: 80px;" >Acción</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                            <label class="control-label col-md-3">Cliente</label>
                            <div class="col-md-9">
                                <input name="id_cliente" class="form-control" type="text" disabled="true" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Fecha</label>
                            <div class="col-md-9">
                                <input name="fecha_actual" placeholder="Last Name" class="form-control" type="text" disabled="true" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Total</label>
                            <div class="col-md-9">
                                <input name="tot"  class="form-control" type="text" disabled="true" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Empleado</label>
                            <div class="col-md-9">
                                <input name="id_emp" class="form-control" type="text" disabled="true" >
                                <span class="help-block"></span>
                                </div>
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


<script type="text/javascript">
    var table;
    $(document).ready(function() {
//datatables
                                                table = $('#table').DataTable({
                                                    "scrollX": true,
                                                "processing": true, //Feature control the processing indicator.
                                                "ajax": {
                                                    "url": "?controller=presupuestos&action=busqueda",
                                                    "type": "POST"
                                                },
                                            });
                                            });
    function recargar()
    {
                                                table.ajax.reload(null,false); //reload datatable ajax
                                            }
                                        </script>