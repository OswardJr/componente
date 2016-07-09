
function buscarCliente(){
 var rif=$("#rif").val();
 $.ajax({
  url: '?controller=clientes&action=getClienteByRif',
  type: 'GET',
  data: {'rif':rif},
  dataType: 'json',
  success: function(data) {
    alert(data.msj)
  },
});
}

function eliminarCliente(identificador){
  if (confirm("¿ Realmente desea eliminar este registro ?"))
  {
   $.get('?controller=clientes&action=delete',{id_cliente:identificador},function(data){
    recargar();

  });
 }
}

function ver_cliente(valor){
  save_method = 'update';
   // $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
      url : "?controller=clientes&action=searchClienteByid&id_cliente=" + valor,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {

        $('[name="rif"]').val(data.rif);
        $('[name="razon_social"]').val(data.razon_social);
        $('[name="telefono"]').val(data.telefono);
        $('[name="email"]').val(data.email);
        $('[name="direccion"]').val(data.direccion);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Ver cliente'); // Set title to Bootstrap modal title

          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get data from ajax');
          }
        });
  }
  function editar_cliente(valor){
    save_method = 'update';
    //$('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
      url : "?controller=clientes&action=searchClienteByid&id_cliente=" + valor,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {

        $('[name="rif"]').val(data.rif);
        $('[name="razon_social"]').val(data.razon_social);
        $('[name="telefono"]').val(data.telefono);
        $('[name="email"]').val(data.email);
        $('[name="direccion"]').val(data.direccion);
        $('[name="id_cliente"]').val(data.id_cliente);
            $('#modal_form1').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Editar cliente'); // Set title to Bootstrap modal title

          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get data from ajax');
          }
        });
  }

  function guardar_cliente(){
    $.ajax({
      url : "?controller=clientes&action=update",
      type: "POST",
      data: $('#form').serialize(),
      dataType: "JSON",
      success: function(data)
      {
        alert('ha sido actualizado');
        $('#modal_form1').modal('hide');
        recargar();
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error');

      }
    });
  }
