<?php
  require_once __DIR__ . '/../utils/functions.php';
  protect_route();
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../conexion.php';
    $connection = Conectarse();
  
    $curp = $_POST['curp'];
    $name = $_POST['name'];
  
    $getPlazas = "SELECT * FROM plazas WHERE CURP='$curp' order by FIN desc;";
    $statement = $connection->prepare($getPlazas);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SICAH | PLAZAS</title>
  <link rel="icon" href="logoSICAH.ico" type="image/x-icon">
  <link href="../css/bootstrap.min.css" rel="stylesheet" />
  <link href="../css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://kit.fontawesome.com/160d723f9c.js" crossorigin="anonymous"></script>
</head>

<body>
<?php include_once '../partials/header_ipn.php'; ?>
<?php include_once '../partials/header.php'; ?>

<div class="card mb-4">
  <h5>Historial de plazas de <?php echo $name ?> </h5>
  <form action="plazas_excel.php" method="post">
  <input type="hidden" id="curp" name="curp" value="<?php echo $curp?>">
  <input type="hidden" id="name" name="name" value="<?php echo $name?>">
  <button type="submit" class="btn btn-outline-primary mt-3">Descargar en formato excel</button>
  </form>
</div>
<div class="card mb-4">
<table class="table table-success table-striped">
            <tr>
              <td><strong>CURP</strong></td>
              <td><strong>Clave</strong></td>
              <td><strong>NP</strong></td>
              <td><strong>Clave presupuestal</strong></td>
              <td><strong>Movimiento</strong></td>
              <td><strong>Fecha de inicio</strong></td>
              <td><strong>Fecha de termino</strong></td>
              <td><strong>Fac</strong></td>
              <td><strong>Estatus</strong></td>
              <td><strong>TP</strong></td>
            </tr>
    
            <?php
              foreach($result as $row) :
            ?>

            <tr>
              <td><?php echo $row['CURP']?></td>
              <td><?php echo $row['CLAV']?></td>
              <td><?php echo $row['NP']?></td>
              <td><?php echo $row['CLAVE']?></td>
              <td><?php echo $row['MOV']?></td>
              <td><?php echo $row['FIN']?></td>
              <td><?php echo $row['FTE']?></td>
              <td><?php echo $row['FAC']?></td>
              <td><?php echo $row['HIS']?></td>
              <td><?php echo $row['TP']?></td>
            </tr>
            <?php
              endforeach;
            ?>
  </table>

</div>

<?php include_once '../partials/footer_ipn.php'; ?>

</body>
</html>