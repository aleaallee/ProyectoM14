<?php
require("config.php");
class user extends db{

    private $con;

    protected $username;
    protected $name;
    protected $lastname;
    protected $password;
    protected $created;

    public function __construction($username){
        $this->con = DB::getConnection();
    }

}