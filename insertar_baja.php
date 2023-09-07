<?php

include('conexiontest.php');
$CURP = $_POST['curp'];
$TBaja = $_POST['tbaja'];
$FECHABAJA = $_POST['fechabaja'];
$MOTIVO = $_POST['MOTIV'];
$OBS = $_POST['OBSER'];

$inserta_datos="insert into Bajas(CURP,tipo_baja, fecha, motivo, observaciones) VALUES('$CURP','$TBaja','$FECHABAJA','$MOTIVO','$OBS')";
odbc_exec($link2,$inserta_datos);

header("Location: Bajas.php");
       exit();

?>