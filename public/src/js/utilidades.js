
$(document).ready(function() {
    var data= "";
    $.ajax({
      url : "?controller=utilidades&action=getIva",
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $('[name="impuesto"]').val(data);
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        console.log('Error get data from ajax');
      }
    });
    $.ajax({
      url : "?controller=utilidades&action=getBancos",
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        jQuery.each( data, function( i, val ) {
         $(".contenido ul").append('<li class="list-group-item"><h5>'+val+'</h5></li>');
        });
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        console.log('Error get data from ajax');
      }
    });
});

  function guardar_iva(){
    $.ajax({
      url : "?controller=utilidades&action=setIva",
      type: "POST",
      data: $('#form-iva').serialize(),
      dataType: "JSON",
      success: function(data)
      {
        $('#iva').modal('hide');
        swal('Ha sido actualizado');
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        swal('Error');
      }
    });
  }
 function guardar_banco(){
    $.ajax({
      url : "?controller=utilidades&action=setBanco",
      type: "POST",
      data: $('#form-banco').serialize(),
      dataType: "JSON",
      success: function(data)
      {
        $('#banco').modal('hide');
        swal('Ha sido actualizado');
        reload();
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        swal('Error');
      }
    });
  }

function reload(){
    $.ajax({
      url : "?controller=utilidades&action=getBancos",
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $( ".contenido li" ).remove();
        jQuery.each( data, function( i, val ) {
         $(".contenido ul").append('<li class="list-group-item"><h5>'+val+'</h5></li>');
        });
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        console.log('Error get data from ajax');
      }
    });
}
