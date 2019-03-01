<?php
require('classes/config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $return = [];

  $con = DB::getConnection();

  $user = $_POST['user'];

  $user_found = User::findUser($email, $user);

  if (!$user_found) {
    //si el usuario no existe, devuelve un error
    $return['error'] = "El usuario no existe.";

  } else {
    $password = $_POST['password'];

    if(!User::verifyPassword($user, $password)){
      $return['error'] = "La contraseña introducida es errónea.";
    }else{
      $return['redirect'] = '/index.php?message=logged';
      //TODO: Cookies de inicio de sesión
    }

  }


  echo json_encode($return, JSON_PRETTY_PRINT);
  exit;

} else {
   exit('invalido');
}

