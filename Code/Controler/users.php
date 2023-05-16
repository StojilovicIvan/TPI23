<?php


function register($registerRequest){

    try{

        if(isset($registerRequest['email']) && isset($registerRequest['password']) && isset($registerRequest['passVerif'])){
            $userEmail = $registerRequest['email'];
            $userPass = $registerRequest['password'];
            $userPasVerif = $registerRequest['passVerif'];
            if($userPass == $userPasVerif){
                require_once "model/userManagement.php";
                if (registerAccount($registerRequest, $userEmail, $userPass)){
                    $_SESSION['email'] = $userEmail;
                    $registerErrorMessage = null;
                    require "view/home.php";
                }
                else{
                    $registerErrorMessage = "Une erreur est survenue lors de l'inscription";
                    require "view/register.php";
                }
            }
            else{
                $registerErrorMessage = "Mots de passe non identique";
                require "view/register.php";
            }
        }
        else{
            $registerErrorMessage = null;
            require "view/register.php";
        }
    }
    catch (ModelDataBaseException $ex){
        $registerErrorMessage = "Nous rencontrons un problème technique. Désoler du dérangement.";
        require "view/register.php";
    }


}

function login($loginRequest){

    try{
        if (isset($loginRequest['email']) && isset($loginRequest['password'])) {
            $userEmail = $loginRequest['email'];
            $userPassword = $loginRequest['password'];

            require_once "model/userManagement.php";
            if (isLoginCorrect($userEmail, $userPassword)) {
                $loginErrorMessage = null;
                $_SESSION['email'] = $userEmail;
                require "view/home.php";
            }
            else {
                $loginErrorMessage = "L'identifiant et/ou le mot de passe sont incorrectes";
                require "view/login.php";
            }
        }
        else{
            $loginErrorMessage = null;
            require "view/login.php";
        }
    }
    catch (ModelDataBaseException $ex) {
        $loginErrorMessage = "Oops... On dirait qu'il y a un problème technique.";
        require "view/login.php";
    }
}

function logout()
{
    $_SESSION = array();
    session_destroy();
    require "view/home.php";
}

function profil(){
    require_once "model/userManagement.php";
    $userDetails = getUsers();

    foreach ($userDetails as $userDetail) {
        if ($userDetail['email'] == $_SESSION['email']){
            $detail = $userDetail;
        }
    }

    $id = $detail['id'];

    $allergies = getAllergies($id);

    require "view/profil.php";
}

function modifUserForm(){
    require "model/userManagement.php";
    $userDetails = getUsers();

    foreach ($userDetails as $userDetail) {
        if ($userDetail['email'] == $_SESSION['email']){
            $detail = $userDetail;
        }
    }

    require "view/modifProfil.php";
}

function modifUser($modifRequest){
    require "model/userManagement.php";
    userDetailToDatabase($modifRequest);
    profil();
    require "view/profil.php";
}

function order(){
    require "view/orderList.php";
}

function adminPage(){
    require "model/biscuitManagement.php";
    $biscuits = databaseToAdmin();
    require "view/adminPage.php";
}