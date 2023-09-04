<?php
	require './vendor/autoload.php';
	use Classes\Email;
	
	session_start();
	$alert = null;
	$error = null;

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		require_once 'conexion.php';
		$connection = Conectarse();

		$email = $_POST['email'];

		$findUserQuery = "SELECT NOMBRE FROM UsuariosSicah WHERE CORREO = '$email';";
		$statement = $connection->prepare($findUserQuery);
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);

		if (count($result) === 0) {
			$error = "Error el enviar el correo electrónico";
		} else {
			$token = uniqid();

			$mail = new Email($email, $result[0]['NOMBRE'], $token);
			$mail->sendForgotPasswordEmail();

			$updatePasswordQuery = "UPDATE UsuariosSicah SET RESET = 1, TOKEN = '$token' WHERE CORREO = '$email';";
			$statement = $connection->prepare($updatePasswordQuery);
			$statement->execute();
			$alert = "Correo enviado exitosamente. Siga las instrucciones adjuntas. La ventana se actualizará en 5 segundos.";
		}		
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>SICAH | Recuperar Contraseña</title>
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
						<h4 class="card-title text-center">Restablece tu Contraseña</h4>
						<form method="POST" class="my-login-validation" novalidate="">
							<div class="form-group">
								<label for="email">Correo Electrónico</label>
								<input id="email" type="email" class="form-control" name="email" required
											 placeholder="Ingresa tu correo electrónico">
							</div>

							<div class="form-group mt-4 d-flex justify-content-center">
								<button type="submit" class="btn btn-primary w-100">
									Solicitar cambio de contraseña
								</button>
							</div>
						</form>
					</div>
				</div>

				<?php if (isset($error)) : ?>
					<p class="text-center mt-5 alert alert-danger col-6 mx-auto">
						<?php echo $error; ?>
					</p>
				<?php endif; ?>


				<?php if (isset($alert)) : ?>
					<p class="text-center mt-5 alert alert-danger col-6 mx-auto">
						<?php echo $alert; ?>
					</p>

					<script>
						setTimeout(() => {
							window.location.href = '/sicah-web/login.php';
						}, 5000);
					</script>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
</body>