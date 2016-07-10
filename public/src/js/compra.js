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
function buscar_producto(){
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

function agregar_carrito(){
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
function eliminar_carrito(codigo){
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
