<?php

    $host = "localhost";
    $dbname = "moviestar";
    $user = "root";
    $pass = "";

    $conn = new PDO("mysql:host=" . $host .";dbname=" . $dbname,$user,$pass);

    //Habilitar erros PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
?>