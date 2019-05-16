<?php
require_once('classes/config.php');
require_once('classes/lang.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_GET['lang'])){
    $lang = strtoupper($_GET['lang']);
}else{
    $lang = "ES";
}

echo lang::getTranslation($lang, "NAV_GALLERY");
