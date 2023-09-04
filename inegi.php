<?php
	require_once 'conexion.php';
	require_once __DIR__ . '/utils/functions.php';
	protect_route();
	

	$connection = Conectarse();
	$results = [];
	$flag = false;
	$post['nivel'] = null;
	$post['sexo'] = null;
	$post['funcion'] = null;
	$post['edad']=null;
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$post['nivel'] = $_POST['NivelEstudios'] ?? null;
		$post['sexo'] = $_POST['Sexo'] ?? null;
		$post['funcion'] = $_POST['Funcion'] ?? null;
		$post['edad']=$_POST['Edad'] ?? null;
		$queryPrincipal = "SELECT NIVEL,Sexo, COUNT(SEXO) Cantidad FROM datos_estudio AS de, datos_personales AS dp, datos_laborales AS dl WHERE dp.CURP=de.CURP AND dp.CURP=dl.CURP ";

		if (!empty($_POST['NivelEstudios']) || !empty($_POST['Funcion']) || !empty($_POST['Sexo']) || !empty($_POST['Edad'])) {
			if (!empty($_POST["NivelEstudios"])) $queryPrincipal .= "AND de.NIVEL= '" . $_POST['NivelEstudios'] . "' ";
			if (!empty($_POST["Funcion"])) $queryPrincipal .= "AND dl.FUNCION= '" . $_POST['Funcion'] . "' ";
			if (!empty($_POST["Sexo"])) $queryPrincipal .= "AND dp.SEXO= '" . $_POST['Sexo'] . "' ";
			if (!empty($_POST["Edad"]))
			 {
				/*$queryEdad="UPDATE datos_personales set Edad=DATEDIFF(year,FNACIMIENTO,getdate())";
				$queryEdad1=$connection->prepare($queryEdad);
				$queryEdad1->execute(); 
				$queryEdadF = $queryEdad1->fetchAll(PDO::FETCH_ASSOC);*/
				switch($_POST["Edad"]){
					case'20 a 24 años':
				$queryPrincipal .= "AND dp.Edad BETWEEN 20 AND 24";
				break;
				case'25 a 29 años':
					$queryPrincipal .= "AND dp.Edad BETWEEN 25 AND 29";
					break;
					case'30 a 34 años':
						$queryPrincipal .= "AND dp.Edad BETWEEN 30 AND 34";
						break;
						case'35 a 39 años':
							$queryPrincipal .= "AND dp.Edad BETWEEN 35 AND 39";
							break;
							case'40 a 44 años':
								$queryPrincipal .= "AND dp.Edad BETWEEN 40 AND 44";
								break;
								case'45 a 49 años':
									$queryPrincipal .= "AND dp.Edad BETWEEN 45 AND 49";
									break;
									case'50 a 54 años':
										$queryPrincipal .= "AND dp.Edad BETWEEN 50 AND 54";
										break;
										case'55 a 59 años':
											$queryPrincipal .= "AND dp.Edad BETWEEN 55 AND 59";
											break;
											case'60 a 64 años':
												$queryPrincipal .= "AND dp.Edad BETWEEN 60 AND 64";
												break;
												case'65 y mas':
													$queryPrincipal .= "AND dp.Edad>64";
													break;
			}}
		}
		$queryPrincipal .= "GROUP BY NIVEL,SEXO";
		$queryfinal = $connection->prepare($queryPrincipal);
		$queryfinal->execute();
		$results = $queryfinal->fetchAll(PDO::FETCH_ASSOC);
		$queryTotalE="SELECT SUM(Cantidad) TotalEmpleados from($queryPrincipal) AS Resultado";
		$queryTotalE1 = $connection->prepare($queryTotalE);
		$queryTotalE1->execute();
		$flag = true;
		$resultsTE=$queryTotalE1->fetchAll(PDO::FETCH_ASSOC);
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>SICAH consultas</title>
	<link rel="icon" href="img/logoSICAH.ico" type="image/x-icon">
	<link href="./css/bootstrap.min.css" rel="stylesheet"/>
	<link href="./css/styles.css" rel="stylesheet"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
					integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"
					defer></script>
</head>

<body>
<?php include_once './partials/header_ipn.php'; ?>
<?php include_once './partials/header.php'; ?>

<div class="container vh-50">
	<p class="text-center mt-5">
		Selecciona los filtros para una búsqueda avanzada
	</p>

	<form class="row d-md-flex" method="post">
		<div class="col-md-3 mb-2 mb-md-4">
			<select class="form-select" data-style="btn-success" name="NivelEstudios">
				<option disabled selected>Nivel de Estudios</option>
				<?php
					$statement = $connection->prepare("SELECT DISTINCT ID_NIVEL, NIVEL FROM datos_estudio where ID_NIVEL is not null;");
					$statement->execute();
					$consulta = $statement->fetchAll(PDO::FETCH_ASSOC);
					foreach ($consulta as $row) { ?>
						<option <?php echo $row['NIVEL'] === $post["nivel"] ? 'selected' : '' ?>
							value="<?php echo $row['NIVEL']; ?>"><?php echo $row['NIVEL']; ?> </option>
					<?php } ?>
			</select>
		</div>

		<div class="col-md-3 mb-2 mb-md-4">
			<select class="form-select" data-style="btn-success" name="Funcion">
				<option disabled selected>Función</option>
				<?php
					$statement = $connection->prepare("SELECT DISTINCT ID_FUNCION, FUNCION FROM datos_laborales where ID_FUNCION is not null;");
					$statement->execute();
					$consulta = $statement->fetchAll(PDO::FETCH_ASSOC);
				?>
				<?php foreach ($consulta as $row) { ?>
					<option <?php echo $row['FUNCION'] === $post["funcion"] ? 'selected' : '' ?>
						value="<?php echo $row['FUNCION']; ?>"><?php echo $row['FUNCION']; ?> </option>
				<?php } ?>
			</select>
		</div>

		<div class="col-md-3 mb-2 mb-md-4">
			<select class="form-select" data-style="btn-success" name="Sexo">
				<option disabled selected>Sexo</option>
				<?php
					$statement = $connection->prepare("SELECT * FROM SEXO;");
					$statement->execute();
					$consulta = $statement->fetchAll(PDO::FETCH_ASSOC);
				?>
				<?php foreach ($consulta as $row) { ?>
					<option <?php echo $row['ID_SEXO'] === $post["sexo"] ? 'selected' : '' ?>
						value="<?php echo $row['ID_SEXO']; ?>"><?php echo ($row['C_SEXO']); ?></option>
				<?php } ?>
			</select>
		</div>

		<div class="col-md-3 mb-2 mb-md-4">
			<select class="form-select" data-style="btn-success" name="Edad">
			<option disabled selected value="">Edad</option>
				<option <?php echo "20 a 24 años" === $post["edad"] ? 'selected' : ''?>
				value="20 a 24 años">20 a 24 años</option>
				<option <?php echo "25 a 29 años" === $post["edad"] ? 'selected' : ''?>
				value="25 a 29 años">25 a 29 años</option>
				<option <?php echo "30 a 34 años" === $post["edad"] ? 'selected' : ''?>
				value="30 a 34 años">30 a 34 años</option>
				<option <?php echo "35 a 39 años" === $post["edad"] ? 'selected' : ''?>
				value="35 a 39 años">35 a 39 años</option>
				<option <?php echo "40 a 44 años" === $post["edad"] ? 'selected' : ''?>
				value="40 a 44 años">40 a 44 años</option>
				<option <?php echo "45 a 49 años" === $post["edad"] ? 'selected' : ''?>
				value="45 a 49 años">45 a 49 años</option>
				<option <?php echo "50 a 54 años" === $post["edad"] ? 'selected' : ''?>
				value="50 a 54 años">50 a 54 años</option>
				<option <?php echo "55 a 59 años" === $post["edad"] ? 'selected' : ''?>
				value="55 a 59 años">55 a 59 años</option>
				<option <?php echo "60 a 64 años" === $post["edad"] ? 'selected' : ''?>
				value="60 a 64 años">60 a 64 años</option>
				<option <?php echo "65 y mas" === $post["edad"] ? 'selected' : ''?>
				value="65 y mas">65 y mas</option>
			</select>
		</div>
			
		<input type="submit" class="btn btn-primary btn-outline-light col-md-2 offset-md-5 mt-3 mt-md-0" value="Buscar"/>
		<a href="/sicah-web/inegi.php" class="btn btn-primary btn-outline-light col-md-2 offset-md-5 mt-3 mt-md-0">Limpiar Filtros</a>
				
	</form>
	
	<?php if ($results): ?>
		<div class="container vh-50">
		<table class="table mt-5">
			<thead>
			<tr>
				<th scope="col">Nivel</th>
				<th scope="col">Sexo</th>
				<th scope="col">Cantidad</th>
			</tr>
			</thead>

			<tbody>
			<?php foreach ($results as $result): ?>
				<tr>
					<td><?php echo $result['NIVEL']; ?></td>
					<td><?php echo displayGender($result['Sexo']); ?></td>
					<td><?php echo $result['Cantidad']; ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			<?php foreach ($resultsTE as $result): ?>
				<tr>
					<td><?php echo " "; ?></td>
					<td><?php echo "Total Empleados:"; ?></td>
					<td><?php echo $result['TotalEmpleados']; ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
			</div>
	<?php endif; ?>
	
	<?php if (empty($results) && $flag): ?>
		<p class='text-center mt-5'>No se encontraron registros con los filtros seleccionados</p>
	<?php endif; ?>
</div>

<?php include_once './partials/footer_ipn.php'; ?>
	
</body>

</html>