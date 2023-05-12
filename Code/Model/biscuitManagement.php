<?php

function databaseToShop(){
    require "data/dbconnector.php";

    $pdo = dbConnect();

    $stmt =$pdo->query("SELECT id, name, price FROM biscuits");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function databaseToDetail(){
    require "data/dbconnector.php";

    $pdo = dbConnect();

    $stmt =$pdo->query("SELECT id, name, price, energy, fat, carbohydrate, fiber, salt FROM biscuits");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function biscuitToCart($id){
    require "data/dbconnector.php";

    $pdo = dbConnect();

    $stmt =$pdo->query("SELECT name, price FROM biscuits WHERE id = $id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


