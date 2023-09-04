<?php
	require_once './utils/functions.php';
	require_once 'conexion.php';
	$connection = Conectarse();

	session_start();
	$alert = null;
	$token = s($_GET['token']);
	$error = null;
	$email = null;

	$findEmailQuery = "SELECT CORREO, RESET FROM UsuariosSicah WHERE TOKEN = '$token';";
	$statement = $connection->prepare($findEmailQuery);
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);

	if (count($result) === 0) $error = "El token no es válido";

	if (count($result) > 0 && $result[0]["RESET"] === 0) $error = "No tiene permitida esta acción";

$email = $result[0]['CORREO'];

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$pass = $_POST['password'];
		$new_pass = password_hash($pass, PASSWORD_BCRYPT);

		$updatePasswordQuery = "UPDATE UsuariosSicah SET CONTRASENA = '$new_pass', RESET = 0, TOKEN = '' WHERE CORREO = '$email';";
		$statement = $connection->prepare($updatePasswordQuery);
		$statement->execute();
		$alert = "Contraseña actualizada exitosamente. La ventana se actualizará en 3 segundos.";
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>SICAH | Restablecer Contraseña</title>
	<link rel="icon" href="img/logoSICAH.ico" type="image/x-icon">
	<link href="./css/bootstrap.min.css" rel="stylesheet"/>
	<link href="./css/styles.css" rel="stylesheet"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
					integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"
					defer></script>
</head>

<body class="bg-primary">
<section class="h-100">
	<div class="container">
		<div class="row justify-content-md-center h-100">
			<div class="card-wrapper">	
				<div class="card fat mt-8 col-6 mx-auto">
					<div class="card-body">
						<?php if (isset($error)) : ?>
							<h4 class="card-title text-center"><?php echo $error; ?></h4>

							<div class="mt-4 text-end f-12">
								<a href="./login.php">Volver al login</a>
							</div>
						<?php endif; ?>
								
						<?php if (!isset($error)) : ?>
							<h4 class="card-title text-center">Restablece tu Contraseña</h4>
							<form method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="password">Nueva Contraseña</label>
									<input id="password" type="password" class="form-control" name="password" required
												placeholder="Ingresa tu nueva contraseña">
								</div>

								<div class="form-group mt-4 d-flex justify-content-center">
									<button type="submit" class="btn btn-primary w-100">
										Cambiar contraseña
									</button>
								</div>
							</form>
						<?php endif; ?>
					</div>
				</div>

				<?php if (isset($alert)) : ?>
					<p class="text-center mt-5 alert alert-danger col-6 mx-auto">
						<?php echo $alert; ?>
					</p>

					<script>
						setTimeout(() => {
							window.location.href = '/sicah-web/login.php';
						}, 3000);
					</script>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
</body>