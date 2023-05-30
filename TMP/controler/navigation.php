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