<?php

function databaseToShop(){
    require_once "data/dbConnector.php";

    $pdo = dbConnect();

    $stmt =$pdo->query("SELECT id, name, price, image FROM biscuits WHERE activ = 1");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function databaseToDetail(){
    require "data/dbConnector.php";

    $pdo = dbConnect();

    $stmt =$pdo->query("SELECT id, name, price, energy, fat, carbohydrate, fiber, salt FROM biscuits");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function databaseToAdmin(){
    require_once "data/dbConnector.php";

    $pdo = dbConnect();

    $stmt =$pdo->query("SELECT id, name, price, image, energy, fat, carbohydrate, fiber, salt, activ FROM biscuits");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function biscuitToDatabase($data){
    require_once "data/dbConnector.php";

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

function updateBiscuit($data){
    require_once "data/dbConnector.php";

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

function disableBiscuitDatabase($id){

    require_once "data/dbConnector.php";

    $pdo = dbConnect();

    $stmt =$pdo->prepare('UPDATE biscuits
                                SET activ = 0 WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

}

function enableBiscuitDatabase($id){
    require_once "data/dbConnector.php";

    $pdo = dbConnect();

    $stmt =$pdo->prepare('UPDATE biscuits
                                SET activ = 1 WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

}

function cartToDatabase($data, $id, $type){
    require_once "data/dbConnector.php";

    $pdo = dbConnect();

    $quantity = null;

   foreach ($data['product_quantities'] as $prodData){
       $quantity += $prodData;
   }

    $userID = $id;
    $userType = $type;

    $stmt =$pdo->prepare('INSERT INTO orders (quantity, date, users_id, users_userTypes_id)
                        VALUES (:quantity, current_date, :userID, :userType)');

    $stmt =$pdo->prepare('INSERT INTO orders_has_biscuits (orders_id, orders_users_id, orders_users_userTypes_id, biscuits_id, quantity)
                        VALUES ()');

    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':userID', $userID);
    $stmt->bindParam(':userType', $userType);
    $stmt->execute();
}

function selectBiscuitFilter(){



}


