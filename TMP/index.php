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
        //<user>
        //<newsletter>
        case 'newsletter' :
            newsletter();
            break;
        case 'subscribe' :
            subscribe();
            break;
        //</newsletter>
        case 'login' :
            login($_POST);
            break;
        case 'logout' :
            logout();
            break;
        //<register>
        case 'register' :
            register($_POST);
            break;
        case 'registerView' :
            registerView();
            break;
        //</register>
        //<modifyUser>
        case 'modifyUserView' :
            modifyUserView();
            break;
        //<modifyUserInfo>
        case 'modifyUser' :
            modifyUser($_POST);
            break;
        //<modifyUserInfo>
        //</modifyUserPassword>
        case 'modifyPassword' :
            modifyUserPassC($_POST);
            break;
        //</modifyPassword>
        case 'deleteUser' :
            deleteAccount($_SESSION['userEmailAddress']);
        break;
        //</modifyUser>
        //<album>
        case 'albums' :
            albums();
            break;
        case 'album' :
            album($_GET['id']);
            break;
        //<createAlbum>
        case 'createAlbumView' :
            createAlbumView();
            break;
        case 'createAlbum' :
            createAlbum($_POST);
            break;
        //</createAlbum>
        //<modifyAlbum>
        case 'modifyAlbum' :
            modifyAlbum($_GET['id']);
            break;
        case 'deleteImage' :
            deleteImage($_GET['id'], $_GET['albumId']);
            break;
        case 'addImage' :
            addImage($_GET['albumId']);
            break;
        case 'deleteAlbum' :
            deleteAlbum($_GET['id']);
            break;
        //</modifyAlbum>
        //</album>
        //</user>

        //<contact>
        case 'contact' :
            contact();
            break;
        case 'feedback' :
            feedback($_POST);
            break;
        //</contact>
        default :
            lost();
    }
} else {
    home();
}