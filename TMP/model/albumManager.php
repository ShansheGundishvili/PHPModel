<?php
/**
 * @author : Shanshe Gundishvili
 * @date : 16/05/2023
 * @Goal : to check if login is correct, provided by user
 */

function getAlbums(){
        require "usersManager.php";
        $query = "SELECT id, name, details FROM albums;";
        require "dbConnector.php";
        $result=executeQuerySelect($query);

        return $result;
}

function getAlbum($id){
    require "usersManager.php";
    $userID = getUserID($_SESSION['userEmailAddress']);
    $query = "SELECT id, name, users.username FROM albums INNER JOIN users  WHERE id=". $id .";";
    require "dbConnector.php";
    $result=executeQuerySelect($query);

    return $result;
}

function saveImages($userID){
    $v = ',';
    $s = '"';

    $countFiles = count($_FILES['inputPictures']['name']);
    $queryId = "SELECT MAX(id) FROM albums WHERE users_id =" . $userID . ";";
    $albumId = executeQuerySelect($queryId);
    // Looping all files
    for ($i = 0; $i < $countFiles; $i++) {

        $ext = pathinfo($_FILES['inputPictures']['name'][$i], PATHINFO_EXTENSION);
        $filename = $userID . "-" . $albumId[0][0]. "-" . $i;
        $fileDest = 'data/images/' . $filename . "." . $ext;
        // Upload file
        move_uploaded_file($_FILES['inputPictures']['tmp_name'][$i], $fileDest);

        $query = "INSERT INTO images (name, albums_id) VALUES (" . $s . $fileDest . $s . ", " . $albumId[0][0] . ");";

        executeQueryInsert($query);
    }
}

function createAlbumM($name, $details, $userID){
    $sep = '\'';
    $query = "INSERT INTO albums (name, description, users_id) VALUES (". $sep . $name . $sep . ", ". $sep . $details . $sep . ", ". $userID . ")";

}