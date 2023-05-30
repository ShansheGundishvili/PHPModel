<?php /**
 * @file users.php
 * @@brief     This file is the rooter managing the link with controllers.
 * @param $loginRequest
 * @author    Updated by Shanshe Gundishvili
 * @version   10.05.2021
 */
//</users>
function  login($loginRequest)
{
    $error = 0;
    if (isset($loginRequest['inputUserEmailAddress']) && isset($loginRequest['inputUserPsw'])) {
        $userEmailAddress = $loginRequest['inputUserEmailAddress'];
        $userPsw = $loginRequest['inputUserPsw'];

        //tester les donnees di formulaire dans le modele

        require "model/usersManager.php";
        if (isLoginCorrect($userEmailAddress, $userPsw)) {
            $_SESSION['userEmailAddress'] = $userEmailAddress;
            $error = 0;
            require "view/home.php";

        } else {
            $error = 1;
            require "view/login.php";
        }
    } else { //donnes non remplies

        require $_SERVER['DOCUMENT_ROOT'] . "/view/login.php";
    }
}



function logout()
{
    $_SESSION = array();
    session_destroy();
    require "view/home.php";
}

//<modifyUser>
    //<modifyPassword>
function modifyUserPassC($request)
{
    $endToken = array();
    if (isset($_SESSION['userEmailAddress']) && isset($request['inputUserPsw']) && isset($request['inputUserPswRepeat'])) {
        if ($request['inputUserPsw'] == $request['inputUserPswRepeat']) {
            $registerPswErrorMessage = null;
            require_once "model/usersManager.php";
            if (modifyUserPassM($_SESSION['userEmailAddress'], $request['inputUserPsw'])) {
                home();
            } else {
                $ChPswErrorMessage = "our developers don't know the reason of this error";
                require_once "view/register.php";
            }
        } else {
            $ChPswErrorMessage = 1;
        }
    } else { //donnes non remplies

        require "view/modifUserInfo.php";
    }
}
    //</modifyPassword>

    //<modifyUserInfo>
function modifyUser($request)
{
    try {
        if (isset($request['inputUserEmailAddress']) ) {

            $userEmailAddress = $request['inputUserEmailAddress'];
            $username = $request['inputUsername'];
            $userNumber = $request['inputNumber'];
            $userAddress = $request['inputAddress'];
            $userFirstname = $request['inputFirstname'];
            $userLastname = $request['inputLastname'];

            require_once "model/usersManager.php";
            $check = checkRegister($userEmailAddress);
            if (!(isset($check[0][0]))) {
                $checkUsername = checkUsername($username);
                if (!(isset($checkUsername[0][0]))) {
                    $registerErrorMessage = null;
                    require_once "model/usersManager.php";
                    if (updateAccount($userEmailAddress, $username, $userNumber, $userAddress, $userFirstname, $userLastname, $_SESSION['userEmailAddress'])) {
                        $_SESSION['userEmailAddress'] = $userEmailAddress;
                        require_once "navigation.php";
                        home();

                    } else {
                        $registerErrorMessage = "our developers don't know the reason of this error";
                        modifyUserView($registerErrorMessage);              }
                } else {
                    $registerErrorMessage = "Username already in use";
                    modifyUserView($registerErrorMessage);          }
            }
            $registerErrorMessage = "Email already exists";
            modifyUserView($registerErrorMessage);
        }
    } catch (ModelDataBaseException $ex) {
        $registerErrorMessage = "we are dead";
        return "view/lost.php";
    }
    require "view/home.php";
}
    //</modifyUserInfo>

function modifyUserView($errorMessage = ""){
    require_once "model/usersManager.php";
    $userInfo = getUserInfo($_SESSION['userEmailAddress']);
    require_once "view/modifyUser.php";
}
    //</modifyUser>

    //<newsletter>
function subscribe(){


    require_once "model/usersManager.php";
    subscribeM($_SESSION['userEmailAddress']);
    require_once "view/home.php";
}
function newsletter()
{
    require "model/usersManager.php";
    $sub = getSubscribeM($_SESSION['userEmailAddress']);
    require "view/Newsletter.php";
}
    //</newsletter>


    //<register>
function register($registerRequest)
{
    try {
        if (isset($registerRequest['inputUserEmailAddress']) && isset($registerRequest['inputUserPsw']) && isset($registerRequest['inputUserPswRepeat']) ) {

            $userEmailAddress = $registerRequest['inputUserEmailAddress'];
            $userPsw = $registerRequest['inputUserPsw'];
            $userPswRepeat = $registerRequest['inputUserPswRepeat'];
            $username = $registerRequest['inputUsername'];
            $userNumber = $registerRequest['inputNumber'];
            $userAddress = $registerRequest['inputAddress'];
            $userFirstname = $registerRequest['inputFirstname'];
            $userLastname = $registerRequest['inputLastname'];

            require_once "model/usersManager.php";
            $check = checkRegister($userEmailAddress);
            if (!(isset($check[0][0]))) {
                $checkUsername = checkUsername($username);
                if (!(isset($checkUsername[0][0]))) {
                    $registerErrorMessage = null;
                    //check passwords are same
                    if ($userPsw == $userPswRepeat) {
                        $registerPswErrorMessage = null;
                        require_once "model/usersManager.php";
                        if (registerNewAccount($userEmailAddress, $userPsw, $username, $userNumber, $userAddress, $userFirstname, $userLastname)) {
                            $_SESSION['userEmailAddress'] = $userEmailAddress;
                            require_once "navigation.php";
                            home();

                        } else {
                            $registerErrorMessage = "our developers don't know the reason of this error";
                            require_once "view/register.php";
                        }
                    } else {
                        $registerPswErrorMessage = "passwords are different";
                        require_once "view/register.php";
                    }
                } else {
                    $registerErrorMessage = "Username already in use";
                    require_once "view/register.php";
                }
            }
            $registerErrorMessage = "Email already exists";
            require_once "view/register.php";
        }
    } catch (ModelDataBaseException $ex) {
        $registerErrorMessage = "we are dead";
        return "view/lost.php";
    }
}

function registerView()
{
    require "view/Register.php";
}
    //</register>
//</users>


//<contact>
function contact()
{
    require "view/contact.php";
}



function feedback($request)
{

    require "model/usersManager.php";
    feedbackM($request['name'], $request['email'], $request['message']);
    require "view/home.php";
}
//</contact>