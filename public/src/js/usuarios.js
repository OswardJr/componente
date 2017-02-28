

function buscarUsuario(){
   var cedula=document.getElementById("cedula").value;
   $.get('?controller=usuarios&action=comprobar&cedula=',{cedula:cedula},function(data){
      $('.mensaje').html(data);
  });
}

function eliminarUsuario(identificador){
    if (confirm("¿ Realmente desea eliminar este registro ?"))
    {
       $.get('?controller=usuarios&action=delete',{cedula:identificador},function(data){
          recargar();

      });
   }
}

function ver_usuario(valor){
   // $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "?controller=usuarios&action=getUserByCedula&cedula=" + valor,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('#cedula1').val(data.ci_usuario);
            $('[name="nombre"]').val(data.primer_nombre);
            $('[name="apellido"]').val(data.primer_apellido);
            $('[name="username"]').val(data.username);
            $('[name="rol"]').val(data.rol);
            $('[name="pregunta"]').val(data.pregunta);
            $('[name="respuesta"]').val(data.respuesta);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Ver usuario'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal('Error get data from ajax');
        }
    });
}
function editar_usuario(valor){
    save_method = 'update';
    //$('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "?controller=usuarios&action=getUserByCedula&cedula=" + valor,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('#cedula2').val(data.ci_usuario);
            $('[name="nombre"]').val(data.primer_nombre);
            $('[name="apellido"]').val(data.primer_apellido);
            $('[name="username"]').val(data.username);
            $('#rol').val(data.rol);
            $('[name="pregunta"]').val(data.pregunta);
            $('[name="respuesta"]').val(data.respuesta);
            $('[name="id_emp"]').val(data.id_emp);
            $('#modal_form1').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Editar usuario'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal('Error get data from ajax');
        }
    });
}

function guardar_usuario(){
    $.ajax({
        url : "?controller=usuarios&action=update",
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
