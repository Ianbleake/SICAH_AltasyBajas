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
$OBSER = $_POST[''];
$HOMOCLAVE = $_POST['homoClave'];
$LENNAT = $_POST['hablanteLengua'];
$EDAD = $_POST['edad'];
$EMAIL = $_POST['correo'];

$NUMCONTRATO = $_POST['numContrato'];
$TURNO   = $_POST['turno'];
$FUNCION  = $_POST['funcion'];
$UBICACION  = $_POST['ubicacion'];
$MODALIDAD  = $_POST['modalidad'];
$CHECADOR  = $_POST['checador'];

$inserta_dato="INSERT [dbo].[datos_personales] ([RFC], [NOMBRE], [NUMEMP], [CURP], [SEXO], [DOMICILIO], [COLONIA], [DELEG], [ENTIDAD], [TELCASA], [TELOFI], [CIVIL], [CONYUGE], [NPADRE], [NMADRE], [NACION], [LUGAR_NACIMIENTO], [TIRNE_DISCAPACIDAD], [OBSERVACINES], [NUM_DE_INTERNO], [HOMOCLAVE], [FOTO], [HABLANTE_LENGUA], [FNACIMIENTO], [Edad], [EMAIL]) VALUES ($RFC,$NOMBRE,$NUMEMP,$CURP,$SEXO,$DOMICILIO,$COLONIA,$DELEGACION,$ENTIDAD,$TELCASA,$TELOFI,$CIVIL,$CONYUGUE,$NPADRE,$NMADRE,$NACION,$LUGARNACE,$DISCAPACIDAD,$OBSER,$HOMOCLAVE,$LENNAT,$FECHANACI,$EDAD,$EMAIL)";
//
odbc_exec($link2,$inserta_dato);

?>