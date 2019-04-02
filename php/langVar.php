<?php
require_once('classes/config.php');
require_once('classes/lang.php');


$lang = isset($_COOKIE["lang"]) ? $_COOKIE["lang"] : "ES";

define("NAV_HOME", lang::getTranslation($lang, "NAV_HOME"));
define("NAV_GALLERY", lang::getTranslation($lang, "NAV_GALLERY"));
define("NAV_CONTACT", lang::getTranslation($lang, "NAV_CONTACT"));
define("BODY_TERMS", lang::getTranslation($lang, "BODY_TERMS"));
define("MENU_LANG", lang::getTranslation($lang, "MENU_LANG"));
