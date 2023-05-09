<?php

function home(){
    require "model/biscuitManagement.php";
    $biscuits = databaseToShop();
    require "view/home.php";
}

function shop(){
    require "model/biscuitManagement.php";
    $biscuits = databaseToShop();
    require "view/shop.php";
}

function cart(){
    require "view/cart.php";
}
