<?php

function home(){
    require "model/biscuitManagement.php";
    $biscuits = databaseToHome();
    require "view/home.php";
}

function shop(){
    require "model/biscuitManagement.php";
    $biscuits = databaseToShop();
    $filtre = null;
    require "view/shop.php";
}

function filter($option){

    require "model/biscuitManagement.php";

    if($option['filter'] == "all"){
        $biscuits = databaseToShop();
        $filtre = $option['filter'];
        require "view/shop.php";
    }
    else{
        $biscuits = databaseToFilter($option);
        $filtre = $option['filter'];
        require "view/shop.php";
    }

}

function cart(){
    if(!isset($_SESSION['panier'])){
        $emptyCart = null;
    }
    elseif ($_SESSION['panier'] != null) {
        $emptyCart = 1;
        $ids = array_keys($_SESSION['panier']);
        if (empty($ids)) {
            echo "Votre panier est vide";
        } else {
            require "data/dbConnector.php";

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

        }require "view/cart.php";}
    else{
    $emptyCart = null;
    }
    require "view/cart.php";
}

function lost(){
    require "view/lost.php";
}


