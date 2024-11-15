<?php

    $host = 'localhost';
    $db = 'sistema_escolar';
    $user = 'root';
    $password = '';

    $connection = new mysqli($host, $user, $password, $db);

    if ($connection->connect_error) 
    {
        die("Falha na conexão: " . $conn->connect_error);
    }
?>