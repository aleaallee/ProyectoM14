<?php
require('classes/config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $return = [];

    $con = DB::getConnection();

    $user = $_POST['user'];

    $user_found = User::findUser(false, $user);

    if (!$user_found) {
        //si el usuario no existe, devuelve un error
        $return['error'] = "El usuario no existe.";

    } else {
        $password = $_POST['password'];

        if (User::verifyPassword($user, $password)) {
            $return['redirect'] = '/index.php?message=logged';
            $return['user'] = $user;
            //TODO: Cookies de inicio de sesión
        } else {
            $return['error'] = "La contraseña introducida es errónea.";

        }

    }


    echo json_encode($return, JSON_PRETTY_PRINT);
    exit;

} else {
    exit('invalido');
}

