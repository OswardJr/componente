<section class="content-header">
    <h1>
        Listado de Compras por Fecha
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <a  href="views/reportes/todas_las_compras.php" role="button" class="btn btn-delete"><span class="fa fa-file-pdf-o"></span> Imprimir</a>
    </section>
    <hr>

    <!-- Form code begins -->
    <div class="container">
        <div class="col-xs-11">
            <div class="box box-primary">
                <div class="form-group ">
                  <h5 align="center" class="box-title"><strong></strong></h5>
                  <form method="post">
                    <div class="row">
                     <div class="form-group  col-xs-3 col-xs-offset-1 ">
                         <label for="from" class="form-label">Desde</label>
                         <input type="text" id="fromDate" name="fromDate" class="form-control" value=""></input>
                    </div>
                     <div class="form-group  col-xs-3 col-xs-offset-1">
                        <label for="to">Hasta</label>
                         <input type="text" id="toDate" name="toDate" class="form-control" value=""></input>
                    </div>
                         <div style="
    margin-top: 2.8%;
" id="toDate" name="toDate" class="btn btn-sucedio" onclick="javascript:repfechas()">Buscar</div>
                    </div>
                </form>
                </div>
            </div>
        </div>  
    </div>  
<!-- Form code ends --> 

    <div class="container">
        <div class="col-xs-11">
            <div class="box box-primary">
                <div class="box-body">
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Proveedor</th>
                                <th>Fecha</th>
                                <th>Monto Total</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>  
    </div>
<script>
$(function() {
    $( "#fromDate" ).datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        minDate: new Date(2010, 2 - 1, 2),
        onSelect: function( selectedDate ) {
            $( "#toDate" ).datepicker( "option", "minDate", selectedDate );
        }
    });
    $( "#toDate" ).datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        minDate: new Date(2010, 2 - 1, 2),
        onSelect: function( selectedDate ) {
            $( "#fromDate" ).datepicker( "option", "maxDate", selectedDate );
        }
    });
});


function repfechas () {
    var primera = $('#fromDate').val();
    var segunda = $('#toDate').val();

    $.ajax({
        url : "?controller=utilidades&action=comprafecha&primera=" + primera + "&segunda=" + segunda,
        type: "GET",
        dataType: "JSON",
        success: function(datas)
        {
            console.log(datas);
            var table;
            table = $('#table').DataTable({
                "ajax": (data,callback, settings)=>{
                    callback(datas);
                }
            });
            function recargar(){
                table.ajax.reload(null,false); //reload datatable ajax
            }

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          swal('No hay registros dentro de estas fechas');
      }

  });
}



</script>
