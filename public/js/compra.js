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
          $('[name="rif-entrada"]').parent().parent().removeClass('has-error'); 
          $('#mensaje').text(''); 
                // habilita el poder agregar productos despues de añadir prov
                $('#codigo').removeAttr("disabled");
                $('#precio').removeAttr("disabled");
                $('#cantidad').removeAttr("disabled");
                if (data==1) {
                  $('[name="rif-entrada"]').parent().parent().addClass('has-error'); 
                  alert('Debes introducir el Rif'); 
                  $('#codigo').attr("disabled", "true");
                }else if (data == false) {
                  // $('[name="rif-entrada"]').parent().parent().addClass('has-error'); 
                  alert('El proveedor no existe'); 
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
          $('[name="codigo-entrada"]').parent().parent().removeClass('has-error'); 
          $('#mensaje1').text(''); 
          if (data==1) {
            $('[name="codigo-entrada"]').parent().parent().addClass('has-error'); 
            alert('Debes introducir el codigo'); 
          }else if (data == false) {
            // $('[name="codigo-entrada"]').parent().parent().addClass('has-error'); 
            alert('El producto no existe'); 
          };
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
         console.log("error")
       }
     });
    }


    function guardar_compra(){
     $.ajax({
       type: "POST",
       url: "?controller=compras&action=create",
       data: "+cod=" + $("#cod").val(),/* +"&cant=" + $("#cant").val(), /*+ "&id_prov=" + $("#id_prov").val()  + "&id_emp=" + $("#id_emp").val() + "&fecha=" + $("#fecha").val() +  "&forma_pago=" + $("#forma_pago").val() + "&iva=" + $("#iva").val() + "&subtotal=" + $("#subtotal").val() + "&total=" + $("#total").val() + "&codigo=" + $("#codigo").val() +  "&cantidad=" + $("#cantidad").val(),*/
       success: function(data) {
        console.log(data)
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
       console.log(data)
     }
    });
    }

    function aagregar_carrito(){

      $.ajax({
        type: "POST",
        url: "?controller=compras&action=create",
        data: "+token=" + $("#token").val() +"&cod_factura=" + $("#cod_factura").val() + "&id_prov=" + $("#id_prov").val()  + "&id_emp=" + $("#id_emp").val() + "&fecha=" + $("#fecha").val() +  "&forma_pago=" + $("#forma_pago").val() + "&iva=" + $("#iva").val() + "&subtotal=" + $("#subtotal").val() + "&total=" + $("#total").val() + "&codigo=" + $("#codigo").val() +  "&cantidad=" + $("#cantidad").val(),
        success: function(data) {
          console.log(data)
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          console.log(data)
        }
      });
    }

function agregar_carrito(){
//funcion agregar al carrito
var cantidad = $("#cantidad").val();
var codigo = $("#codigo").val();
if(codigo!=0){
  if(cantidad!=''){
    $.ajax({
      url: '?controller=compras&action=agregar',
      type: 'GET',
      data: {'codigo':codigo, 'cantidad':cantidad},
      dataType: 'json',
      success: function(data) {
        if(data.success==true){
          $("#codigo").val('');
          $("#descripcion").val('');
          $("#precio").val('');
          $("#cantidad").val('');
          $("#existencia").val('');
          $("#minimo").val('');
          $(".detalle-producto").load('views/compras/detalle.php');
        }else{
          alert(data.msj);
        }
      },
      error: function(jqXHR, textStatus, error) {
        alert(error);
      }
    });
  }else{
    alert('Ingrese una cantidad');
  }
}else{
  alert('Seleccione un producto');
}
}

//funcion eliminar
function eliminar_carrito(codigo){
  $.ajax({
    url: '?controller=compras&action=eliminar',
    type: 'post',
    data: {'codigo':codigo},
    dataType: 'json'    }).done(function(data){
      if(data.success==true){
        alert(data.msj);
        $(".detalle-producto").load('views/compras/detalle.php');
      }else{
        alert(data.msj);
      }
    })
  }