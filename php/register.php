<?php
require('classes/config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $return = [];

  $con = DB::getConnection();

  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

  $user = $_POST['user'];

  $user_found = User::findUser($email, $user);


  if ($_POST['password'] == $_POST['reppassword']) {
    if ($user_found) {
      //si el usuario existe, devuelve un error
      $return['error'] = "Ya tienes una cuenta creada.";
      $return['is_logged_in'] = false;

    } else {
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

      $adduser = $con->prepare("INSERT INTO Users(username, email, password, created) values(:user, LOWER(:email), :password, NOW() )");


      $adduser->bindParam(':user', $user, PDO::PARAM_STR);
      $adduser->bindParam(':email', $email, PDO::PARAM_STR);
      $adduser->bindParam(':password', $password, PDO::PARAM_STR);
      $adduser->execute();

      $userID = $con->lastInsertId();

      $return['redirect'] = '/index.php?message=welcome';


    }
  } else {
    $return['error'] = "Las contraseñas no coinciden";
    $return['is_logged_in'] = false;
  }

  echo json_encode($return, JSON_PRETTY_PRINT);
  exit;

} else {
  exit('invalido');
}

