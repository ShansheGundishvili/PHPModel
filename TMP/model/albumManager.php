<?php
/**
 * @author : Shanshe Gundishvili
 * @date : 16/05/2023
 * @Goal : to check if login is correct, provided by user
 */

function getAlbums(){
        require_once "usersManager.php";
        $query = "SELECT albums.id, albums.name, albums.details, users.username, users.email FROM albums INNER JOIN users Where users.id = albums.users_id;";
        require_once "dbConnector.php";
        $result=executeQuerySelect($query);

        return $result;
}

function getAlbum($id){
    require_once "usersManager.php";
    $userID = getUserID($_SESSION['userEmailAddress']);
    $query = "SELECT albums.id, albums.name, albums.details, users.email FROM albums INNER JOIN users ON albums.users_id = users.id WHERE albums.id =". $id . ";";
    require_once "dbConnector.php";
    $result=executeQuerySelect($query);

    return $result;
}

function saveImages($userID, $albumIdSetter = ""){
    $s = '"';
    $albumId[0][0] = $albumIdSetter;
    $countFiles = count($_FILES['inputPictures']['name']);
    if($albumIdSetter == ""){
        $queryId = "SELECT MAX(id) FROM albums WHERE users_id =" . $userID['id'] . ";";
        $albumId = executeQuerySelect($queryId);
    }

    $additioner = countAlbumIdImages($albumId[0][0]);
    // Looping all files
    for ($i = $additioner; $i < $countFiles+$additioner; $i++) {

        $ext = pathinfo($_FILES['inputPictures']['name'][$i], PATHINFO_EXTENSION);
        $filename = $userID['id'] . "-" . $albumId[0][0]. "-" . $i;
        $fileDest = 'data/images/' . $filename . "." . $ext;
        // Upload file
        move_uploaded_file($_FILES['inputPictures']['tmp_name'][$i], $fileDest);

        $query = "INSERT INTO images (path, albums_id) VALUES (" . $s . $fileDest . $s . ", " . $albumId[0][0] . ");";

        executeQueryInsert($query);
    }
}

function createAlbumM($name, $details, $userID){
    $sep = '\'';
    $query = "INSERT INTO albums (name, details, users_id) VALUES (". $sep . $name . $sep . ", ". $sep . $details . $sep . ", ". $userID['id'] . ")";
    executeQueryInsert($query);


    saveImages($userID);
}

function getImages($id){
    $sep = '\'';
    $query = "SELECT id, path FROM images WHERE albums_id =". $id . ";" ;
    require_once "model/dbConnector.php";
    $result = executeQuerySelect($query);
    return $result;
}

function deleteImageM($id){
    $query = "DELETE FROM images WHERE images.id = ". $id . ";";
    executeQueryInsert($query);
}


function countAlbumIdImages($albumId){

    $query = "SELECT COUNT(id) FROM images WHERE albums_id =" . $albumId . ";";
    $result = executeQuerySelect($query);

    return $result;
}