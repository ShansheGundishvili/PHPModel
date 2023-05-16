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