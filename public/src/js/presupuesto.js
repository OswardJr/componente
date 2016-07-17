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
