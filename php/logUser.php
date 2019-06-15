<?php
require_once('classes/log.php');
require_once('classes/config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(isset($_GET['action'])){
  if($_GET['action'] == 'logout'){
    log::userLog($_COOKIE['user'], "OUT");
    setcookie('aleaallee', '', '1', '/');
    echo $_GET['dir'];
    header("Location: ".$_GET['dir']."");
  }else{
    header('Location: https://apd2.es');
  }
}