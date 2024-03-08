<?php

    $host = "localhost";
    $bd = "revisaophp";
    $user = "root";
    $senha = "admin";

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$bd", $user, $senha);
    } catch (PDOException $e){
        echo "Erro:". $e->getMessage();
    }