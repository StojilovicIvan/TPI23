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

function addToCart($id){
    if(!isset($_SESSION['panier'])){
        $_SESSION['panier'] = array();
    }

    $biscuitID = $id;

    if(isset($_SESSION['panier'][$biscuitID])){
        $_SESSION['panier'][$biscuitID]++;
    }
    else{
        $_SESSION['panier'][$biscuitID]+1;
    }

}
