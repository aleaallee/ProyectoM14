<?php
require_once('classes/config.php');
require_once('langVar.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $return = [];

  $title = $_POST['title'];
  $uploader = $_POST['uploader'];

  $file = $_FILES['file'];
  $filename = $_FILES['file']['name'];
  $tempName = $_FILES['file']['tmp_name'];
  $filesize = $_FILES['file']['size'];
  $filtype = $_FILES['file']['type'];
  $fileExtension  = pathinfo($filename, PATHINFO_EXTENSION);
  $fileExtensions = ['jpeg','jpg','png'];
  $currentdir = getcwd();
  $storedir = '/../img/uploads/';
  $uploadFolder = $currentdir . $storedir . basename($filename);

  if($con = DB::getConnection()){
    if (! in_array($fileExtension,$fileExtensions)) {
      $return[] = "Extensión no permitida, por favor, sube una imagen JPEG o PNG";
    }else{
      if ($filesize > 10000000) {
        $return[] = "Este archivo pesa más 10MB, suba uno más pequeño";
      }else{
        if(Img::verifyExistence($filename)){
          $addImage = $con->prepare("INSERT INTO Images VALUES(:id, :title)");
          $addImage->bindParam(":id", $filename, PDO::PARAM_STR);
          $addImage->bindParam(":title", $title, PDO::PARAM_STR);
          $addImage->execute();

          $addUpload = $con->prepare("INSERT INTO Uploads VALUES(:id, :uploader, NOW(), 1)");
          $addUpload->bindParam(":id", $filename, PDO::PARAM_STR);
          $addUpload->bindParam(":uploader", $uploader, PDO::PARAM_STR);
          $addUpload->execute();
          $uploaded = move_uploaded_file($tempName, $uploadFolder);
          if(!$uploaded){
            $return[] = "No se ha podido subir la imagen";
          }else{
            $return[] = UPLOAD_SUCCESS;
          }
        }else{
          $return[] = UPLOAD_EXISTS;
        }


      }

    }

  }


  echo json_encode($return, JSON_PRETTY_PRINT);
  exit;

} else {
  exit('invalido');
}

