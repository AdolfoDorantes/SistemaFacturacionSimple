<head>
<meta charset='UTF-8'>
<link rel="stylesheet" type="text/css" href="css/inicio.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Yantramanav' rel='stylesheet'>
<title>Registro de personas</title>
</head>
<body>

<ul>
    <li><a href="inicio.html">Inicio</a></li>
    <li><a class="active" href="listado.php">Listado de facturas</a></li>
    <li><a href="alta.php">Alta de facturas</a></li>
    <li><a href="pdf.php">Generar PDF de una factura</a></li>
    <li><a href="#" onclick="salir();">Salir</a></li>
  </ul>

<div style="margin-left:25%;padding:1px 16px;height:100%;">
    <div class="container">
      <h3>Hola <label id="usuario_text"></label>, aquí podra ver el listado de todas las facturas.</h3>          
      <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th>Folio</th>
            <th>Fecha</th>
            <th>Moneda</th>
            <th>Cliente</th>
            <th>Total</th>
            <th>Total MXN</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include 'php/conexion.php';
            $estatus="";
            $query='SELECT f.fac_id, f.cli_id, f.mon_id, f.fac_fec, f.fac_suc, f.fac_iva, f.fac_tot, f.fac_tc,
                    b.fac_det_id, b.fac_det_can, b.fac_det_pun, b.fac_det_imp, b.fac_det_con
                    FROM facturas f, facturas_detalle b
                    WHERE f.fac_id=b.fac_id';
            $resultado=pg_query($dbconn, $query);
            while($row=pg_fetch_array($resultado))
            {
              if($row["mon_id"]==1)
              {
                $moneda='MXN';
              }
              if($row["mon_id"]==2)
              {
                $moneda='USD';
              }
              echo '<tr>
                      <td>'.$row["fac_id"].'</td>
                      <td>'.$row["fac_fec"].'</td>
                      <td>'.$moneda.'</td>
                      <td>'.$row["cli_id"].'</td>
                      <td>'.$row["fac_suc"].'</td>
                      <td>'.$row["fac_tot"].'</td>
                    </tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
</div>
</body>
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