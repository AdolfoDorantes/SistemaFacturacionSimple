<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8'>
<link rel="stylesheet" type="text/css" href="css/inicio.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Yantramanav' rel='stylesheet'>
<title>Registro de personas</title>
</head>
<body>

  <ul>
    <li><a href="inicio.html">Inicio</a></li>
    <li><a href="listado.php">Listado de facturas</a></li>
    <li><a href="alta.php">Alta de facturas</a></li>
    <li><a class="active" href="pdf.php">Generar PDF de una factura</a></li>
    <li><a href="#" onclick="salir();">Salir</a></li>
  </ul>

<div style="margin-left:25%;padding:1px 16px;height:100%;">
  <h4>Hola <label id="usuario_text"></label>, por favor seleccione el folio de la factura.</h3><br><br>
  <form action="generarPdf.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Folio</label>
      <input list="nombre_usuarios" class="form-control" name="nombres_usuario" type="text" placeholder="Seleccione" onchange="pdf(this.value);">
      <datalist id="nombre_usuarios">
          <?php
          include 'php/conexion.php';
          $query='SELECT * FROM facturas';
          $resultado=pg_query($dbconn, $query) or die('La consulta fallo: ' . pg_last_error());
          while($row=pg_fetch_array($resultado))
          {
            echo "<option value='".$row['fac_id']."'></option>";
          }
          ?>
      </datalist>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Cliente</label>
      <input type="text" class="form-control" id="Cliente" placeholder="Cliente" name="Cliente" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Fecha</label>
      <input type="text" class="form-control" id="Fecha" placeholder="Fecha" name="Fecha" >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Moneda</label>
      <input type="text" class="form-control" id="Moneda" placeholder="Moneda" name="Moneda" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Total</label>
      <input type="text" class="form-control" id="Total" placeholder="Total" name="Total" >
    </div>
  </div>
  <hr>
  <div class="form-row" style="margin-top:15%">
    <button type="submit" class="btn btn-primary">Generar PDF</button>
  </div>
</form>

</div>
</body>
<script src="js/pdf.js"></script>
<script>
    let usuario = localStorage.getItem('nombre_usuario');
    console.log(usuario);
    document.getElementById("usuario_text").innerHTML= usuario;
    function salir(){
      localStorage.clear();
      window.location="index.html";
    }
</script>
</html>
