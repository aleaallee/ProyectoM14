<?php


class lang{

  private $con;

  public function __construct(){
    $this->con = DB::getConnection();
  }

  public static function getTranslation($id, $lang){
    $con = DB::getConnection();

    $consulta = $con->prepare("SELECT Value FROM LANG WHERE ID = :id AND Lang = :lang ");
    $consulta->bindParam(':id', $id);
    $consulta->bindParam(':lang', $lang);
    $consulta->execute();

    $value = $consulta->fetch();

  }


}