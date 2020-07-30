<?php
include 'conexion.php';
$cadena		= $_POST['nombre'];
$query1="SELECT * FROM facturas WHERE fac_id=".$cadena."";
$resultado=pg_query($dbconn, $query1);
$row=pg_fetch_array($resultado);
echo $row['fac_fec']
//echo $nombre;
?>