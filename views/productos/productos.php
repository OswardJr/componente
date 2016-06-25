<section class="content-header">
  <h1>
    Productos
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <a  href="?controller=productos&action=create" role="button" class="btn btn-sucedio" data-toggle="modal"><span class="fa fa-plus"></span> Nuevo Producto</a>
  </ol>
</section>
<hr>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        
        <div class="box-header">
          <h3 class="box-title">Productos Registrados</h3>
        </div>
        <div class="box-body">
          <table id="table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Codigo</th>
                <th>Descripción</th>
                <th>Categoria</th>
                <th>Precio compra</th>
                <th>Precio venta</th>
                <th>Stock minimo</th>
                <th>Existencia</th>
                <th style="width: 80px;">Acciones</th>
              </tr>
            </thead>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
</div>
<!-- Formuario para crear nuevo cliente-->
<script type="text/javascript">
  var table;
  $(document).ready(function() {
        //datatables
        table = $('#table').DataTable({
        "processing": true, //Feature control the processing indicator.
        "ajax": {
          "url": "?controller=productos&action=all",
          "type": "POST"
        },
      });
      });
  function recargar()
  {
        table.ajax.reload(null,false); //reload datatable ajax
      }
    </script>