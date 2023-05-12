<?php

function getUsers(){
    require_once "data/dbconnector.php";

    $pdo = dbConnect();

    $stmt =$pdo->query("SELECT id, lastname, firstname, street, number, postalCode, city, email, phoneNumber, password, userTypes_id FROM users");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllergies($id){
    require_once "data/dbconnector.php";

    $pdo = dbConnect();


    $stmt =$pdo->query("SELECT name
                                FROM allergy
                                LEFT JOIN users_has_allergy ON users_has_allergy.allergy_id = allergy.id
                                LEFT JOIN users ON users_has_allergy.users_id = users.id
                                WHERE users.id = $id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addUser($data){
    require_once "data/dbconnector.php";

    $pdo = dbConnect();

    $lastname = $data['lastname'];
    $firstname = $data['firstname'];
    $street = $data['street'];
    $number = $data['number'];
    $postalCode = $data['postalCode'];
    $city = $data['city'];
    $email = $data['email'];
    $password = $data['password'];
    $phoneNumber = $data['phoneNumber'];

    $stmt =$pdo->prepare('INSERT INTO users (lastname, firstname, street, number, postalCode, city, email, password, phoneNumber, userTypes_id)
                        VALUES (:lastname, :firstname, :street, :number, :postalCode, :city, :email, :password, :phoneNumber, 1)');

    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':street', $street);
    $stmt->bindParam(':number', $number);
    $stmt->bindParam(':postalCode', $postalCode);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':phoneNumber', $phoneNumber);
    $stmt->execute();

}


function registerAccount($registerRequest, $userEmail, $userPass){

    if(registerCheck($userEmail) <= 0){
        $userHashPass = password_hash($userPass, PASSWORD_DEFAULT);
        $registerRequest['password'] = $userHashPass;
        addUser($registerRequest);
        return true;
    }
    else{
        return false;
    }


}

function registerCheck($email){

    $result = 0;
    $users = getUsers();

    foreach ($users as $user){
        if ($user["email"] == $email) {
            $result = 1;
        }
    }

    return $result;

}

function isLoginCorrect($userEmail, $userPassword){

    $users = getUsers();

    $result = false;

    foreach ($users as $user){
        if ($user['email'] == $userEmail) {
            $result = password_verify($userPassword, $user['password']);
        }
    }

    return $result;

}

function userDetailToDatabase($data){

    require_once "data/dbconnector.php";

    $pdo = dbConnect();

    $lastname = $data['lastname'];
    $firstname = $data['firstname'];
    $street = $data['street'];
    $number = $data['number'];
    $postalCode = $data['postalCode'];
    $city = $data['city'];
    $phoneNumber = $data['phoneNumber'];
    $email = $_SESSION['email'];

    $stmt =$pdo->prepare('UPDATE users 
                                SET lastname = :lastname, firstname = :firstname, street = :street, number = :number, postalCode = :postalCode, city = :city, phoneNumber = :phoneNumber
                                WHERE email = :email');

    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':street', $street);
    $stmt->bindParam(':number', $number);
    $stmt->bindParam(':postalCode', $postalCode);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':phoneNumber', $phoneNumber);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

}
