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
                $loginErrorMessage = "L'identifiant et/ou le mot ne passe sont incorrectes";
                require "view/login.php";
            }
        }
        else{
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