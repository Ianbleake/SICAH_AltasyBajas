<?php
  

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'conexion.php';

    $curp = $_POST['curp'] ?? '';
    $name = $_POST['name'] ?? '';
    $connection = Conectarse();

    if (!empty($curp)) {
      $query="SELECT * FROM datos_personales AS dp 
      LEFT JOIN estado_civil AS ec 
      ON dp.CIVIL = ec.ID_ESTADO
      LEFT JOIN NACIONALIDAD AS nac 
      ON dp.NACION = nac.ID_NACIONALIDAD
      LEFT JOIN lugar_nacimiento AS ln
      ON dp.LUGAR_NACIMIENTO = ln.ID_LUGAR
      LEFT JOIN Sexo AS sexo
		   ON dp.SEXO = sexo.ID_SEXO
      WHERE CURP='$curp'";
    } else if (!empty($name)) {
      $query = "SELECT * FROM datos_personales AS dp 
      LEFT JOIN estado_civil AS ec 
      ON dp.CIVIL = ec.ID_ESTADO
      LEFT JOIN NACIONALIDAD AS nac 
      ON dp.NACION = nac.ID_NACIONALIDAD
      LEFT JOIN lugar_nacimiento AS ln
      ON dp.LUGAR_NACIMIENTO = ln.ID_LUGAR
      LEFT JOIN Sexo AS sexo
		  ON dp.SEXO = sexo.ID_SEXO
      WHERE NOMBRE='{$name}';";
    }

    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) === 0) {
      $alert = true;
    } else {
      $_SESSION['result'] = $result[0];
      $_SESSION['resultpdf']=$result[0];
      header('Location: /sicah-web/consultas/personal.php');
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SICAH consultas</title>
  <link rel="icon" href="img/logoSICAH.ico" type="image/x-icon">
  <link href="./css/bootstrap.min.css" rel="stylesheet" />
  <link href="./css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"
          defer></script>
  <script defer src="./js/autocomplete.js"></script>
</head>

<body>
<?php include_once './partials/header_ipn.php'; ?>
<?php include_once './partials/header.php'; ?>

<div class="container vh-50">
  <div class="row mt-5 d-flex justify-content-center align-items-center">
    <div class="col-md-3">
      <form class="form d-flex flex-column" method="POST">
        <input type="text"
               class="form-control form-input"
               id="curp"
               list="curp-list"
               name="curp"
               placeholder="Introduce el CURP"
               minlength="18"
               maxlength="18"
               required
               title="Ingrese un formato valido"
               autocomplete="off"
        />
        <i class="fa fa-search"></i>

        <datalist id="curp-list"></datalist>

        <input class="btn btn-outline-primary mt-3" type="submit" value="Consultar" />
      </form>
    </div>

    <div class="col-md-3">
      <form class="form d-flex flex-column" method="POST">
        <input type="text"
               class="form-control form-input"
               id="name"
               list="name-list"
               name="name"
               placeholder="Ingresa el nombre"
               required
               title="Ingrese un formato valido"
               autocomplete="off"
        />
        <i class="fa fa-search"></i>

        <datalist id="name-list"></datalist>

        <input class="btn btn-outline-primary mt-3" type="submit" value="Consultar" />
      </form>
    </div>
  </div>

  <?php if ($alert) : ?>
    <p class="text-center mt-5 alert alert-danger col-6 mx-auto">
      No se encontraron registros para el CURP <strong><?php echo $curp; ?></strong>
    </p>
  <?php endif; ?>
</div>

<?php include_once './partials/footer_ipn.php'; ?>
</body>
</html>