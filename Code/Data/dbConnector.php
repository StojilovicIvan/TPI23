<?php

function dbConnect(){
    $host = 'localhost';
    $db = 'biscuitshop';
    $username = 'biscuitAdmin';
    $password = 'Pa$$w0rd';

    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        die();
    }

}

?>