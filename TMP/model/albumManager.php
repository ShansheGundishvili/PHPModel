<?php
/**
 * @author : Shanshe Gundishvili
 * @date : 16/05/2023
 * @Goal : to check if login is correct, provided by user
 */
//<user>
//<album>
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




//</createAlbum>
function createAlbumM($name, $details, $userID){
    $sep = '\'';
    $query = "INSERT INTO albums (name, details, users_id) VALUES (". $sep . $name . $sep . ", ". $sep . $details . $sep . ", ". $userID['id'] . ")";
    executeQueryInsert($query);


    saveImages($userID);
}
//</createAlbum>

function deleteImageM($id){
    $query = "DELETE FROM images WHERE images.id = ". $id . ";";
    require_once "dbConnector.php";
    executeQueryInsert($query);
}

function deleteAlbumM($id){
        require_once "model/dbConnector.php";
        $sep = '\'';
        $queryImage = "DELETE FROM images WHERE albums_id =" . $sep . $id . $sep . ";";
        $queryResult = executeQueryInsert($queryImage);
        $queryAlbum = "DELETE FROM albums WHERE id =" . $sep . $id . $sep . ";";
        $queryResult = executeQueryInsert($queryAlbum);

        return 1;

}


//<modifyAlbum>

function getAlbumUserID($id){
    $query = "SELECT users_id FROM albums WHERE id = ". $id . ";";
    require_once "dbConnector.php";
    $result = executeQuerySelect($query);
    return $result;
}


function getImages($id){
    $sep = '\'';
    $query = "SELECT id, path FROM images WHERE albums_id =". $id . ";" ;
    require_once "model/dbConnector.php";
    $result = executeQuerySelect($query);
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
    for ($i = 0; $i < $countFiles; $i++) {
        $additionerInside = $i+$additioner[0][0];
        $ext = pathinfo($_FILES['inputPictures']['name'][$i], PATHINFO_EXTENSION);
        $filename = $userID['id'] . "-" . $albumId[0][0]. "-" . $additionerInside;
        $fileDest = 'data/images/' . $filename . "." . $ext;
        // Upload file
        move_uploaded_file($_FILES['inputPictures']['tmp_name'][$i], $fileDest);

        $query = "INSERT INTO images (path, albums_id) VALUES (" . $s . $fileDest . $s . ", " . $albumId[0][0] . ");";

        executeQueryInsert($query);
    }
}
function countAlbumIdImages($albumId){

    $query = "SELECT COUNT(id) FROM images WHERE albums_id =" . $albumId . ";";
    $result = executeQuerySelect($query);

    return $result;
}




//</album>
//</user>