<section class="content-header">
    <h1>
        Listado de Ventas
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <a  href="?controller=clientes&action=create" role="button" class="btn btn-delete"><span class="fa fa-file-pdf-o"></span> Imprimir</a>
    </section>
    <hr>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">

                    <div class="box-header">
                        <h3 class="box-title"><strong>Ultimas Ventas realizadas</strong></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Clientes</th>
                                    <th>Fecha</th>
                                    <th>Monto</th>
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
<script type="text/javascript">
    var table;
    $(document).ready(function() {
//datatables
table = $('#table').DataTable({
    "scrollX": true,
    "processing": true, //Feature control the processing indicator.
    "ajax": {
       "url": "?controller=ventas&action=all",
       "type": "POST"
   },
});
});
function recargar(){
    table.ajax.reload(null,false); //reload datatable ajax
}
</script>
