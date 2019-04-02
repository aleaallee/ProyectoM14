<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
 * Class lang
 */
class lang
{

    private $con;

    public function __construct()
    {
        $this->con = DB::getConnection();
    }

    /**
     * @param $lang
     * @return false|string
     */
    public static function getApiTranslation($lang)
    {
        $con = DB::getConnection();

        $consulta = $con->prepare("SELECT ID, LANG, VALUE FROM Lang WHERE Lang = :lang ");
        $consulta->bindParam(':lang', $lang);
        $consulta->execute();
        while($fila = $consulta->fetch()){
            $datos[] = $fila;
        }
        return json_encode($datos,  JSON_PRETTY_PRINT);
    }

    /**
     * @param $lang
     * @param $id
     * @return false|string
     */
    public static function getTranslation($lang, $id)
    {
        $con = DB::getConnection();

        $consulta = $con->prepare("SELECT VALUE  FROM Lang WHERE Lang = :lang AND ID = :id ");
        $consulta->bindParam(':lang', $lang);
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $datos = $consulta->fetch();
        return $datos["VALUE"];
    }


}