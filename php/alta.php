<?php
include 'conexion.php';
$nombre		= $_POST['nombres_usuario'];
$Folio		= $_POST['Folio'];
$rfc		= $_POST['rfc'];
$Fecha		= $_POST['Fecha'];
$moneda		= $_POST['moneda'];
$Cantidad	= $_POST['Cantidad'];
$Concepto	= $_POST['Concepto'];
$Unitario	= $_POST['Unitario'];
$Importe	= $_POST['Importe'];
$subTotal	= $_POST['subTotal'];
$IVA		= $_POST['IVA'];
$Total		= $_POST['Total'];

$query1='SELECT fac_id FROM facturas ORDER BY fac_id DESC LIMIT 1';
$resultado=pg_query($dbconn, $query1);
$row=pg_fetch_array($resultado);

$nombre_moneda	= substr($moneda, 0, 3);
$query2="SELECT * FROM monedas WHERE mon_nombre LIKE '%".$nombre_moneda."%' ";
$resultado2=pg_query($dbconn, $query2);
$row2=pg_fetch_array($resultado2);

$nombre_cli	= substr($nombre, 0, 3);
$query3="SELECT * FROM clientes WHERE cli_nombre LIKE '%".$nombre."%' ";
$resultado3=pg_query($dbconn, $query3);
$row3=pg_fetch_array($resultado3);

$id= $row['fac_id'] + 1;

$querys="INSERT INTO facturas(fac_id, cli_id, mon_id, fac_fec, fac_suc, fac_iva, fac_tot, fac_tc) VALUES (".$id.", ".$row3['cli_id'].",".$row2['mon_id'].",'".$Fecha."','".$subTotal."','".$IVA."','".$Total."','".$moneda."')";
$querys1="INSERT INTO facturas_detalle(fac_id, fac_det_id, fac_det_can, fac_det_pun, fac_det_imp, fac_det_con) VALUES (".$id.", ".$id.",'".$Cantidad."','".$Unitario."','".$Importe."','".$Concepto."')";
if(pg_query($dbconn, $querys)){
	if(pg_query($dbconn, $querys1)){
		echo "<script>alert('Factura registrada correctamente.');window.location.href='../alta.php';</script>";
	} else{
	//echo "<script>alert('Registro fallido.');window.location.href='../alta.php';</script>";
	}
}
else{

}
?>