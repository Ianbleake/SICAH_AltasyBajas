<?php

use Dotenv\Dotenv;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function Conectarse()
{
  $dsn = "sqlsrv:Server={$_ENV['MATEBOOK14IB\BLEAKESERVER']};Database={$_ENV['SICAH_dev']}";
  $username = $_ENV['TEST'] ?? NULL;
  $password = $_ENV['1234'] ?? NULL;

  $conn = new PDO($dsn, $username, $password);

  if ($conn === false) {
    echo "Unable to connect.</br>";
    die(print_r(sqlsrv_errors(), true));
  }
  else
  {
    echo"CONEXION SUCCES";
  }
  return $conn;
}
