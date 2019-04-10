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
      //Estos echos de tablas solo son para probar
      echo "<div class=\"img\">
            <img src=\"img/uploads/$img_id\" alt=\"$titulo\">
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