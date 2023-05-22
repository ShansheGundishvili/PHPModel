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


function registerView()
{
    require "view/Register.php";
}


