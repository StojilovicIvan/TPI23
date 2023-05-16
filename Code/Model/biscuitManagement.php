<?php

function databaseToShop(){
    require_once "data/dbconnector.php";

    $pdo = dbConnect();

    $stmt =$pdo->query("SELECT id, name, price, image FROM biscuits");
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

function databaseToAdmin(){
    require_once "data/dbconnector.php";

    $pdo = dbConnect();

    $stmt =$pdo->query("SELECT id, name, price, image, energy, fat, carbohydrate, fiber, salt FROM biscuits");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function biscuitToDatabase($data){
    require_once "data/dbconnector.php";

    $pdo = dbConnect();

    $name = $data['name'];
    $price = $data['price'];
    $image = $data['image'];
    $energy = $data['energy'];
    $fat = $data['fat'];
    $carbohydrate = $data['carbohydrate'];
    $fiber = $data['fiber'];
    $salt = $data['salt'];

    $stmt =$pdo->prepare('INSERT INTO biscuits (name, price, image, energy, fat, carbohydrate, fiber, salt)
                        VALUES (:name, :price, :image, :energy, :fat, :carbohydrate, :fiber, :salt)');

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':energy', $energy);
    $stmt->bindParam(':fat', $fat);
    $stmt->bindParam(':carbohydrate', $carbohydrate);
    $stmt->bindParam(':fiber', $fiber);
    $stmt->bindParam(':salt', $salt);
    $stmt->execute();
}
/*
function getBiscuit($id){
    require_once "data/dbconnector.php";

    $pdo = dbConnect();

    $id = $id;

    $stmt =$pdo->query("SELECT id, name, price, image, energy, fat, carbohydrate, fiber, salt FROM biscuits WHERE id = :id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt->bindParam(':id', $id);
    $stmt->execute();
}*/

function updateBiscuit($data){
    require_once "data/dbconnector.php";

    $pdo = dbConnect();

    $id = $data['id'];
    $name = $data['name'];
    $price = $data['price'];
    $image = $data['image'];
    $energy = $data['energy'];
    $fat = $data['fat'];
    $carbohydrate = $data['carbohydrate'];
    $fiber = $data['fiber'];
    $salt = $data['salt'];

    $stmt =$pdo->prepare('UPDATE biscuits
                                SET name = :name, price = :price, image = :image, energy = :energy, fat = :fat, carbohydrate = :carbohydrate, fiber = :fiber, salt = :salt
                                WHERE id = :id');

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':energy', $energy);
    $stmt->bindParam(':fat', $fat);
    $stmt->bindParam(':carbohydrate', $carbohydrate);
    $stmt->bindParam(':fiber', $fiber);
    $stmt->bindParam(':salt', $salt);
    $stmt->execute();
}


