<?php
require('classes/config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $return = [];

    $con = DB::getConnection();

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    $user = $_POST['user'];

    $user_found = User::findUser($email, $user);



    if($_POST['password'] == $_POST['reppassword']){
        if($user_found){
            //si el usuario existe, devuelve un error
            $return['error'] = "Ya tienes una cuenta creada.";
            $return['is_logged_in'] = false;

        }else{
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $adduser = $con->prepare("INSERT INTO users(username, email, password, created) 
            values(:user, LOWER(:email), :password, NOW() )");


            $adduser->bindParam(':user', $user, PDO::PARAM_STR);
            $adduser->bindParam(':email', $email, PDO::PARAM_STR);
            $adduser->bindParam(':password', $password, PDO::PARAM_STR);
            $adduser->execute();

            $userID = $con->lastInsertId();

            $_SESSION["user_id"] = (int) $userID;

            $return['redirect'] = '/index.php?message=welcome';

            $return['is_logged_in'] = true;

            /*
             * https://github.com/KalobTaulien/PHP-Login-System/blob/master/assets/js/main.js
             * https://github.com/KalobTaulien/PHP-Login-System/blob/master/ajax/register.php
             * https://github.com/KalobTaulien/PHP-Login-System/blob/master/ajax/login.php
             * https://github.com/KalobTaulien/PHP-Login-System/blob/master/inc/classes/User.php
             * */

        }
    }else{
        $return['error'] = "Las contraseñas no coinciden";
        $return['is_logged_in'] = false;
    }

    echo json_encode($return, JSON_PRETTY_PRINT); exit;

}else{
    exit('invalido');
}

