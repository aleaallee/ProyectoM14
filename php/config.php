<?php
$host = '127.0.0.1';
$db = 'apd2';
$user = 'remote';
$password = 'remote';
$charset = 'utf8';


try{
    //Conexión
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    //opciones de pdo
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    //conectarse a la base de datos
    $pdo = new PDO($dsn, $user, $password, $options);

}catch(PDOException $e){
    //En caso de error
    echo $e->getMessage();
}