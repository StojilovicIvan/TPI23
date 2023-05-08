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
        default :
            require "controler/navigation.php";
            lost();
    }
} else {
    require "controler/navigation.php";
    home();
}