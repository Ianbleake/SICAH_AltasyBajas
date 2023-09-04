<?php
	require_once __DIR__ . '/../utils/functions.php';
	protect_route();
	can_see_modifica();
    require_once '../conexion.php';
    $connection = Conectarse();
	$tipo_usuario='';
	$_SESSION['user']['TIPO_USUARIO'];
	$tipo_usuario=$_SESSION['user']['TIPO_USUARIO'];;
	$result = $_SESSION['resultm']; 
    $_SESSION['resultmod']=$_SESSION['resultm'];
	if (!$result) header('Location: /sicah-web/consulta_personal.php');
	$_SESSION['resultm'] = null;
	$volver = true;
	$_FILES["Foto"]='';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SICAH | CURP</title>
	<link rel="icon" href="logoSICAH.ico" type="image/x-icon">
	<link href="../css/bootstrap.min.css" rel="stylesheet"/>
	<link href="../css/styles.css" rel="stylesheet"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<script src="https://kit.fontawesome.com/160d723f9c.js" crossorigin="anonymous"></script>
</head>

<body>
<?php include_once '../partials/header.php'; ?>
<section>
	<div class="container py-5">
		<div class="row">
			<div class="col-lg-4">
				<div class="card mb-4">
					<div class="card-body text-center">
						<img src="<?php echo get_image_dir($result['NUMEMP']); ?>" alt="avatar"
								 class="rounded-circle img-fluid" style="width: 150px;">
						<br>
                        <?php 
                        echo'<form action=MostrarModificaciones.php method ="Post" enctype="multipart/form-data">';
                        ?>
						<div class="col-sm-3 text-center">
                                <p class="text-muted mb-0 text-center"><strong>Cargar Fotografía:</strong></p>
                            </div>

                            <div class="col-sm-7">
                                <p class="text-muted mb-0"><input type="file" class="input form-control-file" name="Foto"></p>
                            </div>
						<br>
                        <input class="input form-control" required type=text class="my-3" maxlength="60" name="Nombre" value="<?php echo $result['NOMBRE']; ?>" >
                        <p class="text-muted mb-1"><strong>CURP:</strong> <?php echo $result['CURP'] ?></p>
						
                        <div class="row">
						<?php
							if($tipo_usuario == 1 || $tipo_usuario == 2 ){
								?>
                            <div class="col-sm-3 align-self-center" align="right">
                                <p class="text-muted mb-0"><strong>RFC:</strong></p>
                            </div>

                            <div class="col-sm-7">
                                <p class="text-muted mb-0"><input required type="text" class="input form-control" maxlength="13" name="RFC" value="<?php echo $result['RFC'] ?>"></p>
                            </div><?php
							}else{
								?>
								              <p class="text-muted mb-1"><strong>RFC:</strong> <?php echo $result['RFC']; ?></p>

								<?php
							}
							?>
                            <div class="col-sm-6 align-self-center" align="right">
                                <p class="text-muted mb-4"><strong>Número de empleado:</strong></p>
                            </div>

                            <div class="col-sm-3">
                                <p class="text-muted mb-4"><input required type="number" class="input form-control" name="NUMEMP" value="<?php echo removeZero($result['NUMEMP']); ?>"></p>
                            </div>
                        </div>
					</div>
				</div>
			</div>

			<div class="col-lg-8">
				<div class="card mb-4">
					<div class="card-body">
						
						<div class="row">
							<?php
							if($tipo_usuario == 1 || $tipo_usuario == 2 ){
								?>
							<div class="col-sm-3">
								<p class="mb-0">Domicilio:</p>
							</div>
							<div class="col-sm-9">
                                <p class="text-muted mb-0 input"><input required type="text" class="input form-control" name="Domicilio" value="<?php echo $result['DOMICILIO'] ?>"></p>
							</div>
                            <div class="col-sm-3">
								<p class="mb-0">Colonia:</p>
							</div>
							<div class="col-sm-9">
                                <p class="text-muted mb-0"><input required type="text" class="input form-control" name="Colonia" value="<?php echo $result['COLONIA'] ?>"></p>
							</div>
                            <div class="col-sm-3">
								<p class="mb-0">Delegacion:</p>
							</div>
							<div class="col-sm-9">
                            <p class="text-muted mb-0"><input required type="text" class="input form-control" name="Deleg" value="<?php echo $result['DELEG'] ?>"></p>
							</div>
                            <div class="col-sm-3">
								<p class="mb-0">Entidad:</p>
							</div>
							<div class="col-sm-9">
                            <p class="text-muted mb-0"><input required type="text" class="input form-control" name="Entidad" value="<?php echo $result['ENTIDAD'] ?>"></p>
							</div>
							<?php
							}else{
								?>
								<div class="col-sm-3">
               					   <p class="mb-0">Dirección:</p>
              					  </div>
               					 <div class="col-sm-9">
              				    <p class="text-muted mb-0"><?php echo getAddress($result); ?></p>
            				    </div>
								<?php
							}
							?>
						</div>
						<hr>
						

						<div class="row">
							<div class="col-sm-3">
								<p class="mb-0">Sexo:</p>
							</div>
                            <div class="col-sm-9">
                                    <select class="form-select" data-style="btn-success" name="Sexo">
                                    <option disabled selected><?php echo $result['C_SEXO']; ?></option>
                                    <?php
                                        $statement = $connection->prepare("SELECT * FROM SEXO;");
                                        $statement->execute();
                                        $consulta = $statement->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <?php foreach ($consulta as $row) { ?>
                                        <option value="<?php echo $row['ID_SEXO']; ?>"><?php echo $row['C_SEXO']; ?></option>
                                    <?php } ?>
                                </select>
							</div>
						</div>
						<hr>

						<div class="row">
							<div class="col-sm-3">
								<p class="mb-0">Teléfono celular:</p>
							</div>
							<div class="col-sm-9">
                            <p class="text-muted mb-0"><input required type="number" maxlength="10" class="input form-control" name="TELCEL" value="<?php echo removeZero($result['TELCASA']); ?>"></p>
							</div>
						</div>
						<hr>

						<div class="row">
							<div class="col-sm-3">
								<p class="mb-0">Teléfono fijo:</p>
							</div>
							<div class="col-sm-9">
                            <p class="text-muted mb-0"><input type="number" maxlength="10" class="input form-control" name="TELOFI" value="<?php echo $result['TELOFI']; ?>"></p>
							</div>
						</div>
						<hr>

                        <div class="row">
							<div class="col-sm-3">
								<p class="mb-0">Correo Electrónico:</p>
							</div>
							<div class="col-sm-9">
                            <p class="text-muted mb-0"><input type="email" class="input form-control" name="EMAIL" value="<?php echo $result['EMAIL']; ?>"></p>
							</div>
						</div>
						<hr>

						
						<div class="row">
						<?php
						if ($tipo_usuario == 1 || $tipo_usuario == 2) {
							?>
							<div class="col-sm-3">
								<p class="mb-0">Estado civil:</p>
							</div>
							<div class="col-sm-9">
                            <select class="form-select" data-style="btn-success" name="Estadocivil">
                                    <option disabled selected><?php echo $result['ESTADO']; ?></option>
                                    <?php
                                        $statement = $connection->prepare("SELECT * FROM estado_civil;");
                                        $statement->execute();
                                        $consulta = $statement->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <?php foreach ($consulta as $row) { ?>
                                        <option value="<?php echo $row['ID_ESTADO']; ?>"><?php echo $row['ESTADO']; ?></option>
                                    <?php } ?>
                                </select>
							</div>
							<?php
							}else{
								?>
								<div class="col-sm-3">
                				  <p class="mb-0">Estado civil:</p>
              					  </div>
            				    <div class="col-sm-9">
              				    <p class="text-muted mb-0"><?php echo $result['ESTADO']; ?></p>
             				   </div>
								<?php
							}
							?>

						</div>
						<hr>
						

						<div class="row">
							<div class="col-sm-3">
								<p class="mb-0">Nombre del conyuge:</p>
							</div>
							<div class="col-sm-9">
                            <p class="text-muted mb-0"><input type="text" maxlength="60" class="input form-control" name="Conyuge" value="<?php echo $result['CONYUGE']; ?>"></p>
							</div>
						</div>
						<hr>

						<div class="row">
							<div class="col-sm-3">
								<p class="mb-0">Nombre del padre:</p>
							</div>
							<div class="col-sm-9">
                            <p class="text-muted mb-0"><input type="text" maxlength="60" class="input form-control" name="NPADRE" value="<?php echo $result['NPADRE']; ?>"></p>
							</div>
						</div>
						<hr>

						<div class="row">
							<div class="col-sm-3">
								<p class="mb-0">Nombre de la madre:</p>
							</div>
							<div class="col-sm-9">
                            <p class="text-muted mb-0"><input type="text" maxlength="60" class="input form-control" name="NMADRE" value="<?php echo $result['NMADRE']; ?>"></p>
							</div>
						</div>
						<hr>

						<div class="row">
							<div class="col-sm-3">
								<p class="mb-0">Nacionalidad:</p>
							</div>
							<div class="col-sm-9">

                            <select class="form-select" data-style="btn-success" name="Nacion">
                                    <option disabled selected><?php echo $result['NACIONALIDAD']; ?></option>
                                    <?php
                                        $statement = $connection->prepare("SELECT * FROM NACIONALIDAD;");
                                        $statement->execute();
                                        $consulta = $statement->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <?php foreach ($consulta as $row) { ?>
                                        <option value="<?php echo $row['ID_NACIONALIDAD']; ?>"><?php echo $row['NACIONALIDAD']; ?></option>
                                    <?php } ?>
                                </select>
							</div>
						</div>
                        <hr>

                        <div class="row">
							<div class="col-sm-3">
								<p class="mb-0">Lugar de Nacimiento:</p>
							</div>
							<div class="col-sm-9">

                            <select class="form-select" data-style="btn-success" name="Lugar">
                                    <option disabled selected><?php echo $result['LUGAR']; ?></option>
                                    <?php
                                        $statement = $connection->prepare("SELECT * FROM lugar_nacimiento;");
                                        $statement->execute();
                                        $consulta = $statement->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <?php foreach ($consulta as $row) { ?>
                                        <option value="<?php echo $row['ID_LUGAR']; ?>"><?php echo $row['LUGAR']; ?></option>
                                    <?php } ?>
                                </select>
							</div>
						</div>
						<!-- <hr> -->

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="text-center">
	<input type=submit class="btn btn-outline-primary mt-3" value="Guardar Cambios">
</div>
                    </form>
</body>

</html>