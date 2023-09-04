<?php
session_start();
$alert = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require_once 'conexion.php';
  $connection = Conectarse();

  $email = $_POST['email'];
  $pass = $_POST['password'];

  $getEmployeeQuery = "SELECT * FROM UsuariosSicah WHERE CORREO='$email';";
  $statement = $connection->prepare($getEmployeeQuery);
  $statement->execute();
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);

  if (empty($result)) {
    $alert = "No existe el usuario con el correo $email";
    $email = '';
  } else {
    $is_auth = password_verify($pass, $result[0]['CONTRASENA']);
    if ($is_auth && $result[0]['ESTATUS'] === '1') {
      $_SESSION['user'] = $result[0];
      if ($result[0]['RESET'] === '0') {
        header('Location: /sicah-web/index.php');
      } else {
        header('Location: /sicah-web/recuperar_contrasena.php');
      }
    } else {
      $alert = "Contraseña incorrecta o usuario inactivo";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SICAH | Login</title>
  <link rel="icon" href="img/logoSICAH.ico" type="image/x-icon">
  <link href="./css/bootstrap.min.css" rel="stylesheet" />
  <link href="./css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"
          defer></script>
</head>

<body class="my-login-page bg-primary">
<?php include_once './partials/header_ipn.php'; ?>

<section class="mt-5 mb-5">
  <div class="container h-100">
    <div class="row justify-content-md-center h-100">
      <div class="card-wrapper">
        <div class="brand">
          <img src="img/Logo Sicah.png" alt="logo">
        </div>
        <div class="card fat">
          <div class="card-body">
            <h4 class="card-title text-center">SICAH Web</h4>
            <form method="POST" class="my-login-validation">
              <div class="form-group my-3">
                <label for="email">Correo Electrónico</label>
                <input id="email" type="email" class="form-control" name="email" value="<?php echo $email ?? ''; ?>"
                       required autofocus>
              </div>

              <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" class="form-control" name="password" required data-eye>
              </div>

              <div class="form-group mt-4 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary w-100">
                  Iniciar Sesión
                </button>
              </div>
              <div class="mt-4 text-end f-12">
                <a href="./recuperar_contrasena.php">Olvidé mi contraseña</a>
              </div>
            </form>
          </div>
        </div>

        <?php if (isset($alert)) : ?>
          <p class="text-center mt-5 alert alert-danger col-12 mx-auto">
            <?php echo $alert; ?>
          </p>
        <?php endif; ?>

        <div class="footer">
          Copyright &copy; <?php echo date("Y"); ?> &mdash; SICAH
        </div>
      </div>
    </div>
  </div>
</section>

<?php include_once './partials/footer_ipn.php'; ?>
</body>

</html>
