<?php
include 'conexion.php';
$cadena		= $_POST['nombre'];


$query2="SELECT * FROM clientes WHERE cli_nombre LIKE '%".$cadena."%'";
$resultado2=pg_query($dbconn, $query2);
$row2=pg_fetch_array($resultado2);
echo $row2['cli_rfc']
//echo $nombre;
?>