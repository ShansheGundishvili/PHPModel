<?php
/**
 * @author : Shanshe Gundishvili
 * @date : 16/05/2023
 * @Goal : to check if login is correct, provided by user
 */

function getAlbums(){
        require "usersManager.php";
        $userID = getUserID($_SESSION['userEmailAddress']);
        $query = "SELECT id, name, level FROM quizes WHERE users_id=". $userID[0] .";";
        $result=executeQuerySelect($query);

        return $result;
}

function getAlbum($id){
    require "usersManager.php";
    $userID = getUserID($_SESSION['userEmailAddress']);
    $query = "SELECT id, name, users.username FROM albums INNER JOIN users  WHERE id=". $id .";";
    $result=executeQuerySelect($query);

    return $result;
}