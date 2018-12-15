<?php
require ('user.php');

class DB{
    protected static $user = 'remote';
    protected static $password = 'remote';

    //variable de conexion
    protected static $con;

    public function __construct(){
        try{
            //opciones de pdo
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            //conectarse a la base de datos
            self::$con = new PDO("mysql:charset=utf8;host=127.0.0.1;port=3306;dbname=apd2", self::$user, self::$password, $options);
        }catch(PDOException $e){
            //En caso de error

            echo $e->getMessage();
        }
    }

    public static function getConnection(){
        //si no existe la conexión al devolverla, se instancia la clase 
        if(!self::$con){
            new DB();
        }
        
        return self::$con;

    }

}