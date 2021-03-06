    (function () {
      $('#table').DataTable({
        'paging': true,
        'lengthChange':true,
        'searching':true,
        'ordering': true,
        'info': true,
        'autoWidth':true
    });
  });
    $('[placeholder]').focus(function() {
      var input = $(this);
      if (input.val() == input.attr('placeholder')) {
        input.val('');
        input.removeClass('placeholder');
    }
}).blur(function() {
  var input = $(this);
  if (input.val() == '' || input.val() == input.attr('placeholder')) {
    input.addClass('placeholder');
    input.val(input.attr('placeholder'));
}
}).blur();
function editar_categoria(valor){
   var save_method = 'update';
      //$('#form')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string

      //Ajax Load data from ajax
      $.ajax({
        url : "?controller=categorias&action=getCategoriaById&id_cat=" + valor,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $('[name="id_cat"]').val(data.id_cat);
          $('[name="nombre"]').val(data.nombre);
          $('[name="descripcion"]').val(data.descripcion);
          $('#modal_form1').modal('show'); // show bootstrap modal when complete loaded
          $('.modal-title').text('Editar categoria'); // Set title to Bootstrap modal title

      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          swal('Error get data from ajax');
      }
  });
  }
  function eliminarCategoria(identificador){
      if (confirm("¿ Realmente desea eliminar este registro ?"))
      {
        $.get('?controller=categorias&action=delete',{id_cat:identificador},function(data){
          recargar();

      });
    }
}


function guardar_categoria(){
  $.ajax({
    url : "?controller=categorias&action=update",
    type: "POST",
    data: $('#form').serialize(),
    dataType: "JSON",
    success: function(data)
    {
      swal('ha sido actualizado');
      $('#modal_form1').modal('hide');
      recargar();
  },
  error: function (jqXHR, textStatus, errorThrown)
  {
      swal('Error');

  }
});
}
