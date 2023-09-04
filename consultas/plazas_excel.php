<?php 
$name = $_POST['name'];
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename = Historial de plazas '$name'.xls"); 
?>

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
                require_once '../conexion.php';
                $connection = Conectarse();
            
                $curp = $_POST['curp'];
                
            
                $getPlazas = "SELECT * FROM plazas WHERE CURP='$curp' order by FIN desc;";
                $statement = $connection->prepare($getPlazas);
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);

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