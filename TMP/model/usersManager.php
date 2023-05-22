<?php
/**
 * @author : Shanshe Gundishvili
 * @date : 20/05/2021
 * @Goal : to treat user's information
 */

/**
 * @author : Shanshe Gundishvili
 * @date : 20/05/2021
 * @Goal : to check if login is correct, provided by user
 */
function isLoginCorrect($userEmailAddress, $userPsw)
{
    $result = false;


    $sep = '\'';
    //requete pour recuperer le psw de la bd du login concerné
    $loginQuery = 'SELECT password FROM users WHERE email=' . $sep . $userEmailAddress . $sep . ";";

    require "model/dbConnector.php";

    $queryResult = executeQuerySelect($loginQuery);

    if (isset($queryResult[0]['password'])) {

        //Recuperation du password de la BD
        $userPswHash = $queryResult[0]['password'];
        //Comparaison avec le password du formulaire
        $result = password_verify($userPsw, $userPswHash);
    }

    return $result;
}


/**
 * @author : Shanshe Gundishvili
 * @date : 20/05/2021
 * @Goal : to register new account
 */
function registerNewAccount($userEmailAddress, $userPsw, $username, $userNumber, $userAddress, $userFirstname, $userLastname)
{

    $result = false;
    $sep = '\'';
    $userHashPsw = password_hash($userPsw, PASSWORD_DEFAULT);
    $registerQuery = "INSERT INTO users (email, password, username, number, address, firstname, lastname) VALUES(" . $sep . $userEmailAddress . $sep . ", " . $sep . $userHashPsw . $sep . ", " . $sep . $username . $sep .", " . $sep . $userNumber . $sep . ", " . $sep . $userAddress . $sep . ", " . $sep . $userFirstname . $sep . ", " . $sep . $userLastname . $sep .")";

    require_once "model/dbConnector.php";
    $queryResult = executeQueryInsert($registerQuery);

    $result = 1;
    return $result;
}

function getUserID($userEmailAddress)
{

    $sep = '\'';
    $userTypeQuery = 'SELECT id FROM users WHERE email=' . $sep . $userEmailAddress . $sep . ";";

    require_once "model/dbConnector.php";
    $queryResult = executeQuerySelect($userTypeQuery);

    return $queryResult[0];
}


/**
 * @author : Shanshe Gundishvili
 * @date : 20/05/2021
 * @Goal : to check if register information is right
 */
function checkRegister($email)
{

    $sep = '\'';
    $userTypeQuery = 'SELECT email FROM users WHERE email=' . $sep . $email . $sep . ";";

    require_once "model/dbConnector.php";
    $queryResult = executeQuerySelect($userTypeQuery);

    return $queryResult;

}



function checkUsername($username)
{

    $sep = '\'';
    $userTypeQuery = 'SELECT username FROM users WHERE username=' . $sep . $username . $sep . ";";

    require_once "model/dbConnector.php";
    $queryResult = executeQuerySelect($userTypeQuery);

    return $queryResult;

}

function checkUsernameUpdate($username)
{

    $sep = '\'';
    $userTypeQuery = 'SELECT username FROM users WHERE NOT  username =' . $sep . $username . $sep . ";";

    require_once "model/dbConnector.php";
    $queryResult = executeQuerySelect($userTypeQuery);

    return $queryResult;

}

/**
 * @author : Shanshe Gundishvili
 * @date : 20/05/2021
 * @Goal : to modify user's password
 */
function modifyUserPassM($email, $password)
{

    $result = false;
    $sep = '\'';
    $userHashPsw = password_hash($password, PASSWORD_DEFAULT);
    $Query = "UPDATE users SET password =" . $sep . $userHashPsw . $sep . " WHERE email =" . $sep . $email . $sep . ";";
    require_once "model/dbConnector.php";
    $queryResult = executeQueryInsert($Query);

    $result = 1;
    return $result;
}


/**
 * @author : Shanshe Gundishvili
 * @date : 20/05/2021
 * @Goal : to modify user's Email
 */
function modifyUserEmailM($FEmail, $NEmail)
{

    $result = false;
    $sep = '\'';
    $Query = "UPDATE users SET email =" . $sep . $NEmail . $sep . " WHERE email =" . $sep . $FEmail . $sep . ";";
    require_once "model/dbConnector.php";
    $queryResult = executeQueryInsert($Query);

    $result = 1;
    return $result;
}

function getSubscribeM($email){

    $result = false;
    $sep = '\'';

    $query = 'SELECT subscriber FROM users WHERE email=' . $sep . $email . $sep . ";";
    require_once "model/dbConnector.php";
    $queryResult = executeQuerySelect($query);


    return $queryResult;

}

function subscribeM($email): void
{

    $subscribed = getSubscribeM($email);

    if ($subscribed[0][0] == 0){
        $res = 1;
    }else{
        $res = 0;
    }

    $sep = '\'';
    $Query = "UPDATE users SET subscriber =" . $sep . $res . $sep . " WHERE email =" . $sep . $email . $sep . ";";
    require_once "model/dbConnector.php";
    $queryResult = executeQueryInsert($Query);
}


function feedbackM($name, $email, $message){

    $sep = '\'';
    $Query = "insert into users (Name, Email, Details) VALUES =" . $sep . $name . $sep . ", " . $sep . $email . $sep . ", " . $sep . $message . $sep . ";";
    require_once "model/dbConnector.php";
    $queryResult = executeQueryInsert($Query);
}

function getUserInfo($email){

    $sep = '\'';
    $Query = "SELECT email, username, NUMBER, address, firstname, lastname FROM users WHERE email =" . $sep . $email . $sep . ";";
    require_once "model/dbConnector.php";
    $queryResult = executeQuerySelect($Query);
    return $queryResult[0];

}

function updateAccount($userEmailAddress, $username, $userNumber, $userAddress, $userFirstname, $userLastname, $actualEmail){

    $sep = '\'';

    $query = "UPDATE users SET email =" . $sep . $userEmailAddress . $sep . ", username =". $sep . $username . $sep .", number=". $sep . $userNumber . $sep . ", address=". $sep . $userAddress . $sep . ", firstname =". $sep . $userFirstname . $sep . ", lastname =" . $sep . $userLastname . $sep ." WHERE email =" . $sep . $actualEmail . $sep . ";";
    $queryResult = executeQueryInsert($query);
    return 1;
}