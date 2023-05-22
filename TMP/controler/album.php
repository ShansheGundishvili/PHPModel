<?php
/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to link view and model of articles
 */

function createAlbumView(){
    require "view/createAlbum.php";
}

function createAlbum($data){

    try {
        if(isset($data)){
            $userID = getUserID($_SESSION['userEmailAddress']);
            require_once "model/albumManager.php";
            createAlbumM($data['name'], $data['details'], $userID);


        }else{
            require_once "view/createAlbum.php";

        }
    }catch (ModelDataExecption $ex){
    } finally {
        home();
    }

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
