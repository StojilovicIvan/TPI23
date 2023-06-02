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
            addToCart();
            break;
        case 'validCart' :
            require "controler/biscuits.php";
            validCart($_POST);
            break;
        case 'profil' :
            require "controler/users.php";
            profil();
            break;
        case 'modifUserForm' :
            require "controler/users.php";
            modifUserForm();
            break;
        case 'modifUser' :
            require "controler/users.php";
            modifUser($_POST);
            break;
        case 'order' :
            require "controler/users.php";
            order($_GET['id']);
            break;
        case 'adminPage' :
            require "controler/users.php";
            adminPage();
            break;
        case 'formBiscuit' :
            require "controler/biscuits.php";
            formBiscuit();
            break;
        case 'addBiscuit' :
            require "controler/biscuits.php";
            addBiscuit($_POST);
            break;
        case 'formModifBiscuit' :
            require "controler/biscuits.php";
            formModifBiscuit($_GET['id']);
            break;
        case 'modifyBiscuit' :
            require "controler/biscuits.php";
            modifyBiscuit($_POST);
            break;
        case 'disableBiscuit' :
            require "controler/biscuits.php";
            disableBiscuit($_GET['id']);
            break;
        case 'enableBiscuit' :
            require "controler/biscuits.php";
            enableBiscuit($_GET['id']);
            break;
        case 'increaseQuantity' :
            require "controler/biscuits.php";
            increaseQuantity($_GET['id']);
            break;
        case 'decreaseQuantity' :
            require "controler/biscuits.php";
            decreaseQuantity($_GET['id']);
            break;
        case 'deleteBiscuit' :
            require "controler/biscuits.php";
            deleteBiscuit($_GET['id']);
            break;
        case 'filter' :
            require "controler/navigation.php";
            filter($_POST);
            break;
        default :
            require "controler/navigation.php";
            lost();
    }
} else {
    require "controler/navigation.php";
    home();
}