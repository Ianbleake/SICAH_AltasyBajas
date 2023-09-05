<?php

include('conexiontest.php');

$CURP = $_POST['CURPP'];
$SUB = $_POST['SUB'];
$CLAV = $_POST['CLAV'];
$NP = $_POST['NP'];
$CLAVE = $_POST['CLAVE'];
$MOV = $_POST['MOV'];
$FIN = $_POST['FIN'];
$FTE = $_POST['FTE'];
$FAC = $_POST['FAC'];
$HIS = $_POST['HIS'];
$TP = $_POST['TP'];
$PAS = $_POST['PAS'];
$NIVEL = $_POST['NIVEL'];
$DICTAMEN = $_POST['DICTAMEN'];

$inserta_dato="insert into plazas(CURP,SUB,CLAV,NP,CLAVE,MOV,FIN,FTE,FAC,HIS,TP,PAS,NIVEL,ID_DICTAMEN) VALUES('$CURP','$SUB','$CLAV','$NP','$CLAVE','$MOV','$FIN','$FTE','$FAC','$HIS','$TP','$PAS','$NIVEL','$DICTAMEN')";
odbc_exec($link2,$inserta_dato);

header("Location: alta.php");
       exit();

?>