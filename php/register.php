<?php
class person{
    public $name;
    public $age;
    public $height;

    public function __construct($name, $age, $height){
        $this->name = $name;
        $this->age = $age;
        $this->height = $height;
    }

    function set_name($new_name){$this->name = $new_name;}

    function get_name(){return $this->name;}

    function get_age(){return $this->age;}

    function get_height(){return $this->height;}

    public function get_data(){
        echo "$this->name tiene $this->age años y mide $this->height";
    }

};
class loli extends person{
    public function say(){
        echo "Y...Yamete kudasai... desu!";
    }
}