<?php

  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

  require_once __DIR__ . '/../utils/functions.php';
  protect_route();

  require_once __DIR__ . '/../conexion.php';
  $connection = Conectarse();
  $nombre = $_GET['nombre'];

  $query = "SELECT NOMBRE FROM datos_personales WHERE NOMBRE LIKE '%{$nombre}%';";

  $statement = $connection->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);

  if (count($result) === 0) {
    echo json_encode([]);
  } else {
    echo json_encode($result);
  }

  return;