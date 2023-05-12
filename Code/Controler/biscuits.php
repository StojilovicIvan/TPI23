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

    require "view/home.php";

    //header("Location:view/cart.php");

}

