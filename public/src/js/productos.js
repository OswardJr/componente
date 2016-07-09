// crea un producto desde el modal de compras
function crear_producto(){
  var codigo
  //remove errors
  $('.form-group').removeClass('has-error');
  //validating form modals
    if ($("#codigo_p").val() === "") {
      $('[name="codigo"]').parent().addClass('has-error');
    }else if ($("#descripcion_p").val() === "") {
        $('[name="descripcion"]').parent().addClass('has-error');
      }else if ($("#modelo_p").val() === "") {
          $('[name="modelo"]').parent().addClass('has-error');
        }else if ($("#p_compra").val() === "") {
            $('[name="p_compra"]').parent().addClass('has-error');
          }else if ($("#p_venta").val() === "") {
              $('[name="p_venta"]').parent().addClass('has-error');
            }else if ($("#stock").val() === "") {
                $('[name="stock"]').parent().addClass('has-error');
              }else if ($("#stock_min").val() === "") {
                  $('[name="stock_min"]').parent().addClass('has-error');
                }else if ($("#procedencia").val() === "") {
                    $('[name="procedencia"]').parent().addClass('has-error');
                  }else if ($("#categoria").val() === "") {
                      $('[name="categoria"]').parent().addClass('has-error');
                    }else{
                      //post ajax form serialize
                      $.ajax({
                        url : "?controller=productos&action=createforjson",
                        type: "POST",
                        data: $('#form2').serialize(),
                        dataType: "JSON",
                            success: function(data)
                            {
                              alert(data.msj);
                              $('#modal-prod').modal('hide');
                              $('.form-group').removeClass('has-error'); // clear error class
                              $('.help-block').empty()
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                              alert(error);
                              $('#modal-prod').modal('hide');
                              $('.form-group').removeClass('has-error'); // clear error class
                              $('.help-block').empty(); // clear error string
                            }
                      });
                    }

}//end function

