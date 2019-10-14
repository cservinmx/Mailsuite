<?php
  /*
    Carlos Servín
    Conexión de test api afterlogic
  */

?>


<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
  <form method="post">
    <input type="text" id="user" name="user">
    <input type="password" id="ultrapas" name="ultrapas">
    <button id="form"  type="submit"  >Enviar </button>
  </form>
</body>
</html>

<script>
$(document).ready(function(){
  $("#form").click(function(){
    var user = $("#user").val();
    var ultrapas = $("#ultrapas").val();
    if(user!='' || ultrapas!=''){
      $.ajax({
          url: 'index.php/?/Api/',
          type: 'POST',
          async: true,
          dataType: 'json',
          data: {
              Module: 'Core',
              Method: 'Login',
              Parameters: '{"Login":'+user+',"Password":'+ultrapas+'}'
          },
          success: function (oResponse) {
              if (oResponse && oResponse.Result ){
                var sAuthToken = oResponse.Result.AuthToken;
                  console.log('sAuthToken', sAuthToken);
              }
          }
      });
    }
  });
});
</script>
