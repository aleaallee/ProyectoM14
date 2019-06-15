<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
/**
 * Class lang
 */
class log {

  private $con;

  public function __construct() {
    $this->con = DB::getConnection();
  }


  public static function userLog($user, $action) {
    $con = DB::getConnection();
    $consulta = $con->prepare(" INSERT INTO Logs(Username, LogTime, Action) VALUES(:user, NOW(), :action)");
    $consulta->bindParam(':user', $user);
    $consulta->bindParam(':action', $action);
    $consulta->execute();
  }

  public static function getUserLogs() {
    $con = DB::getConnection();

    $consulta = $con->prepare("SELECT Username, LogTime, Action FROM Logs;");
    $consulta->execute();
    $consulta->bindColumn('Username', $user);
    $consulta->bindColumn('LogTime', $log);
    $consulta->bindColumn('Action', $action);
    while ($fila = $consulta->fetch()) {
      echo "<tr>";
      echo "<td>$user</td>";
      echo "<td>$log</td>";
      echo "<td>$action</td>";
      echo "</tr>";
    }
  }


}