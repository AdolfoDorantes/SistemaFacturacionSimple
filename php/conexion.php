<?php


$dbconn = pg_connect("host=localhost dbname=dbprueba1 user=postgres password=root")
    or die('No se ha podido conectar: ' . pg_last_error());
?>