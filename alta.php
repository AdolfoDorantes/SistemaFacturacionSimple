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
    <li><a class="active" href="alta.php">Alta de facturas</a></li>
    <li><a href="pdf.php">Generar PDF de una factura</a></li>
    <li><a href="#" onclick="salir();">Salir</a></li>
  </ul>

<div style="margin-left:25%;padding:1px 16px;height:100%;">
  <h4>Hola <label id="usuario_text"></label>, por favor rellene los campos solicitados para el registro.</h3><br><br>
  <form action="php/alta.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Cliente</label>
      <input list="nombre_usuarios" class="form-control" name="nombres_usuario" type="text" placeholder="Seleccione" onchange="completar(this.value);">
      <datalist id="nombre_usuarios">
          <?php
          include 'php/conexion.php';
          $query='SELECT * FROM clientes';
          $resultado=pg_query($dbconn, $query) or die('La consulta fallo: ' . pg_last_error());
          while($row=pg_fetch_array($resultado))
          {
            echo "<option value='".$row['cli_nombre']."'></option>";
          }
          ?>
      </datalist>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Folio</label>
      <?php
          include 'php/conexion.php';
          $query='SELECT * FROM facturas';
          $resultado=pg_query($dbconn, $query) or die('La consulta fallo: ' . pg_last_error());
          $row=pg_num_rows($resultado);
          $folio = $row + 1;
          {
            echo 
            '<input type="text" class="form-control" id="Folio" placeholder="Folio" name="Folio" value="'.$folio.'">';
          }
          ?>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">RFC</label>
      <input type="text" class="form-control" id="rfc" placeholder="RFC" name="rfc" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Fecha</label>
      <?php
        $hoy = $hoy = date("d/m/y"); ;  
        echo '<input type="text" class="form-control" id="Fecha" placeholder="Fecha" name="Fecha" value="'.$hoy.'">';
      ?>      
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Moneda</label>
    <input list="moneda" class="form-control" name="moneda" type="text" placeholder="Seleccione">
      <datalist id="moneda">
          <?php
          include 'php/conexion.php';
          $query='SELECT * FROM monedas';
          $resultado=pg_query($dbconn, $query) or die('La consulta fallo: ' . pg_last_error());
          while($row=pg_fetch_array($resultado))
          {
            echo "<option value='".$row['mon_nombre'].", ".$row['mon_rfc']."'></option>";
          }
          ?>
      </datalist>
  </div><br></br>
  <hr>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputState">Cantidad</label>
      <input type="text" class="form-control" id="Cantidad" placeholder="Cantidad" name="Cantidad">
    </div>
    <div class="form-group col-md-3">
      <label for="inputState">Concepto</label>
      <input type="text" class="form-control" id="Concepto" placeholder="Concepto" name="Concepto">
    </div>
    <div class="form-group col-md-3">
      <label for="inputState">P. Unitario</label>
      <input type="text" class="form-control" id="Unitario" placeholder="Precio Unitario" name="Unitario">
    </div>
    <div class="form-group col-md-3">
      <label for="inputState">Importe</label>
      <input type="text" class="form-control" id="Importe" placeholder="Importe" name="Importe">
    </div>
  </div>
  <div class="form-row" style="float:right; margin-bottom:5%; display: inline-block;width:35%">
      <input type="text" class="form-control" style="margin-bottom:2%" id="subTotal" placeholder="Sub Total" name="subTotal">
      <input type="text" class="form-control" style="margin-bottom:2%" id="IVA" placeholder="IVA" name="IVA">
      <input type="text" class="form-control" id="Total" placeholder="Total" name="Total">
  </div>
  <div class="form-row" style="margin-top:15%">
    <button type="submit" class="btn btn-primary">Realizar registro</button>
  </div>
</form>

</div>
</body>
<script src="js/editar.js"></script>
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
