<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
/**
 * Class img
 */
class img {

  private $con;

  public function __construct() {
    $this->con = DB::getConnection();
  }


  public static function printImages() {
    $con = DB::getConnection();
    $consulta = $con->prepare("Select Image_ID, Uploader, Upload_Date FROM Uploads WHERE Enabled = 1;");
    $consulta->execute();
    $consulta->bindColumn('Image_ID', $img_id);
    $consulta->bindColumn('Uploader', $uploader);
    $consulta->bindColumn('Upload_Date', $upload_date);
    while($fila = $consulta->fetch(PDO::FETCH_COLUMN)){
      $titulo = img::getTitle($img_id);
      echo "<div class='img'>
            <a data-fancybox='galeria' data-caption='$titulo -  ".GALLERY_BY ." $uploader' href='img/uploads/$img_id'><img src='img/uploads/$img_id' alt='$titulo'></a>
        
      </div>";

    }
  }
  public static function printUserImages($user) {
    $con = DB::getConnection();
    $consulta = $con->prepare("Select Image_ID, Uploader, Upload_Date FROM Uploads WHERE uploader = :user and Enabled = 1;");
    $consulta->bindParam(':user', $user);
    $consulta->execute();
    $consulta->bindColumn('Image_ID', $img_id);
    $consulta->bindColumn('Uploader', $uploader);
    $consulta->bindColumn('Upload_Date', $upload_date);
    while($fila = $consulta->fetch(PDO::FETCH_COLUMN)){
      $titulo = img::getTitle($img_id);
      echo "<div class='image'>
            <a data-fancybox='test'  href='img/uploads/$img_id'><img src='img/uploads/$img_id' alt='$titulo'></a>
        
      </div>";

    }
  }

  /**
   * @param $img_id
   * @return string
   */
  public static function getTitle($img_id):string {
    $con = DB::getConnection();
    $consulta = $con->prepare("Select Title FROM Images WHERE Id = :id;");
    $consulta->bindParam(':id', $img_id);
    $consulta->execute();
    $datos = $consulta->fetch();
    return $datos['Title'];
  }


}