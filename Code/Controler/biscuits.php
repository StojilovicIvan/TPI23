<?php

function detailBiscuit($id){
    require "model/biscuitManagement.php";
    $details = databaseToDetail();

    foreach ($details as $detailLister) {
        if ($detailLister['id'] == $id){
            $detail = $detailLister;
            $allergies = biscuitAllergy($detail['id']);
        }
    }

    require "view/detailBiscuit.php";

}

function addToCart(){

    if(!isset($_SESSION['panier'])){
        $_SESSION['panier'] = array();
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    if(isset($_SESSION['panier'][$id])){
        $_SESSION['panier'][$id] ++;
    }
    else{
        $_SESSION['panier'][$id] = 1;
    }
    require "model/biscuitManagement.php";
    $biscuits = databaseToShop();
    require "view/shop.php";

}

function validCart($data){
    require "model/biscuitManagement.php";
    require "model/userManagement.php";
    $users = getUsers();
    foreach ($users as $user){
        if($user['email'] == $_SESSION['email']){
            $id = $user['id'];
            $type = $user['userTypes_id'];
        }
    }
    cartToDatabase($data, $id, $type);
    unset($_SESSION['panier']);
    $biscuits = databaseToShop();
    require "view/home.php";
}

function formBiscuit(){
    require "view/formBiscuit.php";
}

function addBiscuit($data){
    require "model/biscuitManagement.php";
    biscuitToDatabase($data);
    $biscuits = databaseToAdmin();
    require "view/adminPage.php";
}

function formModifBiscuit($data){
    require "model/biscuitManagement.php";
    $biscuits = databaseToAdmin();
    foreach ($biscuits as $detailBiscuit) {
        if ($detailBiscuit['id'] == $data){
            $biscuit = $detailBiscuit;
        }
    }
    require "view/modifBiscuit.php";
}

function modifyBiscuit($data){
    require "model/biscuitManagement.php";
    updateBiscuit($data);
    $biscuits = databaseToAdmin();
    require "view/adminPage.php";
}

function disableBiscuit($id){
    require "model/biscuitManagement.php";
    disableBiscuitDatabase($id);
    $biscuits = databaseToAdmin();
    require "view/adminPage.php";
}

function enableBiscuit($id){
    require "model/biscuitManagement.php";
    enableBiscuitDatabase($id);
    $biscuits = databaseToAdmin();
    require "view/adminPage.php";
}

function increaseQuantity($id){

    foreach ($_SESSION['panier'] as $key => $quantity) {
        if ($key == $id) {
            $_SESSION['panier'][$key]++;

            break;
        }
    }
    require "controler/navigation.php";
    cart();
    require "view/cart.php";

}

function decreaseQuantity($id){

    foreach ($_SESSION['panier'] as $key => $quantity) {
        if ($key == $id) {
            $_SESSION['panier'][$key]--;
            if($_SESSION['panier'][$id] <= 0){
                unset($_SESSION['panier'][$id]);
            }
            break;
        }
    }
    require "controler/navigation.php";
    cart();
    require "view/cart.php";

}

function deleteBiscuit($id){

    foreach ($_SESSION['panier'] as $key => $quantity) {
        if ($key == $id) {
            unset($_SESSION['panier'][$id]);
            break;
        }
    }

    require "controler/navigation.php";
    cart();
    require "view/cart.php";

}

