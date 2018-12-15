<?php
//require("config.php");

class User{

    private $con;


    public function __construct(){
        $this->con = DB::getConnection();
    }

    public static function findUser($email, $user, $return_assoc=false){
        $con = DB::getConnection();

        //Se asegura de que el usuario no exista
        $buscarUsuario = $con->prepare("SELECT Username, Password FROM users WHERE Email = LOWER(:email) OR Username = :user LIMIT 1");
        $buscarUsuario->bindParam(':email', $email, PDO::PARAM_STR);
        $buscarUsuario->bindParam(':user', $user);
        $buscarUsuario->execute();

        if($return_assoc){
            return $buscarUsuario->fetch(PDO::FETCH_ASSOC);
        }

        $usuario_encontrado = (boolean) $buscarUsuario->rowCount();
        return $usuario_encontrado;

    }

}