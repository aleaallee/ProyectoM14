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
    while ($fila = $consulta->fetch(PDO::FETCH_COLUMN)) {
      $titulo = img::getTitle($img_id);
      echo "<div class='img'>
            <a data-fancybox='galeria' data-caption='$titulo -  " . GALLERY_BY . " $uploader' href='img/uploads/$img_id'><img src='img/uploads/$img_id' alt='$titulo'></a>
        
      </div>";

    }
  }

  /**
   * @param $user
   */
  public static function printUserImages($user) {
    $con = DB::getConnection();
    $consulta = $con->prepare("Select Image_ID, Uploader, Upload_Date FROM Uploads WHERE uploader = :user and Enabled = 1;");
    $consulta->bindParam(':user', $user);
    $consulta->execute();
    $consulta->bindColumn('Image_ID', $img_id);
    $consulta->bindColumn('Uploader', $uploader);
    $consulta->bindColumn('Upload_Date', $upload_date);
    while ($fila = $consulta->fetch(PDO::FETCH_COLUMN)) {
      $titulo = img::getTitle($img_id);
      echo "<div class='image'>
            <a data-fancybox='test'  href='img/uploads/$img_id'><img src='img/uploads/$img_id' alt='$titulo'></a>
        
      </div>";

    }
  }


  public static function getImgInfo() {
    $con = DB::getConnection();
    $consulta = $con->prepare(" SELECT Uploads.Image_ID as Image, Uploads.Uploader as Uploader,  Images.Title as Title, Uploads.Enabled as Enabled
                                          FROM Uploads, Images
                                          WHERE Uploads.Image_ID = Images.Id;");
    $consulta->execute();
    $consulta->bindColumn("Image", $image);
    $consulta->bindColumn("Uploader", $uploader);
    $consulta->bindColumn("Title", $title);
    $consulta->bindColumn("Enabled", $enabled);

    while ($datos = $consulta->fetch()) {
      echo "<tr class=\"edit\">";
      echo "<form method='post' enctype='multipart/form-data' action='php/editImage.php'>";
      echo "<td>$image</td>";
      echo "<td><input name='uploader' value='$uploader'></td>";
      echo "<td><input name='imagetitle' value='$title'></td>";
      echo "<td><input name='enabled' value='$enabled'></td>";
      echo "<input type='hidden' name='imageid' value='$image'>";
      echo "<td><input type='checkbox' required ></td> ";
      echo "<td><input type='submit' value='Editar'></td>";
      echo "</form>";
      echo "<td><form method='post' enctype='multipart/form-data' action='php/editImage.php' '>
            <input type='hidden' name='remove' value='$image'>
            <input type='checkbox' required>
            <input type='submit' value='&#10006;'>
            </form></td>";
      echo "</tr>";
    }
  }

  /**
   * @param $id
   * @param $uploader
   * @param $title
   * @param $available
   */
  public static function editImage($id, $uploader, $title, $available) {
    $con = DB::getConnection();

    $consulta = $con->prepare("UPDATE Uploads
                                         SET Uploader = :uploader, Enabled = :available
                                         WHERE Image_ID = :imgid;");

    $consulta->bindParam(':uploader', $uploader);
    $consulta->bindParam(':available', $available);
    $consulta->bindParam(':imgid', $id);

    $consulta->execute();

    $consulta = $con->prepare("UPDATE Images
                                         SET Title = :title
                                         WHERE Id = :imgid");

    $consulta->bindParam(':title', $title);
    $consulta->bindParam(':imgid', $id);

    $consulta->execute();
    header('Location: https://www.apd2.es/user.php');

  }

  /**
   * @param $img_ID
   */
  public static function removeImage($img_ID) {
    $con = DB::getConnection();
    $consulta = $con->prepare("DELETE FROM Images
                                         WHERE ID = :id");

    $consulta->bindParam(':id', $img_ID);

    $consulta->execute();
    header('Location: https://www.apd2.es/user.php');
  }

  /**
   * @param $img_id
   * @return string
   */
  public static function getTitle($img_id): string {
    $con = DB::getConnection();
    $consulta = $con->prepare("Select Title FROM Images WHERE Id = :id;");
    $consulta->bindParam(':id', $img_id);
    $consulta->execute();
    $datos = $consulta->fetch();
    return $datos['Title'];
  }


  public static function getCurrentPath(){
    return getcwd();
  }

  /**
   * @param $imgName
   */
  public static function removeFromFolder($imgName) {
    $current = getcwd();
    echo '<script language="javascript">';
    echo 'alert("'.$current.'1")';
    echo "alert(\"$current\")";

    echo '</script>';
    //chdir(__DIR__);
    //chdir("../img/uploads/");
    unlink($imgName);

  }

  public static function verifyExistence($img) {
    $con = DB::getConnection();
    $consulta = $con->prepare("Select Image_ID from Uploads where Image_ID = :img");
    $consulta->bindParam(':img', $img);
    $consulta->execute();
    if ($consulta->rowCount() > 0) {
      return false;
    } else {
      return true;
    }
  }
}
