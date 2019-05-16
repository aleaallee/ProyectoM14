<?php /** @noinspection SqlNoDataSourceInspection */

class User
{

    private $con;


    public function __construct()
    {
        $this->con = DB::getConnection();
    }

    /**
     * @param $email
     * @param $user
     * @param bool $return_assoc
     * @return bool|mixed
     */
    public static function findUser($email, $user, $return_assoc = false)
    {
        $con = DB::getConnection();

        //Se asegura de que el usuario no exista

        if($email!=false){
            $buscarUsuario = $con->prepare("SELECT Username, Password FROM Users WHERE Email = LOWER(:email) OR Username = :user LIMIT 1");
            $buscarUsuario->bindParam(':email', $email, PDO::PARAM_STR);
            $buscarUsuario->bindParam(':user', $user);
            $buscarUsuario->execute();
        }else{
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
    public static function verifyPassword($user, $password)
    {
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

}