      <section class="content-header" style="padding-top: 0px;">
        <center>
          <h1>

          </h1>
      </center>
  </section>

<section class="content">
<div class="col-xs-12">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"><strong> Utilidades</strong></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div data-toggle="modal" href="#iva" class=" col-xs-3 col-xs-offset-1">
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">IVA</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                             <img src="public/img/tag.png" alt="iva" class="img-responsive"
                            style="width:100px;margin-left: 25%";
                            >
                        </div>
                    </div>
                </div>
                <div class=" col-xs-3">
                    <div data-toggle="modal" href="#banco"  class="box box-default box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Bancos</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                             <img src="public/img/mastercard.png" alt="iva" class="img-responsive"
                            style="width:100px;margin-left: 25%";
                            >
                        </div>
                    </div>
                </div>
                <div class=" col-xs-3">
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Vencimiento de presupuestos</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                             <img src="public/img/calendar.png" alt="iva" class="img-responsive"
                            style="width:83px;margin-left: 25%";
                            >
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

</section>


<div class="modal fade" id="iva" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <center><h3 class="modal-title"> IVA</h3></center>
      </div>
      <div class="modal-body form">
        <form action="" id="form-iva">
            <div class="form-group">
            <label for="impuesto">VALOR (%)</label>
                <input type="impuesto" name="impuesto" class="form-control" id="impuesto" value="">
            </div>
            <center><div class="btn btn-sucedio fa fa-save" onclick="javascript:guardar_iva()"></div></center>
        </form>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="banco" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <center><h3 class="modal-title"> Bancos</h3></center>
      </div>
      <div class="modal-body contenido">
        <ul class="list-group">

        </ul>
      </div>
        <form id="form-banco" action="" method="POST" class="form-inline col-xs-offset-3" role="form">
          <div class="form-group">
              <label class="" for="banco-otro">Agregar otro </label>
              <input name="nombre" type="email" class="form-control" id="" placeholder="Nombre del banco">
          </div>
          <div  onclick="javascript:guardar_banco()" class="btn btn-sucedio fa fa-save"></div>
      </form>
      <br>
      <br>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="<?php echo Conectar::ruta()?>public/src/js/utilidades.js"></script>
