<?php

function detailBiscuit($id){
    require "model/biscuitManagement.php";
    $details = databaseToDetail();

    foreach ($details as $detailLister) {
        if ($detailLister['id'] == $id){
            $detail = $detailLister;
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

function validCart(){

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

function deleteBiscuit(){

}

