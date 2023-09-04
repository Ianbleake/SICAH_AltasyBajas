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

$NUMCONTRATO = $_POST['numContrato'];
$TURNO   = $_POST['turno'];
$FUNCION  = $_POST['funcion'];
$UBICACION  = $_POST['ubicacion'];
$MODALIDAD  = $_POST['modalidad'];
$CHECADOR  = $_POST['checador'];

echo" <BR>
Datos registrados por el usuario: <br>
$CONYUGUE
";

//$inserta_dato="insert into datos_personales VALUES ($RFC,$NOMBRE,$NUMEMP,$CURP,$SEXO,$DOMICILIO,$COLONIA,$DELEGACION,$ENTIDAD,$TELCASA,$TELOFI,$CIVIL,$CONYUGUE,$NPADRE,$NMADRE,$NACION,$LUGARNACE,$DISCAPACIDAD,$OBSER,$HOMOCLAVE,$LENNAT,$FECHANACI,$EDAD,$EMAIL)";

$inserta_rfc="insert into datos_personales(RFC) values ('$RFC')";
odbc_exec($link2,$inserta_rfc);

$inserta_NOMBRE="insert into datos_personales(NOMBRE) values ('$NOMBRE')";
odbc_exec($link2,$inserta_NOMBRE);

$inserta_FECHANACI="insert into datos_personales(FNACIMIENTO) values ('$FECHANACI')";
odbc_exec($link2,$inserta_FECHANACI);

$inserta_NUMEMP="insert into datos_personales(NUMEMP) values ('$NUMEMP')";
odbc_exec($link2,$inserta_NUMEMP);

$inserta_CURP="insert into datos_personales(CURP) values ('$CURP')";
odbc_exec($link2,$inserta_CURP);

$inserta_SEXO="insert into datos_personales(SEXO) values ('$SEXO')";
odbc_exec($link2,$inserta_SEXO);

$inserta_DOM="insert into datos_personales(DOMICILIO) values ('$DOMICILIO')";
odbc_exec($link2,$inserta_DOM);

$inserta_COL="insert into datos_personales(COLONIA) values ('$COLONIA')";
odbc_exec($link2,$inserta_COL);

$inserta_DEL="insert into datos_personales(DELEG) values ('$DELEGACION')";
odbc_exec($link2,$inserta_DEL);

$inserta_ENTIDAD="insert into datos_personales(ENTIDAD) values ('$ENTIDAD')";
odbc_exec($link2,$inserta_ENTIDAD);

$inserta_TELCASA="insert into datos_personales(TELCASA) values ('$TELCASA')";
odbc_exec($link2,$inserta_TELCASA);

$inserta_TELOFI="insert into datos_personales(TELOFI) values ('$TELOFI')";
odbc_exec($link2,$inserta_TELOFI);

$inserta_CIVIL="insert into datos_personales(CIVIL) values ('$CIVIL')";
odbc_exec($link2,$inserta_CIVIL);

$inserta_CONYUGUE="insert into datos_personales(CONYUGE) values ('$CONYUGUE')";
odbc_exec($link2,$inserta_CONYUGUE);

$inserta_NPADRE="insert into datos_personales(NPADRE) values ('$NPADRE')";
odbc_exec($link2,$inserta_NPADRE);

$inserta_NMADRE="insert into datos_personales(NMADRE) values ('$NMADRE')";
odbc_exec($link2,$inserta_NMADRE);

$inserta_NACION="insert into datos_personales(NACION) values ('$NACION')";
odbc_exec($link2,$inserta_NACION);

$inserta_DISCAPACIDAD="insert into datos_personales(TIRNE_DISCAPACIDAD) values ('$DISCAPACIDAD')";
odbc_exec($link2,$inserta_DISCAPACIDAD);

$inserta_LUGARNACE="insert into datos_personales(LUGAR_NACIMIENTO) values ('$LUGARNACE')";
odbc_exec($link2,$inserta_LUGARNACE);

$inserta_OBSERVACINES="insert into datos_personales(OBSERVACINES) values ('$OBSER')";
odbc_exec($link2,$inserta_OBSERVACINES);

$inserta_EDAD="insert into datos_personales(Edad) values ('$EDAD')";
odbc_exec($link2,$inserta_EDAD);

$inserta_HOMOCLAVE="insert into datos_personales(HOMOCLAVE) values ('$HOMOCLAVE')";
odbc_exec($link2,$inserta_HOMOCLAVE);

$inserta_LENNAT="insert into datos_personales(HABLANTE_LENGUA) values ('$LENNAT')";
odbc_exec($link2,$inserta_LENNAT);

$inserta_EMAIL="insert into datos_personales(EMAIL) values ('$EMAIL')";
odbc_exec($link2,$inserta_EMAIL);

$inserta_LENNAT="insert into datos_personales(HABLANTE_LENGUA) values ('$LENNAT')";
odbc_exec($link2,$inserta_LENNAT);


?>