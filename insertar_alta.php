<?php

include('conexiontest.php');

$RFC = $_POST['rfc'];
$NOMBRES = $_POST['nombre'];
$APELLIDOPAT = $_POST['apellidopaterno'];
$APELLIDOMAT = $_POST['apellidomaterno'];
$NOMBRE=$NOMBRES." ".$APELLIDOPAT." ".$APELLIDOMAT;
$FECHANACI = $_POST['fechaNa'];
$NUMEMP  = $_POST['numEmpleado'];
$CURP = $_POST['curp'];
$SEXO = $_POST['sexo'];
$DOMICILIO = $_POST['calle'];
$COLONIA = $_POST['colonia'];
$DELEGACION = $_POST['alcal'];
$ENTIDAD = $_POST['estado']; //cambiar por un select
$TELCASA = $_POST['telca'];
$TELOFI = $_POST['telOf'];
$CIVIL = $_POST['estadocivil'];
$CONYUGUE = $_POST['nombreCon'];
$NPADRE = $_POST['nombrePadre'];
$NMADRE = $_POST['nombreMadre'];
$NACION = $_POST['naccionalidad'];
$DISCAPACIDAD = $_POST['discapacidad'];
$LUGARNACE = $_POST['lugarNa'];
$OBSER = $_POST['OBSER'];
$HOMOCLAVE = $_POST['homoClave'];
$LENNAT = $_POST['hablanteLengua'];
$EDAD = $_POST['edad'];
$EMAIL = $_POST['correo'];
$NUMINTER = $_POST['numint'];

//Datos Laborales
$NUMCONTRATO = $_POST['numContrato'];
$TURNO   = $_POST['turno'];
$ADS= $_POST['ads'];
$FUNCION  = $_POST['funcion'];
$UBICACION  = $_POST['ubicacion'];
$TIPO = $_POST['tipo'];
$CHECADOR  = $_POST['checador'];
$AREACHECA = $_POST['acheca'];
$MODALIDAD  = $_POST['modalidad'];
$IDFUN = $_POST['idfun'];

//echo" Datos que no llegan: $AREACHECA $ADS $TIPO $IDFUN";

$inserta_dato="insert into datos_personales(RFC,NOMBRE,FNACIMIENTO,NUMEMP,CURP,SEXO,DOMICILIO,COLONIA,DELEG,ENTIDAD,TELCASA,TELOFI,CIVIL,CONYUGE,NPADRE,NMADRE,NACION,TIRNE_DISCAPACIDAD,LUGAR_NACIMIENTO,OBSERVACINES,Edad,HOMOCLAVE,HABLANTE_LENGUA,EMAIL,NUM_DE_INTERNO) VALUES('$RFC','$NOMBRE','$FECHANACI','$NUMEMP','$CURP','$SEXO','$DOMICILIO','$COLONIA','$DELEGACION','$ENTIDAD','$TELCASA','$TELOFI','$CIVIL','$CONYUGUE','$NPADRE','$NMADRE','$NACION','$DISCAPACIDAD','$LUGARNACE','$OBSER','$EDAD','$HOMOCLAVE','$LENNAT','$EMAIL','$NUMINTER')";
odbc_exec($link2,$inserta_dato);

$inserta_lab="insert into datos_laborales(CURP,NUMCON,TURNO,ADS,UBICACION,TIPO,CHECA,AREA_DE_CHECADO,MODALIDAD,ID_FUNCION,FUNCION) VALUES('$CURP','$NUMCONTRATO','$TURNO','$ADS','$UBICACION','$TIPO','$CHECADOR','$AREACHECA','$MODALIDAD','$IDFUN','$FUNCION')";
odbc_exec($link2,$inserta_lab); 

header("Location: alta.php");
       exit();

?>