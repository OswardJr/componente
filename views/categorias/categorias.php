<section class="content-header">
  <h1>
    Categorias
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <a  href="?controller=categorias&action=create" role="button" class="btn btn-sucedio"><span class="glyphicon glyphicon-plus"></span> Nueva categoria</a>
  </ol>
</section>
<hr>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        
        <div class="box-header">
          <h3 class="box-title"><strong>Categorias registradas</strong></h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Acci&oacuten</th>
              </tr>
            </thead>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
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
              <label class="control-label col-md-3">Nombre</label>
              <div class="col-md-9">
                <input name="nombre" placeholder="" class="form-control" type="text" >
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Descripcion</label>
              <div class="col-md-9">
                <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
                <span class="help-block"></span>
              </div>
            </div>
            <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
            <input value="" name="id_cat" type="hidden" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <center>
          <span class="" style="font-weight:bold;">Los campos marcados con <a class="obli" rel="tooltip" style="font-size:20px;">*</a> son Obligatorios.</span><br><br>
          <button type="button" id="btnSave" onclick="guardar_categoria()" data-toggle="tooltip" title="Guardar" class="btn btn-ver margin glyphicon glyphicon-floppy-disk"></button>
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
                    "url": "?controller=categorias&action=all",
                    "type": "POST"
                  },
                });
                });
  function recargar()
  {
                  table.ajax.reload(null,false); //reload datatable ajax
                }
              </script>