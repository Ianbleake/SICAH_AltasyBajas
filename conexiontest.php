<?php
    ini_set('display_errors',0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
   
    function Conectarse()
    {
        include('dbuser.php');
        $dsn = "Driver={SQL Server};Server=$serv;Database=$DB;";

        if(!($link = odbc_connect($dsn,$user,$pass)))
        {
            echo"Error conectando a la base de datos. ";
            
        }   
        else{
            echo"Base de datos conectada";
            
        }
        return $link;
    }


    $link2 = Conectarse();
?>