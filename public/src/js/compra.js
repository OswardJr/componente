function guardar_compra(){
  var id_compra = $('#cod_factura').val();
  var id_prov = $("#id_prov").val();
  var codigo = $("#codigo").val();
  var forma_pago = $("#forma_pago").val();
  if(id_prov===''){
    swal('Debes introducir el proveedor');
  }else if(forma_pago===''){
      swal('Debes elegir la forma de pago');
    }else{
        $.ajax({
          url: '?controller=compras&action=create',
          type: "POST",
          data: $('#form_compra').serialize(),
          dataType: "JSON",
          success: function(data)
          {
             // window.open(`views/reportes/factura_compra.php?cod_compra=${id_compra}`, '_blank')
             window.open(`?controller=index&action=prueba&cod=${id_compra}`, '_self')

            // location.reload()

          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            swal("Error del servidor")
          }
        });
      }
}


function buscar_proveedor(){
  var rif=$('#rif-entrada').val();
  $.ajax({
    url : "?controller=compras&action=buscarProveedor&rif=" + rif,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
      $('[name="rif-entrada"]').val(data.rif);
      $('[name="id_prov"]').val(data.id_prov);
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
            swal('El proveedor no existe');
            $('#codigo').attr("disabled", "true");
        };
   },
   error: function (jqXHR, textStatus, errorThrown)
   {
     console.log("error")
   }
 });
}
function buscar_producto_compra(){
  var codigo=$('#codigo').val();
  $.ajax({
    url : "?controller=compras&action=buscarProducto&codigo=" + codigo,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
      $('[name="codigo-entrada"]').val(data.codigo);
      $('[name="precio"]').val(data.precio);
      $('[name="descripcion"]').val(data.descripcion);
      $('[name="stock"]').val(data.stock);
      $('[name="stock_m"]').val(data.stock_minimo);
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

function agregar_carrito_compra(){
//funcion agregar al carrito
var cantidad = $("#cantidad").val();
var codigo = $("#codigo").val();
var precio = $("#precio").val();
if(codigo!=''){
  if(cantidad!=''){
    $.ajax({
      url: '?controller=compras&action=agregar',
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
          $(".detalle-producto").load('views/compras/detalle.php');
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

//funcion eliminar
function eliminar_carrito_compra(codigo){
  if (confirm("¿ Realmente desea eliminarlo de la lista?"))
 {
  $.ajax({
    url: '?controller=compras&action=eliminar',
    type: 'post',
    data: {'codigo':codigo},
    dataType: 'json'
  }).done(function(data){
    if(data.success==true){
     $(".detalle-producto").load('views/compras/detalle.php');
   }else{
    swal(data.msj);
  }
})
}

}
