function guardar_venta(){
  var id_venta = $('#cod_factura').val();
  var id_cliente = $("#id_cliente").val();
  var codigo = $("#codigo").val();
  if(id_cliente===''){
    swal('Debes introducir el cliente');
  }else{
        $.ajax({
          url: '?controller=ventas&action=create',
          type: "POST",
          data: $('#form_venta').serialize(),
          dataType: "JSON",
          success: function(data)
          {
           //  window.open(`views/reportes/factura_presu.php?cod_presu=${id_presu}`, '_blank')
           // location.reload()
             window.open(`?controller=index&action=venta&cod=${id_venta}`, '_self')
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            swal('Error');

          }
        });
      }
}

function buscar_cliente_venta(){
  var rif=$('#rif-entrada').val();
  $.ajax({
    url : "?controller=ventas&action=buscarCliente&rif=" + rif,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
      $('[name="rif-entrada"]').val(data.rif);
      $('[name="id_cliente"]').val(data.id_cliente);
      $('[name="razon_social"]').val(data.razon_social);
      $('[name="telefono"]').val(data.telefono);
      $('[name="direccion"]').val(data.direccion);
                // habilita el poder agregar productos despues de añadir prov
      $('#codigo').removeAttr("disabled");
      $('#precio').removeAttr("disabled");
      $('#cantidad').removeAttr("disabled");
        if (data==1) {
            $('#rif-entrada').focus();
            swal('Debes introducir el Rif');
            $('#codigo').attr("disabled", "true");
        }else if (data == false) {
       // $('[name="rif-entrada"]').parent().parent().addClass('has-error');
            swal('El cliente no existe');
            $('#codigo').attr("disabled", "true");
        };
   },
   error: function (jqXHR, textStatus, errorThrown)
   {
     console.log("error")
   }
 });
}

function buscar_producto_venta(){
  var codigo=$('#codigo').val();
  $.ajax({
    url : "?controller=ventas&action=buscarProducto&codigo=" + codigo,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
        if (data.stock<=100) {
            swal('El producto esta en stock minimo');
        }else{
            $('[name="codigo-entrada"]').val(data.codigo);
            $('[name="precio"]').val(data.precio);
            $('[name="descripcion"]').val(data.descripcion);
            $('[name="stock"]').val(data.stock);
            $('[name="stock_m"]').val(data.stock_minimo);
           // console.log(data.stock);
        }
        if (data==1) {
            $('#codigo').focus();
            swal('Debes introducir el codigo');
        }else if (data == false) {
            // $('[name="codigo-entrada"]').parent().parent().addClass('has-error');
            swal('El producto no existe');
        };

    },
    error: function (jqXHR, textStatus, errorThrown)
    {
     console.log("error")
 }
});
}

function agregar_carrito_venta(){
//funcion agregar al carrito
var cantidad = $("#cantidad").val();
var existencia = $("#existencia").val();
cantidad = parseInt(cantidad);
existencia = parseInt(existencia);
var codigo = $("#codigo").val();
var precio = $("#precio").val();
if (cantidad > existencia) {
  swal('No hay suficientes productos en stock')
}else{
    if(codigo!=''){
  if(cantidad!=''){
    $.ajax({
      url: '?controller=ventas&action=agregar',
      type: 'GET',
      data: {'codigo':codigo, 'cantidad':cantidad, 'precio':precio},
      dataType: 'json',
      success: function(data) {
        if(data.success==true){
          $("#codigo").val('');
          $("#descripcion").val('');
          $("#descripcion_p").val('');
          $("#precio").val('');
          $("#cantidad").val('');
          $("#existencia").val('');
          $("#stock").val('');
          $("#minimo").val('');
          $(".detail").load('views/ventas/detalleventa.php');
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




}

function eliminar_carrito_venta(codigo){
  if (confirm("¿Desea eliminarlo de la lista?"))
 {
  $.ajax({
    url: '?controller=ventas&action=quitar',
    type: 'post',
    data: {'codigo':codigo},
    dataType: 'json'
  }).done(function(data){
    if(data.success==true){
     $(".detail").load('views/ventas/detalleventa.php');
   }else{
    swal(data.msj);
  }
})
}

}

