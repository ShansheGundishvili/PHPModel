<?php
//<user>
//<album>
    //<createAlbum>
function createAlbumView(){
    require_once "view/createAlbum.php";
}

function createAlbum($data){

    try {
        if(isset($data)){
            require_once "model/usersManager.php";
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
    //</createAlbum>

    //<modifyAlbum>
function modifyAlbum($id){

    require_once "model/albumManager.php";
    $album = getAlbum($id);
    $images = getImages($id);
    require_once "view/albumModify.php";

}


function deleteImage($id, $albumID)
{
    require_once "model/albumManager.php";
    deleteImageM($id);
    modifyAlbum($albumID);

}

function addImage($albumId){
    require_once "model/albumManager.php";
    require_once "model/usersManager.php";
    $userId = getUserID($_SESSION['userEmailAddress']);
    saveImages($userId, $albumId);
    modifyAlbum($albumId);
}
    //</modifyAlbum>

function albums()
{
    require_once "model/albumManager.php";
    $albums = getAlbums();
    require_once "view/albums.php";
}

function album($id){

    require_once "model/albumManager.php";
    $album = getAlbum($id);
    $images = getImages($id);
    require_once "view/album.php";

}
//</album>
//</user>