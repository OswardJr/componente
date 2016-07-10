      $(function(){
        $('#login').click(function(e){
         e.preventDefault();
         login();
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
          alert("Usuario o Password Incorrectos");
          location.reload();
        }
      });
    };
