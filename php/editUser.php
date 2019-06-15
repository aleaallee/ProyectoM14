<?php
require('classes/config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['reppassword'])) {
    if (isset($_POST['adminPass'])) {
      if (user::changePassword($_POST['password'], $_POST['reppassword'], $_POST['user'])) {
        header('Location: https://www.apd2.es/user.php?error=passwordsuccess');
      } else {
        header('Location: https://www.apd2.es/user.php?error=badpassword');
      }

    } else {
      $currentPassword = $_POST['currentpassword'];
      if(user::verifyPassword($_COOKIE['user'], $currentPassword) ){
        if (user::changePassword($_POST['password'], $_POST['reppassword'], $_COOKIE['user'])) {
          header('Location: https://www.apd2.es/user.php?error=passwordsuccess');
        } else {
          header('Location: https://www.apd2.es/user.php?error=badpassword');
        }
      }else{
        header('Location: https://www.apd2.es/user.php?error=wrongpassword');
      }

    }

  }
  if (isset($_POST['remove'])) {
    user::removeUser($_POST['remove']);
  }
  if (isset($_POST['email'])) {
    user::editUser($_POST['name'], $_POST['lastname'], $_POST['user'], $_POST['email'], $_POST['created']);
  }
}

