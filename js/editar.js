let usuario = localStorage.getItem('nombre_usuario');
    document.getElementById("usuario_text").innerHTML= usuario;
    function completar(valor){
      console.log(valor);
      var parametros = {
        "nombre" : valor
      };
      $.ajax({
        data:  parametros,
        url:   'php/ajax_nombre.php',
        type:  'post',
        beforeSend: function () {
          $("#rfc").html("Procesando, espere por favor...");
          },
          success:  function (response) {
            $("#rfc").val(response);
            console.log(response)
          }
      });
    }