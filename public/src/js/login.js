      $(function(){
        $('#login').click(function(e){
         e.preventDefault();
         login();
       });
        $('#recuperar').click(function(e){
            e.preventDefault();
         recuperar();
       });
      });

      function  login(){
       var username = $('[name=username]')[0].value;
       var password = $('[name=password]')[0].value;

       $.ajax({
        type: "POST",
        url: "?controller=login&action=login",
        data: {usuario:username, clave:password},
      }).done(function(response){
        // alert(response);
        if(response == 1){
          //location.reload();
          location.replace("?controller=index");
        }else{
          swal("Usuario o Password Incorrectos");
          // location.reload();
        }
      });
    };

function recuperar(){
    var valor =  $('[name="username"]').val();
    localStorage.setItem("username",valor)
   $.ajax({
        url : "?controller=login&action=getpregunta&username=" + valor,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            var template = `
            <center><label>Pregunta secreta: <i>${data}</i></label></center>
            <div style="margin-bottom: 25px" class="input-group asd">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="text" class="form-control" name="respuesta" placeholder="Respuesta secreta" required="true">
            </div>
            <div style="margin-top:10px" class="form-group">
                <div class="col-xs-2 col-xs-offset-3  controls">
                    <center><a id="enviar" href="#" class="btn btn-info">Enviar</a></center>
                </div>
                <div class="col-xs-4 col-xs-offset-1">
                    <a class="btn btn-sucedio" href="javascript:history.go()" title="VOLVER" >Volver</a>
                </div>
            </div>
            `;
            if (data != "") {
                $('.asd').remove();
                $('#form').html(template)
            }else{
                swal("El usuario no existe");
            }
            $('#enviar').click(function(e){
                e.preventDefault();
                enviar();
            });
        },
      error: function (jqXHR, textStatus, errorThrown)
      {
          console.log('Error get data from ajax');
      }
  });
}
function enviar(){
    var valor =  $('[name="respuesta"]').val();
   $.ajax({
        url : "?controller=login&action=checkrespuesta&respuesta=" + valor,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            var template = `
            <center><label>Nueva contraseña</label></center>
            <div style="margin-bottom: 25px" class="input-group asd">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" class="form-control" name="clave" placeholder="********" required="true">
            </div>
            <center><label>Repetir contraseña</label></center>
            <div style="margin-bottom: 25px" class="input-group asd">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" class="form-control" name="clave2" placeholder="*******" required="true">
            </div>
            <div style="margin-top:10px" class="form-group">
                <div class="col-xs-2 col-xs-offset-3  controls">
                    <center><a id="restablecer" href="#" class="btn btn-info">Enviar</a></center>
                </div>
                <div class="col-xs-4 col-xs-offset-1">
                    <a class="btn btn-sucedio" href="javascript:history.go()" title="VOLVER" >Volver</a>
                </div>
            </div>
            `;
            if (data === 1) {
                $('.asd').remove();
                $('#form').html(template)
            }else{
                swal("La respuesta es incorrecta");
            }
            $('#restablecer').click(function(e){
                e.preventDefault();
                restablecer();
            });
        },
      error: function (jqXHR, textStatus, errorThrown)
      {
          console.log('Error get data from ajax');
      }
  });
}


function restablecer(){
    var clave =  $('[name="clave"]').val();
    var clave2 =  $('[name="clave2"]').val();
    var username = localStorage.getItem("username");
    if (clave != clave2) {
        swal("las contraseñas no coinciden");
    }else if (clave === clave2) {
     $.ajax({
        url : "?controller=login&action=setpassword&clave=" + clave + "&username=" + username ,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            localStorage.clear()
            swal("Contraseña restablecida satisfactoriamente");
            setTimeout(()=>{
                window.location='?controller=login'
            },3000)
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          console.log('Error get data from ajax');
      }
  });
 }
}
