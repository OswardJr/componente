function buscar_cliente_presu(){
  var rif=$('#rif-unic').val();
  $.ajax({
    url : "?controller=presupuestos&action=buscarCliente&rif=" + rif,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
      $('[name="rif-unic"]').val(data.rif);
      $('[name="id_cliente"]').val(data.id_cliente);
      $('[name="razon_social"]').val(data.razon_social);
      $('[name="telefono"]').val(data.telefono);
      $('[name="direccion"]').val(data.direccion);
                // habilita el poder agregar productos despues de añadir prov
      $('#codigo').removeAttr("disabled");
      $('#precio').removeAttr("disabled");
      $('#cantidad').removeAttr("disabled");
        if (data==1) {
            $('#rif-unic').focus();
            swal('Introduzca el Rif');
            $('#codigo').attr("disabled", "true");
        }else if (data == false) {
       // $('[name="rif-unic"]').parent().parent().addClass('has-error');
            swal('El cliente no está regitrado..');
            $('#codigo').attr("disabled", "true");
        };
   },
   error: function (jqXHR, textStatus, errorThrown)
   {
     console.log("error")
   }
 });
}

function buscar_producto_presu(){

  var codigo=$('#codigo').val();

  $.ajax({
    url : "?controller=presupuestos&action=buscarProducto&codigo=" + codigo,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
      $('[name="code-unic"]').val(data.codigo);
      $('[name="precio"]').val(data.precio);
      $('[name="descripcion"]').val(data.descripcion);
      $('[name="stock"]').val(data.stock);
      $('[name="stock_m"]').val(data.stock_minimo);
      if (data==1) {
        $('#codigo').focus();
        swal('Debes introducir el codigo');
      }else if (data == false) {
            // $('[name="codigo-entrada"]').parent().parent().addClass('has-error');
            swal('El producto no está registrado...');
          };
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
         console.log("error")
       }
     });
}

function guardar_presu(){
  var id_presu = $('#cod_factura').val();
  var id_cliente = $("#id_cliente").val();
  var codigo = $("#codigo").val();
  var fecha_vencimiento = $("#fecha_vencimiento").val();
  if(id_cliente===''){
    swal('Ingrese el cliente por favor');
  }else if(fecha_vencimiento===''){
      swal('Indique la fecha de caducidad');
    }else{
        $.ajax({
          url: '?controller=presupuestos&action=create',
          type: "POST",
          data: $('#form_presu').serialize(),
          dataType: "JSON",
          success: function(data)
          {
           //  window.open(`views/reportes/factura_presu.php?cod_presu=${id_presu}`, '_blank')

           // location.reload()
             window.open(`?controller=index&action=presupuesto&cod=${id_presu}`, '_self')


          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            swal('Error');

          }
        });
      }
}

function agregar_carrito_presu(){
//funcion agregar al carrito
var cantidad = $("#cantidad").val();
var codigo = $("#codigo").val();
var precio = $("#precio").val();
if(codigo!=''){
  if(cantidad!=''){
    $.ajax({
      url: '?controller=presupuestos&action=agregar',
      type: 'GET',
      data: {'codigo':codigo, 'cantidad':cantidad, 'precio':precio},
      dataType: 'json',
      success: function(data) {
        if(data.success==true){
          $("#codigo").val('');
          $("#descripcion").val('');
          $("#precio").val('');
          $("#cantidad").val('');
          $("#existencia").val('');
          $("#minimo").val('');
          $(".aux-produc").load('views/presupuestos/auxiliar.php');
        }else{
          swal(data.msj);
        }
      },
      error: function(jqXHR, textStatus, error) {
        swal(error.msj);
      }
    });
  }else{
    swal('Ingrese una cantidad');
    $('#cantidad').focus();
  }
}else{
  swal('Seleccione un producto');
  $('#codigo').focus();
}
}

function eliminar_carrito_presu(codigo){
  if (confirm("¿ Realmente desea eliminarlo de la lista?"))
 {
  $.ajax({
    url: '?controller=presupuestos&action=eliminar',
    type: 'post',
    data: {'codigo':codigo},
    dataType: 'json'
  }).done(function(data){
    if(data.success==true){
     $(".aux-produc").load('views/presupuestos/auxiliar.php');
   }else{
    swal(data.msj);
        }
      })
   }

}

function borrar_presupuesto(identificador){
    if (confirm("¿Desea eliminar el presupuesto..?"))
    {
       $.get('?controller=presupuestos&action=delete',{cod_presu:identificador},function(data){
           location.reload()

      });
   }
}

function ver_presupuesto(valor){
    save_method = 'update';
   // $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "?controller=presupuestos&action=buscarPresupuestoPorCod&cod_presu=" + valor,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_cliente"]').val(data.id_cliente);
            $('[name="fecha_actual"]').val(data.fecha_actual);
            $('[name="tot"]').val(data.tot);
            $('[name="id_emp"]').val(data.id_emp);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Presupuesto'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal('Error get data from ajax');
        }
    });
}
