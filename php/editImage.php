<?php
require('classes/config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if(isset($_POST['remove'])){
    img::removeImage($_POST['remove']);
    img::removeFromFolder($_POST['remove']);
  }
  if (isset($_POST['imageid'])) {
    img::editImage($_POST['imageid'], $_POST['uploader'], $_POST['imagetitle'], $_POST['enabled']);
  }
}

