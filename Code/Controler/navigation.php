<?php

function home(){
    require "model/biscuitManagement.php";
    $biscuits = databaseToHome();
    require "view/home.php";
}

function shop(){
    require "model/biscuitManagement.php";
    $biscuits = databaseToShop();
    require "view/shop.php";
}

function cart(){
    if(!isset($_SESSION['panier'])){
        $emptyCart = null;
    }
    else {
        $emptyCart = 1;
        $ids = array_keys($_SESSION['panier']);
        if (empty($ids)) {
            echo "Votre panier est vide";
        } else {
            require "data/dbconnector.php";

            $pdo = dbConnect();

            $produits = array();
            foreach ($ids as $id) {
                $stmt = $pdo->prepare("SELECT id, name, price FROM biscuits WHERE id = :id");
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $produit = $stmt->fetch(PDO::FETCH_ASSOC);
                $produit['quantity'] = $_SESSION['panier'][$id];
                $produits[] = $produit;
            }
            $total = null;
            require "view/cart.php";
        }
    }
    require "view/cart.php";
}
