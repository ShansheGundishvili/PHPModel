<?php

/**
 * @File : index.php
 * @Brief : Calls functions from controllers to display the right pages
 * @Author : Created by Shanshe GUNDISHVILI
 * @Author : Updated by Shanshe GUNDISHVILI
 * @Version : 17-02-2021
 */ 

require "controler/album.php";
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
        case 'feedback' :
            feedback($_POST);
            break;
        case 'albums' :
            albums();
            break;
        case 'album' :
            album($_GET['id']);
            break;
        case 'registerView' :
            registerView();
            break;
        case 'modifyUserView' :
            modifyUserView();
            break;
        case 'modifyUser' :
            modifyUser($_POST);
            break;
        case 'modifyPassword' :
            modifyUserPassC($_POST);
            break;
        case 'createAlbumView' :
            createAlbumView();
            break;
        case 'createAlbum' :
            createAlbum($_POST);
            break;
        case 'modifyAlbum' :
            modifyAlbum($_GET['id']);
            break;
        case 'deleteImage' :
            deleteImage($_GET['id'], $_GET['albumID']);
            break;
        case 'addImage' :
            addImage($_GET['albumId']);
            break;
        default :
            lost();
    }
} else {
    home();
}