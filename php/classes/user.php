<?php /** @noinspection SqlNoDataSourceInspection */
error_reporting(E_ALL);
ini_set('display_errors', 1);


class User {

  private $con;


  public function __construct() {
    $this->con = DB::getConnection();
  }

  /**
   * @param $email
   * @param $user
   * @param bool $return_assoc
   * @return bool|mixed
   */
  public static function findUser($email, $user, $return_assoc = false) {
    $con = DB::getConnection();

    //Se asegura de que el usuario no exista

    if ($email != false) {
      $buscarUsuario = $con->prepare("SELECT Username, Password FROM Users WHERE Email = LOWER(:email) OR Username = :user LIMIT 1");
      $buscarUsuario->bindParam(':email', $email, PDO::PARAM_STR);
      $buscarUsuario->bindParam(':user', $user);
      $buscarUsuario->execute();
    } else {
      $buscarUsuario = $con->prepare("SELECT Username, Password FROM Users WHERE Username = :user LIMIT 1");
      $buscarUsuario->bindParam(':user', $user);
      $buscarUsuario->execute();
    }


    if ($return_assoc) {
      return $buscarUsuario->fetch(PDO::FETCH_ASSOC);
    }

    $usuario_encontrado = (boolean)$buscarUsuario->rowCount();
    return $usuario_encontrado;

  }

  /**
   * @param $user
   * @param $password
   * @return bool
   */
  public static function verifyPassword($user, $password) {
    $con = DB::getConnection();


    //Se verifica que la contraseña introducida coincida con la del usuario

    $verificarContra = $con->prepare("SELECT Password FROM Users WHERE Username = :user LIMIT  1");
    $verificarContra->bindParam(':user', $user);
    $verificarContra->execute();

    $datos = $verificarContra->fetch();
    $contra = $datos["Password"];
    //si la contraseña introducida coincide con la de la base de datos se devuelve true.
    return password_verify($password, $contra);

  }

  /**
   * @param string $user
   * @param string $get
   */
  public static function getUser($user = "all", $get = "admin") {
    $con = DB::getConnection();
    if ($user != "all") {
      if ($get == "admin") {
        $consulta = $con->prepare("SELECT Name, LastName, Username, Email, Created from Users");
        $consulta->execute();
        $consulta->bindColumn("Name", $name);
        $consulta->bindColumn("LastName", $lastname);
        $consulta->bindColumn("Username", $username);
        $consulta->bindColumn("Email", $email);
        $consulta->bindColumn("Created", $created);
        while ($datos = $consulta->fetch()) {
          echo "<tr class=\"edit \">";
          echo "<form method='post' enctype='multipart/form-data' action='php/editUser.php'>";
          echo "<td><input name='name' value='$name'></td>";
          echo "<td><input name='lastname' value='$lastname'></td>";
          echo "<td><input type='hidden' name='user' value='$username'>$username</td>";
          echo "<td><input type='email' name='email' value='$email'></td>";
          echo "<td><input name='created' value='$created'></td> ";
          echo "<td><input type='checkbox' required ></td> ";
          echo "<td><input type='submit'></td>";
          echo "</form>";
          echo "<td><form method='post' enctype='multipart/form-data' action='php/editUser.php' '>
            <input type='hidden' name='remove' value='$username'>
            <input type='checkbox' required>
            <input type='submit' value='&#10006;'>
            </form></td>";
          echo "</tr>";
        }

      } else if ($get == "personal") {
        $consulta = $con->prepare("SELECT Name, LastName, Username, Email, Created from Users where Username = :user ");
        $consulta->bindParam(":user", $user);
        $consulta->execute();
        $consulta->bindColumn("Name", $name);
        $consulta->bindColumn("LastName", $lastname);
        $consulta->bindColumn("Username", $username);
        $consulta->bindColumn("Email", $email);
        $consulta->bindColumn("Created", $created);
        $datos = $consulta->fetch();
        echo "<form class='userdata' method='post' enctype='multipart/form-data' action='php/editUser.php'>";
        echo "<div class='inputgroup'>";
        echo "<label for='name'>" . DATA_NAME . ":</label>";
        echo "<input name='name' value='$name'>";
        echo "</div>";

        echo "<div class='inputgroup'>";
        echo "<label for='lastname'>" . DATA_LASTNAME . ":</label>";
        echo "<input name='lastname' value='$lastname'>";
        echo "</div>";

        echo "<div class='inputgroup'>";
        echo "<label for='user'>" . DATA_USER . ":</label>";
        echo "<input name='user' value='$username' readonly> ";
        echo "</div>";

        echo "<div class='inputgroup'>";
        echo "<label for='email'>" . DATA_EMAIL . ":</label>";
        echo "<input name='email' value='$email'>";
        echo "</div>";

        echo "<div class='inputgroup'>";
        echo "<label for='confirm'>" . DATA_VERIFY . ":</label>";
        echo "<input type='checkbox' name='confirm'  required>";
        echo "</div>";

        echo "<input type='submit' value=" . ACTION_EDIT . ">";
        echo "</form>";


      } else {
        echo "<script>alert(\"Ha habido un error\");</script>";
      }
    }

  }

  /**
   * @param $name
   * @param $lastname
   * @param $username
   * @param $email
   * @param $created
   */
  public static function editUser($name, $lastname, $username, $email, $created) {
    $con = DB::getConnection();

    $consulta = $con->prepare("UPDATE Users SET Name = :name, LastName = :lastname, Email = :email, Created = :created where Username = :username;");
    $consulta->bindParam(":name", $name);
    $consulta->bindParam(":lastname", $lastname);
    $consulta->bindParam(":email", $email, PDO::PARAM_STR);
    $consulta->bindParam(":username", $username);
    $consulta->bindParam(':created', $created);

    $consulta->execute();
    header('Location: https://www.apd2.es/user.php?success=useredited');
  }

  /**
   * @param $username
   */
  public static function removeUser($username) {
    $con = DB::getConnection();
    $consulta = $con->prepare("DELETE FROM  Users
                                         WHERE Username = :id");

    $consulta->bindParam(':id', $username);

    $consulta->execute();
    header('Location: https://www.apd2.es/user.php');
  }

  /**
   * @param $user
   * @return string
   */
  public static function getFullName($user) {
    $con = DB::getConnection();

    $consulta = $con->prepare("SELECT Name, LastName 
                                         FROM Users 
                                         WHERE Username = :user");
    $consulta->bindParam(":user", $user);
    $consulta->execute();
    $consulta->bindColumn('Name', $name);
    $consulta->bindColumn('LastName', $lastname);
    return $name . " " . $lastname;

  }

  /**
   * @param $password
   * @param $reppassword
   * @param $user
   * @return bool
   */
  public static function changePassword($password, $reppassword, $user) {
    if ($password != $reppassword) {
      return false;
    } else {
      $con = DB::getConnection();
      $consulta = $con->prepare('Update Users SET Password = :password WHERE Username = :user');
      $contra = password_hash($password, PASSWORD_BCRYPT);
      $consulta->bindParam(':password', $contra);
      $consulta->bindParam(':user', $user);
      $consulta->execute();
      return true;
    }
  }


  public static function passwordChanger() {
    $con = DB::getConnection();
    $consulta = $con->prepare('SELECT Username from Users');
    $consulta->execute();
    $consulta->bindColumn('Username', $user);

    while ($datos = $consulta->fetch()) {
      echo "<option value='$user'>$user</option>";
    }

  }

}