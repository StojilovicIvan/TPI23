<?php

session_start();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'home' :
            require "controler/navigation.php";
            home();
            break;
        case 'shop' :
            require "controler/navigation.php";
            shop();
            break;
        case 'detailBiscuit' :
            require "controler/biscuits.php";
            detailBiscuit($_GET['id']);
            break;
        case 'register' :
            require "controler/users.php";
            register($_POST);
            break;
        case 'login' :
            require "controler/users.php";
            login($_POST);
            break;
        case 'logout' :
            require "controler/users.php";
            logout();
            break;
        case 'cart' :
            require "controler/navigation.php";
            cart();
            break;
        case 'addToCart' :
            require "controler/biscuits.php";
            addToCart($_POST);
            break;
        default :
            require "controler/navigation.php";
            lost();
    }
} else {
    require "controler/navigation.php";
    home();
}