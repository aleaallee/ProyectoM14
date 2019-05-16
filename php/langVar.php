<?php
require_once('classes/config.php');
require_once('classes/lang.php');


$lang = isset($_COOKIE["lang"]) ? $_COOKIE["lang"] : "ES";

define("NAV_HOME", lang::getTranslation($lang, "NAV_HOME"));
define("NAV_GALLERY", lang::getTranslation($lang, "NAV_GALLERY"));
define("NAV_CONTACT", lang::getTranslation($lang, "NAV_CONTACT"));
define("NAV_SESSION_CLOSE", lang::getTranslation($lang, "NAV_SESSION_CLOSE"));
define("BODY_TERMS", lang::getTranslation($lang, "BODY_TERMS"));
define("MENU_LANG", lang::getTranslation($lang, "MENU_LANG"));
define("USER_IMAGES", lang::getTranslation($lang, "USER_IMAGES"));
define("USER_INFO", lang::getTranslation($lang, "USER_INFO"));
define("GALLERY_BY", lang::getTranslation($lang, "GALLERY_BY"));
define("GALLERY_UPLOAD_IMAGE", lang::getTranslation($lang, "GALLERY_UPLOAD_IMAGE"));
define("GALLERY_UPLOAD", lang::getTranslation($lang, "GALLERY_UPLOAD"));
define("GALLERY_TITLE", lang::getTranslation($lang, "GALLERY_TITLE"));
define("GALLERY_IMAGE", lang::getTranslation($lang, "GALLERY_IMAGE"));

