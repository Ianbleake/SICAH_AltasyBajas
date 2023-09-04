<?php
  require_once __DIR__ . '/../utils/functions.php';
  protect_route();

  $tipo_usuario='';
	$_SESSION['user']['TIPO_USUARIO'];
  $tipo_usuario = $_SESSION['user']['TIPO_USUARIO'];
  $result = $_SESSION['result'];
  $_SESSION['resultpdf']=$_SESSION['result'];
  if (!$result) header('Location: /sicah-web/consulta_personal.php');
  $_SESSION['resultm']=$_SESSION['result'];
  $_SESSION['result'] = null;
  $volver = true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SICAH | CURP</title>
  <link rel="icon" href="logoSICAH.ico" type="image/x-icon">
  <link href="../css/bootstrap.min.css" rel="stylesheet" />
  <link href="../css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://kit.fontawesome.com/160d723f9c.js" crossorigin="anonymous"></script>
</head>

<body>
<?php include_once '../partials/header_ipn.php'; ?>
<?php include_once '../partials/header.php'; ?>

<section>
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="<?php echo get_image_dir($result['NUMEMP']); ?>" alt="avatar"
                 class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?php echo $result['NOMBRE']; ?></h5>
            <p class="text-muted mb-1"><strong>CURP:</strong> <?php echo $result['CURP'] ?></p>

            <?php if ($tipo_usuario == 1 || $tipo_usuario == 2 || $tipo_usuario == 3) : ?>
              <p class="text-muted mb-1"><strong>RFC:</strong> <?php echo $result['RFC']; ?></p>
            <?php endif; ?>

            <p class="text-muted mb-4"><strong>Número de empleado:</strong> <?php echo removeZero($result['NUMEMP']); ?>
            </p>
          </div>
          </div>
          </div>
      
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <?php if ($tipo_usuario == 1 || $tipo_usuario == 2 || $tipo_usuario == 3) : ?>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Dirección:</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo getAddress($result); ?></p>
                </div>
              </div>
              <hr>
            <?php endif; ?>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Sexo:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $result['C_SEXO']; ?></p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Teléfono celular:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo removeZero($result['TELCASA']); ?></p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Teléfono fijo:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $result['TELOFI']; ?></p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Correo Electrónico:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $result['EMAIL']; ?></p>
              </div>
            </div>
            <hr>

            <?php if ($tipo_usuario == 1 || $tipo_usuario == 2 || $tipo_usuario == 3) : ?>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Estado civil:</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $result['ESTADO']; ?></p>
                </div>
              </div>
              <hr>
            <?php endif; ?>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nombre del conyuge:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $result['CONYUGE']; ?></p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nombre del padre:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $result['NPADRE']; ?></p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nombre de la madre:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $result['NMADRE']; ?></p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nacionalidad:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo ($result['NACIONALIDAD']); ?></p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Lugar de Nacimiento:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $result['LUGAR']; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
if ($tipo_usuario == 1 || $tipo_usuario == 2 || $tipo_usuario == 3) {
?>
<div class="text-center">
	<a href="fpdf/PDF1.php" target="_blank" class="btn btn-outline-primary mt-3">Generar Reporte <i class="fas fa-file-pdf"></i>
			</a>
</div>
<div class="text-center mb-5">
	<a href="modifica.php"  class="btn btn-outline-primary mt-3">Modificar Registro
			</a>
</div>
<?php
}else if($tipo_usuario == 4 ){
	?>
<div class="text-center">
	<a href="fpdf/PDF2.php" target="_blank" class="btn btn-outline-primary mt-3">Generar Reporte <i class="fas fa-file-pdf"></i>
			</a>
</div>
<?php
}?>
<?php
        if ($tipo_usuario == 1 || $tipo_usuario == 2 || $tipo_usuario == 3){	
        ?>
        <div class="text-center">
          <form action="plazas.php" method="post">
            <input type="hidden" id="name" name="name" value="<?php echo $result['NOMBRE']?>">
            <input type="hidden" id="curp" name="curp" value="<?php echo $result['CURP']?>">
            <button type="submit" class="btn btn-outline-primary mt-3">Consultar historial de plazas</button>
          </form>
        </div>        
        <?php
        }?>

<br>
<?php include_once '../partials/footer_ipn.php'; ?>
</body>
</html>