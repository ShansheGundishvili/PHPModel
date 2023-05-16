<?php

/**
 * @File : navigation.php
 * @Brief : Uses functions to display pages
 * @Author : Created by Shanshe GUNDISHVILI
 * @Author : Updated by Kevin VAUCHER
 * @Version : 17-02-2021
 */


// Calls home page
function home()
{
        require "view/home.php";
}

// Calls about page
function newsletter()
{
    require "view/Newsletter.php";
}

// Calls the default lost page
function lost()
{
    require "view/lost.php";
}

// Calls the page to create an ad
function createAd()
{
    require "view/createAd.php";
}

// Calls home page
function contact()
{
    require "view/contact.php";
}


function albums()
{
    require "model/albumManager.php";
    $albums = getAlbums();
    require "view/albums.php";
}

function album($id){

    require "model/albumManager.php";
    $album = getAlbum($id);
    require "view/album.php";

}

function registerView()
{
    require "view/Register.php";
}