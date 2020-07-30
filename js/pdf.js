let usuario = localStorage.getItem('nombre_usuario');
    document.getElementById("usuario_text").innerHTML= usuario;
    function pdf(valor){
      console.log(valor);
      var parametros = {
        "nombre" : valor
      };
      $.ajax({
        data:  parametros,
        url:   'php/ajax_pdf.php',
        type:  'post',
        beforeSend: function () {
          $("#Cliente").html("Procesando, espere por favor...");
          },
          success:  function (response) {
            $("#Cliente").val(response);
            console.log(response)
          }
      });
      $.ajax({
        data:  parametros,
        url:   'php/ajax_fecha.php',
        type:  'post',
        beforeSend: function () {
          $("#Fecha").html("Procesando, espere por favor...");
          },
          success:  function (response) {
            $("#Fecha").val(response);
          }
      });
      $.ajax({
        data:  parametros,
        url:   'php/ajax_moneda.php',
        type:  'post',
        beforeSend: function () {
          $("#Moneda").html("Procesando, espere por favor...");
          },
          success:  function (response) {
            $("#Moneda").val(response);
          }
      });
      $.ajax({
        data:  parametros,
        url:   'php/ajax_total.php',
        type:  'post',
        beforeSend: function () {
          $("#Total").html("Procesando, espere por favor...");
          },
          success:  function (response) {
            $("#Total").val(response);
          }
      });
    }