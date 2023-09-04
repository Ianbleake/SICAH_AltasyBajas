<?php
  require_once __DIR__ . '/utils/functions.php';
  protect_route();
  $logout = true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SICAH | Menu Principal</title>
  <link rel="icon" href="img/logoSICAH.ico" type="image/x-icon">
  <link href="./css/bootstrap.min.css" rel="stylesheet" />
  <link href="./css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous" defer></script>
</head>
<body>
<?php include_once './partials/header_ipn.php'; ?>
<?php include_once './partials/header.php'; ?>

<?php
  $tipo_usuario='';
  $_SESSION['user']['TIPO_USUARIO'];
  $tipo_usuario=$_SESSION['user']['TIPO_USUARIO'];;
  if(!empty($tipo_usuario)){
    echo '<table border="0" width="100%">';
echo'</br>';
echo'</br>';
echo '<td align="center" colspan="4">';
    echo'<strong><h2>Seleccione una opción</h2></strong> ';
	echo'</td>';
    echo'</table>';
echo'</br>';
echo'</br>';?>
<div class="row justify-content-around align-items-start vh-50">
<div class="card" style="width: 18rem;" align="center">
  <img src="img/ConsultaCurp.jpg" class="card-img-top" style="width: 400; height: 250;"/>
  <div class="card-body">
    <h5 class="card-title">Consulta Datos Personales</h5>
    <p class="card-text">Consulta de datos personales del personal de la Esime Zacatenco a través del CURP.</p>
    <a href="/sicah-web/consulta_personal.php" class="btn btn-primary">Consulta</a>
  </div>
</div>
<div class="card" style="width: 18rem;" align="center">
<img src="img/ConsultaInegi.jpg" class="card-img-top" style="width: 500; height: 300;"/>
  <div class="card-body">
    <h5 class="card-title">Consulta INEGI</h5>
    <p class="card-text">Consulta de información estadística del personal de la Esime Zacatenco.</p>
    <a href="/sicah-web/inegi.php" class="btn btn-primary">Consulta</a>
</div>
</div>
</div>
<?php
     }else{include('login_fail.php');}
?>

<?php include_once './partials/footer_ipn.php'; ?>
</body>

</html>