<?php
include 'conexion.php';
$cadena		= $_POST['nombre'];
$query1="SELECT * FROM facturas WHERE fac_id=".$cadena."";
$resultado=pg_query($dbconn, $query1);
$row=pg_fetch_array($resultado);
$id=$row['cli_id'];

$query2="SELECT * FROM clientes WHERE cli_id=".$id."";
$resultado2=pg_query($dbconn, $query2);
$row2=pg_fetch_array($resultado2);
echo $row2['cli_nombre']
//echo $nombre;
?>