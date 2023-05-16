<?php

/**
 * @File : index.php
 * @Brief : Calls functions from controllers to display the right pages
 * @Author : Created by Shanshe GUNDISHVILI
 * @Author : Updated by Shanshe GUNDISHVILI
 * @Version : 17-02-2021
 */ 

require "controler/annonce.php";
require "controler/users.php";
require "controler/navigation.php";

session_start();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'home' :
            home();
            break;
        case 'newsletter' :
            newsletter();
            break;
        case 'subscribe' :
            subscribe();
            break;
        case 'login' :
            login($_POST);
            break;
        case 'logout' :
            logout();
            break;
        case 'register' :
            register($_POST);
            break;
        case 'createAd' :
            createAd();
            break;
        case 'contact' :
            contact();
            break;
        case 'albums' :
            albums();
            break;
        case 'album' :
            album($_GET['id']);
            break;
        default :
            lost();
    }
} else {
    home();
}