<?php
	require_once __DIR__ . '/../utils/functions.php';
	protect_route();
    can_see_modifica();
    require_once '../conexion.php';
	$tipo_usuario='';
	$_SESSION['user']['TIPO_USUARIO'];
	$tipo_usuario=$_SESSION['user']['TIPO_USUARIO'];;
	$result = $_SESSION['resultmod'];
    $_SESSION['resultmod']=null;
    $curp=$result['CURP'];

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre=$_POST['Nombre'];
        if(isset($_POST['RFC'])){$rfc=$_POST['RFC'];}
        else{
            $rfc=$result['RFC'];
        }
        $numemp=$_POST['NUMEMP'];
        if(isset($_POST['Domicilio'])){$domicilio=$_POST['Domicilio'];}
        else{
            $domicilio=$result['DOMICILIO'];
        }
        if(isset($_POST['Colonia'])){$colonia=$_POST['Colonia'];}
        else{
            $colonia=$result['COLONIA'];
        }
        if(isset($_POST['Deleg'])){$delegacion=$_POST['Deleg'];}
        else{
            $delegacion=$result['DELEGACION'];
        }
        if(isset($_POST['Entidad'])){$entidad=$_POST['Entidad'];}
        else{
            $entidad=$result['ENTIDAD'];
        }
        if(isset($_POST['Sexo'])){$sexo=$_POST['Sexo'];}
        else{
            $sexo=$result['ID_SEXO'];
        }
        $telcel=$_POST['TELCEL'];
        $telofi=$_POST['TELOFI'];
        $email=$_POST['EMAIL'];
        if(isset($_POST['Estadocivil'])){$ecivil=$_POST['Estadocivil'];}
        else{
            $ecivil=$result['ID_ESTADO'];
        }
        $conyuge=$_POST['Conyuge'];
        $npadre=$_POST['NPADRE'];
        $nmadre=$_POST['NMADRE'];
        if(isset($_POST['Nacion'])){$nacion=$_POST['Nacion'];}
        else{
            $nacion=$result['ID_NACIONALIDAD'];
        }
        if(isset($_POST['Lugar'])){ $lugar=$_POST['Lugar'];}
        else{
            $lugar=$result['ID_LUGAR'];
        }

        if($_FILES["Foto"]["error"]==0){
            $permitidos=array("image/jpg");
            $file=$_FILES["Foto"]["name"];
            $file_type=strtolower(pathinfo($file,PATHINFO_EXTENSION));
            $size_image=204800;
            if($file_type=="jpg"){
                if($_FILES["Foto"]["size"]<$size_image){
                $ruta='../fotosdb/';
                $fotografia=$ruta.$numemp . '.jpg';
                $resultado=@move_uploaded_file($_FILES["Foto"]["tmp_name"],$fotografia);
                if($resultado){
                    ?>
                    <script>window.alert('Fotografía Cargada con éxito')</script>
                    <?php
                    //echo"Fotografía Cargada con éxito";
                }else{
                    ?>
                    <script>window.alert('No se cargo la fotografía con éxito')</script>
                    <?php
                    //echo"No se cargo la fotografía con éxito";
                }
            }else{
                ?>
                <script>window.alert('Archivo Excede el limite de tamaño')</script>
                <?php 
            }}else{
                ?>
                    <script>window.alert('Archivo NO permitido')</script>
                    <?php
                //echo"Archivo NO permitido o excede el tamaño";
            }
        }
        
        

    
		$connection = Conectarse();
         
		 $updateDatos = "UPDATE datos_personales SET NOMBRE = '$nombre', RFC = '$rfc', NUMEMP = '$numemp',DOMICILIO = '$domicilio',COLONIA = '$colonia',
         DELEG = '$delegacion',ENTIDAD = '$entidad',SEXO = '$sexo',TELCASA = '$telcel',TELOFI = '$telofi',EMAIL = '$email',CIVIL = '$ecivil',
         CONYUGE = '$conyuge',NPADRE = '$npadre',NMADRE = '$nmadre',NACION = '$nacion',LUGAR_NACIMIENTO = '$lugar',FOTO = '$numemp' WHERE CURP = '$curp';";
		$statement = $connection->prepare($updateDatos);
		$statement->execute();

        $query = "SELECT * FROM datos_personales AS dp 
		 LEFT JOIN estado_civil AS ec 
		 ON dp.CIVIL = ec.ID_ESTADO
		  LEFT JOIN NACIONALIDAD AS nac 
		  ON dp.NACION = nac.ID_NACIONALIDAD
		 LEFT JOIN lugar_nacimiento AS ln
		   ON dp.LUGAR_NACIMIENTO = ln.ID_LUGAR
		  LEFT JOIN Sexo AS sexo
		  ON dp.SEXO = sexo.ID_SEXO
		   WHERE CURP='$curp';";
		  $statement = $connection->prepare($query);
		  $statement->execute();
		  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
			$_SESSION['result'] = $result[0];
		 	$_SESSION['resultpdf'] = $result[0];
            ?>
             <script>
                
                 setTimeout(() => {
							window.location.href = 'personal.php';
		 				}, 500);
                     if(!$result){
                             setTimeout(() => {
		 					window.location.href = '../consulta_personal.php';
					}, 500);
                     }
                            
            </script>
		
              <?php
			}
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
</body>
</html>