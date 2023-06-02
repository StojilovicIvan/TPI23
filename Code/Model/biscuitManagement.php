<?php

function databaseToHome(){
    require_once "data/dbConnector.php";

    $pdo = dbConnect();

    $stmt =$pdo->query('SELECT id, name, biscuits_has_packages.weight AS weight, price, image 
                            FROM biscuits
                            INNER JOIN biscuits_has_packages ON biscuits_has_packages.biscuits_id = biscuits.id
                            WHERE activ = 1 LIMIT 4');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function databaseToShop(){
    require_once "data/dbConnector.php";

    $pdo = dbConnect();

    $stmt =$pdo->query('SELECT id, name, biscuits_has_packages.weight AS weight, price, image 
                            FROM biscuits 
                            INNER JOIN biscuits_has_packages ON biscuits_has_packages.biscuits_id = biscuits.id 
                            WHERE activ = 1');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function databaseToFilter($option){
    require_once "data/dbConnector.php";

    $pdo = dbConnect();

    $type = $option['filter'];

    $stmt =$pdo->prepare('SELECT biscuits.id, biscuits.name, biscuits_has_packages.weight AS weight, price, image 
                                FROM biscuits 
                                INNER JOIN biscuits_has_packages ON biscuits_has_packages.biscuits_id = biscuits.id 
                                INNER JOIN biscuits_has_biscuitTypes ON biscuits.id = biscuits_has_biscuitTypes.biscuits_id
                                INNER JOIN biscuitTypes ON biscuits_has_biscuitTypes.biscuitTypes_id = biscuitTypes.id
                                WHERE activ = 1 AND biscuitTypes.id = :type');

    $stmt->bindParam(':type', $type);
    $stmt->execute();

    return $stmt;
}

function databaseToDetail(){
    require_once "data/dbConnector.php";

    $pdo = dbConnect();

    $stmt =$pdo->query('SELECT id, name, biscuits_has_packages.weight AS weight, price, stock, energy, fat, carbohydrate, fiber, salt
                            FROM biscuits
                            INNER JOIN biscuits_has_packages ON biscuits_has_packages.biscuits_id = biscuits.id');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function biscuitAllergy($id){
    require_once "data/dbConnector.php";

    $pdo = dbConnect();


    $stmt =$pdo->query("SELECT allergy.name FROM allergy
                            INNER JOIN allergy_has_biscuits ON allergy_has_biscuits.allergy_id = allergy.id
                            INNER JOIN biscuits ON biscuits.id = allergy_has_biscuits.biscuits_id
                            WHERE biscuits.id = $id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function databaseToAdmin(){
    require_once "data/dbConnector.php";

    $pdo = dbConnect();

    $stmt =$pdo->query("SELECT id, name, price, image, energy, fat, carbohydrate, fiber, salt, activ, stock FROM biscuits");
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
    $totalPrice = $data['product_totalPrice'];

    $stmt =$pdo->prepare('INSERT INTO orders (totalQuantity, date, users_id, users_userTypes_id, totalPrice)
                        VALUES (:quantity, current_date, :userID, :userType, :totalPrice)');

    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':userID', $userID);
    $stmt->bindParam(':userType', $userType);
    $stmt->bindParam(':totalPrice', $totalPrice);
    $stmt->execute();

    $order_id = $pdo->lastInsertId();

    $orderID = $order_id;
    $userID = $id;
    $userType = $type;

    foreach ($data['product_ids'] as $key => $biscuitID){
        $biscuitQuantity = $data['product_quantities'][$key];

        $stmt =$pdo->prepare('INSERT INTO orders_has_biscuits (orders_id, orders_users_id, orders_users_userTypes_id, biscuits_id, weight, quantity) 
                                VALUES (:orderID, :userID, :userType, :biscuitID, 500, :biscuitQuantity)');


        $stmt->bindParam(':orderID', $orderID);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':userType', $userType);
        $stmt->bindParam(':biscuitID', $biscuitID);
        $stmt->bindParam(':biscuitQuantity', $biscuitQuantity);
        $stmt->execute();
    }


}


