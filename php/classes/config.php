<?php
require_once('/home/apd25972/public_html/php/classes/user.php');
require_once('lang.php');
require_once('img.php');
require_once('/home/apd25972/public_html/php/classes/log.php');
/**
 * Class DB
 */
class DB {
  protected static $user = 'apd25972_remote';
  protected static $password = 'aA123456789!';

  //variable de conexion
  protected static $con;

  public function __construct() {
    try {
      //opciones de pdo
      $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
      ];

      //conectarse a la base de datos
      self::$con = new PDO("mysql:charset=utf8;host=localhost;port=3306;dbname=apd25972_apd2", self::$user, self::$password, $options);
    } catch (PDOException $e) {
      //En caso de error

      echo $e->getMessage();
    }
  }

  public static function getConnection() {
    //si no existe la conexión al devolverla, se instancia la clase
    if (!self::$con) {
      new DB();
    }

    return self::$con;

  }

}