<section class="content-header">
  <h1>
    Bitacora
    <small></small>
  </h1>
</section>
<hr>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">

        <div class="box-header">
          <h3 class="box-title">Listado de Movimientos</h3>
        </div>
        <div class="box-body">
          <table id="table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Codigo</th>
                <th>Responsable</th>
                <th>Accion</th>
                <th>Fecha y hora</th>
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
        "processing": true, //Feature control the processing indicator.
        "ajax": {
          "url": "?controller=utilidades&action=getMovimientos",
          "type": "POST"
        },
      });
      });
  function recargar()
  {
        table.ajax.reload(null,false); //reload datatable ajax
      }
    </script>
